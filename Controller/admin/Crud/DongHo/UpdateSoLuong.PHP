<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;


$IdDongHo = isset($_GET['IdDongHo']) ? (int)$_GET['IdDongHo'] : 0;

// Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
$sql = "SELECT * FROM tbl_chitietdongho WHERE tbl_chitietdongho.IdDongHo = '$IdDongHo'";

$result = $conect->query($sql);
$datax = $result->num_rows  > 0 ? $result->num_rows : 0 ;

// $sqk_Update = 

$data = array(
    'datax' => $datax,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
