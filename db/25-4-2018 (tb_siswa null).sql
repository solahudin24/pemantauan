-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2018 pada 05.24
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kode_jabatan` varchar(3) NOT NULL,
  `password` varchar(15) NOT NULL,
  `long` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  `id_kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`nuptk`, `nip`, `foto`, `nama`, `tempat_lahir`, `tgl_lahir`, `kode_jabatan`, `password`, `long`, `lat`, `status`, `id_kelas`) VALUES
('1054740642200043', '196207221992031003', 'foto', 'Drs. Gunansyah Priyatna', 'Bandung', '1962-07-22', 'GKS', '123', NULL, NULL, '0', 'S8');

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
('BKS', 'Bagian Kesiswaan'),
('GKS', 'Guru Kelas'),
('KSK', 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(3) NOT NULL,
  `kelas` int(11) NOT NULL,
  `tingkatan` varchar(5) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `tingkatan`, `jam_masuk`, `jam_keluar`) VALUES
('S8', 8, 'SMPLB', '12:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orangtua`
--

CREATE TABLE `tb_orangtua` (
  `id_orangtua` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `long` double DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `nis` varchar(14) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_orangtua`
--

INSERT INTO `tb_orangtua` (`id_orangtua`, `nama`, `foto`, `alamat`, `long`, `lat`, `password`, `nis`, `status`) VALUES
('O123', 'si kasep', 'foto', 'jl. sekeloa', NULL, NULL, '123', '', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(14) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `id_kelas` varchar(3) DEFAULT NULL,
  `id_orangtua` varchar(3) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `long` double DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `status` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `password`, `id_kelas`, `id_orangtua`, `lat`, `long`, `foto`, `status`) VALUES
('10114280', 'reyhan audian', 'riung bandung', NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nuptk`),
  ADD KEY `fk_id_kelas` (`id_kelas`),
  ADD KEY `fk_kode_jabatan` (`kode_jabatan`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  ADD PRIMARY KEY (`id_orangtua`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_id_kelas_siswa` (`id_kelas`),
  ADD KEY `fk_id_orangtua` (`id_orangtua`);

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
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `fk_id_kelas_siswa` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_orangtua` FOREIGN KEY (`id_orangtua`) REFERENCES `tb_orangtua` (`id_orangtua`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
