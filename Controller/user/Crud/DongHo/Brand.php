<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

$sql="SELECT * from tbl_thuonghieu";
$result=$conect->query($sql);
$datax=$result->fetch_all(MYSQLI_ASSOC);
$data=array(
    'listBrand'=>$datax,
    'status'=>true,
);
//trả về dữ liệu dưới dạng json
header('Content-Type: application/json');
echo json_encode($data);