-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 06:20 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `titipinaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id_address` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `no_penerima` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id_address`, `nama_penerima`, `no_penerima`, `provinsi`, `kota`, `kecamatan`, `alamat_lengkap`) VALUES
(1, 'fadhil', '0898089898', 'Sumatra Selatan', 'Lahat', 'Puworejo', 'gunung gajah');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'admin titipinaja');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(50) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `no_rek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `nama_lengkap`, `wilayah`, `cabang`, `no_rek`) VALUES
(1, 'BRI AJA', 'Aja Aja', 'Jakarta', 'Kemiri', '087627451947');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `email_customer` varchar(50) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `password_customer` varchar(50) NOT NULL,
  `telepon_customer` varchar(20) NOT NULL,
  `image_customer` varchar(50) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `no_penerima` varchar(20) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `email_customer`, `nama_customer`, `password_customer`, `telepon_customer`, `image_customer`, `nama_penerima`, `no_penerima`, `kecamatan`, `kabupaten`, `alamat_lengkap`, `nama_bank`, `no_rek`) VALUES
(1, 'titipinaja@gmail.com', 'Permana Bagas', 'customer01', '089765764763', 'logo-android-08.png', 'Adhitya Bagas', '089765764763', 'Kemiri', 'Purworejo', 'Kemiri, Purworejo, Jawa Tengah', 'BCA', '012321432345'),
(21, 'aan@gmail.com', 'Aan Setiadi', '09876', '08978987656', 'anders-jilden-GjwsHRIcQjU-unsplash.jpg', 'Aan Setiadi ', '087676879865', 'Lahat', 'Palembang', 'Lahat, Kemiri, Palembang, Sumatera Utara, 54321', 'BRI', '0123432131');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Purworejo', 25000),
(2, 'Yogyakarta', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `bukti` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama_customer`, `bank`, `jumlah`, `tanggal_pembayaran`, `bukti`) VALUES
(6, 70, 'Adhitya Bagas', 'BRI', 4220000, '2020-01-08', '20200108164651Surface Pro Wallpaper 19836.jpg'),
(7, 71, 'Aan Setiadi', 'BCA', 5020000, '2020-01-08', '20200108180713vincentiu-solomon-ln5drpv_ImI-unsplash.jpg'),
(8, 72, 'Adhitya Suban', 'BRI', 2520000, '2020-01-08', '20200108183558alexander-popov-3InMDrsuYrk-unsplash.jpg'),
(9, 73, 'Aan Setiadi', 'BCA', 1775000, '2020-01-09', '20200109070900Vans - 4.jpeg'),
(10, 74, 'Aan Setiadi', 'BCA', 1775000, '2020-01-09', '20200109073752Vans - 2.jpeg'),
(11, 75, 'Aan Setiadi', 'BCA', 1400000, '2020-01-09', '20200109075523Vans - 3.jpeg'),
(12, 76, 'Aan Setiadi', 'BRI', 1770000, '2020-01-09', '20200109164136Vans - 3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `status_pembelian` varchar(50) NOT NULL DEFAULT 'Pending',
  `nomor_resi` varchar(50) NOT NULL,
  `ket_refund` varchar(250) NOT NULL,
  `tanggal_diterima` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_customer`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `status_pembelian`, `nomor_resi`, `ket_refund`, `tanggal_diterima`) VALUES
(70, 21, 2, '2020-01-08', 4220000, 'Yogyakarta', 20000, 'Barang diterima', '123456', '', '2020-01-09'),
(74, 21, 1, '2020-01-09', 1775000, 'Purworejo', 25000, 'Barang diterima', '023125', '', '2020-01-09'),
(75, 21, 2, '2020-01-09', 1400000, 'Yogyakarta', 20000, 'Proses refund', '789456', 'Barang ada cacat', '2020-01-09'),
(76, 21, 2, '2020-01-09', 1770000, 'Yogyakarta', 20000, 'Barang diterima', '098890', '', '2020-01-09'),
(77, 21, 1, '2020-01-09', 1825000, 'Purworejo', 25000, 'Pending', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL,
  `berat` int(11) NOT NULL,
  `sub_berat` int(11) NOT NULL,
  `sub_harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah_produk`, `nama`, `harga`, `berat`, `sub_berat`, `sub_harga`) VALUES
(33, 70, 22, 2, 'Adidas Ultraboost Black ', 2100000, 600, 1200, 4200000),
(37, 74, 25, 1, 'Adidas Boost 36', 1750000, 650, 650, 1750000),
(38, 75, 26, 2, 'Adidas Stan Smith', 690000, 500, 1000, 1380000),
(39, 76, 25, 1, 'Adidas Boost 36', 1750000, 650, 650, 1750000),
(40, 77, 24, 1, 'Adidas Zoom XStyle 36', 1800000, 700, 700, 1800000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `image_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `image_produk`, `deskripsi_produk`, `stok`) VALUES
(19, 'Adidas Ultraboost Red', 2500000, 750, 'adidas_red.jpg', 'Adidas Ultraboost Red', 1),
(21, 'Nike Zoom 938 2012', 1200000, 700, 'adidas_white.jpg', 'Nike Zoom 938 2012 AKA White', 3),
(22, 'Adidas Ultraboost Black ', 2100000, 600, 'adidas_black.jpg', 'Adidas Ultraboost Black 2019', 3),
(24, 'Adidas Zoom XStyle 36', 1800000, 700, 'adidas_orange.jpg', 'Adidas Zoom XStyle 36', 3),
(25, 'Adidas Boost 36', 1750000, 650, 'adidas_orange_boost.jpg', 'Adidas Boost 36', 1),
(26, 'Adidas Stan Smith', 690000, 500, 'adidas_stan.jpg', 'Adidas Stan Smith', 3);

-- --------------------------------------------------------

--
-- Table structure for table `produk_request`
--

CREATE TABLE `produk_request` (
  `id_request` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `nama_request` varchar(100) NOT NULL,
  `berat_request` varchar(50) NOT NULL,
  `harga_request` varchar(50) NOT NULL,
  `link_request` varchar(100) NOT NULL,
  `image_request` varchar(100) NOT NULL,
  `status_request` varchar(100) NOT NULL DEFAULT 'Request pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_request`
--

INSERT INTO `produk_request` (`id_request`, `id_customer`, `nama_request`, `berat_request`, `harga_request`, `link_request`, `image_request`, `status_request`) VALUES
(2, 21, 'Adidas Stan Vol.1', '350', '745000', 'www.link.ini.com', '20200109105905adidas_camo.jpg', 'Request pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_request`
--
ALTER TABLE `produk_request`
  ADD PRIMARY KEY (`id_request`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `produk_request`
--
ALTER TABLE `produk_request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
