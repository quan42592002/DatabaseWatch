<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

$sql = "SELECT * FROM tbl_thuonghieu;";

$result = $conect->query($sql);
$datax = $result->fetch_all(MYSQLI_ASSOC);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
        
//     }
// }

$data = array(
    'datax' => $datax,
    'status' => true,
);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);

