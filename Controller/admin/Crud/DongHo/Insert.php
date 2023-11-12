<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $jsonStr = $_POST['strJson'];
    $jsonData = json_decode($jsonStr);

    $IdDongHo = $jsonData->IdDongHo;
    $TenDongHo = $jsonData->TenDongHo;
    $NamNu = $jsonData->NamNu;
    $SoLuong = $jsonData->SoLuong;
    $KieuDang = $jsonData->KieuDang;
    $LoaiDay = $jsonData->LoaiDay;
    $GiaMua = $jsonData->GiaMua;
    $GiaBan = $jsonData->GiaBan;
    $GiamGia = $jsonData->GiamGia;
    $ChongNuoc = $jsonData->ChongNuoc == "1" ? 1 : 0;
    $ThuongHieu = $jsonData->ThuongHieu;
    $MaDongHo = $jsonData->MaDongHo;

    $uploadDir = '../../../../UpLoad/DongHo/'; // Thư mục lưu trữ tệp ảnh trên máy chủ
    $file = $_FILES['duong_dan_tai_lieu'];

    if ($file['error'][0] === UPLOAD_ERR_OK) {
        $fileName = time() . '_' . $file['name'][0];
        $filePath = $uploadDir . $fileName; // tạo đường dẫn

        // Kiểm tra xem tập tin đã tồn tại chưa
        if (file_exists($filePath)) {
            echo "Tập tin đã tồn tại.";
            $uploadOk = 0;
        }

        $sql = "INSERT INTO tbl_dongho (IdDongHo,TenDongHo, MaDongHo,ThuongHieu, NamNu,SoLuong,KieuDang,GiaMua,GiaBan,
        LoaiDay,GiamGia,Url_anh,FileName,ChongNuoc) VALUES (?,?,?, ?, ?,?,?, ?, ?,?,?, ?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssssssss",
            $IdDongHo,
            $TenDongHo,
            $MaDongHo,
            $ThuongHieu,
            $NamNu,
            $SoLuong,
            $KieuDang,
            $GiaMua,
            $GiaBan,
            $LoaiDay,
            $GiamGia,
            $filePath,
            $fileName,
            $ChongNuoc,
        );

        if ($stmt->execute()) {
            move_uploaded_file($file['tmp_name'][0], $filePath);
            $response = ["status" => true];
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = ["status" => false];
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    } else {
        $sql = "INSERT INTO tbl_dongho (TenDongHo,MaDongHo, ThuongHieu, NamNu,SoLuong,KieuDang,GiaMua,GiaBan,
        LoaiDay,GiamGia,ChongNuoc) VALUES (?,?, ?, ?,?,?, ?, ?,?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssssssss",
            $TenDongHo,
            $MaDongHo,
            $ThuongHieu,
            $NamNu,
            $SoLuong,
            $KieuDang,
            $GiaMua,
            $GiaBan,
            $LoaiDay,
            $GiamGia,
            $ChongNuoc,
        );

        if ($stmt->execute()) {
            $response = ["status" => true];
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = ["status" => false];
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

}

$db->closeDatabase();
