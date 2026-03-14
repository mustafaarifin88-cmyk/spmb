<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BerkasFisikModel;

class BerkasFisik extends BaseController
{
    protected $berkasFisikModel;

    public function __construct()
    {
        $this->berkasFisikModel = new BerkasFisikModel();
    }

    public function index()
    {
        $data['berkas'] = $this->berkasFisikModel->findAll();
        return view('admin/berkas_fisik/index', $data);
    }

    public function store()
    {
        $this->berkasFisikModel->insert([
            'nama_berkas' => $this->request->getPost('nama_berkas')
        ]);
        return redirect()->to('/admin/berkasfisik')->with('success', 'Berkas fisik berhasil ditambahkan');
    }

    public function update($id)
    {
        $this->berkasFisikModel->update($id, [
            'nama_berkas' => $this->request->getPost('nama_berkas')
        ]);
        return redirect()->to('/admin/berkasfisik')->with('success', 'Berkas fisik berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->berkasFisikModel->delete($id);
        return redirect()->to('/admin/berkasfisik')->with('success', 'Berkas fisik berhasil dihapus');
    }
}