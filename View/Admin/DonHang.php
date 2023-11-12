<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Xét duyệt đơn hàng</h3>
        </div>
        <div class="" style="width: 100%; display: flex; ">
            <div class="form-group p-1 theongay" style="width: 20%;">
                <label for="" class="form-label">Danh sách khách hàng:</label>
                <select name="" id="IdUsers" class="form-control">
                    <option value="">-- Chọn khách hàng --</option>
                </select>
            </div>
            <div class="form-group p-1" style="padding-left: 0px; padding-right: 0px;">
                <button class="btn btn-success" id="btnDuyetDonHang" style="display: flex;margin: 10px;margin-top: 21px; "><i class="bi bi-check-lg" style="margin-right: 10px;"></i>Duyệt đơn hàng</button>
            </div>
        </div>

        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">
                <div class="" style="width: 100%;">
                    <table id="tbl_XetDuyet" data-classes="table table-striped table-bordered table-hover" data-toggle="table" data-mobile-responsive="true">
                        <thead>
                            <tr style="background: #b0b0aa;">
                                <th data-field="MaDongHo">Mã đồng hồ</th>
                                <th data-field="TenDongHo">Tên đồng hồ</th>
                                <th data-field="SoLuong">Số lượng kho</th>
                                <th data-field="SoLuongMua">Số lượng mua</th>
                                <th data-field="TenDayDu">Tên khách hàng</th>
                                <th data-field="DiaChi">Địa chỉ mua hàng</th>
                                <th data-field="SoDienThoai">Số điện thoại</th>
                                <th data-formatter="TrangThaiMua">Trạng thái/Mua</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css
" rel="stylesheet">
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js
"></script>
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/bootstrap.css">
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/data-table/bootstrap-table.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/plugins/data-table/bootstrap-table.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/DonHang.js"></script>
