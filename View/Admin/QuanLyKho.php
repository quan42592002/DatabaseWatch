<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Phiếu nhập kho</h3>
        </div>
        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">
                <div class="" style="width: 100%;">
                    <table class="styled-table">
                        <tr>
                            <th style="text-align: center;">Tên đồng hồ</th>
                            <th style="text-align: center;">Thương hiệu</th>
                            <th style="text-align: center;">Phân loại</th>
                            <th style="text-align: center;">Giá mua</th>
                            <th style="text-align: center;">Giá bán</th>
                            <th style="text-align: center;">Chức năng</th>
                        </tr>
                        <tbody id="tbl_ThuongHieu">
                        </tbody>
                    </table>
                    <div class="pagination">
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
            <button class="btn btn-success" id="btn_TaoMoi" style="display: flex;margin: 10px; ">Tạo mới</button>
            <button class="btn btn-primary" id="btn_SaveData" style="display: flex;margin: 10px; margin-left: 0px; ">Cập nhập</button>
            <button class="btn btn-danger" id="btn_SaveData" style="display: flex;margin: 10px; margin-left: 0px; ">Tạo chi tiết phiếu nhập</button>
        </div>
        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">

                <input type="hidden" class="form-control" id="IdThuongHieu">
                <div class="" style="width: 40%;margin-left: 20px;">
                    <div class="form-group p-1" style="padding-top: 0px;">
                        <label for="" class="form-label">Người tạo: </label>
                        <input type="text" class="form-control" id=""
                        <?php
                        echo 'value="'.trim($_SESSION['Username']).'"';
                        ?>
                        disabled>
                    </div>
                    <div class="form-group p-1">
                        <label for="" class="form-label">Số hiệu</label>
                        <input type="text" class="form-control" id="TenGoi" placeholder="Nhập tên gọi ...">
                    </div>
                    <div class="form-group p-1">
                        <label for="" class="form-label">Ngày tạo</label>
                        <input type="date" class="form-control" id="TenGoi">
                    </div>
                </div>
                <div class="" style="width: 60%;">
                    <table class="styled-table">
                        <tr>
                            <th style="text-align: center;">Id</th>
                            <th style="text-align: center;">Số thứ tự</th>
                            <th style="text-align: center;">Tên gọi</th>
                            <th style="text-align: center;">Chức năng</th>
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