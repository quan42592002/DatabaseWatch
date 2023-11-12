<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Báo cáo doanh thu</h3>
        </div>
        <div class="" style="width: 100%; display: flex; ">
            <div class="form-group p-1" style="width: 20%;">
                <label for="" class="form-label"><i style="font-size: 14px;margin-right: 5px;" class="bi bi-funnel"></i> Lọc :</label>
                <select name="" id="cbPhanLoai" class="form-control">
                    <option value="Theo ngày">Theo ngày</option>
                    <option value="Theo tháng">Theo tháng</option>
                    <option value="Theo năm">Theo năm</option>
                </select>
            </div>
            <div class="form-group p-1 theongay" style="width: 20%;">
                <label for="" class="form-label">Từ ngày</label>
                <input type="date" name="" id="TuNgay" class="form-control">
            </div>
            <div class="form-group p-1 theongay" style="width: 20%;">
                <label for="" class="form-label">Đến ngày</label>
                <input type="date" name="" id="DenNgay" class="form-control">
            </div>

            <div class="form-group p-1 theothang" style="width: 20%;">
                <label for="" class="form-label">Chọn tháng :</label>
                <select name="" id="cbThang" class="form-control">
                    <option value="">--Chọn theo tháng--</option>
                    <option value="1">Tháng 1</option>
                    <option value="2">Tháng 2</option>
                    <option value="3">Tháng 3</option>
                    <option value="4">Tháng 4</option>
                    <option value="5">Tháng 5</option>
                    <option value="6">Tháng 6</option>
                    <option value="7">Tháng 7</option>
                    <option value="8">Tháng 8</option>
                    <option value="9">Tháng 9</option>
                    <option value="10">Tháng 10</option>
                    <option value="11">Tháng 11</option>
                    <option value="12">Tháng 12</option>
                </select>
            </div>
            <div class="form-group p-1 theonam" style="width: 20%;">
                <label for="" class="form-label">Chọn năm :</label>
                <select name="" id="cbNam" class="form-control">
                    <option value="">--Chọn theo năm--</option>
                    <option value="2019">Năm 2019</option>
                    <option value="2020">Năm 2020</option>
                    <option value="2021">Năm 2021</option>
                    <option value="2022">Năm 2022</option>
                    <option value="2023">Năm 2023</option>
                </select>
            </div>

            <div class="form-group p-1" style="padding-left: 0px; padding-right: 0px;">
                <button class="btn btn-primary" id="btnLoc" style="display: flex;margin: 10px;margin-top: 21px; "><i class="bi bi-funnel" style="margin-right: 10px;"></i>Lọc</button>
            </div>
            <div class="form-group p-1" style="padding-left: 0px; padding-right: 0px;">
                <button class="btn btn-secondary" id="btnXuatBaoCao" style="display: flex;margin: 10px;margin-top: 21px; "><i class="bi bi-save" style="margin-right: 10px;"></i>Xuất dạng exel</button>
            </div>
            <div class="form-group p-1" style="padding-left: 0px;">
                <button class="btn btn-danger" id="btnpdf" style="display: flex;margin: 10px;margin-top: 21px; "><i class="bi bi-save" style="margin-right: 10px;"></i>Xuất dạng pdf</button>
            </div>

        </div>

        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">
                <div class="" style="width: 100%;">
                    <table id="tbl_BaoCao" data-classes="table table-striped table-bordered table-hover" data-toggle="table" data-mobile-responsive="true">
                        <thead>
                            <tr style="background: #b0b0aa;">
                                <th data-field="Imei">Imei</th>
                                <th data-field="TenDongHo">Tên đồng hồ</th>
                                <th data-field="ThuongHieu">Thương hiệu</th>
                                <th data-field="ThoiGian" >Thời gian</th>
                                <th data-field="GiaMua" data-formatter="formatCurrency">Giá mua</th>
                                <th data-field="GiaBan" data-formatter="formatCurrency">Giá bán</th>
                                <!-- <th data-field="TienLai" data-formatter="TienLaiFomater">Tiền lãi</th> -->
                                <!-- <th data-field="TrangThai">Trạng thái</th> -->
                                <th data-field="Username">Khách mua</th>
                            </tr>
                        </thead>
                        <!-- <tfoot>
                            <tr>
                                <th data-column="5">Tổng tiền</th>
                               
                            </tr>
                        </tfoot> -->
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/bootstrap.css">
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/data-table/bootstrap-table.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/plugins/data-table/bootstrap-table.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/plugins/tableExport.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/plugins/js-xlsx/xlsx.core.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/plugins/jsPDF/pdfmake.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/plugins/jsPDF/vfs_fonts.js"></script>
<script src="http://localhost:3000/Assets/admin/js/BaoCao.js"></script>