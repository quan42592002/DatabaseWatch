<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;


// Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
$sql = "SELECT
	tbl_chitietdongho.Imei,
    tbl_dongho.TenDongHo,
    tbl_dongho.ThuongHieu,
    tbl_dondat.ThoiGian,
    tbl_dongho.GiaMua,
    tbl_dongho.GiaBan,
    tbl_user.Username
FROM
    db_dongho.tbl_dondat
INNER JOIN
    db_dongho.tbl_chitietdondat ON tbl_chitietdondat.IdDonDat = tbl_dondat.IdDonDat
INNER JOIN
    db_dongho.tbl_user ON tbl_dondat.IdUsers = tbl_user.IdUsers
INNER JOIN
    db_dongho.tbl_chitietdongho ON tbl_chitietdongho.IdChiTietDonDat = tbl_chitietdondat.IdChiTietDonDat
INNER JOIN
    db_dongho.tbl_dongho ON tbl_dongho.IdDongHo = tbl_chitietdongho.IdDongHo
    WHERE 1
";



$result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);

// Truy vấn SQL để tính tổng số tài khoản
$sqlUser = "SELECT *
FROM db_dongho.tbl_user
WHERE loaitaikhoan <> 0;
";
$resultx = $conect->query($sqlUser);
$lstTaiKhoan = $resultx->fetch_all(MYSQLI_ASSOC);

$data = array(
    'datax' => $datax,
    'lstTaiKhoan' => $lstTaiKhoan,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);