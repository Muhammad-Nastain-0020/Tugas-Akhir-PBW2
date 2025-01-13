<?php

namespace App\Models;

use CodeIgniter\Model;

class ViewPeminjamanModel extends Model
{
    protected $table            = 'view_peminjaman';
    protected $allowedFields    = [
        'id_peminjam',
        'id_anggota',
        'nama',
        'kelas',
        'id_buku',
        'judul_buku',
        'jenis_buku',
        'jumlah',
        'id_pengunjung',
        'tanggal_pinjam',
        'durasi_peminjaman',
        'batas_pengembalian',
        'status',
        'alamat'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
