<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanModel extends Model
{
    protected $table            = 'pengaturan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['is_open', 'tgl_buka', 'tgl_tutup'];
    protected $returnType       = 'object';
}