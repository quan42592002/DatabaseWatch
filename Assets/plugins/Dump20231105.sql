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
  `IdTopList` bigint DEFAULT NULL,
  PRIMARY KEY (`IdBaiViet`),
  KEY `fk_tbl_baiviet_tbl_BaiVietNoiBat1_idx` (`IdTopList`),
  CONSTRAINT `fk_tbl_baiviet_tbl_BaiVietNoiBat1` FOREIGN KEY (`IdTopList`) REFERENCES `tbl_baivietnoibat` (`IdTopList`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_baiviet`
--

LOCK TABLES `tbl_baiviet` WRITE;
/*!40000 ALTER TABLE `tbl_baiviet` DISABLE KEYS */;
INSERT INTO `tbl_baiviet` VALUES (4,'Bài viết abc','<p>fdsfssagfds</p>\n',2);
/*!40000 ALTER TABLE `tbl_baiviet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_baivietnoibat`
--

DROP TABLE IF EXISTS `tbl_baivietnoibat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_baivietnoibat` (
  `IdTopList` bigint NOT NULL AUTO_INCREMENT,
  `TieuDe` text,
  `NoiDung` text,
  `CreateDate` date DEFAULT NULL,
  `NguoiTao` text,
  `UrlAnh` text,
  `FileName` text,
  `TrangThai` tinyint DEFAULT NULL,
  PRIMARY KEY (`IdTopList`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_baivietnoibat`
--

LOCK TABLES `tbl_baivietnoibat` WRITE;
/*!40000 ALTER TABLE `tbl_baivietnoibat` DISABLE KEYS */;
INSERT INTO `tbl_baivietnoibat` VALUES (2,'8 mẫu đồng hồ Rolex nữ đẹp nhất, độc đáo, tinh tế, cực sang','8 mẫu đồng hồ Rolex nữ đẹp nhất tại WatchStoreThiết kế và chất lượng của những chiếc Rolex nữ tạo ra sự khác biệt lớn so với phần còn lại trên thị trường. Các mẫu đồng hồ này ẩn chứa sức...','2023-11-11','Anh Quân đây','../../../../UpLoad/Admin/TopList/1699767547_mau-dong-ho-rolex-nu-dep-nhat.webp','../../../../UpLoad/Admin/TopList/1699767547_mau-dong-ho-rolex-nu-dep-nhat.webp',1);
/*!40000 ALTER TABLE `tbl_baivietnoibat` ENABLE KEYS */;
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
  `IdDonDat` bigint NOT NULL,
  PRIMARY KEY (`IdChiTietDonDat`),
  KEY `fk_tbl_ChiTietDonDat_tbl_DonDat1_idx` (`IdDonDat`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_chitietdondat`
--

LOCK TABLES `tbl_chitietdondat` WRITE;
/*!40000 ALTER TABLE `tbl_chitietdondat` DISABLE KEYS */;
INSERT INTO `tbl_chitietdondat` VALUES (10,3,11),(11,6,11);
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_chitietdongho`
--

LOCK TABLES `tbl_chitietdongho` WRITE;
/*!40000 ALTER TABLE `tbl_chitietdongho` DISABLE KEYS */;
INSERT INTO `tbl_chitietdongho` VALUES (37,'AE-1200WHD-1AVDF-0',24,'2023-11-11','2025-11-11',9,10,7),(38,'AE-1200WHD-1AVDF-1',24,'2023-11-11','2025-11-11',9,10,7),(39,'MTP-1374L-1AVDF-0',24,'2023-11-11','2025-11-11',10,10,7),(40,'MTP-1374L-1AVDF-1',24,'2023-11-12','2025-11-12',10,11,7),(41,'EFV-600L-2AVUDF-0',24,NULL,NULL,11,NULL,7),(42,'EFV-600L-2AVUDF-1',24,NULL,NULL,11,NULL,7),(43,'EFV-600L-2AVUDF-2',24,NULL,NULL,11,NULL,7),(44,'LW-204-4ADF-0',24,'2023-11-12','2025-11-12',12,11,7),(45,'LW-204-4ADF-1',24,'2023-11-12','2025-11-12',12,11,7),(46,'RA-AA0B02R19B-0',24,'2023-11-12','2025-11-12',13,11,7),(47,'RA-AA0B02R19B-1',24,'2023-11-12','2025-11-12',13,11,7),(48,'RA-AA0B02R19B-2',24,'2023-11-12','2025-11-12',13,11,7);
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
  `ThoiGian` datetime DEFAULT NULL,
  `TrangTraiThanhToan` text,
  `TongTien` decimal(10,0) DEFAULT NULL,
  `IdUsers` bigint NOT NULL,
  PRIMARY KEY (`IdDonDat`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dondat`
--

LOCK TABLES `tbl_dondat` WRITE;
/*!40000 ALTER TABLE `tbl_dondat` DISABLE KEYS */;
INSERT INTO `tbl_dondat` VALUES (11,1,'2023-11-11 00:00:00',NULL,3850000,5);
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
  `MaDongHo` varchar(45) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dongho`
--

LOCK TABLES `tbl_dongho` WRITE;
/*!40000 ALTER TABLE `tbl_dongho` DISABLE KEYS */;
INSERT INTO `tbl_dongho` VALUES (9,'Đồng Hồ Casio','AE-1200WHD-1AVDF','Casio','Nam',0,'Thể Thao',900000,1090000,'Dây kim loại',24,NULL,'../../../../UpLoad/DongHo/1699618077_1-KHUNG-SP-6676612-1785849039.webp','1699618077_1-KHUNG-SP-6676612-1785849039.webp',1,NULL),(10,'Đồng Hồ Casio','MTP-1374L-1AVDF','Casio','Nam',0,'Sang trọng',1370000,1670000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699618618_1-KHUNG-SP-1-1818542633-1853976209.webp','1699618618_1-KHUNG-SP-1-1818542633-1853976209.webp',1,NULL),(11,'Đồng Hồ Casio','EFV-600L-2AVUDF','Casio','Nam',3,'Sang trọng',2320000,2820000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699618802_1-KHUNG-SP-1129271049-505289889.webp','1699618802_1-KHUNG-SP-1129271049-505289889.webp',1,NULL),(12,'Đồng Hồ Casio','LW-204-4ADF','Casio','Nữ',0,'Sang trọng',720000,850000,'Dây kim loại',21,NULL,'../../../../UpLoad/DongHo/1699619002_LW-204-4ADF.webp','1699619002_LW-204-4ADF.webp',1,NULL),(13,'Đồng Hồ Orient','RA-AA0B02R19B','Orient','Nam',0,'Sang trọng',4000000,5850000,'Dây kim loại',25,NULL,'../../../../UpLoad/DongHo/1699619182_RA-AA0B02R19B-2081811590-287106387.webp','1699619182_RA-AA0B02R19B-2081811590-287106387.webp',1,NULL),(14,'Đồng Hồ Citizen ',NULL,'Citizen','Nam',0,'Thể Thao',4250000,4650000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699720937_AU1062-56E-112015096-579722830.webp','1699720937_AU1062-56E-112015096-579722830.webp',1,NULL),(15,'Đồng Hồ Citizen',NULL,'Citizen','Nữ',0,'Dân văn phòng',2590000,2990000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699721239_EU6060-55D-1368129322-1310029729.webp','1699721239_EU6060-55D-1368129322-1310029729.webp',1,NULL),(16,'Đồng Hồ Citizen',NULL,'Citizen','Nữ',0,'Sang trọng',7270000,7670000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699721371_EM0320-59D.webp','1699721371_EM0320-59D.webp',1,NULL),(17,'Đồng Hồ Citizen',NULL,'Citizen','Nam',0,'Dân văn phòng',4020000,4120000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699721461_NH8363-14H-392544854-264900313.webp','1699721461_NH8363-14H-392544854-264900313.webp',1,NULL),(18,'Đồng Hồ Citizen',NULL,'Citizen','Nam',0,'Thể Thao',7020000,7420000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699721540_CA4559-13A.webp','1699721540_CA4559-13A.webp',1,NULL),(19,'Đồng Hồ Citizen',NULL,'Citizen','Nam',0,'Quân đội',3410000,3710000,'Dây dù/vải',20,NULL,'../../../../UpLoad/DongHo/1699721640_BM8475-00F.webp','1699721640_BM8475-00F.webp',1,NULL),(20,'Đồng Hồ Orient',NULL,'Orient','Nam',0,'Sang trọng',6480000,6780000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699721792_RA-AR0005Y10B.webp','1699721792_RA-AR0005Y10B.webp',1,NULL),(21,'Đồng Hồ Orient',NULL,'Orient','Nam',0,'Sang trọng',5290000,5490000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699722621_FAG02003W0-1643780076-754511646.webp','1699722621_FAG02003W0-1643780076-754511646.webp',1,NULL),(22,'Đồng Hồ Orient',NULL,'Orient','Nam',0,'Thể Thao',5450000,5850000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699722923_RA-AA0B03L19B-956301929-469466003.webp','1699722923_RA-AA0B03L19B-956301929-469466003.webp',1,NULL),(23,'Đồng Hồ Orient',NULL,'Orient','Nam',0,'Thể Thao',6080000,6380000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699724026_RA-AG0005L10B.webp','1699724026_RA-AG0005L10B.webp',1,NULL),(24,'Đồng Hồ Orient',NULL,'Orient','Nữ',0,'Sang trọng',6040000,6240000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699724150_1-KHUNG-SP-1190254445-1116070149.webp','1699724150_1-KHUNG-SP-1190254445-1116070149.webp',1,NULL),(25,'Đồng Hồ Orient',NULL,'Orient','Nữ',0,'Sang trọng',7020000,7320000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699724261_1-KHUNG-SP-1873144229-111093675.webp','1699724261_1-KHUNG-SP-1873144229-111093675.webp',1,NULL),(26,'Đồng Hồ Seiko',NULL,'Seiko','Nam',0,'Quân đội',3250000,3850000,'Dây dù/vải',20,NULL,'../../../../UpLoad/DongHo/1699724395_SNK809K2.webp','1699724395_SNK809K2.webp',1,NULL),(27,'Đồng Hồ Seiko',NULL,'Seiko','Nam',0,'Quân đội',3550000,3850000,'Dây dù/vải',20,NULL,'../../../../UpLoad/DongHo/1699724545_SNK805K2.webp','1699724545_SNK805K2.webp',1,NULL),(28,'Đồng Hồ Seiko',NULL,'Seiko','Nữ',0,'Sang trọng',11050000,11250000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699724851_dong-ho-seiko-srp839j1_1-ims.webp','1699724851_dong-ho-seiko-srp839j1_1-ims.webp',1,NULL),(29,'Đồng Hồ Seiko',NULL,'Seiko','Nam',0,'Quân đội',9060000,9660000,'Dây dù/vải',20,NULL,'../../../../UpLoad/DongHo/1699724974_SRPD79K1-1-1665633330622.webp','1699724974_SRPD79K1-1-1665633330622.webp',1,NULL),(30,'Đồng Hồ Seiko',NULL,'Seiko','Nam',0,'Sang trọng',15000000,15030000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699725065_SSA421J1-1656787274-1005595227.webp','1699725065_SSA421J1-1656787274-1005595227.webp',1,NULL),(31,'Đồng Hồ Seiko',NULL,'Seiko','Nam',0,'Sang trọng',7720000,7920000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699725126_SRPD69K1.webp','1699725126_SRPD69K1.webp',1,NULL),(32,'Đồng Hồ Seiko',NULL,'Seiko','Nam',0,'Sang trọng',6550000,6750000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699725221_SNZB26J1.webp','1699725221_SNZB26J1.webp',1,NULL),(33,'Đồng Hồ Olym Pianus',NULL,'Olym-Pianus','Nữ',0,'Sang trọng',4940000,5040000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699725349_OP990-45DDLR-GL-T.webp','1699725349_OP990-45DDLR-GL-T.webp',1,NULL),(34,'Đồng Hồ Olym Pianus',NULL,'Olym-Pianus','Nam',0,'Sang trọng',4350000,4550000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699725447_OP89322AGSK-T-1-1657793128245.webp','1699725447_OP89322AGSK-T-1-1657793128245.webp',1,NULL),(35,'Đồng Hồ Olym Pianus',NULL,'Olym-Pianus','Nam',0,'Sang trọng',6570000,6870000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699725582_OP990-45.24ADGS-GL-D-11-1670289701323.webp','1699725582_OP990-45.24ADGS-GL-D-11-1670289701323.webp',1,NULL),(36,'Đồng Hồ Olym Pianus',NULL,'Olym-Pianus','Nam',0,'Sang trọng',7010000,7410000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699725689_OP990-45.24ADGR-1-1654833178100.webp','1699725689_OP990-45.24ADGR-1-1654833178100.webp',1,NULL),(37,'Đồng Hồ Olym Pianus',NULL,'Olym-Pianus','Nam',0,'Sang trọng',4250000,4550000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699725900_OP89322AGSK-XL-2-1666253313706.webp','1699725900_OP89322AGSK-XL-2-1666253313706.webp',1,NULL),(38,'Đồng Hồ Olym Pianus',NULL,'Olym-Pianus','Nam',0,'Sang trọng',7110000,7410000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699726041_OP990-45-953516387-1564232959.webp','1699726041_OP990-45-953516387-1564232959.webp',1,NULL),(39,'Đồng Hồ Tissot',NULL,'Tissot','Nữ',0,'Cổ điển vinatax',10200000,10600000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699726325_T050.webp','1699726325_T050.webp',1,NULL),(40,'Đồng Hồ Tissot',NULL,'Tissot','Nữ',0,'Sang trọng',10000000,10600000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699726432_T050-631388704-501472306.webp','1699726432_T050-631388704-501472306.webp',1,NULL),(41,'Đồng Hồ Tissot',NULL,'Tissot','Nữ',0,'Sang trọng',9000000,9500000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699726609_T050.207.11.011.04-1-1667359829981.webp','1699726609_T050.207.11.011.04-1-1667359829981.webp',1,NULL),(42,'Đồng Hồ Tissot',NULL,'Tissot','Nam',0,'Sang trọng',8000000,8600000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699726750_T086-31505919-1831599363.webp','1699726750_T086-31505919-1831599363.webp',1,NULL),(43,'Đồng Hồ Tissot',NULL,'Tissot','Nam',0,'Sang trọng',8700000,9000000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699727135_2-1678624216297 (1).webp','1699727135_2-1678624216297 (1).webp',1,NULL),(44,'Đồng Hồ Tissot',NULL,'Tissot','Nam',0,'Sang trọng',13500000,13900000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699727993_T137.407.16.041.00-1-1664596612185.webp','1699727993_T137.407.16.041.00-1-1664596612185.webp',1,NULL),(45,'Đồng Hồ Thomas Earnshaw',NULL,'Thomas-Earnshaw','Nam',0,'Quân đội',4390000,4690000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699728121_Es-8257-33-1-1661479095091.webp','1699728121_Es-8257-33-1-1661479095091.webp',1,NULL),(46,'Đồng Hồ Thomas Earnshaw',NULL,'Thomas-Earnshaw','Nam',0,'Thể Thao',4390000,4690000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699728311_ES-8257-22-1-1663291310798.webp','1699728311_ES-8257-22-1-1663291310798.webp',1,NULL),(47,'Đồng Hồ Thomas Earnshaw',NULL,'Thomas-Earnshaw','Nam',0,'Sang trọng',6000000,6050000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699728431_ES-8255-55-1-1663126306248.webp','1699728431_ES-8255-55-1-1663126306248.webp',1,NULL),(48,'Đồng Hồ Thomas Earnshaw',NULL,'Thomas-Earnshaw','Nam',0,'Sang trọng',3240000,3740000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699728592_ES-8257-02-1-1663149046004.webp','1699728592_ES-8257-02-1-1663149046004.webp',1,NULL),(49,'Đồng Hồ Thomas Earnshaw',NULL,'Thomas-Earnshaw','Nam',0,'Cổ điển vinatax',4390000,4690000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699728726_ES-8257-11.webp','1699728726_ES-8257-11.webp',1,NULL),(50,'Đồng Hồ Thomas Earnshaw',NULL,'Thomas-Earnshaw','Nam',0,'Cổ điển vinatax',4290000,4690000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699728918_ES-8252-11-9-1663637766771.webp','1699728918_ES-8252-11-9-1663637766771.webp',1,NULL),(51,'Đồng Hồ Thomas Earnshaw',NULL,'Thomas-Earnshaw','Nam',0,'Sang trọng',5900000,6050000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699729154_ES-8252-11-9-1663637766771.webp','1699729154_ES-8252-11-9-1663637766771.webp',1,NULL),(52,'Đồng Hồ Casio',NULL,'Casio','Nam',0,'Cổ điển vinatax',700000,760000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699729653_LA670WA-1DF.webp','1699729653_LA670WA-1DF.webp',1,NULL),(53,'Đồng Hồ Casio',NULL,'Casio','Nam',0,'Thể Thao',600000,680000,'Dây cao su',20,NULL,'../../../../UpLoad/DongHo/1699729820_1-KHUNG-SP-1309908976-1012388594.webp','1699729820_1-KHUNG-SP-1309908976-1012388594.webp',1,NULL),(54,'Đồng Hồ Casio',NULL,'Casio','Nam',0,'Thể Thao',3270000,3470000,'Dây cao su',20,NULL,'../../../../UpLoad/DongHo/1699729911_1-KHUNG-SP-1419066155-2095595723.webp','1699729911_1-KHUNG-SP-1419066155-2095595723.webp',1,NULL),(55,'Đồng Hồ Casio',NULL,'Casio','Nam',0,'Thể Thao',900000,910000,'Dây cao su',20,NULL,'../../../../UpLoad/DongHo/1699729985_AE-1200WH-1AVDF-1681719108798.webp','1699729985_AE-1200WH-1AVDF-1681719108798.webp',1,NULL),(56,'Đồng Hồ Casio',NULL,'Casio','Nam',0,'Quân đội',920000,900000,'Dây dù/vải',20,NULL,'../../../../UpLoad/DongHo/1699730347_AE-1200WHB-3BVDF-637909550-404254569.webp','1699730347_AE-1200WHB-3BVDF-637909550-404254569.webp',1,NULL),(57,'Đồng Hồ Citizen',NULL,'Citizen','Nam',0,'Dân văn phòng',4090000,4490000,'Dây da',20,NULL,'../../../../UpLoad/DongHo/1699730606_FAC00001B0.webp','1699730606_FAC00001B0.webp',1,NULL),(58,'Đồng Hồ Citizen',NULL,'Citizen','Nam',0,'Sang trọng',14000000,14100000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699730810_RE-HK0001S00B.webp','1699730810_RE-HK0001S00B.webp',1,NULL),(59,'Đồng Hồ Citizen',NULL,'Citizen','Nam',0,'Sang trọng',3200000,3800000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699730897_1-KHUNG-SP-1701978971-1671246148.webp','1699730897_1-KHUNG-SP-1701978971-1671246148.webp',1,NULL),(60,'Đồng Hồ Citizen',NULL,'Citizen','Nam',0,'Sang trọng',6300000,6600000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699731065_RA-AA0B04R19B-1112679021-1318586409.webp','1699731065_RA-AA0B04R19B-1112679021-1318586409.webp',1,NULL),(61,'Đồng Hồ Citizen',NULL,'Citizen','Nam',0,'Sang trọng',9090000,9490000,'Dây kim loại',20,NULL,'../../../../UpLoad/DongHo/1699731192_RA-AS0002B00B-1073226325-1318032292.webp','1699731192_RA-AS0002B00B-1073226325-1318032292.webp',1,NULL);
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
  `IdDongHo` bigint DEFAULT NULL,
  `SoLuongMua` bigint DEFAULT NULL,
  `IdUsers` bigint DEFAULT NULL,
  `TrangThai` tinyint DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_giohang`
--

LOCK TABLES `tbl_giohang` WRITE;
/*!40000 ALTER TABLE `tbl_giohang` DISABLE KEYS */;
INSERT INTO `tbl_giohang` VALUES (31,9,2,5,1),(32,10,1,5,1),(33,10,1,5,1),(34,12,2,5,1),(35,13,3,5,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
INSERT INTO `tbl_user` VALUES (1,'admin','$2y$10$dX0TtwImBc7MoR9RTIRJG.UQa1nifNL7SdoYFkjq0c9/TktKW7gNe','quan.tm.1954@aptechlearning.edu.vn',NULL,'425902',NULL,NULL,0,1,NULL,NULL,1,'Anh Quân đây'),(5,'quantran','$2y$10$dX0TtwImBc7MoR9RTIRJG.UQa1nifNL7SdoYFkjq0c9/TktKW7gNe','quanma4405@gmail.com',NULL,NULL,NULL,NULL,0,0,'094324352','Tổ 3 Phường Chiềng Sinh, TP Sơn la',1,'Trần Minh Quân'),(6,'ChuongPham2002','$2y$10$dX0TtwImBc7MoR9RTIRJG.UQa1nifNL7SdoYFkjq0c9/TktKW7gNe','chuongphenh4405@gmail.com','2023-11-10 06:51:56',NULL,NULL,NULL,0,4,'0332581817','Tổ 4, Phường Chiềng Lề, TP Sơn La',1,'Phạm Hữu Chương');
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

-- Dump completed on 2023-11-12 12:39:33
