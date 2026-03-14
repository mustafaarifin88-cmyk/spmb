<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SlideshowModel;

class Slideshow extends BaseController
{
    protected $slideshowModel;

    public function __construct()
    {
        $this->slideshowModel = new SlideshowModel();
    }

    public function index()
    {
        $data['slideshow'] = $this->slideshowModel->findAll();
        return view('admin/slideshow/index', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/slideshow/', $namaGambar);
            
            $this->slideshowModel->insert([
                'gambar' => $namaGambar,
                'judul' => $this->request->getPost('judul'),
                'keterangan' => $this->request->getPost('keterangan')
            ]);
            return redirect()->to('/admin/slideshow')->with('success', 'Slide berhasil ditambahkan.');
        }
        return redirect()->back()->with('error', 'Gagal mengunggah gambar.');
    }

    public function update($id)
    {
        $slide = $this->slideshowModel->find($id);
        $file = $this->request->getFile('gambar');
        $namaGambar = $slide->gambar;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/slideshow/', $namaGambar);
            if (file_exists('uploads/slideshow/' . $slide->gambar)) {
                unlink('uploads/slideshow/' . $slide->gambar);
            }
        }

        $this->slideshowModel->update($id, [
            'gambar' => $namaGambar,
            'judul' => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/slideshow')->with('success', 'Slide berhasil diperbarui.');
    }

    public function delete($id)
    {
        $slide = $this->slideshowModel->find($id);
        if ($slide && file_exists('uploads/slideshow/' . $slide->gambar)) {
            unlink('uploads/slideshow/' . $slide->gambar);
        }
        $this->slideshowModel->delete($id);
        return redirect()->to('/admin/slideshow')->with('success', 'Slide berhasil dihapus.');
    }
}