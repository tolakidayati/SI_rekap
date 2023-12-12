-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2023 pada 08.01
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajaroop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `No` int(11) NOT NULL,
  `NIP` int(11) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `alamat_pegawai` varchar(20) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` int(11) NOT NULL,
  `status_pegawai` varchar(30) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`No`, `NIP`, `nama_pegawai`, `alamat_pegawai`, `no_hp`, `jenis_kelamin`, `tempat_lahir`, `status_pegawai`, `agama`, `jk`) VALUES
(0, 2021503045, 'Tolak Idayati', 'Situbondo', 2147483647, 'perempuan', 1, 'Kabag.Dikmas', 'islam', ''),
(0, 2021503045, 'Ludfiyatuzzahra', 'Situbondo', 2147483647, 'perempuan', 1, 'Kabag.Dikmas', 'islam', ''),
(0, 2023503041, 'Arika Zehrotul Fitri', 'Situbondo', 2147483647, 'perempuan', 14, 'Kabag.Pendidikan', 'islam', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayatjabatan`
--

CREATE TABLE `riwayatjabatan` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `no_sk` int(11) NOT NULL,
  `tanggal_mulai_tugas` int(11) NOT NULL,
  `jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayatjabatan`
--

INSERT INTO `riwayatjabatan` (`id_pegawai`, `nama_pegawai`, `jabatan`, `no_sk`, `tanggal_mulai_tugas`, `jk`) VALUES
(2606, 'Tolak Idayati', 'KABAG.SUNG', 1, 26, ''),
(2706, 'Ludfiyatuzzahra', 'KABAG.PEND', 2, 27, ''),
(2806, 'Luluk Nuril', 'KABAG.SARP', 3, 28, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayatpangkat`
--

CREATE TABLE `riwayatpangkat` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `id_jabatan` varchar(20) NOT NULL,
  `no_sk` int(11) NOT NULL,
  `tanggal_mulai_tugas` int(11) NOT NULL,
  `jk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayatpangkat`
--

INSERT INTO `riwayatpangkat` (`id_pegawai`, `nama_pegawai`, `jabatan`, `id_jabatan`, `no_sk`, `tanggal_mulai_tugas`, `jk`) VALUES
(2606, 'Alim', 'Kabag.Dikmas', '', 1, 26, ''),
(2706, 'Suryani', 'KABAG.SARPRAS', '', 2, 27, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
