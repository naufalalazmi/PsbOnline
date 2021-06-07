-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2020 pada 03.23
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pcsb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `nip` bigint(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` int(20) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki laki','perempuan') NOT NULL DEFAULT 'laki laki',
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id`, `nip`, `nama_lengkap`, `alamat`, `no_telepon`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `email`, `username`, `password`) VALUES
(1, 123456789, 'Admin', 'pamulang', 2147483647, 'pamulang', '1998-01-16', 'laki laki', 'admin@gmail.com', 'admin', '$2y$10$rikheEclzpBgDd7kcgPDMO22iZwVJ6LT8vP0B5pjU0QdA.hnpk9qe'),
(2, 1234567, 'Maghfira Aini', 'Pamulang', 2147483647, 'Pandeglang', '1998-10-27', 'perempuan', 'magfiraaini@gmail.com', 'fira', '$2y$10$dB9ruNULC2XFul/Qi7Q.YuuyLHyFow89U/nad2HmqFMWfxd3bR4Fu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_pembayaran` enum('lunas','belum lunas') NOT NULL DEFAULT 'belum lunas',
  `status_tes` enum('lulus','tidak lulus') DEFAULT NULL,
  `nilai_bindo` double DEFAULT NULL,
  `nilai_mtk` double DEFAULT NULL,
  `nilai_ipa` double DEFAULT NULL,
  `nilai_bing` double DEFAULT NULL,
  `nilai_rata2` double DEFAULT NULL,
  `no_form` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki laki','perempuan') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(155) NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `anak_kandung` int(2) DEFAULT NULL,
  `anak_tiri` int(2) DEFAULT NULL,
  `status_keluarga` enum('anak kandung','anak tiri','lainnya') NOT NULL,
  `register_date` date NOT NULL,
  `alamat_lengkap` varchar(155) NOT NULL,
  `alamat_rt` int(3) NOT NULL,
  `alamat_rw` int(3) NOT NULL,
  `alamat_no` int(3) NOT NULL,
  `alamat_desa` varchar(65) NOT NULL,
  `alamat_kecamatan` varchar(65) NOT NULL,
  `alamat_kabupaten` varchar(65) NOT NULL,
  `alamat_kodepos` varchar(65) NOT NULL,
  `alamat_hp` varchar(155) NOT NULL,
  `pendidikan_asal` varchar(155) NOT NULL,
  `pendidikan_no_ijazah` varchar(155) NOT NULL,
  `pendidikan_tahun_ijazah` varchar(45) NOT NULL,
  `pendidikan_nisn` varchar(13) NOT NULL,
  `pendidikan_npun` bigint(45) NOT NULL,
  `orangtua_ayah` varchar(155) NOT NULL,
  `orangtua_ibu` varchar(155) NOT NULL,
  `orangtua_pendidikan_ayah` varchar(155) NOT NULL,
  `orangtua_pendidikan_ibu` varchar(155) NOT NULL,
  `orangtua_pekerjaan_ayah` varchar(155) NOT NULL,
  `orangtua_pekerjaan_ibu` varchar(155) NOT NULL,
  `orangtua_alamat_lengkap` varchar(155) NOT NULL,
  `orangtua_alamat_rt` int(3) NOT NULL,
  `orangtua_alamat_rw` int(3) NOT NULL,
  `orangtua_alamat_no` int(3) NOT NULL,
  `orangtua_alamat_desa` varchar(65) NOT NULL,
  `orangtua_alamat_kecamatan` varchar(65) NOT NULL,
  `orangtua_alamat_kabupaten` varchar(65) NOT NULL,
  `orangtua_alamat_kodepos` varchar(65) NOT NULL,
  `orangtua_alamat_hp` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`id`, `id_user`, `id_pendaftaran`, `created_at`, `status_pembayaran`, `status_tes`, `nilai_bindo`, `nilai_mtk`, `nilai_ipa`, `nilai_bing`, `nilai_rata2`, `no_form`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `anak_ke`, `anak_kandung`, `anak_tiri`, `status_keluarga`, `register_date`, `alamat_lengkap`, `alamat_rt`, `alamat_rw`, `alamat_no`, `alamat_desa`, `alamat_kecamatan`, `alamat_kabupaten`, `alamat_kodepos`, `alamat_hp`, `pendidikan_asal`, `pendidikan_no_ijazah`, `pendidikan_tahun_ijazah`, `pendidikan_nisn`, `pendidikan_npun`, `orangtua_ayah`, `orangtua_ibu`, `orangtua_pendidikan_ayah`, `orangtua_pendidikan_ibu`, `orangtua_pekerjaan_ayah`, `orangtua_pekerjaan_ibu`, `orangtua_alamat_lengkap`, `orangtua_alamat_rt`, `orangtua_alamat_rw`, `orangtua_alamat_no`, `orangtua_alamat_desa`, `orangtua_alamat_kecamatan`, `orangtua_alamat_kabupaten`, `orangtua_alamat_kodepos`, `orangtua_alamat_hp`) VALUES
