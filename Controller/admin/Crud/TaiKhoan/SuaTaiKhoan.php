<?php

include __DIR__ . '../../../../../Modal/Database.php';

$db = new Database;
$db->connect();
$conn = $db->conn;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten_day_du = htmlspecialchars($_POST['ten_day_du']);  
    $user_name =  filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mat_khau = htmlspecialchars($_POST['mat_khau']);  
    $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);  
    $so_dien_thoai = htmlspecialchars($_POST['so_dien_thoai']);  
    $dia_chi = htmlspecialchars($_POST['dia_chi']);  
    $loai_tai_khoan = $_POST['loai_tai_khoan'];
    $id_user = $_POST['id_user'];

    $ngay_tao = date("Y-m-d H:i:s");
    $hashed_password = "";
    

    $error_message = "";  
    $sqll = "SELECT * FROM tbl_user WHERE IdUsers = ?";
    $stmt = $conn->prepare($sqll);
    $stmt->bind_param("s", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $item_user = $result->fetch_assoc();

        // Kiểm tra user_name
    $sql_check_user = "SELECT * FROM tbl_user WHERE Username = '$user_name'";
    $result_user = $conn->query($sql_check_user);
    if ($result_user->num_rows > 0 && $user_name != $item_user["Username"]) {
        $error_message = "Tên đăng nhập đã được sử dụng! <br>";
    }
    // Kiểm tra email
    $sql_check_email = "SELECT * FROM tbl_user WHERE Email = '$email'";
    $result_email = $conn->query($sql_check_email);

    if ($result_email->num_rows > 0 && $email != $item_user['Email']) {
        $error_message .= "Email đã được sử dụng! <br>";
    }

    // Kiểm tra số điện thoại
    $sql_check_phone = "SELECT * FROM tbl_user WHERE SoDienThoai = '$so_dien_thoai'";
    $result_phone = $conn->query($sql_check_phone);

    if ($result_phone->num_rows > 0 && $so_dien_thoai != $item_user["SoDienThoai"]) {
        $error_message .= "Số điện thoại đã được sử dụng!";
    }

    $validate_sucess = empty($error_message);
    if( $validate_sucess){
        if(empty($mat_khau)){

            $hashed_password = password_hash($item_user['Password'], PASSWORD_DEFAULT);
        }
        else{
            $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);
        }
        $sql = "UPDATE tbl_user SET Email = ?, LoaiTaiKhoan = ?, SoDienThoai = ?, DiaChi = ?, TenDayDu = ?, Password = ? WHERE IdUsers = ?";
        try {
                $stmt = $conn->prepare($sql);
                $stmt->bind_param(
                    "sssssss",
                    $email,
                    $loai_tai_khoan,
                    $so_dien_thoai,
                    $dia_chi,
                    $ten_day_du,
                    $hashed_password,
                    $id_user
                );
                if ($stmt->execute()) {
                    header('Location: http://localhost:3000/main.php?controller=TaiKhoanController&success=' .urlencode("Sửa tài khoản thành công"));
                } else {
                    header('Location: http://localhost:3000/main.php?controller=TaiKhoanController&&action=SuaTaiKhoan');
                }
            }catch(PDOException $e) {
                echo "Đã xảy ra lỗi"
                        .$e->getMessage();
            }        
        }
    else {
        header('Location: http://localhost:3000/main.php?controller=TaiKhoanController&&action=SuaTaiKhoan&&id='.base64_encode($id_user).'&exit=' .urlencode($error_message));
    }
}

$db->closeDatabase();


