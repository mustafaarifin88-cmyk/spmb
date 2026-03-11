<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AgamaModel;

class Agama extends BaseController
{
    protected $agamaModel;

    public function __construct()
    {
        $this->agamaModel = new AgamaModel();
    }

    public function index()
    {
        $data['agama'] = $this->agamaModel->findAll();
        return view('admin/agama/index', $data);
    }

    public function store()
    {
        $this->agamaModel->insert([
            'nama_agama' => $this->request->getPost('nama_agama')
        ]);
        return redirect()->to('/admin/agama')->with('success', 'Data agama berhasil ditambahkan');
    }

    public function update($id)
    {
        $this->agamaModel->update($id, [
            'nama_agama' => $this->request->getPost('nama_agama')
        ]);
        return redirect()->to('/admin/agama')->with('success', 'Data agama berhasil diubah');
    }

    public function delete($id)
    {
        $this->agamaModel->delete($id);
        return redirect()->to('/admin/agama')->with('success', 'Data agama berhasil dihapus');
    }
}