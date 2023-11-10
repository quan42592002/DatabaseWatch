<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

$IdUsers =  isset($_GET['IdUsers']) ? (int)$_GET['IdUsers'] : 0;

if ($IdUsers == 0) {
    // Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
    $sql = "SELECT tbl_user.IdUsers , tbl_giohang.Id , tbl_user.TenDayDu , tbl_user.DiaChi, tbl_user.SoDienThoai , tbl_chitietdongho.*,tbl_dongho.*
FROM tbl_giohang
Join tbl_user ON tbl_giohang.IdUsers = tbl_user.IdUsers
Join tbl_chitietdongho ON tbl_chitietdongho.IdChiTietDongHo = tbl_giohang.IdChiTietDongHo
Join tbl_dongho ON tbl_chitietdongho.IdDongHo = tbl_dongho.IdDongHo
Where tbl_giohang.TrangThai = false
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
}else{
    $sql = "SELECT tbl_user.IdUsers , tbl_giohang.Id , tbl_user.TenDayDu , tbl_user.DiaChi, tbl_user.SoDienThoai , tbl_chitietdongho.*,tbl_dongho.*
    FROM tbl_giohang
    Join tbl_user ON tbl_giohang.IdUsers = tbl_user.IdUsers
    Join tbl_chitietdongho ON tbl_chitietdongho.IdChiTietDongHo = tbl_giohang.IdChiTietDongHo
    Join tbl_dongho ON tbl_chitietdongho.IdDongHo = tbl_dongho.IdDongHo
    Where ( tbl_giohang.TrangThai = false ) AND (tbl_giohang.IdUsers = '$IdUsers')
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
}
