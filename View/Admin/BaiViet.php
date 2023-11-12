<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Danh mục bài viết</h3>
        </div>
        <section id="card-profile-1">
            <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
                <button class="btn btn-success" id="btn_TaoMoi" style="display: flex;margin: 10px; ">Tạo mới</button>
            </div>
            <div class="card-body p-2" style="display: flex;">
                <div class="form-group" style="width: 100%; display: flex;;">
                    <input type="hidden" class="form-control" id="IdTopList">
                    <input type="hidden" id="NguoiTao" value="<?php
                                                                if (isset($_SESSION['HoTen'])) {
                                                                    echo $_SESSION['HoTen'];
                                                                }
                                                                ?>">
                    <div class="" style="width: 50%;margin-right: 20px;padding: 10px;border: 1px solid #bcbcbc;padding-top: 0px;">
                        <div class="" style="width: 100%; background: #c7c6c6;height: 168px;">
                            <!-- <div class="upload" style="text-align-last: center;margin: 15px;"> -->
                                <img src="" id="urlAnh" alt="" style="width:100%;height:100%;">
                            <!-- </div> -->
                        </div>
                        <input type="hidden" class="form-control" id="IdTopList">
                        <div class="form-group" style="padding: 12px;">
                            <label class="control-label">Chọn tài liệu:</label>
                            <div class="input-group col-md-12">
                                <input type="file" id="duong_dan_tai_lieu" name="duong_dan_tai_lieu" class="form-control" />
                            </div>
                        </div>
                        
                        <div class="form-group p-1" style="padding-top: 0px;">
                            <label for="" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="TieuDe" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group p-1">
                            <label for="" class="form-label">Nội dung</label>
                            <textarea style="height: 82px;" name="" class="form-control" id="NoiDung" cols="50" rows="10" placeholder="Nhập nội dung"></textarea>
                        </div>
                        <div class="form-group p-1" style="padding-top: 0px;">
                            <label for="" class="form-label">Ngày tạo</label>
                            <input type="date" class="form-control" id="CreateDate">
                        </div>
                        <div class="form-group p-1" style="padding-top: 0px;">
                            <label for="" class="form-label" style="margin-right: 10px;">Hiển thị:</label>
                            <input type="checkbox" class="allCK" id='TrangThai'>
                        </div>
                        <div class="form-group p-1" style="padding-top: 0px;">
                            <button class="btn btn-primary" id="btn_SaveTopList" style="width: 50%;
    text-align: center;
    margin-left: 106px; ">Cập nhập</button>
                        </div>
                    </div>
                    <div class="" style="width: 50%;">
                        <table id="tbl_BaiViet" data-classes="table table-striped table-bordered table-hover" data-toggle="table" data-mobile-responsive="true">
                            <thead>
                                <tr style="background: #b0b0aa;">
                                    <th data-field="TieuDe" >Tiêu đề</th>
                                    <th data-formatter="ChucNang" data-width="100px">#</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section id="card-profile-2">
            <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
                <button class="btn btn-danger" id="btn_ChangeForm" style="display: flex;margin: 10px; margin-left: 10px; ">Chuyển & Đóng</button>
                <button class="btn btn-primary" id="btn_SaveDataBaiViet" style="display: flex;margin: 10px; margin-left: 10px; ">Cập nhập bài viết</button>
            </div>
            <div class="card-body p-2" style="display: flex;">
                <div class="form-group" style="width: 100%; display: flex;">
                    <input type="hidden" class="form-control" id="IdBaiViet">
                    <div class="" style="width: 100%">
                        <div class="form-group p-1" style="padding-top: 0px;">
                            <label for="" class="form-label">Tên bài viết</label>
                            <input type="text" class="form-control" id="TenBaiViet" placeholder="Nhập tên bài viết ...">
                        </div>
                        <div class="form-group p-1" style="padding-top: 0px;">
                            <label for="" class="form-label">Bài viết</label>
                            <textarea name="content" id="content" class="form-control ckeditor"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</div>
<!--END flashsale -->
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
<link rel="stylesheet" href="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.css">
<script src="http://localhost:3000/Assets/admin/js/plugins/Filestyle/jquery-filestyle.min.js"></script>
<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script src="http://localhost:3000/Assets/admin/js/BaiViet.js"></script>