<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $pendaftaranModel = new PendaftaranModel();
        
        $data = [
            'total_pendaftar' => $pendaftaranModel->countAllResults(),
            'menunggu' => $pendaftaranModel->where('status_pendaftaran', 'Menunggu')->countAllResults(),
            'diterima' => $pendaftaranModel->where('status_pendaftaran', 'Diterima')->countAllResults(),
            'ditolak' => $pendaftaranModel->where('status_pendaftaran', 'Ditolak')->countAllResults()
        ];

        return view('admin/dashboard', $data);
    }
}