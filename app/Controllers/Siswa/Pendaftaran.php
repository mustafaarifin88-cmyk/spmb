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

        $dataInsert = [
            'id_user' => session()->get('id'),
            'no_kk' => $this->request->getPost('no_kk'),
            'nik_siswa' => $this->request->getPost('nik_siswa'),
            'nama_peserta_didik' => $this->request->getPost('nama_peserta_didik'),
            'nama_panggilan' => $this->request->getPost('nama_panggilan'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'id_agama' => $this->request->getPost('id_agama'),
            'kewarganegaraan' => $this->request->getPost('kewarganegaraan'),
            'anak_ke' => $this->request->getPost('anak_ke'),
            'jumlah_saudara_kandung' => $this->request->getPost('jumlah_saudara_kandung'),
            'jumlah_saudara_angkat' => $this->request->getPost('jumlah_saudara_angkat'),
            'bahasa_sehari_hari' => $this->request->getPost('bahasa_sehari_hari'),
            'berat_badan' => $this->request->getPost('berat_badan'),
            'tinggi_badan' => $this->request->getPost('tinggi_badan'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'tempat_tinggal' => $this->request->getPost('tempat_tinggal'),
            'nama_ayah' => $this->request->getPost('nama_ayah'),
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'nik_ayah' => $this->request->getPost('nik_ayah'),
            'nik_ibu' => $this->request->getPost('nik_ibu'),
            'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
            'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
            'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
            'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu'),
            'id_pekerjaan_ayah' => $this->request->getPost('id_pekerjaan_ayah'),
            'id_pekerjaan_ibu' => $this->request->getPost('id_pekerjaan_ibu'),
            'nama_wali' => $this->request->getPost('nama_wali'),
            'pendidikan_wali' => $this->request->getPost('pendidikan_wali'),
            'hubungan_wali' => $this->request->getPost('hubungan_wali'),
            'id_pekerjaan_wali' => $this->request->getPost('id_pekerjaan_wali') ? $this->request->getPost('id_pekerjaan_wali') : null,
            'masuk_sebagai' => 'Murid Baru',
            'asal_peserta_didik' => $this->request->getPost('asal_peserta_didik'),
            'nama_tk' => $this->request->getPost('nama_tk'),
            'tahun_nomor_ijazah' => $this->request->getPost('tahun_nomor_ijazah'),
            'ttd_ortu' => $ttdName,
            'status_pendaftaran' => 'Menunggu'
        ];

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

    public function cetak_pdf()
    {
        $pendaftaranModel = new PendaftaranModel();
        $profilModel = new ProfilSekolahModel();
        $latarModel = new LatarBelakangModel();

        $id_user = session()->get('id');
        $pendaftaran = $pendaftaranModel->where('id_user', $id_user)->first();

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
    }
}