
<?php
include __DIR__ . '../../Modal/Helper/GetUser.php';
include __DIR__ . '../../Modal/Database.php';
session_start();

class LoginController
{

    public function Login()
    {
        try {
            // Gọi đến kết nối mysql
            $db = new Database;
            $db->connect();
            $conect = $db->conn;
            $users = getUsers($conect);;
            // Xử lý gửi form ở đây
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                if ($username == "" && $password == "") {
                    header("Location: http://localhost:3000/main.php?username=&&password=");
                    exit();
                } else if ($username == "") {
                    header("Location: http://localhost:3000/main.php?username=");
                    exit();
                } else if ($password == "") {
                    header("Location: http://localhost:3000/main.php?password=");
                    exit();
                } else {
                    foreach ($users as $key) {
                        if ($key->Username == $username && $key->Password == $password) {
                            $_SESSION['username'] = $username;
                            // Đăng nhập thành công
                            header("Location: http://localhost:3000/main.php");
                            exit();
                        } else {
                            header("Location: http://localhost:3000/main.php?message='error'");
                            exit();
                        }
                    }
                }
            }
        } catch (\Exception $th) {
            //throw $th;
        }
    }
}

// Tạo một đối tượng của controller
$loginController = new LoginController();

// Gọi phương thức Login nếu form được gửi đi
$loginController->Login();
?>