<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{ 
    protected $table            = 'books'; 
    protected $useAutoIncrement = false; 
    protected $primaryKey       = 'id_buku';
    protected $allowedFields    = ['id_buku', 'judul_buku', 'jenis_buku', 'penulis', 'penerbit', 'tahun_terbit', 'stok'];
    protected $useTimestamps = false;
    
} 
