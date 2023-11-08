<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Lấy dữ liệu từ form
    $IdChiTietDongHo = $_GET['IdChiTietDongHo'];

    $sql = "SELECT * FROM tbl_chitietdongho
    JOIN tbl_dongho ON tbl_chitietdongho.IdDongHo = tbl_dongho.IdDongHo
    Where IdChiTietDongHo = $IdChiTietDongHo;";

    $result = $conect->query($sql);
    $datax = $result->fetch_assoc();

    $data = array(
        'lstData' => $datax,
        'status' => true,
    );

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}
$db->closeDatabase();
