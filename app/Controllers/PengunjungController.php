<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengunjungModel;
use App\Models\ViewPengunjungModel;
use Dompdf\Options;
use Dompdf\Dompdf;

class PengunjungController extends BaseController
{
    protected $pengunjungModel, $viewPengunjung;

    public function __construct()
    {
        $this->pengunjungModel = new PengunjungModel();
        $this->viewPengunjung = new ViewPengunjungModel();
    }

    // Menampilkan data pengunjung hari ini
    public function tampilanPengunjung()
    {
        // Mengambil data pengunjung melalui model ViewPengunjungModel
        $pengunjung = $this->viewPengunjung->getPengunjungHariIni();

        $data = [
            'judul' => 'Data Pengunjung Hari ini',
            'Pengunjung' => $pengunjung, // Menggunakan huruf kecil untuk variabel
        ]; 

        return view('pengunjung/tampilanPengunjung', $data);
    }
    public function tampilanBulan()
    {
        // Mengambil data pengunjung melalui model ViewPengunjungModel
        $pengunjung = $this->viewPengunjung->getPengunjungPerBulan();

        $data = [
            'judul' => 'Data Pengunjung Bulan ini',
            'Pengunjung' => $pengunjung, // Menggunakan huruf kecil untuk variabel
        ];

        return view('pengunjung/pengunjungBulanIni', $data);
    }
    public function tampilanTahun()
    {
        // Mengambil data pengunjung melalui model ViewPengunjungModel
        $pengunjung = $this->viewPengunjung->getPengunjungPerTahun();

        $data = [
            'judul' => 'Data Pengunjung Tahun Ini',
            'Pengunjung' => $pengunjung, // Menggunakan huruf kecil untuk variabel
        ];

        return view('pengunjung/pengunjungTahunIni', $data);
    }
    public function tampilanSemuaPengunjung()
    {
        // Mengambil data pengunjung melalui model ViewPengunjungModel
        $pengunjung = $this->viewPengunjung->getSemuaPengunjung();

        $data = [
            'judul' => 'Data Semua Pengunjung',
            'Pengunjung' => $pengunjung, // Menggunakan huruf kecil untuk variabel
        ];

        return view('pengunjung/semuaPengunjung', $data);
    }

    // Menampilkan form tambah data pengunjung
    public function tampilanTambah()
    {
        $data = [
            'judul' => 'Form Tambah Data Pengunjung Hari ini'
        ];

        return view('pengunjung/tampilanTambah', $data);
    }

    // Proses tambah data pengunjung
    public function tambahPengunjung()
    {
        // cek id anggota
        $id_anggota = $this->request->getPost('id_anggota');
        $anggota = $this->pengunjungModel->getAnggota($id_anggota);
        if (!$anggota) {
            return redirect()->back()->withInput()->with('errors', 'ID Anggota tidak ditemukan.');
        }
        
        // Validasi data input
        if (!$this->validate([
            'id_anggota' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'ID Anggota harus diisi.',
                    'numeric' => 'ID Anggota harus berupa angka.',
                ]
            ],
        ])) {
            // Jika validasi gagal, kembali ke form dengan input yang sudah dimasukkan
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Menyimpan data pengunjung, dengan keperluan tetap "Membaca Buku"
        $keperluan = "Membaca Buku";
        $this->pengunjungModel->save([
            'id_anggota' => $this->request->getPost('id_anggota'),
            'keperluan' => $keperluan, // Keperluan sudah diatur tetap "Membaca Buku"
        ]);

        // Redirect setelah berhasil menambahkan
        return redirect()->to('/pengunjung/tampilanPengunjung')->with('berhasil', 'Data pengunjung berhasil ditambahkan');
    } 

    public function laporanPengunjung()
    {
        // Mengambil data pengunjung melalui model ViewPengunjungModel
        $pengunjung = $this->viewPengunjung->getSemuaPengunjung();

        $data = [
            'judul' => 'Laporan Pengunjung',
            'Pengunjung' => $pengunjung, // Menggunakan huruf kecil untuk variabel
        ];

        return view('pengunjung/laporanPengunjung', $data);
    }

    public function cetakLaporan()
    {
        // Mengambil data pengunjung melalui model
        $pengunjung = $this->viewPengunjung->getSemuaPengunjung();

        // Menyusun data yang akan dimasukkan ke dalam laporan
        $data = [
            'judul' => 'Laporan Data Pengunjung',
            'pengunjung' => $pengunjung,
        ];
        return view('pengunjung/cetakLaporan', $data);
    }
        
}
