<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $UsersId = $_POST['UsersId'];

    $sql = "UPDATE tbl_GioHang SET TrangThai = 0 WHERE (tbl_GioHang.IdUsers = $UsersId) AND (tbl_GioHang.TrangThai IS NULL)";

    $result = $conn->query($sql);

    if ($result) {
        $data = array(
            'status' => true,
        );

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

$db->closeDatabase();
