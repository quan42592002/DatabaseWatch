var myController = {

    init: function () {
        myController.LoadData();
    },

    LoadData: function () {
        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/GioHang/LoadData.php',
            method: 'Get', 
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var lstGioHang = response.lstGioHang;
                    if (lstGioHang != null) {
                        var html = '';
                        var template = $('#data-gio-hang').html();

                        $.each(lstGioHang, function (i, item) {
                            html += Mustache.render(template, {
                                Url_anh: item.Url_anh,
                            });
                        });

                        $('#frm').html(html);
                    }
                }
            },
        });
    }
}
myController.init();