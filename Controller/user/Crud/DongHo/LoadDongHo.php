<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;



$sql = "SELECT tbl_chitietdongho.IdDongHo , tbl_chitietdongho.IdChiTietDonDat , tbl_chitietdongho.IdChiTietPhieuNhap , tbl_dongho.*  FROM db_dongho.tbl_chitietdongho
    Join tbl_dongho ON tbl_chitietdongho.IdDongHo = tbl_dongho.IdDongHo
    group by tbl_chitietdongho.IdDongHo  , tbl_chitietdongho.IdChiTietDonDat , tbl_chitietdongho.IdChiTietPhieuNhap 
    Having (tbl_chitietdongho.IdChiTietDonDat IS NULL) And (tbl_chitietdongho.IdChiTietPhieuNhap IS NOT NULL)
    ;";

$result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);
$data = array(
    'lstDongHo' => $datax,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
