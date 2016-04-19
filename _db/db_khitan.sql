-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Apr 2016 pada 04.52
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_khitan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `last_login` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  `mdate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `email`, `password`, `last_login`, `cdate`, `mdate`) VALUES
(1, 'pajar', 'pajar@gmail.com', 'd9b9e08225336a4687a44ed317edef36', 1461029321, 1460898900, 1460990907);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_khitan`
--

CREATE TABLE IF NOT EXISTS `daftar_khitan` (
  `id_daftar_khitan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `ortu_wali` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `tgl_lahir` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `berat_badan` int(5) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jns_khitan` varchar(50) NOT NULL,
  `lokasi_klinik` varchar(255) DEFAULT NULL,
  `tgl_khitan` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `rdate` int(11) NOT NULL,
  `mdate` int(11) NOT NULL,
  PRIMARY KEY (`id_daftar_khitan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `daftar_khitan`
--

INSERT INTO `daftar_khitan` (`id_daftar_khitan`, `nama_lengkap`, `ortu_wali`, `no_ktp`, `no_hp`, `tgl_lahir`, `tempat_lahir`, `agama`, `berat_badan`, `alamat`, `jns_khitan`, `lokasi_klinik`, `tgl_khitan`, `status`, `rdate`, `mdate`) VALUES
(1, 'Hairil Sulaiman', 'Bambang', '3674981502780005', '087736317753', 1455058800, 'Jakarta', 'Islam', 80, 'Jl. Mangga Muda No. 12 Pondok Pinang - Jakarta', 'Khitan Dewasa', 'Ciledug', 1455058800, 'selesai', 0, 0),
(2, 'Maryono Lani', 'Deniansyah Andi', '3674091612980002', '085745356700', 1093384800, 'Tangerang', 'Katolik', 56, 'Jl. Kenari Kuning No. 23 Jati Asih - Bekasi', 'Khitan Autis', 'Depok', 1460412000, 'konsultasi', 0, 0),
(3, 'Bobi Saputra', 'Mahmud Setiawan', '367482190689', '087726473887', 1057269600, 'Bandung', 'Hindu', 67, 'Jl. Maruga No. 22 Bekasi Selatan - Bekasi', 'Khitan Bayi', 'Joglo', 1463608800, 'selesai', 0, 0),
(4, 'Jamaluddin', 'Raka Wijayanto', '3552981627368229', '089876374877', 1112997600, 'Karawang', 'Islam', 77, 'Jl. Semangka No. 45 Cikarang - Jakarta Barat', 'Khitan Home Visit', 'Anyer', 1461189600, 'konsultasi', 0, 0),
(6, 'Ronaldo', 'Koko', '3674871210998881', '087726473887', 1051048800, 'Bekasi', 'Katolik', 65, 'Jl. Kemuning No. 43 Bekasi', 'Khitan Gemuk', 'Depok', 1461967200, 'daftar', 0, 0),
(8, 'Makmur', 'Udin', '091203910231', '08218382129', 1437688800, 'Bandung', 'Islam', 15, 'JL. Ciledug Raya No. 90', 'Khitan Bayi', 'Ciledug', 1460757600, 'selesai', 0, 0),
(10, 'Anwar Teddy', 'Margono', '91231923492394', '089972647377', 1056578400, 'Yogyakarta', 'Islam', 45, 'Jl. Margonda Raya No. 90 Depok', 'Khitan Anak', 'Depok', 1461967200, 'daftar', 1461029922, 0),
(11, 'Malih', 'Udin', '12312312', '12341234123', 1100797200, 'Bekasi', 'Katolik', 56, 'asasdasd', 'Khitan Dewasa', 'Perigi Lama', 1463763600, 'konsultasi', 1461030467, 0),
(12, 'sdfa', 'sdfasd', '23423', '634634', 1561500000, 'efgdf', 'Hindu', 43, 'qwetqwer', 'Khitan Autis', 'Cipondoh', 1461362400, 'daftar', 1461031921, 0),
(13, 'asdsdf', 'sdfsad', '12312', '12312', 1446159600, '12312', 'Katolik', 234, 'qedfa', 'Khitan Anak', 'Cipondoh', 1461189600, 'konsultasi', 1461032072, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
