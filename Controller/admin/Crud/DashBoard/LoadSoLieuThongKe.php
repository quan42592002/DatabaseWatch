<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

// Truy vấn SQL để tính tổng số lượng bán
$sqlBan = " SELECT
SUM(SUM(SoLuong)) OVER () AS TongTatCaBan
FROM
db_dongho.tbl_chitietdongho
INNER JOIN 
db_dongho.tbl_chitietdondat ON tbl_chitietdongho.IdChiTietDonDat = tbl_chitietdondat.IdChiTietDonDat;
";

$resultBan = $conect->query($sqlBan);
$dataBan = $resultBan->fetch_all(MYSQLI_ASSOC);

// Truy vấn SQL để tính tổng số lượng nhập
$sqlNhap = "SELECT
    SUM(SUM(SoluongNhap)) OVER () AS TongTatCaNhap
FROM
    db_dongho.tbl_chitietdongho
INNER JOIN
    db_dongho.tbl_chitietphieunhap ON tbl_chitietdongho.IdChiTietPhieuNhap = tbl_chitietphieunhap.IdChiTietPhieuNhap

";

$resultNhap = $conect->query($sqlNhap);
$dataNhap = $resultNhap->fetch_all(MYSQLI_ASSOC);

// Truy vấn SQL để tính tổng số tài khoản
$sqlUser = "SELECT COUNT(*) as TongUser
FROM db_dongho.tbl_user
WHERE loaitaikhoan <> 0;
";

$resultUser = $conect->query($sqlUser);
$dataUser = $resultUser->fetch_all(MYSQLI_ASSOC);

// Truy vấn SQL để tính tổng số đơn chưa duyệt
$sqlDCD = "SELECT COUNT(*) as TongDonChuaDuyet FROM db_dongho.tbl_giohang
where TrangThai =0;
";

$resultDCD = $conect->query($sqlDCD);
$dataDCD = $resultDCD->fetch_all(MYSQLI_ASSOC);


$data = array(
    'dataNhap' => $dataNhap,
    'dataBan' => $dataBan,
    'dataUser' => $dataUser,
    'dataDCD' => $dataDCD,

    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
?>