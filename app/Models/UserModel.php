<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'username';
    protected $allowedFields    = ['username', 'password', 'nama_lengkap', 'token'];
    protected $returnType       = 'object'; 

    // Fungsi untuk mengambil data user berdasarkan username
    public function getData($username)
    {
        return $this->where('username', $username)->first();
    }
}
