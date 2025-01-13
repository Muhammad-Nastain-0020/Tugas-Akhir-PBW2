<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ViewPengunjungModel; // Pastikan model ini sudah diimport
use App\Models\MemberModel;    // Model untuk anggota
use App\Models\BooksModel;       // Model untuk buku
use App\Models\PinjamModel; // Model untuk peminjaman
use App\Models\PengembalianModel; // Model untuk pengembalian

class Home extends BaseController
{
    // Deklarasi properti untuk model
    protected $pengunjungModel;
    protected $anggotaModel;
    protected $bukuModel;
    protected $peminjamanModel;
    protected $pengembalianModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->pengunjungModel = new ViewPengunjungModel();
        $this->anggotaModel = new MemberModel();
        $this->bukuModel = new BooksModel();
        $this->peminjamanModel = new PinjamModel();
        $this->pengembalianModel = new PengembalianModel();
    }

    public function dashboard()
    {
        // Mengambil data tanpa chart
        $data = [
            'judul' => 'Halaman Dashboard',
            'totalAnggota' => $this->anggotaModel->countAll(),
            'totalBuku' => $this->bukuModel->countAll(),
            'totalPeminjaman' => $this->peminjamanModel->countAll(),
            'totalPengembalian' => $this->pengembalianModel->countAll(),
        ];

        // Kirim data ke view
        return view('dashboard', $data);
    }
}
