<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $content = $_POST['content'];
    $TenBaiViet = $_POST['TenBaiViet'];

    $sql = "INSERT INTO tbl_baiviet (TenBaiViet , NoiDung ) VALUES ('$TenBaiViet','$content')";
    $stmt = $conn->query($sql);

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
