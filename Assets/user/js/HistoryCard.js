var myGioHang = {
    init: function () {
        myGioHang.LoadData();
    },

    LoadData: function () {
        var UsersId = $("#UsersId").val();
        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/GioHang/LoadData.php',
            method: 'Get',
            data: {
                UsersId: UsersId
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var lstGioHang = response.lstGioHang;
                    if (lstGioHang.length > 0) {
                        var html = '';
                        var template = $('#data-gio-hang').html();
                        var tong_tien = 0;

                        $.each(lstGioHang, function (i, item) {
                            html += Mustache.render(template, {
                                TenDongHo: item.NamNu == "Nam" ? item.TenDongHo + " 42mm Nam " + item.MaDongHo : item.TenDongHo + " 38mm Nữ " + item.MaDongHo,
                                GiaBan: myGioHang.formatCurrency(String(parseInt(item.GiaBan * item.SoLuongMua))),
                                Url_anh: item.Url_anh,
                                GiamGia: item.GiamGia,
                                Id: item.Id,
                                SoLuongMua: item.SoLuongMua,
                                GiaGiam: myGioHang.formatCurrency(String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan))),
                                IdChiTietDongHo: item.IdChiTietDongHo
                            });
                            tong_tien += parseInt(item.GiaBan * item.SoLuongMua);
                        });
                        $('#sub-price').html(myGioHang.formatCurrency(String(tong_tien)));
                        $('#lst_GioHang').html(html);
                    } else {
                        var html = '<div class="alerttb"><div><img src="/UpLoad/Public/empty-cart.png" alt="" width="200px"></div><i class="cartnew-tb"></i><strong>Không có sản phẩm trong giỏ hàng</strong></div>';
                        $('#lst_GioHang').html(html);
                    }
                    myGioHang.Event();
                }
            },
            error: function (error) {
                var html = '<div class="alerttb"><div><img src="/UpLoad/Public/empty-cart.png" alt="" width="200px"></div><i class="cartnew-tb"></i><strong>Không có sản phẩm trong giỏ hàng</strong></div>';
                $('#lst_GioHang').html(html);
            }
        });
    },

   
    formatCurrency: function (number) {
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return n2.split('').reverse().join('') + ' VNĐ';
    }
}
myGioHang.init();

