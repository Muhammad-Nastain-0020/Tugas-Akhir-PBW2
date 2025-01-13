<?php

namespace App\Models;

use CodeIgniter\Model;

class ViewPengunjungModel extends Model
{
    protected $table            = 'view_pengunjung';
    protected $allowedFields    = ['id_pengunjung','id_anggota','nama', 'waktu_kunjungan', 'keperluan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Mengambil data pengunjung berdasarkan hari ini
    public function getPengunjungHariIni()
    {
        $hariIni = date('Y-m-d');
        return $this->where('DATE(waktu_kunjungan)', $hariIni)->findAll();
    }

    // Mengambil data pengunjung per bulan
    // Mengambil data pengunjung per bulan
    public function getPengunjungPerBulan($bulan = null, $tahun = null)
    {
        $bulan = $bulan ?? date('m');
        $tahun = $tahun ?? date('Y');

        return $this->select('id_pengunjung, id_anggota, nama, waktu_kunjungan, keperluan')  // Menambahkan id_pengunjung
                    ->where('MONTH(waktu_kunjungan)', $bulan)
                    ->where('YEAR(waktu_kunjungan)', $tahun)
                    ->findAll();
    }

    // Mengambil data pengunjung per tahun
    public function getPengunjungPerTahun($tahun = null)
    {
        $tahun = $tahun ?? date('Y');

        return $this->select('id_pengunjung, id_anggota, nama, waktu_kunjungan, keperluan')  // Menambahkan id_pengunjung
                    ->where('YEAR(waktu_kunjungan)', $tahun)
                    ->findAll();
    }


    // Mengambil semua data pengunjung tanpa filter
    public function getSemuaPengunjung()
    {
        return $this->findAll();
    }
}
