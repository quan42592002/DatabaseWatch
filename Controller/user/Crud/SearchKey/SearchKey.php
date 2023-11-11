<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;
$input_key = isset($_GET['input_key']) ? $_GET['input_key'] : "";

    $sql="SELECT tbl_chitietdongho.IdDongHo , tbl_chitietdongho.IdChiTietDonDat , tbl_chitietdongho.IdChiTietPhieuNhap , tbl_dongho.*  FROM db_dongho.tbl_chitietdongho
    Join tbl_dongho ON tbl_chitietdongho.IdDongHo = tbl_dongho.IdDongHo where tbl_dongho.TenDongHo like '%$input_key%'
    group by tbl_chitietdongho.IdDongHo  , tbl_chitietdongho.IdChiTietDonDat , tbl_chitietdongho.IdChiTietPhieuNhap 
    Having (tbl_chitietdongho.IdChiTietDonDat IS NULL) And (tbl_chitietdongho.IdChiTietPhieuNhap IS NOT NULL)
    ;";
    $result=$conect->query($sql);
    $datax = $result->fetch_all(MYSQLI_ASSOC);
    $data=array(
        'listdata'=>$datax,
        'status'=>true,
    );
    header('Content-Type: application/json');
    echo json_encode($data);
