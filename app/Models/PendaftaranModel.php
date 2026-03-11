<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table            = 'pendaftaran';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'id_user', 'no_kk', 'nik_siswa', 'nama_peserta_didik', 'nama_panggilan',
        'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'id_agama', 'kewarganegaraan',
        'anak_ke', 'jumlah_saudara_kandung', 'jumlah_saudara_angkat', 'bahasa_sehari_hari',
        'berat_badan', 'tinggi_badan', 'alamat', 'no_telp', 'tempat_tinggal',
        'nama_ayah', 'nama_ibu', 'nik_ayah', 'nik_ibu', 'pendidikan_ayah', 'pendidikan_ibu',
        'penghasilan_ayah', 'penghasilan_ibu', 'id_pekerjaan_ayah', 'id_pekerjaan_ibu',
        'nama_wali', 'pendidikan_wali', 'hubungan_wali', 'id_pekerjaan_wali',
        'masuk_sebagai', 'asal_peserta_didik', 'nama_tk', 'tahun_nomor_ijazah',
        'ttd_ortu', 'status_pendaftaran', 'alasan_tolak'
    ];
}