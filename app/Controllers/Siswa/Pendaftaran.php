<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\AgamaModel;
use App\Models\PekerjaanModel;
use App\Models\ProfilSekolahModel;
use App\Models\LatarBelakangModel;
use App\Models\PersyaratanModel;
use App\Models\BerkasPendaftaranModel;
use App\Models\PengaturanModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Pendaftaran extends BaseController
{
    public function index()
    {
        $pendaftaranModel = new PendaftaranModel();
        $agamaModel = new AgamaModel();
        $pekerjaanModel = new PekerjaanModel();
        $persyaratanModel = new PersyaratanModel();
        $pengaturanModel = new PengaturanModel();

        $pengaturan = $pengaturanModel->first();
        if ($pengaturan && $pengaturan->is_open == 0) {
            return redirect()->to('/siswa/dashboard')->with('error', 'Masa pendaftaran sedang ditutup.');
        }

        $id_user = session()->get('id');
        $cekDaftar = $pendaftaranModel->where('id_user', $id_user)->first();

        if ($cekDaftar) {
            return redirect()->to('/siswa/dashboard');
        }

        $data['agama'] = $agamaModel->findAll();
        $data['pekerjaan'] = $pekerjaanModel->findAll();
        $data['persyaratan'] = $persyaratanModel->findAll();

        return view('siswa/pendaftaran/form_input', $data);
    }

    public function store()
    {
        $pendaftaranModel = new PendaftaranModel();
        $berkasModel = new BerkasPendaftaranModel();

        $ttdData = $this->request->getPost('ttd_ortu_base64');
        $ttdName = '';

        if (!empty($ttdData)) {
            $ttd_parts = explode(";base64,", $ttdData);
            $ttd_base64 = base64_decode($ttd_parts[1]);
            $ttdName = uniqid() . '.png';
            file_put_contents('uploads/ttd/' . $ttdName, $ttd_base64);
        }

        $dataInsert = $this->request->getPost();
        unset($dataInsert['berkas']);
        unset($dataInsert['ttd_ortu_base64']);
        
        $dataInsert['id_user'] = session()->get('id');
        $dataInsert['masuk_sebagai'] = 'Murid Baru';
        $dataInsert['ttd_ortu'] = $ttdName;
        $dataInsert['status_pendaftaran'] = 'Menunggu';
        if(empty($dataInsert['id_pekerjaan_wali'])) {
            $dataInsert['id_pekerjaan_wali'] = null;
        }

        $pendaftaranModel->insert($dataInsert);
        $idPendaftaran = $pendaftaranModel->getInsertID();

        if ($this->request->getFiles()) {
            $files = $this->request->getFiles();
            if (isset($files['berkas'])) {
                foreach ($files['berkas'] as $idPersyaratan => $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move('uploads/siswa/', $newName);
                        $berkasModel->insert([
                            'id_pendaftaran' => $idPendaftaran,
                            'id_persyaratan' => $idPersyaratan,
                            'file_path'      => $newName
                        ]);
                    }
                }
            }
        }

        return redirect()->to('/siswa/dashboard')->with('success', 'Formulir pendaftaran berhasil dikirim!');
    }

    public function update_berkas()
    {
        $berkasModel = new BerkasPendaftaranModel();
        $pendaftaranModel = new PendaftaranModel();
        $id_pendaftaran = $this->request->getPost('id_pendaftaran');

        if ($this->request->getFiles()) {
            $files = $this->request->getFiles();
            if (isset($files['berkas'])) {
                foreach ($files['berkas'] as $idPersyaratan => $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move('uploads/siswa/', $newName);
                        
                        $exist = $berkasModel->where('id_pendaftaran', $id_pendaftaran)->where('id_persyaratan', $idPersyaratan)->first();
                        if ($exist) {
                            if (file_exists('uploads/siswa/' . $exist->file_path)) {
                                unlink('uploads/siswa/' . $exist->file_path);
                            }
                            $berkasModel->update($exist->id, ['file_path' => $newName]);
                        } else {
                            $berkasModel->insert([
                                'id_pendaftaran' => $id_pendaftaran,
                                'id_persyaratan' => $idPersyaratan,
                                'file_path'      => $newName
                            ]);
                        }
                    }
                }
            }
        }

        $pendaftaranModel->update($id_pendaftaran, [
            'status_pendaftaran' => 'Menunggu',
            'pesan_perbaikan' => null
        ]);

        return redirect()->to('/siswa/dashboard')->with('success', 'Berkas berhasil diperbaiki dan sedang menunggu konfirmasi ulang.');
    }

    public function cetak_pdf()
    {
        $pendaftaranModel = new PendaftaranModel();
        $profilModel = new ProfilSekolahModel();
        $latarModel = new LatarBelakangModel();

        $id_user = session()->get('id');
        $pendaftaran = $pendaftaranModel
            ->select('pendaftaran.*, p_ayah.nama_pekerjaan as pk_ayah, p_ibu.nama_pekerjaan as pk_ibu, p_wali.nama_pekerjaan as pk_wali')
            ->join('pekerjaan as p_ayah', 'p_ayah.id = pendaftaran.id_pekerjaan_ayah', 'left')
            ->join('pekerjaan as p_ibu', 'p_ibu.id = pendaftaran.id_pekerjaan_ibu', 'left')
            ->join('pekerjaan as p_wali', 'p_wali.id = pendaftaran.id_pekerjaan_wali', 'left')
            ->where('id_user', $id_user)
            ->first();

        if (!$pendaftaran) {
            return redirect()->to('/siswa/dashboard');
        }

        $data['pendaftaran'] = $pendaftaran;
        $data['sekolah'] = $profilModel->first();
        $data['latar'] = $latarModel->where('is_active', 1)->first();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        
        $html = view('pdf/formulir', $data);
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Formulir_Pendaftaran_Saya.pdf", array("Attachment" => false));
        
        exit();
    }
}