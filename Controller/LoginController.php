
<?php
include __DIR__ . '../../Modal/Helper/GetUser.php';
include __DIR__ . '../../Modal/Helper/SetUser.php';
include __DIR__ . '../../Modal/Database.php';
session_start();
// Gọi đến kết nối mysql
class LoginController
{

    public function Login()
    {
        try {
            $db = new Database;
            $db->connect();
            $conect = $db->conn;
            // Xử lý gửi form ở đây
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                $sql = "SELECT IdUsers, Username, Password FROM tbl_user 
                WHERE tbl_user.Username = $username AND tbl_user.Password = $password ";
                $result = $conect->query($sql);

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
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $roleUser = new SetUser();
                            $roleUser->setUser($row["IdUsers"], $row["Username"], $row["Password"]);
                        }
                    }
                    
                    // foreach ($users as $key) {
                    //     if ($key->Username == $username && $key->Password == $password) {
                    //         $_SESSION['username'] = $username;
                    //         // Đăng nhập thành công
                    //         header("Location: http://localhost:3000/main.php");
                    //         exit();
                    //     } else {
                    //         header("Location: http://localhost:3000/main.php?message='error'");
                    //         exit();
                    //     }
                    // }
                }
                $db->closeDatabase();
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