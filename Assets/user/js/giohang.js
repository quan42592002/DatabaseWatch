var myController = {

    init: function () {
        myController.LoadData();
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
                    if (lstGioHang != null) {
                        var html = '';
                        var template = $('#data-gio-hang').html();

                        $.each(lstGioHang, function (i, item) {
                            html += Mustache.render(template, {
                                TenDongHo: item.NamNu == "Nam" ? item.TenDongHo + " 42mm Nam " + item.Imei : item.TenDongHo + " 38mm Nữ " + item.Imei,
                                GiaBan: myController.formatCurrency(item.GiaBan),
                                Url_anh: item.Url_anh,
                                GiamGia: item.GiamGia,
                                GiaGiam: myController.formatCurrency( String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan)) ),
                                IdChiTietDongHo: item.IdChiTietDongHo
                            });
                        });

                        $('#lst_GioHang').html(html);
                    }
                }
            },
        });
    },
    formatCurrency: function (number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('') + ' VNĐ';
    }
}
myController.init();