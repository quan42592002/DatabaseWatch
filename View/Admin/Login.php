<?php
// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "" && $password == "") {
        $_SESSION['error'] = "Tài khoản & mật khẩu không được để trống";
    } else if ($username == "") {
        $_SESSION['error'] = "Tài khoản không được để trống";
    } else if ($password == "") {
        $_SESSION['error'] = "Mật khẩu không được để trống";
    } else {
        $_SESSION['error'] = null;
        $this->Login($username, $password);
    }
}
?>

<div class="login" style="margin-top: 40px;">
    <img class="site-icon " src="http://localhost:3000/UpLoad/Public/Login.jpg" width="580px">
    <form action="" method="post" class="form-login" style="width: 30%;">
        <div class="card" style="margin-left:0 ;margin-bottom: 0;">
            <div class="card-header" style="background: #f1f3f4;">
                <h3 style="color: #826c6c;">Đăng nhập</h3>
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
                 <h3 class="message-done text-center">
                  <?php
                   if (isset($_GET['success'])) {
                          echo urldecode($_GET['success']);
                      }
                  ?>
                 </h3>
                <div class="form-group p-1">
                    <label for="" class="form-label">Tài khoản</label>
                    <input type="text" class="form-control" name="username" placeholder="Nhập tài khoản ...">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password"  placeholder="Nhập mật khẩu ...">
                </div>
                <div class="form-group p-1">
                    <button class="btn btn-primary" style="display: flex;">Đăng nhập</button>
                    <div class="foget-login"><a href="?controller=FogetController">Quên mật khẩu ?</a></div>
                </div>
                <p style="text-align: center;">Nếu bạn chưa có tài khoản, vui lòng <a href="?controller=RegisterController">Đăng ký</a> </p>
            </div>
        </div>
    </form>
</div>
<style>
     .message-done {
        color: #00b894;
        font-size: 14px;
        text-align: center;
        margin-bottom: 0;
        padding: 5px;

    }
</style>