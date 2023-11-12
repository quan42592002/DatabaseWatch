var myController = {

    init: function () {
        myController.LoadDetail();
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
                        $("#TenDongHoMain").html(TenDongHoMain);
                        $("#GiaBan").html(myController.formatCurrency(lstData.GiaBan));
                        $("#GiaGiam").html(GiaGiam);
                        $("#discountSP").html("- " + lstData.GiamGia + "%");

                        var IdDongHo = lstData.IdDongHo;
                        $(document).ready(function () {
                            myController.LoadAnh(IdDongHo);
                        });
                    }


                }
            },
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