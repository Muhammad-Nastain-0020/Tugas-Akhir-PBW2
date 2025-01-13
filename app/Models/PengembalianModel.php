<?php

namespace App\Models;

use CodeIgniter\Model;

class PengembalianModel extends Model
{
    protected $table            = 'pengembalian';
    protected $primaryKey       = 'id_pengembali';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_pengembali', 'id_peminjam', 'id_pengunjung', 'id_anggota', 'id_buku', 'jumlah_kembali', 'tanggal_kembali'];


    

    // Cek apakah ID Buku ada di tabel peminjaman
    public function getBuku($id_buku)
    {
        // Periksa apakah buku ada di tabel peminjaman dengan jumlah lebih dari 0
        return $this->db->table('peminjaman')
            ->where('id_buku', $id_buku)
            ->where('jumlah >', 0) // Buku dipinjam jika jumlah > 0
            ->countAllResults() > 0;
    }
    
    public function getJumlah($id_peminjam)
    {
        $peminjaman = $this->db->table('peminjaman')
            ->select('jumlah')
            ->where('id_peminjam', $id_peminjam)
            ->get()
            ->getRow();
        return $peminjaman ? $peminjaman->jumlah : 0;
    }


    // Menambahkan fungsi untuk mendapatkan daftar pengunjung per hari
    public function getPengunjungPerHari($tanggal)
    {
        return $this->db->table('pengunjung')
            ->where('DATE(waktu_kunjungan)', $tanggal) // Filter berdasarkan tanggal
            ->select('id_anggota, id_pengunjung')
            ->get()
            ->getResult();
    }

      // Modifikasi metode getPeminjam untuk memeriksa jumlah pinjam
    public function getPeminjam()
    {
        // Ambil semua peminjam dengan jumlah pinjam lebih dari 0
        return $this->db->table('peminjaman')
            ->select('id_anggota, id_peminjam')
            ->where('jumlah >', 0) // Pastikan jumlah pinjaman lebih dari 0
            ->get()
            ->getResult();
    }

    public function getAnggota($id_anggota)
    {
        // Ambil semua id anggota dengan jumlah pinjam lebih dari 0
        return $this->db->table('peminjaman')
            ->select('id_anggota', $id_anggota)
            ->where('jumlah >', 0) // Pastikan jumlah pinjaman lebih dari 0
            ->countAllResults() > 0;
    }



}
