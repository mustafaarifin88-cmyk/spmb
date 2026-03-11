<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasPendaftaranModel extends Model
{
    protected $table            = 'berkas_pendaftaran';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_pendaftaran', 'id_persyaratan', 'file_path'];
}