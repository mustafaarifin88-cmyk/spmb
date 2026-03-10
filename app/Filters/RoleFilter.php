<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $level = session()->get('level');

        if ($arguments && !in_array($level, $arguments)) {
            if ($level == 'admin') {
                return redirect()->to('/admin/dashboard');
            } elseif ($level == 'siswa') {
                return redirect()->to('/siswa/dashboard');
            }
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}