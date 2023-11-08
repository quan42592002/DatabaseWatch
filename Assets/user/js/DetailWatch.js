var myController = {

    init: function () {
        myController.LoadDetail();
    },

    LoadDetail: function () {
        var IdChiTietDongHo = $("#IdChiTietDongHo").val();
        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/DongHo/LoadDetail.php',
            method: 'Get',
            data: {
                IdChiTietDongHo: IdChiTietDongHo,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var lstData = response.lstData;

                    if (lstData != null) {
                        var TenDongHoMain = lstData.NamNu == "Nam" ? lstData.TenDongHo + " 42mm Nam " + lstData.Imei : lstData.TenDongHo + " 38mm Nữ " + lstData.Imei;
                        $("#TenDongHo").html(lstData.TenDongHo);
                        $("#TenDongHoMain").html(TenDongHoMain);

                        
                    }
                    // if (lstData != null) {
                    //     var html = '';
                    //     var template = $('#data-gio-hang').html();
                    //     var tong_tien = 0;

                    //     $.each(lstData, function (i, item) {
                    //         html += Mustache.render(template, {
                    //             TenDongHo: item.NamNu == "Nam" ? item.TenDongHo + " 42mm Nam " + item.Imei : item.TenDongHo + " 38mm Nữ " + item.Imei,
                    //             GiaBan: myController.formatCurrency(item.GiaBan),
                    //             Url_anh: item.Url_anh,
                    //             GiamGia: item.GiamGia,
                    //             Id:item.Id,
                    //             GiaGiam: myController.formatCurrency( String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan)) ),
                    //             IdChiTietDongHo: item.IdChiTietDongHo
                    //         });
                    //         tong_tien +=  parseInt(item.GiaBan);
                    //     });
                    //     $('#sub-price').html(myController.formatCurrency(String(tong_tien)));
                    //     $('#lst_GioHang').html(html);
                    // }
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