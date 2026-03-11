<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LatarBelakangModel;

class LatarBelakang extends BaseController
{
    protected $latarModel;

    public function __construct()
    {
        $this->latarModel = new LatarBelakangModel();
    }

    public function index()
    {
        $data['latar'] = $this->latarModel->findAll();
        return view('admin/latar_belakang/index', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads/latar_belakang/', $namaFile);
            
            $this->latarModel->where('is_active', 1)->set(['is_active' => 0])->update();
            
            $this->latarModel->insert([
                'gambar' => $namaFile,
                'is_active' => 1
            ]);
            return redirect()->to('/admin/latarbelakang')->with('success', 'Gambar latar belakang berhasil diunggah.');
        }
        return redirect()->back()->with('error', 'Gagal mengunggah gambar.');
    }

    public function set_active($id)
    {
        $this->latarModel->set(['is_active' => 0])->update();
        $this->latarModel->update($id, ['is_active' => 1]);
        return redirect()->to('/admin/latarbelakang')->with('success', 'Latar belakang aktif berhasil diubah.');
    }

    public function delete($id)
    {
        $latar = $this->latarModel->find($id);
        if ($latar && file_exists('uploads/latar_belakang/' . $latar->gambar)) {
            unlink('uploads/latar_belakang/' . $latar->gambar);
        }
        $this->latarModel->delete($id);
        return redirect()->to('/admin/latarbelakang')->with('success', 'Gambar berhasil dihapus.');
    }
}