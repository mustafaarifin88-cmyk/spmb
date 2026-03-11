<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $pendaftaranModel = new PendaftaranModel();
        $id_user = session()->get('id');
        
        $data['pendaftaran'] = $pendaftaranModel->where('id_user', $id_user)->first();
        
        return view('siswa/dashboard', $data);
    }
}