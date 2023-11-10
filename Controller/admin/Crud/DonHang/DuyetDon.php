<?php
include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $IdUsers = $_POST['IdUsers'];
    $currentDate = date("Y-m-d");
    $soNamSau = 1;
    $ngayHienTai = new DateTime();
    $soNamSau = 2;
    $ngaySau = $ngayHienTai->modify("+$soNamSau year");
    $oneYearDate = $ngaySau->format('Y-m-d');
    $TongTien = 0;
    $SoLuongDonDat = 0;

    $sql_gio_hang = "SELECT  tbl_chitietdongho.*,tbl_dongho.*
    FROM tbl_giohang
    Join tbl_user ON tbl_giohang.IdUsers = tbl_user.IdUsers
    Join tbl_chitietdongho ON tbl_chitietdongho.IdChiTietDongHo = tbl_giohang.IdChiTietDongHo
    Join tbl_dongho ON tbl_chitietdongho.IdDongHo = tbl_dongho.IdDongHo
    Where ( tbl_giohang.TrangThai = false ) AND (tbl_giohang.IdUsers = '$IdUsers')
            ";

    $result_giohang = $conn->query($sql_gio_hang);
    $SoLuongDonDat = $result_giohang->num_rows;
    if ($SoLuongDonDat > 0) {
        while ($row = $result_giohang->fetch_assoc()) {
            $TongTien += $row['GiaBan'];
        }
    }

    $sql_check = "SELECT * FROM db_dongho.tbl_dondat 
    WHERE tbl_dondat.IdUsers = $IdUsers";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // while ($row = $result->fetch_assoc()) {
        //     $lastInsertId = $row['IdPhieu'];

        //     $sql_insert_ctphieu = "INSERT INTO tbl_chitietphieunhap (MaPhieuNhap , SoluongNhap , SoLuongBan ,IdPhieu ) VALUES ('$MaPhieuNhap','$SoluongNhap',0 ,'$lastInsertId')";
        //     if ($conn->query($sql_insert_ctphieu) === TRUE) {

        //         $Idchitietphieunhap = $conn->insert_id;

        //         // Lưu bảng chi tiết đồng hồ
        //         // Tách đồng hồ
        //         $chuoi_moi = rtrim($lstCheckedItem, ",");

        //         $_lstIdDongHo = explode(",", $chuoi_moi);

        //         foreach ($_lstIdDongHo as $value) {
        //             $sql_update_dongho = "UPDATE tbl_chitietdongho SET IdChiTietPhieuNhap = '$Idchitietphieunhap' WHERE IdDongHo = $value ";
        //             $conn->query($sql_update_dongho);
        //         }

        //         $response = ["status" => true];
        //         // Trả về dữ liệu dưới dạng JSON
        //         header('Content-Type: application/json');
        //         echo json_encode($response);
        //     }
        // }
    } else {

        $sql_insert_dondat = "INSERT INTO tbl_dondat (ThoiGian , LanDat,TongTien , IdUsers ) VALUES ('$currentDate',1,'$TongTien','$IdUsers')";
        $statement = $conn->query($sql_insert_dondat);

        if ($statement) {
            $IdDonDatNew = $conn->insert_id;

            $sql_insert_ctdondat = "INSERT INTO tbl_chitietdondat (SoLuong , IdDonDat ) VALUES ('$SoLuongDonDat','$IdDonDatNew')";
            if ($conn->query($sql_insert_ctdondat) === TRUE) {

                $IdChiTietDonDat = $conn->insert_id;

                if ($SoLuongDonDat > 0) {
                    $result_giohang_x = $conn->query($sql_gio_hang);

                    while ($rowx = $result_giohang_x->fetch_assoc()) {
                        $IdChiTietDongHo = $rowx['IdChiTietDongHo'];
                        $sql_update_dongho = "UPDATE tbl_chitietdongho SET IdChiTietDonDat = '$IdChiTietDonDat', NgayBaoHanhTu = '$currentDate' , NgayBaoHanhDen = '$oneYearDate' WHERE tbl_chitietdongho.IdChiTietDongHo = $IdChiTietDongHo";
                        $conn->query($sql_update_dongho);
                    }
                    $sql_update_giohang = "UPDATE tbl_giohang SET TrangThai = true WHERE tbl_giohang.IdUsers = $IdUsers";
                    $conn->query($sql_update_giohang);
                }

                $response = ["status" => true];
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        } else {
            $response = ["status" => false];
            // Trả về dữ liệu dưới dạng JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}

$db->closeDatabase();
