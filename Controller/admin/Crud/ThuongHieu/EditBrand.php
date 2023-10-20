<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $IdThuongHieu = (int)$_POST['IdThuongHieu'];
    $SoThuTu = $_POST['SoThuTu'];
    $TenGoi = $_POST['TenGoi'];

    $sql = "UPDATE tbl_thuonghieu SET Stt = '$SoThuTu',TenGoi = '$TenGoi'  WHERE IdThuongHieu = $IdThuongHieu";

    $result = $conect->query($sql);

    $data = array(
        'status' => true,
    );

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}
$db->closeDatabase();
