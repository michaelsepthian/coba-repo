-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2021 pada 17.56
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(288) NOT NULL,
  `password` varchar(288) NOT NULL,
  `jabatan` varchar(288) NOT NULL,
  `gaji` int(11) NOT NULL,
  `alamat` longtext NOT NULL,
  `umur` int(11) NOT NULL,
  `notelp` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_karyawan`, `password`, `jabatan`, `gaji`, `alamat`, `umur`, `notelp`) VALUES
(1, 'Stefanus William Alexander', '4321', 'manager', 5000000, 'Jalan Taman Kopo Indah 12, Bandung', 20, '078976856567'),
(2, 'Nicholas Nathanael', '3654', 'barista', 2500000, 'Jalan Kebon Jati no.100, Bandung', 20, '08124325344'),
(3, 'Ryuga Eka', '4567', 'barista', 2500000, 'Jalan Mohammad Toha no.365, Bandung', 20, '083252345345'),
(4, 'Brein ', '5765', 'manager', 5000000, 'Jalan Ujung Berung no. 31', 19, '083252353142'),
(5, 'Michael Septian', '7587', 'kasir', 2500000, 'Jalan Cibadak no 10, Bandung', 20, '078976856567'),
(6, 'Anya', '1234', 'kasir', 2500000, 'Jalan Taman Holis Indah 1 K no. 90 A, Bandung', 20, '08343253453'),
(8, 'Papoy', '1534', 'kasir', 5000000, 'Jalan Kuningan 1 no. 20, Bandung', 10, '078976856567'),
(9, 'bambang', '123456', 'barista', 2500000, 'Jalan Taman Holis Indah 1 K no. 90 A, Bandung', 20, '0822323232232');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `nama` varchar(288) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tipe` varchar(288) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`nama`, `harga`, `stok`, `tipe`) VALUES
('Ayam Geprek', 12000, 21, 'makanan'),
('Bihun Geprek', 30000, 12, 'makanan'),
('Coffee Americano', 45000, 15, 'kopi'),
('Coffee Cappucino', 60000, 23, 'kopi'),
('Coffee Latte', 55000, 15, 'kopi'),
('Coffee Macchiato', 25000, 22, 'kopi'),
('Coffee Robusta', 28000, 9, 'kopi'),
('Donat', 8000, 23, 'makanan'),
('Onigiri', 12000, 16, 'makanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_customer`
--

CREATE TABLE `order_customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(288) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_customer`
--

INSERT INTO `order_customer` (`id`, `nama`, `tanggal`, `waktu`) VALUES
(1, 'bayu', '2020-11-28', '14:54:00'),
(2, 'ade', '2020-11-30', '00:40:00'),
(3, 'arrr', '2020-11-30', '00:43:25'),
(7, 'tono', '2020-11-30', '23:58:22'),
(8, 'maria', '2020-12-01', '15:30:32'),
(9, 'zzz', '2020-12-06', '00:11:47'),
(10, 'qwqwqw', '2020-12-08', '12:02:30'),
(11, 'asd', '2020-12-08', '12:03:51'),
(12, 'tere', '2020-12-08', '12:04:23'),
(13, 'fff', '2020-12-08', '15:44:59'),
(16, 'ade', '2020-12-08', '19:05:11'),
(17, 'fafa', '2020-12-08', '19:32:23'),
(27, 'jaya', '2020-12-10', '17:58:05'),
(28, 'adeee', '2020-12-10', '18:03:12'),
(29, '', '2020-12-11', '17:29:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_menu` varchar(288) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tambahan` varchar(288) NOT NULL,
  `status_order` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_customer`, `nama_menu`, `qty`, `harga`, `tambahan`, `status_order`) VALUES
(9, 1, 'Donat', 1, 8000, '', 1),
(10, 1, 'Coffee Latte', 2, 55000, 'hangat', 1),
(11, 1, 'Onigiri', 1, 12000, '', 1),
(12, 2, 'Coffee Americano', 1, 45000, 'tambah gula', 1),
(13, 2, 'Donat', 2, 8000, '', 1),
(16, 3, 'Coffee Americano', 1, 45000, 'dingin less sugar', 1),
(23, 7, 'Onigiri', 1, 12000, '', 1),
(24, 8, 'Bihun Geprek', 2, 30000, 'pedas', 1),
(25, 8, 'Coffee Latte', 1, 55000, 'less sugar dan dingin', 1),
(26, 9, 'Ayam Geprek', 1, 15000, '', 1),
(27, 10, 'Coffee Cappucino', 1, 60000, '', 1),
(28, 11, 'Coffee Robusta', 1, 28000, '', 1),
(29, 12, 'Ayam Geprek', 1, 15000, '', 1),
(30, 13, 'Donat', 5, 8000, '', 1),
(33, 16, 'Ayam Geprek', 1, 12000, 'level 2', 1),
(34, 16, 'Coffee Latte', 1, 55000, 'dingin', 1),
(43, 17, 'Coffee Americano', 1, 45000, 'dingin', 1),
(45, 27, 'Donat', 6, 8000, 'campur rasa', 1),
(53, 28, 'Coffee Americano', 1, 45000, '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_pemasok`
--

CREATE TABLE `order_pemasok` (
  `id` int(11) NOT NULL,
  `makanan` varchar(288) NOT NULL,
  `pemasok` varchar(288) NOT NULL,
  `qty` int(11) NOT NULL,
  `catatan` mediumtext NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `status_order` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_pemasok`
--

INSERT INTO `order_pemasok` (`id`, `makanan`, `pemasok`, `qty`, `catatan`, `waktu`, `tanggal`, `status_order`) VALUES
(1, 'Ayam Geprek', 'PaAhmad', 20, '', '12:26:19', '2020-12-07', 1),
(2, 'Ayam Geprek', 'PaAhmad', 15, '', '10:23:13', '2020-12-08', 1),
(4, 'Donat', 'BuYuni', 12, 'Campur Semua Rasa', '13:42:07', '2020-12-08', 1),
(5, 'Bihun Geprek', 'PaYanto', 5, '', '13:45:03', '2020-12-08', 0),
(6, 'Ayam Geprek', 'PaAhmad', 10, '', '21:39:22', '2020-12-08', 1),
(7, 'Ayam Geprek', 'PaAhmad', 10, '', '17:56:06', '2020-12-10', 1),
(8, 'Ayam Geprek', 'PaAhmad', 5, '', '17:37:30', '2020-12-11', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `id_order_customer` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id`, `id_order_customer`, `id_karyawan`, `tipe`, `total`, `tanggal`, `waktu`) VALUES
(2, 1, 6, 'BCA', 130000, '2020-11-29', '18:30:48'),
(3, 2, 6, 'OVO', 61000, '2020-11-30', '00:43:25'),
(9, 3, 8, 'TUNAI', 45000, '2020-11-30', '14:23:34'),
(13, 7, 5, 'OVO', 12000, '2020-12-01', '15:30:32'),
(14, 8, 5, 'GOPAY', 115000, '2020-12-06', '00:11:47'),
(15, 9, 5, 'TUNAI', 15000, '2020-12-08', '12:02:30'),
(17, 11, 5, 'BCA', 28000, '2020-12-08', '12:04:23'),
(18, 12, 5, 'TUNAI', 15000, '2020-12-08', '15:44:59'),
(19, 13, 5, 'TUNAI', 40000, '2020-12-08', '15:46:19'),
(27, 16, 5, 'TUNAI', 67000, '2020-12-08', '19:32:22'),
(28, 17, 6, 'TUNAI', 45000, '2020-12-09', '13:20:22'),
(29, 27, 5, 'BCA', 48000, '2020-12-10', '18:03:12'),
(30, 28, 5, 'TUNAI', 45000, '2020-12-11', '17:29:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id` int(11) NOT NULL,
  `nama` varchar(288) NOT NULL,
  `alamat` varchar(288) NOT NULL,
  `notelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasok`
--

INSERT INTO `pemasok` (`id`, `nama`, `alamat`, `notelp`) VALUES
(2, 'Pa Ahmad', 'Jalan Mohammad Toha no. 365', '0832425344543'),
(3, 'Bu Yuni', 'Jalan Cibadak no 10, Bandung', '0821344242424'),
(4, 'Pa Yanto', 'Jalan Otoiskandar', '0812312432432');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `id_karyawan`, `jam`, `tanggal`) VALUES
(1, 1, '10:30:00', '2020-11-19'),
(2, 2, '10:39:00', '2020-11-19'),
(4, 5, '10:54:00', '2020-11-22'),
(6, 1, '14:59:32', '2020-12-01'),
(10, 4, '15:27:15', '2020-12-01'),
(11, 8, '19:52:22', '2020-12-10'),
(12, 4, '17:30:32', '2020-12-11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`nama`);

--
-- Indeks untuk tabel `order_customer`
--
ALTER TABLE `order_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_menu` (`nama_menu`),
  ADD KEY `id_order` (`id_customer`);

--
-- Indeks untuk tabel `order_pemasok`
--
ALTER TABLE `order_pemasok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `makanan` (`makanan`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order_customer` (`id_order_customer`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `order_customer`
--
ALTER TABLE `order_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `order_pemasok`
--
ALTER TABLE `order_pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`nama_menu`) REFERENCES `menu` (`nama`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `order_customer` (`id`);

--
-- Ketidakleluasaan untuk tabel `order_pemasok`
--
ALTER TABLE `order_pemasok`
  ADD CONSTRAINT `order_pemasok_ibfk_1` FOREIGN KEY (`makanan`) REFERENCES `menu` (`nama`);

--
-- Ketidakleluasaan untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_order_customer`) REFERENCES `order_customer` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);

--
-- Ketidakleluasaan untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
