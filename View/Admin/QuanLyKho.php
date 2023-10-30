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
                            <th style="text-align: center;">Tên đồng hồ</th>
                            <th style="text-align: center;">Thương hiệu</th>
                            <th style="text-align: center;">Phân loại</th>
                            <th style="text-align: center;">Giá mua</th>
                            <th style="text-align: center;">Giá bán</th>
                        </tr>
                        <tbody id="tbl_ThuongHieu">
                        </tbody>
                    </table>
                    <div class="pagination">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Nhập hàng</h3>
        </div>
        <div class="" style="width: 100%; display: flex; ">
            <input type="text" class="form-control" id="TenGoi" style="width: 30%;margin: 10px;" placeholder="Tìm theo tên hoặc mã sản phẩm ...">
            <button class="btn btn-primary" id="btn_TimKiem" style="display: flex;margin: 10px; ">Lưu tạm</button>
            <button class="btn btn-info" id="btn_TimKiem" style="display: flex;margin: 10px; ">Xóa tạm</button>
        </div>
        <div>
            <h5>Nhập hàng</h5>
        </div>
        <div class="card-body p-2" style="display: flex; padding-top: 0;">
            <div class="form-group" style="width: 60%; display: flex;">
                <div class="" style="width: 100%;">
                    <table class="styled-table">
                        <tr>
                            <th style="text-align: center;">Tên đồng hồ</th>
                            <th style="text-align: center;">Thương hiệu</th>
                            <th style="text-align: center;">Phân loại</th>
                            <th style="text-align: center;">Giá mua</th>
                            <th style="text-align: center;">Giá bán</th>
                        </tr>
                        <tbody id="tbl_ThuongHieu">
                        </tbody>
                    </table>
                    <div class="pagination">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.css">
<script src="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.min.js"></script>