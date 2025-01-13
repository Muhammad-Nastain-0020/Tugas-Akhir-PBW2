<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BooksModel;
 
class BooksController extends BaseController
{
    protected $booksModel;

    public function __construct()
    {
        $this->booksModel = new BooksModel();
    }

    public function tampilanBuku()
    {
        $Buku = $this->booksModel->findAll();

        $data = [
            'judul' => 'Data Buku',
            'Buku' => $Buku,
        ];

        return view('buku/tampilanBuku', $data);
    }

    // Menampilkan form tambah data buku
    public function tampilanTambah()
    {
        $data = [
            'judul' => 'Form Tambah Data Buku'
        ];

        return view('buku/tampilanTambah', $data);
    }

    // Proses tambah data buku
    public function tambahBuku()
{
    // Validasi data input
    if (!$this->validate([
        'id_buku' => [
            'rules' => 'required|is_unique[books.id_buku]|max_length[5]',
            'errors' => [
                'required' => 'ID buku harus diisi',
                'is_unique' => 'ID buku sudah terdaftar',
                'max_length' => 'ID buku tidak boleh lebih dari 5 karakter'
            ]
        ],
        'judul_buku' => [
            'rules' => 'required|string|max_length[100]',
            'errors' => [
                'required' => 'Judul buku harus diisi',
                'max_length' => 'Judul buku tidak boleh lebih dari 100 karakter'
            ]
        ],
        'jenis_buku' => [
            'rules' => 'required|in_list[Buku Paket,Buku Non-Paket,Buku Rumus]',
            'errors' => [
                'required' => 'Jenis buku harus diisi',
                'in_list' => 'Jenis buku harus sesuai dengan daftar yang tersedia'
            ]
        ],
        'penulis' => [
            'rules' => 'required|string|max_length[100]',
            'errors' => [
                'required' => 'Penulis buku harus diisi',
                'max_length' => 'Penulis tidak boleh lebih dari 100 karakter'
            ]
        ],
        'penerbit' => [
            'rules' => 'required|string|max_length[100]',
            'errors' => [
                'required' => 'Penerbit buku harus diisi',
                'max_length' => 'Penerbit tidak boleh lebih dari 100 karakter'
            ]
        ],
        'tahun_terbit' => [
            'rules' => 'required|numeric|exact_length[4]',
            'errors' => [
                'required' => 'Tahun terbit buku harus diisi',
                'numeric' => 'Tahun terbit buku harus berupa angka',
                'exact_length' => 'Tahun terbit harus terdiri dari 4 digit'
            ]
        ],
        'stok' => [
            'rules' => 'required|numeric|greater_than_equal_to[0]',
            'errors' => [
                'required' => 'Stok buku harus diisi',
                'numeric' => 'Stok buku harus berupa angka',
                'greater_than_equal_to' => 'Stok buku harus minimal 0'
            ]
        ]
    ])) {
        return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
    }

    // Menyimpan data buku
    $this->booksModel->save([
        'id_buku' => $this->request->getPost('id_buku'),
        'judul_buku' => $this->request->getPost('judul_buku'),
        'jenis_buku' => $this->request->getPost('jenis_buku'),
        'penulis' => $this->request->getPost('penulis'),
        'penerbit' => $this->request->getPost('penerbit'),
        'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        'stok' => $this->request->getPost('stok')
    ]);

    return redirect()->route('buku/tampilanBuku')->with('berhasil', 'Data berhasil ditambahkan');
}


    // Menampilkan form edit data buku
    public function tampilanEdit($id_buku)
    {
        $buku = $this->booksModel->find($id_buku);

        // Jika data tidak ditemukan
        if (!$buku) {
            return redirect()->route('buku/tampilanBuku')->with('error', "Data dengan ID buku $id_buku tidak ditemukan");
        }

        $data = [
            'judul' => 'Form Edit Data Buku',
            'buku' => $buku,
        ];

        return view('buku/tampilanEdit', $data);
    }

    // Proses ubah data buku
    public function ubahBuku()
    {
        $id_buku = $this->request->getPost('id_buku'); // Ambil id_buku dari form

        // Validasi data input
        if (!$this->validate([
            'judul_buku' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Judul buku harus diisi',
                    'max_length' => 'Judul buku tidak boleh lebih dari 100 karakter'
                ]
            ],
            'jenis_buku' => [
                'rules' => 'required|in_list[Buku Paket,Buku Non-Paket,Buku Rumus]',
                'errors' => [
                    'required' => 'Jenis buku harus diisi',
                    'in_list' => 'Jenis buku harus sesuai dengan daftar yang tersedia'
                ]
            ],
            'penulis' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Penulis buku harus diisi',
                    'max_length' => 'Penulis tidak boleh lebih dari 100 karakter'
                ]
            ],
            'penerbit' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Penerbit buku harus diisi',
                    'max_length' => 'Penerbit tidak boleh lebih dari 100 karakter'
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|numeric|exact_length[4]',
                'errors' => [
                    'required' => 'Tahun terbit buku harus diisi',
                    'numeric' => 'Tahun terbit buku harus berupa angka',
                    'exact_length' => 'Tahun terbit harus terdiri dari 4 digit'
                ]
            ],
            'stok' => [
                'rules' => 'required|numeric|greater_than_equal_to[0]',
                'errors' => [
                    'required' => 'Stok buku harus diisi',
                    'numeric' => 'Stok buku harus berupa angka',
                    'greater_than_equal_to' => 'Stok buku harus minimal 0'
                ]
            ]
        ])) {
            // Jika validasi gagal, kembali ke form dengan input yang sudah dimasukkan
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Ambil data yang dikirim oleh form, kecuali id_buku
        $dataUpdate = [
            'judul_buku' => $this->request->getPost('judul_buku'),
            'jenis_buku' => $this->request->getPost('jenis_buku'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'stok' => $this->request->getPost('stok')
        ];

        // Mengupdate data buku
        if ($this->booksModel->update($id_buku, $dataUpdate)) {
            return redirect()->route('buku/tampilanBuku')->with('berhasil', 'Data berhasil diubah');
        } else {
            // Jika update gagal, beri pesan error
            return redirect()->back()->with('error', 'Gagal mengubah data buku');
        }
    }
    // Menghapus data buku
    public function hapusBuku($id_buku)
    {
        // Memeriksa apakah buku dengan id_buku ada
        if (!$this->booksModel->find($id_buku)) {
            return redirect()->route('buku/tampilanBuku')->with('error', "Data dengan ID buku $id_buku tidak ditemukan");
        }

        // Menghapus data buku

        if(!$this->booksModel->delete($id_buku)){
            return redirect()->route('buku/tampilanBuku')->with('error', "Data tidak bisa dihapus");
        }
        return redirect()->route('buku/tampilanBuku')->with('berhasil', 'Data berhasil dihapus');
    }
}
