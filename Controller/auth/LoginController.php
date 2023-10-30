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

     
            $sql = "SELECT tbl_user.IdUsers, tbl_user.Username, tbl_user.Password , tbl_userrole.IdRole 
            FROM tbl_user INNER JOIN tbl_userrole ON tbl_user.IdUsers = tbl_userrole.IdUsers
            WHERE tbl_user.Username = '$username' AND tbl_user.Password = '$password'";

            $result = $conect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $roleUser = new SetUser();
                    $roleUser->setUser($row["IdUsers"], $row["Username"], $row["Password"],null,null,null,null,null,null, $row["IdRole"]);
                    $_SESSION['Username'] = $roleUser->Username;
                    $_SESSION['IdRole'] = $roleUser->IdRole;
                    echo '<script>window.location.href="http://localhost:3000/main.php";</script>';
                    exit;
                }
            }else{
                $_SESSION['error'] = "Tài khoản hoặc mật khẩu không chính xác";
            }
    
           
        } catch (\Throwable $th) {
            //throw $th;
        }

       
    }
}


?>