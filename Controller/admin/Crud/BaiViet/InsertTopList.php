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
    $TrangThai=$_POST['TrangThai'] = false ? 0 : 1 ;
    $IsBaiVietChinh=$_POST['IsBaiVietChinh'] = false ? 0 : 1 ;
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
            $sql = "INSERT INTO  tbl_baivietnoibat(TieuDe, NoiDung, CreateDate,NguoiTao,UrlAnh,FileName,TrangThai,IsBaiVietChinh) VALUES (?, ?, ?,?,?, ?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssss", $TieuDe, $NoiDung, $CreateDate, $NguoiTao,$filePath,$filePath ,$TrangThai,$IsBaiVietChinh);

            if ($stmt->execute()) {
                $IdTopList = $conn->insert_id;

                $sql_insert_baiviet =  "INSERT INTO tbl_baiviet (IdTopList) VALUES ($IdTopList)";
                if ($conn->query($sql_insert_baiviet) === TRUE) {
                    $response = ["status" => true];
                }
            } else {
                $response = ["status" => false];
            }
        } 
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
