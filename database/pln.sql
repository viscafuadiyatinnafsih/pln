-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Agu 2019 pada 02.15
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pln`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana_pengadaan`
--

CREATE TABLE IF NOT EXISTS `dana_pengadaan` (
`id_danapengadaan` int(15) NOT NULL,
  `id_datapenugasan` int(15) NOT NULL,
  `uraian` varchar(200) NOT NULL,
  `vendor` varchar(200) NOT NULL,
  `nomor_kontrak` varchar(50) NOT NULL,
  `nilai_kontrak` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dana_pengadaan`
--

INSERT INTO `dana_pengadaan` (`id_danapengadaan`, `id_datapenugasan`, `uraian`, `vendor`, `nomor_kontrak`, `nilai_kontrak`) VALUES
(2, 123458, 'Pengadaan jasa pengangkutan material PLTM KOLONDOM', 'PT PUTRA BANYU BIRU', '119.SPK/REN.05.03/PPBJ.UWPIII/2018', 5000000),
(3, 123459, 'Pengadaan VT pembuatan panel kontrol', 'PT TRAFOINDO PRIMA PRAKARSA', '151.PO/REN.05.03/PPBJ.UP2WIII/2019', 1500000),
(4, 123460, 'Pengadaan govennor control', 'PT PERUSAHAAN LISTRIK SWASTA', '155.SPK/REN.05.03/PPBJ.UP2WIII/2019', 3400000),
(5, 123461, 'Pengadaan Kwh meter pembuatan panel ', 'PT Intergra Automa Solusi', '007.PO/REN.05.03/PPBJ.UP2WIII/2019', 4300000),
(13, 123457, 'asdas', 'asda', 'asd', 1000000),
(14, 123457, 'aasd', 'asd', 'asd', 2000000),
(15, 123457, 'asd', 'asd', 'asd', 10000000),
(16, 123457, 'asdasd', 'asdsad', 'aasd', 8000000),
(17, 123457, 'yuette', 'mnsf', '45362', 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana_persekot`
--

CREATE TABLE IF NOT EXISTS `dana_persekot` (
`id_danapersekot` int(15) NOT NULL,
  `uraian_kegiatan` varchar(200) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id_datapenugasan` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dana_persekot`
--

INSERT INTO `dana_persekot` (`id_danapersekot`, `uraian_kegiatan`, `jumlah`, `keterangan`, `id_datapenugasan`) VALUES
(11, '2 bh cleaner', 760000, 'JAYA MANDIRI', 123457),
(12, '3 pasang sarung tangan Las Oleinawa 14', 150000, 'SENTRAL SAFETY', 123458),
(13, '70 kg kain majun', 490000, 'SENTRAL SAFETY', 123459),
(14, '5 bh kopler slang', 10000, 'PUSAKA', 123460),
(15, '25 pcs kacamata cleaner 20 Hm/s', 500000, 'SENTRAL SAFETY', 123461);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penugasan`
--

CREATE TABLE IF NOT EXISTS `data_penugasan` (
`id_datapenugasan` int(15) NOT NULL,
  `nama_penugasan` varchar(200) NOT NULL,
  `nilai_penugasan` int(15) NOT NULL,
  `no_WBS` varchar(50) NOT NULL,
  `deadline` date NOT NULL,
  `status` enum('BelumSelesai','Selesai') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123462 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_penugasan`
--

INSERT INTO `data_penugasan` (`id_datapenugasan`, `nama_penugasan`, `nilai_penugasan`, `no_WBS`, `deadline`, `status`) VALUES
(123457, 'Pembuatan panel kontrol  PLTM  Kolondom', 24000000, '1.8413.18.09.9700.150.60', '2019-08-30', 'BelumSelesai'),
(123458, 'Penugasan pembuatan prototype inovasi smart monitor', 60000000, '1.8413.18.09.9700.100.60', '2019-09-15', 'BelumSelesai'),
(123459, 'Penugasan pembuatan 10 bh cross fire tube  PLTG  Talang Duku', 25500000, '1.8413.18.09.5100.100.00', '2019-10-15', 'BelumSelesai'),
(123460, 'Pembuatan 2 bh martry segel laboratorium kalibrasi  PLN Pursertif', 39000000, '1.8413.19.09.9993.011.60', '2019-11-21', 'BelumSelesai'),
(123461, 'pembuatan trafo', 47000000, '123.658.234.2', '2019-10-25', 'BelumSelesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=998676 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `pass`, `email`, `level`) VALUES
(6788, 'saeful', 'manager', '123343', 'saeful@gmail.com', 1),
(885676, 'visca', 'pengadaan', '12345', 'fvischa@yahoo.com', 2),
(998675, 'aaaaa', 'supervisor', 'aaaaa', 'aaaaa@gmail.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dana_pengadaan`
--
ALTER TABLE `dana_pengadaan`
 ADD PRIMARY KEY (`id_danapengadaan`), ADD KEY `id_datapenugasan` (`id_datapenugasan`), ADD KEY `id_datapenugasan_2` (`id_datapenugasan`), ADD KEY `id_datapenugasan_3` (`id_datapenugasan`), ADD KEY `id_datapenugasan_4` (`id_datapenugasan`), ADD KEY `id_datapenugasan_5` (`id_datapenugasan`), ADD KEY `id_datapenugasan_6` (`id_datapenugasan`);

--
-- Indexes for table `dana_persekot`
--
ALTER TABLE `dana_persekot`
 ADD PRIMARY KEY (`id_danapersekot`), ADD KEY `id_datapenugasan` (`id_datapenugasan`), ADD KEY `id_datapenugasan_2` (`id_datapenugasan`), ADD KEY `id_datapenugasan_3` (`id_datapenugasan`), ADD KEY `id_datapenugasan_4` (`id_datapenugasan`);

--
-- Indexes for table `data_penugasan`
--
ALTER TABLE `data_penugasan`
 ADD PRIMARY KEY (`id_datapenugasan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dana_pengadaan`
--
ALTER TABLE `dana_pengadaan`
MODIFY `id_danapengadaan` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `dana_persekot`
--
ALTER TABLE `dana_persekot`
MODIFY `id_danapersekot` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `data_penugasan`
--
ALTER TABLE `data_penugasan`
MODIFY `id_datapenugasan` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123462;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=998676;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dana_pengadaan`
--
ALTER TABLE `dana_pengadaan`
ADD CONSTRAINT `dana_pengadaan_ibfk_1` FOREIGN KEY (`id_datapenugasan`) REFERENCES `data_penugasan` (`id_datapenugasan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dana_persekot`
--
ALTER TABLE `dana_persekot`
ADD CONSTRAINT `dana_persekot_ibfk_1` FOREIGN KEY (`id_datapenugasan`) REFERENCES `data_penugasan` (`id_datapenugasan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
