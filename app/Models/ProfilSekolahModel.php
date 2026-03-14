<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilSekolahModel extends Model
{
    protected $table            = 'profil_sekolah';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'nama_dinas', 'kabupaten', 'nama_sekolah', 'alamat_lengkap', 'desa', 
        'nama_kepsek', 'nip_kepsek', 'ttd_kepsek', 'logo_pemda', 'logo_sekolah'
    ];
}