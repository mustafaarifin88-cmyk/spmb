<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['admin'] = $userModel->find(session()->get('id'));
        return view('admin/profil/edit_profil', $data);
    }

    public function update()
    {
        $userModel = new UserModel();
        $id = session()->get('id');
        $user = $userModel->find($id);

        $file = $this->request->getFile('foto_profil');
        $namaFoto = $user->foto_profil;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFoto = $file->getRandomName();
            $file->move('uploads/profil/', $namaFoto);
            if ($user->foto_profil != 'default.png' && file_exists('uploads/profil/' . $user->foto_profil)) {
                unlink('uploads/profil/' . $user->foto_profil);
            }
            session()->set('foto_profil', $namaFoto);
        }

        $updateData = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username' => $this->request->getPost('username'),
            'foto_profil' => $namaFoto
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $updateData);
        session()->set('nama_lengkap', $this->request->getPost('nama_lengkap'));

        return redirect()->to('/admin/profil')->with('success', 'Profil berhasil diperbarui');
    }
}