<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $IdDongHo = $_POST['IdDongHo'];

    $sql = "INSERT INTO tbl_chitietdongho (IdDongHo) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $IdDongHo);

    if ($stmt->execute()) {
        $response = ["status" => true];
        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = ["status" => false];
         // Trả về dữ liệu dưới dạng JSON
         header('Content-Type: application/json');
         echo json_encode($response);
    }
}

$db->closeDatabase();
