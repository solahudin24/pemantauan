-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 08:45 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_slbcsukapura`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nuptk` varchar(16) NOT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kode_jabatan` varchar(3) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `long` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  `id_kelas` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nuptk`, `nip`, `foto`, `nama`, `tempat_lahir`, `tgl_lahir`, `kode_jabatan`, `password`, `long`, `lat`, `status`, `id_kelas`) VALUES
('110', '196207221992031003', 'nature-wallpapers-hd-24_1525814789.jpg', 'Drs. Gunansyah Priyatna', 'Bandung', '1962-07-22', 'KSK', '110', NULL, NULL, '0', 'S8'),
('111', '21323', 'foto-default.jpg', 'Saya', 'aa', '2018-04-02', 'BKS', '111', NULL, NULL, '0', 'S8'),
('15426', '2312', 'foto-default.jpg', 'gege', 'Garut', '2018-05-01', 'GKS', '15426', NULL, NULL, '0', 'S8'),
('2312', '3123', '5_1525833035.png', 'brew', '3213', '1995-09-10', 'GKS', '112', NULL, NULL, '0', 'S8');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `kode_jabatan` varchar(3) NOT NULL,
  `nama_jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`kode_jabatan`, `nama_jabatan`) VALUES
('BKP', 'Bagian Kepegawaian'),
('BKS', 'Bagian Kesiswaan'),
('GKS', 'Guru Kelas'),
('KSK', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(4) NOT NULL,
  `kelas` varchar(3) DEFAULT NULL,
  `tingkatan` varchar(5) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `tingkatan`, `jam_masuk`, `jam_keluar`) VALUES
('S1', '1', 'SDLB', '07:00:00', '10:00:00'),
('S11', '11', 'SMALB', '07:00:00', '12:00:00'),
('S7A', '7A', 'SMPLB', '07:00:00', '11:00:00'),
('S8', '8', 'SMPLB', '12:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orangtua`
--

CREATE TABLE `tb_orangtua` (
  `id_orangtua` varchar(4) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `status` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_orangtua`
--

INSERT INTO `tb_orangtua` (`id_orangtua`, `nama`, `foto`, `alamat`, `no_telp`, `password`, `status`) VALUES
('O112', 'sansan', 'thumb-1920-411820_1525827139.jpg', 'sadari', '311', 'O112', '0'),
('O123', 'jaja', NULL, 'mlb', NULL, 'O123', '0'),
('O132', 'geje', 'foto-default.jpg', 'aklsjdas', '23213', '111', '0'),
('O321', 'jun', 'gge', 'hksa', '9709', 'adas', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(14) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `id_kelas` varchar(4) DEFAULT NULL,
  `id_orangtua` varchar(4) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `baterai` int(11) DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `status` char(1) DEFAULT '0',
  `nuptk` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `password`, `id_kelas`, `id_orangtua`, `foto`, `lat`, `longitude`, `baterai`, `update_time`, `status`, `nuptk`) VALUES
('111', 'ahmad Solahudin', 'malangbong ciawi khdlasgdljhafljhsalhbdljhfadjshbldajhcljhalcha', 'Garut', '2018-05-01', '111', 'S1', 'O123', 'thumb-1920-411820_1525833006.jpg', NULL, NULL, NULL, NULL, '0', '110'),
('112', 'solahudin', '', 'Garut', '2018-05-03', '112', 'S1', 'O321', 'foto-default.jpg', NULL, NULL, NULL, NULL, '0', '2312');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nuptk`),
  ADD KEY `fk_id_kelas` (`id_kelas`),
  ADD KEY `fk_kode_jabatan` (`kode_jabatan`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  ADD PRIMARY KEY (`id_orangtua`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_id_kelas_siswa` (`id_kelas`),
  ADD KEY `fk_id_orangtua` (`id_orangtua`),
  ADD KEY `fk_nuptk` (`nuptk`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `fk_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_jabatan` FOREIGN KEY (`kode_jabatan`) REFERENCES `tb_jabatan` (`kode_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `fk_id_kelas_siswa` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_orangtua` FOREIGN KEY (`id_orangtua`) REFERENCES `tb_orangtua` (`id_orangtua`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nuptk` FOREIGN KEY (`nuptk`) REFERENCES `tb_guru` (`nuptk`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
