<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $IdChiTietDongHo = $_POST['IdChiTietDongHo'];

    $sql = "DELETE FROM tbl_chitietdongho Where IdChiTietDongHo = '$IdChiTietDongHo';";

    $result = $conect->query($sql);

    $data = array(
        'status' => true,
    );

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}
$db->closeDatabase();
