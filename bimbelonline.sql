-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 12:15 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbelonline`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cekuser` (`user` VARCHAR(35), `pass` VARCHAR(35))  BEGIN
SELECT * FROM user WHERE username = user AND password = pass;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletedetailbimbel` (`idb` VARCHAR(11))  BEGIN
	DELETE FROM detail_bimbel WHERE id_bimbel = idb;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletedetailpaketByIDPaket` (`id` VARCHAR(10))  BEGIN
	DELETE FROM detail_paket WHERE id_paket = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletemapel` (`id` VARCHAR(5))  BEGIN
	DELETE FROM detail_paket WHERE id_pelajaran = id;
	DELETE FROM mata_pelajaran WHERE id_pelajaran = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletepaket` (IN `id` VARCHAR(5))  BEGIN
	DELETE FROM paket WHERE id_paket = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editpaketByID` (`id` VARCHAR(5), `namaP` VARCHAR(50), `hargaP` VARCHAR(10))  BEGIN
	UPDATE paket SET nama_paket = namaP, harga = hargaP WHERE id_paket = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusbimbel` (IN `idb` INT(11))  BEGIN
DELETE FROM bimbel WHERE id_bimbel = idb;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hitungtampilbimbel` (`namab` VARCHAR(50))  BEGIN
SELECT count(alamat) as d From bimbel where nama_bimbel like namab;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertbimbel` (IN `namab` VARCHAR(150), IN `alamatb` TEXT, IN `telponb` VARCHAR(20), IN `latitudeb` VARCHAR(50), IN `longitudeb` VARCHAR(50), IN `websiteb` VARCHAR(50))  BEGIN
INSERT INTO bimbel set nama_bimbel = namab, alamat = alamatb, telpon = telponb,website = websiteb, latitude = latitudeb, longitude = longitudeb;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertdetailbimbel` (IN `idb` VARCHAR(11), IN `idp` VARCHAR(11))  BEGIN
	INSERT detail_bimbel (id_bimbel,id_paket) VALUES (idb,idp);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertdetailpaket` (`id` VARCHAR(10), `idp` VARCHAR(10))  BEGIN
	INSERT INTO detail_paket SET id_paket = id, id_pelajaran = idp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertmapel` (`id` VARCHAR(5), `namaM` VARCHAR(50))  BEGIN
	INSERT INTO mata_pelajaran SET id_pelajaran = id, nama_pelajaran = namaM;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertpaket` (`id` VARCHAR(5), `namaP` VARCHAR(50), `hargaP` VARCHAR(10))  BEGIN
	INSERT INTO paket SET id_paket = id, nama_paket = namaP, harga = hargaP;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilbimbel` ()  BEGIN
	SELECT * FROM bimbel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilbimbelByLikeNama` (IN `namab` VARCHAR(50))  BEGIN
	SELECT * FROM bimbel WHERE nama_bimbel LIKE namab;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilbimbelByLng` (`lng` VARCHAR(50))  BEGIN
SELECT * FROM bimbel where longitude  = lng;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilbimbelByNamaBiasa` (IN `namab` VARCHAR(50))  BEGIN
SELECT * FROM bimbel where nama_bimbel = namab;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampildetailpaketByIDPAKET` (IN `id` VARCHAR(10))  BEGIN
	SELECT * FROM detail_paket,mata_pelajaran WHERE detail_paket.id_pelajaran = mata_pelajaran.id_pelajaran and detail_paket.id_paket = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilmapel` ()  BEGIN
	SELECT * FROM mata_pelajaran ORDER BY id_pelajaran asc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilmapelbyIDPaketLIMIT` (IN `id` VARCHAR(50), IN `batas` INT(2), IN `akhir` INT(2))  BEGIN
	SELECT * FROM paket,mata_pelajaran,detail_paket WHERE paket.id_paket = detail_paket.id_paket and detail_paket.id_pelajaran = mata_pelajaran.id_pelajaran and paket.id_paket = id ORDER BY paket.id_paket asc LIMIT batas,akhir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilmapelByLimit` (`posisi` INT(5), `batas` INT(5))  BEGIN
	SELECT * FROM mata_pelajaran LIMIT posisi,batas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilmapelByMapel` (IN `mapel` VARCHAR(50))  BEGIN
SELECT bimbel.nama_bimbel, bimbel.latitude, bimbel.longitude FROM bimbel , detail_bimbel , detail_paket , mata_pelajaran , paket WHERE bimbel.id_bimbel = detail_bimbel.id_bimbel and detail_paket.id_paket = detail_bimbel.id_paket and detail_paket.id_pelajaran = mata_pelajaran.id_pelajaran and detail_paket.id_paket = paket.id_paket and mata_pelajaran.nama_pelajaran = mapel GROUP BY bimbel.nama_bimbel;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilmapelByNama` (`namaM` VARCHAR(50))  BEGIN
	SELECT * FROM mata_pelajaran WHERE nama_pelajaran LIKE namaM;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilpaket` ()  BEGIN
	SELECT * FROM paket ORDER BY id_paket asc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilpaketByID` (`id` VARCHAR(5))  BEGIN
	SELECT * FROM paket WHERE id_paket = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilpaketByidLIMIT` (IN `id` VARCHAR(10), IN `batas` INT(2), IN `akhir` INT(2))  BEGIN
SELECT paket.nama_paket FROM bimbel , detail_bimbel , detail_paket , mata_pelajaran , paket WHERE bimbel.id_bimbel = detail_bimbel.id_bimbel and detail_paket.id_paket = detail_bimbel.id_paket and detail_paket.id_pelajaran = mata_pelajaran.id_pelajaran and detail_paket.id_paket = paket.id_paket and bimbel.id_bimbel  = id GROUP BY paket.nama_paket order by paket.nama_paket asc LIMIT batas,akhir;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilpaketByLimit` (IN `posisi` INT(11), IN `batas` INT(11))  BEGIN
	SELECT * FROM paket LIMIT posisi,batas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampilpaketByNama` (IN `namaP` VARCHAR(50))  BEGIN
	SELECT * FROM paket WHERE nama_paket LIKE namaP;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatebimbel` (IN `namab` VARCHAR(50), IN `alamatb` TEXT, IN `telponb` VARCHAR(20), IN `latitudeb` VARCHAR(50), IN `longitudeb` VARCHAR(50), IN `idb` INT(11), IN `websiteb` VARCHAR(50))  BEGIN
 UPDATE bimbel SET nama_bimbel = namab, alamat = alamatb, telpon = telponb, latitude = latitudeb, website = websiteb , longitude = longitudeb where id_bimbel = idb;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bimbel`
--

CREATE TABLE `bimbel` (
  `id_bimbel` int(11) NOT NULL,
  `nama_bimbel` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbel`
