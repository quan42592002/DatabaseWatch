<?php

// include __DIR__ . '../../../../../Modal/Database.php';

// $db = new Database;
// $db->connect();
// $conect = $db->conn;

// // Xử lý dữ liệu ở đây (ví dụ: lấy dữ liệu từ cơ sở dữ liệu)
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Lấy dữ liệu từ form
//     $SoThuTu = $_POST['SoThuTu'];
//     $TenGoi = $_POST['TenGoi'];

//     $uploadDir = 'uploads/'; // Thư mục lưu trữ tệp ảnh trên máy chủ
//     $file = $_FILES['duong_dan_tai_lieu'];

//      // Kiểm tra xem tệp ảnh đã được tải lên thành công
//      if ($file['error'][0] === UPLOAD_ERR_OK) {
//         // Tạo tên tệp mới dựa trên thời gian
//         $fileName = time() . '_' . $file['name'][0];
//         $filePath = $uploadDir . $fileName;

//         // Di chuyển tệp ảnh vào thư mục lưu trữ
//         if (move_uploaded_file($file['tmp_name'][0], $filePath)) {
//             // Thêm thông tin và đường dẫn tệp ảnh vào CSDL
//             $sql = "INSERT INTO ten_bang (SoThuTu, TenGoi, DuongDanAnh) VALUES (?, ?, ?)";
//             $stmt = $conn->prepare($sql);
//             $stmt->bind_param("sss", $soThuTu, $tenGoi, $filePath);

//             if ($stmt->execute()) {
//                 $response = ["status" => true];
//             } else {
//                 $response = ["status" => false];
//             }

//             $stmt->close();
//         } else {
//             $response = ["status" => false];
//         }
//     } else {
//         $response = ["status" => false];
//     }

//     // $sql = "INSERT INTO tbl_thuonghieu (Stt, TenGoi) VALUES ('$SoThuTu', '$TenGoi')";
//     // $result = $conect->query($sql);

//     // $data = array(
//     //     'SoThuTu' =>  $SoThuTu,
//     //     'TenGoi' => $TenGoi,
//     //     'status' => true,
//     // );

//     // Trả về dữ liệu dưới dạng JSON
//     header('Content-Type: application/json');
//     echo json_encode($data);
// }

// $db->closeDatabase();


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

// Xử lý dữ liệu ở đây (ví dụ: lấy dữ liệu từ cơ sở dữ liệu)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $SoThuTu = $_POST['SoThuTu'];
    $TenGoi = $_POST['TenGoi'];

    $uploadDir = '../../../../UpLoad/ThuongHieu/'; // Thư mục lưu trữ tệp ảnh trên máy chủ
    $file = $_FILES['duong_dan_tai_lieu'];

    // Kiểm tra xem tệp ảnh đã được tải lên thành công
    if ($file['error'][0] === UPLOAD_ERR_OK) {
        // Tạo tên tệp mới dựa trên thời gian
        $fileName = time() . '_' . $file['name'][0];
        $filePath = $uploadDir . $fileName;

        // Kiểm tra xem tập tin đã tồn tại chưa
        if (file_exists($filePath)) {
            echo "Tập tin đã tồn tại.";
            $uploadOk = 0;
        }

        // Di chuyển tệp ảnh vào thư mục lưu trữ
        if (move_uploaded_file($file['tmp_name'][0], $filePath)) {
            // Thêm thông tin và đường dẫn tệp ảnh vào CSDL
            $sql = "INSERT INTO tbl_thuonghieu (Stt, TenGoi,UrlAnh,FileName) VALUES ('$SoThuTu', '$TenGoi', '$filePath', '$fileName')";
            $result = $conect->query($sql);

            $response = ["status" => true];
        } else {
            $response = ["status" => false];
        }
    } else {
        $response = ["status" => false];
    }

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

$db->closeDatabase();
