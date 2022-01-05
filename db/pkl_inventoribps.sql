-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 05 Jan 2022 pada 06.49
-- Versi server: 5.7.34
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_inventoribps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_barangk` int(11) NOT NULL,
  `no_transaksi_ke` varchar(25) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `penanggung_jawab` varchar(25) NOT NULL,
  `kode_barang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `tb_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `tr_aft_del_mk` AFTER DELETE ON `tb_barang_keluar` FOR EACH ROW BEGIN 
UPDATE tb_stok SET 
stok = stok+OLD.jumlah
WHERE
kode_barang= OLD.kode_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_mk` AFTER INSERT ON `tb_barang_keluar` FOR EACH ROW BEGIN 
UPDATE tb_stok SET 
stok = stok-NEW.jumlah
WHERE
kode_barang= NEW.kode_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_up_mk` AFTER UPDATE ON `tb_barang_keluar` FOR EACH ROW BEGIN 
UPDATE tb_stok SET
stok = stok+OLD.jumlah,
stok = stok-NEW.jumlah
WHERE
kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_barang` int(11) NOT NULL,
  `no_transaksi` varchar(25) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `kode_suplier` varchar(25) NOT NULL,
  `kode_barang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_barang`, `no_transaksi`, `tgl_masuk`, `nama_barang`, `jumlah`, `jenis_barang`, `kode_suplier`, `kode_barang`) VALUES
(8, '123/77', '2021-12-26', 'Laptop', '12', 'Baru', 'KS 1', 'BRG01'),
(9, '123/78', '2021-12-30', 'Laptop', '1', 'Baru', 'KS 1', 'BRG01');

--
-- Trigger `tb_barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `tr_del_mm` AFTER DELETE ON `tb_barang_masuk` FOR EACH ROW BEGIN 
UPDATE tb_stok SET
stok=stok-OLD.jumlah
WHERE
kode_barang = OLD.kode_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_mm` AFTER INSERT ON `tb_barang_masuk` FOR EACH ROW BEGIN 
INSERT 
INTO tb_stok SET 
kode_barang = NEW.kode_barang,
nama_barang = NEW.nama_barang,
jenis_barang = NEW.jenis_barang,
stok = NEW.jumlah,
tgl_masuk = NEW.tgl_masuk
ON DUPLICATE KEY 
UPDATE stok=stok+NEW.jumlah;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_up_mm` AFTER UPDATE ON `tb_barang_masuk` FOR EACH ROW BEGIN 
UPDATE tb_stok SET 
kode_barang = NEW.kode_barang,
nama_barang = NEW.nama_barang,
jenis_barang = NEW.jenis_barang,
tgl_masuk = NEW.tgl_masuk,
stok = stok-OLD.jumlah,
stok = stok+NEW.jumlah
WHERE
kode_barang = NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama_gudang` varchar(150) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `cp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `nama_gudang`, `telp`, `alamat`, `cp`) VALUES
(1, 'Gudang Barang C13', '081299199', 'Jl. P. Antasari No.81, Pekapuran Laut, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70233', 'H. Sanusi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventaris`
--

CREATE TABLE `tb_inventaris` (
  `id_inven` int(11) NOT NULL,
  `nama_inven` varchar(150) NOT NULL,
  `tanggal_perolehan` date NOT NULL,
  `sumber_dana` varchar(150) NOT NULL,
  `letak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_inventaris`
--

INSERT INTO `tb_inventaris` (`id_inven`, `nama_inven`, `tanggal_perolehan`, `sumber_dana`, `letak`) VALUES
(1, 'Laptop', '2021-12-28', 'PAGU', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nm_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `nm_user`, `username`, `password`) VALUES
(3, 'Admin', 'admin', '7acb6b5e4e6a505dc0302abcdbfbef80'),
(4, 'Rio', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `nip` varchar(150) NOT NULL,
  `tmp_lhr` varchar(100) NOT NULL,
  `tgl_lhr` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `tmp_lhr`, `tgl_lhr`, `alamat`, `telp`) VALUES
(1, 'Hamzah Akhmad', '196411101989031024', 'Banjarmasin', '2022-01-06', 'Jl. P. Antasari, Pekapuran Raya, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70234', '082832189993'),
(2, 'Alfianoor', '196605221986022002', 'Tamban', '2022-01-19', 'Jl. P. Antasari Gg. Suka Damai No.24, Pekapuran Laut, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70233', '08977231221'),
(4, 'Kifli', '126381293719827391', 'Banjarmasin', '1996-10-21', 'banjarmasin', '0812392193190');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `kode_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(25) NOT NULL,
  `stok` varchar(25) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`kode_barang`, `nama_barang`, `jenis_barang`, `stok`, `tgl_masuk`) VALUES
('BRG01', 'Laptop', 'Baru', '13', '2021-12-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suplier`
--

CREATE TABLE `tb_suplier` (
  `id_suplier` int(11) NOT NULL,
  `kode_suplier` varchar(150) NOT NULL,
  `nama_suplier` varchar(150) NOT NULL,
  `nama_toko` varchar(150) NOT NULL,
  `telp` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_suplier`
--

INSERT INTO `tb_suplier` (`id_suplier`, `kode_suplier`, `nama_suplier`, `nama_toko`, `telp`, `alamat`) VALUES
(1, 'KS 1', 'Asrani Nazib', 'SALATIGA TOKO', '09885348573', 'Jl. P. Antasari No.81, Pekapuran Laut, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70233');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_jalan`
--

CREATE TABLE `tb_surat_jalan` (
  `no_surat` varchar(25) NOT NULL,
  `tgl_jalan` date NOT NULL,
  `nama_sopir` varchar(25) NOT NULL,
  `no_pol` varchar(25) NOT NULL,
  `alamat_tujuan` varchar(50) NOT NULL,
  `no_transaksi_ke` varchar(25) NOT NULL,
  `nama_material` varchar(25) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `jenis_material` varchar(25) NOT NULL,
  `kode_proyek` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_jalan`
--

INSERT INTO `tb_surat_jalan` (`no_surat`, `tgl_jalan`, `nama_sopir`, `no_pol`, `alamat_tujuan`, `no_transaksi_ke`, `nama_material`, `jumlah`, `jenis_material`, `kode_proyek`) VALUES
('S1', '2019-01-17', 'Syamsul', 'DA 3562 BJ', 'Alaak', '1', 'Steel', '7', 'Logam, Baja, Almunium, Te', 'P1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_barangk`);

--
-- Indeks untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indeks untuk tabel `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  ADD PRIMARY KEY (`id_inven`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `tb_suplier`
--
ALTER TABLE `tb_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indeks untuk tabel `tb_surat_jalan`
--
ALTER TABLE `tb_surat_jalan`
  ADD PRIMARY KEY (`no_surat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id_barangk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  MODIFY `id_inven` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_suplier`
--
ALTER TABLE `tb_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
