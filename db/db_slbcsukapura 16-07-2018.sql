-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jul 2018 pada 09.38
-- Versi Server: 10.1.21-MariaDB
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
-- Struktur dari tabel `tb_guru`
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
  `status` char(1) NOT NULL DEFAULT '0',
  `id_kelas` varchar(4) DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`nuptk`, `nip`, `foto`, `nama`, `tempat_lahir`, `tgl_lahir`, `kode_jabatan`, `password`, `status`, `id_kelas`, `longitude`, `latitude`) VALUES
('1054740642200043', '196207221992031003', 'foto-default.jpg', 'Drs. Gunansyah Priyatna', 'Bandung', '1962-07-22', 'KSK', '110', '0', 'S8', NULL, NULL),
('5934755656300052', '-', 'foto-default.jpg', 'Cucu Sulastini', 'Sukabumi', '1977-06-02', 'GKS', '112', '0', 'S1', NULL, NULL),
('6454767668210022', '-', 'foto-default.jpg', 'Puri Purnamasari,S.Pd', 'Bandung', '1989-01-22', 'BKS', '111', '0', 'S4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `kode_jabatan` varchar(3) NOT NULL,
  `nama_jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`kode_jabatan`, `nama_jabatan`) VALUES
('BKP', 'Bagian Kepegawaian'),
('BKS', 'Bagian Kesiswaan'),
('GKS', 'Guru Kelas'),
('KSK', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(4) NOT NULL,
  `kelas` varchar(3) DEFAULT NULL,
  `tingkatan` varchar(5) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `tingkatan`, `jam_masuk`, `jam_keluar`) VALUES
('S1', '1', 'SDLB', '07:00:00', '10:00:00'),
('S11', '11', 'SMALB', '07:00:00', '12:00:00'),
('S2', '2', 'SDLB', '07:00:00', '10:00:00'),
('S3', '3', 'SDLB', '07:00:00', '10:00:00'),
('S4', '4', 'SDLB', '07:00:00', '12:00:00'),
('S7A', '7A', 'SMPLB', '07:00:00', '11:00:00'),
('S8', '8', 'SMPLB', '12:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `nis` varchar(14) NOT NULL,
  `waktu_kabur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `waktu_ketemu` timestamp NULL DEFAULT NULL,
  `lokasi_ketemu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `nis`, `waktu_kabur`, `waktu_ketemu`, `lokasi_ketemu`) VALUES
(1, '111', '2018-05-20 04:24:42', NULL, NULL),
(2, '111', '2018-05-20 04:25:28', NULL, NULL),
(3, '112', '2017-08-21 03:10:10', NULL, NULL),
(4, '111', '2017-08-19 17:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `nis` varchar(16) DEFAULT NULL,
  `pesan_notif` varchar(150) DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orangtua`
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
-- Dumping data untuk tabel `tb_orangtua`
--

INSERT INTO `tb_orangtua` (`id_orangtua`, `nama`, `foto`, `alamat`, `no_telp`, `password`, `status`) VALUES
('O112', 'sansan', 'thumb-1920-411820_1525827139.jpg', 'sadari', '311', 'O112', '0'),
('O123', 'jaja', NULL, 'mlb', NULL, 'O123', '0'),
('O132', 'geje', 'foto-default.jpg', 'aklsjdas', '23213', '111', '0'),
('O321', 'jun', 'gge', 'hksa', '9709', 'O321', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
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
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `password`, `id_kelas`, `id_orangtua`, `foto`, `lat`, `longitude`, `baterai`, `update_time`, `status`, `nuptk`) VALUES
('111', 'Ahmad', 'malangbong', 'Garut', '2018-05-01', '111', 'S1', 'O123', 'thumb-1920-411820_1525833006.jpg', -6.930479, 107.654555, 47, NULL, '0', '1054740642200043'),
('112', 'Asep', 'sekeloa', 'Garut', '2018-05-03', '112', 'S1', 'O321', 'foto-default.jpg', -6.930449, 107.654425, 15, NULL, '0', '5934755656300052');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `id_notifikasi` int(11) DEFAULT NULL,
  `id_user` varchar(16) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `fk_nis_kabur` (`nis`);

--
-- Indexes for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `fk_nis_notif` (`nis`);

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
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `fk_notifikasi` (`id_notifikasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `fk_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_jabatan` FOREIGN KEY (`kode_jabatan`) REFERENCES `tb_jabatan` (`kode_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `fk_nis_kabur` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD CONSTRAINT `fk_nis_notif` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `fk_id_kelas_siswa` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_orangtua` FOREIGN KEY (`id_orangtua`) REFERENCES `tb_orangtua` (`id_orangtua`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nuptk` FOREIGN KEY (`nuptk`) REFERENCES `tb_guru` (`nuptk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD CONSTRAINT `fk_notifikasi` FOREIGN KEY (`id_notifikasi`) REFERENCES `tb_notifikasi` (`id_notifikasi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
