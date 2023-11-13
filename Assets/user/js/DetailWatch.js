var myController = {

    init: function () {
        myController.LoadDongHo();
        myController.LoadDetail();
    },

    LoadDongHo: function () {
        $.ajax({
            // đường dẫn xử lý 
            url: 'http://localhost:3000/Controller/user/Crud/DongHo/LoadDongHo.php',
            method: 'Get', // 
            dataType: 'json',
            success: function (response) {
                if (response.status == true) {
                    var lstDongHo = response.lstDongHo;

                    if (lstDongHo != null) {
                        var html = '';
                        var template = $('#data-dong-ho-main').html();

                        $.each(lstDongHo, function (i, item) {
                            html += Mustache.render(template, {
                                TenDongHo: item.NamNu == "Nam" ? item.TenDongHo + " 42mm Nam " + item.MaDongHo + (item.SoLuong > 0 ? "( Còn Hàng )" : "( Tạm Hết )")
                                    : item.TenDongHo + " 38mm Nữ " + item.MaDongHo + (item.SoLuong > 0 ? " (Còn Hàng) " : "( Tạm Hết )"),
                                GiaBan: myController.formatCurrency(item.GiaBan),
                                Url_anh: item.Url_anh,
                                GiamGia: item.GiamGia,
                                SoLuong: item.SoLuong,
                                GiaGiam: myController.formatCurrency(String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan))),
                                IdChiTietDongHo: item.IdChiTietDongHo,
                                IdDongHo: item.IdDongHo
                            });
                        });

                        $('#lstDuLieu').html(html);
                    }
                }
            },
        });
    },

    LoadDetail: function () {
        var IdDongHo = $("#IdDongHo").val();
        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/DongHo/LoadDetail.php',
            method: 'Get',
            data: {
                IdDongHo: IdDongHo,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var lstData = response.lstData;
                    
                    if (lstData != null) {
                        var TenDongHoMain = lstData.NamNu == "Nam" ? lstData.TenDongHo + " 42mm Nam " + lstData.MaDongHo : lstData.TenDongHo + " 38mm Nữ " + lstData.MaDongHo;
                        var GiaGiam = myController.formatCurrency(String(parseInt(((lstData.GiaBan * lstData.GiamGia) / 100)) + parseInt(lstData.GiaBan)));
                        $("#TenDongHo").html(lstData.TenDongHo);
                        $("#ThuongHieu").html(lstData.ThuongHieu);
                        $("#SoLuong").html(lstData.SoLuong);
                        $("#TenDongHoMain").html(TenDongHoMain);
                        $("#GiaBan").html(myController.formatCurrency(lstData.GiaBan));
                        $("#GiaGiam").html(GiaGiam);
                        $("#GiaGiam").html(GiaGiam);
                        $("#btnThemGio").html('<a class="btn btn-primary" href="javascript:myController.AddShopping(' + lstData.IdDongHo + "," + lstData.SoLuong + ')"><i class="bi bi-basket"></i> Thêm vào giỏ hàng</a>');
                        $("#discountSP").html("- " + lstData.GiamGia + "%");
                        $("#urlFlieAnh").attr('src', lstData.Url_anh);
                        $("#urlFlieAnh").css('border-radius', '0%')
                        var IdDongHo = lstData.IdDongHo;
                        $(document).ready(function () {
                            myController.LoadAnh(IdDongHo);
                        });
                    }


                }
            },
        });
    },

    AddShopping: function (IdDongHo, SoLuong) {
        var UsersId = $("#UsersId").val();
        if (UsersId == "" || UsersId == null || UsersId == undefined) {
            Swal.fire({
                title: "Thất bại!",
                text: "Bạn cần phải đăng nhập tài khoản",
                icon: "error"
            });
            return;
        }

        if (SoLuong <= 0) {
            Swal.fire({
                title: "Thêm vào giỏ hàng thất bại!",
                text: "Sản phẩm này đang tạm hết ! Bạn không thể thêm xin lỗi vì sự bất tiện này",
                icon: "error"
            });
            return;
        }

        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/GioHang/AddGioHang.php',
            method: 'Post',
            data: {
                IdDongHo: IdDongHo,
                UsersId: UsersId,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status == true) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Thêm thành công vào giỏ hàng!Hãy nhập vào giỏ hàng mua ngay nhé",
                        icon: "success"
                    })
                } else {
                    Swal.fire({
                        title: "Thêm vào giỏ hàng thất bại!",
                        text: "Số lượng bạn đặt không đủ để đáp ứng ! Bạn không thể thêm xin lỗi vì sự bất tiện này",
                        icon: "error"
                    });
                    return;
                }
            },
            Error: function (response) {
                alert("Có lỗi sảy ra")
            }
        });
    },

    LoadAnh: function (IdDongHo) {
        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/DongHo/LoadAnhDetail.php',
            method: 'Get',
            data: {
                IdDongHo: IdDongHo,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var lstData = response.datax;
                    if (lstData != null) {
                        var html = '';
                        var template = $('#data-anh-san-pham').html();
                        $.each(lstData, function (i, item) {
                            html += Mustache.render(template, {
                                UrlFile: item.UrlFile,
                            });
                        });
                        $('#lstAnhSanPham').html(html);
                    }
                }
            },
        });
    },

    formatCurrency: function (number) {
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return n2.split('').reverse().join('') + ' VNĐ';
    }
}
myController.init();