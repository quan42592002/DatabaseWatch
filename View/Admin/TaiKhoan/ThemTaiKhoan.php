<style>
    .error-message {
        color: #ff7675;
        font-size: 12px;
        text-align: left;

    }
    .text-center{
        /* margin-left: 510px; */
        font-size: 14px !important;
        padding: 5px;
        text-align: center;
        margin-bottom: 0;
    }
</style>
<?php
?>
<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Thêm tài khoản</h3>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
            <a class="btn btn-success" href="?controller=TaiKhoanController" style="display: flex;margin: 10px; ">Quay
                lại</a>
            <!-- <a class="btn btn-primary" id="btn_SaveData" style="display: flex;margin: 10px; margin-left: 0px; ">Cập
                nhập</a> -->
           
        </div>
        <h3 class="error-message text-center">
            <?php
                    if (isset($_GET['exit'])) {
                        echo urldecode($_GET['exit']);
                    }
                ?>
        </h3>
        <div class="card-body p-2">
        <div>
           
            </div>   
            <form method="post" action="http://localhost:3000/Controller/admin/Crud/TaiKhoan/ThemTaiKhoan.php" onsubmit="return validateForm(event)">

                <label for="FullName" class="input-label">
                    Họ và tên
                </label>
                <input type="text" class="form-control form-control-lg" name="ten_day_du" id="FullName" required>
                <label for="user_name" class="input-label">
                    Tên đăng nhập
                </label>
                <input type="text" class="form-control form-control-lg" name="user_name" id="UserName" required
                    autocomplete="off">
                <p class="error-message" id="userNameError"></p>
                <label for="mat_khau" class="input-label">
                    Mật khẩu
                </label>
                <div style="position: relative;">
                    <input type="password" class="form-control form-control-lg" name="mat_khau" id="Password" required
                        autocomplete="off">
                    <button
                        style="position: absolute; right: 0; top: 50%; transform: translateY(-50%); color:#D0CFCF; font-size:18px; border:none; background-color:#fff;"
                        type="button" id="togglePassword" class="toggle-password" onclick="togglePasswordVisibility()">
                        <i class="mdi mdi-eye"></i>
                    </button>
                </div>
                <p class="error-message" id="passwordError"></p>

                <label for="xac_nhan_mat_khau" class="input-label">
                    <i class="mdi mdi-lock" style="color:#D0CFCF; font-size:18px;"></i>
                    Mật khẩu xác nhận
                </label>
                <div style="position: relative;">
                    <input type="password" class="form-control form-control-lg" name="xac_nhan_mat_khau" id="Password1" required
                        autocomplete="off">
                    <button
                        style="position: absolute; right: 0; top: 50%; transform: translateY(-50%); color:#D0CFCF; font-size:18px; border:none; background-color:#fff;"
                        type="button" id="togglePassword1" class="toggle-password"
                        onclick="togglePasswordVisibility1()">
                        <i class="mdi mdi-eye"></i>
                    </button>
                </div>
                <p class="error-message" id="confirmPasswordError"></p>

                <label for="email" class="input-label">
                    Email
                </label>
                <input type="email" class="form-control form-control-lg" name="email" id="Email" required>
                <p class="error-message" id="emailError">
               
                </p>

                <label for="so_dien_thoai" class="input-label">
                    Số điện thoại
                </label>
                <input type="text" class="form-control form-control-lg" name="so_dien_thoai" id="PhoneNumber" >

                <label for="dia_chi" class="input-label">
                    Địa chỉ
                </label>
                <input type="text" class="form-control form-control-lg" name="dia_chi" id="Address" >

                <label for="loai_tai_khoan" class="input-label">
                    Loại tài khoản
                </label>
                <select name="loai_tai_khoan" class="form-control form-control-lg">
                    <option value="0">Admin</option>
                    <option value="1">Khách hàng</option>
                </select>


               

                <button  type="submit" >Đăng
                    ký</button>

            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".lstDanhSachTaiKhoan").hide();
    });
</script>