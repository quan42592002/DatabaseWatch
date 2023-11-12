<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $content = $_POST['content'];
    $TenBaiViet = $_POST['TenBaiViet'];
    $IdBaiViet = $_POST['IdBaiViet'];


    $sql = "UPDATE tbl_baiviet SET TenBaiViet = ?, NoiDung = ? WHERE tbl_baiviet.IdBaiViet = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $TenBaiViet, $content, $IdBaiViet);
    $stmt->execute();
    if ($stmt == true) {
        $response = ["status" => true];
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
