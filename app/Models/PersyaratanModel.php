<?php

namespace App\Models;

use CodeIgniter\Model;

class PersyaratanModel extends Model
{
    protected $table            = 'persyaratan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_persyaratan', 'is_wajib'];
    protected $returnType       = 'object';
}