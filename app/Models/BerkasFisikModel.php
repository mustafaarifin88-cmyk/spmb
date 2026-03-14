<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasFisikModel extends Model
{
    protected $table            = 'berkas_fisik';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_berkas'];
    protected $returnType       = 'object';
}