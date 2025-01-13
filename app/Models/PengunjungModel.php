<?php

namespace App\Models;

use CodeIgniter\Model;

class PengunjungModel extends Model
{
    protected $table            = 'pengunjung';
    protected $primaryKey       = 'id_pengunjung';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_anggota', 'waktu_kunjungan', 'keperluan'];

    public function getAnggota($id_anggota)
    {
        return $this->db->table('members')->where('id_anggota', $id_anggota)->get()->getRow(); // Tabel 'members' adalah tabel anggota
    }
}
