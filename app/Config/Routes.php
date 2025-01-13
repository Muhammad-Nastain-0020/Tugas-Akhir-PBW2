<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Default route untuk user login
$routes->get('/login', 'UserControl::index');  // Menampilkan halaman login (GET)
$routes->post('/login', 'UserControl::login');  // Menghandle proses login (POST)
$routes->get('/logout', 'UserControl::logout');  // Menghandle logout (GET)

// Dashboard
$routes->get('/', 'Home::dashboard', ['filter' => 'auth']);

// Routes Member
$routes->group('member', function ($routes) {
    $routes->get('tampilanMember', 'MemberControl::tampilanMember');
    $routes->get('tampilanTambah', 'MemberControl::tampilanTambah');
    $routes->post('tambahMember', 'MemberControl::tambahMember');
    $routes->get('tampilanEdit/(:segment)', 'MemberControl::tampilanEdit/$1');
    $routes->post('ubahMember', 'MemberControl::ubahMember');
    $routes->delete('(:num)', 'MemberControl::hapusMember/$1');
});

// Routes Buku
$routes->group('buku', function ($routes) {
    $routes->get('tampilanBuku', 'BooksController::tampilanBuku');
    $routes->get('tampilanTambah', 'BooksController::tampilanTambah');
    $routes->post('tambahBuku', 'BooksController::tambahBuku');
    $routes->get('tampilanEdit/(:segment)', 'BooksController::tampilanEdit/$1');
    $routes->post('ubahBuku', 'BooksController::ubahBuku');
    $routes->delete('(:segment)', 'BooksController::hapusBuku/$1');
}); 

// Routes Pengunjung
$routes->group('pengunjung', function ($routes) {
    $routes->get('tampilanPengunjung', 'PengunjungController::tampilanPengunjung');
    $routes->get('pengunjungBulanIni', 'PengunjungController::tampilanBulan');
    $routes->get('pengunjungTahunIni', 'PengunjungController::tampilanTahun');
    $routes->get('semuaPengunjung', 'PengunjungController::tampilanSemuaPengunjung');

    $routes->get('tampilanTambah', 'PengunjungController::tampilanTambah');
    $routes->post('tambahPengunjung', 'PengunjungController::tambahPengunjung');
    $routes->get('tampilanEdit/(:segment)', 'PengunjungController::tampilanEdit/$1');
    $routes->post('ubahPengunjung', 'PengunjungController::ubahPengunjung');
    
    $routes->get('laporanPengunjung', 'PengunjungController::laporanPengunjung');
    $routes->get('cetakLaporan', 'PengunjungController::cetakLaporan');


});

// Routes Peminjaman
$routes->group('peminjaman', function ($routes) {
    $routes->get('tampilanPeminjaman', 'PinjamController::tampilanPeminjaman');
    $routes->get('tampilanTambah', 'PinjamController::tampilanTambah');
    $routes->post('tambahPeminjaman', 'PinjamController::tambahPeminjaman');
});

// Routes Pengembalian
$routes->group('pengembalian', function ($routes) {
    $routes->get('tampilanPengembalian', 'PenggembalianController::tampilanPengembalian');
    $routes->get('tampilanTambah', 'PenggembalianController::tampilanTambah');
    $routes->post('tambahPengembalian', 'PenggembalianController::tambahPengembalian');
    
    $routes->get('laporanPengembalian', 'PenggembalianController::laporanPengembalian'); 
    $routes->get('cetakLaporan', 'PenggembalianController::cetakLaporan');
});
