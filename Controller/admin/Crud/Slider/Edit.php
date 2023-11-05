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

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name_slider = $_POST['nameSlider'];
    $create_date=$_POST['createdate'];
    $Id_Slider = (int)$_POST['IdSlider'];



    // $sql = "UPDATE slider SET NameSlider = '$name_slider', CreateDate = '$create_date' WHERE IdSlider = $Id_Slider";
    // if ($conn->query($sql) === TRUE) {
    //     $response = ["status" => true,];
    // } else {
    //     $response = ["status" => false,];
    // }

    $uploadDir = '../../../../UpLoad/Slider/'; // Thư mục lưu trữ tệp ảnh trên máy chủ
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
            $sql = "UPDATE slider SET  NameSlider=?, CreateDate=?, UrlSlider=?,NameFile=? WHERE IdSlider =?  ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name_slider, $create_date, $filePath, $fileName,$Id_Slider);
                
            if ($stmt->execute()) {
                $response = ["status" => true];
            } else {
                $response = ["status" => false];
            }
                    // Trả về dữ liệu dưới dạng JSON
              header('Content-Type: application/json');
           echo json_encode($response);
        }
   
     } else {
        $sql = "UPDATE slider SET  NameSlider=?, CreateDate=? WHERE IdSlider =? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name_slider, $create_date,$Id_Slider);

        if ($stmt->execute()) {
            $response = ["status" => true];
        } else {
            $response = ["status" => false];
        }
           // Trả về dữ liệu dưới dạng JSON
      header('Content-Type: application/json');
      echo json_encode($response);
    }
    }
   
