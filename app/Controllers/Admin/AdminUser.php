<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminUser extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->where('level', 'admin')->findAll();
        return view('admin/users/index', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('foto_profil');
        $namaFoto = 'default.png';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFoto = $file->getRandomName();
            $file->move('uploads/profil/', $namaFoto);
        }

        $this->userModel->insert([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'foto_profil' => $namaFoto,
            'level' => 'admin'
        ]);

        return redirect()->to('/admin/adminuser')->with('success', 'Admin berhasil ditambahkan');
    }

    public function update($id)
    {
        $user = $this->userModel->find($id);
        $file = $this->request->getFile('foto_profil');
        $namaFoto = $user->foto_profil;
        $password = $user->password;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFoto = $file->getRandomName();
            $file->move('uploads/profil/', $namaFoto);
            if ($user->foto_profil != 'default.png' && file_exists('uploads/profil/' . $user->foto_profil)) {
                unlink('uploads/profil/' . $user->foto_profil);
            }
        }

        if ($this->request->getPost('password') != '') {
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username' => $this->request->getPost('username'),
            'password' => $password,
            'foto_profil' => $namaFoto
        ]);

        return redirect()->to('/admin/adminuser')->with('success', 'Data admin berhasil diubah');
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);
        if ($user->foto_profil != 'default.png' && file_exists('uploads/profil/' . $user->foto_profil)) {
            unlink('uploads/profil/' . $user->foto_profil);
        }
        $this->userModel->delete($id);
        return redirect()->to('/admin/adminuser')->with('success', 'Admin berhasil dihapus');
    }
}