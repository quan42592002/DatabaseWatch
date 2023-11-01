<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;


// Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
$sql = "SELECT tbl_chitietdongho.IdDongHo, tbl_dongho.*
FROM tbl_dongho
JOIN tbl_chitietdongho ON tbl_dongho.IdDongHo = tbl_chitietdongho.IdDongHo
WHERE tbl_chitietdongho.IdChiTietPhieuNhap IS NOT NULL
GROUP BY tbl_chitietdongho.IdDongHo;
        ";
$result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);


$data = array(
    'datax' => $datax,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
