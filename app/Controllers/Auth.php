<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(session()->get('level') == 'admin' ? '/admin/dashboard' : '/siswa/dashboard');
        }
        return view('auth/login');
    }

    public function login()
    {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user->password)) {
                session()->set([
                    'id' => $user->id,
                    'nama_lengkap' => $user->nama_lengkap,
                    'username' => $user->username,
                    'foto_profil' => $user->foto_profil,
                    'level' => $user->level,
                    'logged_in' => true
                ]);
                return redirect()->to($user->level == 'admin' ? '/admin/dashboard' : '/siswa/dashboard');
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}