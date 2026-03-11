<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\ProfilSekolahModel;
use App\Models\LatarBelakangModel;
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
        $data['pendaftaran'] = $this->pendaftaranModel->find($id);
        return view('admin/konfirmasi/detail', $data);
    }

    public function approve($id)
    {
        $this->pendaftaranModel->update($id, [
            'status_pendaftaran' => 'Diterima',
            'alasan_tolak' => null
        ]);
        return redirect()->to('/admin/konfirmasi')->with('success', 'Pendaftaran diterima.');
    }

    public function reject($id)
    {
        $this->pendaftaranModel->update($id, [
            'status_pendaftaran' => 'Ditolak',
            'alasan_tolak' => $this->request->getPost('alasan_tolak')
        ]);
        return redirect()->to('/admin/konfirmasi')->with('success', 'Pendaftaran ditolak.');
    }

    public function cetak_pdf($id)
    {
        $profilModel = new ProfilSekolahModel();
        $latarModel = new LatarBelakangModel();

        $data['pendaftaran'] = $this->pendaftaranModel->find($id);
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
    }
}