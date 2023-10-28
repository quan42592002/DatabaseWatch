<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Danh mục thương hiệu</h3>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
            <button class="btn btn-success" id="btn_TaoMoi" style="display: flex;margin: 10px; ">Tạo mới</button>
            <button class="btn btn-primary" id="btn_SaveData" style="display: flex;margin: 10px; margin-left: 0px; ">Cập nhập</button>
        </div>
        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">

                <input type="hidden" class="form-control" id="IdThuongHieu">

                <div class="" style="width: 20%; background: #c7c6c6;height: 168px;">
                    <div class="upload" style="text-align-last: center;margin: 15px;">
                        <img src="" id="urlAnh" alt="" width="130px">
                    </div>
                </div>
                <div class="" style="width: 30%;margin-left: 20px;">
                    <div class="form-group p-1" style="padding-top: 0px;">
                        <label for="" class="form-label">Số thứ tự</label>
                        <input type="text" class="form-control" id="SoThuTu" placeholder="1,2,3 ...">
                    </div>
                    <div class="form-group p-1">
                        <label for="" class="form-label">Tên gọi</label>
                        <input type="text" class="form-control" id="TenGoi" placeholder="Nhập tên gọi ...">
                    </div>
                    <div class="form-group" style="padding: 12px;">
                        <label class="control-label">Chọn tài liệu:</label>
                        <div class="input-group col-md-12">
                            <input type="file" id="duong_dan_tai_lieu" name="duong_dan_tai_lieu" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="" style="width: 50%;">
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
<script src="http://localhost:3000/Assets/admin/js/thuonghieu.js"></script>