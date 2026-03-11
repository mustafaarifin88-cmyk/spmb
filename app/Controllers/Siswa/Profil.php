<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['siswa'] = $userModel->find(session()->get('id'));
        return view('siswa/profil/edit_profil', $data);
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
            'foto_profil' => $namaFoto
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $updateData);

        return redirect()->to('/siswa/profil')->with('success', 'Profil berhasil diperbarui');
    }
}