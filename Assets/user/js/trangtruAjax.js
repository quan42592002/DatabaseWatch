var myController = {

    init: function () {
        myController.LoadDongHo();
    },

    LoadDongHo:function(){
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
                    var template = $('#data-dong-ho').html();

                    $.each(lstDongHo, function (i, item) {
                        html += Mustache.render(template, {
                            TenDongHo: item.TenDongHo,
                            GiaBan: item.GiaBan,
                        });
                    });

                    $('#lstDuLieu').html(html);
                }
              }
            },
        });
    }

}
myController.init();