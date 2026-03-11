<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PekerjaanModel;

class Pekerjaan extends BaseController
{
    protected $pekerjaanModel;

    public function __construct()
    {
        $this->pekerjaanModel = new PekerjaanModel();
    }

    public function index()
    {
        $data['pekerjaan'] = $this->pekerjaanModel->findAll();
        return view('admin/pekerjaan/index', $data);
    }

    public function store()
    {
        $this->pekerjaanModel->insert([
            'nama_pekerjaan' => $this->request->getPost('nama_pekerjaan')
        ]);
        return redirect()->to('/admin/pekerjaan')->with('success', 'Data pekerjaan berhasil ditambahkan');
    }

    public function update($id)
    {
        $this->pekerjaanModel->update($id, [
            'nama_pekerjaan' => $this->request->getPost('nama_pekerjaan')
        ]);
        return redirect()->to('/admin/pekerjaan')->with('success', 'Data pekerjaan berhasil diubah');
    }

    public function delete($id)
    {
        $this->pekerjaanModel->delete($id);
        return redirect()->to('/admin/pekerjaan')->with('success', 'Data pekerjaan berhasil dihapus');
    }
}