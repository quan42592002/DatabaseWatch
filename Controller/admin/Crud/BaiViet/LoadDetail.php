<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Lấy dữ liệu từ form
    $IdTopList = $_GET['IdTopList'];

    $sql = "SELECT * FROM tbl_baiviet Where IdTopList = '$IdTopList';";

    $result = $conect->query($sql);
    $datax = $result->fetch_assoc();

    $data = array(
        'datax' => $datax,
        'status' => true,
    );

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}
$db->closeDatabase();
