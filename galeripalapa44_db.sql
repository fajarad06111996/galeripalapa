-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2021 pada 11.43
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeripalapa44_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama`, `nohp`, `alamat`) VALUES
(1, 'demo', '202cb962ac59075b964b07152d234b70', 'Demo', '085783170507', 'jalan kebahagian'),
(2, 'infingeritrust', 'b1b4ec75d2dacbc0c1f1ae4e4978f561', 'Ibrahim Nurhaqim Admi', '081368510050', 'Bandar Lampung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karya`
--

CREATE TABLE `tbl_karya` (
  `id_karya` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `judulkarya` varchar(100) NOT NULL,
  `fotokarya` varchar(100) DEFAULT NULL,
  `deskripsikarya` text DEFAULT NULL,
  `tglkarya` varchar(30) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karya`
--

INSERT INTO `tbl_karya` (`id_karya`, `id_pengguna`, `judulkarya`, `fotokarya`, `deskripsikarya`, `tglkarya`, `id_kategori`) VALUES
(3, 3, 'TEST1 x', 'fotokarya_1566289616.jpg', 'oke oce', '2019-08-20', 1),
(4, 5, 'TEST2', 'fotokarya_1566289704.jpg', 'res', '2019-08-20', 1),
(5, 3, 'TEST2', 'fotokarya_1566548192.jpg', 'ini server ya', '2019-08-23', 1),
(6, 5, 'TEST1 x', 'fotokarya_1567495054.jpg', 'lorem ipsum dulur ', '2019-09-03', 1),
(7, 5, 'TEST1 x', 'fotokarya_1567495079.JPG', 'lorwem', '2019-09-03', 1),
(8, 5, 'malam', 'fotokarya_1567770551.jpeg', 'diggers', '2019-09-06', 1),
(9, 13, 'ZEUS', 'fotokarya_1568986599.jpg', 'Realistic Grafitti', '2019-09-20', 1),
(13, 10, 'LIFE CYCLE', 'fotokarya_1568987039.jpg', 'STENCIL ART', '2019-09-20', 1),
(14, 10, 'SOUNDRENALINE 2018', 'fotokarya_1568987090.jpg', 'Merchandise', '2019-09-20', 1),
(15, 10, 'Street Jaming', 'fotokarya_1568987160.jpg', 'Sunday Street Jamming', '2019-09-20', 1),
(16, 13, 'DEWA', 'fotokarya_1569043232.jpg', 'DEWANYA DEWA', '2019-09-21', 3),
(17, 13, 'Sunday Jamming', 'fotokarya_1569204076.jpg', 'Sunday Street Jamming', '2019-09-23', 3),
(18, 7, 'The Neew One', 'fotokarya_1569204163.jpg', 'Kolaborasi', '2019-09-23', 2),
(19, 7, 'Circle ', 'fotokarya_1569204197.jpg', 'Circle ', '2019-09-23', 2),
(20, 8, 'GFE', 'fotokarya_1569204231.jpg', 'GFE', '2019-09-23', 3),
(21, 8, 'LUCKY LUCK', 'fotokarya_1569204291.jpg', 'Pinstripe', '2019-09-23', 2),
(22, 8, 'Time Will Wasted', 'fotokarya_1569204353.jpg', 'TIME', '2019-09-23', 3),
(23, 11, 'ANGRY LOEWE', 'fotokarya_1569204411.jpg', 'LOEWE', '2019-09-23', 2),
(24, 3, 'TROPICALISM', 'fotokarya_1569204449.jpg', 'COMMISION WORK MURAL', '2019-09-23', 2),
(25, 3, 'LOEWE PROJECT', 'fotokarya_1569204516.jpg', 'LOEWE', '2019-09-23', 2),
(26, 12, 'SPOTCH', 'fotokarya_1569204553.jpg', 'SPOTCH', '2019-09-23', 3),
(27, 12, 'KACIW', 'fotokarya_1569204578.jpg', 'KACIW', '2019-09-23', 1),
(28, 14, 'Galaxy', 'fotokarya_1569241696.jpg', 'Graffiti Street Art', '2019-09-23', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `namakategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `namakategori`) VALUES
(1, 'Art'),
(2, 'Mural'),
(3, 'Grafitti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `namalengkap` varchar(50) DEFAULT NULL,
  `tanggallahir` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `notelp` varchar(50) DEFAULT NULL,
  `halamanweb` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fotoprofile` varchar(100) DEFAULT NULL,
  `statuspengguna` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `username`, `password`, `namalengkap`, `tanggallahir`, `alamat`, `kota`, `notelp`, `halamanweb`, `bio`, `email`, `fotoprofile`, `statuspengguna`) VALUES
(3, 'ganteng', '202cb962ac59075b964b07152d234b70', 'kurnia adiyoga', '2019-08-09', 'Jl. Way Sungkay, Komplek Besi Baja, Kelurahan Pahoman, Kecamatan Enggal  ', 'Pringsewu', '1212121', 'kaymedia.net', 'aku anak sehat, tubuhku kuat, karna ibuku rajin dan cermat.', 'kurnia@kaymedia.net', 'pp_1566281023.jpg', 'Terverifikasi'),
(5, 'kay', '202cb962ac59075b964b07152d234b70', 'kay', '2019-08-20', 'Jl. Way Sungkay, Komplek Besi Baja, Kelurahan Pahoman, Kecamatan Enggal', 'Pringsewu', '1212121', 'as', 'df', 'kurnia@kaymedia.net', 'pp_1566289681.jpg', 'Terverifikasi'),
(6, 'daftar', '07aad1df9d8908b63e5e8170b2bcc819', 'kurnia adiyoga', '2019-08-01', 'Jl. Way Sungkay, Komplek Besi Baja, Kelurahan Pahoman, Kecamatan Enggal ', 'Pringsewu', '1212121', 'instagram', 'wer ', 'kurnia@kaymedia.net', 'pp_1567504372.png', 'Terverifikasi'),
(7, 'jeefeej', '202cb962ac59075b964b07152d234b70', 'Ja\'far Furqon', '1993-03-13', 'Dusun Endah Murni', 'Pringsewu', '083108245658', 'https://www.instagram.com/jeefeej/', 'Mural Artist\r\nBlack Letter\r\nLampung Menulis', 'Jafarfurqon@gmail.com', 'pp_1568043914.jpg', 'Terverifikasi'),
(8, 'godfuckego', '202cb962ac59075b964b07152d234b70', 'David Irwandi', '1985-06-28', 'Karang Maritim II, Teluk Betung', 'Pringsewu', '08992284408', 'https://www.instagram.com/godfuckego/', 'Graffiti Writter\r\nPinstrping\r\nTjapdjago.Inc', 'davegfe@gmail.com', 'pp_1568044894.jpg', 'Terverifikasi'),
(9, 'infingeritrust', '202cb962ac59075b964b07152d234b70', 'Ibrahim Nurhaqim Admi', '1991-03-14', 'Jl. Karimun Jawa, Sukarame', 'Pringsewu', '081368510050', 'https://www.instagram.com/infingeritrust/', 'Mural Artist\r\n#infingeritrust', 'ibrahimnurhaqima@gmail.com', 'pp_1568045021.jpg', 'Belum Terverifikasi'),
(10, 'dederejeki', '202cb962ac59075b964b07152d234b70', 'Dede Rejeki Saputra', '1992-05-15', 'Jl. Danau Towuti, Way Halim', 'Pringsewu', '085721530223', 'https://www.instagram.com/dederejeki/', 'Graffiti Writter\r\nStencil House', 'dede_rsaputra@yahoo.com.sg', 'pp_1568045764.jpg', 'Terverifikasi'),
(11, 'anggi.angs', '202cb962ac59075b964b07152d234b70', 'Anggy Saputra', '1998-02-21', 'Jl. P Legundi Gg. Hj Ayat No. 233', 'Pringsewu', '089646656667', 'https://www.instagram.com/angs______/', 'Mural Artist', 'anggysaputra2102@gmail.com', 'pp_1568045960.jpg', 'Terverifikasi'),
(12, 'wicakspotch', '202cb962ac59075b964b07152d234b70', 'Saktia Wicaksana', '1985-10-01', 'Beringin Raya, Kemiling', 'Pringsewu', '085658851814', 'https://www.instagram.com/wicakspotch/', 'Graffiti Writter', 'nantidikirim@gmail.com', 'pp_1568048131.jpg', 'Terverifikasi'),
(13, 'gold_dot', '202cb962ac59075b964b07152d234b70', 'Fedy Aryanda Prasetya', '1992-02-19', 'Pajaresuk, Pringsewu', 'Pringsewu', '08981738336', 'https://www.instagram.com/gold_dot/', 'Realistic Graffiti', 'ferdy.aryanda@gmail.com', 'pp_1568048735.jpg', 'Terverifikasi'),
(14, 'Hendi', '202cb962ac59075b964b07152d234b70', 'hendi apasih', '1991-12-14', 'Jl. Karimun Jawa', 'Bandar Lampung', '081368510050', 'https://www.instagram.com/angs______/', 'Mural Artist', 'ibrahimnurhaqima@gmail.com', 'pp_1569241532.jpg', 'Terverifikasi'),
(15, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Belum Terverifikasi'),
(16, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Belum Terverifikasi'),
(17, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Belum Terverifikasi'),
(18, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Belum Terverifikasi'),
(19, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Belum Terverifikasi'),
(20, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Belum Terverifikasi'),
(21, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Belum Terverifikasi'),
(22, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Belum Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id_rating` int(11) NOT NULL,
  `id_karya` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `jumlahrating` int(11) DEFAULT NULL,
  `tglrating` varchar(30) DEFAULT NULL,
  `id_penggunadari` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rating`
--

INSERT INTO `tbl_rating` (`id_rating`, `id_karya`, `id_pengguna`, `jumlahrating`, `tglrating`, `id_penggunadari`) VALUES
(1, 5, 3, 10, '2019-09-03', 5),
(3, 7, 5, 10, '2019-09-03', 3),
(4, 6, 5, 5, '2019-09-03', 3),
(5, 4, 5, 1, '2019-09-03', 3),
(6, 7, 5, 6, '2019-09-03', 6),
(7, 6, 5, 7, '2019-09-03', 6),
(8, 5, 3, 9, '2019-09-03', 6),
(9, 4, 5, 8, '2019-09-03', 6),
(11, 3, 3, 10, '2019-09-03', 6),
(12, 8, 5, 9, '2019-09-06', 3),
(13, 12, 13, 1, '2019-09-20', 10),
(14, 11, 13, 1, '2019-09-20', 10),
(15, 10, 13, 1, '2019-09-20', 10),
(16, 15, 10, 1, '2019-09-21', 13),
(17, 14, 10, 1, '2019-09-21', 13),
(18, 13, 10, 1, '2019-09-21', 13),
(19, 27, 12, 1, '2019-09-23', 14),
(20, 26, 12, 1, '2019-09-23', 14),
(21, 25, 3, 1, '2019-09-23', 14),
(22, 24, 3, 1, '2019-09-23', 14),
(23, 28, 14, 1, '2019-09-23', 13),
(24, 27, 12, 1, '2019-09-23', 13),
(25, 26, 12, 1, '2019-09-23', 13),
(26, 25, 3, 1, '2019-09-23', 13);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_karya`
--
ALTER TABLE `tbl_karya`
  ADD PRIMARY KEY (`id_karya`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_karya`
--
ALTER TABLE `tbl_karya`
  MODIFY `id_karya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
