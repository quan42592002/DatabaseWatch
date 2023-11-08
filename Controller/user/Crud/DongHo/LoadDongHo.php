<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

$IdUser = "";
$sql = "";

if (isset($_SESSION['IdRole'])) {
    $IdUser = $_SESSION['IdUsers'];
    $sql = "SELECT * , tbl_chitietdongho.IdChiTietDongHo FROM tbl_chitietdongho 
Join tbl_dongho ON tbl_chitietdongho.IdDongHo = tbl_dongho.IdDongHo
LEFT JOIN tbl_giohang ON tbl_giohang.IdChiTietDongHo = tbl_chitietdongho.IdChiTietDongHo
WHERE (tbl_chitietdongho.IdChiTietPhieuNhap IS NOT NULL) AND (tbl_giohang.IdChiTietDongHo IS NULL )AND (tbl_giohang.IdUsers = $IdUser)
ORDER BY tbl_chitietdongho.IdChiTietDongHo DESC
;";
} else {
    $sql = "SELECT * , tbl_chitietdongho.IdChiTietDongHo FROM tbl_chitietdongho 
    Join tbl_dongho ON tbl_chitietdongho.IdDongHo = tbl_dongho.IdDongHo
    WHERE (tbl_chitietdongho.IdChiTietPhieuNhap IS NOT NULL) 
    ORDER BY tbl_chitietdongho.IdChiTietDongHo DESC
    ;";
}

$result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);
$data = array(
    'lstDongHo' => $datax,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
