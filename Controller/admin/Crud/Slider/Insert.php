<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] =='POST') {
    // Lấy dữ liệu từ form

    $name_slider = $_POST['nameSlider'];
    $create_date=$_POST['createdate'];
    $uploadDir = '../../../../UpLoad/Admin/Slider/'; // Thư mục lưu trữ tệp ảnh trên máy chủ
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
            $sql = "INSERT INTO  tbl_slider(NameSlider, CreateDate, UrlSlider,NameFile) VALUES (?, ?, ?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name_slider, $create_date, $filePath, $fileName);

            if ($stmt->execute()) {
                $response = ["status" => true];
            } else {
                $response = ["status" => false];
            }
        } 
        header('Content-Type: application/json');
        echo json_encode($response);
    }
        
    else {

        $sql = "INSERT INTO  tbl_slider(NameSlider, CreateDate) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name_slider, $create_date);


    if ($stmt->execute()) {
        $response = ["status" => true];
    
    }else{
        $response = ["status" => false];
        
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    }

}
?>