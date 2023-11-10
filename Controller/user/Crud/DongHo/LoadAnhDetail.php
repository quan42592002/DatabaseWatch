<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;


$IdDongHo = isset($_GET['IdDongHo']) ? (int)$_GET['IdDongHo'] : 0;

// Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
$sql = "SELECT * FROM tbl_storeupload WHERE tbl_storeupload.IdDongHo = '$IdDongHo'";

$result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);


$data = array(
    'datax' => $datax,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
