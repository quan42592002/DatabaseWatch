
<?php

class LoginController
{
    public function Login()
    {
        try {
            // Xử lý gửi form ở đây
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                if ($username == "" && $password == "") {
                   header("Location: http://localhost:3000/main.php?username=&&password=");
                   exit();
                }else if ($username == "" ) {
                    header("Location: http://localhost:3000/main.php?username=");
                   exit();
                }else if ( $password == "") {
                    header("Location: http://localhost:3000/main.php?password=");
                    exit();
                }

                // Chuyển hướng hoặc hiển thị thông báo thành công
                header("Location: http://localhost:3000/main.php");
                exit();
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