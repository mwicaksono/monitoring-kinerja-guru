-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 06, 2021 at 11:47 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berbayar_monitoringguru`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademik`
--

CREATE TABLE `akademik` (
  `id_penilaian_akademik` int(11) NOT NULL,
  `na_indikator1` int(11) NOT NULL,
  `na_indikator2` int(11) NOT NULL,
  `na_indikator3` int(11) NOT NULL,
  `na_indikator4` int(11) NOT NULL,
  `na_indikator5` int(11) NOT NULL,
  `na_indikator6` int(11) NOT NULL,
  `na_indikator7` int(11) NOT NULL,
  `na_indikator8` int(11) NOT NULL,
  `na_indikator9` int(11) NOT NULL,
  `na_indikator10` int(11) NOT NULL,
  `na_indikator11` int(11) NOT NULL,
  `na_indikator12` int(11) NOT NULL,
  `na_indikator13` int(11) NOT NULL,
  `na_indikator14` int(11) NOT NULL,
  `na_total_skor` int(11) NOT NULL,
  `na_persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`id_penilaian_akademik`, `na_indikator1`, `na_indikator2`, `na_indikator3`, `na_indikator4`, `na_indikator5`, `na_indikator6`, `na_indikator7`, `na_indikator8`, `na_indikator9`, `na_indikator10`, `na_indikator11`, `na_indikator12`, `na_indikator13`, `na_indikator14`, `na_total_skor`, `na_persentase`) VALUES
(1, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 69, 99),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 70, 100);

-- --------------------------------------------------------

--
-- Table structure for table `alkitab`
--

CREATE TABLE `alkitab` (
  `id_penilaian_alkitab` int(11) NOT NULL,
  `nk_indikator1` int(11) NOT NULL,
  `nk_indikator2` int(11) NOT NULL,
  `nk_indikator3` int(11) NOT NULL,
  `nk_indikator4` int(11) NOT NULL,
  `nk_indikator5` int(11) NOT NULL,
  `nk_indikator6` int(11) NOT NULL,
  `nk_indikator7` int(11) NOT NULL,
  `nk_indikator8` int(11) NOT NULL,
  `nk_indikator9` int(11) NOT NULL,
  `nk_total_skor` int(11) NOT NULL,
  `nk_persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alkitab`
--

INSERT INTO `alkitab` (`id_penilaian_alkitab`, `nk_indikator1`, `nk_indikator2`, `nk_indikator3`, `nk_indikator4`, `nk_indikator5`, `nk_indikator6`, `nk_indikator7`, `nk_indikator8`, `nk_indikator9`, `nk_total_skor`, `nk_persentase`) VALUES
(1, 5, 5, 5, 5, 5, 5, 5, 5, 4, 44, 98),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 45, 100);

-- --------------------------------------------------------

--
-- Table structure for table `karakter`
--

CREATE TABLE `karakter` (
  `id_penilaian_karakter` int(11) NOT NULL,
  `nt_indikator1` int(11) NOT NULL,
  `nt_indikator2` int(11) NOT NULL,
  `nt_indikator3` int(11) NOT NULL,
  `nt_indikator4` int(11) NOT NULL,
  `nt_indikator5` int(11) NOT NULL,
  `nt_indikator6` int(11) NOT NULL,
  `nt_indikator7` int(11) NOT NULL,
  `nt_indikator8` int(11) NOT NULL,
  `nt_indikator9` int(11) NOT NULL,
  `nt_indikator10` int(11) NOT NULL,
  `nt_indikator11` int(11) NOT NULL,
  `nt_indikator12` int(11) NOT NULL,
  `nt_indikator13` int(11) NOT NULL,
  `nt_indikator14` int(11) NOT NULL,
  `nt_indikator15` int(11) NOT NULL,
  `nt_indikator16` int(11) NOT NULL,
  `nt_indikator17` int(11) NOT NULL,
  `nt_indikator18` int(11) NOT NULL,
  `nt_indikator19` int(11) NOT NULL,
  `nt_indikator20` int(11) NOT NULL,
  `nt_indikator21` int(11) NOT NULL,
  `nt_indikator22` int(11) NOT NULL,
  `nt_indikator23` int(11) NOT NULL,
  `nt_indikator24` int(11) NOT NULL,
  `nt_indikator25` int(11) NOT NULL,
  `nt_indikator26` int(11) NOT NULL,
  `nt_indikator27` int(11) NOT NULL,
  `nt_indikator28` int(11) NOT NULL,
  `nt_indikator29` int(11) NOT NULL,
  `nt_indikator30` int(11) NOT NULL,
  `nt_indikator31` int(11) NOT NULL,
  `nt_indikator32` int(11) NOT NULL,
  `nt_indikator33` int(11) NOT NULL,
  `nt_indikator34` int(11) NOT NULL,
  `nt_indikator35` int(11) NOT NULL,
  `nt_indikator36` int(11) NOT NULL,
  `nt_indikator37` int(11) NOT NULL,
  `nt_indikator38` int(11) NOT NULL,
  `nt_total_skor` int(11) NOT NULL,
  `nt_persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karakter`
--

INSERT INTO `karakter` (`id_penilaian_karakter`, `nt_indikator1`, `nt_indikator2`, `nt_indikator3`, `nt_indikator4`, `nt_indikator5`, `nt_indikator6`, `nt_indikator7`, `nt_indikator8`, `nt_indikator9`, `nt_indikator10`, `nt_indikator11`, `nt_indikator12`, `nt_indikator13`, `nt_indikator14`, `nt_indikator15`, `nt_indikator16`, `nt_indikator17`, `nt_indikator18`, `nt_indikator19`, `nt_indikator20`, `nt_indikator21`, `nt_indikator22`, `nt_indikator23`, `nt_indikator24`, `nt_indikator25`, `nt_indikator26`, `nt_indikator27`, `nt_indikator28`, `nt_indikator29`, `nt_indikator30`, `nt_indikator31`, `nt_indikator32`, `nt_indikator33`, `nt_indikator34`, `nt_indikator35`, `nt_indikator36`, `nt_indikator37`, `nt_indikator38`, `nt_total_skor`, `nt_persentase`) VALUES
(1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 0, 0, 179, 94),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 190, 100);

-- --------------------------------------------------------

--
-- Table structure for table `kepribadian1`
--

CREATE TABLE `kepribadian1` (
  `id_kepribadian1` int(11) NOT NULL,
  `ak1_point1` varchar(20) NOT NULL,
  `ak1_point2` varchar(20) NOT NULL,
  `ak1_point3` varchar(20) NOT NULL,
  `ak1_point4` varchar(20) NOT NULL,
  `ak1_point5` varchar(20) NOT NULL,
  `ak1_point6` varchar(20) NOT NULL,
  `ak1_point7` varchar(20) NOT NULL,
  `ak1_point8` varchar(20) NOT NULL,
  `nk1_indikator1` int(11) NOT NULL,
  `nk1_indikator2` int(11) NOT NULL,
  `nk1_indikator3` int(11) NOT NULL,
  `nk1_indikator4` int(11) NOT NULL,
  `nk1_indikator5` int(11) NOT NULL,
  `nk1_total_skor` int(11) NOT NULL,
  `nk1_persentase` int(11) NOT NULL,
  `nk1_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepribadian1`
--

INSERT INTO `kepribadian1` (`id_kepribadian1`, `ak1_point1`, `ak1_point2`, `ak1_point3`, `ak1_point4`, `ak1_point5`, `ak1_point6`, `ak1_point7`, `ak1_point8`, `nk1_indikator1`, `nk1_indikator2`, `nk1_indikator3`, `nk1_indikator4`, `nk1_indikator5`, `nk1_total_skor`, `nk1_persentase`, `nk1_nilai_kompetensi`) VALUES
(1, 'memadai', 'sangat', 'selalu', 'sangat', 'memadai', 'dikembangkan', 'sangat', 'sangat', 2, 2, 2, 2, 2, 10, 100, 4),
(2, '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kepribadian2`
--

CREATE TABLE `kepribadian2` (
  `id_kepribadian2` int(11) NOT NULL,
  `ak2_point1` varchar(20) NOT NULL,
  `ak2_point2` varchar(20) NOT NULL,
  `ak2_point3` varchar(20) NOT NULL,
  `ak2_point4` varchar(20) NOT NULL,
  `ak2_point5` varchar(20) NOT NULL,
  `ak2_point6` varchar(20) NOT NULL,
  `ak2_point7` varchar(20) NOT NULL,
  `ak2_point8` varchar(20) NOT NULL,
  `ak2_point9` varchar(20) NOT NULL,
  `nk2_indikator1` int(11) NOT NULL,
  `nk2_indikator2` int(11) NOT NULL,
  `nk2_indikator3` int(11) NOT NULL,
  `nk2_indikator4` int(11) NOT NULL,
  `nk2_indikator5` int(11) NOT NULL,
  `nk2_total_skor` int(11) NOT NULL,
  `nk2_persentase` int(11) NOT NULL,
  `nk2_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepribadian2`
--

INSERT INTO `kepribadian2` (`id_kepribadian2`, `ak2_point1`, `ak2_point2`, `ak2_point3`, `ak2_point4`, `ak2_point5`, `ak2_point6`, `ak2_point7`, `ak2_point8`, `ak2_point9`, `nk2_indikator1`, `nk2_indikator2`, `nk2_indikator3`, `nk2_indikator4`, `nk2_indikator5`, `nk2_total_skor`, `nk2_persentase`, `nk2_nilai_kompetensi`) VALUES
(1, 'sangat', 'sangat', 'sangat', 'sangat', 'sangat', 'dikembangkan', 'kadang-kadang', 'selalu', 'selalu', 2, 1, 2, 2, 2, 9, 90, 4),
(2, '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kepribadian3`
--

CREATE TABLE `kepribadian3` (
  `id_kepribadian3` int(11) NOT NULL,
  `ak3_point1` varchar(20) NOT NULL,
  `ak3_point2` varchar(20) NOT NULL,
  `ak3_point3` varchar(20) NOT NULL,
  `ak3_point4` varchar(20) NOT NULL,
  `ak3_point5` varchar(20) NOT NULL,
  `ak3_point6` varchar(20) NOT NULL,
  `ak3_point7` varchar(20) NOT NULL,
  `ak3_point8` varchar(20) NOT NULL,
  `ak3_point9` varchar(20) NOT NULL,
  `ak3_point10` varchar(20) NOT NULL,
  `ak3_point11` varchar(20) NOT NULL,
  `nk3_indikator1` int(11) NOT NULL,
  `nk3_indikator2` int(11) NOT NULL,
  `nk3_indikator3` int(11) NOT NULL,
  `nk3_indikator4` int(11) NOT NULL,
  `nk3_indikator5` int(11) NOT NULL,
  `nk3_indikator6` int(11) NOT NULL,
  `nk3_indikator7` int(11) NOT NULL,
  `nk3_indikator8` int(11) NOT NULL,
  `nk3_total_skor` int(11) NOT NULL,
  `nk3_persentase` int(11) NOT NULL,
  `nk3_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepribadian3`
--

INSERT INTO `kepribadian3` (`id_kepribadian3`, `ak3_point1`, `ak3_point2`, `ak3_point3`, `ak3_point4`, `ak3_point5`, `ak3_point6`, `ak3_point7`, `ak3_point8`, `ak3_point9`, `ak3_point10`, `ak3_point11`, `nk3_indikator1`, `nk3_indikator2`, `nk3_indikator3`, `nk3_indikator4`, `nk3_indikator5`, `nk3_indikator6`, `nk3_indikator7`, `nk3_indikator8`, `nk3_total_skor`, `nk3_persentase`, `nk3_nilai_kompetensi`) VALUES
(1, 'selalu', 'selalu', 'selalu', 'selalu', 'selalu', 'selalu', 'selalu', 'selalu', 'dikembangkan', 'selalu', 'lebih dari 80 %', 2, 2, 2, 2, 2, 2, 2, 2, 16, 100, 4),
(2, '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id_penilaian_mentor` int(11) NOT NULL,
  `nm_indikator1` int(11) NOT NULL,
  `nm_indikator2` int(11) NOT NULL,
  `nm_indikator3` int(11) NOT NULL,
  `nm_indikator4` int(11) NOT NULL,
  `nm_indikator5` int(11) NOT NULL,
  `nm_indikator6` int(11) NOT NULL,
  `nm_indikator7` int(11) NOT NULL,
  `nm_indikator8` int(11) NOT NULL,
  `nm_indikator9` int(11) NOT NULL,
  `nm_indikator10` int(11) NOT NULL,
  `nm_indikator11` int(11) NOT NULL,
  `nm_indikator12` int(11) NOT NULL,
  `nm_indikator13` int(11) NOT NULL,
  `nm_indikator14` int(11) NOT NULL,
  `nm_indikator15` int(11) NOT NULL,
  `nm_indikator16` int(11) NOT NULL,
  `nm_indikator17` int(11) NOT NULL,
  `nm_indikator18` int(11) NOT NULL,
  `nm_indikator19` int(11) NOT NULL,
  `nm_indikator20` int(11) NOT NULL,
  `nm_indikator21` int(11) NOT NULL,
  `nm_indikator22` int(11) NOT NULL,
  `nm_indikator23` int(11) NOT NULL,
  `nm_total_skor` int(11) NOT NULL,
  `nm_persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`id_penilaian_mentor`, `nm_indikator1`, `nm_indikator2`, `nm_indikator3`, `nm_indikator4`, `nm_indikator5`, `nm_indikator6`, `nm_indikator7`, `nm_indikator8`, `nm_indikator9`, `nm_indikator10`, `nm_indikator11`, `nm_indikator12`, `nm_indikator13`, `nm_indikator14`, `nm_indikator15`, `nm_indikator16`, `nm_indikator17`, `nm_indikator18`, `nm_indikator19`, `nm_indikator20`, `nm_indikator21`, `nm_indikator22`, `nm_indikator23`, `nm_total_skor`, `nm_persentase`) VALUES
(1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 115, 100),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 115, 100);

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id_penilaian_ortu` int(11) NOT NULL,
  `no_indikator1` int(11) NOT NULL,
  `no_indikator2` int(11) NOT NULL,
  `no_indikator3` int(11) NOT NULL,
  `no_indikator4` int(11) NOT NULL,
  `no_indikator5` int(11) NOT NULL,
  `no_indikator6` int(11) NOT NULL,
  `no_indikator7` int(11) NOT NULL,
  `no_indikator8` int(11) NOT NULL,
  `no_total_skor` int(11) NOT NULL,
  `no_persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`id_penilaian_ortu`, `no_indikator1`, `no_indikator2`, `no_indikator3`, `no_indikator4`, `no_indikator5`, `no_indikator6`, `no_indikator7`, `no_indikator8`, `no_total_skor`, `no_persentase`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pedagogik1`
--

CREATE TABLE `pedagogik1` (
  `id_pedagogik1` int(11) NOT NULL,
  `ap1_point1` varchar(20) NOT NULL,
  `ap1_point2` varchar(20) NOT NULL,
  `ap1_point3` varchar(20) NOT NULL,
  `ap1_point4` varchar(20) NOT NULL,
  `ap1_point5` varchar(20) NOT NULL,
  `ap1_point6` varchar(20) NOT NULL,
  `ap1_point7` varchar(20) NOT NULL,
  `ap1_point8` varchar(20) NOT NULL,
  `ap1_point9` varchar(20) NOT NULL,
  `ap1_point10` varchar(20) NOT NULL,
  `ap1_point11` varchar(20) NOT NULL,
  `ap1_point12` varchar(20) NOT NULL,
  `ap1_point13` varchar(20) NOT NULL,
  `ap1_point14` varchar(20) NOT NULL,
  `ap1_point15` varchar(20) NOT NULL,
  `ap1_point16` varchar(20) NOT NULL,
  `ap1_point17` varchar(20) NOT NULL,
  `np1_indikator1` int(11) NOT NULL,
  `np1_indikator2` int(11) NOT NULL,
  `np1_indikator3` int(11) NOT NULL,
  `np1_indikator4` int(11) NOT NULL,
  `np1_indikator5` int(11) NOT NULL,
  `np1_indikator6` int(11) NOT NULL,
  `np1_total_skor` int(11) NOT NULL,
  `np1_persentase` int(11) NOT NULL,
  `np1_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedagogik1`
--

INSERT INTO `pedagogik1` (`id_pedagogik1`, `ap1_point1`, `ap1_point2`, `ap1_point3`, `ap1_point4`, `ap1_point5`, `ap1_point6`, `ap1_point7`, `ap1_point8`, `ap1_point9`, `ap1_point10`, `ap1_point11`, `ap1_point12`, `ap1_point13`, `ap1_point14`, `ap1_point15`, `ap1_point16`, `ap1_point17`, `np1_indikator1`, `np1_indikator2`, `np1_indikator3`, `np1_indikator4`, `np1_indikator5`, `np1_indikator6`, `np1_total_skor`, `np1_persentase`, `np1_nilai_kompetensi`) VALUES
(1, 'sangat', 'sangat', 'sangat', 'sangat', 'sudah', 'dikembangkan', 'sebagian besar', 'sangat', 'sangat', 'baik', 'baik', 'baik', 'cukup', 'dikembangkan', 'sangat', 'dikembangkan', 'sebagian besar', 2, 2, 2, 2, 2, 2, 12, 100, 4),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pedagogik2`
--

CREATE TABLE `pedagogik2` (
  `id_pedagogik2` int(11) NOT NULL,
  `ap2_point1` varchar(20) NOT NULL,
  `ap2_point2` varchar(20) NOT NULL,
  `ap2_point3` varchar(20) NOT NULL,
  `ap2_point4` varchar(20) NOT NULL,
  `ap2_point5` varchar(20) NOT NULL,
  `ap2_point6` varchar(20) NOT NULL,
  `ap2_point7` varchar(20) NOT NULL,
  `ap2_point8` varchar(20) NOT NULL,
  `ap2_point9` varchar(20) NOT NULL,
  `ap2_point10` varchar(20) NOT NULL,
  `ap2_point11` varchar(20) NOT NULL,
  `ap2_point12` varchar(20) NOT NULL,
  `ap2_point13` varchar(20) NOT NULL,
  `ap2_point14` varchar(20) NOT NULL,
  `ap2_point15` varchar(20) NOT NULL,
  `ap2_point16` varchar(20) NOT NULL,
  `ap2_point17` varchar(20) NOT NULL,
  `ap2_point18` varchar(20) NOT NULL,
  `np2_indikator1` int(11) NOT NULL,
  `np2_indikator2` int(11) NOT NULL,
  `np2_indikator3` int(11) NOT NULL,
  `np2_indikator4` int(11) NOT NULL,
  `np2_indikator5` int(11) NOT NULL,
  `np2_indikator6` int(11) NOT NULL,
  `np2_total_skor` int(11) NOT NULL,
  `np2_persentase` int(11) NOT NULL,
  `np2_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedagogik2`
--

INSERT INTO `pedagogik2` (`id_pedagogik2`, `ap2_point1`, `ap2_point2`, `ap2_point3`, `ap2_point4`, `ap2_point5`, `ap2_point6`, `ap2_point7`, `ap2_point8`, `ap2_point9`, `ap2_point10`, `ap2_point11`, `ap2_point12`, `ap2_point13`, `ap2_point14`, `ap2_point15`, `ap2_point16`, `ap2_point17`, `ap2_point18`, `np2_indikator1`, `np2_indikator2`, `np2_indikator3`, `np2_indikator4`, `np2_indikator5`, `np2_indikator6`, `np2_total_skor`, `np2_persentase`, `np2_nilai_kompetensi`) VALUES
(1, 'sangat', 'sangat', 'sangat', 'sangat', 'sangat', 'sangat', 'sudah', 'dikembangkan', 'sangat', 'sangat', 'cukup', 'sangat', 'sangat', 'sangat', 'sangat', 'dikembangkan', 'baik', 'dikembangkan', 2, 2, 2, 2, 2, 2, 12, 100, 4),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pedagogik3`
--

CREATE TABLE `pedagogik3` (
  `id_pedagogik3` int(11) NOT NULL,
  `ap3_point1` varchar(20) NOT NULL,
  `ap3_point2` varchar(20) NOT NULL,
  `ap3_point3` varchar(20) NOT NULL,
  `ap3_point4` varchar(20) NOT NULL,
  `ap3_point5` varchar(20) NOT NULL,
  `ap3_point6` varchar(20) NOT NULL,
  `ap3_point7` varchar(20) NOT NULL,
  `ap3_point8` varchar(20) NOT NULL,
  `ap3_point9` varchar(20) NOT NULL,
  `ap3_point10` varchar(20) NOT NULL,
  `ap3_point11` varchar(20) NOT NULL,
  `ap3_point12` varchar(20) NOT NULL,
  `ap3_point13` varchar(20) NOT NULL,
  `ap3_point14` varchar(20) NOT NULL,
  `np3_indikator1` int(11) NOT NULL,
  `np3_indikator2` int(11) NOT NULL,
  `np3_indikator3` int(11) NOT NULL,
  `np3_indikator4` int(11) NOT NULL,
  `np3_total_skor` int(11) NOT NULL,
  `np3_persentase` int(11) NOT NULL,
  `np3_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedagogik3`
--

INSERT INTO `pedagogik3` (`id_pedagogik3`, `ap3_point1`, `ap3_point2`, `ap3_point3`, `ap3_point4`, `ap3_point5`, `ap3_point6`, `ap3_point7`, `ap3_point8`, `ap3_point9`, `ap3_point10`, `ap3_point11`, `ap3_point12`, `ap3_point13`, `ap3_point14`, `np3_indikator1`, `np3_indikator2`, `np3_indikator3`, `np3_indikator4`, `np3_total_skor`, `np3_persentase`, `np3_nilai_kompetensi`) VALUES
(1, 'sudah', 'sudah', 'sudah', 'sudah', 'sudah', 'dikembangkan', 'sudah', 'sudah', 'sudah', 'sudah', 'sudah', 'dikembangkan', 'sudah', 'dikembangkan', 2, 2, 2, 2, 8, 100, 4),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pedagogik4`
--

CREATE TABLE `pedagogik4` (
  `id_pedagogik4` int(11) NOT NULL,
  `ap4_point1` varchar(20) NOT NULL,
  `ap4_point2` varchar(20) NOT NULL,
  `ap4_point3` varchar(20) NOT NULL,
  `ap4_point4` varchar(20) NOT NULL,
  `ap4_point5` varchar(20) NOT NULL,
  `ap4_point6` varchar(20) NOT NULL,
  `ap4_point7` varchar(20) NOT NULL,
  `ap4_point8` varchar(20) NOT NULL,
  `ap4_point9` varchar(20) NOT NULL,
  `ap4_point10` varchar(20) NOT NULL,
  `ap4_point11` varchar(20) NOT NULL,
  `ap4_point12` varchar(20) NOT NULL,
  `ap4_point13` varchar(20) NOT NULL,
  `ap4_point14` varchar(20) NOT NULL,
  `ap4_point15` varchar(20) NOT NULL,
  `ap4_point16` varchar(20) NOT NULL,
  `ap4_point17` varchar(20) NOT NULL,
  `ap4_point18` varchar(20) NOT NULL,
  `ap4_point19` varchar(20) NOT NULL,
  `ap4_point20` varchar(20) NOT NULL,
  `ap4_point21` varchar(20) NOT NULL,
  `ap4_point22` varchar(20) NOT NULL,
  `ap4_point23` varchar(20) NOT NULL,
  `ap4_point24` varchar(20) NOT NULL,
  `ap4_point25` varchar(20) NOT NULL,
  `ap4_point26` varchar(20) NOT NULL,
  `np4_indikator1` int(11) NOT NULL,
  `np4_indikator2` int(11) NOT NULL,
  `np4_indikator3` int(11) NOT NULL,
  `np4_indikator4` int(11) NOT NULL,
  `np4_indikator5` int(11) NOT NULL,
  `np4_indikator6` int(11) NOT NULL,
  `np4_indikator7` int(11) NOT NULL,
  `np4_indikator8` int(11) NOT NULL,
  `np4_indikator9` int(11) NOT NULL,
  `np4_indikator10` int(11) NOT NULL,
  `np4_indikator11` int(11) NOT NULL,
  `np4_total_skor` int(11) NOT NULL,
  `np4_persentase` int(11) NOT NULL,
  `np4_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedagogik4`
--

INSERT INTO `pedagogik4` (`id_pedagogik4`, `ap4_point1`, `ap4_point2`, `ap4_point3`, `ap4_point4`, `ap4_point5`, `ap4_point6`, `ap4_point7`, `ap4_point8`, `ap4_point9`, `ap4_point10`, `ap4_point11`, `ap4_point12`, `ap4_point13`, `ap4_point14`, `ap4_point15`, `ap4_point16`, `ap4_point17`, `ap4_point18`, `ap4_point19`, `ap4_point20`, `ap4_point21`, `ap4_point22`, `ap4_point23`, `ap4_point24`, `ap4_point25`, `ap4_point26`, `np4_indikator1`, `np4_indikator2`, `np4_indikator3`, `np4_indikator4`, `np4_indikator5`, `np4_indikator6`, `np4_indikator7`, `np4_indikator8`, `np4_indikator9`, `np4_indikator10`, `np4_indikator11`, `np4_total_skor`, `np4_persentase`, `np4_nilai_kompetensi`) VALUES
(1, 'sudah', 'sangat', 'sangat', 'sudah', 'sudah', 'sudah', 'sudah', 'sudah', 'sudah', 'sudah', 'sangat', 'dikembangkan', 'lengkap', 'sangat', 'sangat', 'sangat', 'sudah', 'sudah', 'sudah', 'sudah', 'sudah', 'sudah', 'sangat', 'dikembangkan', 'sudah', 'dikembangkan', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 22, 100, 4),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pedagogik5`
--

CREATE TABLE `pedagogik5` (
  `id_pedagogik5` int(11) NOT NULL,
  `ap5_point1` varchar(20) NOT NULL,
  `ap5_point2` varchar(20) NOT NULL,
  `ap5_point3` varchar(20) NOT NULL,
  `ap5_point4` varchar(20) NOT NULL,
  `ap5_point5` varchar(20) NOT NULL,
  `ap5_point6` varchar(20) NOT NULL,
  `ap5_point7` varchar(20) NOT NULL,
  `ap5_point8` varchar(20) NOT NULL,
  `ap5_point9` varchar(20) NOT NULL,
  `ap5_point10` varchar(20) NOT NULL,
  `ap5_point11` varchar(20) NOT NULL,
  `ap5_point12` varchar(20) NOT NULL,
  `ap5_point13` varchar(20) NOT NULL,
  `ap5_point14` varchar(20) NOT NULL,
  `ap5_point15` varchar(20) NOT NULL,
  `ap5_point16` varchar(20) NOT NULL,
  `ap5_point17` varchar(20) NOT NULL,
  `ap5_point18` varchar(20) NOT NULL,
  `ap5_point19` varchar(20) NOT NULL,
  `ap5_point20` varchar(20) NOT NULL,
  `ap5_point21` varchar(20) NOT NULL,
  `ap5_point22` varchar(20) NOT NULL,
  `ap5_point23` varchar(20) NOT NULL,
  `np5_indikator1` int(11) NOT NULL,
  `np5_indikator2` int(11) NOT NULL,
  `np5_indikator3` int(11) NOT NULL,
  `np5_indikator4` int(11) NOT NULL,
  `np5_indikator5` int(11) NOT NULL,
  `np5_indikator6` int(11) NOT NULL,
  `np5_indikator7` int(11) NOT NULL,
  `np5_total_skor` int(11) NOT NULL,
  `np5_persentase` int(11) NOT NULL,
  `np5_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedagogik5`
--

INSERT INTO `pedagogik5` (`id_pedagogik5`, `ap5_point1`, `ap5_point2`, `ap5_point3`, `ap5_point4`, `ap5_point5`, `ap5_point6`, `ap5_point7`, `ap5_point8`, `ap5_point9`, `ap5_point10`, `ap5_point11`, `ap5_point12`, `ap5_point13`, `ap5_point14`, `ap5_point15`, `ap5_point16`, `ap5_point17`, `ap5_point18`, `ap5_point19`, `ap5_point20`, `ap5_point21`, `ap5_point22`, `ap5_point23`, `np5_indikator1`, `np5_indikator2`, `np5_indikator3`, `np5_indikator4`, `np5_indikator5`, `np5_indikator6`, `np5_indikator7`, `np5_total_skor`, `np5_persentase`, `np5_nilai_kompetensi`) VALUES
(1, 'tiga aspek', 'sangat', 'sangat', 'sudah', 'sudah', 'sudah', 'sudah', 'cukup', 'dikembangkan', 'tiga aspek', 'sangat', 'sangat', 'sudah', 'sudah', 'sudah', 'sudah', 'cukup', 'dikembangkan', 'sudah', 'dikembangkan', 'dikembangkan', 'sudah baik', 'dikembangkan', 2, 2, 2, 2, 2, 2, 2, 14, 100, 4),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pedagogik6`
--

CREATE TABLE `pedagogik6` (
  `id_pedagogik6` int(11) NOT NULL,
  `ap6_point1` varchar(20) NOT NULL,
  `ap6_point2` varchar(20) NOT NULL,
  `ap6_point3` varchar(20) NOT NULL,
  `ap6_point4` varchar(20) NOT NULL,
  `ap6_point5` varchar(20) NOT NULL,
  `ap6_point6` varchar(20) NOT NULL,
  `ap6_point7` varchar(20) NOT NULL,
  `ap6_point8` varchar(20) NOT NULL,
  `ap6_point9` varchar(20) NOT NULL,
  `ap6_point10` varchar(20) NOT NULL,
  `ap6_point11` varchar(20) NOT NULL,
  `ap6_point12` varchar(20) NOT NULL,
  `ap6_point13` varchar(20) NOT NULL,
  `ap6_point14` varchar(20) NOT NULL,
  `ap6_point15` varchar(20) NOT NULL,
  `ap6_point16` varchar(20) NOT NULL,
  `ap6_point17` varchar(20) NOT NULL,
  `ap6_point18` varchar(20) NOT NULL,
  `ap6_point19` varchar(20) NOT NULL,
  `np6_indikator1` int(11) NOT NULL,
  `np6_indikator2` int(11) NOT NULL,
  `np6_indikator3` int(11) NOT NULL,
  `np6_indikator4` int(11) NOT NULL,
  `np6_indikator5` int(11) NOT NULL,
  `np6_indikator6` int(11) NOT NULL,
  `np6_total_skor` int(11) NOT NULL,
  `np6_persentase` int(11) NOT NULL,
  `np6_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedagogik6`
--

INSERT INTO `pedagogik6` (`id_pedagogik6`, `ap6_point1`, `ap6_point2`, `ap6_point3`, `ap6_point4`, `ap6_point5`, `ap6_point6`, `ap6_point7`, `ap6_point8`, `ap6_point9`, `ap6_point10`, `ap6_point11`, `ap6_point12`, `ap6_point13`, `ap6_point14`, `ap6_point15`, `ap6_point16`, `ap6_point17`, `ap6_point18`, `ap6_point19`, `np6_indikator1`, `np6_indikator2`, `np6_indikator3`, `np6_indikator4`, `np6_indikator5`, `np6_indikator6`, `np6_total_skor`, `np6_persentase`, `np6_nilai_kompetensi`) VALUES
(1, 'sudah', 'sudah', 'sudah', 'sudah', 'sudah', 'sangat', 'sudah', 'dikembangkan', 'sudah', 'sudah', 'sudah', 'sudah', 'sudah', 'sangat', 'sudah', 'dikembangkan', 'sudah', 'dikembangkan', 'dikembangkan', 2, 2, 2, 2, 2, 2, 12, 100, 4),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pedagogik7`
--

CREATE TABLE `pedagogik7` (
  `id_pedagogik7` int(11) NOT NULL,
  `ap7_point1` varchar(20) NOT NULL,
  `ap7_point2` varchar(20) NOT NULL,
  `ap7_point3` varchar(20) NOT NULL,
  `ap7_point4` varchar(20) NOT NULL,
  `ap7_point5` varchar(20) NOT NULL,
  `ap7_point6` varchar(20) NOT NULL,
  `ap7_point7` varchar(20) NOT NULL,
  `ap7_point8` varchar(20) NOT NULL,
  `ap7_point9` varchar(20) NOT NULL,
  `ap7_point10` varchar(20) NOT NULL,
  `ap7_point11` varchar(20) NOT NULL,
  `ap7_point12` varchar(20) NOT NULL,
  `ap7_point13` varchar(20) NOT NULL,
  `ap7_point14` varchar(20) NOT NULL,
  `ap7_point15` varchar(20) NOT NULL,
  `ap7_point16` varchar(20) NOT NULL,
  `ap7_point17` varchar(20) NOT NULL,
  `np7_indikator1` int(11) NOT NULL,
  `np7_indikator2` int(11) NOT NULL,
  `np7_indikator3` int(11) NOT NULL,
  `np7_indikator4` int(11) NOT NULL,
  `np7_indikator5` int(11) NOT NULL,
  `np7_total_skor` int(11) NOT NULL,
  `np7_persentase` int(11) NOT NULL,
  `np7_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedagogik7`
--

INSERT INTO `pedagogik7` (`id_pedagogik7`, `ap7_point1`, `ap7_point2`, `ap7_point3`, `ap7_point4`, `ap7_point5`, `ap7_point6`, `ap7_point7`, `ap7_point8`, `ap7_point9`, `ap7_point10`, `ap7_point11`, `ap7_point12`, `ap7_point13`, `ap7_point14`, `ap7_point15`, `ap7_point16`, `ap7_point17`, `np7_indikator1`, `np7_indikator2`, `np7_indikator3`, `np7_indikator4`, `np7_indikator5`, `np7_total_skor`, `np7_persentase`, `np7_nilai_kompetensi`) VALUES
(1, 'seluruhnya', 'berbagai teknik peni', 'sangat', 'selalu', 'seluruhnya', 'sudah', 'dikembangkan', 'seluruhnya', 'berbagai teknik peni', 'sangat', 'kadang', 'seluruhnya', 'cukup', 'dikembangkan', 'sudah', 'dikembangkan', 'dikembangkan', 2, 2, 2, 2, 2, 10, 100, 4),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelayan`
--

CREATE TABLE `pelayan` (
  `id_penilaian_pelayan` int(11) NOT NULL,
  `ny_indikator1` int(11) NOT NULL,
  `ny_indikator2` int(11) NOT NULL,
  `ny_indikator3` int(11) NOT NULL,
  `ny_indikator4` int(11) NOT NULL,
  `ny_indikator5` int(11) NOT NULL,
  `ny_indikator6` int(11) NOT NULL,
  `ny_indikator7` int(11) NOT NULL,
  `ny_indikator8` int(11) NOT NULL,
  `ny_indikator9` int(11) NOT NULL,
  `ny_indikator10` int(11) NOT NULL,
  `ny_indikator11` int(11) NOT NULL,
  `ny_indikator12` int(11) NOT NULL,
  `ny_indikator13` int(11) NOT NULL,
  `ny_indikator14` int(11) NOT NULL,
  `ny_indikator15` int(11) NOT NULL,
  `ny_indikator16` int(11) NOT NULL,
  `ny_indikator17` int(11) NOT NULL,
  `ny_indikator18` int(11) NOT NULL,
  `ny_indikator19` int(11) NOT NULL,
  `ny_indikator20` int(11) NOT NULL,
  `ny_indikator21` int(11) NOT NULL,
  `ny_indikator22` int(11) NOT NULL,
  `ny_indikator23` int(11) NOT NULL,
  `ny_indikator24` int(11) NOT NULL,
  `ny_indikator25` int(11) NOT NULL,
  `ny_indikator26` int(11) NOT NULL,
  `ny_indikator27` int(11) NOT NULL,
  `ny_indikator28` int(11) NOT NULL,
  `ny_indikator29` int(11) NOT NULL,
  `ny_indikator30` int(11) NOT NULL,
  `ny_indikator31` int(11) NOT NULL,
  `ny_total_skor` int(11) NOT NULL,
  `ny_persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelayan`
--

INSERT INTO `pelayan` (`id_penilaian_pelayan`, `ny_indikator1`, `ny_indikator2`, `ny_indikator3`, `ny_indikator4`, `ny_indikator5`, `ny_indikator6`, `ny_indikator7`, `ny_indikator8`, `ny_indikator9`, `ny_indikator10`, `ny_indikator11`, `ny_indikator12`, `ny_indikator13`, `ny_indikator14`, `ny_indikator15`, `ny_indikator16`, `ny_indikator17`, `ny_indikator18`, `ny_indikator19`, `ny_indikator20`, `ny_indikator21`, `ny_indikator22`, `ny_indikator23`, `ny_indikator24`, `ny_indikator25`, `ny_indikator26`, `ny_indikator27`, `ny_indikator28`, `ny_indikator29`, `ny_indikator30`, `ny_indikator31`, `ny_total_skor`, `ny_persentase`) VALUES
(1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 155, 100),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 155, 100);

-- --------------------------------------------------------

--
-- Table structure for table `profesional1`
--

CREATE TABLE `profesional1` (
  `id_profesional1` int(11) NOT NULL,
  `apf1_point1` varchar(20) NOT NULL,
  `apf1_point2` varchar(20) NOT NULL,
  `apf1_point3` varchar(30) NOT NULL,
  `apf1_point4` varchar(20) NOT NULL,
  `apf1_point5` varchar(20) NOT NULL,
  `apf1_point6` varchar(20) NOT NULL,
  `apf1_point7` varchar(20) NOT NULL,
  `apf1_point8` varchar(20) NOT NULL,
  `apf1_point9` varchar(20) NOT NULL,
  `apf1_point10` varchar(20) NOT NULL,
  `npf1_indikator1` int(11) NOT NULL,
  `npf1_indikator2` int(11) NOT NULL,
  `npf1_indikator3` int(11) NOT NULL,
  `npf1_total_skor` int(11) NOT NULL,
  `npf1_persentase` int(11) NOT NULL,
  `npf1_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profesional1`
--

INSERT INTO `profesional1` (`id_profesional1`, `apf1_point1`, `apf1_point2`, `apf1_point3`, `apf1_point4`, `apf1_point5`, `apf1_point6`, `apf1_point7`, `apf1_point8`, `apf1_point9`, `apf1_point10`, `npf1_indikator1`, `npf1_indikator2`, `npf1_indikator3`, `npf1_total_skor`, `npf1_persentase`, `npf1_nilai_kompetensi`) VALUES
(1, 'selalu', 'baik', 'uraian singkat dan LKS', 'baik', 'dikembangkan', 'selalu', 'baik', 'lebih dari 70%', 'baik', 'dikembangkan', 2, 2, 2, 6, 100, 4),
(2, '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profesional2`
--

CREATE TABLE `profesional2` (
  `id_profesional2` int(11) NOT NULL,
  `apf2_point1` varchar(20) NOT NULL,
  `apf2_point2` varchar(20) NOT NULL,
  `apf2_point3` varchar(20) NOT NULL,
  `apf2_point4` varchar(20) NOT NULL,
  `apf2_point5` varchar(20) NOT NULL,
  `apf2_point6` varchar(20) NOT NULL,
  `npf2_indikator1` int(11) NOT NULL,
  `npf2_indikator2` int(11) NOT NULL,
  `npf2_indikator3` int(11) NOT NULL,
  `npf2_indikator4` int(11) NOT NULL,
  `npf2_indikator5` int(11) NOT NULL,
  `npf2_indikator6` int(11) NOT NULL,
  `npf2_total_skor` int(11) NOT NULL,
  `npf2_persentase` int(11) NOT NULL,
  `npf2_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profesional2`
--

INSERT INTO `profesional2` (`id_profesional2`, `apf2_point1`, `apf2_point2`, `apf2_point3`, `apf2_point4`, `apf2_point5`, `apf2_point6`, `npf2_indikator1`, `npf2_indikator2`, `npf2_indikator3`, `npf2_indikator4`, `npf2_indikator5`, `npf2_indikator6`, `npf2_total_skor`, `npf2_persentase`, `npf2_nilai_kompetensi`) VALUES
(1, 'selalu', 'memiliki dengan leng', 'sangat', 'sangat', 'lebih dari satu', 'sangat', 2, 2, 2, 2, 2, 2, 12, 100, 4),
(2, '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sejawat`
--

CREATE TABLE `sejawat` (
  `id_penilaian_sejawat` int(11) NOT NULL,
  `nj_indikator1` int(11) NOT NULL,
  `nj_indikator2` int(11) NOT NULL,
  `nj_indikator3` int(11) NOT NULL,
  `nj_indikator4` int(11) NOT NULL,
  `nj_indikator5` int(11) NOT NULL,
  `nj_indikator6` int(11) NOT NULL,
  `nj_indikator7` int(11) NOT NULL,
  `nj_indikator8` int(11) NOT NULL,
  `nj_indikator9` int(11) NOT NULL,
  `nj_indikator10` int(11) NOT NULL,
  `nj_indikator11` int(11) NOT NULL,
  `nj_indikator12` int(11) NOT NULL,
  `nj_indikator13` int(11) NOT NULL,
  `nj_indikator14` int(11) NOT NULL,
  `nj_indikator15` int(11) NOT NULL,
  `nj_indikator16` int(11) NOT NULL,
  `nj_indikator17` int(11) NOT NULL,
  `nj_indikator18` int(11) NOT NULL,
  `nj_indikator19` int(11) NOT NULL,
  `nj_indikator20` int(11) NOT NULL,
  `nj_indikator21` int(11) NOT NULL,
  `nj_indikator22` int(11) NOT NULL,
  `nj_indikator23` int(11) NOT NULL,
  `nj_indikator24` int(11) NOT NULL,
  `nj_indikator25` int(11) NOT NULL,
  `nj_indikator26` int(11) NOT NULL,
  `nj_indikator27` int(11) NOT NULL,
  `nj_indikator28` int(11) NOT NULL,
  `nj_indikator29` int(11) NOT NULL,
  `nj_indikator30` int(11) NOT NULL,
  `nj_indikator31` int(11) NOT NULL,
  `nj_indikator32` int(11) NOT NULL,
  `nj_indikator33` int(11) NOT NULL,
  `nj_total_skor` int(11) NOT NULL,
  `nj_persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sejawat`
--

INSERT INTO `sejawat` (`id_penilaian_sejawat`, `nj_indikator1`, `nj_indikator2`, `nj_indikator3`, `nj_indikator4`, `nj_indikator5`, `nj_indikator6`, `nj_indikator7`, `nj_indikator8`, `nj_indikator9`, `nj_indikator10`, `nj_indikator11`, `nj_indikator12`, `nj_indikator13`, `nj_indikator14`, `nj_indikator15`, `nj_indikator16`, `nj_indikator17`, `nj_indikator18`, `nj_indikator19`, `nj_indikator20`, `nj_indikator21`, `nj_indikator22`, `nj_indikator23`, `nj_indikator24`, `nj_indikator25`, `nj_indikator26`, `nj_indikator27`, `nj_indikator28`, `nj_indikator29`, `nj_indikator30`, `nj_indikator31`, `nj_indikator32`, `nj_indikator33`, `nj_total_skor`, `nj_persentase`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_penilaian_siswa` int(11) NOT NULL,
  `ns_indikator1` int(11) NOT NULL,
  `ns_indikator2` int(11) NOT NULL,
  `ns_indikator3` int(11) NOT NULL,
  `ns_indikator4` int(11) NOT NULL,
  `ns_indikator5` int(11) NOT NULL,
  `ns_indikator6` int(11) NOT NULL,
  `ns_indikator7` int(11) NOT NULL,
  `ns_indikator8` int(11) NOT NULL,
  `ns_indikator9` int(11) NOT NULL,
  `ns_indikator10` int(11) NOT NULL,
  `ns_indikator11` int(11) NOT NULL,
  `ns_indikator12` int(11) NOT NULL,
  `ns_indikator13` int(11) NOT NULL,
  `ns_indikator14` int(11) NOT NULL,
  `ns_indikator15` int(11) NOT NULL,
  `ns_indikator16` int(11) NOT NULL,
  `ns_indikator17` int(11) NOT NULL,
  `ns_indikator18` int(11) NOT NULL,
  `ns_indikator19` int(11) NOT NULL,
  `ns_indikator20` int(11) NOT NULL,
  `ns_indikator21` int(11) NOT NULL,
  `ns_indikator22` int(11) NOT NULL,
  `ns_indikator23` int(11) NOT NULL,
  `ns_indikator24` int(11) NOT NULL,
  `ns_indikator25` int(11) NOT NULL,
  `ns_indikator26` int(11) NOT NULL,
  `ns_indikator27` int(11) NOT NULL,
  `ns_indikator28` int(11) NOT NULL,
  `ns_indikator29` int(11) NOT NULL,
  `ns_indikator30` int(11) NOT NULL,
  `ns_indikator31` int(11) NOT NULL,
  `ns_indikator32` int(11) NOT NULL,
  `ns_indikator33` int(11) NOT NULL,
  `ns_indikator34` int(11) NOT NULL,
  `ns_indikator35` int(11) NOT NULL,
  `ns_indikator36` int(11) NOT NULL,
  `ns_indikator37` int(11) NOT NULL,
  `ns_indikator38` int(11) NOT NULL,
  `ns_indikator39` int(11) NOT NULL,
  `ns_total_skor` int(11) NOT NULL,
  `ns_persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_penilaian_siswa`, `ns_indikator1`, `ns_indikator2`, `ns_indikator3`, `ns_indikator4`, `ns_indikator5`, `ns_indikator6`, `ns_indikator7`, `ns_indikator8`, `ns_indikator9`, `ns_indikator10`, `ns_indikator11`, `ns_indikator12`, `ns_indikator13`, `ns_indikator14`, `ns_indikator15`, `ns_indikator16`, `ns_indikator17`, `ns_indikator18`, `ns_indikator19`, `ns_indikator20`, `ns_indikator21`, `ns_indikator22`, `ns_indikator23`, `ns_indikator24`, `ns_indikator25`, `ns_indikator26`, `ns_indikator27`, `ns_indikator28`, `ns_indikator29`, `ns_indikator30`, `ns_indikator31`, `ns_indikator32`, `ns_indikator33`, `ns_indikator34`, `ns_indikator35`, `ns_indikator36`, `ns_indikator37`, `ns_indikator38`, `ns_indikator39`, `ns_total_skor`, `ns_persentase`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sosial1`
--

CREATE TABLE `sosial1` (
  `id_sosial1` int(11) NOT NULL,
  `as1_point1` varchar(20) NOT NULL,
  `as1_point2` varchar(20) NOT NULL,
  `as1_point3` varchar(20) NOT NULL,
  `as1_point4` varchar(20) NOT NULL,
  `as1_point5` varchar(20) NOT NULL,
  `as1_point6` varchar(20) NOT NULL,
  `as1_point7` varchar(20) NOT NULL,
  `as1_point8` varchar(20) NOT NULL,
  `ns1_indikator1` int(11) NOT NULL,
  `ns1_indikator2` int(11) NOT NULL,
  `ns1_indikator3` int(11) NOT NULL,
  `ns1_total_skor` int(11) NOT NULL,
  `ns1_persentase` int(11) NOT NULL,
  `ns1_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sosial1`
--

INSERT INTO `sosial1` (`id_sosial1`, `as1_point1`, `as1_point2`, `as1_point3`, `as1_point4`, `as1_point5`, `as1_point6`, `as1_point7`, `as1_point8`, `ns1_indikator1`, `ns1_indikator2`, `ns1_indikator3`, `ns1_total_skor`, `ns1_persentase`, `ns1_nilai_kompetensi`) VALUES
(1, 'selalu', 'selalu', 'selalu', 'dikembangkan', 'sangat', 'selalu', 'sangat', 'sering', 2, 2, 2, 6, 100, 4),
(2, '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sosial2`
--

CREATE TABLE `sosial2` (
  `id_sosial2` int(11) NOT NULL,
  `as2_point1` varchar(20) NOT NULL,
  `as2_point2` varchar(20) NOT NULL,
  `as2_point3` varchar(20) NOT NULL,
  `ns2_indikator1` int(11) NOT NULL,
  `ns2_indikator2` int(11) NOT NULL,
  `ns2_indikator3` int(11) NOT NULL,
  `ns2_total_skor` int(11) NOT NULL,
  `ns2_persentase` int(11) NOT NULL,
  `ns2_nilai_kompetensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sosial2`
--

INSERT INTO `sosial2` (`id_sosial2`, `as2_point1`, `as2_point2`, `as2_point3`, `ns2_indikator1`, `ns2_indikator2`, `ns2_indikator3`, `ns2_total_skor`, `ns2_persentase`, `ns2_nilai_kompetensi`) VALUES
(1, 'lengkap dan baik', 'lengkap dan baik', 'selalu', 2, 2, 2, 6, 100, 4),
(2, '', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `spiritual`
--

CREATE TABLE `spiritual` (
  `id_penilaian_spiritual` int(11) NOT NULL,
  `nr_indikator1` int(11) NOT NULL,
  `nr_indikator2` int(11) NOT NULL,
  `nr_indikator3` int(11) NOT NULL,
  `nr_indikator4` int(11) NOT NULL,
  `nr_indikator5` int(11) NOT NULL,
  `nr_indikator6` int(11) NOT NULL,
  `nr_indikator7` int(11) NOT NULL,
  `nr_indikator8` int(11) NOT NULL,
  `nr_indikator9` int(11) NOT NULL,
  `nr_indikator10` int(11) NOT NULL,
  `nr_indikator11` int(11) NOT NULL,
  `nr_indikator12` int(11) NOT NULL,
  `nr_indikator13` int(11) NOT NULL,
  `nr_indikator14` int(11) NOT NULL,
  `nr_indikator15` int(11) NOT NULL,
  `nr_indikator16` int(11) NOT NULL,
  `nr_total_skor` int(11) NOT NULL,
  `nr_persentase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spiritual`
--

INSERT INTO `spiritual` (`id_penilaian_spiritual`, `nr_indikator1`, `nr_indikator2`, `nr_indikator3`, `nr_indikator4`, `nr_indikator5`, `nr_indikator6`, `nr_indikator7`, `nr_indikator8`, `nr_indikator9`, `nr_indikator10`, `nr_indikator11`, `nr_indikator12`, `nr_indikator13`, `nr_indikator14`, `nr_indikator15`, `nr_indikator16`, `nr_total_skor`, `nr_persentase`) VALUES
(1, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 79, 99),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 80, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `gelar` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `status_pns` varchar(10) NOT NULL,
  `no_seri_karpeg` varchar(10) NOT NULL,
  `pangkat_golongan` varchar(50) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `nrg` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(30) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `jabatan_fungsional` varchar(50) NOT NULL,
  `tanggal_bekerja` date NOT NULL,
  `masa_kerja` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`nip`, `nama_guru`, `gelar`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_pns`, `no_seri_karpeg`, `pangkat_golongan`, `nuptk`, `nrg`, `pendidikan_terakhir`, `mata_pelajaran`, `jabatan_fungsional`, `tanggal_bekerja`, `masa_kerja`) VALUES
('90090', 'Lionel Messi', 'S. Pd.', 'Argentina', '2000-02-09', 'Laki-laki', 'Guru', 'S2323', 'Juru / IC', '213213', '213213', 'Strata I', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'Guru Madya', '2021-02-02', '1 Tahun'),
('89898998989', 'Kristiyano Ronaldo', 'S. Pd.', 'Madeira', '1992-05-06', 'Laki-laki', 'Guru', 'K090', 'Pengatur / IIC', '090980', '9090080', 'Strata I', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'Guru Madya', '2021-04-27', '2 Tahun'),
('8989287979', 'Guntur halilintar', 'S. Psi.', 'Salatiga', '1990-08-08', 'Laki-laki', 'Guru', 'K09090', 'Pengatur Muda / IIA', '901829839', '98321983812', 'Strata I', 'Ilmu Pengetahuan Alam', 'Guru Madya', '2020-02-11', '1 Tahun'),
('196701082000032001', 'Dewi Hanggraeni', 'SE.', 'Palembang', '1990-06-05', 'Perempuan', 'Guru', 'Y298898', 'Penata Muda Tingkat I / IIIB', '662565', '2656165', 'Strata I', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'Guru Madya', '2010-02-09', '10 Tahun'),
('196311191999031001', 'Siska Nurdiyati', 'S. T.', 'Jombang', '1983-08-03', 'Perempuan', 'Guru', 'I0909289', 'Pengatur / IIC', '8881818', '18181888', 'Strata I', 'Ilmu Pengetahuan Sosial', 'Guru Madya', '2020-04-28', '2 Tahun'),
('198003102009121003', 'Hadi Samosir', 'S. Si.', 'Grobogan', '1983-08-09', 'Laki-laki', 'Guru', 'U098028', 'Juru Muda / IA', '77717177', '17771171', 'Strata I', 'Ilmu Pengetahuan Sosial', 'Guru Madya', '2002-03-12', '30 Tahun'),
('196108281992031003', 'Hariyono Putra', 'S. Kom.', 'Temanggung', '1980-07-29', 'Laki-laki', 'Guru', 'B090902', 'Juru / IC', '61000', '910000', 'Strata I', 'Pendidikan Agama', 'Guru Muda', '2013-02-05', '21 Tahun'),
('198006272008122001', 'Chelsea Suartini', 'S. Pd.', 'Maumere', '1990-05-08', 'Perempuan', 'Guru', 'B000990', 'Pengatur Muda Tingkat I / IIB', '0190909', '9019019', 'Diploma III', 'Bahasa Indonesia', 'Guru Madya', '2020-01-28', '3 Tahun');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `id_nilai` int(11) NOT NULL,
  `tanggal_nilai` datetime NOT NULL,
  `periode_nilai` int(11) NOT NULL,
  `guru_dinilai` varchar(20) NOT NULL,
  `guru_penilai` varchar(20) NOT NULL,
  `jumlah_nilai` int(11) NOT NULL,
  `nilai_pkg` int(11) NOT NULL,
  `angka_kredit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`id_nilai`, `tanggal_nilai`, `periode_nilai`, `guru_dinilai`, `guru_penilai`, `jumlah_nilai`, `nilai_pkg`, `angka_kredit`) VALUES
(1, '2021-11-02 14:55:47', 1, '198006272008122001', '196701082000032001', 56, 100, 'Amat Baik'),
(2, '0000-00-00 00:00:00', 1, '198003102009121003', '196108281992031003', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian_internal`
--

CREATE TABLE `tbl_penilaian_internal` (
  `id_nilai` int(11) NOT NULL,
  `tanggal_nilai` datetime DEFAULT NULL,
  `periode_nilai` int(11) DEFAULT NULL,
  `guru_dinilai` varchar(20) DEFAULT NULL,
  `guru_penilai` varchar(20) NOT NULL,
  `jumlah_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian_internal`
--

INSERT INTO `tbl_penilaian_internal` (`id_nilai`, `tanggal_nilai`, `periode_nilai`, `guru_dinilai`, `guru_penilai`, `jumlah_nilai`) VALUES
(1, '2021-11-02 15:10:00', 1, '198003102009121003', '196108281992031003', NULL),
(2, NULL, 1, '', '196108281992031003', NULL),
(3, '2021-11-03 10:22:51', 1, '8989287979', '196108281992031003', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian_ortu`
--

CREATE TABLE `tbl_penilaian_ortu` (
  `id_nilai` int(11) NOT NULL,
  `tanggal_nilai` datetime DEFAULT NULL,
  `periode_nilai` int(11) DEFAULT NULL,
  `guru_dinilai` varchar(20) DEFAULT NULL,
  `ortu_penilai` varchar(20) DEFAULT NULL,
  `jumlah_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian_ortu`
--

INSERT INTO `tbl_penilaian_ortu` (`id_nilai`, `tanggal_nilai`, `periode_nilai`, `guru_dinilai`, `ortu_penilai`, `jumlah_nilai`) VALUES
(1, NULL, 1, '196108281992031003', '19', NULL),
(2, NULL, 1, '196311191999031001', '19', NULL),
(3, NULL, 1, '196701082000032001', '19', NULL),
(4, NULL, 1, '198003102009121003', '19', NULL),
(5, NULL, 1, '198006272008122001', '19', NULL),
(6, NULL, 1, '8989287979', '19', NULL),
(7, NULL, 1, '89898998989', '19', NULL),
(8, NULL, 1, '90090', '19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian_sejawat`
--

CREATE TABLE `tbl_penilaian_sejawat` (
  `id_nilai` int(11) NOT NULL,
  `tanggal_nilai` datetime DEFAULT NULL,
  `periode_nilai` int(11) DEFAULT NULL,
  `guru_dinilai` varchar(20) DEFAULT NULL,
  `sejawat_penilai` varchar(20) DEFAULT NULL,
  `jumlah_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian_sejawat`
--

INSERT INTO `tbl_penilaian_sejawat` (`id_nilai`, `tanggal_nilai`, `periode_nilai`, `guru_dinilai`, `sejawat_penilai`, `jumlah_nilai`) VALUES
(1, NULL, 1, '196108281992031003', '20', NULL),
(2, NULL, 1, '196311191999031001', '20', NULL),
(3, NULL, 1, '196701082000032001', '20', NULL),
(4, NULL, 1, '198003102009121003', '20', NULL),
(5, NULL, 1, '198006272008122001', '20', NULL),
(6, NULL, 1, '8989287979', '20', NULL),
(7, NULL, 1, '89898998989', '20', NULL),
(8, NULL, 1, '90090', '20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian_siswa`
--

CREATE TABLE `tbl_penilaian_siswa` (
  `id_nilai` int(11) NOT NULL,
  `tanggal_nilai` datetime DEFAULT NULL,
  `periode_nilai` int(11) DEFAULT NULL,
  `guru_dinilai` varchar(20) DEFAULT NULL,
  `siswa_penilai` varchar(20) DEFAULT NULL,
  `jumlah_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian_siswa`
--

INSERT INTO `tbl_penilaian_siswa` (`id_nilai`, `tanggal_nilai`, `periode_nilai`, `guru_dinilai`, `siswa_penilai`, `jumlah_nilai`) VALUES
(1, NULL, 1, '196108281992031003', '25', NULL),
(2, NULL, 1, '196311191999031001', '25', NULL),
(3, NULL, 1, '196701082000032001', '25', NULL),
(4, NULL, 1, '198003102009121003', '25', NULL),
(5, NULL, 1, '198006272008122001', '25', NULL),
(6, NULL, 1, '8989287979', '25', NULL),
(7, NULL, 1, '89898998989', '25', NULL),
(8, NULL, 1, '90090', '25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_periode`
--

CREATE TABLE `tbl_periode` (
  `id_periode` int(11) NOT NULL,
  `periode` varchar(5) NOT NULL,
  `tanggal_awal` enum('1 Januari','1 Juli') NOT NULL,
  `tanggal_akhir` enum('30 Juni','31 Desember') NOT NULL,
  `tahun_ajaran` year(4) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_periode`
--

INSERT INTO `tbl_periode` (`id_periode`, `periode`, `tanggal_awal`, `tanggal_akhir`, `tahun_ajaran`, `status`) VALUES
(1, 'P21', '1 Januari', '31 Desember', 2021, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `npsn` varchar(30) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `status` varchar(6) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id_sekolah`, `npsn`, `nama_sekolah`, `status`, `alamat`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `telepon`, `email`, `website`) VALUES
(1, '69857722', 'YP Eben Haezer GKI Salatiga', 'Swasta', ' Jl. Jendral Sudirman N0. 111B', 'Kutowinangun Kidul', 'Tingkir', 'Salatiga', 'Jawa Tengah', '50742', '081931322221', 'ebenhaezer@gmail.com', 'http://ebenhaezer.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `nip`, `level`) VALUES
(1, NULL, 'pengawas', '202cb962ac59075b964b07152d234b70', 'Pengawas Sekolah', 'Pengawas Sekolah'),
(12, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', '196402011986032013', 'Admin'),
(13, NULL, 'kepsek', '202cb962ac59075b964b07152d234b70', '196108281992031003', 'Kepala Sekolah'),
(14, NULL, 'chelsea', '202cb962ac59075b964b07152d234b70', '198006272008122001', 'Guru'),
(15, NULL, 'dewi', '202cb962ac59075b964b07152d234b70', '196701082000032001', 'Guru'),
(16, NULL, 'hadi', '202cb962ac59075b964b07152d234b70', '198003102009121003', 'Guru'),
(17, NULL, 'siska', '202cb962ac59075b964b07152d234b70', '196311191999031001', 'Guru'),
(18, 'Salsabila Handayani', 'salsabila', '202cb962ac59075b964b07152d234b70', NULL, 'Siswa'),
(19, 'Darimin Kusoyo', 'darimin', '202cb962ac59075b964b07152d234b70', NULL, 'Orang Tua'),
(20, 'Diah Yolanda', 'diah', '202cb962ac59075b964b07152d234b70', NULL, 'Teman Sejawat'),
(21, NULL, 'usernama', 'ee878975cbd4629cf0ae4dde0e365a76', '', 'Guru'),
(23, NULL, 'guntur', '202cb962ac59075b964b07152d234b70', '8989287979', 'Guru'),
(24, 'Ryan Fahmi', 'ryan', '202cb962ac59075b964b07152d234b70', NULL, 'Siswa'),
(25, 'Erfanda Dwi', 'erfan', '202cb962ac59075b964b07152d234b70', NULL, 'Siswa'),
(26, 'Sukarjo', 'sukarjo', '202cb962ac59075b964b07152d234b70', NULL, 'Orang Tua'),
(27, 'Tantowi Jarko', 'tantowi', '202cb962ac59075b964b07152d234b70', NULL, 'Teman Sejawat'),
(28, 'Yanto', 'yanto', '202cb962ac59075b964b07152d234b70', NULL, 'Orang Tua'),
(29, 'yanti', 'yanti', '202cb962ac59075b964b07152d234b70', NULL, 'Orang Tua'),
(30, 'UserBaru Orang Tua', 'userbaru', '202cb962ac59075b964b07152d234b70', NULL, 'Orang Tua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id_penilaian_akademik`);

--
-- Indexes for table `alkitab`
--
ALTER TABLE `alkitab`
  ADD PRIMARY KEY (`id_penilaian_alkitab`);

--
-- Indexes for table `karakter`
--
ALTER TABLE `karakter`
  ADD PRIMARY KEY (`id_penilaian_karakter`);

--
-- Indexes for table `kepribadian1`
--
ALTER TABLE `kepribadian1`
  ADD PRIMARY KEY (`id_kepribadian1`);

--
-- Indexes for table `kepribadian2`
--
ALTER TABLE `kepribadian2`
  ADD PRIMARY KEY (`id_kepribadian2`);

--
-- Indexes for table `kepribadian3`
--
ALTER TABLE `kepribadian3`
  ADD PRIMARY KEY (`id_kepribadian3`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id_penilaian_mentor`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id_penilaian_ortu`);

--
-- Indexes for table `pedagogik1`
--
ALTER TABLE `pedagogik1`
  ADD PRIMARY KEY (`id_pedagogik1`);

--
-- Indexes for table `pedagogik2`
--
ALTER TABLE `pedagogik2`
  ADD PRIMARY KEY (`id_pedagogik2`);

--
-- Indexes for table `pedagogik3`
--
ALTER TABLE `pedagogik3`
  ADD PRIMARY KEY (`id_pedagogik3`);

--
-- Indexes for table `pedagogik4`
--
ALTER TABLE `pedagogik4`
  ADD PRIMARY KEY (`id_pedagogik4`);

--
-- Indexes for table `pedagogik5`
--
ALTER TABLE `pedagogik5`
  ADD PRIMARY KEY (`id_pedagogik5`);

--
-- Indexes for table `pedagogik6`
--
ALTER TABLE `pedagogik6`
  ADD PRIMARY KEY (`id_pedagogik6`);

--
-- Indexes for table `pedagogik7`
--
ALTER TABLE `pedagogik7`
  ADD PRIMARY KEY (`id_pedagogik7`);

--
-- Indexes for table `pelayan`
--
ALTER TABLE `pelayan`
  ADD PRIMARY KEY (`id_penilaian_pelayan`);

--
-- Indexes for table `profesional1`
--
ALTER TABLE `profesional1`
  ADD PRIMARY KEY (`id_profesional1`);

--
-- Indexes for table `profesional2`
--
ALTER TABLE `profesional2`
  ADD PRIMARY KEY (`id_profesional2`);

--
-- Indexes for table `sejawat`
--
ALTER TABLE `sejawat`
  ADD PRIMARY KEY (`id_penilaian_sejawat`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_penilaian_siswa`);

--
-- Indexes for table `sosial1`
--
ALTER TABLE `sosial1`
  ADD PRIMARY KEY (`id_sosial1`);

--
-- Indexes for table `sosial2`
--
ALTER TABLE `sosial2`
  ADD PRIMARY KEY (`id_sosial2`);

--
-- Indexes for table `spiritual`
--
ALTER TABLE `spiritual`
  ADD PRIMARY KEY (`id_penilaian_spiritual`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_penilaian_internal`
--
ALTER TABLE `tbl_penilaian_internal`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_penilaian_ortu`
--
ALTER TABLE `tbl_penilaian_ortu`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_penilaian_sejawat`
--
ALTER TABLE `tbl_penilaian_sejawat`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_penilaian_siswa`
--
ALTER TABLE `tbl_penilaian_siswa`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_periode`
--
ALTER TABLE `tbl_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id_penilaian_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `alkitab`
--
ALTER TABLE `alkitab`
  MODIFY `id_penilaian_alkitab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `karakter`
--
ALTER TABLE `karakter`
  MODIFY `id_penilaian_karakter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `id_penilaian_mentor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id_penilaian_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `pelayan`
--
ALTER TABLE `pelayan`
  MODIFY `id_penilaian_pelayan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sejawat`
--
ALTER TABLE `sejawat`
  MODIFY `id_penilaian_sejawat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_penilaian_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `spiritual`
--
ALTER TABLE `spiritual`
  MODIFY `id_penilaian_spiritual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_penilaian_internal`
--
ALTER TABLE `tbl_penilaian_internal`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_penilaian_ortu`
--
ALTER TABLE `tbl_penilaian_ortu`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_penilaian_sejawat`
--
ALTER TABLE `tbl_penilaian_sejawat`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_penilaian_siswa`
--
ALTER TABLE `tbl_penilaian_siswa`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
