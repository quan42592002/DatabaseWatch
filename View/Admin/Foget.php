<?php
include __DIR__ . '../../../Modal/Database.php';
// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    if ($username == "") {
        $_SESSION['error'] = "Tài khoản không được để chống";
    } else {
        $db = new Database();
        $db->connect();
        $conect = $db->conn;

        $username = $_POST['username'];

        $sql = "SELECT tbl_user.IdUsers, tbl_user.Username, tbl_user.Password 
        FROM tbl_user 
        WHERE Username = '$username'";

        $result = $conect->query($sql);

        if ($result->num_rows > 0) {
            echo '<script>window.location.href="?controller=FogetQuestionController";</script>';
            exit;
        } else {
            $_SESSION['error'] = "Tài khoản không tồn tại";
        }

        $db->closeDatabase();
    }
}

?>

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
                    <input type="text" class="form-control" name="username" placeholder="Nhập tên tài khoản khôi phục">
                </div>
                <div class="form-group p-1">
                    <button class="btn btn-primary" style="display: flex;">Yêu cầu khôi phục</button>
                </div>
            </div>
        </div>
    </form>
</div>