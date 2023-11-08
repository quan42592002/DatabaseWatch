<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

$UsersId = isset($_GET['UsersId']) ? (int)$_GET['UsersId'] : 0;

$sql = "SELECT * FROM tbl_chitietdongho 
    Join tbl_dongho ON tbl_chitietdongho.IdDongHo = tbl_dongho.IdDongHo
    JOIN tbl_giohang ON tbl_giohang.IdChiTietDongHo = tbl_chitietdongho.IdChiTietDongHo
    WHERE tbl_giohang.IdUsers = $UsersId";

$result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);
$data = array(
    'lstGioHang' => $datax,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
