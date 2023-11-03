<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;




// Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
$sql = "";

$resultLoaiDay = $conect->query("SELECT * FROM tbl_danhmuchethong Where tbl_danhmuchethong.PhanLoai = 'Danh mục loại dây' ");
$resultKieuDang = $conect->query("SELECT * FROM tbl_danhmuchethong Where tbl_danhmuchethong.PhanLoai = 'Danh mục kiểu dáng' ");
$resultThuongHieu = $conect->query("SELECT * FROM tbl_danhmuchethong Where tbl_danhmuchethong.PhanLoai = 'Danh mục thương hiệu' ");

$lstLoaiDay = $resultLoaiDay->fetch_all(MYSQLI_ASSOC);
$lstThuongHieu = $resultThuongHieu->fetch_all(MYSQLI_ASSOC);
$lstKieuDang = $resultKieuDang->fetch_all(MYSQLI_ASSOC);

$data = array(
    'lstLoaiDay' => $lstLoaiDay,
    'lstThuongHieu' => $lstThuongHieu,
    'lstKieuDang' => $lstKieuDang,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
?>