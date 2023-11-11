-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: db_dongho
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_baiviet`
--

DROP TABLE IF EXISTS `tbl_baiviet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_baiviet` (
  `IdBaiViet` int NOT NULL AUTO_INCREMENT,
  `TenBaiViet` text,
  `NoiDung` text,
  PRIMARY KEY (`IdBaiViet`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_baiviet`
--

LOCK TABLES `tbl_baiviet` WRITE;
/*!40000 ALTER TABLE `tbl_baiviet` DISABLE KEYS */;
INSERT INTO `tbl_baiviet` VALUES (2,'Trang Chủ Bottom','<p><img alt=\"\" src=\"https://wscdn.vn/upload/original-image/mau-dong-ho-rolex-nu-dep-nhat.jpg?size=721x400&amp;fomat=webp\" style=\"height:55px; width:100px\" />sfsagsgdsfg</p>\n');
/*!40000 ALTER TABLE `tbl_baiviet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_chitietdondat`
--

DROP TABLE IF EXISTS `tbl_chitietdondat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_chitietdondat` (
  `IdChiTietDonDat` bigint unsigned NOT NULL AUTO_INCREMENT,
  `SoLuong` int DEFAULT NULL,
  `IdDonDat` bigint DEFAULT NULL,
  PRIMARY KEY (`IdChiTietDonDat`),
  KEY `fk_tbl_ChiTietDonDat_tbl_DonDat1_idx` (`IdDonDat`),
  CONSTRAINT `fk_tbl_ChiTietDonDat_tbl_DonDat1` FOREIGN KEY (`IdDonDat`) REFERENCES `tbl_dondat` (`IdDonDat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_chitietdondat`
--

LOCK TABLES `tbl_chitietdondat` WRITE;
/*!40000 ALTER TABLE `tbl_chitietdondat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_chitietdondat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_chitietdongho`
--

DROP TABLE IF EXISTS `tbl_chitietdongho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_chitietdongho` (
  `IdChiTietDongHo` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Imei` varchar(45) DEFAULT NULL,
  `BaoHanh` int DEFAULT NULL,
  `NgayBaoHanhTu` date DEFAULT NULL,
  `NgayBaoHanhDen` date DEFAULT NULL,
  `IdDongHo` bigint DEFAULT NULL,
  `IdChiTietDonDat` bigint unsigned DEFAULT NULL,
  `IdChiTietPhieuNhap` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`IdChiTietDongHo`),
  KEY `fk_tbl_ChiTietDongHo_tbl_DongHo1_idx` (`IdDongHo`),
  KEY `fk_tbl_chitietdongho_tbl_chitietdondat1_idx` (`IdChiTietDonDat`),
  KEY `fk_tbl_chitietdongho_tbl_chitietphieunhap1_idx` (`IdChiTietPhieuNhap`),
  CONSTRAINT `fk_tbl_chitietdongho_tbl_chitietdondat1` FOREIGN KEY (`IdChiTietDonDat`) REFERENCES `tbl_chitietdondat` (`IdChiTietDonDat`),
  CONSTRAINT `fk_tbl_chitietdongho_tbl_chitietphieunhap1` FOREIGN KEY (`IdChiTietPhieuNhap`) REFERENCES `tbl_chitietphieunhap` (`IdChiTietPhieuNhap`),
  CONSTRAINT `fk_tbl_ChiTietDongHo_tbl_DongHo1` FOREIGN KEY (`IdDongHo`) REFERENCES `tbl_dongho` (`IdDongHo`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_chitietdongho`
--

LOCK TABLES `tbl_chitietdongho` WRITE;
/*!40000 ALTER TABLE `tbl_chitietdongho` DISABLE KEYS */;
INSERT INTO `tbl_chitietdongho` VALUES (37,'AE-1200WHD-1AVDF-0',24,NULL,NULL,9,NULL,7),(38,'AE-1200WHD-1AVDF-1',24,NULL,NULL,9,NULL,7),(39,'MTP-1374L-1AVDF-0',24,NULL,NULL,10,NULL,7),(40,'MTP-1374L-1AVDF-1',24,NULL,NULL,10,NULL,7),(41,'EFV-600L-2AVUDF-0',24,NULL,NULL,11,NULL,7),(42,'EFV-600L-2AVUDF-1',24,NULL,NULL,11,NULL,7),(43,'EFV-600L-2AVUDF-2',24,NULL,NULL,11,NULL,7),(44,'LW-204-4ADF-0',24,NULL,NULL,12,NULL,7),(45,'LW-204-4ADF-1',24,NULL,NULL,12,NULL,7),(46,'RA-AA0B02R19B-0',24,NULL,NULL,13,NULL,7),(47,'RA-AA0B02R19B-1',24,NULL,NULL,13,NULL,7),(48,'RA-AA0B02R19B-2',24,NULL,NULL,13,NULL,7);
/*!40000 ALTER TABLE `tbl_chitietdongho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_chitietphieunhap`
--

DROP TABLE IF EXISTS `tbl_chitietphieunhap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_chitietphieunhap` (
  `IdChiTietPhieuNhap` bigint unsigned NOT NULL AUTO_INCREMENT,
  `SoluongNhap` int DEFAULT NULL,
  `SoLuongBan` int DEFAULT NULL,
  `MaPhieuNhap` varchar(250) DEFAULT NULL,
  `IdPhieu` bigint DEFAULT NULL,
  PRIMARY KEY (`IdChiTietPhieuNhap`),
  KEY `fk_tbl_ChiTietPhieuNhap_tbl_PhieuNhap1_idx` (`IdPhieu`),
  CONSTRAINT `fk_tbl_ChiTietPhieuNhap_tbl_PhieuNhap1` FOREIGN KEY (`IdPhieu`) REFERENCES `tbl_phieunhap` (`IdPhieu`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_chitietphieunhap`
--

LOCK TABLES `tbl_chitietphieunhap` WRITE;
/*!40000 ALTER TABLE `tbl_chitietphieunhap` DISABLE KEYS */;
INSERT INTO `tbl_chitietphieunhap` VALUES (7,12,0,'PN01',6);
/*!40000 ALTER TABLE `tbl_chitietphieunhap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_danhmuchethong`
--

DROP TABLE IF EXISTS `tbl_danhmuchethong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_danhmuchethong` (
  `Id` bigint NOT NULL AUTO_INCREMENT,
  `SoThuTu` bigint DEFAULT NULL,
  `TenGoi` text,
  `GhiChu` text,
  `PhanLoai` text,
  `UrlAnh` text,
  `FileName` text,
  `IsDisLay` tinyint DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_danhmuchethong`
--

LOCK TABLES `tbl_danhmuchethong` WRITE;
/*!40000 ALTER TABLE `tbl_danhmuchethong` DISABLE KEYS */;
INSERT INTO `tbl_danhmuchethong` VALUES (16,1,'Casio',NULL,'Danh mục thương hiệu','../../../../UpLoad/Admin/DanhMuc/DanhMuc1699616995_CS-1362181789-1668935694.jpeg','1699616995_CS-1362181789-1668935694.jpeg',NULL),(17,2,'Citizen',NULL,'Danh mục thương hiệu','../../../../UpLoad/Admin/DanhMuc/DanhMuc1699617013_logo-citizen.jpeg','1699617013_logo-citizen.jpeg',NULL),(18,3,'Olym-Pianus',NULL,'Danh mục thương hiệu','../../../../UpLoad/Admin/DanhMuc/DanhMuc1699617027_logo-Olym-Pianus.jpeg','1699617027_logo-Olym-Pianus.jpeg',NULL),(19,4,'Orient',NULL,'Danh mục thương hiệu','../../../../UpLoad/Admin/DanhMuc/DanhMuc1699617040_logo-orient.jpeg','1699617040_logo-orient.jpeg',NULL),(20,5,'Seiko',NULL,'Danh mục thương hiệu','../../../../UpLoad/Admin/DanhMuc/DanhMuc1699617066_logo-seiko.jpeg','1699617066_logo-seiko.jpeg',NULL),(21,6,'Thomas-Earnshaw',NULL,'Danh mục thương hiệu','../../../../UpLoad/Admin/DanhMuc/DanhMuc1699617117_logo-Thomas-Earnshaw.jpeg','1699617117_logo-Thomas-Earnshaw.jpeg',NULL),(22,7,'Tissot',NULL,'Danh mục thương hiệu','../../../../UpLoad/Admin/DanhMuc/DanhMuc1699617136_logo-Tissot.jpeg','1699617136_logo-Tissot.jpeg',NULL),(23,1,'Dây da',NULL,'Danh mục loại dây',NULL,NULL,NULL),(24,2,'Dây kim loại',NULL,'Danh mục loại dây',NULL,NULL,NULL),(25,3,'Dây cao su',NULL,'Danh mục loại dây',NULL,NULL,NULL),(26,4,'Dây dù/vải',NULL,'Danh mục loại dây',NULL,NULL,NULL),(27,5,'Dây Nhựa ',NULL,'Danh mục loại dây',NULL,NULL,NULL),(28,6,'Nhựa phối kim loại',NULL,'Danh mục loại dây',NULL,NULL,NULL),(29,7,'Thép không gỉ mạ vàng PVD',NULL,'Danh mục loại dây',NULL,NULL,NULL),(30,8,'Dây Titanium',NULL,'Danh mục loại dây',NULL,NULL,NULL),(31,1,'Quân đội',NULL,'Danh mục kiểu dáng',NULL,NULL,NULL),(32,2,'Thể Thao',NULL,'Danh mục kiểu dáng',NULL,NULL,NULL),(33,3,'Sang trọng',NULL,'Danh mục kiểu dáng',NULL,NULL,NULL),(34,4,'Dân văn phòng',NULL,'Danh mục kiểu dáng',NULL,NULL,NULL),(35,5,'Cổ điển vinatax',NULL,'Danh mục kiểu dáng',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_danhmuchethong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_dondat`
--

DROP TABLE IF EXISTS `tbl_dondat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_dondat` (
  `IdDonDat` bigint NOT NULL AUTO_INCREMENT,
  `LanDat` int DEFAULT NULL,
  `ThoiGian` date DEFAULT NULL,
  `TongTien` decimal(10,0) DEFAULT NULL,
  `IdUsers` bigint DEFAULT NULL,
  PRIMARY KEY (`IdDonDat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dondat`
--

LOCK TABLES `tbl_dondat` WRITE;
/*!40000 ALTER TABLE `tbl_dondat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_dondat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_dongho`
--

DROP TABLE IF EXISTS `tbl_dongho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_dongho` (
  `IdDongHo` bigint NOT NULL AUTO_INCREMENT,
  `TenDongHo` text,
  `MaDongHo` varchar(150) DEFAULT NULL,
  `ThuongHieu` text,
  `NamNu` text,
  `SoLuong` int DEFAULT NULL,
  `KieuDang` text,
  `GiaMua` decimal(10,0) DEFAULT NULL,
  `GiaBan` decimal(10,0) DEFAULT NULL,
  `LoaiDay` text,
  `GiamGia` decimal(10,0) DEFAULT NULL,
  `TieuDe` text,
  `Url_anh` text,
  `FileName` text,
  `ChongNuoc` tinyint DEFAULT NULL,
  `TrangThaiBan` tinyint DEFAULT NULL,
  PRIMARY KEY (`IdDongHo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dongho`
--

LOCK TABLES `tbl_dongho` WRITE;
/*!40000 ALTER TABLE `tbl_dongho` DISABLE KEYS */;
INSERT INTO `tbl_dongho` VALUES (9,'Đồng Hồ Casio','AE-1200WHD-1AVDF','Casio','Nam',2,'Thể Thao',900000,1090000,'Dây kim loại',24,NULL,'../../../../UpLoad/DongHo/1699618077_1-KHUNG-SP-6676612-1785849039.webp','1699618077_1-KHUNG-SP-6676612-1785849039.webp',1,NULL),(10,'Đồng Hồ Casio','MTP-1374L-1AVDF','Casio','Nam',2,'Sang trọng',1370000,1670000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699618618_1-KHUNG-SP-1-1818542633-1853976209.webp','1699618618_1-KHUNG-SP-1-1818542633-1853976209.webp',1,NULL),(11,'Đồng Hồ Casio','EFV-600L-2AVUDF','Casio','Nam',3,'Sang trọng',2320000,2820000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699618802_1-KHUNG-SP-1129271049-505289889.webp','1699618802_1-KHUNG-SP-1129271049-505289889.webp',1,NULL),(12,'Đồng Hồ Casio','LW-204-4ADF','Casio','Nữ',2,'Sang trọng',720000,850000,'Dây kim loại',21,NULL,'../../../../UpLoad/DongHo/1699619002_LW-204-4ADF.webp','1699619002_LW-204-4ADF.webp',1,NULL),(13,'Đồng Hồ Orient','RA-AA0B02R19B','Orient','Nam',3,'Sang trọng',4000000,5850000,'Dây kim loại',25,NULL,'../../../../UpLoad/DongHo/1699619182_RA-AA0B02R19B-2081811590-287106387.webp','1699619182_RA-AA0B02R19B-2081811590-287106387.webp',1,NULL);
/*!40000 ALTER TABLE `tbl_dongho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_giohang`
--

DROP TABLE IF EXISTS `tbl_giohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_giohang` (
  `Id` bigint NOT NULL AUTO_INCREMENT,
  `SoLuong` int DEFAULT NULL,
  `TrangThai` tinyint DEFAULT NULL,
  `IdUsers` bigint DEFAULT NULL,
  `IdDongHo` bigint DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_giohang`
--

LOCK TABLES `tbl_giohang` WRITE;
/*!40000 ALTER TABLE `tbl_giohang` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_giohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_notifi`
--

DROP TABLE IF EXISTS `tbl_notifi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_notifi` (
  `Id` bigint NOT NULL AUTO_INCREMENT,
  `txtTieuDe` text,
  `crate_date` date DEFAULT NULL,
  `NoiDung` text,
  `IdNguoiNhan` bigint DEFAULT NULL,
  `IdNguoiGui` bigint DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_notifi`
--

LOCK TABLES `tbl_notifi` WRITE;
/*!40000 ALTER TABLE `tbl_notifi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_notifi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_phieunhap`
--

DROP TABLE IF EXISTS `tbl_phieunhap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_phieunhap` (
  `IdPhieu` bigint NOT NULL AUTO_INCREMENT,
  `SoHieuPhieu` text,
  `TongTien` decimal(10,0) DEFAULT NULL,
  `NgayTao` date DEFAULT NULL,
  `TrangThai` tinyint DEFAULT '1',
  `IdUsers` bigint DEFAULT NULL,
  PRIMARY KEY (`IdPhieu`),
  KEY `fk_tbl_DongHo_tbl_user1_idx` (`IdUsers`),
  CONSTRAINT `fk_tbl_DongHo_tbl_user1` FOREIGN KEY (`IdUsers`) REFERENCES `tbl_user` (`IdUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_phieunhap`
--

LOCK TABLES `tbl_phieunhap` WRITE;
/*!40000 ALTER TABLE `tbl_phieunhap` DISABLE KEYS */;
INSERT INTO `tbl_phieunhap` VALUES (6,'PN01',NULL,'2023-11-10',1,1);
/*!40000 ALTER TABLE `tbl_phieunhap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_role` (
  `IdRole` bigint NOT NULL AUTO_INCREMENT,
  `NameRole` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_role`
--

LOCK TABLES `tbl_role` WRITE;
/*!40000 ALTER TABLE `tbl_role` DISABLE KEYS */;
INSERT INTO `tbl_role` VALUES (1,'Admin'),(2,'Manager'),(3,'User'),(4,'Client');
/*!40000 ALTER TABLE `tbl_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_slider` (
  `IdSlider` int NOT NULL AUTO_INCREMENT,
  `NameSlider` text,
  `UrlSlider` text,
  `NameFile` text,
  `CreateDate` text,
  `IsDisLay` bit(1) DEFAULT NULL,
  PRIMARY KEY (`IdSlider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_slider`
--

LOCK TABLES `tbl_slider` WRITE;
/*!40000 ALTER TABLE `tbl_slider` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_storeupload`
--

DROP TABLE IF EXISTS `tbl_storeupload`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_storeupload` (
  `Id` bigint NOT NULL AUTO_INCREMENT,
  `UrlFile` text,
  `NameFile` text,
  `IsDisLay` text,
  `IdDongHo` bigint DEFAULT NULL,
  `IdClient` bigint DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_storeupload`
--

LOCK TABLES `tbl_storeupload` WRITE;
/*!40000 ALTER TABLE `tbl_storeupload` DISABLE KEYS */;
INSERT INTO `tbl_storeupload` VALUES (7,'../../../../UpLoad/DongHo/DongHoStore/1699618461_1-KHUNG-SP-6676612-1785849039.webp','1699618461_1-KHUNG-SP-6676612-1785849039.webp',NULL,9,NULL),(8,'../../../../UpLoad/DongHo/DongHoStore/1699618470_AE-1200WHD-1AVDF-1.webp','1699618470_AE-1200WHD-1AVDF-1.webp',NULL,9,NULL),(9,'../../../../UpLoad/DongHo/DongHoStore/1699618470_AE-1200WHD-1AVDF-2.webp','1699618470_AE-1200WHD-1AVDF-2.webp',NULL,9,NULL),(10,'../../../../UpLoad/DongHo/DongHoStore/1699618470_AE-1200WHD-1AVDF-3.webp','1699618470_AE-1200WHD-1AVDF-3.webp',NULL,9,NULL),(11,'../../../../UpLoad/DongHo/DongHoStore/1699618470_AE-1200WHD-1AVDF-4.webp','1699618470_AE-1200WHD-1AVDF-4.webp',NULL,9,NULL),(12,'../../../../UpLoad/DongHo/DongHoStore/1699618470_AE-1200WHD-1AVDF-5.webp','1699618470_AE-1200WHD-1AVDF-5.webp',NULL,9,NULL),(13,'../../../../UpLoad/DongHo/DongHoStore/1699618470_AE-1200WHD-1AVDF-6.webp','1699618470_AE-1200WHD-1AVDF-6.webp',NULL,9,NULL),(14,'../../../../UpLoad/DongHo/DongHoStore/1699618470_AE-1200WHD-1AVDF-7.webp','1699618470_AE-1200WHD-1AVDF-7.webp',NULL,9,NULL),(15,'../../../../UpLoad/DongHo/DongHoStore/1699618665_1-KHUNG-SP-1-1818542633-1853976209.webp','1699618665_1-KHUNG-SP-1-1818542633-1853976209.webp',NULL,10,NULL),(16,'../../../../UpLoad/DongHo/DongHoStore/1699618665_CASIO-MTP-1374L-1AVDF-2.webp','1699618665_CASIO-MTP-1374L-1AVDF-2.webp',NULL,10,NULL),(17,'../../../../UpLoad/DongHo/DongHoStore/1699618665_CASIO-MTP-1374L-1AVDF-3.webp','1699618665_CASIO-MTP-1374L-1AVDF-3.webp',NULL,10,NULL),(18,'../../../../UpLoad/DongHo/DongHoStore/1699618665_CASIO-MTP-1374L-1AVDF-4.webp','1699618665_CASIO-MTP-1374L-1AVDF-4.webp',NULL,10,NULL),(19,'../../../../UpLoad/DongHo/DongHoStore/1699618665_CASIO-MTP-1374L-1AVDF-5.webp','1699618665_CASIO-MTP-1374L-1AVDF-5.webp',NULL,10,NULL),(20,'../../../../UpLoad/DongHo/DongHoStore/1699618818_1-KHUNG-SP-1129271049-505289889.webp','1699618818_1-KHUNG-SP-1129271049-505289889.webp',NULL,11,NULL),(21,'../../../../UpLoad/DongHo/DongHoStore/1699618819_EFV-600L-2A-4-1624509175802.webp','1699618819_EFV-600L-2A-4-1624509175802.webp',NULL,11,NULL),(22,'../../../../UpLoad/DongHo/DongHoStore/1699618819_EFV-600L-2AVUDF-1.webp','1699618819_EFV-600L-2AVUDF-1.webp',NULL,11,NULL),(23,'../../../../UpLoad/DongHo/DongHoStore/1699618819_EFV-600L-2AVUDF-2.webp','1699618819_EFV-600L-2AVUDF-2.webp',NULL,11,NULL),(24,'../../../../UpLoad/DongHo/DongHoStore/1699618819_EFV-600L-2AVUDF-3.webp','1699618819_EFV-600L-2AVUDF-3.webp',NULL,11,NULL),(25,'../../../../UpLoad/DongHo/DongHoStore/1699618819_EFV-600L-2AVUDF-4.webp','1699618819_EFV-600L-2AVUDF-4.webp',NULL,11,NULL),(26,'../../../../UpLoad/DongHo/DongHoStore/1699619021_LW-204-4A-3-1642134814130.webp','1699619021_LW-204-4A-3-1642134814130.webp',NULL,12,NULL),(27,'../../../../UpLoad/DongHo/DongHoStore/1699619021_LW-204-4A-5-1642134819765.webp','1699619021_LW-204-4A-5-1642134819765.webp',NULL,12,NULL),(28,'../../../../UpLoad/DongHo/DongHoStore/1699619021_LW-204-4A-6-1642134824443.webp','1699619021_LW-204-4A-6-1642134824443.webp',NULL,12,NULL),(29,'../../../../UpLoad/DongHo/DongHoStore/1699619021_LW-204-4A-7-1642134827297.webp','1699619021_LW-204-4A-7-1642134827297.webp',NULL,12,NULL),(30,'../../../../UpLoad/DongHo/DongHoStore/1699619021_LW-204-4A-8-1642134829619.webp','1699619021_LW-204-4A-8-1642134829619.webp',NULL,12,NULL),(31,'../../../../UpLoad/DongHo/DongHoStore/1699619021_LW-204-4ADF.webp','1699619021_LW-204-4ADF.webp',NULL,12,NULL),(32,'../../../../UpLoad/DongHo/DongHoStore/1699619292_RA-AA0B02R19B-2.webp','1699619292_RA-AA0B02R19B-2.webp',NULL,13,NULL),(33,'../../../../UpLoad/DongHo/DongHoStore/1699619292_RA-AA0B02R19B-3.webp','1699619292_RA-AA0B02R19B-3.webp',NULL,13,NULL),(34,'../../../../UpLoad/DongHo/DongHoStore/1699619292_RA-AA0B02R19B-4.webp','1699619292_RA-AA0B02R19B-4.webp',NULL,13,NULL),(35,'../../../../UpLoad/DongHo/DongHoStore/1699619292_RA-AA0B02R19B-5.webp','1699619292_RA-AA0B02R19B-5.webp',NULL,13,NULL),(36,'../../../../UpLoad/DongHo/DongHoStore/1699619292_RA-AA0B02R19B-2081811590-287106387.webp','1699619292_RA-AA0B02R19B-2081811590-287106387.webp',NULL,13,NULL),(37,'../../../../UpLoad/DongHo/DongHoStore/1699619292_sk-1636365185503.webp','1699619292_sk-1636365185503.webp',NULL,13,NULL);
/*!40000 ALTER TABLE `tbl_storeupload` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_thuonghieu`
--

DROP TABLE IF EXISTS `tbl_thuonghieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_thuonghieu` (
  `IdThuongHieu` bigint NOT NULL AUTO_INCREMENT,
  `Stt` bigint DEFAULT NULL,
  `TenGoi` text,
  `UrlAnh` text,
  `FileName` text,
  PRIMARY KEY (`IdThuongHieu`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_thuonghieu`
--

LOCK TABLES `tbl_thuonghieu` WRITE;
/*!40000 ALTER TABLE `tbl_thuonghieu` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_thuonghieu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `IdUsers` bigint NOT NULL AUTO_INCREMENT,
  `Username` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `Email` text,
  `Create_Date` datetime DEFAULT NULL,
  `MaPin` varchar(45) DEFAULT NULL,
  `CauHoiBaoMat` text,
  `CauTraLoi` text,
  `CountPassworld` int DEFAULT '0',
  `LoaiTaiKhoan` int DEFAULT NULL,
  `SoDienThoai` varchar(20) DEFAULT NULL,
  `DiaChi` text,
  `TrangThai` tinyint DEFAULT NULL,
  `TenDayDu` text,
  PRIMARY KEY (`IdUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','$2y$10$dX0TtwImBc7MoR9RTIRJG.UQa1nifNL7SdoYFkjq0c9/TktKW7gNe','quan.tm.1954@aptechlearning.edu.vn',NULL,'425902',NULL,NULL,0,1,NULL,NULL,1,NULL),(5,'quantran','$2y$10$dX0TtwImBc7MoR9RTIRJG.UQa1nifNL7SdoYFkjq0c9/TktKW7gNe','quanma4405@gmail.com',NULL,NULL,NULL,NULL,0,0,'094324352','Tổ 3 Phường Chiềng Sinh, TP Sơn la',1,'Trần Minh Quân'),(6,'ChuongPham2002','$2y$10$dX0TtwImBc7MoR9RTIRJG.UQa1nifNL7SdoYFkjq0c9/TktKW7gNe','chuongphenh4405@gmail.com','2023-11-10 06:51:56',NULL,NULL,NULL,0,4,'0332581817','Tổ 4, Phường Chiềng Lề, TP Sơn La',1,'Phạm Hữu Chương');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_userrole`
--

DROP TABLE IF EXISTS `tbl_userrole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_userrole` (
  `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `IdRole` bigint NOT NULL,
  `IdUsers` bigint NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_tbl_userrole_tbl_role_idx` (`IdRole`),
  KEY `fk_tbl_userrole_tbl_user1_idx` (`IdUsers`),
  CONSTRAINT `fk_tbl_userrole_tbl_role` FOREIGN KEY (`IdRole`) REFERENCES `tbl_role` (`IdRole`),
  CONSTRAINT `fk_tbl_userrole_tbl_user1` FOREIGN KEY (`IdUsers`) REFERENCES `tbl_user` (`IdUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_userrole`
--

LOCK TABLES `tbl_userrole` WRITE;
/*!40000 ALTER TABLE `tbl_userrole` DISABLE KEYS */;
INSERT INTO `tbl_userrole` VALUES (1,1,1),(2,2,5);
/*!40000 ALTER TABLE `tbl_userrole` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-11 15:45:35
