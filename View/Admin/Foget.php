<?php  $this->foget();?>

<div class="login" style="margin-top: 40px;">
    <img class="site-icon " src="http://localhost:3000/UpLoad/Public/Login.jpg"  width="580px">
    <form action="" method="post" class="form-login" style="width: 30%;">
        <div class="card" style="margin-left:0 ;margin-bottom: 0;">
            <div class="card-header" style="background: #f1f3f4;">
                <h3 style="color: #826c6c;">Khôi phục tài khoản</h3>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "<bold style='color: red;
                    text-align: center;
                    display: block;
                    padding: 9px;'>" . $_SESSION['error'] . "</bold>";
                    $_SESSION['error'] = null;
                } else {
                    echo "";
                }
                ?>
                <div class="form-group p-1">
                    <label for="" class="form-label">Tên tài khoản:</label>
                    <input type="text" class="form-control" name="user_name" placeholder="Nhập tên tài khoản khôi phục">
                </div>
                <div class="form-group p-1">
                    <button class="btn btn-primary" style="display: flex;">Yêu cầu khôi phục</button>
                </div>
            </div>
        </div>
    </form>
</div>