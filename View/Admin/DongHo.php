<style>
    .modal-popup {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 9999999999999;
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
            <select name="" id="order_gia" class="form-control" style="width: 15%;margin-top: 10px;">
                <option value="">-- Sắp xêp theo giá --</option>
                <option value="1">1. Thấp=>Cao</option>
                <option value="2">2. Cao=>Thấp</option>
            </select>
            <input type="text" class="form-control" id="txtTimKiem" placeholder="Tìm kiếm theo tên, Thương hiệu" style="width: 25%;margin-left: 10px; margin-top: 10px;">

        </div>
        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">
                <div class="" style="width: 100%;">
                <table id="tbl_DongHo" 
                data-classes="table table-striped table-bordered table-hover" 
                data-toggle="table" 
                data-sort="true"
                data-group-by="true"
                data-group-by-field="ThuongHieu"
                data-mobile-responsive="true">
                        <thead>
                            <tr style="background: #b0b0aa;">
                                <th data-formatter="Anh" data-sort="true    ">Ảnh</th>
                                <th data-field="TenDongHo">Tên đồng hồ</th>
                                <th data-field="MaDongHo">Mã đồng hồ</th>
                                <th data-field="NamNu">Phân loại</th>
                                <th data-field="GiaMua" data-formatter="formatCurrency">Giá mua</th>
                                <th data-field="GiaBan" data-formatter="formatCurrency">Giá bán</th>
                                <th data-field="SoLuong">Số lượng còn</th>
                                <th data-field="SoLuongBan">Số lượng Bán</th>
                                <th data-formatter="ChucNang">Chức năng</th>
                            </tr>
                        </thead>
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
        <button class="btn btn-primary" id="btn_CapNhapDuLieu" style="display: flex;margin: 10px; ">Cập nhập dữ liệu</button>
        <button class="btn btn-danger" id="btn_Thoat" style="display: flex;margin: 10px; ">Chuyển & Đóng</button>
    </div>
    <div class="card-body p-2" style="display: inline;overflow-y: scroll">
        <input type="hidden" class="form-control" id="IdDongHo" placeholder="">
        <div style="display: flex;">
            <div class="" style="width: 20%; background: #007bff;height: 168px;">
                <div class="upload" style="text-align-last: center;margin: 15px;">
                    <img id="urlAnh" src="http://localhost:3000/UpLoad/Public/3135715.png" width="130px">
                </div>
                <div class="form-group">
                    <div class="input-group col-md-12">
                        <input type="file" id="duong_dan_tai_lieu" name="duong_dan_tai_lieu" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="" style="width: 40%;margin-left: 20px;">
                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="" class="form-label">Tên đồng hồ</label>
                    <input type="text" class="form-control" id="TenDongHo" placeholder="">
                </div>

                <div class="form-group p-1" style="display: flex;">
                    <div style="padding-top: 0px;width: 40%;margin-right: 21px;">
                        <label for="" class="form-label">Phân loại (Nam/Nữ)</label>
                        <select name="" id="NamNu" class="form-control ">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div style="padding-top: 0px; width: 57%;">
                        <label for="" class="form-label">Thương hiệu</label>
                        <select name="" id="ThuongHieu" class="form-control js-example-basic-single">
                            <option value="">-- Chọn Thương Hiệu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Kiểu dáng</label>
                    <select class="form-control" id="KieuDang">
                        <option selected="selected">--Chọn kiểu dáng--</option>
                    </select>
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Loại dây</label>
                    <select name="" id="LoaiDay" class="form-control">
                        <option value="">-- Chọn Loại dây --</option>
                    </select>
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Chống nước</label>
                    <select name="" id="ChongNuoc" class="form-control">
                        <option value="1">Có chống nước</option>
                        <option value="0">Không chống nước</option>
                    </select>
                </div>
            </div>
            <div class="" style="width: 40%;margin-left: 20px;">

                <div class="form-group p-1" style="padding-top: 0px;">
                    <label for="" class="form-label">Mã đồng hồ</label>
                    <input type="text" class="form-control" id="MaDongHo" placeholder="">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" id="SoLuong" placeholder="Nhập số lượng" disabled style="font-size: large;">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Giá mua</label>
                    <input type="number" class="form-control" id="GiaMua" placeholder="Nhập giá mua ...">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Giá bán</label>
                    <input type="text" class="form-control" id="GiaBan" placeholder="Nhập giá bán ...">
                </div>
                <div class="form-group p-1">
                    <label for="" class="form-label">Giảm giá (%)</label>
                    <input type="number" class="form-control" id="GiamGia" placeholder="Nhập giám giá ...">
                </div>
            </div>
        </div>
        <div class="" style="width: 100%; display: flex;">
            <button class="btn btn-secondary modal-table-chitiet" id="btn_TaoChiTiet" style="display: flex;margin: 10px; ">Tạo chi tiết đồng hồ</button>
            <button class="btn btn-primary modal-table-chitiet" id="btn_CapNhapChiTiet" style="display: flex;margin: 10px; ">Cập nhập dữ liệu</button>
            <div class="input-group col-md-12  modal-table-file" style="width: 50%; margin-top: 10px;">
                <input type="file" id="duong_dan_tai_lieu2" name="duong_dan_tai_lieu2" class="form-control" multiple />
            </div>
            <button class="btn btn-danger modal-table-file" id="btn_UploadFile" style="display: flex;margin: 10px; ">Cập nhập file</button>
        </div>
        <div class="form-group modal-table-chitiet" style="width: 100%; display: flex;">
            <div class="" style="width: 100%;">
                <table class="styled-table">
                    <tr>
                        <th style="text-align: center;">Imeil</th>
                        <th style="text-align: center;">Bảo hành</th>
                        <th style="text-align: center;">Ngày bảo hành từ</th>
                        <th style="text-align: center;">Đến ngày</th>
                        <th style="text-align: center;">Xóa</th>
                    </tr>
                    <tbody id="tbl_ChiTietDongHo">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group modal-table-file" style="width: 100%; display: flex;">
            <div class="" style="width: 100%;">
                <table class="styled-table">
                    <tr>
                        <th style="text-align: center;">Ảnh</th>
                        <th style="text-align: center;">Tên File</th>
                        <th style="text-align: center;">Hiển thi</th>
                        <th style="text-align: center;">Chức năng</th>
                    </tr>
                    <tbody id="tbl_DinhKemFile">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/bootstrap.css">
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/data-table/bootstrap-table.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/plugins/data-table/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/extensions/group-by-v2/bootstrap-table-group-by.min.js"></script>
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.css">
<script src="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/DongHo.js"></script>