<div class="login" style="margin-top: 40px;">
    <img class="site-icon " src="https://cdn.tgdd.vn/2022/10/banner/TGDD-540x270.png">
    <form action="http://localhost:3000/Controller/LoginController.php/Login" method="post" class="form-login" style="width: 30%;">
        <div class="card" style="margin-left:0 ;margin-bottom: 0;">
            <div class="card-header" style="background: cadetblue;">
                <h3 style="color: white;">Đăng nhập</h3>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET["message"])) {
                    echo "<bold style='color: red;
                    text-align: center;
                    display: block;
                    padding: 9px;'>Tài khoản hoặc mật khẩu không chính xác</bold>";
                } else {
                    echo "";
                }
                ?>
                <div class="form-group p-1">
                    <label for="" class="form-label">Tài khoản</label>
                    <input type="text" class="form-control" name="username">
                    <?php
                    if (isset($_GET["username"])) {
                        echo "<small style='color:red'>Tài khoản không được để trống</small>";
                    } else {
                        echo "";
                    }
                    ?>
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password">
                    <?php
                    if (isset($_GET["password"])) {
                        echo "<small style='color:red'>Mật khẩu không được để trống</small>";
                    } else {
                        echo "";
                    }
                    ?>
                </div>
                <div class="form-group p-1">
                    <button class="btn btn-primary" style="display: flex;">Đăng nhập</button>
                    <div class="foget-login"><a href="">Quên mật khẩu ?</a></div>
                </div>
            </div>
        </div>
    </form>
</div>