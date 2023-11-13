<style>
    .error-message {
        color: #ff7675;
        font-size: 12px;
        text-align: left;

    }
    .text-center {
        font-size: 14px !important;
        padding: 5px;
        text-align: center;
        margin-bottom: 0;
    }

    .p-1 {
        padding: 15px 15px 0px;
    }
</style>
<?php
    if (isset($data['item_user'])) {
        $item_user = $data['item_user'];
        $TenDayDu = $item_user['TenDayDu'];
        $Username = $item_user['Username'];
        $Email = $item_user['Email'];
        $DiaChi = $item_user['DiaChi'];
        $SoDienThoai = $item_user['SoDienThoai'];
        $LoaiTaiKhoan = $item_user['LoaiTaiKhoan'];
        $id = $item_user['IdUsers'];
        $status = $item_user['TrangThai'];
        $maPin = $item_user['MaPin'];
        $cauHoiBaoMat = $item_user['CauHoiBaoMat'];
        $cauTraLoi = $item_user['CauTraLoi'];
    } else {
        $TenDayDu = "";
        $Username = "";
        $Email = "";
        $DiaChi = "";
        $SoDienThoai = "";
        $LoaiTaiKhoan = "";
        $id = 0;
        $status = 1;
    }
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $this->Detail();
}
?>
<div class="login" style="margin-top: 40px;">
    <img class="site-icon " src="http://localhost:3000/UpLoad/Public/Login.jpg" width="580px">
    <form action="" method="post" class="form-login" style="width: 30%;" onsubmit="return validateForm(event)">
        <div class="card" style="margin-left:0 ;margin-bottom: 0;">
            <div class="card-header" style="background: #f1f3f4;">
                <h3 style="color: #826c6c;">Chi tiết tài khoản</h3>
            </div>
            <div class="card-body">
            <h3 class="error-message text-center">
            <?php
            if (isset($_GET['exit'])) {
                echo urldecode($_GET['exit']);
            }
            ?>
             </h3>
             <h3 class="message-done text-center">
            <?php
            if (isset($_GET['success'])) {
                echo urldecode($_GET['success']);
            }
            ?>
        </h3>
                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="FullName" class="input-label">
                        Họ và tên <span style="color:red;">*</span>
                    </label>
                    <input type="text" class="form-control " disabled name="ten_day_du" id="FullName"
                        placeholder="Nhập họ tên ..." value="<?php echo  $TenDayDu ?>">
                    <p class="error-message" id="FullNameError" style="padding: 0px;"></p>
                </div>
                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="user_name" class="input-label">
                        Tài khoản <span style="color:red;">*</span>
                    </label>
                    <input type="text" class="form-control" disabled name="user_name" value="<?php echo  $Username ?>" id="UserName" autocomplete="off"
                        placeholder="Nhập tài khoản ...">
                    <p class="error-message" id="userNameError"></p>
                </div>
                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="mat_khau" class="input-label">
                        Mật khẩu <span style="color:red;">*</span>
                    </label>
                    <div style="position: relative;">
                        <input type="password" disabled class="form-control form-control-lg" name="mat_khau" id="Password"
                            autocomplete="off" placeholder="Nếu không đổi mật khẩu thì không cần nhập trường này ...">
                        <button
                            style="position: absolute; right: 0; top: 50%; transform: translateY(-50%); color:#D0CFCF; font-size:18px; border:none; background-color:#fff;"
                            type="button" id="togglePassword" class="toggle-password"
                            onclick="togglePasswordVisibility('Password', 'togglePassword')">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    <p class="error-message" id="passwordError"></p>
                </div>
                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="xac_nhan_mat_khau" class="input-label">
                        <i class="mdi mdi-lock" style="color:#D0CFCF; font-size:18px;"></i>
                        Mật khẩu xác nhận <span style="color:red;">*</span>
                    </label>
                    <div style="position: relative;">
                        <input type="password" disabled class="form-control form-control-lg" name="xac_nhan_mat_khau"
                            id="Password1" autocomplete="off" placeholder="Nếu không đổi mật khẩu thì không cần nhập trường này ...">
                        <button
                            style="position: absolute; right: 0; top: 50%; transform: translateY(-50%); color:#D0CFCF; font-size:18px; border:none; background-color:#fff;"
                            type="button" id="togglePassword1" class="toggle-password"
                            onclick="togglePasswordVisibility('Password1', 'togglePassword1')">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    <p class="error-message" id="confirmPasswordError"></p>
                </div>
                <p class="error-message" id="confirmPasswordError"></p>
                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="email" class="input-label">
                        Email
                    </label>
                    <input type="text" disabled class="form-control form-control-lg" name="email" id="Email"
                        placeholder="..." value="<?php echo  $Email ?>">
                    <p class="error-message" id="emailError">
                    </p>
                </div>

                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="so_dien_thoai" class="input-label">
                        Số điện thoại
                    </label>
                    <input type="text" disabled class="form-control form-control-lg" name="so_dien_thoai" id="PhoneNumber"
                        placeholder="..."  maxlength="10" value="<?php echo  $SoDienThoai ?>">
                    <p class="error-message" id="phoneError"> </p>
                </div>

                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="dia_chi" class="input-label">
                        Địa chỉ
                    </label>
                    <input type="text" disabled class="form-control form-control-lg" name="dia_chi" id="Address"
                        placeholder="..." value="<?php echo  $DiaChi ?>">
                </div>
                <div class="form-group p-1" style="padding-top: 10px;">
                    <label for="" class="input-label">
                        Mã pin <span style="color:red;">*</span>
                    </label>
                    <input type="text" disabled class="form-control form-control-lg" name="ma_pin" id="ma_pin" maxlength="6"
                    value="<?php echo  $maPin ?>">
                        <p class="error-message" id="maPinError"> </p>
                </div>
            
                </div>
                <input type="text" hidden name="loai_tai_khoan" value="0">
                <div class="form-group p-1" style="margin-bottom: 10px" >
                    <button id="btn"  class="btn btn-primary" style="display: flex;">Sửa thông tin</button>
                    <button id="btnsubmit"   class="btn btn-primary" style="display: flex; display:none ">Sửa thông tin</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="http://localhost:3000/Assets/admin/js/vldate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>
$(document).ready(function() {
    // Sự kiện khi click vào nút "Sửa thông tin"
    $("#btn").click(function(event) {
         $("input").prop("disabled", false);
        event.preventDefault();
        $("#btn").hide();
         $("#btnsubmit").show();
    });
});
</script>
<style>
    .message-done {
        color: #00b894;
        font-size: 14px;
        text-align: center;
        margin-bottom: 0;
        padding: 5px;

    }
</style>