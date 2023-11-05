<?php
$to = "quan.tm.1954@aptechlearning.edu.vn";
$subject = "Test Email";
$message = "This is a test email sent from PHP";

// Tạo tiêu đề email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

// Địa chỉ người gửi
$headers .= "From: quanlearning.2k2@gmail.com" . "\r\n";

// Gửi email
if (mail($to, $subject, $message, $headers)) {
    $_SESSION['success'] = "Yêu cầu được chấp nhận";
} else {
    echo "Failed to send email.";
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
                    echo "<bold style='color: green;
                    text-align: center;
                    display: block;
                    padding: 9px;'>" . $_SESSION['success'] . "</bold>";
                    $_SESSION['success'] = null;
                }
                ?>
                <div class="form-group p-1">
                    <label for="" class="form-label">Lựa chọn khôi phục:</label>
                    <select name="" id="cbLuaChon" class="form-control" style="margin-top: 8px;" onchange="regesterEvent()">
                        <option value="">-- Lựa chọn khôi phục --</option>
                        <option value="Khôi phục qua Email">Khôi phục qua Email</option>
                        <option value="Khôi phục qua câu hỏi">Khôi phục qua câu hỏi</option>
                        <option value="Khôi phục qua mã pin">Khôi phục qua mã pin</option>
                    </select>
                </div>
                <div class="form-group p-1 show-email">
                    <label for="" class="form-label">Email đăng ký:</label>
                    <input type="text" class="form-control" name="username" placeholder="Nhập email">
                </div>
                <div class="form-group p-1 show-mapin">
                    <label for="" class="form-label">Mã Pin:</label>
                    <input type="text" class="form-control" name="username" placeholder="Nhập mã pin">
                </div>
                <div class="form-group p-1 show-cautraloi">
                    <label for="" class="form-label">Mã hỏi:</label>
                    <select name="" id="" class="form-control" style="margin-top: 8px;">
                        <option value="">-- Lựa chọn câu hỏi --</option>
                    </select>
                </div>
                <div class="form-group p-1 show-cautraloi">
                    <label for="" class="form-label">Câu trả lời:</label>
                    <input type="text" class="form-control" name="username" placeholder="Nhập mã pin">
                </div>
                <div class="form-group p-1">
                    <button class="btn btn-primary" style="display: flex;">Gửi yêu cầu</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function reset() {
        $(".show-email").hide();
        $(".show-mapin").hide();
        $(".show-cautraloi").hide();
    };

    function regesterEvent() {
        var cbLuaChon = $("#cbLuaChon").val();
        reset();
        if (cbLuaChon == "Khôi phục qua Email") {
            $(".show-email").show();
        } else if (cbLuaChon == "Khôi phục qua câu hỏi") {
            $(".show-cautraloi").show();
        } else if (cbLuaChon == "Khôi phục qua mã pin") {
            $(".show-mapin").show();
        }

    };

    reset();
</script>