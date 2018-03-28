-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.5114
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for antrian
CREATE DATABASE IF NOT EXISTS `antrian` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `antrian`;

-- Dumping structure for table antrian.antrian
CREATE TABLE IF NOT EXISTS `antrian` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(144) NOT NULL,
  `umur` int(3) NOT NULL,
  `no_lp` text NOT NULL,
  `pasal` text NOT NULL,
  `no_sprinhan` varchar(75) NOT NULL,
  `tgl_sprinhan` date NOT NULL,
  `no_sprinhan_1` varchar(75) DEFAULT NULL,
  `tgl_sprinhan_1` date DEFAULT NULL,
  `lama_tahanan` int(4) NOT NULL,
  `tempat_tahanan` int(4) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `foto` varchar(144) DEFAULT NULL,
  `status` enum('0','1') NOT NULL,
  `date_create` datetime NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `date_update` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_antrian_tempat_tahanan` (`tempat_tahanan`),
  CONSTRAINT `FK_antrian_tempat_tahanan` FOREIGN KEY (`tempat_tahanan`) REFERENCES `tempat_tahanan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table antrian.antrian: ~40 rows (approximately)
/*!40000 ALTER TABLE `antrian` DISABLE KEYS */;
INSERT INTO `antrian` (`id`, `nama`, `umur`, `no_lp`, `pasal`, `no_sprinhan`, `tgl_sprinhan`, `no_sprinhan_1`, `tgl_sprinhan_1`, `lama_tahanan`, `tempat_tahanan`, `ket`, `foto`, `status`, `date_create`, `create_by`, `date_update`, `update_by`) VALUES
	(1, 'MUHAMMAD HAIRIL WAHI Als HAIRIL Bin HASAN BASRI (Alm).', 37, 'LP / 68 / X / 2017 / KALSEL / RES BJB / SEK BJB KOTA, tanggal 02 Oktober 2017.', 'Pasal 197 Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan jo Pasal 55 Ayat (1) ke-1 KUHP sub Pasal 196 Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan jo Pasal 55 Ayat (1) ke-1 KUHP.', 'SP. Han / 58 / X / 2017 / Reskrim.', '2017-10-04', 'No. 25 / Pen.Pid / 2017 / PN.Bjb', '2017-11-28', 102, 1, 'PN', 'foto/MUHAMMAD HAIRIL WAHI Als HAIRIL Bin HASAN BASRI (Alm)..jpg', '1', '2018-02-07 09:58:19', 'admin', NULL, NULL),
	(2, 'TONI HARIYADI Als TONI Bin TAMJID.', 45, 'LP / 68 / X / 2017 / KALSEL / RES BJB / SEK BJB KOTA, tanggal 02 Oktober 2017.', 'Pasal 197 Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan jo Pasal 55 Ayat (1) ke-1 KUHP sub Pasal 196 Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan jo Pasal 55 Ayat (1) ke-1 KUHP.', 'SP. Han / 57 / X / 2017 / Reskrim.', '2017-10-04', 'No. 26 / Pen.Pid / 2017 / PN.Bjb', '2017-11-28', 102, 1, 'PN', 'img/no_photo.jpg', '1', '2018-02-07 09:58:19', 'admin', NULL, NULL),
	(3, 'NURHADI Als KAI HADI Bin MUHDAR (Alm)', 57, 'LP / 259 / XI / 2017 / KALSEL / RES BJB, tanggal 22 November 2017.', 'Pasal 112 ayat (1) Undang-Undang Republik Indonesia Nomor 35 Tahun 2009 tentang Narkotika.\n', 'SP. Han / 108 / XI / 2017 / Reskrim.', '2017-11-24', 'SPP - 187 / Q.3.20 / Epp.1 / 12 / 2017', '2017-04-13', 51, 1, 'KEJARI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:20', 'admin', NULL, NULL),
	(4, 'LATIFAH Als BUNDA LALA Binti HAMDANI.', 31, 'LP / 266 / XI / 2017 / KALSEL / RES BJB, tanggal 30 November 2017.', 'Pasal 197 jo Pasal 106 ayat (1) sub Pasal 196 jo Pasal 98 ayat (2) dan ayat (3) Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan.\n', 'SP. Han / 110 / XII / 2017 / Reskrim.', '2017-12-02', 'SPP - 191 / Q.3.20 / Euh.1 / 12 / 2017', '2017-12-13', 43, 1, 'KEJARI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:20', 'admin', NULL, NULL),
	(5, 'YOGI HARTONO Als YOGI Bin SARMIN.', 25, 'LP / 267 / XI / 2017 / KALSEL / RES BJB, tanggal 30 November 2017.', 'Pasal 197 Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan jo Pasal 55 Ayat (1) ke-1 KUHP sub Pasal 196 Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan jo Pasal 55 Ayat (1) ke-1 KUHP.', 'SP. Han / 111 / XII / 2017 / Reskrim.', '2017-12-02', 'SPP - 192 / Q.3.20 / Euh.1 / 12 / 2017', '2017-11-13', 43, 1, 'KEJARI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:20', 'admin', NULL, NULL),
	(6, 'VAN TRINUR Als ASTRI Binti TAUFIK.', 22, 'LP / 267 / XI / 2017 / KALSEL / RES BJB, tanggal 30 November 2017.', 'Pasal 197 Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan jo Pasal 55 Ayat (1) ke-1 KUHP sub Pasal 196 Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan jo Pasal 55 Ayat (1) ke-1 KUHP.', 'SP. Han / 112 XII / 2017 / Resnarkoba.', '2017-12-02', 'SPP - 190 / Q.3.20 / Euh.1 / 12 / 2017', '2017-11-13', 43, 1, 'KEJARI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:20', 'admin', NULL, NULL),
	(7, 'BAYU ADITYA WARDHANA Als BAYU Bin ENDANG HARDJAWINATA.', 29, 'LP / 268 / XII / 2017 / KALSEL / RES BJB, tanggal 05 Desember 2017.', 'Pasal 112 ayat (1) Undang-Undang Republik Indonesia Nomor 35 Tahun 2009 tentang Narkotika.', 'SP. Han / 113 / XII / 2017 / Resnarkoba.', '2017-12-07', 'SPP - 193 / Q.3.20 / Euh.1 / 12 / 2017', '2017-12-13', 38, 1, 'KEJARI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:21', 'admin', NULL, NULL),
	(8, 'MUHAMMAD YUSUF Als USUF Bin JUHRAN.', 24, 'LP / 269 / XII / 2017 / KALSEL / RES BJB, tanggal 05 Desember 2017.', 'Pasal 114 ayat (1) sub Pasal 112 ayat (1) Undang-Undang Republik Indonesia Nomor 35 Tahun 2009 tentang Narkotika.', 'SP. Han / 114 / XII / 2017 / Resnarkoba.', '2017-12-07', 'SPP - 194 / Q.3.20 / Euh.1 / 12 / 2017', '2017-12-13', 38, 1, 'KEJARI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:21', 'admin', NULL, NULL),
	(9, 'MUHAMMAD ARSYAD Als AMAT Bin ABDUL GAFAR (Alm).', 24, 'LP / 270 / XII / 2017 / KALSEL / RES BJB, tanggal 05 Desember 2017.', 'Pasal 114 ayat (1) sub Pasal 112 ayat (1) Undang-Undang Republik Indonesia Nomor 35 Tahun 2009 tentang Narkotika.', 'SP. Han / 115 / XII / 2017 / Resnarkoba.', '2017-12-07', 'SPP - 195 / Q.3.20 / Euh.1 / 12 / 2017', '2017-12-13', 38, 1, 'KEJARI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:21', 'admin', NULL, NULL),
	(10, 'KASTALANI Als ROBOT Bin ANANG HERMANSYAH.', 31, 'LP / 273 / XII / 2017 / KALSEL / RES BJB, tanggal 21 Desember 2017.', 'Pasal 197 jo Pasal 106 ayat (1) sub Pasal 196 jo Pasal 98 ayat (2) dan ayat (3) Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan.', 'SP. Han / 116 / XII / 2017 / Resnarkoba.', '2017-12-23', NULL, NULL, 22, 1, 'KEJARI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:21', 'admin', NULL, NULL),
	(11, 'AMNAH Binti HADRI (Alm)', 48, 'LP / 20 / XII / 2017 / KALSEL / RES BJB / SEK ALUH-ALUH, tanggal 23 Desember 2017.', 'Pasal 197 jo Pasal 106 ayat (1) sub Pasal 196 jo Pasal 98 ayat (2) dan ayat (3) Undang-Undang Nomor 36 Tahun 2009 tentang Kesehatan.', 'SP. Han / 20 / XII / 2017 / Reskrim.', '2017-12-25', NULL, NULL, 20, 1, 'POLRI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:22', 'admin', NULL, NULL),
	(12, 'AHMAD YANI Als URI Bin ANANG RAHMAT (Alm)', 48, 'LP / 02  / I / 2018 / KALSEL / RES BJB, tanggal 02 Januari 2018.', 'Pasal 112 ayat (1) Undang-Undang Republik Indonesia Nomor 35 Tahun 2009 tentang Narkotika.', 'SP. Han / 01 / I / 2018 / Resnarkoba.', '2018-01-04', NULL, NULL, 10, 1, 'POLRI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:22', 'admin', NULL, NULL),
	(13, 'DINNO HADI SAPUTRA Als DINO Bin AKHYAR (Alm)', 24, 'LP / 03  / I / 2018 / KALSEL / RES BJB, tanggal 02 Januari 2018.', 'Pasal 112 ayat (1) jo Pasal 132 ayat (1) sub Pasal 127 ayat (1) huruf a Undang-Undang Republik Indonesia Nomor 35 Tahun 2009 tentang Narkotika jo Pasal 55 Ayat (1) ke-1 KUHP dan Pasal 84 ayat (2) KUHAP.', 'SP. Han / 02 / I / 2018 / Resnarkoba.', '2018-01-04', NULL, NULL, 10, 1, 'POLRI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:22', 'admin', NULL, NULL),
	(14, 'DIAN MAULANA Als DIAN Bin SARWIJI BASKORO', 21, 'LP / 03  / I / 2018 / KALSEL / RES BJB, tanggal 02 Januari 2018.', 'Pasal 112 ayat (1) jo Pasal 132 ayat (1) sub Pasal 127 ayat (1) huruf a Undang-Undang Republik Indonesia Nomor 35 Tahun 2009 tentang Narkotika jo Pasal 55 Ayat (1) ke-1 KUHP dan Pasal 84 ayat (2) KUHAP.', 'SP. Han / 03 / I / 2018 / Resnarkoba.', '2018-01-04', NULL, NULL, 10, 1, 'POLRI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:22', 'admin', NULL, NULL),
	(15, 'RUSDI PRATAMA PUTRA Als EMOT Bin SUNARDI', 23, 'LP / 03  / I / 2018 / KALSEL / RES BJB, tanggal 02 Januari 2018.', 'Pasal 112 ayat (1) jo Pasal 132 ayat (1) sub Pasal 127 ayat (1) huruf a Undang-Undang Republik Indonesia Nomor 35 Tahun 2009 tentang Narkotika jo Pasal 55 Ayat (1) ke-1 KUHP dan Pasal 84 ayat (2) KUHAP.', 'SP. Han / 04 / I / 2018 / Resnarkoba.', '2018-01-04', NULL, NULL, 10, 1, 'POLRI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:22', 'admin', NULL, NULL),
	(16, 'ZAINUDDIN ABDI Als ABDI Bin HORMANSYAH EFFENDI', 19, 'LP / 03  / I / 2018 / KALSEL / RES BJB, tanggal 02 Januari 2018.', 'Pasal 112 ayat (1) jo Pasal 132 ayat (1) sub Pasal 127 ayat (1) huruf a Undang-Undang Republik Indonesia Nomor 35 Tahun 2009 tentang Narkotika jo Pasal 55 Ayat (1) ke-1 KUHP dan Pasal 84 ayat (2) KUHAP.', 'SP. Han / 05 / I / 2018 / Resnarkoba.', '2018-01-04', NULL, NULL, 10, 1, 'POLRI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:22', 'admin', NULL, NULL),
	(17, 'KHASPIAN RAHMAN Als ASPI Bin ASPUR', 26, 'LP / 04  / I / 2018 / KALSEL / RES BJB, tanggal 04 Januari 2018.', 'Pasal 112 ayat (1) Undang-Undang Republik Indonesia Nomor 35 Tahun 2009 tentang Narkotika.', 'SP. Han / 06 / I / 2018 / Resnarkoba.', '2018-01-06', NULL, NULL, 8, 1, 'POLRI', 'img/no_photo.jpg', '1', '2018-02-07 09:58:22', 'admin', NULL, NULL),
	(18, 'NORSANTI YANA Als SANTI Binti YANI ', 30, 'LP/582/XI/2017,  Tgl 07-11-2017', '114 (1) 112 (1) UU 35 Th. 2009\n', 'Nomor : sp. Han/408/X/2017/Ditresnarkoba ', '2017-11-08', 'Nomor : B-4929/Q.3.4/E.1/11/2017', '2017-11-20', 66, 2, 'P.21', 'img/no_photo.jpg', '1', '2018-02-07 10:11:15', 'admin', NULL, NULL),
	(19, 'YUDI SULISTIONO Als YUDI Bin YUSUF SULKAN', 29, 'LP/590/XI/2017, Tgl 9-11-2017', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/421/XI/2017/Ditresnarkoba', '2017-11-11', 'Nomor : B-4928/Q.3.4/E.1/11/2017', '2017-11-22', 63, 2, 'PERPANJANGN PENGADILAN KE-1', 'img/no_photo.jpg', '1', '2018-02-07 10:11:15', 'admin', NULL, NULL),
	(20, 'ANWAR Als AWAR Bin H. JUMAAH', 40, 'LP/599/XI/2017, Tgl 17-11-2017', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/428/XI/2017/Ditresnarkoba', '2017-11-19', 'Nomor : B-5039/Q.3.4/E.1/12/2017', NULL, 55, 2, 'perpanjangan kejaksaan ', 'img/no_photo.jpg', '1', '2018-02-07 10:11:15', 'admin', NULL, NULL),
	(21, 'SITI RAHMAH Als RAHMAH Binti MAHYAR', 26, 'LP/601/XI/2017, Tgl 20-11-2017', 'PASAL 132 (1) 114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/430/XI/2017/Ditresnarkoba', '2017-11-22', 'Nomor : B-5041/Q.3.4/E.1/12/2017', NULL, 52, 2, 'perpanjangan kejaksaan ', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(22, 'ISNAWATI Als ENI Binti MASUKI(Alm)', 30, 'LP/601/XI/2017, Tgl 20-11-2017', 'PASAL 132 (1) 114(1) 112(1) UU 35 Th. 2010', 'Nomor : sp. Han/431/XI/2017/Ditresnarkoba', '2017-11-23', 'Nomor : B-5042/Q.3.4/E.1/12/2017', NULL, 53, 2, 'perpanjangan kejaksaan ', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(23, 'RYAN WAHYUDI Als RYAN Bin MAHYUNI', 29, 'LP/604/XI/2017, Tgl 21-11-2017', '114(2) 112(2) UU 35 Th. 2009', 'Nomor : sp. Han/432/XI/2017/Ditresnarkoba', '2017-11-23', 'Nomor : B-5040/Q.3.4/E.1/12/2017', NULL, 51, 2, 'perpanjangan kejaksaan ', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(24, 'MUHAMMAD FAJRI Als AJI BinASRI', 23, 'LP/621/XII/2017, Tgl 01-12-2017', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/443/XII/2017/Ditresnarkoba', '2017-12-03', 'Nomor : B-5137/Q.3.4/E.1/12/2017', NULL, 41, 2, 'perpanjangan kejaksaan ', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(25, 'AKHMAD ZAINI Als ZAIN Bin M. HERMANSYAH', 46, 'LP/626/XII/2017, Tgl 04-12-2017', '114(2) 112(2) UU 35 Th. 2009', 'Nomor : sp. Han/447/XII/2017/Ditresnarkoba', '2017-12-06', 'Nomor : B-5134/Q.3.4/E.1/12/2017', NULL, 38, 2, 'perpanjangan kejaksaan ', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(26, 'WAHYUDI Als KUDIL  Bin MULYADI (Alm)', 21, 'LP/635/XII/2017, Tgl 08-12-2017', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/458/XII/2017/Ditresnarkoba', '2017-12-10', 'Nomor : B-5177/Q.3.4/E.1/12/2017', NULL, 37, 2, 'perpanjangan kejaksaan ', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(27, 'RAMLAN Als ACAN Bin SURIANSYAH', 28, 'LP/635/XII/2017, Tgl 08-12-2018', '114(1) 112(1) UU 35 Th. 2010', 'Nomor : sp. Han/459/XII/2017/Ditresnarkoba', '2017-12-11', NULL, NULL, 38, 2, 'perpanjangan kejaksaan ', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(28, 'HAERONI HERU Als RURU Bin MASTALAM', 41, 'LP/647/XII/2017, Tgl 15-12-2017', '114(2) 112(2) UU 35 Th. 2009', 'Nomor : sp. Han/467/XII/2017/Ditresnarkoba', '2017-12-17', NULL, NULL, 27, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(29, 'MASRANI Als NANI Bin SUNARI', 31, 'LP/650/XII/2017, Tgl 18-12-2017', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/470/XII/2017/Ditresnarkoba', '2017-12-20', NULL, NULL, 24, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(30, 'IRWANSYAH Als IWAN Bin NOOR FADLI', 34, 'LP/657/XII/2017, Tgl 22-12-2017', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/477/XII/2017/Ditresnarkoba', '2017-12-24', NULL, NULL, 20, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(31, 'MUHAMMAD FEBRIANNOOR Als FEFEB Bin KAHARUDIN ', 24, 'LP/ 664/XII/20117,Tgl 30-12-2017', '132 (1) 114 (2) 112 (2) UU 35 Th. 2009', 'Nomor : sp. Han/481/XII/2017/Ditresnarkoba', '2017-12-31', NULL, NULL, 12, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(32, 'MANSYUR Bin MURSIDI (Alm)', 50, 'LP/ 664/XII/20117,Tgl 30-12-2018', '133 (1) 114 (2) 112 (2) UU 35 Th. 2009', 'Nomor : sp. Han/482/XII/2017/Ditresnarkoba', '2018-01-01', NULL, NULL, 13, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:16', 'admin', NULL, NULL),
	(33, 'NOORHIDAYAH Als DAYAH Binti M. SAPRIANSYAH', 29, 'LP/ 664/XII/20117,Tgl 30-12-2019', '134 (1) 114 (2) 112 (2) UU 35 Th. 2009', 'Nomor : sp. Han/483/XII/2017/Ditresnarkoba', '2018-01-02', NULL, NULL, 14, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:17', 'admin', NULL, NULL),
	(34, 'ARDIANSYAH Als KAI DAWANG Bin BADRUN (Alm)', 56, 'LP/03/I/2018, Tgl 02-01-2018', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/1/I/2018/Ditresnarkoba', '2018-01-04', NULL, NULL, 9, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:17', 'admin', NULL, NULL),
	(35, 'JAINAL ABIDIN Als JAINAL Bin AHMADI', 20, 'LP/04/I/2018, Tgl 02-01-2018', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/2/I/2018/Ditresnarkoba', '2018-01-04', NULL, NULL, 9, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:17', 'admin', NULL, NULL),
	(36, 'HAMDANIASNYAH Als IHAM Bin SURIANSYAH', 34, 'LP/14/I/2018, Tgl 06-01-2018', '132 (1) 114(2) 112(2) UU 35 Th. 2009', 'Nomor : sp. Han/11/I/2018/Ditresnarkoba', '2018-01-08', NULL, NULL, 5, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:17', 'admin', NULL, NULL),
	(37, 'NOVA AGUNG Als NOVA Bin SUPRIYADI (Alm)', 32, 'LP/14/I/2018, Tgl 06-01-2018', '132 (1) 114(2) 112(2) UU 35 Th. 2009', 'Nomor : sp. Han/12/I/2018/Ditresnarkoba', '2018-01-09', NULL, NULL, 6, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:17', 'admin', NULL, NULL),
	(38, 'ASMUNI SUGIAN KUSUMA JAYA Als AAS Bin MUHAMMAD ZAINI (Alm)', 40, 'LP/25/I/2018, Tgl 08-01-2018', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/18/I/2018/Ditresnarkoba', '2018-01-10', NULL, NULL, 3, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:17', 'admin', NULL, NULL),
	(39, 'MUHAMMAD AZIS Als AZIS Bin MAHYUNI', 22, 'LP/28/I/2018, Tgl 08-01-2018', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/20/I/2018/Ditresnarkoba', '2018-01-10', NULL, NULL, 3, 2, 'Penahanan Polri', 'img/no_photo.jpg', '1', '2018-02-07 10:11:17', 'admin', NULL, NULL),
	(40, 'FERDIANSYAH Als FERDI Bin ALIANSYAH (Alm', 30, 'LP/34/I/2018, Tgl 10- 1-2018', '114(1) 112(1) UU 35 Th. 2009', 'Nomor : sp. Han/25/I/2018/Ditresnarkoba', '2018-01-12', NULL, NULL, 1, 2, 'Penahanan Polri', 'foto/FERDIANSYAH Als FERDI Bin ALIANSYAH (Alm.jpg', '1', '2018-02-07 10:11:17', 'admin', NULL, NULL);
/*!40000 ALTER TABLE `antrian` ENABLE KEYS */;

-- Dumping structure for table antrian.level
CREATE TABLE IF NOT EXISTS `level` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) NOT NULL,
  `create_by` varchar(114) NOT NULL,
  `date_create` datetime NOT NULL,
  `update_by` varchar(114) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table antrian.level: ~1 rows (approximately)
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` (`id`, `level`, `create_by`, `date_create`, `update_by`, `date_update`) VALUES
	(1, 'admin', 'ADMINISTRATOR', '2018-01-16 06:30:41', NULL, NULL);
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Dumping structure for table antrian.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `col_name` varchar(50) NOT NULL,
  `col_val` text,
  PRIMARY KEY (`col_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table antrian.setting: ~6 rows (approximately)
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`col_name`, `col_val`) VALUES
	('JALAN', '-'),
	('LOGO', 'assets/img/logo.png'),
	('NAMA APLIKASI', 'KEPOLISIAN DAERAH KOTA BANJARBARU'),
	('WAKTU ANTRIAN', '120000'),
	('WAKTU BARIS', '20000'),
	('WAKTU SLIDE', '120000');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;

-- Dumping structure for table antrian.slide
CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `foto` varchar(75) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `date_create` datetime NOT NULL,
  `create_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table antrian.slide: ~5 rows (approximately)
/*!40000 ALTER TABLE `slide` DISABLE KEYS */;
INSERT INTO `slide` (`id`, `foto`, `status`, `date_create`, `create_by`) VALUES
	(6, 'slide/1516166342AZF414.png', '1', '2018-01-17 13:19:02', 'admin'),
	(7, 'slide/1516166345JA65.png', '1', '2018-01-17 13:19:05', 'admin'),
	(8, 'slide/1516166347JB420.png', '1', '2018-01-17 13:19:07', 'admin'),
	(9, 'slide/1516166353SQ420.png', '1', '2018-01-17 13:19:13', 'admin'),
	(10, 'slide/1516255796RW415.png', '1', '2018-01-18 14:09:56', 'admin');
/*!40000 ALTER TABLE `slide` ENABLE KEYS */;

-- Dumping structure for table antrian.teks_baris
CREATE TABLE IF NOT EXISTS `teks_baris` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `teks` text NOT NULL,
  `date_create` datetime NOT NULL,
  `create_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table antrian.teks_baris: ~3 rows (approximately)
/*!40000 ALTER TABLE `teks_baris` DISABLE KEYS */;
INSERT INTO `teks_baris` (`id`, `teks`, `date_create`, `create_by`) VALUES
	(5, 'hbknkiuebw we we we wg wgewrjn e nqem qejfn qieufn qekjfn qefn qiefn qejkfn qenfin qkjefn qkejfn qnf l', '2018-01-18 06:43:16', 'admin'),
	(6, 'asjnflkaslan lasn lsn lskncl nsl iwnf w nwlf kns uworu nlwknwl nlwnf lkasnfl ansl naslknalsnlasndlfknasldfnsaldkn lksnl nasl', '2018-01-18 06:43:26', 'admin'),
	(7, 'asjnasdmkasmd lksmlasmlsamd lskdmlskdmfl askdmasldmflsa alsk lskm lskm lsm', '2018-01-18 06:43:34', 'admin');
/*!40000 ALTER TABLE `teks_baris` ENABLE KEYS */;

-- Dumping structure for table antrian.tempat_tahanan
CREATE TABLE IF NOT EXISTS `tempat_tahanan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tempat_tahanan` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table antrian.tempat_tahanan: ~2 rows (approximately)
/*!40000 ALTER TABLE `tempat_tahanan` DISABLE KEYS */;
INSERT INTO `tempat_tahanan` (`id`, `tempat_tahanan`) VALUES
	(1, 'Rutan Polres Banjarbaru'),
	(2, 'RUTAN DIT TAHTI');
/*!40000 ALTER TABLE `tempat_tahanan` ENABLE KEYS */;

-- Dumping structure for table antrian.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(114) NOT NULL,
  `id_level` int(3) NOT NULL,
  `create_by` varchar(114) NOT NULL,
  `date_create` datetime NOT NULL,
  `update_by` varchar(114) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table antrian.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `nama`, `id_level`, `create_by`, `date_create`, `update_by`, `date_update`, `last_login`, `ip_address`, `status`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRATOR', 1, 'ADMINISTRATOR', '2018-01-16 06:31:55', NULL, NULL, '2018-02-07 15:03:22', '127.0.0.1', '2');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
