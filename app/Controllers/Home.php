<?php

namespace App\Controllers;

use App\Models\SlideshowModel;
use App\Models\ProfilSekolahModel;
use App\Models\PengaturanModel;
use App\Models\PendaftaranModel;

class Home extends BaseController
{
    public function index()
    {
        $slideshowModel = new SlideshowModel();
        $profilModel = new ProfilSekolahModel();
        $pengaturanModel = new PengaturanModel();
        $pendaftaranModel = new PendaftaranModel();

        $data = [
            'slideshow' => $slideshowModel->findAll(),
            'sekolah' => $profilModel->first(),
            'pengaturan' => $pengaturanModel->first(),
            'total_pendaftar' => $pendaftaranModel->countAllResults(),
            'total_diterima' => $pendaftaranModel->where('status_pendaftaran', 'Diterima')->countAllResults()
        ];

        return view('home/index', $data);
    }
}