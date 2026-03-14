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

        $fileTtd = $this->request->getFile('ttd_kepsek');
        $namaTtd = $sekolah ? $sekolah->ttd_kepsek : null;
        if ($fileTtd && $fileTtd->isValid() && !$fileTtd->hasMoved()) {
            $namaTtd = $fileTtd->getRandomName();
            $fileTtd->move('uploads/ttd/', $namaTtd);
            if ($sekolah && $sekolah->ttd_kepsek && file_exists('uploads/ttd/' . $sekolah->ttd_kepsek)) {
                unlink('uploads/ttd/' . $sekolah->ttd_kepsek);
            }
        }

        $filePemda = $this->request->getFile('logo_pemda');
        $namaPemda = $sekolah ? $sekolah->logo_pemda : null;
        if ($filePemda && $filePemda->isValid() && !$filePemda->hasMoved()) {
            $namaPemda = $filePemda->getRandomName();
            $filePemda->move('uploads/logo/', $namaPemda);
            if ($sekolah && $sekolah->logo_pemda && file_exists('uploads/logo/' . $sekolah->logo_pemda)) {
                unlink('uploads/logo/' . $sekolah->logo_pemda);
            }
        }

        $fileSekolah = $this->request->getFile('logo_sekolah');
        $namaSekolah = $sekolah ? $sekolah->logo_sekolah : null;
        if ($fileSekolah && $fileSekolah->isValid() && !$fileSekolah->hasMoved()) {
            $namaSekolah = $fileSekolah->getRandomName();
            $fileSekolah->move('uploads/logo/', $namaSekolah);
            if ($sekolah && $sekolah->logo_sekolah && file_exists('uploads/logo/' . $sekolah->logo_sekolah)) {
                unlink('uploads/logo/' . $sekolah->logo_sekolah);
            }
        }

        $updateData = [
            'nama_dinas' => $this->request->getPost('nama_dinas'),
            'kabupaten' => $this->request->getPost('kabupaten'),
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'alamat_lengkap' => $this->request->getPost('alamat_lengkap'),
            'desa' => $this->request->getPost('desa'),
            'nama_kepsek' => $this->request->getPost('nama_kepsek'),
            'nip_kepsek' => $this->request->getPost('nip_kepsek'),
            'ttd_kepsek' => $namaTtd,
            'logo_pemda' => $namaPemda,
            'logo_sekolah' => $namaSekolah
        ];

        if ($id) {
            $profilModel->update($id, $updateData);
        } else {
            $profilModel->insert($updateData);
        }

        return redirect()->to('/admin/profilsekolah')->with('success', 'Profil sekolah berhasil diperbarui');
    }
}