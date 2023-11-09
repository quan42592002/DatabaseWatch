<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Danh sách tài khoản</h3>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
            <a class="btn btn-success" href="?controller=TaiKhoanController&&action=ThemTaiKhoan" style="display: flex;margin: 10px; ">Tạo mới</a>
            <!-- <a class="btn btn-primary" id="btn_SaveData" style="display: flex;margin: 10px; margin-left: 0px; ">Cập
                nhập</a> -->
        </div>
        <h3 class="message-done text-center">
            <?php
            if (isset($_GET['success'])) {
                echo urldecode($_GET['success']);
            }
            ?>
        </h3>
        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">
                <div class="" style="width: 100%;">
                    <table class="styled-table">
                        <tr>
                            <th style="text-align: center;">STT</th>
                            <th style="text-align: center;">Quyền</th>
                            <th style="text-align: center;">Tên đầy đủ</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">User</th>
                            <th style="text-align: center;">Số điện thoại</th>  
                            <th style="text-align: center;">Địa chỉ</th>
                            <th style="text-align: center;">Trạng thái</th>
                            <th style="text-align: center;">Chức năng</th>
                        </tr>
                        <tbody id="tbl_TaiKhoan">
                            <?php
                            if (isset($data['listUser'])) {
                                $listUser = $data['listUser'];
                                $i = 1;
                                // Truy cập mảng $users
                                foreach ($listUser  as $user) {
                                    $trang_thai = $user['TrangThai'] == 1 ? "Hoạt động" : "Bị khoá";
                                    $loai_tai_khoan = $user['LoaiTaiKhoan'] == 0 ? "Admin" : "Customer";

                                    $str = "
                                    <tr>
                                        <td>" . $i . "</td>
                                        <td>" . $loai_tai_khoan . "</td>
                                        <td>" . $user['TenDayDu'] . "</td>
                                        <td>" . $user['Email'] . "</td>
                                        <td>" . $user['Username'] . "</td>
                                        <td>" . $user['SoDienThoai'] . "</td>
                                        <td>" . $user['DiaChi'] . "</td>
                                        <td>" . $trang_thai . "</td>
                                        <td>" . "
                                        <a class='btn btn-primary btn-sm' title='Xem thông tin' href='?controller=TaiKhoanController&&action=SuaTaiKhoan&&id=" . base64_encode($user['IdUsers']) . "'><i class='bi bi-pencil'></i></a>
                                        <a class='btn btn-danger btn-sm' title='Xem thông tin' href='?controller=TaiKhoanController&&action=XoaTaiKhoan&&id=" . base64_encode($user['IdUsers']) . "'
                                        onclick=\"return window.confirm('Bạn chắc chắn muốn xoá?');\"
                                        ><i class='bi bi-trash'></i></a>
                                        " . "</td>
                                    </tr>";
                                    echo $str;
                                    // Hiển thị các thông tin khác nếu có
                                    $i++;
                                }
                            }
                            // Hiển thị giá trị thuộc tính IdUsers
                            ?>
                        </tbody>
                    </table>
                    <div class="pagination">
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>