<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PersyaratanModel;

class Persyaratan extends BaseController
{
    protected $persyaratanModel;

    public function __construct()
    {
        $this->persyaratanModel = new PersyaratanModel();
    }

    public function index()
    {
        $data['persyaratan'] = $this->persyaratanModel->findAll();
        return view('admin/persyaratan/index', $data);
    }

    public function store()
    {
        $this->persyaratanModel->insert([
            'nama_persyaratan' => $this->request->getPost('nama_persyaratan')
        ]);
        return redirect()->to('/admin/persyaratan')->with('success', 'Persyaratan berhasil ditambahkan');
    }

    public function update($id)
    {
        $this->persyaratanModel->update($id, [
            'nama_persyaratan' => $this->request->getPost('nama_persyaratan')
        ]);
        return redirect()->to('/admin/persyaratan')->with('success', 'Persyaratan berhasil diubah');
    }

    public function delete($id)
    {
        $this->persyaratanModel->delete($id);
        return redirect()->to('/admin/persyaratan')->with('success', 'Persyaratan berhasil dihapus');
    }
}