--

INSERT INTO `bimbel` (`id_bimbel`, `nama_bimbel`, `alamat`, `telpon`, `latitude`, `longitude`, `website`) VALUES
(10, 'Bimbel Novia', 'Desa Wates, Kecamatan Undaan, Kabupaten Kudus', '0858750800041', '-6.863870', '110.828700', 'bimbelnovia.com'),
(19, 'Bimbel Agus', 'Desa Medini, Kecamatan Undaan, Kabupaten Kudus', '0858750800045', '-6.918924', '110.794774', 'bimbelagus.com'),
(20, 'Bimbel Gilang', 'Desa Tanjung Rejo, Kecamatan Jekulo, Kabupaten Kudus', '085870800043', '-6.824613', '110.895353', 'bimbelgilang.com'),
(21, 'Bimbel Erma', 'Desa Tanjung Rejo, Kecamatan Jekulo, Kabupaten Kudus', '085870800046', '-6.778420', '110.918517', 'bimbelerma.com'),
(22, 'Bimbel Adhi', 'Desa Mindahan Wuni, Kecamatan Batealit, Kabupaten Jepara', '0858750800048', '-6.614840', '110.813858', 'bimbeladhi.com');

--
-- Triggers `bimbel`
--
DELIMITER $$
CREATE TRIGGER `deletedetailbimbel` BEFORE DELETE ON `bimbel` FOR EACH ROW BEGIN
DELETE FROM detail_bimbel WHERE id_bimbel = OLD.id_bimbel;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_bimbel`
--

CREATE TABLE `detail_bimbel` (
  `id_bimbel` int(11) NOT NULL,
  `id_paket` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bimbel`
