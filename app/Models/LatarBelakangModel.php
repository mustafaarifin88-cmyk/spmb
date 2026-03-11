<?php

namespace App\Models;

use CodeIgniter\Model;

class LatarBelakangModel extends Model
{
    protected $table            = 'latar_belakang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['gambar', 'is_active'];
    protected $returnType       = 'object';
}