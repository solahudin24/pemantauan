-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2018 pada 01.07
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
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kode_jabatan` varchar(3) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  `id_kelas` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`nuptk`, `nip`, `foto`, `nama`, `tempat_lahir`, `tgl_lahir`, `kode_jabatan`, `password`, `status`, `id_kelas`) VALUES
('110', '196207221992031003', 'nature-wallpapers-hd-24_1525814789.jpg', 'Drs. Gunansyah Priyatna', 'Bandung', '1962-07-22', 'KSK', '110', '0', 'S8'),
('111', '21323', 'foto-default.jpg', 'Saya', 'aa', '2018-04-02', 'BKS', '111', '0', 'S8'),
('15426', '2312', 'foto-default.jpg', 'gege', 'Garut', '2018-05-01', 'GKS', '15426', '0', 'S1'),
('2312', '3123', '5_1525833035.png', 'brew', '3213', '1995-09-10', 'GKS', '112', '0', 'S8');

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
('S7A', '7A', 'SMPLB', '07:00:00', '11:00:00'),
('S8', '8', 'SMPLB', '12:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `nis` varchar(14) NOT NULL,
  `waktu_kabur` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `nis`, `waktu_kabur`) VALUES
(1, '111', '2018-05-20 04:24:42'),
(2, '111', '2018-05-20 04:25:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `nis` varchar(16) DEFAULT NULL,
  `pesan_notif` varchar(150) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`id_notifikasi`, `nis`, `pesan_notif`, `waktu`, `status`) VALUES
(1, '111', 'ahmad-1-keluar sekolah', '2018-07-07 15:03:08', 1),
(2, '111', 'ahmad-1-kembali ke sekolah', '2018-07-07 15:03:08', 1);

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
('111', 'ahmad', 'malangbong ciawi khdlasgdljhafljhsalhbdljhfadjshbldajhcljhalcha', 'Garut', '2018-05-01', '111', 'S1', 'O123', 'thumb-1920-411820_1525833006.jpg', -6.930458, 107.654559, 56, '2018-07-06 03:42:43', '0', '110'),
('112', 'solahudin', '', 'Garut', '2018-05-03', '112', 'S1', 'O321', 'foto-default.jpg', -6.930449, 107.654425, 15, NULL, '0', '2312');

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
-- Indeks untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `fk_nis_kabur` (`nis`);

--
-- Indeks untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `fk_nis_notif` (`nis`);

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
  ADD KEY `fk_id_orangtua` (`id_orangtua`),
  ADD KEY `fk_nuptk` (`nuptk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