--

INSERT INTO `detail_bimbel` (`id_bimbel`, `id_paket`) VALUES
(19, 'P1'),
(19, 'P2'),
(10, 'P1'),
(10, 'P5'),
(10, 'P7'),
(20, 'P1'),
(20, 'P4'),
(20, 'P7'),
(21, 'P3'),
(21, 'P4'),
(21, 'P5'),
(22, 'P5'),
(22, 'P6');

-- --------------------------------------------------------

--
-- Table structure for table `detail_paket`
--

CREATE TABLE `detail_paket` (
  `id_paket` varchar(255) NOT NULL,
  `id_pelajaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_paket`
--

INSERT INTO `detail_paket` (`id_paket`, `id_pelajaran`) VALUES
('P3', 'MP01'),
('P3', 'MP05'),
('P3', 'MP03'),
('P4', 'MP01'),
('P4', 'MP05'),
('P4', 'MP04'),
('P5', 'MP01'),
('P5', 'MP05'),
('P5', 'MP07'),
('P6', 'MP01'),
('P6', 'MP05'),
('P6', 'MP08'),
('P7', 'MP05'),
('P7', 'MP04'),
('P2', 'MP01'),
('P2', 'MP05'),
('P2', 'MP06'),
('P1', 'MP01'),
('P1', 'MP02'),
('P1', 'MP05'),
('P1', 'MP06');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_pelajaran` varchar(255) NOT NULL,
  `nama_pelajaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_pelajaran`, `nama_pelajaran`) VALUES
('MP01', 'Matematika'),
('MP02', 'Fisika'),
('MP03', 'Kimia'),
('MP04', 'Biologi'),
('MP05', 'Bahasa Inggris'),
('MP06', 'Bahasa Indonesia'),
('MP07', 'Ekonomi'),
('MP08', 'Geografi');

--
-- Triggers `mata_pelajaran`
--
DELIMITER $$
CREATE TRIGGER `deletemapel` BEFORE DELETE ON `mata_pelajaran` FOR EACH ROW BEGIN
DELETE FROM detail_paket WHERE id_pelajaran = OLD.id_pelajaran;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(255) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`) VALUES
('P1', 'SMA1', '50000'),
('P2', 'SMK', '50000'),
('P3', 'SMA2', '60000'),
('P4', 'SMA3', '55000'),
('P5', 'SMA4', '45000'),
('P6', 'SMA5', '50000'),
('P7', 'SMA6', '45000');

--
-- Triggers `paket`
--
DELIMITER $$
CREATE TRIGGER `deletepaket` BEFORE DELETE ON `paket` FOR EACH ROW BEGIN
	DELETE FROM detail_bimbel WHERE id_paket = OLD.id_paket;
	DELETE FROM detail_paket WHERE id_paket = OLD.id_paket;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('agus', 'agus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbel`
--
ALTER TABLE `bimbel`
  ADD PRIMARY KEY (`id_bimbel`);

--
-- Indexes for table `detail_bimbel`
--
ALTER TABLE `detail_bimbel`
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_bimbel` (`id_bimbel`);

--
-- Indexes for table `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_pelajaran` (`id_pelajaran`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbel`
--
ALTER TABLE `bimbel`
  MODIFY `id_bimbel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_bimbel`
--
ALTER TABLE `detail_bimbel`
  ADD CONSTRAINT `detail_bimbel_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`),
  ADD CONSTRAINT `detail_bimbel_ibfk_3` FOREIGN KEY (`id_bimbel`) REFERENCES `bimbel` (`id_bimbel`);

--
-- Constraints for table `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD CONSTRAINT `detail_paket_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`),
  ADD CONSTRAINT `detail_paket_ibfk_2` FOREIGN KEY (`id_pelajaran`) REFERENCES `mata_pelajaran` (`id_pelajaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
