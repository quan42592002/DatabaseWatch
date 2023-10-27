<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $IdDongHo = $_POST['IdDongHo'];

    // Truy vấn SQL chỉ lấy các mục cần hiển thị trên trang hiện tại
    $check = "SELECT * FROM tbl_chitietdongho WHERE tbl_chitietdongho.IdDongHo = '$IdDongHo'";

    $resultCheck = $conn->query($check);

    if ($resultCheck->num_rows > 0) {
        $row_last = "SELECT * FROM tbl_chitietdongho WHERE tbl_chitietdongho.IdDongHo = '$IdDongHo' 
        ORDER BY tbl_chitietdongho.IdChiTietDongHo DESC
        LIMIT 1";

        $resultx = $conn->query($row_last);
        if ($resultx->num_rows > 0) {
            while ($row = $resultx->fetch_assoc()) {
                $currentText = $row["Imei"];
                $phan_tach = explode("-", $currentText);

                if (count($phan_tach) > 1) {
                    $so = $phan_tach[count($phan_tach) - 1] + 1;
                    $chuoi_moi = preg_replace("/-\d+$/", "", $row["Imei"]);
                    $ImeiCurrent = $chuoi_moi . "-" . $so;
                    $sql = "INSERT INTO tbl_chitietdongho (IdDongHo , BaoHanh , Imei ) VALUES ($IdDongHo,24,'$ImeiCurrent')";
                    $stmt = $conn->query($sql);

                    if ($stmt == true) {
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
            }
        } else {
            echo "Không tìm thấy bản ghi.";
        }
    } else {
        $sql = "INSERT INTO tbl_chitietdongho (IdDongHo , BaoHanh ) VALUES ($IdDongHo,24)";
        $stmt = $conn->query($sql);

        if ($stmt == true) {
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
}

$db->closeDatabase();
