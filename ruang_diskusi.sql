-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2019 pada 16.18
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

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
  `password` varchar(250) NOT NULL,
  `image` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `nip`, `no_telpon`, `email`, `password`, `image`, `role_id`, `date_created`) VALUES
(16, 'admin biasa', '1010', '0812812812', 'adminbiasa@gmail.com', '$2y$10$71jEewOpahZ89qpz7wM2ZuS/o9mOiO2u3SxmfbEfPkQmtr9Q2D94m', 'default.jpg', 2, 1556961537),
(17, 'admin1', '11111', '089891289', 'admin2@gmail.com', '$2y$10$AItKWPF69d1mpRbdskdz9u..oAnE1wW8Zo/HpsKyhm9QTvO/OeNM6', 'tikotok.png', 1, 1556961606),
(18, 'master admin1', '12345', '089891289', 'admin1@gmail.com', '$2y$10$XaJYh2GwKbEuhTTlA6TjSOG5o.BRhNbsQkYITZL/drB3I.0GILaBi', 'img11.jpg', 1, 1557216326);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_access_menu`
--

CREATE TABLE `admin_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_access_menu`
--

INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `menu`) VALUES
(1, 'master admin'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_fakultas`
--

CREATE TABLE `data_fakultas` (
  `id` int(11) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_fakultas`
--

INSERT INTO `data_fakultas` (`id`, `nama_fakultas`) VALUES
(1, 'Fakultas Ilmu Komputer (FASILKOM)'),
(2, 'Fakultas Ilmu Komunikasi (FIKOM)'),
(3, 'Fakultas Ekonomi dan Bisnis (FEB)'),
(4, 'Fakultas Teknik (FT)'),
(5, 'Fakultas Desain dan Seni Kreatif (FDSK)'),
(6, 'Fakultas Psikologi');

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
(2, 8, 1, 6, '1557303885', '1557311085', 'mazar,akbar,', '4151501921,4151425121,', '089981291,0891219218,', 2),
(11, 14, 30, 7, '1559286233', '1559293320', 'qw,1212,', '121,1212,', '1212,1212,', 2),
(12, 14, 1, 7, '1559286880', '1559293320', '12,12,', '12,12,', '12,12,', 2),
(13, 14, 29, 7, '1559286886', '1559293320', '12,12,', '12,12,', '12,12,', 2),
(14, 14, 30, 7, '1559286891', '1559293320', '12,12,', '12,12,', '12,12,', 2),
(15, 14, 32, 7, '1559286897', '1559293320', '12,12,', '12,12,', '12,12,', 2),
(16, 14, 1, 7, '1559292350', '1559293320', '12,12,', '12,12,', '12,12,', 2),
(17, 14, 29, 7, '1559292357', '1559293320', '12,12,', '12,12,', '12,12,', 2),
(18, 14, 30, 7, '1559292364', '1559293320', '12,12,', '12,12,', '12,12,', 2),
(19, 14, 32, 7, '1559292370', '1559293320', '12,12,', '12,12,', '12,12,', 2);

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
  `id_status` int(1) NOT NULL,
  `id_keterangan` int(1) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruang`
--

INSERT INTO `tb_ruang` (`id`, `image`, `no_ruang`, `id_status`, `id_keterangan`, `keterangan`) VALUES
(1, 'ruang1.jpg', 'A-601', 4, 1, 'rusak'),
(29, 'ruang21.jpg', 'A-602', 4, 0, 'Sedang dalam perbaikan'),
(30, 'ruang32.JPG', 'A-603', 4, 0, 'rusakkk'),
(32, 'ruang13.jpg', 'A-604', 4, 0, 'Sedang dalam perbaikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `peminjaman` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nim`, `nama`, `id_fakultas`, `email`, `no_telpon`, `image`, `password`, `role_id`, `is_active`, `date_created`, `peminjaman`) VALUES
(11, '41515010111', 'Madzar maulana', 2, 'madzarmr@gmail.com', '089891313', 'default.jpg', '$2y$10$HPT7kC6BtQ5dZIopfJb6HuF0CsRZVh74H2kW220ifHNSbGB7/adj2', 3, 1, 1552554897, 'belum'),
(14, '41515010118', 'Muhammad Fahmissurur', 1, 'mf1971576@gmail.com', '08977552402', 'default.jpg', '$2y$10$5LUR0Aqbvw0C2t/tF9dib.qhJEyDJePgSiZXOrkcNcS65fmf5GUrK', 3, 1, 1559203221, 'belum');

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
(1, 'akungugel1990@gmail.com', 'L6PdrB/bs61cndkQbdZwwNeX0BMzJploOCAerrr96F0=', '1559202179'),
(4, 'mf1971576@gmail.com', 'deacoeAoZTLaNiojQr6k+tNmoGjVgH7VSgmixzs6uYs=', '1559203460');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_ruang`
--

CREATE TABLE `waktu_ruang` (
  `id` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jam_buka` varchar(10) NOT NULL,
  `jam_tutup` varchar(10) NOT NULL,
  `libur` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `waktu_ruang`
--

INSERT INTO `waktu_ruang` (`id`, `hari`, `status`, `jam_buka`, `jam_tutup`, `libur`) VALUES
(1, 'senin', 'buka', '08:20', '18:00', 0),
(2, 'selasa', 'buka', '08:30', '16:00', 0),
(3, 'rabu', 'buka', '08:00', '17:30', 0),
(4, 'kamis', 'buka', '09:30', '16:00', 0),
(5, 'jumat', 'tutup', '08:11', '16:02', 0),
(6, 'sabtu', 'tutup', '08:00', '16:00', 0),
(7, 'minggu', '', '08:00', '16:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_access_menu`
--
ALTER TABLE `admin_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_menu`
--
ALTER TABLE `admin_menu`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `admin_access_menu`
--
ALTER TABLE `admin_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_fakultas`
--
ALTER TABLE `data_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `proses_peminjaman`
--
ALTER TABLE `proses_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `waktu_ruang`
--
ALTER TABLE `waktu_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
