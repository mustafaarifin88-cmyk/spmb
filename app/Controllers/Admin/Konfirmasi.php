<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\ProfilSekolahModel;
use App\Models\LatarBelakangModel;
use App\Models\BerkasPendaftaranModel;
use App\Models\AgamaModel;
use App\Models\PekerjaanModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Konfirmasi extends BaseController
{
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->pendaftaranModel = new PendaftaranModel();
    }

    public function index()
    {
        $data['pendaftar'] = $this->pendaftaranModel->orderBy('created_at', 'DESC')->findAll();
        return view('admin/konfirmasi/index', $data);
    }

    public function detail($id)
    {
        $berkasModel = new BerkasPendaftaranModel();
        
        $data['pendaftaran'] = $this->pendaftaranModel->find($id);
        $data['berkas'] = $berkasModel->select('berkas_pendaftaran.*, persyaratan.nama_persyaratan, persyaratan.is_wajib')
                                      ->join('persyaratan', 'persyaratan.id = berkas_pendaftaran.id_persyaratan')
                                      ->where('id_pendaftaran', $id)
                                      ->findAll();
                                      
        return view('admin/konfirmasi/detail', $data);
    }

    public function approve($id)
    {
        $this->pendaftaranModel->update($id, [
            'status_pendaftaran' => 'Diterima',
            'alasan_tolak' => null,
            'pesan_perbaikan' => null
        ]);
        return redirect()->to('/admin/konfirmasi/detail/' . $id)->with('success', 'Pendaftaran diterima.');
    }

    public function reject($id)
    {
        $this->pendaftaranModel->update($id, [
            'status_pendaftaran' => 'Ditolak',
            'alasan_tolak' => $this->request->getPost('alasan_tolak'),
            'pesan_perbaikan' => null
        ]);
        return redirect()->to('/admin/konfirmasi/detail/' . $id)->with('success', 'Pendaftaran ditolak.');
    }

    public function perbaikan($id)
    {
        $this->pendaftaranModel->update($id, [
            'status_pendaftaran' => 'Perbaikan',
            'pesan_perbaikan' => $this->request->getPost('pesan_perbaikan')
        ]);
        return redirect()->to('/admin/konfirmasi/detail/' . $id)->with('success', 'Permintaan perbaikan berkas terkirim ke siswa.');
    }

    public function edit_siswa($id)
    {
        $agamaModel = new AgamaModel();
        $pekerjaanModel = new PekerjaanModel();

        $data['pendaftaran'] = $this->pendaftaranModel->find($id);
        $data['agama'] = $agamaModel->findAll();
        $data['pekerjaan'] = $pekerjaanModel->findAll();

        return view('admin/konfirmasi/form_edit_siswa', $data);
    }

    public function update_siswa($id)
    {
        $dataUpdate = $this->request->getPost();
        $this->pendaftaranModel->update($id, $dataUpdate);
        return redirect()->to('/admin/konfirmasi/detail/' . $id)->with('success', 'Data peserta didik berhasil diperbarui.');
    }

    public function delete_siswa($id)
    {
        $this->pendaftaranModel->delete($id);
        return redirect()->to('/admin/konfirmasi')->with('success', 'Data pendaftar berhasil dihapus secara permanen.');
    }

    public function cetak_pdf($id)
    {
        $profilModel = new ProfilSekolahModel();
        $latarModel = new LatarBelakangModel();

        $data['pendaftaran'] = $this->pendaftaranModel
            ->select('pendaftaran.*, p_ayah.nama_pekerjaan as pk_ayah, p_ibu.nama_pekerjaan as pk_ibu, p_wali.nama_pekerjaan as pk_wali')
            ->join('pekerjaan as p_ayah', 'p_ayah.id = pendaftaran.id_pekerjaan_ayah', 'left')
            ->join('pekerjaan as p_ibu', 'p_ibu.id = pendaftaran.id_pekerjaan_ibu', 'left')
            ->join('pekerjaan as p_wali', 'p_wali.id = pendaftaran.id_pekerjaan_wali', 'left')
            ->find($id);

        $data['sekolah'] = $profilModel->first();
        $data['latar'] = $latarModel->where('is_active', 1)->first();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        
        $html = view('pdf/formulir', $data);
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Formulir_Pendaftaran_" . $data['pendaftaran']->nama_peserta_didik . ".pdf", array("Attachment" => false));
        
        exit();
    }
}