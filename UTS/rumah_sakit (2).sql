-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2021 pada 08.47
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(5) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`) VALUES
('DK001', 'Gamani Siregar'),
('DK002', 'Hamima Hariyah'),
('DK003', 'Paiman Mustofa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(5) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `id_dokter` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_ktp`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `nohp`, `agama`, `keluhan`, `id_dokter`) VALUES
('PS001', '3313120000000001', 'Talia Padmasari', 'Perempuan', '2001-01-01', 'Solo', '080000000001', 'Islam', 'sakit kepala, sakit di bagian perut', 'DK001'),
('PS002', '3313120000000002', 'Ophelia Lailasari', 'Perempuan', '2002-01-01', 'Klaten', '080000000002', 'Islam', 'demam, batuk, hingga mengalami kesulitan bernapas', 'DK002'),
('PS003', '3313120000000003', 'Harja Adriansyah', 'Laki-Laki', '2003-01-01', 'Boyolali', '080000000003', 'Islam', 'diare disertai muntah yang hebat', 'DK003'),
('PS004', '3313120000000004', 'Jarot Setiawan', 'Laki-Laki', '2001-12-25', 'Solo', '08888888888', 'Islam', 'Sehat Bugar', 'DK002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(5) NOT NULL,
  `id_dokter` varchar(5) NOT NULL,
  `id_pasien` varchar(5) NOT NULL,
  `id_ruang` varchar(5) NOT NULL,
  `diagnosa_penyakit` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_dokter`, `id_pasien`, `id_ruang`, `diagnosa_penyakit`, `tgl_masuk`, `tgl_keluar`) VALUES
('PB001', 'DK001', 'PS001', 'RUA01', 'Flu', '2021-09-10', '2021-09-13'),
('PB002', 'DK002', 'PS002', 'RUA03', 'Pneumia', '2021-10-10', '2021-10-14'),
('PB003', 'DK003', 'PS003', 'RUA03', 'Kolera', '2021-11-10', '2021-11-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(5) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`) VALUES
('RUA01', 'Anggrek 1'),
('RUA02', 'Anggrek 2'),
('RUA03', 'Anggrek 3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokterFK` (`id_dokter`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `id_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `id_dokterFK` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `id_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `id_ruang` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
