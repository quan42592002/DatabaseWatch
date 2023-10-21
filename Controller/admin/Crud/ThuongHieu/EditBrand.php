<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;

// Kiểm tra xem kết nối đã thành công hay không
if (!$conn) {
    $response = ["status" => false];
    echo json_encode($response);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $SoThuTu = $_POST['SoThuTu'];
    $TenGoi = $_POST['TenGoi'];
    $IdThuongHieu = (int)$_POST['IdThuongHieu'];

    $uploadDir = '../../../../UpLoad/ThuongHieu/'; // Thư mục lưu trữ tệp ảnh trên máy chủ
    $file = $_FILES['duong_dan_tai_lieu'];

    if ($file['error'][0] === UPLOAD_ERR_OK) {
        $fileName = time() . '_' . $file['name'][0];
        $filePath = $uploadDir . $fileName; // tạo đường dẫn

        // Kiểm tra xem tập tin đã tồn tại chưa
        if (file_exists($filePath)) {
            echo "Tập tin đã tồn tại.";
            $uploadOk = 0;
        }

        if (move_uploaded_file($file['tmp_name'][0], $filePath)) {
            $sql = "UPDATE tbl_thuonghieu SET TenGoi=?, UrlAnh=?, FileName=?, Stt=? WHERE IdThuongHieu =? ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss" . "s", $TenGoi, $filePath, $fileName, $SoThuTu,$IdThuongHieu);

            if ($stmt->execute()) {
                $response = ["status" => true];
            } else {
                $response = ["status" => false];
            }
        } else {
            $response = ["status" => false];
        }
    } else {
        $sql = "UPDATE tbl_thuonghieu SET TenGoi=?, Stt=? WHERE IdThuongHieu =? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss" . "s", $TenGoi, $SoThuTu,$IdThuongHieu);

        if ($stmt->execute()) {
            $response = ["status" => true];
        } else {
            $response = ["status" => false];
        }
    }

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

$db->closeDatabase();
