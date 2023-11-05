<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Danh mục thương hiệu</h3>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
            <button class="btn btn-success" id="btn_TaoMoi" style="display: flex;margin: 10px; ">Tạo mới</button>
            <button class="btn btn-primary" id="btn_SaveData" style="display: flex;margin: 10px; margin-left: 0px; ">Cập nhập</button>
            <input style="    margin-left: 700px;
    height: 30px;
    margin-top: 10px;" type="text">
        </div>
        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">

                <input type="hidden" class="form-control" id="IdSlider">

                <div class="" style="width: 20%; background: #c7c6c6;height: 168px;">
                    <div class="upload" style="text-align-last: center;margin: 15px;">
                        <img src="" id="urlAnh" alt="" width="130px">
                    </div>
                </div>
                <div class="" style="width: 30%;margin-left: 20px;">
                    <div class="form-group p-1" style="padding-top: 0px;">
                        <label for="" class="form-label">Tên Slider</label>
                        <input type="text" class="form-control" id="nameslider">
                    </div>
                    <div class="form-group p-1">
                        <label for="" class="form-label">Ngày Tạo</label>
                        <input type="date" class="form-control" id="createdate" >
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
                            <th style="text-align: center;">Name Slider</th>
                            <th style="text-align: center;">CreateDate</th>
                        </tr>
                        <tbody id="tbl_Slider">
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
            <h3>Slider</h3>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
           <select name="PhanLoaiSlider" id="PhanLoaiSlider" class="form-control" style="width: 20%;">
           <option value="">--------</option>

            <option value="Trang Chủ">Trang Chủ</option>
            <option value="Trang Shop">Trang Shop</option>
           </select>
        </div>
        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">

            
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.css">
<script src="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.min.js"></script>
<script src="http://localhost:3000/Assets/admin/js/Slider.js"></script>