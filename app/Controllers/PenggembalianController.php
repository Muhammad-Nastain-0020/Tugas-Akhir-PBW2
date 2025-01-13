<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengembalianModel;
use App\Models\ViewPengembalianModel;

class PenggembalianController extends BaseController
{
    protected $pengembalianModel, $viewPengembalianModel;

    public function __construct()
    {
        $this->pengembalianModel = new PengembalianModel();
        $this->viewPengembalianModel = new ViewPengembalianModel();
    }

    // Menampilkan data pengembalian buku
    public function tampilanPengembalian()
    {
        $pengembalianList = $this->viewPengembalianModel->findAll();

        $data = [
            'judul' => 'Data Pengembalian Buku',
            'kembali' => $pengembalianList,
        ];

        return view('pengembalian/tampilanPengembalian', $data);
    }

    // Menampilkan form tambah data pengembalian buku
    public function tampilanTambah()
    {
        $tanggalHariIni = date('Y-m-d'); // Format tanggal hari ini
        $pengunjungList = $this->pengembalianModel->getPengunjungPerHari($tanggalHariIni); // Ambil daftar pengunjung
        $peminjamList = $this->pengembalianModel->getPeminjam(); // Ambil daftar peminjam yang memiliki pinjaman lebih dari 0

        $data = [
            'judul' => 'Form Tambah Data Pengembalian Buku',
            'pengunjungList' => $pengunjungList,
            'peminjamList' => $peminjamList,
        ];

        return view('pengembalian/tampilanTambah', $data);
    }

    public function tambahPengembalian()
    {
        // Validasi data input
        if (!$this->validate([
            'id_anggota' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'ID Anggota harus diisi.',
                    'numeric' => 'ID Anggota harus berupa angka.'
                ]
            ],
            'id_buku' => [
                'rules' => 'required|string',
                'errors' => [
                    'required' => 'ID Buku harus diisi.',
                    'string' => 'ID Buku harus berupa string.'
                ]
            ],
            'id_peminjam'       => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'ID Peminjam harus diisi',
                    'numeric'  => 'ID Peminjam harus berupa angka',
                ]
            ],
            'id_pengunjung' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'ID Pengunjung harus diisi',
                    'numeric'  => 'ID Pengunjung harus berupa angka',
                ]
            ],
            'jumlah_kembali' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Jumlah Pengembalian Buku harus diisi.',
                    'numeric' => 'Jumlah Pengembalian Buku harus berupa angka.',
                    'greater_than' => 'Jumlah Pengembalian Buku harus lebih dari 0.',
                ]
            ],
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $id_anggota = $this->request->getPost('id_anggota');
        $id_buku = $this->request->getPost('id_buku');
        $id_peminjam = $this->request->getPost('id_peminjam');
        $id_pengunjung = $this->request->getPost('id_pengunjung'); // Tambahkan ini
        $jumlahKembali  = $this->request->getPost('jumlah_kembali');

        $anggota = $this->pengembalianModel->getAnggota($id_anggota);
        $buku = $this->pengembalianModel->getBuku($id_buku);
        $jPinjam = $this->pengembalianModel->getJumlah($id_peminjam);

        // Validasi ID Buku, Pengunjung, dan Anggota
        if (!$anggota) {
            return redirect()->back()->withInput()->with('errors', 'ID Anggota tidak ditemukan dalam data Peminjaman');
        }
        if (!$buku) {
            return redirect()->back()->withInput()->with('errors', 'Buku dengan ID ' . $id_buku . ' tidak sedang dipinjam');
        }

        // Validasi jumlah Pengembalian Buku
        if ($jPinjam <= 0) {
            return redirect()->back()->withInput()->with('errors', 'Jumlah Buku yang dipinjam habis. Tidak dapat melakukan Pengembalian.');
        }
        if ($jumlahKembali > $jPinjam) {
            return redirect()->back()->withInput()->with('errors', 'Jumlah Pengembalian tidak boleh lebih dari Jumlah Buku yang dipinjam.');
        }

        // Menyimpan data pengembalian
        $data = [
            'id_anggota' => $id_anggota,
            'id_buku' => $id_buku,
            'id_pengunjung' => $id_pengunjung,
            'id_peminjam' => $id_peminjam,
            'jumlah_kembali' => $jumlahKembali,
        ];

        // Cek jika penyimpanan data gagal
        if (!$this->pengembalianModel->save($data)) {
            // Jika gagal, kembalikan ke form input dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', 'Gagal menyimpan data pengembalian.');
        }

        return redirect()->to('/pengembalian/tampilanPengembalian')->with('berhasil', 'Data pengembalian berhasil ditambahkan');
    }

    public function laporanPengembalian()
    {
        $pengembalianList = $this->viewPengembalianModel->findAll();

        $data = [
            'judul' => 'Data Pengembalian Buku',
            'kembali' => $pengembalianList,
        ];

        return view('pengembalian/laporanPengembalian', $data);
    }

    public function cetakLaporan()
    {
        $pengembalianList = $this->viewPengembalianModel->findAll();

        $data = [
            'judul' => 'Data Pengembalian Buku',
            'kembali' => $pengembalianList,
        ];

        return view('pengembalian/cetakLaporan', $data);
    }
}
