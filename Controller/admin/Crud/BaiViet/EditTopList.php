<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $TieuDe = $_POST['TieuDe'];
    $NoiDung=$_POST['NoiDung'];
    $CreateDate=$_POST['CreateDate'];
    $NguoiTao=$_POST['NguoiTao'];
    $TrangThai = ($_POST['TrangThai'] == 'false') ? 0 : 1;
    $IdTopList=(int)$_POST['IdTopList'];
    $response = [];

    
    $uploadDir = '../../../../UpLoad/Admin/TopList/'; 
    $file = $_FILES['duong_dan_tai_lieu'];

    if ($file['error'][0] === UPLOAD_ERR_OK) {
        $fileName = time() . '_' . $file['name'][0];
        $filePath = $uploadDir . $fileName; 

        if (file_exists($filePath)) {
            echo "Tập tin đã tồn tại.";
            $uploadOk = 0;
        }
        
        if (move_uploaded_file($file['tmp_name'][0], $filePath)) {
            $sql = "UPDATE  tbl_baivietnoibat SET TieuDe=?, NoiDung=?, CreateDate=?,NguoiTao=?,UrlAnh=?,FileName=?,TrangThai=? WHERE IdTopList=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssss", $TieuDe, $NoiDung, $CreateDate, $NguoiTao,$filePath,$filePath ,$TrangThai,$IdTopList);
            if ($stmt->execute()) {
                $response = ["status" => true];
            } else {
                $response = ["status" => false];
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        } 
    }else{
        $sql = "UPDATE  tbl_baivietnoibat SET TieuDe=?, NoiDung=?, CreateDate=?,NguoiTao=?,TrangThai=? WHERE IdTopList=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $TieuDe, $NoiDung, $CreateDate, $NguoiTao,$TrangThai,$IdTopList);
        if ($stmt->execute()) {
            $response = ["status" => true];
        } else {
            $response = ["status" => false];
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
   

}