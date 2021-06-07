-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_pcsb
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` bigint(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` int(20) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki laki','perempuan') NOT NULL DEFAULT 'laki laki',
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `nip_UNIQUE` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (1,123456789,'Admin','pamulang',2147483647,'pamulang','1998-01-16','laki laki','admin@gmail.com','admin','$2y$10$rikheEclzpBgDd7kcgPDMO22iZwVJ6LT8vP0B5pjU0QdA.hnpk9qe');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_pembayaran` enum('lunas','belum lunas') NOT NULL DEFAULT 'belum lunas',
  `status_tes` enum('lulus','tidak lulus') DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  `no_form` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki laki','perempuan') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(155) NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `anak_kandung` int(2) DEFAULT NULL,
  `anak_tiri` int(2) DEFAULT NULL,
  `status_keluarga` enum('anak kandung','anak tiri','lainnya') NOT NULL,
  `register_date` date NOT NULL,
  `alamat_lengkap` varchar(155) NOT NULL,
  `alamat_rt` int(3) NOT NULL,
  `alamat_rw` int(3) NOT NULL,
  `alamat_no` int(3) NOT NULL,
  `alamat_desa` varchar(65) NOT NULL,
  `alamat_kecamatan` varchar(65) NOT NULL,
  `alamat_kabupaten` varchar(65) NOT NULL,
  `alamat_kodepos` varchar(65) NOT NULL,
  `alamat_hp` varchar(65) NOT NULL,
  `pendidikan_asal` varchar(155) NOT NULL,
  `pendidikan_no_ijazah` varchar(155) NOT NULL,
  `pendidikan_tahun_ijazah` varchar(45) NOT NULL,
  `pendidikan_nisn` bigint(45) NOT NULL,
  `pendidikan_npun` bigint(45) NOT NULL,
  `orangtua_ayah` varchar(155) NOT NULL,
  `orangtua_ibu` varchar(155) NOT NULL,
  `orangtua_pendidikan_ayah` varchar(155) NOT NULL,
  `orangtua_pendidikan_ibu` varchar(155) NOT NULL,
  `orangtua_pekerjaan_ayah` varchar(155) NOT NULL,
  `orangtua_pekerjaan_ibu` varchar(155) NOT NULL,
  `orangtua_alamat_lengkap` varchar(155) NOT NULL,
  `orangtua_alamat_rt` int(3) NOT NULL,
  `orangtua_alamat_rw` int(3) NOT NULL,
  `orangtua_alamat_no` int(3) NOT NULL,
  `orangtua_alamat_desa` varchar(65) NOT NULL,
  `orangtua_alamat_kecamatan` varchar(65) NOT NULL,
  `orangtua_alamat_kabupaten` varchar(65) NOT NULL,
  `orangtua_alamat_kodepos` varchar(65) NOT NULL,
  `orangtua_alamat_hp` varchar(65) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_form_UNIQUE` (`no_form`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendaftaran`
--

LOCK TABLES `pendaftaran` WRITE;
/*!40000 ALTER TABLE `pendaftaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `pendaftaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` enum('admin','user') NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nisn` bigint(50) DEFAULT NULL,
  `no_telepon` int(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `nisn_UNIQUE` (`nisn`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user','Ghost','ghost_blablabla@gmail.com',9223372036854775807,2147483647,'$2y$10$qgqr6uGliODJNDOGvk3b9.1CauggnWjAtTUvN23UQAjKu6iK9ixm.');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-04  0:05:33
