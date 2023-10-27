var files;
var myController = {

    init: function () {
        $("#modal-DongHo").hide();
        myController.LoadData();
        myController.RegesterEvent();
    },


    RegesterEvent: function () {

        $(".js-example-tags").select2({
            width: "100%",
            allowClear: true
        });


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
            $("#modal-DongHo").show();
            myController.resetForm();
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
                            option += "<option value='" + value.TenGoi + "'>" + value.TenGoi + "</option>";
                        });
                        $("#LoaiDay").html(option);
                    }

                    if (lstThuongHieu != null) {
                        var option = "<option value=''>-- Chọn thương hiệu --</option>";
                        $.each(lstThuongHieu, function (index, value) {
                            option += "<option value='" + value.IdThuongHieu + "'>" + value.TenGoi + "</option>";
                        });
                        $("#ThuongHieu").html(option);
                    }

                    if (lstKieuDang != null) {
                        var option = "<option value=''>-- Chọn kiểu dáng --</option>";
                        $.each(lstKieuDang, function (index, value) {
                            option += "<option value='" + value.TenGoi + "'>" + value.TenGoi + "</option>";
                        });
                        $("#KieuDang").html(option);
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
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/LoadTable.php?page=' + page,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    var html = "";

                    $.each(datax, function (index, value) {
                        html += "<tr><td>" + value.TenDongHo + "</td>" +
                            "<td>" + value.TenGoi + "</td>" +
                            "<td>" + value.NamNu + "</td>" +
                            "<td>" + value.GiaMua + "</td>" +
                            "<td>" + value.GiaBan + "</td>" +
                            "<td>" +
                            '<div>' +
                            '<a class="btn btn-success" title="Xem thông tin" href="javascript:myController.LoadDetail(' + value.IdDongHo + ')" ><i class="bi bi-pencil"></i></a>' +
                            '<a class="btn btn-primary" title="Xem thông tin" style="margin-left: 5px;" href="javascript:myController.DeleteData(' + value.IdDongHo + ')"><i class="bi bi-trash"></i></a>' +
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
                        $("#KieuDang").val(datax.KieuDang).trigger("change");
                        $("#IdThuongHieu").val(datax.IdThuongHieu).trigger("change");
                        $("#NamNu").val(datax.NamNu);
                        $("#SoLuong").val(datax.SoLuong);
                        $("#GiaMua").val(datax.GiaMua);
                        $("#GiaBan").val(datax.GiaBan);
                        $("#GiamGia").val(datax.GiamGia);
                        $("#IdThuongHieu").trigger("change");
                        $("#KieuDang").trigger("change");

                        $("#urlAnh").attr('src', datax.Url_anh);
                        $("#urlAnh").css('border-radius', '0%')

                        $("#modal-DongHo").show();
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
                        html += "<tr><td><input type='text' class='form-control' value ='" + value.Imei + "'></td>" +
                            "<td><input type='text' class='form-control' value ='" + value.BaoHanh + "'></td>" +
                            "<td><input type='date' class='form-control' value ='" + value.NgayBaoHanhTu + "'disabled></td>" +
                            "<td><input type='date' class='form-control' value ='" + value.NgayBaoHanhDen + "'disabled></td>" +
                            "<td>" +
                            '<div>' +
                            '<a class="btn btn-danger" title="Xem thông tin" style="margin-left: 5px;" href="javascript:myController.DeleteChiTiet(' + value.IdChiTietDongHo + ')"><i class="bi bi-trash"></i></a>' +
                            '</div>' +
                            "</td>" +
                            "</tr>";
                    });

                    $("#tbl_ChiTietDongHo").html(html);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
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
                if (IdDongHo == 0) {
                    $.ajax({
                        type: "POST",
                        url: 'http://localhost:8000/Controller/admin/Crud/DongHo/Insert.php',
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
        }
    }
};
myController.init();