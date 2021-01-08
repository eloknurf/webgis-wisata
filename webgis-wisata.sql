-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 09:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis-wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_kecamatan`
--

CREATE TABLE `m_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kd_kecamatan` varchar(10) NOT NULL,
  `nm_kecamatan` varchar(30) NOT NULL,
  `geojson_kecamatan` varchar(30) NOT NULL,
  `warna_kecamatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_kecamatan`
--

INSERT INTO `m_kecamatan` (`id_kecamatan`, `kd_kecamatan`, `nm_kecamatan`, `geojson_kecamatan`, `warna_kecamatan`) VALUES
(5, '35.16.04', 'Trawas', '64040121085953.geojson', '#009900'),
(6, '35.16.03', 'Pacet', '65040121090227.geojson', '#a92828'),
(10, '35.16.10', 'Bangsal', '53040121090015.geojson', '#01da9d'),
(11, '35.16.12', 'Trowulan', '86040121090025.geojson', '#de19e1'),
(13, '35.16.17', 'Dawarblandong', '57040121090424.geojson', '#48ca35'),
(14, '35.16.09', 'Dlanggu', '82040121090538.geojson', '#ff8000'),
(15, '35.16.14', 'Gedeg', '91040121090611.geojson', '#00bbbb'),
(16, '35.16.02', 'Gondang', '99040121090740.geojson', '#400080'),
(17, '35.16.01', 'Jatirejo', '65040121090835.geojson', '#f7090f'),
(18, '35.16.16', 'Jetis', '36040121090911.geojson', '#ffff00'),
(19, '35.16.15', 'Kemlagi', '62040121090954.geojson', '#5151ff'),
(20, '35.16.07', 'Kutorejo', '68040121091148.geojson', '#ff4fa7'),
(21, '35.16.08', 'Mojosari', '3040121091326.geojson', '#b30059'),
(22, '35.16.05', 'Ngoro', '48040121091441.geojson', '#ff6a22'),
(23, '35.16.06', 'Pungging', '76040121091518.geojson', '#f2f200'),
(24, '35.16.11', 'Puri', '7040121091716.geojson', '#67a35c'),
(25, '35.16.13', 'Sooko', '93040121091802.geojson', '#d70000');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nm_pengguna` varchar(20) NOT NULL,
  `kt_sandi` varchar(32) NOT NULL,
  `level` enum('Admin','User') NOT NULL DEFAULT 'User',
  `full_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nm_pengguna`, `kt_sandi`, `level`, `full_name`) VALUES
(1, 'admin@admin.com', '12345', 'Admin', 'Admin'),
(2, 'guest@guest.com', '12345', 'User', 'Guest'),
(16, 'guest2@guest.com', 'guest', 'User', 'Guest2');

-- --------------------------------------------------------

--
-- Table structure for table `t_hotspot`
--

CREATE TABLE `t_hotspot` (
  `id_hotspot` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `nm_hotspot` varchar(50) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_hotspot`
--

INSERT INTO `t_hotspot` (`id_hotspot`, `id_kecamatan`, `lokasi`, `nm_hotspot`, `lat`, `lng`, `tanggal`) VALUES
(1, 5, 'Jl. Raya Duyung Trawas Hill, Bantal, Duyung, Kec. Trawas, Mojokerto', 'Duyung Trawas Hill', -7.645074, 112.621002, '2020-11-20'),
(2, 5, 'Wisata Dlundung Desa, Hutan, Ketapanrame, Kec. Trawas, Mojokerto, Jawa Timur 61375', 'Air terjun Dlundung', -7.681622, 112.593842, '2020-11-20'),
(3, 6, 'Pacet, Kec. Pacet, Mojokerto, Jawa Timur 61374', 'Air Terjun Cuban Canggu', -7.681427, 112.545700, '2020-11-20'),
(9, 5, 'Trawas, Bantal, Duyung, Kec. Trawas, Mojokerto, Jawa Timur 61375', 'Fresh Green Trawas', -7.645659, 112.620819, '2021-01-04'),
(10, 5, 'Dusun Biting Seloliman, RT.05/RW.03, Seloliman, Kec. Trawas, Mojokerto, Jawa Timur 61385', 'PPLH Seloliman', -7.606414, 112.585304, '2021-01-04'),
(11, 11, 'Jl. Raya Trowulan, Siti Inggil, Bejijong, Kec. Trowulan, Mojokerto, Jawa Timur 61362', 'Patung Budha Tidur', -7.555990, 112.369766, '2021-01-04'),
(12, 17, 'Hutan, Jatirejo, Mojokerto, Jawa Timur 61373', 'Puncak Jengger', -7.698715, 112.434654, '2021-01-04'),
(14, 11, 'Jalan Raya Trowulan, Jatirejo, Temon, Kec. Trowulan, Mojokerto, Jawa Timur 61362', 'Candi Tikus', -7.572035, 112.403244, '2021-01-04'),
(16, 6, 'Jalan Pacet No.KM.3, Dusun Randegan, Warugunung, Kec. Pacet, Mojokerto, Jawa Timur 61374', 'Joglo Park', -7.638703, 112.534576, '2021-01-04'),
(17, 11, 'Jl. Candi Brahu No.73, Siti Inggil, Bejijong, Kec. Trowulan, Mojokerto, Jawa Timur 61362', 'Situs Siti Inggil', -7.548224, 112.369888, '2021-01-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `t_hotspot`
--
ALTER TABLE `t_hotspot`
  ADD PRIMARY KEY (`id_hotspot`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_kecamatan`
--
ALTER TABLE `m_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t_hotspot`
--
ALTER TABLE `t_hotspot`
  MODIFY `id_hotspot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
