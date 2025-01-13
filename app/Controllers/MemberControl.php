<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class MemberControl extends BaseController
{
    protected $memberModel;

    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }

    // Menampilkan data anggota
    public function tampilanMember()
    {
        $data = [
            'judul' => 'Data Anggota',
            'getMember' => $this->memberModel->findAll(),
        ];

        return view('member/tampilanMember', $data);
    }

    // Menampilkan form tambah data anggota
    public function tampilanTambah()
    {
        $data = [
            'judul' => 'Form Tambah Data Anggota'
        ];

        return view('member/tampilanTambah', $data);
    }

    // Proses tambah data anggota
    public function tambahMember()
    {
        // Validasi data input
        if (!$this->validate([
            'id_anggota'    => [
                'rules' => 'required|is_unique[members.id_anggota]|max_length[16]',
                'errors' => [
                    'required' => 'ID Anggota harus diisi',
                    'is_unique' => 'ID Anggota sudah terdaftar',
                    'max_length' => 'ID Anggota tidak boleh lebih dari 16 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Nama anggota harus diisi',
                    'max_length' => 'Nama anggota tidak boleh lebih dari 100 karakter'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required|in_list[Laki-laki,Perempuan]',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi',
                    'in_list' => 'Jenis Kelamin harus dipilih antara Laki-laki atau Perempuan'
                ]
            ],
            'keterangan' => [
                'rules' => 'required|in_list[Kelas 7,Kelas 8,Kelas 9,Guru,Staf]',
                'errors' => [
                    'required' => 'Keterangan harus diisi',
                    'in_list' => 'Keterangan harus sesuai dengan opsi yang tersedia'
                ]
            ],
            'kota_lahir'   => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Kota Lahir harus diisi',
                    'max_length' => 'Kota Lahir tidak boleh lebih dari 100 karakter'
                ]
            ],
            'tanggal_lahir'   => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi',
                    'valid_date' => 'Tanggal Lahir harus diisi dengan format yang benar'
                ]
            ],
            'alamat'   => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Alamat Anggota harus diisi',
                    'max_length' => 'Alamat tidak boleh lebih dari 255 karakter'
                ]
            ]
        ])) {
            // Jika validasi gagal, kembali ke form dengan input yang sudah dimasukkan
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Menyimpan data anggota
        $this->memberModel->save([
            'id_anggota'    => $this->request->getPost('id_anggota'),
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'kota_lahir'    => $this->request->getPost('kota_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat'        => $this->request->getPost('alamat'),
        ]);

        // Redirect setelah berhasil menambahkan
        return redirect()->route('member/tampilanMember')->with('berhasil', 'Data berhasil ditambahkan');
    }


    // Menampilkan form edit data anggota
    public function tampilanEdit($id_anggota)
    {
        $member = $this->memberModel->find($id_anggota);

        // Jika data tidak ditemukan
        if (!$member) {
            return redirect()->route('member/tampilanMember')->with('gagal', "Data dengan ID Anggota $id_anggota tidak ditemukan");
        }

        $data = [
            'judul' => 'Form Edit Data Anggota',
            'member' => $member,
        ];

        return view('member/tampilanEdit', $data);
    }

    // Proses ubah data anggota
    public function ubahMember()
    {
        $id_anggota = $this->request->getPost('id_anggota'); // Ambil id_anggota dari form

        // Validasi data input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Nama anggota harus diisi',
                    'max_length' => 'Nama anggota tidak boleh lebih dari 100 karakter'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required|in_list[Laki-laki,Perempuan]',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi',
                    'in_list' => 'Jenis Kelamin harus dipilih antara Laki-laki atau Perempuan'
                ]
            ],
            'keterangan' => [
                'rules' => 'required|in_list[Kelas 7,Kelas 8,Kelas 9,Guru,Staf]',
                'errors' => [
                    'required' => 'Keterangan harus diisi',
                    'in_list' => 'Keterangan harus sesuai dengan opsi yang tersedia'
                ]
            ],
            'kota_lahir'   => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Kota Lahir harus diisi',
                    'max_length' => 'Kota Lahir tidak boleh lebih dari 100 karakter'
                ]
            ],
            'tanggal_lahir'   => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi',
                    'valid_date' => 'Tanggal Lahir harus diisi dengan format yang benar'
                ]
            ],
            'alamat'   => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Alamat Anggota harus diisi',
                    'max_length' => 'Alamat tidak boleh lebih dari 255 karakter'
                ]
            ]
        ])) {
            // Jika validasi gagal, kembali ke form dengan input yang sudah dimasukkan
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Ambil data yang dikirim oleh form, kecuali id_anggota
        $dataUpdate = [
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'kota_lahir'    => $this->request->getPost('kota_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat'        => $this->request->getPost('alamat'),
        ];

        if ($this->memberModel->update($id_anggota, $dataUpdate)) {
            return redirect()->route('member/tampilanMember')->with('berhasil', 'Data berhasil diubah');
        } else {
            return redirect()->back()->with('gagal', 'Gagal mengubah data anggota');
        }
    }


    // Menghapus data anggota
    public function hapusMember($id_anggota)
    {
        // Memeriksa apakah anggota dengan id_anggota ada
        if (!$this->memberModel->find($id_anggota)) {
            return redirect()->route('member/tampilanMember')->with('gagal', "Data dengan ID Anggota $id_anggota tidak ditemukan");
        }

        // Menghapus data anggota
        if (!$this->memberModel->delete($id_anggota)) {
            return redirect()->route('member/tampilanMember')->with('gagal', "Data tidak bisa dihapus");
        }
        return redirect()->route('member/tampilanMember')->with('berhasil', 'Data berhasil dihapus');
    }
}