(5, 8, 4, '2020-10-29 15:28:32', 'lunas', 'lulus', 90, 80, 85, 90, 86.25, '2020-1006-4-001', 'Adienda Salsabilla Rahmawati', 'perempuan', 'Tangerang', '2006-05-30', 'Islam', 1, 1, 0, 'anak kandung', '2020-10-06', 'Kp. Sukamanah', 2, 5, 0, 'Taman Sari', 'Rumpin', 'Kabupaten Bogor', '-', '082258493352', 'MI Miftahul Ulum', '07/MI.28.08.055/PP.01.1/06/2018', '2018', '67366865', 0, '-', 'Sutiawati', '-', 'SMK', '-', 'Ibu Rumah Tangga', 'Kp. Sukamanah', 2, 5, 0, 'Taman Sari', 'Rumpin', 'Kabupaten Bogor', '-', '082258493352'),
(6, 10, 4, '2020-10-29 15:49:38', 'lunas', 'lulus', 93, 75, 78, 80, 81.5, '2020-1006-4-002', 'Azizah Risma Yadi', 'perempuan', 'Bogor', '2007-05-02', 'Islam', 7, 6, 0, 'anak kandung', '2020-10-07', 'Kp. Sukamanah', 3, 5, 4, 'Taman Sari', 'Rumpin', 'Kabupaten Bogor', '-', '083891162015', 'SD Negeri Taman Sari 01', '07/SD.02.08.055/PP.01.1/06/2018', '2018', '76374513', 0, 'Mulyadi', 'Saddah', 'SLTP', 'SD', 'Buruh', 'Ibu Rumah Tangga', 'Kp. Sukamanah', 3, 5, 4, 'Taman Sari', 'Rumpin', 'Kabupaten Bogor', '-', '083891162015'),
(7, 11, 4, '2020-10-29 15:50:50', 'lunas', 'lulus', 87, 85, 90, 70, 83, '2020-1006-4-003', 'Azriel Komara', 'laki laki', 'Bogor', '2007-08-15', 'Islam', 1, 1, 0, 'anak kandung', '2020-10-07', 'Kp. Panagan', 1, 11, 0, 'Taman Sari', 'Rumpin', 'Kabupaten Bogor', '-', '081388801251', 'SD Negeri Taman Sari 01', '07/SD.15.08.055/PP.01.1/06/2018', '2018', '74833189', 0, 'Arip', 'Kokom Komariah', 'SMP', 'MTS', 'Wiraswasta', 'Ibu Rumah Tangga', 'Kp. Panagan', 1, 11, 0, 'Taman Sari', 'Rumpin', 'Kabupaten Bogor', '-', '081388801251'),
(8, 12, 4, '2020-10-29 15:50:33', 'lunas', 'lulus', 78, 85, 83, 74, 80, '2020-1006-4-004', 'Delving Edis Triana', 'perempuan', 'Bogor', '2007-04-18', 'Islam', 3, 2, 0, 'anak kandung', '2020-10-07', 'Kp. Sentul', 1, 12, 14, 'Taman Sari', 'Rumpin', 'Kabupaten Bogor', '-', '085899054788', 'SD Negeri Taman Sari 03', '08/SD.18.08.055/PP.01.1/05/2019', '2019', '75643732', 0, 'Suradi', 'Mimin (Alm)', 'SLTA', 'SD', 'Wiraswasta', '-', 'Kp. Sentul', 1, 12, 14, 'Taman Sari', 'Rumpin', 'Kabupaten Bogor', '-', '085899054788'),
(9, 13, 4, '2020-10-29 15:49:58', 'lunas', 'lulus', 86, 79, 70, 80, 78.75, '2020-1006-4-005', 'Doni Pirmansyah', 'laki laki', 'Bogor', '2007-07-16', 'Islam', 1, 1, 0, 'anak kandung', '2020-10-07', 'Kp. Malingping', 5, 2, 3, 'Sukasari', 'Rumpin', 'Kabupaten Bogor', '-', '081245679009', 'SD Negeri Sukasari 02', '08/SD.16.07.055/PP.01.1/05/2019', '2019', '72496316', 0, 'Adam Madsuro', 'Inah Sumyati', 'Putus SD', 'Putus SD', 'Wiraswasta', 'Karyawan Swasta', 'Kp. Malingping', 5, 2, 3, 'Sukasari', 'Rumpin', 'Kabupaten Bogor', '-', '081245679009'),
(10, 14, 4, '2020-10-29 15:49:16', 'lunas', 'lulus', 85, 80, 80, 80, 81.25, '2020-1006-4-006', 'Arin  Fatim Azzahra', 'perempuan', 'Bogor', '2007-07-13', 'Islam', 3, 2, 0, 'anak kandung', '2020-10-10', 'Kp. Jambang', 4, 1, 0, 'Sukasari', 'Rumpin', 'Kabupaten Bogor', '-', '085719701063', 'SD Negeri Sukasari 02', '08/SD.13.08.007/PP.01.1/05/2019', '2019', '81790046', 0, 'Muhammad Arbawi', 'Sukma Iriyanti', 'SLTA', 'SD', 'Wiraswasta', 'Ibu Rumah Tangga', 'Kp. Jampang', 4, 1, 0, 'Sukasari', 'Rumpin', 'Kabupaten Bogor', '-', '085719701063'),
(11, 15, 4, '2020-10-29 15:48:57', 'lunas', 'lulus', 93, 75, 83, 90, 85.25, '2020-1006-4-007', 'Bunga Sahara', 'perempuan', 'Bogor', '2007-06-14', 'Islam', 4, 5, 0, 'anak kandung', '2020-10-07', 'Kp. Lame', 3, 4, 13, 'Sukasari', 'Rumpin', 'Kabupaten Bogor', '-', '081234562456', 'SD Negeri Sukasari 03', '07/SD.14.06.055/PP.01.1/05/2019', '2019', '76099934', 0, 'Madhasim', 'Patimah', 'SMP', 'MTS', 'Buruh', 'Buruh', 'Kp. Lame', 3, 4, 13, 'Sukasari', 'Rumpin', 'Kabupaten Bogor', '-', '081234562456'),
(12, 16, 4, '2020-10-29 15:48:36', 'lunas', 'lulus', 83, 80, 90, 85, 84.5, '2020-1006-4-008', 'Erisal Ananda Mulya', 'laki laki', 'Bogor', '2006-12-05', 'Islam', 1, 2, 0, 'anak kandung', '2020-10-07', 'Kp. Sukasirna', 1, 8, 0, 'Taman Sari', 'Rumpin', 'Kabupaten Bogor', '-', '082213456774', 'MI Nurul Hidayah', '06/MI.05.08.055/PP.01.1/05/2018', '2018', '65438410', 0, 'Muhamad Yusup', 'Lilih Suaedah', 'SD', '-', 'Karyawan', 'Ibu Rumah Tangga', 'Kp. Sukasirna', 1, 8, 0, 'Taman Sari', 'Rumpin', 'Kabupaten Bogor', '-', '082213456774'),
(13, 17, 4, '2020-10-29 15:24:24', 'lunas', 'lulus', 75, 70, 65, 70, 70, '2020-1006-4-009', 'Erina Oktapiani', 'laki laki', 'Bogor', '2006-10-10', 'Islam', 1, 0, 0, 'anak kandung', '2020-10-07', 'Kp. Jambang', 2, 1, 0, 'Sukasari', 'Rumpin', 'Kabupaten Bogor', '-', '082213456774', 'SD Negeri Sukasari 02', '05/SD.28.02.010/PP.01.1/05/2019', '2019', '61149208', 0, 'Andri Wijaya', 'Eliyawati', 'Putus SD', 'SMP', 'Wiraswasta', 'Ibu Rumah Tangga', 'Kp. Jampang', 2, 1, 0, 'Sukasari', 'Rumpin', 'Kabupaten Bogor', '-', '082213456774'),
(14, 18, 4, '2020-10-29 15:50:14', 'lunas', 'lulus', 80, 80, 75, 83, 79.5, '2020-1006-4-010', 'Erlangga', 'laki laki', 'Bogor', '2007-04-03', 'Islam', 1, 2, 0, 'anak kandung', '2020-10-19', 'Kp. Taringgul ', 5, 1, 0, 'Cipinang', 'Rumpin', 'Kabupaten Bogor', '-', '082213456774', 'SD Negeri Cipinang 06', '04/SD.28.08.055/PP.01.1/03/2018', '2018', '77871332', 0, 'Andi', 'Hernawati', 'SD', 'SD', 'Wiraswasta', 'Ibu Rumah Tangga', 'Kp. Taringgul', 6, 1, 0, 'Cipinang', 'Rumpin', 'Kabupaten Bogor', '-', '082213456774');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `title`, `date`, `created_at`, `start_date`, `end_date`) VALUES
(4, 'Penerimaan PSB Tahun Ajaran 2020/2021', '2020-10-19 00:30:00', '2020-10-06 08:31:59', '2020-10-04 00:30:00', '2020-10-11 05:59:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nisn` bigint(50) DEFAULT NULL,
  `no_telepon` int(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `nama_lengkap`, `email`, `nisn`, `no_telepon`, `password`) VALUES
(8, 'user', 'Adienda Salsabilla Rahmawati', 'adiendasalsabila@gmail.com', 67366865, 2147483647, '$2y$10$.otG2FBaSJWqd9hs4r8Ly.8YgfWHZqaa.AIGE3TSiLfA.Rtgzc5b.'),
(9, 'user', 'Anisah', 'anisah26@gmail.com', 63670417, 2147483647, '$2y$10$VHbvDw9jmgAomIZXzvaOU.d.W1SxRnNoLBYnn3UMMXM6PLDb9EWgW'),
(10, 'user', 'Azizah Risma Yadi', 'azizahrismayadi@gmail.com', 76374513, 2147483647, '$2y$10$t0/HeUwE2lC8m0yiSWwHiOn5/TJ1bGIT674V8icbMXuFqC03IL0FK'),
(11, 'user', 'Azriel Komara', 'azrielkomara@gmail.com', 74833189, 2147483647, '$2y$10$TqxEDP7zEfWIyBmq/Ismy.0bmdg359OEFS.MJUIii1d57.ePf6j8i'),
(12, 'user', 'Delving Eding Triana', 'delvingedistriana@gmail.com', 75643732, 2147483647, '$2y$10$uOzZdDugMHBKiLWtY5Ad0u3UcfSN9QeJ4WYn/NI9dI1lPbMLUBn7y'),
(13, 'user', 'Doni Pirmansyah', 'donipirmansyah@gmail.com', 72496316, 2147483647, '$2y$10$P5QUjmf2gj1.uq/6uxhshOdrDCGxPF/yFwDrcFzSWHV9fieNuSl3S'),
(14, 'user', 'Arin Fatim Azzahra', 'arinfatimazzahra@gmail.com', 81790046, 2147483647, '$2y$10$2Rf6.Uln1wAuwjNsgzmXCOxnlay0wVre50f6Me1wNeTGIriRKWfC6'),
(15, 'user', 'Bunga Sahara', 'bungasahara@gmail.com', 76099934, 2147483647, '$2y$10$tfIIdaNr1hKxzIWVynptHOZY9FVtyxh4aNxKMTBDcVWgZ1/pwbSAS'),
(16, 'user', 'Erisal Ananda Mulya', 'erisalanandamulya@gmail.com', 65438410, 2147483647, '$2y$10$0aJIkjUVlHdcWsiY8e9GKOSDbnoi9rsCsmP3/2bB8h9kT3Hj58gCG'),
(17, 'user', 'Erina Oktapiani', 'erinaoktapiani@gmail.com', 61149208, 2147483647, '$2y$10$BjQP3ksdTOS4pGWJgszFW./C9Zm50hKGE9i21MNFsjeHuf6tuEAxC'),
(18, 'user', 'Erlangga', 'erlangga@gmail.com', 77871332, 2147483647, '$2y$10$75cKSqhGngKahGxzKyulr.Fzo0BxJtNMDvlesgYp3plODzMJCiwDu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `nip_UNIQUE` (`nip`);

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_form_UNIQUE` (`no_form`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `nisn_UNIQUE` (`nisn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
