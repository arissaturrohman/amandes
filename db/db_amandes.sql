-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Nov 2020 pada 03.02
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_amandes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id_desa` int(11) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `id_kec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_desa`
--

INSERT INTO `tb_desa` (`id_desa`, `desa`, `id_kec`) VALUES
(1, 'Gajah', 1),
(3, 'Boyolali', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jab` int(11) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jab`, `jabatan`) VALUES
(1, 'Kepala Desa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kec`
--

CREATE TABLE `tb_kec` (
  `id_kec` int(11) NOT NULL,
  `kec` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kec`
--

INSERT INTO `tb_kec` (`id_kec`, `kec`) VALUES
(1, 'Gajah'),
(2, 'Karanganyar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pend` int(11) NOT NULL,
  `pendidikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pend`, `pendidikan`) VALUES
(1, 'SD Sederajat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perdes`
--

CREATE TABLE `tb_perdes` (
  `id_perdes` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `id_jab` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_sk` varchar(50) NOT NULL,
  `tmt` date NOT NULL,
  `foto_perdes` varchar(50) NOT NULL,
  `foto_sk` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_perdes`
--

INSERT INTO `tb_perdes` (`id_perdes`, `id_kec`, `id_desa`, `id_pend`, `id_jab`, `nama`, `jk`, `tempat`, `tgl_lahir`, `alamat`, `no_sk`, `tmt`, `foto_perdes`, `foto_sk`, `status`) VALUES
(5, 1, 3, 1, 1, 'LISNAWATI', 'pr', 'Demak', '2020-06-02', 'Desa Sukodono', '059/11/2020', '2020-11-02', '14112020080503foto 4 x 6.jpeg', '1605337504.jpeg', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `level`, `status`) VALUES
(1, 'admin', '$2y$10$9NJn/6W/G5Trg42WVnFzw.EPsft/r7FQQfvhv603p80Lyq0ojkPXO', 'Adminstrator', 'admin', 'Y'),
(2, 'gajah', '$2y$10$xl.REw/ez/e2mz02epo2v.kJuoLmxsJJa068DDX91tDci8lP/6jUW', 'Desa Gajah', 'user', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jab`);

--
-- Indexes for table `tb_kec`
--
ALTER TABLE `tb_kec`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indexes for table `tb_perdes`
--
ALTER TABLE `tb_perdes`
  ADD PRIMARY KEY (`id_perdes`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_desa`
--
ALTER TABLE `tb_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_kec`
--
ALTER TABLE `tb_kec`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_perdes`
--
ALTER TABLE `tb_perdes`
  MODIFY `id_perdes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
