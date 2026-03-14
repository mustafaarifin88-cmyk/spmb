<?php

namespace App\Models;

use CodeIgniter\Model;

class SlideshowModel extends Model
{
    protected $table            = 'slideshow';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['gambar', 'judul', 'keterangan'];
    protected $returnType       = 'object';
}