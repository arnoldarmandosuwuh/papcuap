-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2018 at 05:14 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `papcuap`
--
CREATE DATABASE IF NOT EXISTS `papcuap` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `papcuap`;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(200) NOT NULL,
  `jenis_kelamin` enum('L','P','') NOT NULL DEFAULT '',
  `kelas` enum('A','B','C','D','E','') NOT NULL DEFAULT '',
  `foto_profil` varchar(200) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `jenis_kelamin`, `kelas`, `foto_profil`) VALUES
(1, 'Arif Lazuardi', 'L', 'B', 'upload/profil/arif.jpeg'),
(2, 'Angga Firmansyah Edogawa', 'L', 'B', 'upload/profil/angga.jpg'),
(3, 'Syamsul Bahri', '', '', ''),
(4, 'Putri Familia', 'P', 'C', ''),
(5, 'Cak Ali  ', 'L', 'B', 'upload/profil/ali.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `autentikasi`
--

DROP TABLE IF EXISTS `autentikasi`;
CREATE TABLE IF NOT EXISTS `autentikasi` (
  `id_autentikasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_autentikasi`),
  KEY `id_anggota` (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autentikasi`
--

INSERT INTO `autentikasi` (`id_autentikasi`, `id_anggota`, `username`, `password`) VALUES
(1, 1, 'lazuardi.dp@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 2, 'angga@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 3, 'syamsul@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 4, 'putri@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 5, 'ali@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `cuap`
--

DROP TABLE IF EXISTS `cuap`;
CREATE TABLE IF NOT EXISTS `cuap` (
  `id_cuap` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `post` text NOT NULL,
  `post_parent_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cuap`),
  KEY `id_anggota` (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuap`
--

INSERT INTO `cuap` (`id_cuap`, `id_anggota`, `post`, `post_parent_id`, `post_date`) VALUES
(1, 1, 'bagaimana kabarmu hari ini?', 0, '2018-03-21 21:06:55'),
(2, 1, 'begitu juga malam ini, ingin sekali aku menemuimu', 0, '2018-03-21 21:14:46'),
(3, 1, 'aku ingin bermain bersama cokcay', 0, '2018-03-21 21:22:15'),
(4, 1, 'saya ingin membuat facebook', 0, '2018-03-21 21:22:34'),
(5, 1, 'saya beneran serius ingin buat', 4, '2018-03-21 21:57:16'),
(6, 1, 'dengan serius lagi', 4, '2018-03-21 21:58:57'),
(7, 1, 'tapi cokcay lagi main pes', 3, '2018-03-21 21:59:15'),
(8, 1, 'seandainya saja cokcay mau. pasti oke', 3, '2018-03-21 22:18:39'),
(9, 1, 'sungguhkah kau ingin menemuiku', 2, '2018-03-21 22:19:00'),
(10, 1, 'semua tergantung dari kamu, mau apa tidak', 0, '2018-03-21 22:19:30'),
(11, 1, 'kita akan mencoba menjumpainya', 0, '2018-03-21 22:20:20'),
(12, 1, 'benarkahj seperti itu', 11, '2018-03-21 22:20:27'),
(13, 1, 'saya tidak ingin memilikinya', 11, '2018-03-21 22:20:37'),
(14, 2, 'kok kamu gak ingin kenapa', 11, '2018-03-21 22:33:02'),
(15, 2, 'saya ikut ya', 4, '2018-03-21 22:35:35'),
(16, 2, 'sekarang saya lagi main mobile legends, ada yang mau ikut?', 0, '2018-03-21 22:36:02'),
(17, 1, 'ikut dong kk', 16, '2018-03-21 22:36:19'),
(18, 2, 'males ah, saya mau main sendiri', 16, '2018-03-21 22:39:14'),
(19, 3, 'ini adalah status pertama saya', 0, '2018-03-22 23:45:19'),
(20, 4, 'ini aplikasi yang keren', 0, '2018-03-22 23:46:21'),
(21, 4, 'halo, salam kenal ya :)', 19, '2018-03-22 23:48:45'),
(22, 1, 'salam kenal putri :\')', 20, '2018-03-22 23:54:11'),
(23, 4, 'salam kenal juga arif .... :D', 20, '2018-03-22 23:54:36'),
(24, 1, 'rapat papsi di lombok', 0, '2018-03-24 04:33:45'),
(25, 4, 'nanti saya juga ikut ya', 24, '2018-03-24 04:34:08'),
(26, 5, 'status pertama', 0, '2018-03-24 04:34:53'),
(27, 1, 'halo cak', 26, '2018-03-23 23:18:47'),
(28, 4, 'salam kenal dong', 26, '2018-03-23 23:19:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
