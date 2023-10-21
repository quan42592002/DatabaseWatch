var files;
var myController = {

    init: function () {
        myController.resetForm();
        myController.LoadTable();
        myController.RegesterEvent();
    },


    RegesterEvent: function () {

        $('#duong_dan_tai_lieu').filestyle({
            text: 'Đính kèm tệp',
            dragdrop: false,
            placeholder: 'Không có tệp đính kèm nào',
            btnClass: 'btn-success cssFile',
            htmlIcon: '<span class="fa fa-upload"></span> ',
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
    },

    resetForm: function () {
        $("#IdThuongHieu").val(0);
        $("#SoThuTu").val("");
        $("#TenGoi").val("");
    },

    LoadTable: function () {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/ThuongHieu/LoadTable.php',
            method: 'Get',
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    var html = "";
                    $.each(datax, function (index, value) {
                        html += "<tr><td>" + value.IdThuongHieu + "</td>" +
                            "<td>" + value.Stt + "</td>" +
                            "<td>" + value.TenGoi + "</td>" +
                            "<td>" +
                            '<div>' +
                            '<a class="btn btn-success" title="Xem thông tin" href="javascript:myController.LoadDetail(' + value.IdThuongHieu + ')" ><i class="bi bi-pencil"></i></a>' +
                            '<a class="btn btn-primary " title="Xem thông tin" style="margin-left: 5px;" href="javascript:myController.DeleteData(' + value.IdThuongHieu + ')"><i class="bi bi-trash"></i></a>'
                        '</div>'
                            + "</td>" +
                            "</tr>";
                    });

                    $("#tbl_ThuongHieu").html(html);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    LoadDetail: function (IdThuongHieu) {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/ThuongHieu/DetailBrand.php',
            method: 'Get',
            data: {
                IdThuongHieu: IdThuongHieu,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    if (datax != null) {
                        $("#IdThuongHieu").val(datax.IdThuongHieu);
                        $("#SoThuTu").val(datax.Stt);
                        $("#TenGoi").val(datax.TenGoi);
                        $("#urlAnh").attr('src', datax.UrlAnh);
                        $("#urlAnh").css('width', '100%')
                        $("#urlAnh").css('border-radius', '0%')
                    }
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    SaveData: function () {
        var IdThuongHieu = $("#IdThuongHieu").val();
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
                formData.append("IdThuongHieu", $("#IdThuongHieu").val());
                if (IdThuongHieu == 0) {
                    $.ajax({
                        type: "POST",
                        url: 'http://localhost:3000/Controller/admin/Crud/ThuongHieu/NewBrand.php',
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
                        url: 'http://localhost:3000/Controller/admin/Crud/ThuongHieu/EditBrand.php',
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
                }
            } else {
                alert("Trình duyệt không hỗ trợ FormData. Upload file thất bại!");
            }
        } else {
            if (IdThuongHieu == 0) {
                $.ajax({
                    url: 'http://localhost:3000/Controller/admin/Crud/ThuongHieu/NewBrand.php',
                    method: 'Post',
                    data: {
                        SoThuTu: $("#SoThuTu").val(),
                        TenGoi: $("#TenGoi").val(),
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status) {
                            alert("Thành công");
                            myController.LoadTable();
                        }else {
                            alert("Có lỗi xảy ra");
                        }
                    },
                });
            } else {
                $.ajax({
                    url: 'http://localhost:3000/Controller/admin/Crud/ThuongHieu/EditBrand.php',
                    method: 'Post',
                    data: {
                        IdThuongHieu: IdThuongHieu,
                        SoThuTu: $("#SoThuTu").val(),
                        TenGoi: $("#TenGoi").val(),
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status) {
                            alert("Thành công");
                            myController.LoadTable();
                        }else {
                            alert("Có lỗi xảy ra");
                        }
                    },
                });
            }
        }
    }
};
myController.init();