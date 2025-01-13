-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2025 pada 09.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_0020`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id_buku` char(5) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `jenis_buku` enum('Buku Paket','Buku Non-Paket','Buku Rumus','') NOT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `penerbit` varchar(100) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id_buku`, `judul_buku`, `jenis_buku`, `penulis`, `penerbit`, `tahun_terbit`, `stok`) VALUES
('BN001', 'Kisah 25 Nabi ', 'Buku Non-Paket', 'Salman ', 'Pertiwi', '2014', 10),
('BN002', 'Kamus Bahasa Jawa', 'Buku Non-Paket', 'Joko Sudarjo', 'Sudarmanto', '2014', 40),
('BP001', 'Buku Bahasa Indonesia Kelas 7', 'Buku Paket', 'Siti maemunah', 'Indonesia', '2014', 90),
('BP002', 'Buku Ilmu Pengetahuan Alam Kelas 8', 'Buku Paket', 'Budi Santoso', 'Budi', '2014', 90),
('BP003', 'Matematika Kelas 8', 'Buku Paket', 'Siti Nur afiyah', 'Jaya Baya', '2018', 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id_anggota` char(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','') NOT NULL,
  `keterangan` enum('Kelas 7','Kelas 8','Kelas 9','Guru','Staf') NOT NULL,
  `kota_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id_anggota`, `nama`, `jenis_kelamin`, `keterangan`, `kota_lahir`, `tanggal_lahir`, `alamat`) VALUES
