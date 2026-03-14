<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\PengaturanModel;
use App\Models\BerkasFisikModel;
use App\Models\PersyaratanModel;
use App\Models\BerkasPendaftaranModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $pendaftaranModel = new PendaftaranModel();
        $pengaturanModel = new PengaturanModel();
        
        $data['pendaftaran'] = $pendaftaranModel->where('id_user', session()->get('id'))->first();
        $data['pengaturan'] = $pengaturanModel->first();
        
        if ($data['pendaftaran'] && $data['pendaftaran']->status_pendaftaran == 'Diterima') {
            $berkasFisikModel = new BerkasFisikModel();
            $data['berkas_fisik'] = $berkasFisikModel->findAll();
        }

        if ($data['pendaftaran'] && $data['pendaftaran']->status_pendaftaran == 'Perbaikan') {
            $persyaratanModel = new PersyaratanModel();
            $berkasPendaftaranModel = new BerkasPendaftaranModel();
            $data['persyaratan'] = $persyaratanModel->findAll();
            $data['berkas_lama'] = $berkasPendaftaranModel->where('id_pendaftaran', $data['pendaftaran']->id)->findAll();
        }

        return view('siswa/dashboard', $data);
    }
}