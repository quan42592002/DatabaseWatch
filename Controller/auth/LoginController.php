<?php
include __DIR__ . '../../../Modal/Helper/SetUser.php';
include __DIR__ . '../../../Modal/Database.php';
// Gọi đến kết nối mysql
class LoginController
{

    public function __construct()
    {
        require('View/Admin/Login.php');
    }

    public function Login($username, $password)
    {
        $db = new Database;
        $db->connect();
        $conect = $db->conn;

        try {
            // thực hiện câu truy vấn an toàn
            $username = $conect->real_escape_string($username);
            $password = $conect->real_escape_string($password);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "SELECT tbl_user.IdUsers, tbl_user.Username, tbl_user.Password , tbl_user.LoaiTaiKhoan ,tbl_user.TenDayDu
            FROM tbl_user 
            WHERE tbl_user.Username = '$username' ";
            $result = $conect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if (password_verify($password, $row['Password'])) {
                        $_SESSION['Username'] = $row['Username'];
                        $_SESSION['IdUsers'] = $row['IdUsers'];
                        $_SESSION['HoTen'] = $row['TenDayDu'];
                        $_SESSION['IdRole'] = $row['LoaiTaiKhoan'];
                        echo '<script>window.location.href="http://localhost:3000/main.php";</script>';
                        exit;
                    } else {
                        $_SESSION['error'] = "Mật khẩu không chính xác";
                    }
                }
            } else {
                $_SESSION['error'] = "Tài khoản không chính xác";
            }
        } catch (\Throwable $th) {
            //throw $th;    
        }
    }
}
