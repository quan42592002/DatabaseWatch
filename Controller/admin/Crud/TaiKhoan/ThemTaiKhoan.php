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

    $ngay_tao = date("Y-m-d H:i:s");
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $error_message = "";  
        // Kiểm tra user_name
    $sql_check_user = "SELECT * FROM tbl_user WHERE Username = '$user_name'";
    $result_user = $conn->query($sql_check_user);
    if ($result_user->num_rows > 0) {
        $error_message = "Tên đăng nhập đã được sử dụng! <br>";
    }
    // Kiểm tra email
    $sql_check_email = "SELECT * FROM tbl_user WHERE Email = '$email'";
    $result_email = $conn->query($sql_check_email);

    if ($result_email->num_rows > 0) {
        $error_message .= "Email đã được sử dụng! <br>";
    }

    // Kiểm tra số điện thoại
    $sql_check_phone = "SELECT * FROM tbl_user WHERE SoDienThoai = '$so_dien_thoai'";
    $result_phone = $conn->query($sql_check_phone);

    if ($result_phone->num_rows > 0) {
        $error_message .= "Số điện thoại đã được sử dụng!";
    }

    $validate_sucess = empty($error_message);
    if( $validate_sucess){
        $sql = "INSERT INTO tbl_user(Username, Password, Email, Create_Date, LoaiTaiKhoan, SoDienThoai, DiaChi, TenDayDu) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        try {
                $stmt = $conn->prepare($sql);
                $stmt->bind_param(
                    "ssssssss",
                    $user_name,
                    $hashed_password,
                    $email,
                    $ngay_tao,
                    $loai_tai_khoan,
                    $so_dien_thoai,
                    $dia_chi,
                    $ten_day_du
                );
                //  $stmt->execute();
                // $check_result = $check_stmt->get_result();
                if ($stmt->execute()) {
                    header('Location: http://localhost:3000/main.php?controller=TaiKhoanController&success=' .urlencode("Thêm tài khoản thành công"));
                } else {
                    header('Location: http://localhost:3000/main.php?controller=TaiKhoanController&&action=ThemTaiKhoan');
                }
            }catch(PDOException $e) {
                echo "Đã xảy ra lỗi"
                        .$e->getMessage();
            }        
        }
    else {
        header('Location: http://localhost:3000/main.php?controller=TaiKhoanController&&action=ThemTaiKhoan&exit=' .urlencode($error_message));
    }
}

$db->closeDatabase();


