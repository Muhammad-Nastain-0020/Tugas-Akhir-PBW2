<?php

namespace App\Models;

use CodeIgniter\Model;

class ViewPengembalianModel extends Model
{
    protected $table            = 'view_pengembalian';
    protected $allowedFields    = ['id_pengembali', 'id_anggota', 'nama', 'id_buku', 'judul_buku', 'jenis_buku', 'id_pengunjung', 'id_peminjam', 'jumlah', 'jumlah_kembali', 'tanggal_pinjam', 'batas_pengembalian', 'tanggal_kembali', 'denda'];
}
