-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2026 pada 06.41
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesawat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesawat`
--

CREATE TABLE `pesawat` (
  `id_pesawat` int(11) NOT NULL,
  `registrasi` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `maskapai` varchar(50) NOT NULL,
  `status_pesawat` enum('Active','Maintenance',' Grounded','Retired') DEFAULT 'Active',
  `total_jam_terbang` int(11) DEFAULT 0,
  `tgl_operasional` date NOT NULL,
  `base_airport` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesawat`
--

INSERT INTO `pesawat` (`id_pesawat`, `registrasi`, `serial_number`, `model`, `maskapai`, `status_pesawat`, `total_jam_terbang`, `tgl_operasional`, `base_airport`, `created_at`, `update_at`) VALUES
(6, 'PK-CIT', 'MSN9912', 'Airbus A320 Neo', 'Citilink', 'Active', 5400, '2019-02-14', 'HLP', '2026-01-03 16:57:43', '2026-01-03 16:57:43'),
(9, 'PK-GFB', 'MSN-6611', 'Airbus A330-900', 'Garuda Indonesia', 'Active', 34800, '2026-01-06', 'CGK', '2026-01-06 16:29:33', '2026-01-09 02:59:44'),
(10, 'PK-BTA', 'MSN-3536', 'Airbus A320-200', 'Batik Air', 'Active', 19600, '2026-01-06', 'CGK', '2026-01-06 16:30:05', '2026-01-06 16:30:05'),
(11, 'PK-SJB', 'MSN-3817', 'Airbus A320-200', 'Super Air Jet', 'Maintenance', 14300, '2026-01-06', 'DPS', '2026-01-06 16:34:10', '2026-01-06 16:34:10'),
(12, 'PK-AZA', 'MSN-5250', 'Airbus A320neo', 'AirAsia', '', 11400, '2026-01-06', 'DPS', '2026-01-06 16:34:47', '2026-01-06 16:34:47'),
(13, 'PK-LQC', 'MSN-8271', 'Boeing 737-900ER', 'Lion Air', 'Active', 31200, '2026-01-06', 'UPG', '2026-01-06 16:35:40', '2026-01-09 01:55:51'),
(14, 'PK-GLC', 'MSN-7865', 'Airbus A320neo', 'Citilink', 'Active', 5200, '2026-01-06', 'DPS', '2026-01-06 16:36:29', '2026-01-06 16:36:29'),
(15, 'PK-GFD', 'MSN-1256', 'Boeing 777-300ER', 'Garuda Indonesia', 'Maintenance', 41500, '2026-01-06', 'CGK', '2026-01-06 16:40:11', '2026-01-06 16:40:11'),
(16, 'PK-BTB', 'MSN-6244', 'Airbus A320neo', 'Batik Air', 'Active', 8900, '2026-01-06', 'SUB', '2026-01-06 16:44:07', '2026-01-06 16:44:07'),
(17, 'PK-LQD', 'MSN-5324', 'Boeing 737-8 (MAX)', 'Lion Air', 'Active', 7500, '2026-01-06', 'CGK', '2026-01-06 16:44:43', '2026-01-06 16:44:43'),
(18, 'PK-AZB', 'MSN-8274', 'Airbus A320neo', 'AirAsia', 'Active', 11400, '2026-01-06', 'DPS', '2026-01-06 16:45:32', '2026-01-06 16:45:32'),
(19, 'PK-LQB', 'MSN-8005', 'Boeing 737-800 NG', 'Lion Air', '', 29700, '2026-01-06', 'SUB', '2026-01-06 16:46:24', '2026-01-09 01:55:15'),
(20, 'PK-GLA', 'MSN-6190', 'Airbus A320-800', 'Citilink', 'Active', 16300, '2026-01-06', 'CGK', '2026-01-06 16:47:20', '2026-01-09 02:59:26'),
(21, 'PK-GFC', 'MSN-2041', 'Airbus A330-300', 'Garuda Indonesia', 'Maintenance', 34800, '2026-01-06', 'CGK', '2026-01-06 16:48:11', '2026-01-09 01:55:56'),
(22, 'PK-SJA', 'MSN-8966', 'Airbus A320-200', 'Super Air Jet', 'Active', 6100, '2026-01-06', 'CGK', '2026-01-06 16:49:07', '2026-01-06 16:49:07'),
(23, 'PK-AZX', 'MSN-5525', 'Airbus A320neo', 'AirAsia', 'Active', 17550, '2026-01-09', 'CGK', '2026-01-09 02:51:21', '2026-01-09 02:52:34'),
(24, 'PK-GLY', 'MSN-8740', 'Airbus A350-900', 'Citilink', 'Active', 31780, '2026-01-09', 'SUB', '2026-01-09 02:55:47', '2026-01-09 02:55:47'),
(25, 'PK-BTX', 'MSN-7592', 'Boeing 737-900ER', 'Batik Air', 'Active', 38900, '2026-01-09', 'CGK', '2026-01-09 02:56:27', '2026-01-09 02:56:27'),
(26, 'PK-GIA', 'MSN-4885', 'Airbus A350-1000', 'Garuda Indonesia', 'Active', 29875, '2026-01-09', 'CGK', '2026-01-09 02:57:24', '2026-01-09 02:57:24'),
(27, 'PK-AZV', 'MSN-8447', 'Airbus A330-900', 'AirAsia', 'Active', 13500, '2026-01-09', 'CGK', '2026-01-09 02:59:09', '2026-01-09 02:59:09'),
(28, 'PK-LNA', 'MSN-6422', 'Boeing 777-9', 'Lion Air', 'Active', 32450, '2026-01-09', 'SUB', '2026-01-09 03:02:20', '2026-01-09 03:02:20'),
(29, 'PK-GIB', 'MSN-7669', 'Boeing 787-9 Dreamliner', 'Garuda Indonesia', 'Maintenance', 32000, '2026-01-09', 'CGK', '2026-01-09 03:03:59', '2026-01-09 06:26:07'),
(30, 'PK-GIX', 'MSN-1043', 'Boeing 787-9 Dreamliner', 'Garuda Indonesia', 'Active', 12000, '2026-01-09', 'CGK', '2026-01-09 06:28:27', '2026-01-09 06:28:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_maintenance`
--

CREATE TABLE `riwayat_maintenance` (
  `id_log` int(11) NOT NULL,
  `id_pesawat` int(11) NOT NULL,
  `tipe_perawatan` enum('A-Check','B-Check','C-Check','D-Check','Unschedule') NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status_pengerjaan` enum('Pending','In Progress','Completed') DEFAULT 'Pending',
  `teknis_in_charge` varchar(50) DEFAULT NULL,
  `catatan_perbaikan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spesifikasi_teknis`
--

CREATE TABLE `spesifikasi_teknis` (
  `id_spek` int(11) NOT NULL,
  `id_pesawat` int(11) NOT NULL,
  `pabrikan` varchar(50) NOT NULL,
  `jenis_mesin` varchar(50) NOT NULL,
  `jumlah_mesin` tinyint(4) DEFAULT 2,
  `max_range_km` int(11) DEFAULT NULL,
  `mtow_kg` int(11) DEFAULT NULL,
  `kapasitas_kursi` int(11) NOT NULL,
  `konfigurasi_kursi` varchar(50) DEFAULT NULL,
  `kelas_kabin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`id_pesawat`);

--
-- Indeks untuk tabel `riwayat_maintenance`
--
ALTER TABLE `riwayat_maintenance`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_pesawat` (`id_pesawat`);

--
-- Indeks untuk tabel `spesifikasi_teknis`
--
ALTER TABLE `spesifikasi_teknis`
  ADD PRIMARY KEY (`id_spek`),
  ADD KEY `id_pesawat` (`id_pesawat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  MODIFY `id_pesawat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `riwayat_maintenance`
--
ALTER TABLE `riwayat_maintenance`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `spesifikasi_teknis`
--
ALTER TABLE `spesifikasi_teknis`
  MODIFY `id_spek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `riwayat_maintenance`
--
ALTER TABLE `riwayat_maintenance`
  ADD CONSTRAINT `riwayat_maintenance_ibfk_1` FOREIGN KEY (`id_pesawat`) REFERENCES `pesawat` (`id_pesawat`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `spesifikasi_teknis`
--
ALTER TABLE `spesifikasi_teknis`
  ADD CONSTRAINT `spesifikasi_teknis_ibfk_1` FOREIGN KEY (`id_pesawat`) REFERENCES `pesawat` (`id_pesawat`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
