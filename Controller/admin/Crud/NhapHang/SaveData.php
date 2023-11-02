<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $lstCheckedItem = $_POST['lstCheckedItem'];
    $IdUsers = $_POST['IdUsers'];
    $MaPhieuNhap = $_POST['MaPhieuNhap'];
    $SoluongNhap = $_POST['SoluongNhap'];
    $currentDate = date("Y-m-d");

    $sql_check = "SELECT * FROM db_dongho.tbl_phieunhap WHERE tbl_phieunhap.NgayTao = '$currentDate' AND tbl_phieunhap.IdUsers = $IdUsers";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $lastInsertId = $row['IdPhieu'];

            $sql_insert_ctphieu = "INSERT INTO tbl_chitietphieunhap (MaPhieuNhap , SoluongNhap , SoLuongBan ,IdPhieu ) VALUES ('$MaPhieuNhap','$SoluongNhap',0 ,'$lastInsertId')";
            if ($conn->query($sql_insert_ctphieu) === TRUE) {

                $Idchitietphieunhap = $conn->insert_id;

                // Lưu bảng chi tiết đồng hồ
                // Tách đồng hồ
                $chuoi_moi = rtrim($lstCheckedItem, ",");

                $_lstIdDongHo = explode(",", $chuoi_moi);

                foreach ($_lstIdDongHo as $value) {
                    $sql_update_dongho = "UPDATE tbl_chitietdongho SET IdChiTietPhieuNhap = '$Idchitietphieunhap' WHERE IdDongHo = $value ";
                    $conn->query($sql_update_dongho);
                }

                $response = ["status" => true];
                // Trả về dữ liệu dưới dạng JSON
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
    } else {

        $sql_insert_phieu = "INSERT INTO tbl_phieunhap (SoHieuPhieu , NgayTao , IdUsers ) VALUES ('$MaPhieuNhap','$currentDate','$IdUsers')";
        $statement = $conn->query($sql_insert_phieu);
        if ($statement) {
            $lastInsertId = $conn->insert_id;

            $sql_insert_ctphieu = "INSERT INTO tbl_chitietphieunhap (MaPhieuNhap , SoluongNhap , SoLuongBan ,IdPhieu ) VALUES ('$MaPhieuNhap','$SoluongNhap',0 ,'$lastInsertId')";
            if ($conn->query($sql_insert_ctphieu) === TRUE) {

                $Idchitietphieunhap = $conn->insert_id;

                // Lưu bảng chi tiết đồng hồ
                // Tách đồng hồ
                $chuoi_moi = rtrim($lstCheckedItem, ",");

                $_lstIdDongHo = explode(",", $chuoi_moi);

                foreach ($_lstIdDongHo as $value) {
                    $sql_update_dongho = "UPDATE tbl_chitietdongho SET IdChiTietPhieuNhap = '$Idchitietphieunhap' WHERE IdDongHo = $value ";
                    $conn->query($sql_update_dongho);
                }

                $response = ["status" => true];
                // Trả về dữ liệu dưới dạng JSON
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        } else {
            $response = ["status" => false];
            // Trả về dữ liệu dưới dạng JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

}

$db->closeDatabase();
