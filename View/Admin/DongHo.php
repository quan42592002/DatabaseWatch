<style>
    .modal-popup {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1040;
        background-color: #fff;
    }

    .modal.fade .modal-dialog {
        transition: -webkit-transform .3s ease-out;
        transition: transform .3s ease-out;
        transition: transform .3s ease-out, -webkit-transform .3s ease-out;
        -webkit-transform: translate(0, -25%);
        transform: translate(0, -25%);
    }

    ;
</style>
<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Quản lý đồng hồ</h3>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
            <button class="btn btn-success" id="btn_TaoMoi" style="display: flex;margin: 10px; ">Tạo mới</button>
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
    </div>
</div>
<div class="card modal-popup fade modal-dialog" style="margin: 0 auto;" id="modal-DongHo">
    <div class="card-header">
        <h3>Thông tin đồng hồ</h3>
    </div>
    <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
        <button class="btn btn-primary" id="btn_Save" style="display: flex;margin: 10px; ">Lưu dữ liệu</button>
        <button class="btn btn-danger" id="btn_Thoat" style="display: flex;margin: 10px; ">Chuyển & Đóng</button>
    </div>
    <div class="card-body p-2" style="display: inline;overflow-y: scroll">
        <div style="display: flex;">
            <div class="" style="width: 20%; background: #c7c6c6;height: 168px;">
                <div class="upload" style="text-align-last: center;margin: 15px;">
                    <img src="" id="urlAnh" alt="" width="130px">
                </div>
                <div class="form-group" style="margin-top: 136px;">
                    <div class="input-group col-md-12">
                        <input type="file" id="duong_dan_tai_lieu" name="duong_dan_tai_lieu" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="" style="width: 40%;margin-left: 20px;">
                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="" class="form-label">Tên đồng hồ</label>
                    <input type="text" class="form-control" id="SoThuTu" placeholder="">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Phân loại (Nam/Nữ)</label>
                    <select name="" id="" class="form-control" >
                        <option value="">-- Chọn Phân loại--</option>
                        <option value="">Nam</option>
                        <option value="">Nữ</option>
                    </select>
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Kiểu dáng</label>
                    <input type="text" class="form-control" id="TenGoi" placeholder="Nhập tên gọi ...">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Loại dây</label>
                    <input type="text" class="form-control" id="TenGoi" placeholder="Nhập tên gọi ...">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Chống nước</label>
                    <input type="text" class="form-control" id="TenGoi" placeholder="Nhập tên gọi ...">
                </div>
            </div>
            <div class="" style="width: 40%;margin-left: 20px;">
                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="" class="form-label">Thương hiệu</label>
                    <select name="" id="" class="form-control" >
                        <option value="">-- Chọn Thương Hiệu</option>
                    </select>
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Số lượng</label>
                    <input type="text" class="form-control" id="TenGoi" placeholder="Nhập tên gọi ...">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Giá mua</label>
                    <input type="text" class="form-control" id="TenGoi" placeholder="Nhập tên gọi ...">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Giá bán</label>
                    <input type="text" class="form-control" id="TenGoi" placeholder="Nhập tên gọi ...">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Giảm giá</label>
                    <input type="text" class="form-control" id="TenGoi" placeholder="Nhập tên gọi ...">
                </div>
            </div>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; border-top: 1px solid blue;">
            <button class="btn btn-secondary" id="btn_TaoChiTiet" style="display: flex;margin: 10px; ">Tạo chi tiết đồng hồ</button>
        </div>
        <div class="form-group" style="width: 100%; display: flex;">
            <div class="" style="width: 100%;">
                <table class="styled-table">
                    <tr>
                        <th style="text-align: center;">Imeil</th>
                        <th style="text-align: center;">Bảo hành</th>
                        <th style="text-align: center;">Ngày bảo hành từ</th>
                        <th style="text-align: center;">Đến ngày</th>
                        <th style="text-align: center;">Xóa</th>
                    </tr>
                    <tbody id="tbl_ThuongHieu">
                        <tr>
                            <td><input type="text" class="form-control" id="SoThuTu" placeholder=""></td>
                            <td><input type="text" class="form-control" id="SoThuTu" placeholder=""></td>
                            <td><input type="text" class="form-control" id="SoThuTu" placeholder=""></td>
                            <td><input type="text" class="form-control" id="SoThuTu" placeholder=""></td>
                            <td><input type="text" class="form-control" id="SoThuTu" placeholder=""></td>
                        </tr> <tr>
                            <td><input type="text" class="form-control" id="SoThuTu" placeholder=""></td>
                            <td><input type="text" class="form-control" id="SoThuTu" placeholder=""></td>
                            <td><input type="text" class="form-control" id="SoThuTu" placeholder=""></td>
                            <td><input type="text" class="form-control" id="SoThuTu" placeholder=""></td>
                            <td><input type="text" class="form-control" id="SoThuTu" placeholder=""></td>
                        </tr>
                    </tbody>
                </table>
                <div class="pagination">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.css">
<script src="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/DongHo.js"></script>