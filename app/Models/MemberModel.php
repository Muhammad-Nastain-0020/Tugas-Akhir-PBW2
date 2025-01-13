<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
   
    protected $table = 'members';
    protected $primaryKey = 'id_anggota'; 
    protected $useAutoIncrement = false; 
    protected $allowedFields = ['id_anggota', 'nama', 'jenis_kelamin', 'keterangan', 'kota_lahir', 'tanggal_lahir', 'alamat'];
    protected $useTimestamps = false;
    
} 
