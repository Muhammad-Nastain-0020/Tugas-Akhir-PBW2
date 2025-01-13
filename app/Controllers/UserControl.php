<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserControl extends BaseController
{
    public function index()
    {
        // Menampilkan halaman login
        return view('login/login');
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();

        // Validasi input menggunakan aturan CodeIgniter 4
        $validationRules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi.',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.',
                ],
            ],
        ];

        // Validasi data dari form
        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan form dengan error
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan username
        $user = $userModel->getData($username);
        
        if (!$user) {
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->back()->withInput();
        }
        
        if (!password_verify($password, $user->password)) {
            $session->setFlashdata('error', 'Password salah.');
            return redirect()->back()->withInput();
        }

        // Set session jika login berhasil
        $session->set([
            'isLoggedIn' => true,
            'username' => $user->username,
            'nama_lengkap' => $user->nama_lengkap,
        ]);

        // Redirect ke dashboard setelah berhasil login
        return redirect()->to('/');
    }

    public function logout()
    {
        $session = session();

        // Mengecek jika session 'isLoggedIn' ada
        if ($session->has('isLoggedIn')) {
            // Hapus session jika ada
            $session->destroy();
        }

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}
