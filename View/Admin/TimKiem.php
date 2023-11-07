<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Tìm kiếm đồng hồ</h3>
        </div>
        <div class="" style="width: 100%; display: flex; ">
            <div class="form-group p-1" style="width: 20%;">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="Search_Ten" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group p-1" style="width: 20%;">
                <label for="" class="form-label">Thương hiệu</label>
                    <select name="" id="Search_ThuongHieu" class="form-control">
                    </select>
            </div>
            <div class="form-group p-1" style="width: 20%;">
            <label for="" class="form-label">Loại dây</label>

            <select name="" id="Search_LoaiDay" class="form-control">
           
            </select>

            </div>
            <div class="form-group p-1" style="width: 20%;">
            <label for="" class="form-label">Kiểu dáng</label>

            <select name="" id="Search_KieuDang" class="form-control">
           
            </select>

            </div>
            <div class="form-group p-1" style="width: 20%;">
            <label for="" class="form-label">Số lượng</label>

            <select name="" id="Order_SoLuong" class="form-control">
            <option value="">--Sắp xếp theo số lượng--</option>
            <option value="1">Số lượng tăng dần</option>
            <option value="2">Số lượng giảm dần</option>
            </select>

            </div>
        </div>
        <div class="" style="width: 100%; display: flex;justify-content: center; ">
            <button class="btn btn-primary" id="btnReset" style="display: flex;margin: 10px; "><i class="bi bi-arrow-repeat" style="margin-right: 10px;"></i>  Làm mới</button>
            <button class="btn btn-secondary" id="btnSearch" style="display: flex;margin: 10px; "><i class="bi bi-search" style="margin-right: 10px;"></i>Tìm kiếm</button>
        </div>
        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">
                <div class="" style="width: 100%;">
                    <table class="styled-table">
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Ảnh</th>
                            <th style="text-align: center;">Tên đồng hồ</th>
                            <th style="text-align: center;">Thương hiệu</th>
                            <th style="text-align: center;">Phân loại</th>
                            <th style="text-align: center;">Kiểu Dáng</th>
                            <th style="text-align: center;">SoLuong</th>
                        </tr>
                        <tbody id="tbl_DongHoThem">
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
<script src="http://localhost:3000/Assets/admin/js/TimKiem.js"></script>
