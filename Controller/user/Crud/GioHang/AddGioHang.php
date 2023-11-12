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
    Where ( tbl_giohang.IdDongHo = '$IdDongHo' ) AND (tbl_giohang.IdUsers = '$UsersId') AND ( tbl_giohang.TrangThai IS NULL )
            ";

    $result_giohang = $conn->query($sql_gio_hang);
    $SoLuongRow = $result_giohang->num_rows;

    if ($SoLuongRow > 0) {

        $sql_gio_hang_x = "SELECT tbl_dongho.SoLuong,tbl_giohang.SoLuongMua
        FROM tbl_giohang
        Join tbl_user ON tbl_giohang.IdUsers = tbl_user.IdUsers
        Join tbl_dongho ON tbl_giohang.IdDongHo = tbl_dongho.IdDongHo
        Where ( tbl_giohang.TrangThai IS NULL ) AND (tbl_giohang.IdUsers = '$UsersId')
                ";
        $result_giohang_x = $conn->query($sql_gio_hang_x);
        if ($result_giohang_x->num_rows > 0) {
            while ($row = $result_giohang_x->fetch_assoc()) {
                $SoLuong = (int)$row['SoLuong'];
                $SoLuongMua = (int)$row['SoLuongMua'];
                if ($SoLuong == $SoLuongMua) {
                    $response = ["status" => false];
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit;
                }
            }
        }
        $sql = "UPDATE tbl_giohang SET SoLuongMua = SoLuongMua + 1 WHERE IdDongHo = '$IdDongHo' AND IdUsers = '$UsersId' and TrangThai IS NULL ";
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
