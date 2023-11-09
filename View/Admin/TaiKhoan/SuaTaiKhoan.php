<style>
    .error-message {
        color: #ff7675;
        font-size: 12px;
        text-align: left;

    }
</style>
<?php
if (isset($_GET['exit'])) {
    if (isset($data['item_user'])) {
        $item_user = $data['item_user'];
        $TenDayDu = $item_user['TenDayDu'];
        $Username = $item_user['Username'];
        $Email = $item_user['Email'];
        $DiaChi = $item_user['DiaChi'];
        $SoDienThoai = $item_user['SoDienThoai'];
        $LoaiTaiKhoan = $item_user['LoaiTaiKhoan'];
    } else {
        $TenDayDu = "";
        $Username = "";
        $Email = "";
        $DiaChi = "";
        $SoDienThoai = "";
        $LoaiTaiKhoan = "";
    }
} else {
    if (isset($data['item_user'])) {
        $item_user = $data['item_user'];
        $TenDayDu = $item_user['TenDayDu'];
        $Username = $item_user['Username'];
        $Email = $item_user['Email'];
        $DiaChi = $item_user['DiaChi'];
        $SoDienThoai = $item_user['SoDienThoai'];
        $LoaiTaiKhoan = $item_user['LoaiTaiKhoan'];
        $id = $item_user['IdUsers'];
    } else {
        $TenDayDu = "";
        $Username = "";
        $Email = "";
        $DiaChi = "";
        $SoDienThoai = "";
        $LoaiTaiKhoan = "";
        $id = 0;
    }
}

?>

<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Cập nhật tài khoản</h3>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
            <a class="btn btn-success" href="?controller=TaiKhoanController" style="display: flex;margin: 10px; ">Quay
                lại</a>

        </div>
        <h3 class="error-message text-center">
            <?php
            if (isset($_GET['exit'])) {
                echo urldecode($_GET['exit']);
            }
            ?>
        </h3>
        <div class="card-body p-2" style="padding-top: 0;">
            <form method="post" action="http://localhost:3000/Controller/admin/Crud/TaiKhoan/SuaTaiKhoan.php" onsubmit="return validateForm(event)">
                <input type="id" value="<?php echo  $id ?>" name="id_user" hidden>
                <label for="FullName" class="input-label" >
                    Họ và tên
                </label>
                <input type="text" class="form-control form-control-lg" name="ten_day_du" id="FullName" value="<?php echo $TenDayDu; ?>" required>
                <label for="user_name" class="input-label" >
                    Tên đăng nhập
                </label>
                <input type="text" class="form-control form-control-lg" name="user_name" id="UserName" required value="<?php echo $Username; ?>">
                <p class="error-message" id="userNameError"></p>
                <label for="mat_khau" class="input-label">
                    Mật khẩu mới
                </label>
                <div style="position: relative;">
                    <input type="password" class="form-control form-control-lg" name="mat_khau" id="Password" autocomplete="off" placeholder="Nếu không đổi mật khẩu thì không cần nhập trường này">
                </div>
                <p class="error-message" id="passwordError"></p>
                <label for="mat_khau" class="input-label">
                    Xác nhận mật khẩu mới
                </label>
                <div style="position: relative;">
                    <input type="password" class="form-control form-control-lg" name="mat_khau" id="ComfirmPassword" autocomplete="off" placeholder="Nếu không đổi mật khẩu thì không cần nhập trường này">
                </div>
                <p class="error-message" id="passwordError"></p>

                <label for="email" class="input-label">
                    Email
                </label>
                <input type="email" class="form-control form-control-lg" name="email" id="Email" required value="<?php echo $Email; ?>">

                <label for="so_dien_thoai" class="input-label">
                    Số điện thoại
                </label>
                <input type="text" class="form-control form-control-lg" name="so_dien_thoai" id="PhoneNumber" value="<?php echo $SoDienThoai; ?>">

                <label for="dia_chi" class="input-label">
                    Địa chỉ
                </label>
                <input type="text" class="form-control form-control-lg" name="dia_chi" id="Address" value="<?php echo $DiaChi; ?>">

                <label for="loai_tai_khoan" class="input-label">
                    Loại tài khoản
                </label>
                <select name="loai_tai_khoan" class="form-control form-control-lg">

                    <option <?php echo $LoaiTaiKhoan == 0 ? "selected" : ""; ?> value="0">Admin</option>
                    <option <?php echo $LoaiTaiKhoan == 1 ? "selected" : ""; ?> value="1">Khách hàng</option>
                </select>
                <button type="submit">Cập nhật</button>

            </form>
        </div>
    </div>
</div>