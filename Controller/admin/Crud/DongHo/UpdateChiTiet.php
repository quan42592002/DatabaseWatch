<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;


$IdDongHo = isset($_POST['IdDongHo']) ? (int)$_POST['IdDongHo'] : 0;
$Imei = isset($_POST['Imei']) ? $_POST['Imei'] : "";

// Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
$sql = "UPDATE tbl_chitietdongho SET Imei = '$Imei' WHERE tbl_chitietdongho.IdDongHo = $IdDongHo";

$result = $conect->query($sql);

if ($result) {
    $data = array(
        'status' => true,
    );
    
    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($data);
    
}
