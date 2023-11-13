<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;



$sql = "SELECT * FROM db_dongho.tbl_baivietnoibat WHERE tbl_baivietnoibat.TrangThai = true ;";

$result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);
$data = array(
    'lstBaiViet' => $datax,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