('15001', 'Riski', 'Laki-laki', 'Kelas 8', 'Pekalongan', '2025-01-01', 'Pekalongan'),
('15002', 'Andika Nugroho', 'Laki-laki', 'Kelas 7', 'Pekalongan', '2007-02-07', 'Pekalongan Barat'),
('15003', 'Mia', 'Perempuan', 'Kelas 7', 'Pekalongan', '2007-02-14', 'Pekalongan Selatan'),
('2121212121', 'Yusuf', 'Laki-laki', 'Guru', 'Pekalongan', '1992-01-15', 'Pekalongan Barat'),
('2929292929', 'Maskur', 'Laki-laki', 'Staf', 'Pekalongan', '1990-02-14', 'Pekalongan Timur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-12-16-073318', 'App\\Database\\Migrations\\Users', 'default', 'App', 1734334626, 1),
(2, '2024-12-16-090313', 'App\\Database\\Migrations\\Members', 'default', 'App', 1734340571, 2),
(3, '2024-12-16-090347', 'App\\Database\\Migrations\\Books', 'default', 'App', 1734340571, 2),
(4, '2024-12-18-065455', 'App\\Database\\Migrations\\Peminjaman', 'default', 'App', 1734507334, 3),
(5, '2024-12-18-065527', 'App\\Database\\Migrations\\Pengembalian', 'default', 'App', 1734507334, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjam` int(11) NOT NULL,
  `id_anggota` char(16) NOT NULL,
  `id_buku` char(5) NOT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT current_timestamp(),
  `durasi_peminjaman` enum('1 bulan','1 tahun','','') NOT NULL,
  `batas_pengembalian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjam`, `id_anggota`, `id_buku`, `id_pengunjung`, `jumlah`, `tanggal_pinjam`, `durasi_peminjaman`, `batas_pengembalian`) VALUES
(1, '15002', 'BP001', 3, 0, '2025-01-05 05:29:11', '1 tahun', '2026-01-05 05:29:11'),
(2, '15003', 'BP002', 1, 0, '2025-01-05 05:29:11', '1 bulan', '2025-02-05 05:29:11'),
(3, '2121212121', 'BN001', 4, 0, '2025-01-05 05:29:11', '1 bulan', '2025-02-05 05:29:11'),
(4, '15002', 'BP002', 5, 0, '2025-01-06 09:44:13', '1 bulan', '2025-02-06 09:44:13'),
(5, '2929292929', 'BN002', 7, 0, '2025-01-07 02:54:58', '1 bulan', '2025-02-07 02:54:58'),
(6, '15002', 'BP002', 8, 0, '2025-01-07 03:52:30', '1 bulan', '2025-02-07 03:52:30'),
(7, '15003', 'BP002', 9, 0, '2025-01-09 03:44:18', '1 bulan', '2025-02-09 03:44:18'),
(9, '15002', 'BP002', 10, 0, '2025-01-12 03:14:08', '1 bulan', '2025-02-12 03:14:08'),
(10, '15001', 'BN001', 13, 0, '2025-01-12 08:06:00', '1 bulan', '2025-02-12 08:06:00');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `ket_pinjam` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
    -- Update stok buku setelah peminjaman
    UPDATE books 
    SET stok = stok - NEW.jumlah 
    WHERE id_buku = NEW.id_buku;

    -- Update keperluan pengunjung setelah peminjaman
    UPDATE pengunjung
    SET keperluan = 'Meminjam Buku'
    WHERE id_pengunjung = NEW.id_pengunjung;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_batas_waktu_1bulan` BEFORE INSERT ON `peminjaman` FOR EACH ROW BEGIN 
    	IF NEW.durasi_peminjaman = '1 bulan' THEN 
        	SET NEW.batas_pengembalian = DATE_ADD(NEW.tanggal_pinjam,  INTERVAL 1 MONTH);
        END IF;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_batas_waktu_1tahun` BEFORE INSERT ON `peminjaman` FOR EACH ROW BEGIN 
        IF New.durasi_peminjaman = '1 tahun' THEN 
        	SET NEW.batas_pengembalian = DATE_ADD(NEW.tanggal_pinjam,  INTERVAL 1 YEAR);
        END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembali` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `id_anggota` char(16) NOT NULL,
  `id_buku` char(5) NOT NULL,
  `jumlah_kembali` int(11) NOT NULL,
  `tanggal_kembali` timestamp NOT NULL DEFAULT current_timestamp(),
  `denda` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembali`, `id_peminjam`, `id_pengunjung`, `id_anggota`, `id_buku`, `jumlah_kembali`, `tanggal_kembali`, `denda`) VALUES
(1, 2, 1, '15003', 'BP002', 1, '2025-01-06 07:10:37', 0.00),
(2, 2, 1, '15003', 'BP002', 1, '2025-01-06 07:48:19', 0.00),
(4, 1, 3, '15002', 'BP001', 3, '2025-01-06 08:02:24', 0.00),
(6, 3, 4, '2121212121', 'BN001', 3, '2025-02-07 09:04:00', 2000.00),
(7, 4, 6, '15003', 'BP002', 1, '2025-01-06 09:56:26', 0.00),
(8, 5, 7, '2929292929', 'BN002', 4, '2025-01-07 02:57:45', 0.00),
(9, 5, 7, '2929292929', 'BN002', 1, '2025-01-07 02:58:22', 0.00),
(10, 6, 8, '15002', 'BP002', 1, '2025-01-07 04:06:55', 0.00),
(11, 6, 8, '15002', 'BP002', 1, '2025-01-07 04:15:46', 0.00),
(12, 7, 9, '15003', 'BP002', 1, '2025-01-09 03:46:03', 0.00),
(13, 7, 9, '15003', 'BP002', 1, '2025-02-14 03:46:21', 5000.00),
(17, 9, 12, '15002', 'BP002', 2, '2025-01-12 04:33:28', 0.00),
(18, 10, 13, '15001', 'BN001', 1, '2025-01-12 08:06:31', 0.00);

--
-- Trigger `pengembalian`
--
DELIMITER $$
CREATE TRIGGER `hitung_denda` BEFORE INSERT ON `pengembalian` FOR EACH ROW BEGIN
    DECLARE jumlah_hari_terlambat INT;
    DECLARE jumlah_denda INT;

    -- Hitung keterlambatan
    SET jumlah_hari_terlambat = GREATEST(
        DATEDIFF(NEW.tanggal_kembali, (SELECT batas_pengembalian FROM peminjaman WHERE id_peminjam = NEW.id_peminjam)),
        0
    );

    -- Hitung denda
    SET jumlah_denda = jumlah_hari_terlambat * 1000;

    -- Masukkan langsung ke kolom denda
    SET NEW.denda = jumlah_denda;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ket_kembali` AFTER INSERT ON `pengembalian` FOR EACH ROW BEGIN
    -- Update keperluan pengunjung
    UPDATE pengunjung 
    SET keperluan = 'Menggembalikan Buku' 
    WHERE id_pengunjung = NEW.id_pengunjung;

    -- Update stok buku
    UPDATE books 
    SET stok = stok + NEW.jumlah_kembali 
    WHERE id_buku = NEW.id_buku;

    -- Update jumlah peminjaman
    UPDATE peminjaman 
    SET jumlah = jumlah - NEW.jumlah_kembali 
    WHERE id_peminjam = NEW.id_peminjam;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `id_anggota` char(16) NOT NULL,
  `waktu_kunjungan` timestamp NOT NULL DEFAULT current_timestamp(),
  `keperluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `id_anggota`, `waktu_kunjungan`, `keperluan`) VALUES
(1, '15003', '2025-01-05 05:16:48', 'Menggembalikan Buku'),
(2, '2929292929', '2025-01-05 05:18:52', 'Membaca Buku'),
(3, '15002', '2025-01-05 05:19:01', 'Menggembalikan Buku'),
(4, '2121212121', '2025-01-05 05:19:55', 'Menggembalikan Buku'),
(5, '15002', '2025-01-06 09:39:58', 'Meminjam Buku'),
(6, '15002', '2025-01-06 09:55:59', 'Menggembalikan Buku'),
(7, '2929292929', '2025-01-07 02:54:17', 'Menggembalikan Buku'),
(8, '15002', '2025-01-07 03:51:57', 'Menggembalikan Buku'),
(9, '15003', '2025-01-09 03:40:20', 'Menggembalikan Buku'),
(10, '15002', '2025-01-12 03:06:44', 'Menggembalikan Buku'),
(11, '15003', '2025-01-12 03:09:48', 'Menggembalikan Buku'),
(12, '15002', '2025-01-12 04:16:58', 'Menggembalikan Buku'),
(13, '15001', '2025-01-12 08:04:11', 'Menggembalikan Buku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `token`, `last_login`) VALUES
(1, 'admin', '$2y$10$LGGglDoaiagvwQV59VdrwuGAz2/wXYOxJph.Laq4Vmzr5RbIahFMS', 'Muhammad Nastain', '', '2024-12-16 07:44:38');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_peminjaman`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_peminjaman` (
`id_peminjam` int(11)
,`id_anggota` char(16)
,`nama` varchar(100)
,`keterangan` enum('Kelas 7','Kelas 8','Kelas 9','Guru','Staf')
,`id_buku` char(5)
,`judul_buku` varchar(100)
,`jenis_buku` enum('Buku Paket','Buku Non-Paket','Buku Rumus','')
,`id_pengunjung` int(11)
,`jumlah` int(5)
,`tanggal_pinjam` timestamp
,`durasi_peminjaman` enum('1 bulan','1 tahun','','')
,`batas_pengembalian` timestamp
,`alamat` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pengembalian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pengembalian` (
`id_pengembali` int(11)
,`id_anggota` char(16)
,`nama` varchar(100)
,`keterangan` enum('Kelas 7','Kelas 8','Kelas 9','Guru','Staf')
,`id_buku` char(5)
,`judul_buku` varchar(100)
,`jenis_buku` enum('Buku Paket','Buku Non-Paket','Buku Rumus','')
,`id_pengunjung` int(11)
,`id_peminjam` int(11)
,`jumlah` int(5)
,`jumlah_kembali` int(11)
,`tanggal_pinjam` timestamp
,`batas_pengembalian` timestamp
,`tanggal_kembali` timestamp
,`denda` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pengunjung`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pengunjung` (
`id_pengunjung` int(11)
,`id_anggota` char(16)
,`nama` varchar(100)
,`keperluan` varchar(30)
,`waktu_kunjungan` timestamp
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_peminjaman`
--
DROP TABLE IF EXISTS `view_peminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_peminjaman`  AS SELECT `peminjaman`.`id_peminjam` AS `id_peminjam`, `members`.`id_anggota` AS `id_anggota`, `members`.`nama` AS `nama`, `members`.`keterangan` AS `keterangan`, `books`.`id_buku` AS `id_buku`, `books`.`judul_buku` AS `judul_buku`, `books`.`jenis_buku` AS `jenis_buku`, `pengunjung`.`id_pengunjung` AS `id_pengunjung`, `peminjaman`.`jumlah` AS `jumlah`, `peminjaman`.`tanggal_pinjam` AS `tanggal_pinjam`, `peminjaman`.`durasi_peminjaman` AS `durasi_peminjaman`, `peminjaman`.`batas_pengembalian` AS `batas_pengembalian`, `members`.`alamat` AS `alamat` FROM (((`peminjaman` join `members` on(`peminjaman`.`id_anggota` = `members`.`id_anggota`)) join `books` on(`peminjaman`.`id_buku` = `books`.`id_buku`)) join `pengunjung` on(`peminjaman`.`id_pengunjung` = `pengunjung`.`id_pengunjung`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pengembalian`
--
DROP TABLE IF EXISTS `view_pengembalian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pengembalian`  AS SELECT `pengembalian`.`id_pengembali` AS `id_pengembali`, `members`.`id_anggota` AS `id_anggota`, `members`.`nama` AS `nama`, `members`.`keterangan` AS `keterangan`, `books`.`id_buku` AS `id_buku`, `books`.`judul_buku` AS `judul_buku`, `books`.`jenis_buku` AS `jenis_buku`, `pengunjung`.`id_pengunjung` AS `id_pengunjung`, `peminjaman`.`id_peminjam` AS `id_peminjam`, `peminjaman`.`jumlah` AS `jumlah`, `pengembalian`.`jumlah_kembali` AS `jumlah_kembali`, `peminjaman`.`tanggal_pinjam` AS `tanggal_pinjam`, `peminjaman`.`batas_pengembalian` AS `batas_pengembalian`, `pengembalian`.`tanggal_kembali` AS `tanggal_kembali`, `pengembalian`.`denda` AS `denda` FROM ((((`pengembalian` join `members` on(`pengembalian`.`id_anggota` = `members`.`id_anggota`)) join `books` on(`pengembalian`.`id_buku` = `books`.`id_buku`)) join `peminjaman` on(`pengembalian`.`id_peminjam` = `peminjaman`.`id_peminjam`)) join `pengunjung` on(`pengembalian`.`id_pengunjung` = `pengunjung`.`id_pengunjung`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pengunjung`
--
DROP TABLE IF EXISTS `view_pengunjung`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pengunjung`  AS SELECT `pengunjung`.`id_pengunjung` AS `id_pengunjung`, `members`.`id_anggota` AS `id_anggota`, `members`.`nama` AS `nama`, `pengunjung`.`keperluan` AS `keperluan`, `pengunjung`.`waktu_kunjungan` AS `waktu_kunjungan` FROM (`pengunjung` join `members` on(`pengunjung`.`id_anggota` = `members`.`id_anggota`)) ORDER BY `pengunjung`.`id_pengunjung` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembali`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_peminjam` (`id_peminjam`),
  ADD KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `members` (`id_anggota`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `books` (`id_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_pengunjung`) REFERENCES `pengunjung` (`id_pengunjung`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `members` (`id_anggota`),
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `books` (`id_buku`),
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`id_peminjam`) REFERENCES `peminjaman` (`id_peminjam`),
  ADD CONSTRAINT `pengembalian_ibfk_4` FOREIGN KEY (`id_pengunjung`) REFERENCES `pengunjung` (`id_pengunjung`);

--
-- Ketidakleluasaan untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD CONSTRAINT `pengunjung_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `members` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
