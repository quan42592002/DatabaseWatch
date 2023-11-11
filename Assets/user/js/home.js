var myEventHome = {

    init: function () {
        myEventHome.LoadDongHo();
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
                }else{
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

    DetailChiTiet: function (IdChiTietDongHo) {
        window.open('http://localhost:3000/main.php?controller=DetailWatchController&&IdChiTietDongHo=' + IdChiTietDongHo, '_self');
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
                                GiaBan: myEventHome.formatCurrency(item.GiaBan),
                                Url_anh: item.Url_anh,
                                GiamGia: item.GiamGia,
                                SoLuong: item.SoLuong,
                                GiaGiam: myEventHome.formatCurrency(String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan))),
                                IdChiTietDongHo: item.IdChiTietDongHo,
                                IdDongHo: item.IdDongHo
                            });
                        });

                        $('#lstDuLieuMain').html(html);
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
myEventHome.init();