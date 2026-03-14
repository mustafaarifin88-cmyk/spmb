<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaturanModel;

class Pengaturan extends BaseController
{
    public function index()
    {
        $pengaturanModel = new PengaturanModel();
        $data['pengaturan'] = $pengaturanModel->first();
        
        if (!$data['pengaturan']) {
            $pengaturanModel->insert(['is_open' => 1]);
            $data['pengaturan'] = $pengaturanModel->first();
        }

        return view('admin/pengaturan/index', $data);
    }

    public function update()
    {
        $pengaturanModel = new PengaturanModel();
        $id = $this->request->getPost('id');
        
        $updateData = [
            'is_open' => $this->request->getPost('is_open'),
            'tgl_buka' => $this->request->getPost('tgl_buka') ?: null,
            'tgl_tutup' => $this->request->getPost('tgl_tutup') ?: null
        ];

        $pengaturanModel->update($id, $updateData);
        return redirect()->to('/admin/pengaturan')->with('success', 'Pengaturan jadwal SPMB berhasil diperbarui.');
    }
}