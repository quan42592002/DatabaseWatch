var files;
var myController = {

    init: function () {
        myController.resetForm();
        myController.LoadTable();
        myController.RegesterEvent();
    },


    RegesterEvent: function () {

        $('#duong_dan_tai_lieu').filestyle({
            text: '',
            dragdrop: false,
            placeholder: 'Không có tệp đính kèm nào',
            btnClass: 'btn-success cssFile',
            htmlIcon: '<span class="bi bi-inbox"></span> ',
        });

        $('#duong_dan_tai_lieu').on('change', function (e) {
            files = e.target.files;
            if (files.length > 0) {

                for (var x = 0; x < files.length; x++) {
                    if (files[x].size >= 52428800) {
                        XNoti_CanhBao('Chỉ được upload file dưới 50mb', 'Thông báo');
                        $("#duong_dan_tai_lieu").filestyle('clear');
                        $("#duong_dan_tai_lieu").filestyle('placeholder', "Không có tệp đính kèm nào");
                        $('#is_thay_doi').val('true');
                        return;
                    }
                    $('#is_thay_doi').val('true');
                }
            }
        });

        $("#btn_TaoMoi").off("click").on("click", function () {
            myController.resetForm();
        });

        $("#btn_SaveData").off("click").on("click", function () {
            myController.SaveData();
        });

        $("#cbPhanLoai").off("change").on("change", function () {
            myController.LoadTable();
        });

    },

    resetForm: function () {
        $("#Id").val(0);
        $("#SoThuTu").val("");
        $("#TenGoi").val("");
        $("#urlAnh").attr('src', '/UpLoad/Public/3135715.png');
        $("#urlAnh").css('width', '50%');
        $("#urlAnh").css('border-radius', '0%');
    },

    LoadTable: function (page = 1) {
        var cbPhanLoai = $("#cbPhanLoai").val();

        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DanhMuc/LoadTable.php?page=' + page,
            method: 'GET',
            data: {
                cbPhanLoai: cbPhanLoai
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    var html = "";

                    $.each(datax, function (index, value) {
                        html += "<tr><td>" + value.Id + "</td>" +
                            "<td>" + value.SoThuTu + "</td>" +
                            "<td>" + value.TenGoi + "</td>" +
                            "<td>" +
                            '<div>' +
                            '<a class="btn btn-sm btn-primary" title="Xem thông tin" href="javascript:myController.LoadDetail(' + value.Id + ')" ><i class="bi bi-pencil"></i></a>' +
                            '<a class="btn btn-sm btn-danger" title="Xem thông tin" style="margin-left: 5px;" href="javascript:myController.DeleteData(' + value.Id + ')"><i class="bi bi-trash"></i></a>' +
                            '</div>' +
                            "</td>" +
                            "</tr>";
                    });

                    $("#tbl_ThuongHieu").html(html);

                    // Phân trang
                    var totalPages = Math.ceil(response.total_items / response.items_per_page);
                    var currentPage = response.current_page;

                    var paginationHtml = "";
                    for (var i = 1; i <= totalPages; i++) {
                        if (i === currentPage) {
                            paginationHtml += '<a href="javascript:myController.LoadTable(' + i + ')" style="background-color: #0056b3;">' + i + '</a>';
                        } else {
                            paginationHtml += '<a href="javascript:myController.LoadTable(' + i + ')">' + i + '</a>';
                        }
                    }

                    $(".pagination").html(paginationHtml);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    LoadDetail: function (Id) {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DanhMuc/LoadDetail.php',
            method: 'Get',
            data: {
                Id: Id,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    if (datax != null) {
                        $("#Id").val(datax.Id);
                        $("#SoThuTu").val(datax.SoThuTu);
                        $("#TenGoi").val(datax.TenGoi);
                        if (datax.UrlAnh != "" || datax.UrlAnh != 'null') {
                            $("#urlAnh").attr('src', datax.UrlAnh);
                            $("#urlAnh").css('width', '100%')
                            $("#urlAnh").css('border-radius', '0%')
                        } else {
                            $("#urlAnh").attr('src', "http://localhost:3000/UpLoad/Public/3135715.png");
                            $("#urlAnh").css('width', '100%');
                            $("#urlAnh").css('border-radius', '0%');
                        }
                    }
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    SaveData: function () {
        var Id = $("#Id").val();
        var cbPhanLoai = $("#cbPhanLoai").val();
        if (cbPhanLoai == "") {
            alert("Bạn chưa chọn phân loại");
            return;
        }
        var files = $("#duong_dan_tai_lieu")[0].files; // Khai báo biến files bên trong hàm

        if (files != undefined && files.length > 0) {
            if (window.FormData !== undefined) {
                var formData = new FormData();

                for (var x = 0; x < files.length; x++) {
                    if (files[x].size >= 52428800) {
                        alert('Chỉ được upload file dưới 50MB', 'Thông báo');
                        $('#duong_dan_tai_lieu').val("");
                        return;
                    }
                    formData.append('duong_dan_tai_lieu[]', files[x]); // Sử dụng mảng để gửi nhiều tệp
                }
                // Thêm các thông tin khác vào formData
                formData.append("SoThuTu", $("#SoThuTu").val());
                formData.append("TenGoi", $("#TenGoi").val());
                formData.append("cbPhanLoai", $("#cbPhanLoai").val());
                formData.append("Id", $("#Id").val());
                if (Id == 0) {
                    $.ajax({
                        type: "POST",
                        url: 'http://localhost:3000/Controller/admin/Crud/DanhMuc/InsertData.php',
                        contentType: false,
                        processData: false,
                        data: formData, // Sử dụng formData để gửi tệp
                        success: function (response) {
                            if (response.status == true) {
                                alert("Thành công");
                                myController.LoadTable();
                            } else {
                                alert("Có lỗi xảy ra");
                            }
                        },
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: 'http://localhost:3000/Controller/admin/Crud/DanhMuc/EditData.php',
                        contentType: false,
                        processData: false,
                        data: formData, // Sử dụng formData để gửi tệp
                        success: function (response) {
                            if (response.status) {
                                alert("Thành công");
                                myController.LoadTable();
                            } else {
                                alert("Có lỗi xảy ra");
                            }
                        },
                    });
                }
            } else {
                alert("Trình duyệt không hỗ trợ FormData. Upload file thất bại!");
            }
        } else {
            if (Id == 0) {
                $.ajax({
                    url: 'http://localhost:3000/Controller/admin/Crud/DanhMuc/InsertData.php',
                    method: 'Post',
                    data: {
                        SoThuTu: $("#SoThuTu").val(),
                        TenGoi: $("#TenGoi").val(),
                        cbPhanLoai: $("#cbPhanLoai").val(),
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status) {
                            alert("Thành công");
                            myController.LoadTable();
                        } else {
                            alert("Có lỗi xảy ra");
                        }
                    },
                });
            } else {
                $.ajax({
                    url: 'http://localhost:3000/Controller/admin/Crud/ThuongHieu/EditData.php',
                    method: 'Post',
                    data: {
                        Id: Id,
                        SoThuTu: $("#SoThuTu").val(),
                        TenGoi: $("#TenGoi").val(),
                        cbPhanLoai: $("#cbPhanLoai").val(),
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status) {
                            alert("Thành công");
                            myController.LoadTable();
                        } else {
                            alert("Có lỗi xảy ra");
                        }
                    },
                });
            }
        }
    }
};
myController.init();