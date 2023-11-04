<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = '../../../../UpLoad/DongHo/DongHoStore';

    $IdDongHo = $_POST['IdDongHo'];

    if (isset($_FILES['duong_dan_tai_lieu2'])) {
        $files = $_FILES['duong_dan_tai_lieu2'];

        foreach ($files['tmp_name'] as $key => $tmp_name) {
            if ($files['error'][$key] === UPLOAD_ERR_OK) {
                $fileName = time() . '_' . $files['name'][$key];
                $filePath = $uploadDir . '/' . $fileName; // tạo đường dẫn

                // Kiểm tra xem tập tin đã tồn tại chưa
                if (file_exists($filePath)) {
                    echo "Tập tin đã tồn tại.";
                    continue; // Bỏ qua tệp này và tiếp tục vòng lặp
                }

                // Di chuyển tệp lên máy chủ
                if (move_uploaded_file($tmp_name, $filePath)) {
                    // Tải lên thành công, bạn có thể thực hiện các thao tác khác ở đây
                    // Ví dụ: thực hiện truy vấn SQL và lưu thông tin tệp vào cơ sở dữ liệu
                    $sql = "INSERT INTO tbl_storeupload (UrlFile,NameFile,IdDongHo) VALUES (?,?,?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sss", $filePath,$fileName,$IdDongHo);
                    if ($stmt->execute()) {
                        header('Content-Type: application/json');
                        echo json_encode(array(
                            "status" => true
                        ));
                    }
                } else {
                    echo "Lỗi khi tải lên tệp.";
                }
            }
        }
    }
}

$db->closeDatabase();
