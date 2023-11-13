<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Thông kê</h3>
        </div>
      
        <div class="card-body p-2" style="display: flex;">
            <div class="" style="width: 25%;">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div style="display: flex;">
                        <div class="inner" style="width: 63%;
                        text-align: center;
                        margin-top: 25px;">
                            <h3 id="tongNhap"></h3>
                            <p>Tổng sản phẩm nhập kho</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-bag"></i>
                        </div>
                    </div>
                    <a href="#" class="small-box-footer">Xem chi tiết <i class="bi bi-arrow-right-circle"></i></a>
                </div>
            </div>

            <div class="" style="width: 25%; margin-left: 10px;">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div style="display: flex;">
                        <div class="inner" style="width: 63%;
                        text-align: center;
                        margin-top: 25px;">
                            <h3 id="tongBan"></h3>
                            <p>Tổng sản phẩm đã bán</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-fill-add"></i>
                        </div>
                    </div>
                    <a href="#" class="small-box-footer">Xem chi tiết <i class="bi bi-arrow-right-circle"></i></a>
                </div>
            </div>

            <div class="" style="width: 25%; margin-left: 10px;">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div style="display: flex;">
                        <div class="inner" style="width: 63%;
                        text-align: center;
                        margin-top: 25px;">
                            <h3 id="tongUser"></h3>
                            <p>Tài khoản khách hàng</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-fill-add"></i>
                        </div>
                    </div>
                    <a href="#" class="small-box-footer">Xem chi tiết <i class="bi bi-arrow-right-circle"></i></a>
                </div>
            </div>

            <div class="" style="width: 25%; margin-left: 10px;">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div style="display: flex;">
                        <div class="inner" style="width: 63%;
                        text-align: center;
                        margin-top: 25px;">
                            <h3 id="tongDCD"></h3>
                            <p>Đơn hàng chưa duyệt</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-fill-add"></i>
                        </div>
                    </div>
                    <a href="#" class="small-box-footer">Xem chi tiết <i class="bi bi-arrow-right-circle"></i></a>
                </div>
            </div>
        </div>

        <h5>Sản phẩm bán chạy </h5>
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
                                <th data-field="Username">Khách mua</th>
                            </tr>
                        </thead>
                       
                    </table>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/bootstrap.css">
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/data-table/bootstrap-table.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/plugins/data-table/bootstrap-table.min.js"></script>
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/css/dashboard.css">
<script src="http://localhost:3000/Assets/admin/js/Home.js"></script>
