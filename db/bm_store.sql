-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2024 pada 15.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bm_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin1', 'Bagus Maulana'),
(2, 'admin', 'admin2', 'Kaisar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand_produk`
--

CREATE TABLE `brand_produk` (
  `id_brand_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_brand_produk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `brand_produk`
--

INSERT INTO `brand_produk` (`id_brand_produk`, `id_kategori`, `id_produk`, `nama_brand_produk`) VALUES
(1, 1, 1, 'Eagle'),
(2, 1, 2, 'Eagle'),
(3, 3, 3, 'Standar'),
(4, 3, 58, 'Standar'),
(5, 1, 60, 'Eagle'),
(6, 3, 61, 'Standar'),
(7, 8, 65, 'Ga tau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coba`
--

CREATE TABLE `coba` (
  `id coba` int(11) NOT NULL,
  `role` enum('pengatur waktu','waktu','hari') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sepatu Olahraga'),
(2, 'Sepatu Sekolah'),
(3, 'Pulpen'),
(4, 'Sepatu Sneakers'),
(5, 'pensil'),
(8, 'apa'),
(9, 'Sepatu Sepakbola'),
(10, 'coba'),
(11, 'tas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `foto_pelanggan` varchar(255) NOT NULL,
  `nama-lengkap_pelanggan` varchar(50) NOT NULL,
  `nama-panggilan_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `no-telepon_pelanggan` varchar(15) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `role` enum('admin','pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `foto_pelanggan`, `nama-lengkap_pelanggan`, `nama-panggilan_pelanggan`, `email_pelanggan`, `password_pelanggan`, `no-telepon_pelanggan`, `alamat_pelanggan`, `role`) VALUES
(1, 'foto1.jpg', 'Danu Reza', 'Danu', 'Danu@gmail.com', 'Danu01', '011111111111111', 'Jalan Perjuangan, Kelurahan Karyamulya, Kecamatan Kesambi, Kota Cirebon,Jawa Barat,', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembelian` int(10) NOT NULL,
  `jumlah_pembelian` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`) VALUES
(1, 1, '2024-08-18', 300000),
(2, 1, '2024-08-18', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id-pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id-pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 2, 3, 2);

--
-- Trigger `pembelian_produk`
--
DELIMITER $$
CREATE TRIGGER `bonus` BEFORE INSERT ON `pembelian_produk` FOR EACH ROW BEGIN
     IF (new.jumlah > 50 AND new.jumlah < 100)
     THEN set new.jumlah = new.jumlah + 5;
     ELSEIF (new.jumlah > 100 && new.jumlah < 150)
     THEN set new.jumlah = new.jumlah + 10;
     ELSEIF (new.jumlah > 150)
     THEN set new.jumlah = new.jumlah + 20;
     END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_stock` AFTER DELETE ON `pembelian_produk` FOR EACH ROW BEGIN
INSERT INTO log_pembelian(operasi, waktu)
VALUES("Delete",CURRENT_DATE);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_update` BEFORE INSERT ON `pembelian_produk` FOR EACH ROW BEGIN
INSERT INTO log_pembelian(operasi, waktu)
VALUES("update",CURRENT_DATE);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stock` AFTER INSERT ON `pembelian_produk` FOR EACH ROW BEGIN
update produk set stock_produk = stock_produk - new.jumlah
WHERE id_produk = new.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stock_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stock_produk`) VALUES
(1, 1, 'Eagle Sepatu Lari OverRun – Running Shoes | Abu Tua Merah', 300000, 1000, 'sepatu-running1-3.jpeg', 'Sepatu Eagle OverRun – Running Shoes \r\n\r\n\r\nTerlahir dengan design yang stylish namun tetap elegan, membuat sepatu Eagle OverRun menjadi sepatu lari yang pas untuk gayamu yang kekinian .\r\n\r\n\r\nDetail :\r\n\r\n- Upper Material Kombinasi Sandwich Mesh , TPU Hotmelt ,Synthetic Leather menambah kenyamanan saat di gunakan .\r\n\r\n- Tounge Lining Cushion Bantalan empuk pada bagian dalam tange sepatu \r\n\r\n- IP ( Injection Phylon ) yang empuk di kombinasikan dengan Rubber yang kuat dan tidak Licin\r\n\r\n\r\nSize \r\n\r\n38 : 22.8cm\r\n\r\n38.5 : 23.1cm\r\n\r\n39 : 23.5cm\r\n\r\n39.5 : 24.1cm\r\n\r\n40 : 24.4cm\r\n\r\n40.5 : 24.8cm\r\n\r\n41 : 25.4cm\r\n\r\n41.5 : 25.7cm\r\n\r\n42 : 26cm\r\n\r\n42.5 : 26.7cm\r\n\r\n43 : 27cm\r\n\r\n43.5 : 27.3cm\r\n\r\n44 : 27.9cm', 100),
(2, 1, 'Eagle Sepatu Lari OverRun – Running Shoes | Abu Tua Putih Citrun', 300000, 1000, 'sepatu-running1-2.jpeg', 'Sepatu Eagle OverRun – Running Shoes \r\n\r\n\r\nTerlahir dengan design yang stylish namun tetap elegan, membuat sepatu Eagle OverRun menjadi sepatu lari yang pas untuk gayamu yang kekinian .\r\n\r\n\r\nDetail :\r\n\r\n- Upper Material Kombinasi Sandwich Mesh , TPU Hotmelt ,Synthetic Leather menambah kenyamanan saat di gunakan .\r\n\r\n- Tounge Lining Cushion Bantalan empuk pada bagian dalam tange sepatu \r\n\r\n- IP ( Injection Phylon ) yang empuk di kombinasikan dengan Rubber yang kuat dan tidak Licin\r\n\r\n\r\nSize \r\n\r\n38 : 22.8cm\r\n\r\n38.5 : 23.1cm\r\n\r\n39 : 23.5cm\r\n\r\n39.5 : 24.1cm\r\n\r\n40 : 24.4cm\r\n\r\n40.5 : 24.8cm\r\n\r\n41 : 25.4cm\r\n\r\n41.5 : 25.7cm\r\n\r\n42 : 26cm\r\n\r\n42.5 : 26.7cm\r\n\r\n43 : 27cm\r\n\r\n43.5 : 27.3cm\r\n\r\n44 : 27.9cm', 100),
(3, 3, 'Pulpen Standar 1 PAK isi 12 | Biru', 20000, 180, 'pulpen-standar1-1.jpeg', 'Mata pena dibuat dengan mesin paling mutakhir dari Swiss secara \"IN-HOUSE\" menggunakan teknologi \"ORBIT CUT\" dan \"SPACE BALL\" , bola Tungsten Carbide dengan \"SURFACE TREATMENT\" membuat bola mata pena lebih bebas berputar sehingga.\r\n\r\nHARGA TERTERA UNTUK 1 PAK ISI 12 PCS\r\n\r\nSpesifikasi Produk :\r\nTip (Mata Pena) : Alfa Tip 0.5 mm\r\nTipe Tinta : Oil Gel\r\nWarna Tinta / Ink : Black / Blue / Red (Silahkan Pilih di Varian Produk)\r\nWarna Pulpen : Hitam/ Biru / Merah(Sesuai Warna Tinta)\r\nBerat produk persatuan: 15gram\r\nTotal berat bersih produk: 180gram', 500),
(58, 3, 'Pulpen Standar 1 PAK isi 12 | Merah', 20000, 180, '20240823141956pulpen-standar1-3.jpeg', 'Mata pena dibuat dengan mesin paling mutakhir dari Swiss secara \"IN-HOUSE\" menggunakan teknologi \"ORBIT CUT\" dan \"SPACE BALL\" , bola Tungsten Carbide dengan \"SURFACE TREATMENT\" membuat bola mata pena lebih bebas berputar sehingga.\r\n\r\nHARGA TERTERA UNTUK 1 PAK ISI 12 PCS\r\n\r\nSpesifikasi Produk :\r\nTip (Mata Pena) : Alfa Tip 0.5 mm\r\nTipe Tinta : Oil Gel\r\nWarna Tinta / Ink : Black / Blue / Red (Silahkan Pilih di Varian Produk)\r\nWarna Pulpen : Hitam/ Biru / Merah(Sesuai Warna Tinta)\r\n\r\nBerat produk persatuan: 15gram\r\nTotal berat bersih produk: 180gram', 500),
(60, 1, 'Eagle Sepatu Lari OverRun – Running Shoes | Abu Tua Oranye', 300000, 1000, 'sepatu-running1-1.jpeg', 'Sepatu Eagle OverRun – Running Shoes \r\n\r\nTerlahir dengan design yang stylish namun tetap elegan, membuat sepatu Eagle OverRun menjadi sepatu lari yang pas untuk gayamu yang kekinian .\r\n\r\nDetail :\r\n- Upper Material Kombinasi Sandwich Mesh , TPU Hotmelt ,Synthetic Leather menambah kenyamanan \r\n  saat di gunakan .\r\n- Tounge Lining Cushion Bantalan empuk pada bagian dalam tange sepatu.\r\n\r\n- IP ( Injection Phylon ) yang empuk di kombinasikan dengan Rubber yang kuat dan tidak Licin.\r\n\r\n\r\nSize: \r\n38 : 22.8cm\r\n38.5 : 23.1cm\r\n39 : 23.5cm\r\n39.5 : 24.1cm\r\n40 : 24.4cm\r\n40.5 : 24.8cm\r\n41 : 25.4cm\r\n41.5 : 25.7cm\r\n42 : 26cm\r\n42.5 : 26.7cm\r\n43 : 27cm\r\n43.5 : 27.3cm\r\n44 : 27.9cm', 100),
(61, 3, 'Pulpen Standar 1 PAK isi 12 | Hitam', 20000, 180, 'pulpen-standar1-2.jpeg', 'Mata pena dibuat dengan mesin paling mutakhir dari Swiss secara \"IN-HOUSE\" menggunakan teknologi \"ORBIT CUT\" dan \"SPACE BALL\" , bola Tungsten Carbide dengan \"SURFACE TREATMENT\" membuat bola mata pena lebih bebas berputar sehingga.\r\n\r\nHARGA TERTERA UNTUK 1 PAK ISI 12 PCS\r\n\r\nSpesifikasi Produk :\r\nTip (Mata Pena) : Alfa Tip 0.5 mm\r\nTipe Tinta : Oil Gel\r\nWarna Tinta / Ink : Black / Blue / Red (Silahkan Pilih di Varian Produk)\r\nWarna Pulpen : Hitam/ Biru / Merah(Sesuai Warna Tinta)\r\n\r\nBerat produk persatuan: 15gram\r\nTotal berat bersih produk: 180gram', 500),
(67, 10, 'sepatu eagle', 300000, 1000, 'download (1).jpeg', 'ini barang trend', 100),
(68, 11, 'pollo trands', 300000, 500, '5e2816e1a2cda00736d77853f0f7f478.jpeg', 'tas pollo trands', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(1, 60, 'sepatu-running1-1.jpeg'),
(2, 60, 'sepatu-running1-11.jpeg'),
(3, 60, 'sepatu-running1.jpeg'),
(5, 61, 'pulpen-standar1-2.jpeg'),
(6, 3, 'pulpen-standar1-1.jpeg'),
(7, 2, 'sepatu-running1-2.jpeg'),
(12, 1, 'sepatu-running1-3.jpeg'),
(13, 1, '20240822142229sepatu-running1-33.jpeg'),
(14, 1, '20240822142239sepatu-running1.jpeg'),
(15, 2, '20240822142303sepatu-running1-22.jpeg'),
(16, 2, '20240822142310sepatu-running1.jpeg'),
(36, 58, '20240823141956pulpen-standar1-3.jpeg'),
(42, 67, 'download (1).jpeg'),
(43, 67, 'sepatu-running1.jpeg'),
(44, 67, 'download (4).jpeg'),
(45, 68, '5e2816e1a2cda00736d77853f0f7f478.jpeg'),
(46, 68, '0320330750496ad9c608ec8fdd5a20f6.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `brand_produk`
--
ALTER TABLE `brand_produk`
  ADD PRIMARY KEY (`id_brand_produk`);

--
-- Indeks untuk tabel `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`id coba`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id-pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `brand_produk`
--
ALTER TABLE `brand_produk`
  MODIFY `id_brand_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `coba`
--
ALTER TABLE `coba`
  MODIFY `id coba` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembelian` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id-pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
