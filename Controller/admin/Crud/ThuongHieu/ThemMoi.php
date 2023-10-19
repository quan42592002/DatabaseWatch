<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conect = $db->conn;

// Xử lý dữ liệu ở đây (ví dụ: lấy dữ liệu từ cơ sở dữ liệu)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $SoThuTu = $_POST['SoThuTu'];
    $TenGoi = $_POST['TenGoi'];

    $sql = "INSERT INTO tbl_thuonghieu (Stt, TenGoi) VALUES ('$SoThuTu', '$TenGoi')";
    $result = $conect->query($sql);

    $data = array(
        'SoThuTu' =>  $SoThuTu,
        'TenGoi' => $TenGoi,
        'status' => true,
    );
    
    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}


?>