<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PinjamModel;
use App\Models\ViewPeminjamanModel;
 
class PinjamController extends BaseController
{
    protected $peminjaman, $view;

    public function __construct()
    {
        $this->peminjaman = new PinjamModel();
        $this->view = new ViewPeminjamanModel();
    }

    // Menampilkan data peminjaman buku
    public function tampilanPeminjaman()
    {
        // Mengambil data peminjaman melalui ViewPeminjamanModel
        $pinjaman = $this->view->findAll();

        $data = [
            'judul' => 'Data Peminjaman Buku',
            'pinjam' => $pinjaman, // Perbaikan penamaan variabel menjadi 'pinjaman'
        ];

        return view('peminjaman/tampilanPeminjaman', $data);
    }

    // Menampilkan form tambah data peminjaman
    public function tampilanTambah()
    {
        // Ambil tanggal hari ini
        $tanggalHariIni = date('Y-m-d'); // Format tanggal 'YYYY-MM-DD'

        // Ambil data pengunjung yang datang pada hari ini
        $pengunjungList = $this->peminjaman->getPengunjungPerHari($tanggalHariIni);

        $data = [
            'judul' => 'Form Tambah Data Peminjaman',
            'pengunjungList' => $pengunjungList, // Mengirimkan daftar pengunjung per hari
        ];

        return view('peminjaman/tampilanTambah', $data);
    }



    // Proses tambah data peminjaman
    public function tambahPeminjaman()
    {
        // Validasi form input
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
            'id_pengunjung' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'ID Pengunjung harus diisi.',
                    'numeric' => 'ID Pengunjung harus berupa angka.'
                ]
            ],
            'jumlah' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Jumlah harus diisi.',
                    'numeric' => 'Jumlah harus berupa angka.',
                    'greater_than' => 'Jumlah Peminjaman Buku harus lebih dari 0.'
                ]
            ],
            'durasi_peminjaman' => [
                'rules' => 'required|in_list[1 bulan,1 tahun]',
                'errors' => [
                    'required' => 'Durasi Peminjaman harus dipilih.',
                    'in_list' => 'Durasi Peminjaman harus berupa salah satu dari: 1 bulan atau 1 tahun.'
                ]
            ],
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }
        $id_buku = $this->request->getPost('id_buku');
        $id_pengunjung = $this->request->getPost('id_pengunjung');
        $id_anggota = $this->request->getPost('id_anggota');
        $jumlah = $this->request->getPost('jumlah');
        $durasi_peminjaman = $this->request->getPost('durasi_peminjaman');

        // Memanggil model PinjamModel untuk memeriksa data yang ada
        $anggota = $this->peminjaman->getAnggota($id_anggota);
        $buku = $this->peminjaman->getBuku($id_buku);
        $pengunjung = $this->peminjaman->getPengunjung($id_pengunjung);
        $stok = $this->peminjaman->getStok($id_buku);

        // Validasi data terkait (anggota, buku, pengunjung)
        if (!$anggota) {
            return redirect()->back()->withInput()->with('errors', 'ID Anggota tidak ditemukan dalam daftar pengunjung hari ini.');
        }
        if (!$buku) {
            return redirect()->back()->withInput()->with('errors', 'ID Buku tidak ditemukan.');
        }
        if (!$pengunjung) {
            return redirect()->back()->withInput()->with('errors', 'ID Pengunjung tidak ditemukan.');
        }

        // Validasi jumlah pinjam
        if ($stok <= 0) {
            return redirect()->back()->withInput()->with('errors', 'Stok buku habis. Tidak dapat melakukan peminjaman.');
        }
        if ($jumlah > $stok) {
            return redirect()->back()->withInput()->with('errors', 'Jumlah pinjam tidak boleh lebih dari stok yang tersedia.');
        }
        
        // Menyimpan data peminjaman
        $data = [
            'id_anggota' => $id_anggota,
            'id_buku' => $id_buku,
            'id_pengunjung' => $id_pengunjung,
            'jumlah' => $jumlah,
            'durasi_peminjaman' => $durasi_peminjaman,
        ];

        // Cek jika penyimpanan data gagal
        if (!$this->peminjaman->save($data)) {
            // Jika gagal, kembalikan ke form input dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', 'Gagal menyimpan data peminjaman.');
        }
        // Redirect setelah berhasil
        return redirect()->to('/peminjaman/tampilanPeminjaman')->with('berhasil', 'Data peminjaman berhasil ditambahkan.');
    }

}
