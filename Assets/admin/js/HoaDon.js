var files;
var myController = {

    init: function () {
        myController.LoadHoaDon();
    },


    RegesterEvent: function () {

    },

    LoadHoaDon: function () {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/HoaDon/LoadHoaDon.php',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    var html = "";

                    $.each(datax, function (index, value) {
                        html += "<tr><td><img src='" + value.Url_anh + "' width='65spx'></td>" +
                            "<td>" + value.TenDongHo + "</td>" +
                            "<td>" + value.SoLuong + "</td>" +
                            "<td>" + value.GiaMua + "</td>" +
                            "<td>" + value.GiaBan + "</td>" +
                            "</tr>";
                    });

                    $("#tbl_HoaDon").html(html);

                    myController.RegesterEvent();
                }
            },
        });
    },

};
myController.init();