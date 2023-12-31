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
        $GiaMua =  $jsonData->GiaMua;
        $GiaBan = $jsonData->GiaBan;
        $GiamGia = $jsonData->GiamGia;
        $ChongNuoc = $jsonData->ChongNuoc == "1" ? 1 : 0;
        $ThuongHieu = $jsonData->ThuongHieu;
        $MaDongHo = $jsonData->MaDongHo;
        $response = [];


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


            $sql = "UPDATE tbl_dongho SET TenDongHo=?,MaDongHo=?,ThuongHieu=?,NamNu=?, KieuDang=?, GiaMua=?, GiaBan=?
            , LoaiDay=?, GiamGia=?,Url_anh=?, FileName=? , ChongNuoc=?
            WHERE IdDongHo =? ";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param(
                "ssssssssssss" . "s",
                $TenDongHo,
                $MaDongHo,
                $ThuongHieu,
                $NamNu,
                $KieuDang,
                $GiaMua,
                $GiaBan,
                $LoaiDay,
                $GiamGia,
                $filePath,
                $fileName,
                $ChongNuoc,
                $IdDongHo,
            );

            if ($stmt->execute()) {
                move_uploaded_file($file['tmp_name'][0], $filePath);
                $response["status"] = true;
            } else {
                $response["status"] = false;
            }

            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        } else {
            $sql = "UPDATE tbl_dongho SET TenDongHo=?,MaDongHo=?,ThuongHieu=?,NamNu=?, KieuDang=?, GiaMua=?, GiaBan=?
            , LoaiDay=?, GiamGia=? , ChongNuoc=?
            WHERE IdDongHo =? ";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param(
                "ssssssssss" . "s",
                $TenDongHo,
                $MaDongHo,
                $ThuongHieu,
                $NamNu,
                $KieuDang,
                $GiaMua,
                $GiaBan,
                $LoaiDay,
                $GiamGia,
                $ChongNuoc,
                $IdDongHo,
            );
            $response = [];
            if ($stmt->execute()) {
                $response["status"] = true;
            } else {
                $response["status"] = false;
            }

            echo json_encode($response);
            header('Content-Type: application/json');
            exit;
        }
    }


    $db->closeDatabase();
