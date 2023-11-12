var myHistory = {
    init: function () {
        myHistory.LoadData();
    },

    LoadData: function () {
        var UsersId = $("#UsersId").val();
        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/GioHang/HistoryCardUser.php',
            method: 'Get',
            data: {
                UsersId: UsersId
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var lstDonHang = response.lstDonHang;
                   
                    if (lstDonHang.length > 0) {
                        $("#hidden-list-1").show();
                        $("#hidden-list").hide();
                        var html = '';
                        var template = $('#data-history').html();
                        var tong_tien = 0;

                        $.each(lstDonHang, function (i, item) {
                            html += Mustache.render(template, {
                                TenDongHo: item.NamNu == "Nam" ? item.TenDongHo + " 42mm Nam " + item.MaDongHo : item.TenDongHo + " 38mm Nữ " + item.MaDongHo,
                                GiaBan: myHistory.formatCurrency(String(parseInt(item.GiaBan * item.SoLuongMua))),
                                Url_anh: item.Url_anh,
                                GiamGia: item.GiamGia,
                                TrangThaiTrue: item.TrangThai == 1 ? " Đặt hàng thành công " : "" , 
                                TrangThaiFalse: item.TrangThai == 0 ? " Đang xử lý " : "" , 
                                Id: item.Id,
                                SoLuongMua: item.SoLuongMua,
                                GiaGiam: myHistory.formatCurrency(String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan))),
                                IdChiTietDongHo: item.IdChiTietDongHo
                            });
                            tong_tien += parseInt(item.GiaBan * item.SoLuongMua);
                        });
                        $('#sub-price').html(myHistory.formatCurrency(String(tong_tien)));
                        $('#lstHistory').html(html);
                    } else {
                        $("#hidden-list-1").hide();
                        $("#hidden-list").show();
                    
                    }
                }
            },
            error: function (error) {
              
            }
        });
    },

   
    formatCurrency: function (number) {
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return n2.split('').reverse().join('') + ' VNĐ';
    }
}
myHistory.init();

