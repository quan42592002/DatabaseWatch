var files;
var myController = {

    init: function () {
        $("#modal-DongHo").hide();
        myController.LoadData();
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

        $('#duong_dan_tai_lieu2').filestyle({
            text: 'Đính kèm tệp',
            dragdrop: false,
            placeholder: 'Không có tệp đính kèm nào',
            btnClass: 'btn-primary cssFile',
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
            $("#modal-DongHo").show();
            myController.resetForm();
        });

        $("#btn_CapNhapDuLieu").off("click").on("click", function () {
            myController.UpdateData();
        });

        $("#btn_TaoChiTiet").off("click").on("click", function () {
            myController.SaveNewChiTiet();
        });

        $("#btn_Thoat").off("click").on("click", function () {
            $("#modal-DongHo").hide();
        });

        $("#btn_Save").off("click").on("click", function () {
            myController.SaveData();
        });

        $("#order_gia").off("change").on("change", function () {
            myController.LoadTable();
        });

        $("#btn_UploadFile").off("click").on("click", function () {
            myController.SaveNewChiTietFile();
        });

    },

    resetForm: function () {
        $("#IdDongHo").val(0);
        $("#TenDongHo").val("");
        $("#NamNu").val("Nam");
        $("#KieuDang").val("");
        $("#SoLuong").val("0");
        $("#LoaiDay").val("");
        $("#GiaMua").val("");
        $("#GiaBan").val("");
        $("#GiamGia").val("");
        $("#urlAnh").attr('src', "http://localhost:3000/UpLoad/Public/3135715.png");
        $("#urlAnh").css('border-radius', '0%');
        $("#tbl_ChiTietDongHo").html("");
        $("#btn_CapNhapDuLieu").hide();
        $("#btn_Save").show();
        $("#btn_CapNhapChiTiet").hide();
        $(".modal-table-file").hide();
        $(".modal-table-chitiet").hide();

    },

    LoadData: function () {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/LoadData.php',
            method: 'Get',
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var lstLoaiDay = response.lstLoaiDay;
                    var lstThuongHieu = response.lstThuongHieu;
                    var lstKieuDang = response.lstKieuDang;

                    if (lstLoaiDay != null) {
                        var option = "<option value=''>-- Chọn Loại dây --</option>";
                        $.each(lstLoaiDay, function (index, value) {
                            option += "<option value='" + value.TenGoi + "'>" + (index + 1) + ". " + value.TenGoi + "</option>";
                        });
                        $("#LoaiDay").html(option);
                    }

                    if (lstThuongHieu != null) {
                        var option = "<option value=''>-- Chọn thương hiệu --</option>";
                        $.each(lstThuongHieu, function (index, value) {
                            option += "<option value='" + value.TenGoi + "'>" + (index + 1) + ". " + value.TenGoi + "</option>";
                        });
                        $("#ThuongHieu").html(option);
                    }

                    if (lstKieuDang != null) {
                        var option = "<option value=''>-- Chọn kiểu dáng --</option>";
                        $.each(lstKieuDang, function (index, value) {
                            option += "<option value='" + value.TenGoi + "'>" + (index + 1) + ". " + value.TenGoi + "</option>";
                        });
                        $("#KieuDang").html(option);

                        // var data = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];

                        // $("#KieuDang").select2({
                        //     data: data
                        // })
                    }

                    myController.LoadTable();

                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    LoadTable: function (page = 1) {

        var order_gia = $("#order_gia").val();

        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/LoadTable.php?page=' + page,
            method: 'GET',
            data: {
                order_gia: order_gia,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    var html = "";

                    $.each(datax, function (index, value) {
                        html += "<tr>" +
                           "<td><img src='" + value.Url_anh + "' width='65spx'></td>" +
                            "<td>" + value.TenDongHo + "</td>" +
                            "<td>" + value.ThuongHieu + "</td>" +
                            "<td>" + value.NamNu + "</td>" +
                            "<td>" + value.GiaMua + "</td>" +
                            "<td>" + value.GiaBan + "</td>" +
                            "<td>" +
                            '<div>' +
                            '<a class="btn btn-primary btn-sm" title="Xem thông tin" style="border-radius: 20px;" href="javascript:myController.LoadDetail(' + value.IdDongHo + ')" ><i class="bi bi-pencil"></i></a>' +
                            '<a class="btn btn-success btn-sm" title="Xem thông tin" style="margin-left: 5px;border-radius: 20px;" href="javascript:myController.LoadDetailFile(' + value.IdDongHo + ')" ><i class="bi bi-file-earmark-plus"></i></a>' +
                            '<a class="btn btn-danger btn-sm" title="Xóa đồng hồ" style="margin-left: 5px;border-radius: 20px;" href="javascript:myController.DeleteData(' + value.IdDongHo + ')"><i class="bi bi-trash"></i></a>' +
                            '</div>' +
                            "</td>" +
                            "</tr>";
                    });

                    $("#tbl_DongHo").html(html);

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

    LoadDetail: function (IdDongHo) {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/LoadDetail.php',
            method: 'Get',
            data: {
                IdDongHo: IdDongHo,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    if (datax != null) {
                        $("#IdDongHo").val(datax.IdDongHo);
                        $("#TenDongHo").val(datax.TenDongHo);
                        $("#KieuDang").val(datax.KieuDang);
                        $("#LoaiDay").val(datax.LoaiDay);
                        $("#ThuongHieu").val(datax.ThuongHieu);
                        $("#NamNu").val(datax.NamNu);
                        $("#SoLuong").val(datax.SoLuong);
                        $("#GiaMua").val(datax.GiaMua);
                        $("#GiaBan").val(datax.GiaBan);
                        $("#GiamGia").val(datax.GiamGia);

                        if (datax.Url_anh == "") {
                            $("#urlAnh").attr('src', "http://localhost:3000/UpLoad/Public/3135715.png");
                            $("#urlAnh").css('border-radius', '0%');
                        } else {
                            $("#urlAnh").attr('src', datax.Url_anh);
                            $("#urlAnh").css('border-radius', '0%')
                        }
                        
                        $(".modal-table-chitiet").show();
                        $(".modal-table-file").hide();
                        $("#modal-DongHo").show();
                        $("#btn_CapNhapDuLieu").show();
                        $("#btn_Save").hide();
                        myController.LoadDetailChiTiet(datax.IdDongHo);
                        myController.UpdateSoLuong(datax.IdDongHo);
                    }
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    LoadTableFile: function () {
        var IdDongHo = $("#IdDongHo").val();
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/LoadTableFile.php',
            method: 'GET',
            dataType: 'json',
            data: {
                IdDongHo: IdDongHo,
            },
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    var html = "";

                    $.each(datax, function (index, value) {
                        html += "<tr>" +
                           "<td><img src='" + value.UrlFile + "' width='65spx'></td>" +
                            "<td>" + value.NameFile + "</td>" +
                            "<td> <input type='checkbox' checked></td>" +
                            "<td>" +
                            '<div>' +
                            '<a class="btn btn-danger btn-sm" title="Xem thông tin" style="margin-left: 5px;" href="javascript:myController.DeleteChiTiet(' + value.IdChiTietDongHo + ')"><i class="bi bi-trash"></i></a>' +
                            '</div>' +
                            "</td>" +
                            "</tr>";
                    });

                    $("#tbl_DinhKemFile").html(html);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    LoadDetailFile: function (IdDongHo) {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/LoadDetail.php',
            method: 'Get',
            data: {
                IdDongHo: IdDongHo,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    if (datax != null) {
                        $("#IdDongHo").val(datax.IdDongHo);
                        $("#TenDongHo").val(datax.TenDongHo);
                        $("#KieuDang").val(datax.KieuDang);
                        $("#LoaiDay").val(datax.LoaiDay);
                        $("#ThuongHieu").val(datax.ThuongHieu);
                        $("#NamNu").val(datax.NamNu);
                        $("#SoLuong").val(datax.SoLuong);
                        $("#GiaMua").val(datax.GiaMua);
                        $("#GiaBan").val(datax.GiaBan);
                        $("#GiamGia").val(datax.GiamGia);

                        if (datax.Url_anh == "") {
                            $("#urlAnh").attr('src', "http://localhost:3000/UpLoad/Public/3135715.png");
                            $("#urlAnh").css('border-radius', '0%');
                        } else {
                            $("#urlAnh").attr('src', datax.Url_anh);
                            $("#urlAnh").css('border-radius', '0%')
                        }
                        
                        $(".modal-table-file").show();
                        $(".modal-table-chitiet").hide();
                        $("#modal-DongHo").show();
                        $("#btn_CapNhapDuLieu").show();
                        $("#btn_Save").hide();
                        myController.LoadTableFile();
                    }
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    UpdateSoLuong: function (IdDongHo) {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/UpdateSoLuong.php',
            method: 'Get',
            data: {
                IdDongHo: IdDongHo,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    if (datax != null) {
                        $("#SoLuong").val(datax);

                        if (datax == 1 || datax == "1") {
                            $("#btn_CapNhapChiTiet").show();
                            $("#btn_TaoChiTiet").hide();
                        } else {
                            $("#btn_CapNhapChiTiet").hide();
                            $("#btn_TaoChiTiet").show();
                        }

                    }
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    SaveNewChiTiet: function () {
        var IdDongHo = $("#IdDongHo").val();
        if (IdDongHo <= 0) {
            alert("Bạn chưa có thông tin đồng hồ");
            return;
        }
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/SaveNewChiTiet.php',
            method: 'Post',
            data: {
                IdDongHo: IdDongHo,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    alert("Thêm mới thành công");
                    myController.LoadDetailChiTiet(IdDongHo);
                    myController.UpdateSoLuong(IdDongHo);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    SaveNewChiTietFile: function () {
        var IdDongHo = $("#IdDongHo").val();
        if (IdDongHo <= 0) {
            alert("Bạn chưa có thông tin đồng hồ");
            return;
        }

        var files = $("#duong_dan_tai_lieu2")[0].files; // Khai báo biến files bên trong hàm

        if (files != undefined && files.length > 0) {
            if (window.FormData !== undefined) {
                var formData = new FormData();

                for (var x = 0; x < files.length; x++) {
                    if (files[x].size >= 52428800) {
                        alert('Chỉ được upload file dưới 50MB', 'Thông báo');
                        $('#duong_dan_tai_lieu2').val("");
                        return;
                    }
                    formData.append('duong_dan_tai_lieu2[]', files[x]); // Sử dụng mảng để gửi nhiều tệp
                }
                // Thêm các thông tin khác vào formData
                formData.append("IdDongHo", IdDongHo);
                $.ajax({
                    type: "POST",
                    url: 'http://localhost:3000/Controller/admin/Crud/DongHo/SaveNewChiTietFile.php',
                    contentType: false,
                    processData: false,
                    data: formData, // Sử dụng formData để gửi tệp
                    success: function (response) {
                        if (response.status == true) {
                            alert("Upload Thành công");
                        } else {
                            alert("Có lỗi xảy ra");
                        }
                    },
                });
            } else {
                alert("Trình duyệt không hỗ trợ FormData. Upload file thất bại!");
            }
        }else{
            alert("Chưa có file nào được đính kèm");
        }
    },

    DeleteChiTiet: function (IdChiTietDongHo) {
        var IdDongHo = $("#IdDongHo").val();
        if (IdChiTietDongHo <= 0) {
            alert("Bạn chưa có thông tin");
            return;
        }
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/DeleteChiTiet.php',
            method: 'Post',
            data: {
                IdChiTietDongHo: IdChiTietDongHo,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    alert("Xóa thành công thành công");
                    myController.LoadDetailChiTiet(IdDongHo);
                    myController.UpdateSoLuong(IdDongHo);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    LoadDetailChiTiet: function (IdDongHo) {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/LoadDetailChiTiet.php',
            method: 'GET',
            data: {
                IdDongHo: IdDongHo,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    var html = "";

                    $.each(datax, function (index, value) {

                        if (value.Imei == null || value.Imei == "null") {
                            html += "<tr><td><input type='text' class='form-control' placeholder='vd: BI1054-12E-0'></td>" +
                                "<td><input type='text' class='form-control' value ='" + value.BaoHanh + "'></td>" +
                                "<td><input type='date' class='form-control' value ='" + value.NgayBaoHanhTu + "'disabled></td>" +
                                "<td><input type='date' class='form-control' value ='" + value.NgayBaoHanhDen + "'disabled></td>" +
                                "<td>" +
                                '<div>' +
                                '<a class="btn btn-danger btn-sm" title="Xem thông tin" style="margin-left: 5px;" href="javascript:myController.DeleteChiTiet(' + value.IdChiTietDongHo + ')"><i class="bi bi-trash"></i></a>' +
                                '</div>' +
                                "</td>" +
                                "</tr>";
                        } else {
                            html += "<tr><td><input type='text' class='form-control' value ='" + value.Imei + "'></td>" +
                                "<td><input type='text' class='form-control' value ='" + value.BaoHanh + "'></td>" +
                                "<td><input type='date' class='form-control' value ='" + value.NgayBaoHanhTu + "'disabled></td>" +
                                "<td><input type='date' class='form-control' value ='" + value.NgayBaoHanhDen + "'disabled></td>" +
                                "<td>" +
                                '<div>' +
                                '<a class="btn btn-danger btn-sm" title="Xem thông tin" style="margin-left: 5px;" href="javascript:myController.DeleteChiTiet(' + value.IdChiTietDongHo + ')"><i class="bi bi-trash"></i></a>' +
                                '</div>' +
                                "</td>" +
                                "</tr>";
                        }

                    });

                    $("#tbl_ChiTietDongHo").html(html);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    UpdateData: function () {
        var IdDongHo = $("#IdDongHo").val();
        var TenDongHo = $("#TenDongHo").val();
        var NamNu = $("#NamNu").val();
        var SoLuong = $("#SoLuong").val();
        var KieuDang = $("#KieuDang").val();
        var LoaiDay = $("#LoaiDay").val();
        var GiaMua = $("#GiaMua").val();
        var GiaBan = $("#GiaBan").val();
        var GiamGia = $("#GiamGia").val();
        var ChongNuoc = $("#ChongNuoc").val();
        var ThuongHieu = $("#ThuongHieu").val();

        var objData = {
            IdDongHo: IdDongHo,
            TenDongHo: TenDongHo,
            NamNu: NamNu,
            SoLuong: SoLuong,
            KieuDang: KieuDang,
            LoaiDay: LoaiDay,
            GiaMua: GiaMua,
            GiaBan: GiaBan,
            GiamGia: GiamGia,
            ChongNuoc: ChongNuoc,
            ThuongHieu: ThuongHieu,
        };

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
                formData.append("strJson", JSON.stringify(objData));

                $.ajax({
                    type: "POST",
                    url: 'http://localhost:3000/Controller/admin/Crud/DongHo/UpdateData.php',
                    contentType: false,
                    processData: false,
                    data: formData, // Sử dụng formData để gửi tệp
                    success: function (response) {
                        if (response.status) {
                            alert("Cập nhập thành công");
                            myController.LoadTable();
                        } else {
                            alert("Có lỗi xảy ra");
                        }
                    },
                });

            } else {
                alert("Trình duyệt không hỗ trợ FormData. Upload file thất bại!");
            }
        } else {
            $.ajax({
                type: "POST",
                url: 'http://localhost:3000/Controller/admin/Crud/DongHo/UpdateData.php',
                data: {
                    strJson: JSON.stringify(objData),
                },
                success: function (response) {
                    if (response.status) {
                        alert("Cập nhập thành công");
                        myController.LoadTable();
                    } else {
                        alert("Có lỗi xảy ra");
                    }
                },
            });
        }
    },

    SaveData: function () {
        var IdDongHo = $("#IdDongHo").val();
        var TenDongHo = $("#TenDongHo").val();
        var NamNu = $("#NamNu").val();
        var SoLuong = $("#SoLuong").val();
        var KieuDang = $("#KieuDang").val();
        var LoaiDay = $("#LoaiDay").val();
        var GiaMua = $("#GiaMua").val();
        var GiaBan = $("#GiaBan").val();
        var GiamGia = $("#GiamGia").val();
        var ChongNuoc = $("#ChongNuoc").val();
        var ThuongHieu = $("#ThuongHieu").val();

        var objData = {
            IdDongHo: IdDongHo,
            TenDongHo: TenDongHo,
            NamNu: NamNu,
            SoLuong: SoLuong,
            KieuDang: KieuDang,
            LoaiDay: LoaiDay,
            GiaMua: GiaMua,
            GiaBan: GiaBan,
            GiamGia: GiamGia,
            ChongNuoc: ChongNuoc,
            ThuongHieu: ThuongHieu,
        };

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
                formData.append("strJson", JSON.stringify(objData));
                $.ajax({
                    type: "POST",
                    url: 'http://localhost:3000/Controller/admin/Crud/DongHo/Insert.php',
                    contentType: false,
                    processData: false,
                    data: formData, // Sử dụng formData để gửi tệp
                    success: function (response) {
                        if (response.status == true) {
                            alert("Thành công");
                            myController.LoadTable();
                            $("#modal-DongHo").hide();
                        } else {
                            alert("Có lỗi xảy ra");
                        }
                    },
                });
            } else {
                alert("Trình duyệt không hỗ trợ FormData. Upload file thất bại!");
            }
        }
    }
};
myController.init();