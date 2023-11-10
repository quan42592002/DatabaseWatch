<div id="wrapper-admin">
    <div class="card" style="margin: 0 auto;margin-top: 20px;">
        <div class="card-header">
            <h3>Danh mục bài viết</h3>
        </div>
        <div class="" style="width: 100%; display: flex; border-bottom: 1px solid blue; ">
            <button class="btn btn-success" id="btn_TaoMoi" style="display: flex;margin: 10px; ">Tạo mới</button>
            <button class="btn btn-primary" id="btn_SaveData" style="display: flex;margin: 10px; margin-left: 0px; ">Cập nhập</button>
        </div>
        <div class="card-body p-2" style="display: flex;">
            <div class="form-group" style="width: 100%; display: flex;">
                <input type="hidden" class="form-control" id="IdBaiViet">
                <div class="" style="width: 70%">
                    <div class="form-group p-1" style="padding-top: 0px;">
                        <label for="" class="form-label">Tên bài viết</label>
                        <input type="text" class="form-control" id="TenBaiViet" placeholder="Nhập tên bài viết ...">
                    </div>
                    <div class="form-group p-1" style="padding-top: 0px;">
                        <label for="" class="form-label">Bài viết</label>
                        <textarea name="content" id="content" class="form-control ckeditor"></textarea>
                    </div>
                </div>
                <div class="" style="width: 30%;">
                    <table id="tbl_BaiViet" data-classes="table table-striped table-bordered table-hover" data-toggle="table" data-mobile-responsive="true">
                        <thead>
                            <tr style="background: #b0b0aa;">
                                <th data-field="IdBaiViet">Id</th>
                                <th data-field="TenBaiViet">Tên bài viết</th>
                                <th data-formatter="ChucNang">#</th>
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
<script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script src="http://localhost:3000/Assets/admin/js/BaiViet.js"></script>