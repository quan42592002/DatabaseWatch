<?php
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
            $username = $conect->real_escape_string($username);
            $password = $conect->real_escape_string($password);
            $sql = "SELECT *
            FROM tbl_user 
            WHERE tbl_user.Username = '$username' ";
            $result = $conect->query($sql);
            

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                 $count = $row['CountPassworld'];
                    if($row['TrangThai'] == 1){
                        if (password_verify($password, $row['Password'])) {
                            $_SESSION['Username'] = $row['Username'];
                            $_SESSION['IdUsers'] = $row['IdUsers'];
                            $_SESSION['TenDayDu'] = $row['TenDayDu'];
                            $_SESSION['LoaiTaiKhoan'] = $row['LoaiTaiKhoan'];
                            $sqll = "UPDATE tbl_user SET  CountPassworld = 0 WHERE Username = ?";
                            $count = 0;
                            $stmt = $conect->prepare($sqll);
                            $stmt->bind_param(
                                "s",
                                $username
                            );
                            $stmt->execute();
                            echo '<script>window.location.href="http://localhost:3000/main.php";</script>';
                            exit;
                        } else {
                            $count += 1; 
                            $sqll = "UPDATE tbl_user SET  CountPassworld = ? WHERE Username = ?";
                            $stmt = $conect->prepare($sqll);
                            $stmt->bind_param(
                                "ss",
                                $count,
                                $username
                            );
                            $stmt->execute();
                            $_SESSION['error'] = "Mật khẩu không chính xác, bạn còn ". (3- $count) ." lần nhập";
                            if($count == 2) {
                                $sqlll = "UPDATE tbl_user SET  TrangThai = 0 WHERE Username = ?";
                                $stmtt = $conect->prepare($sqlll);
                                $stmtt->bind_param(
                                    "s",
                                    $username
                                );
                                $stmtt->execute();
                            }
                           
                            // $_SESSION["error"] = "Tài khoản đang bị khoá";
                        }
                    }
                    else{
                        $_SESSION["error"] = "Tài khoản đang bị khoá, vui lòng liên hệ admin email:admin@gmail.com để mở khoá ";
                    }
            } else {
                $_SESSION['error'] = "Tài khoản không chính xác";
            }
        } catch (Throwable $th) {
            //throw $th;    
        }
        $db->closeDatabase();
    }
}
