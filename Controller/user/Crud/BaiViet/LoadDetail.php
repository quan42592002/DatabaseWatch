<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;
$IdTopList= isset($_GET['IdTopList']) ? $_GET['IdTopList'] : "";
$sql="SELECT * FROM tbl_baiviet where tbl_baiviet.IdTopList='$IdTopList'";
$result = $conect->query($sql);
$datax =  $result->fetch_assoc();
$data = array(
    'listdata' => $datax,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
