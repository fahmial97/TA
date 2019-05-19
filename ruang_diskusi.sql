-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2019 pada 09.07
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruang_diskusi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `nip`, `no_telpon`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES
(11, 'Madzar Maulana R', '12345', '082210835167', 'fuadgila@gmail.com', '$2y$10$6zAildmwGKjfi7rR.1Fh5.BRsqLId4iR0oIiEQRvpIeO19oqJ/DdK', 'img1.jpg', 1, 1556776697),
(15, 'fuad ajeh', '1234', '089656148708', 'fuadaje@gmail.co.id', '$2y$10$ZoD0rVeCtfLwKcg9zlkwyuB3fISmX27z5XuaKhUO5eGxPsMP4JMpq', 'default.jpg', 2, 1556794922),
(16, 'Madzar Maulana', '123456', '082210835079', 'madzarmr@gmail.com', '$2y$10$xyLgXpjhkGbeWJIHhdwrU.AjOtDBOjkLJ6hTDdGS5nQzV4CFK8OkG', 'default.jpg', 2, 1556795013);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_fakultas`
--

CREATE TABLE `data_fakultas` (
  `id` int(11) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_fakultas`
--

INSERT INTO `data_fakultas` (`id`, `nama_fakultas`) VALUES
(1, 'Fasilkom'),
(2, 'Fikom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_peminjaman`
--

CREATE TABLE `proses_peminjaman` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `jam_pinjam` varchar(25) NOT NULL,
  `jam_selesai` varchar(25) NOT NULL,
  `nama_pinjam` varchar(255) NOT NULL,
  `nim_pinjam` varchar(255) NOT NULL,
  `no_telpon_pinjam` varchar(255) NOT NULL,
  `status_booking` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proses_peminjaman`
--

INSERT INTO `proses_peminjaman` (`id`, `id_user`, `id_ruang`, `id_status`, `jam_pinjam`, `jam_selesai`, `nama_pinjam`, `nim_pinjam`, `no_telpon_pinjam`, `status_booking`) VALUES
(151, 8, 1, 6, '1556007536', '1556014736', 'asdasf,asfas,', '12123,123123,', '31231,312312,', 2),
(152, 8, 29, 6, '1556007958', '1556015158', 'asdasd,asdasd,', '3123123,312312,', '123123,3123123,', 2),
(153, 8, 29, 6, '1556010076', '1556017276', 'asdasd,asdasd,', '123123,312312,', '123123,312312,', 2),
(154, 8, 30, 6, '1556010122', '1556017322', 'asdasd,asdasd,', '312312,3123123,', '123123,123123,', 2),
(155, 8, 31, 6, '1556010132', '1556017332', 'asdasd,asdasd,', '3123123,312312,', '312312,3123123,', 2),
(156, 8, 1, 6, '1556010298', '1556017498', 'asdasd,asdasd,', '312312,312312,', '31231,312312,', 2),
(157, 8, 31, 6, '1556010489', '1556017689', 'asdasd,asdasd,', '3123123,312132,', '312312,3123123,', 2),
(158, 8, 29, 6, '1556010612', '1556017812', 'asdasd,asdasd,', '12123,123123,', '3123123,3123123,', 2),
(159, 8, 1, 7, '1556016538', '1556023738', 'asasd,asda,', '312132,312312,', '312312,3121231,', 2),
(160, 8, 1, 7, '1556017699', '1556024899', 'asdasd,asdas,', '123123,13123,', '123123,21232,', 2),
(161, 8, 29, 7, '1556017709', '1556024909', 'asdasd,asdasd,', '123123,3123123,', '123123,3123123,', 2),
(162, 8, 1, 7, '1556018425', '1556025625', 'asdasd,1231,', '123123,1231,', '1231,312312,', 2),
(163, 8, 29, 6, '1556018692', '1556019400', 'asdads,1asdas,', '123123,312123,', '123123,123123,', 2),
(164, 8, 29, 6, '1556025892', '1556033092', 'asdasd,asdasd,', '123123,3123123,', '12123,123123,', 2),
(165, 8, 1, 6, '1556020939', '1556021040', 'asasa,asfasf,', '12131,123123,', '12123,123123,', 2),
(166, 8, 1, 6, '1556021065', '1556021200', 'asdasd,asdasd,', '312312,3123123,', '31231,312312,', 2),
(167, 8, 1, 6, '1556021228', '1556028428', 'asasd,saasd,', '12123,312312,', '3123123,31213,', 2),
(168, 8, 1, 6, '1556096606', '1556103806', 'asdasd,asdasd,', '123123,3123123,', '123123,31231,', 2),
(169, 8, 1, 7, '1556625014', '1556629200', 'asdasd,asdasd,', '31231,123123,', '132312,3123132,', 2),
(170, 8, 1, 7, '1556627668', '1556629200', 'asdasd,312312,', '31231,312313,', '31231,31231,', 2),
(171, 8, 1, 6, '1556630892', '1556638092', 'asdasd,asdasd,', '123123,3123123,', '3123132,3123123,', 2),
(172, 8, 1, 6, '1556675292', '1556682492', 'asdasd,asdasd,', '123123,123123,', '123123,123123,', 2),
(173, 8, 1, 6, '1556678700', '1556685900', 'asdads,asdasd,', '31231,312123,', '31231,313123,', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(128) NOT NULL,
  `style` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `nama_status`, `style`) VALUES
(1, 'Tersedia', 'success'),
(2, 'Dipesan', 'info'),
(3, 'Sedang Digunakan', 'primary'),
(4, 'Close', 'danger'),
(5, 'Proses', 'warning'),
(6, 'Selesai', 'success'),
(7, 'Dibatalkan', 'danger');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_booking`
--

CREATE TABLE `status_booking` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(112) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_booking`
--

INSERT INTO `status_booking` (`id`, `nama_status`) VALUES
(1, 'Dipesan'),
(2, 'Tidak Dipesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `no_ruang` varchar(12) NOT NULL,
  `id_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruang`
--

INSERT INTO `tb_ruang` (`id`, `image`, `no_ruang`, `id_status`) VALUES
(1, 'ruang1.jpg', 'A-601', 4),
(29, 'ruang21.jpg', 'A-602', 4),
(30, 'ruang32.JPG', 'A-603', 4),
(31, 'material-colors-thumb.png', '123', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `id_fakultas` int(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `peminjaman` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nim`, `nama`, `id_fakultas`, `email`, `no_telpon`, `image`, `password`, `role_id`, `is_active`, `date_created`, `peminjaman`) VALUES
(8, '41515010118', 'Muhammad Fahmissurur', 1, 'akungugel1990@gmail.com', '0898981212', 'logo-pabean.png', '$2y$10$Q.VCcGJ9sgugAjxAd2rbHOaFERf7j7vRSFyz3VSAUfKXq5U4IWdMO', 3, 1, 1552553131, 'belum'),
(19, '41515010077', 'Madzar Maulana', 1, 'madzarmr@gmail.com', '082210835079', 'default.jpg', '$2y$10$Ecrwj40.p4L/QULsNG1gyuSp1vYG/lrcZv6r1w9SnIgHHScFTvMA.', 3, 1, 1556695873, 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Kepala Divisi'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(220) NOT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(9, 'madzarmr@gmail.com', 'zc+IUyJR09R4eMR4RtXGh+RZby964nhPdYmHAnlHP8I=', '1556698384');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_ruang`
--

CREATE TABLE `waktu_ruang` (
  `id` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jam_buka` varchar(10) NOT NULL,
  `jam_tutup` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `waktu_ruang`
--

INSERT INTO `waktu_ruang` (`id`, `hari`, `status`, `jam_buka`, `jam_tutup`) VALUES
(1, 'senin', 'tutup', '08:00', '16:04'),
(2, 'selasa', '', '08:00', '16:00'),
(3, 'rabu', 'buka', '08:00', '18:00'),
(4, 'kamis', 'tutup', '08:00', '16:00'),
(5, 'jumat', 'tutup', '08:00', '16:00'),
(6, 'sabtu', 'tutup', '08:00', '16:00'),
(7, 'minggu', 'tutup', '08:00', '16:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_fakultas`
--
ALTER TABLE `data_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses_peminjaman`
--
ALTER TABLE `proses_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_booking`
--
ALTER TABLE `status_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `waktu_ruang`
--
ALTER TABLE `waktu_ruang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_fakultas`
--
ALTER TABLE `data_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `proses_peminjaman`
--
ALTER TABLE `proses_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `status_booking`
--
ALTER TABLE `status_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `waktu_ruang`
--
ALTER TABLE `waktu_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
