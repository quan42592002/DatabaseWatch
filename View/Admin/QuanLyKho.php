<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Thông tin sản phẩm</h3>
        </div>
        <div class="" style="width: 100%; display: flex; ">
            <input type="text" class="form-control" id="TenGoi" style="width: 30%;margin: 10px;" placeholder="Tìm theo tên hoặc mã sản phẩm ...">
            <button class="btn btn-success" id="btn_TimKiem" style="display: flex;margin: 10px; ">Tìm kiếm</button>
        </div>
        <div>
            <h5>Thông tin sản phẩm</h5>
        </div>
        <div class="card-body p-2" style="display: flex; padding-top: 0;">
            <div class="form-group" style="width: 100%; display: flex;">
                <div class="" style="width: 100%;">
                    <table class="styled-table">
                        <tr>
                            <th style="text-align: center;">Ảnh</th>
                            <th style="text-align: center;">Tên đồng hồ</th>
                            <th style="text-align: center;">Thương hiệu</th>
                            <th style="text-align: center;">Phân loại</th>
                            <th style="text-align: center;">Số Lượng</th>
                            <th style="text-align: center;">Giá mua</th>
                            <th style="text-align: center;">Giá bán</th>
                            <th style="text-align: center;">#</th>
                        </tr>
                        <tbody id="tbl_DongHo">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div>
            <h5>Nhập hàng</h5>
        </div>
        <div class="card-body p-2" style="display: flex; padding-top: 0;">
            <div class="form-group" style="width: 60%; display: flex;">
                <div class="" style="width: 100%;">
                    <table class="styled-table">
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Ảnh</th>
                            <th style="text-align: center;">Tên đồng hồ</th>
                            <th style="text-align: center;">Thương hiệu</th>
                            <th style="text-align: center;">Phân loại</th>
                            <th style="text-align: center;">SoLuong</th>
                        </tr>
                        <tbody id="tbl_DongHoThem">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="" style="width: 40%;margin-left: 20px; border: 1px solid black; padding: 10px;">
                <input type="hidden" class="form-control" id="IdUsers" value="<?php echo $_SESSION['IdUsers'] ?>">

                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="" class="form-label">Người tạo</label>
                    <input type="text" class="form-control" id="NameUsers" placeholder="Người tạo ..." value="<?php echo $_SESSION['Username'] ?>" disabled>
                </div>
                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="" class="form-label">Mã phiếu</label>
                    <input type="text" class="form-control" id="MaPhieuNhap" placeholder="Nhập mã phiếu ...">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Số lượng nhập</label>
                    <input type="number" class="form-control" id="SoluongNhap" placeholder="Số lượng ..." disabled>
                </div>
                <button class="btn btn-primary" id="btn_Save" style="display: flex;margin: 10px; ">Hoàn thành</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.css">
<script src="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/QuanLyKho.js"></script>