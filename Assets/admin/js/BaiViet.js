var myController = {
    init: function () {
        myController.ResetForm();
        myController.LoadTable();
        myController.RegisterEvent();
    },

    ResetForm: function () {
        $("#IdTopList").val(0);
        $("#duong_dan_tai_lieu").val("");
        $("#urlAnh").attr('src', '');
        $("#TieuDe").val("");
        $("#NoiDung").val("");
        $("#CreateDate").val("");
        $("#TrangThai").prop('checked', false);
        $("#urlAnh").attr('src', "http://localhost:3000/UpLoad/Public/3135715.png");
        $("#urlAnh").css('border-radius', '0%');
        $("#urlAnh").css('width', '30%');
        myController.ChangeForm();
    },

    ChangeForm: function () {
        $("#card-profile-1").show();
        $("#card-profile-2").hide();
    },

    RegisterEvent: function () {
        $(document).ready(function () {
            CKEDITOR.replace('content', {
                height: 600,
                toolbar: 'Full', // Hoặc có thể là 'Standard'
            });
            
        });

        $("#btn_TaoMoi").off("click").on("click", function () {
            myController.ResetForm();
        });

        $("#btn_ChangeForm").off("click").on("click", function () {
            myController.ResetForm();
        });
        $("#btn_SaveDataBaiViet").off("click").on("click", function () {
            myController.SaveBaiViet();
        });

        $("#btn_SaveTopList").off("click").on("click", function () {
            myController.SaveData();
        });


        $('#duong_dan_tai_lieu').filestyle({
            text: 'Đính kèm tệp',
            dragdrop: false,
            placeholder: 'Không có tệp đính kèm nào',
            btnClass: 'btn-primary cssFile',
            htmlIcon: '<span class="fa fa-upload"></span> ',
        });

    },

    SaveData: function () {
        var IdTopList = $("#IdTopList").val();
        var TieuDe = $("#TieuDe").val();
        var NoiDung = $("#NoiDung").val();
        var CreateDate = $("#CreateDate").val();
        var NguoiTao = $("#NguoiTao").val();
        var TrangThai = $("#TrangThai").prop('checked');
        var files = $("#duong_dan_tai_lieu")[0].files;
        if (files.length <= 0 && IdTopList == 0) {
            alert("Bạn chưa chọn file ảnh");
            return;
        }
        // Tạo đối tượng FormData để gửi dữ liệu và tệp ảnh
        var formData = new FormData();
        formData.append('IdTopList', IdTopList);
        formData.append('TieuDe', TieuDe);
        formData.append('NoiDung', NoiDung);
        formData.append('CreateDate', CreateDate);
        formData.append('NguoiTao', NguoiTao);
        formData.append('TrangThai', TrangThai);

        for (var x = 0; x < files.length; x++) {
            if (files[x].size >= 52428800) {
                alert('Chỉ được upload file dưới 50MB', 'Thông báo');
                $('#duong_dan_tai_lieu').val("");
                return;
            }
            formData.append('duong_dan_tai_lieu[]', files[x]); // Sử dụng mảng để gửi nhiều tệp
        } 


        if (IdTopList == 0) {
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/BaiViet/InsertTopList.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == true) {
                        alert("Cập nhập thành công");
                        myController.LoadTable();
                        myController.ResetForm();

                    }
                },
            });
        } else {
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/BaiViet/EditTopList.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == true) {
                        alert("Sửa thành công");
                        myController.LoadTable();
                        myController.ResetForm();
                    }
                }, error: function (error) {
                    alert("Sửa thành công");
                    myController.LoadTable();
                    myController.ResetForm();
                }
            });
        }
    },

    SaveBaiViet: function () {
        var content = CKEDITOR.instances['content'].getData();
        var TenBaiViet = $('#TenBaiViet').val();
        var IdBaiViet = $('#IdBaiViet').val();

        if (IdBaiViet <= 0) {
            return;
        }
        if (content == "") {
            alert("Bạn chưa có bài viết");
            return;
        }

        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/BaiViet/UpdateBaiViet.php',
            method: 'Post',
            data: {
                TenBaiViet: TenBaiViet,
                content: content,
                IdBaiViet: IdBaiViet,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    alert("Thêm mới thành công");
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });

    },
    LoadTable: function () {
        $(document).ready(function () {
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/BaiViet/LoadTable.php',
                method: 'Get',
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        lstTable = response.datax;
                        if (lstTable != null) {
                            $("#tbl_BaiViet").bootstrapTable('load', lstTable);
                        } else {
                            $("#tbl_BaiViet").bootstrapTable('removeAll');
                        }
                    }
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    },
    LoadDetail: function (IdTopList) {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/BaiViet/Detail.php',
            method: 'Get',
            data: {
                //truyền vào detailphp
                IdTopList: IdTopList,

            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    if (datax != null) {

                        $("#urlAnh").attr('src', datax.UrlAnh);
                        $("#urlAnh").css('width', '100%');
                        $("#urlAnh").css('border-radius', '0%');
                        $("#IdTopList").val(datax.IdTopList);
                        $("#TieuDe").val(datax.TieuDe);
                        $("#NoiDung").val(datax.NoiDung);
                        $("#CreateDate").val(datax.CreateDate);
                        if (datax.TrangThai == 1) {
                            $("#TrangThai").prop('checked', true);
                        } else {
                            $("#TrangThai").prop('checked', false);
                        }


                    }
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },
    FormChiTiet: function (IdTopList) {
        if (IdTopList <= 0) {
            return;
        }
        $("#card-profile-1").hide();
        $("#card-profile-2").show();
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/BaiViet/LoadDetail.php',
            method: 'Get',
            data: {
                IdTopList: IdTopList,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    if (datax != null) {
                        $("#IdBaiViet").val(datax.IdBaiViet);
                        $("#TenBaiViet").val(datax.TenBaiViet);
                        CKEDITOR.instances['content'].setData(datax.NoiDung);
                    }
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },


};
myController.init();

function ChucNang(e, value, row, index) {
    return [
        '<div style="85px">',
        '<a href="javaScript:myController.LoadDetail(' + value.IdTopList + ')" class="btn btn-primary btn-sm"><i class="bi bi-pencil mr-0"></i></a>',
        '<a  style="margin-left:10px" href="javaScript:myController.FormChiTiet(' + value.IdTopList + ')" class="btn btn-success btn-sm ml-1"><i class="bi bi-postcard"></i></a>',
        '</div>'
    ].join('');
};
