<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfilSekolahModel;

class ProfilSekolah extends BaseController
{
    public function index()
    {
        $profilModel = new ProfilSekolahModel();
        $data['sekolah'] = $profilModel->first();
        return view('admin/profil_sekolah/form_edit', $data);
    }

    public function update()
    {
        $profilModel = new ProfilSekolahModel();
        $id = $this->request->getPost('id');
        $sekolah = $profilModel->find($id);

        $file = $this->request->getFile('ttd_kepsek');
        $namaTtd = $sekolah->ttd_kepsek;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaTtd = $file->getRandomName();
            $file->move('uploads/ttd/', $namaTtd);
            if ($sekolah->ttd_kepsek && file_exists('uploads/ttd/' . $sekolah->ttd_kepsek)) {
                unlink('uploads/ttd/' . $sekolah->ttd_kepsek);
            }
        }

        $updateData = [
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'alamat_lengkap' => $this->request->getPost('alamat_lengkap'),
            'desa' => $this->request->getPost('desa'),
            'nama_kepsek' => $this->request->getPost('nama_kepsek'),
            'nip_kepsek' => $this->request->getPost('nip_kepsek'),
            'ttd_kepsek' => $namaTtd
        ];

        if ($id) {
            $profilModel->update($id, $updateData);
        } else {
            $profilModel->insert($updateData);
        }

        return redirect()->to('/admin/profilsekolah')->with('success', 'Profil sekolah berhasil diperbarui');
    }
}