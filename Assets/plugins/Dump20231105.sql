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
  KEY `fk_tbl_ChiTietDonDat_tbl_DonDat1_idx` (`IdDonDat`),
  CONSTRAINT `fk_tbl_ChiTietDonDat_tbl_DonDat1` FOREIGN KEY (`IdDonDat`) REFERENCES `tbl_dondat` (`IdDonDat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  `MaDongHo` varchar(250) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_chitietdongho`
--

LOCK TABLES `tbl_chitietdongho` WRITE;
/*!40000 ALTER TABLE `tbl_chitietdongho` DISABLE KEYS */;
INSERT INTO `tbl_chitietdongho` VALUES (4,'OP990-45ADGS-GL-X','OP990-45ADGS-GL-X-0',24,NULL,NULL,1,NULL,3),(5,NULL,'OP990-45ADGS-GL-X-1',24,NULL,NULL,1,NULL,3),(6,NULL,'OP990-45ADGS-GL-X-2',24,NULL,NULL,1,NULL,3),(7,NULL,'OP990-45ADGS-GL-X-3',24,NULL,NULL,1,NULL,3),(8,NULL,'OP990-45ADGS-GL-X-4',24,NULL,NULL,1,NULL,3),(9,NULL,'OP990-45ADGS-GL-X-5',24,NULL,NULL,1,NULL,3),(15,NULL,'OP990-45ADGS-GL-X-6',24,NULL,NULL,1,NULL,3),(16,NULL,'OP990-45ADGS-GL-X-7',24,NULL,NULL,1,NULL,3),(17,NULL,'OP990-45ADGS-GL-X-8',24,NULL,NULL,1,NULL,3),(18,NULL,'OP990-45ADGS-GL-X-9',24,NULL,NULL,1,NULL,3),(19,NULL,'OP990-45ADGS-GL-X-10',24,NULL,NULL,1,NULL,3),(20,NULL,'OP990-45ADGS-GL-X-11',24,NULL,NULL,1,NULL,3),(21,NULL,'OP990-45ADGS-GL-X-12',24,NULL,NULL,1,NULL,3),(22,NULL,'BI1054-12E-0',24,NULL,NULL,2,NULL,5),(23,NULL,'BI1054-12E-1',24,NULL,NULL,2,NULL,5),(24,NULL,'BI1054-12E-2',24,NULL,NULL,2,NULL,5),(25,NULL,'OP990-45ADGS-GL-T-0',24,NULL,NULL,3,NULL,5),(26,NULL,'OP990-45ADGS-GL-T-1',24,NULL,NULL,3,NULL,5),(27,NULL,'OP990-45ADGS-GL-T-2',24,NULL,NULL,3,NULL,5),(28,NULL,'OP990-45ADGS-GL-T-3',24,NULL,NULL,3,NULL,5),(29,NULL,'OP990-45ADGS-GL-T-4',24,NULL,NULL,3,NULL,5),(30,NULL,'RA-AA0B03L19B-0',24,NULL,NULL,4,NULL,NULL),(31,NULL,'OP990-45ADGS-GL-X-13',24,NULL,NULL,1,NULL,NULL),(32,NULL,'OP990-45ADGS-GL-X-14',24,NULL,NULL,1,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_chitietphieunhap`
--

LOCK TABLES `tbl_chitietphieunhap` WRITE;
/*!40000 ALTER TABLE `tbl_chitietphieunhap` DISABLE KEYS */;
INSERT INTO `tbl_chitietphieunhap` VALUES (3,13,0,'MP01',4),(4,8,0,'MP03',4),(5,8,0,'MP03',4);
/*!40000 ALTER TABLE `tbl_chitietphieunhap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_client`
--

DROP TABLE IF EXISTS `tbl_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_client` (
  `IdClient` bigint NOT NULL AUTO_INCREMENT,
  `HoTen` text,
  `DiaChi` text,
  `SoDienThoai` text,
  `CanCuocCongDan` text,
  `GioiTinh` text,
  `NgaySinh` datetime DEFAULT NULL,
  `IdUsers` bigint NOT NULL,
  PRIMARY KEY (`IdClient`),
  KEY `fk_tbl_client_tbl_user1_idx` (`IdUsers`),
  CONSTRAINT `fk_tbl_client_tbl_user1` FOREIGN KEY (`IdUsers`) REFERENCES `tbl_user` (`IdUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_client`
--

LOCK TABLES `tbl_client` WRITE;
/*!40000 ALTER TABLE `tbl_client` DISABLE KEYS */;
INSERT INTO `tbl_client` VALUES (1,'Trần Minh Quân','Kim Lâm Kim Bai','0332581817','033255788','Nam','2002-09-05 00:00:00',1);
/*!40000 ALTER TABLE `tbl_client` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_danhmuchethong`
--

LOCK TABLES `tbl_danhmuchethong` WRITE;
/*!40000 ALTER TABLE `tbl_danhmuchethong` DISABLE KEYS */;
INSERT INTO `tbl_danhmuchethong` VALUES (1,1,'Dây da',NULL,'Danh mục loại dây',NULL,NULL,NULL),(2,2,'Dây vàng 24k',NULL,'Danh mục loại dây',NULL,NULL,NULL),(3,3,'Dây Bạc',NULL,'Danh mục loại dây',NULL,NULL,NULL),(4,4,'Day cao su trơn',NULL,'Danh mục loại dây',NULL,NULL,NULL),(5,1,'Trẻ trung',NULL,'Danh mục kiểu dáng',NULL,NULL,NULL),(6,2,'Nữ tính',NULL,'Danh mục kiểu dáng',NULL,NULL,NULL),(7,3,'Nam tính',NULL,'Danh mục kiểu dáng',NULL,NULL,NULL),(8,4,'Thể Thao',NULL,'Danh mục kiểu dáng',NULL,NULL,NULL),(9,5,'Trung Niên',NULL,'Danh mục kiểu dáng',NULL,NULL,NULL),(10,1,'Orient',NULL,'Danh mục thương hiệu',NULL,NULL,NULL),(11,2,'Panius',NULL,'Danh mục thương hiệu',NULL,NULL,NULL),(12,3,'HubLog',NULL,'Danh mục thương hiệu',NULL,NULL,NULL),(13,4,'Citizen',NULL,'Danh mục thương hiệu',NULL,NULL,NULL),(14,5,'Rolex',NULL,'Danh mục thương hiệu',NULL,NULL,NULL),(15,5,'Dây rằn ri',NULL,'Danh mục loại dây','../../../../UpLoad/Admin/DanhMuc1699176451_bg.jpg','1699176451_bg.jpg',NULL);
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
  `IdClient` bigint NOT NULL,
  PRIMARY KEY (`IdDonDat`),
  KEY `fk_tbl_DonDat_tbl_client1_idx` (`IdClient`),
  CONSTRAINT `fk_tbl_DonDat_tbl_client1` FOREIGN KEY (`IdClient`) REFERENCES `tbl_client` (`IdClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dongho`
--

LOCK TABLES `tbl_dongho` WRITE;
/*!40000 ALTER TABLE `tbl_dongho` DISABLE KEYS */;
INSERT INTO `tbl_dongho` VALUES (1,'Đồng Hồ Olym Pianus','Orient','Nam',15,'Nam tính',20000,30000,'',20,NULL,'../../../../UpLoad/DongHo/1698345205_OP990-45ADGS-GL-X-1-1654832217252.png','1698345205_OP990-45ADGS-GL-X-1-1654832217252.png',1,0),(2,'Đồng Hồ Citizen','HubLog','Nam',3,'Trẻ trung',300000,200000,'Dây Bạc',20,NULL,'../../../../UpLoad/DongHo/1698604174_Bi1054-12E-773718459-520019565.png','1698604174_Bi1054-12E-773718459-520019565.png',1,NULL),(3,'Đồng Hồ Orient','Orient','Nam',5,'Nam tính',403999,585000,'Dây vàng 24k',30,NULL,'../../../../UpLoad/DongHo/1698859266_RA-AA0B03L19B-956301929-469466003.png.webp','1698859266_RA-AA0B03L19B-956301929-469466003.png.webp',1,NULL),(4,'Đồng Hồ Casio','Rolex','Nam',1,'Nữ tính',NULL,30000,'Dây Bạc',40,NULL,'../../../../UpLoad/DongHo/1699038409_KHUNG-SP-6676612-1785849039.webp','1699038409_KHUNG-SP-6676612-1785849039.webp',0,NULL);
/*!40000 ALTER TABLE `tbl_dongho` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_phieunhap`
--

LOCK TABLES `tbl_phieunhap` WRITE;
/*!40000 ALTER TABLE `tbl_phieunhap` DISABLE KEYS */;
INSERT INTO `tbl_phieunhap` VALUES (4,'MP01',NULL,'2023-11-02',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_storeupload`
--

LOCK TABLES `tbl_storeupload` WRITE;
/*!40000 ALTER TABLE `tbl_storeupload` DISABLE KEYS */;
INSERT INTO `tbl_storeupload` VALUES (1,'../../../../UpLoad/DongHo/DongHoStore/1699116841_mqdefault.jpg','1699116841_mqdefault.jpg','true',1,NULL),(2,'../../../../UpLoad/DongHo/DongHoStore/1699116874_Op990-45ags-gl-x.webp','1699116874_Op990-45ags-gl-x.webp','true',1,NULL),(3,'../../../../UpLoad/DongHo/DongHoStore/1699116876_OP990-45ADGS-GL-X-1-1654832239373.webp','1699116876_OP990-45ADGS-GL-X-1-1654832239373.webp','true',1,NULL),(4,'../../../../UpLoad/DongHo/DongHoStore/1699174445_mqdefault.jpg','1699174445_mqdefault.jpg',NULL,2,NULL),(5,'../../../../UpLoad/DongHo/DongHoStore/1699174445_Op990-45ags-gl-x.webp','1699174445_Op990-45ags-gl-x.webp',NULL,2,NULL),(6,'../../../../UpLoad/DongHo/DongHoStore/1699174445_OP990-45ADGS-GL-X-1-1654832239373.webp','1699174445_OP990-45ADGS-GL-X-1-1654832239373.webp',NULL,2,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_thuonghieu`
--

LOCK TABLES `tbl_thuonghieu` WRITE;
/*!40000 ALTER TABLE `tbl_thuonghieu` DISABLE KEYS */;
INSERT INTO `tbl_thuonghieu` VALUES (1,1,'Rolex Swiss Made','http://localhost:3000/UpLoad/ThuongHieu/CS-1362181789-1668935694.jpeg',NULL),(2,2,'Citizen','http://localhost:3000/UpLoad/ThuongHieu/logo-citizen.jpeg',NULL),(3,3,'Orient','http://localhost:3000/UpLoad/ThuongHieu/logo-orient.jpeg',NULL),(4,4,'Seven Tive','http://localhost:3000/UpLoad/ThuongHieu/logo-seiko.jpeg',NULL),(5,5,'HubLob','../../../../UpLoad/ThuongHieu/1697863136_logo-Hublot.jpeg','1697863136_logo-Hublot.jpeg');
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
  PRIMARY KEY (`IdUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','Phanmem@123','quan.tm.1954@aptechlearning.edu.vn',NULL,'425902',NULL,NULL,0),(5,'client','Phanmem@123',NULL,NULL,NULL,NULL,NULL,0);
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

-- Dump completed on 2023-11-05 22:39:28
