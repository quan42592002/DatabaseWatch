<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $IdDongHo = isset($_POST['IdDongHo']) ? (int)$_POST['IdDongHo'] : 0;
    $UsersId = isset($_POST['UsersId']) ? (int)$_POST['UsersId'] : 0;
    $response = [];

    $sql_gio_hang = "SELECT *
    FROM tbl_giohang
    Where ( tbl_giohang.IdDongHo = '$IdDongHo' ) AND (tbl_giohang.IdUsers = '$UsersId')
            ";

    $result_giohang = $conn->query($sql_gio_hang);
    $SoLuongRow = $result_giohang->num_rows;

    if ($SoLuongRow > 0) {
        $sql = "UPDATE tbl_giohang SET SoLuongMua = SoLuongMua + 1 WHERE IdDongHo = '$IdDongHo' AND IdUsers = '$UsersId'";
        $statement = $conn->query($sql);

        if ($statement) {
            $response = ["status" => true];
        } else {
            $response = ["status" => false];
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $sql = "INSERT INTO tbl_giohang (IdDongHo,SoLuongMua,IdUsers) VALUES ($IdDongHo,1, $UsersId)";
        $statement = $conn->query($sql);

        if ($statement) {
            $response = ["status" => true];
        } else {
            $response = ["status" => false];
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

$db->closeDatabase();
