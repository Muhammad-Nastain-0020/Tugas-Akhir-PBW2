<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'id_peminjam';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'id_anggota',
        'id_buku',
        'id_pengunjung',
        'jumlah',
        'durasi_peminjaman',
        'status'
    ];

    // Cek apakah ID Anggota ada di tabel peminjaman
    public function getAnggota($id_anggota)
    {
        $tanggalHariIni = date('Y-m-d'); // Tanggal hari ini
        // Periksa apakah ID anggota ada di tabel pengunjung pada tanggal hari ini
        $query = $this->db->table('pengunjung')
            ->where('id_anggota', $id_anggota)
            ->where('DATE(waktu_kunjungan)', $tanggalHariIni)
            ->countAllResults();
        return $query > 0;
    }


    // Mendapatkan data buku berdasarkan ID
    public function getBuku($id_buku)
    {
        return $this->db->table('books')
            ->where('id_buku', $id_buku)
            ->get()
            ->getRow();
    }

    // Mendapatkan data pengunjung berdasarkan ID
    public function getPengunjung($id_pengunjung)
    {
        return $this->db->table('pengunjung')
            ->where('id_pengunjung', $id_pengunjung)
            ->get()
            ->getRow();
    }

    // Mendapatkan stok buku berdasarkan ID
    public function getStok($id_buku)
    {
        $buku = $this->getBuku($id_buku);
        return $buku ? $buku->stok : 0;
    }

    // Mendapatkan daftar pengunjung
    // Mendapatkan daftar pengunjung yang melakukan peminjaman perhari
    // Mendapatkan daftar pengunjung berdasarkan tanggal kunjungan
    public function getPengunjungPerHari($tanggal)
    {
        return $this->db->table('pengunjung')
            ->where('DATE(waktu_kunjungan)', $tanggal) // Memfilter berdasarkan tanggal
            ->select('id_anggota, id_pengunjung') // Mengambil id_anggota dan id_pengunjung
            ->get()
            ->getResult(); // Mengambil semua pengunjung pada hari itu
    }



}
