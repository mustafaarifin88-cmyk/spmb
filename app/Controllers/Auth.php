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

    public function register()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(session()->get('level') == 'admin' ? '/admin/dashboard' : '/siswa/dashboard');
        }
        return view('auth/register');
    }

    public function store_register()
    {
        $userModel = new UserModel();
        
        $username = $this->request->getPost('username');
        $cek_username = $userModel->where('username', $username)->first();

        if ($cek_username) {
            return redirect()->back()->with('error', 'Username sudah digunakan, silakan pilih username lain.');
        }

        $userModel->insert([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $username,
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'foto_profil'  => 'default.png',
            'level'        => 'siswa'
        ]);

        return redirect()->to('/auth')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }
}