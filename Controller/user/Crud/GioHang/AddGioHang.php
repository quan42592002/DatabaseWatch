<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $IdChiTietDongHo = $_POST['IdChiTietDongHo'];
    $UsersId = $_POST['UsersId'];

    $sql = "INSERT INTO tbl_GioHang (IdChiTietDongHo, IdUsers) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $IdChiTietDongHo, $UsersId);

    if ($stmt->execute()) {
        $response = ["status" => true];
    } else {
        $response = ["status" => false];
    }

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

$db->closeDatabase();
