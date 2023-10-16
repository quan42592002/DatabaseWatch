<?php
// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "" && $password == "") {
        $_SESSION['error'] = "Tài khoản & mật khẩu không được để chống";
    } else if ($username == "") {
        $_SESSION['error'] = "Tài khoản không được để chống";
    } else if ($password == "") {
        $_SESSION['error'] = "Mật khẩu không được để chống";
    } else {
        $_SESSION['error'] = null;
        $result = $this->Login($username, $password);
        // if ($result->num_rows > 0) {
        //     while ($row = $result->fetch_assoc()) {
        //         $roleUser = new SetUser();
        //         $roleUser->setUser($row["IdUsers"], $row["Username"], $row["Password"]);
        //     }
        // }
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
}

?>

<div class="login" style="margin-top: 40px;">
    <img class="site-icon " src="https://cdn.tgdd.vn/2022/10/banner/TGDD-540x270.png">
    <form action="" method="post" class="form-login" style="width: 30%;">
        <div class="card" style="margin-left:0 ;margin-bottom: 0;">
            <div class="card-header" style="background: cadetblue;">
                <h3 style="color: white;">Đăng nhập</h3>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "<bold style='color: red;
                    text-align: center;
                    display: block;
                    padding: 9px;'>".$_SESSION['error']."</bold>";
                    $_SESSION['error'] = null;
                } else {
                    echo "";
                }
                ?>
                <div class="form-group p-1">
                    <label for="" class="form-label">Tài khoản</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group p-1">
                    <button class="btn btn-primary" style="display: flex;">Đăng nhập</button>
                    <div class="foget-login"><a href="?controller=FogetController">Quên mật khẩu ?</a></div>
                </div>
            </div>
        </div>
    </form>
</div>