<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'nama_lengkap', 'username', 'password', 'foto_profil', 'level'
    ];
}