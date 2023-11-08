var myController = {

    init: function () {
        myController.LoadDongHo();

    },

    AddShopping: function (IdChiTietDongHo) {
        var UsersId = $("#UsersId").val();
        if (UsersId == "" || UsersId == null || UsersId == undefined) {
            Swal.fire({
                title: "Thất bại!",
                text: "Bạn cần phải đăng nhập tài khoản",
                icon: "error"
            });
            return;
        }
        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/GioHang/AddGioHang.php',
            method: 'Post',
            data: {
                IdChiTietDongHo: IdChiTietDongHo,
                UsersId: UsersId,
            },
            dataType: 'json',
            success: function (response) {
                Swal.fire({
                    title: "Thành công!",
                    text: "Thêm thành công vào giỏ hàng!Hãy nhập vào giỏ hàng mua ngay nhé",
                    icon: "success"
                }).then((result) => {
                    if (result.value == true) {
                        window.location.href = "http://localhost:3000/main.php";
                    }
                });
            },
            Error: function (response) {
                alert("Có lỗi sảy ra")
            }
        });
    },

    LoadDongHo: function () {
        var UsersId = $("#UsersId").val();
        $.ajax({
            // đường dẫn xử lý 
            url: 'http://localhost:3000/Controller/user/Crud/DongHo/LoadDongHo.php',
            method: 'Get', // 
            data: {
                UsersId: UsersId
            },
            dataType: 'json',
            success: function (response) {
                if (response.status == true) {
                    var lstDongHo = response.lstDongHo;

                    if (lstDongHo != null) {
                        var html = '';
                        var template = $('#data-dong-ho-main').html();

                        $.each(lstDongHo, function (i, item) {
                            html += Mustache.render(template, {
                                TenDongHo: item.NamNu == "Nam" ? item.TenDongHo + " 42mm Nam " + item.Imei : item.TenDongHo + " 38mm Nữ " + item.Imei,
                                GiaBan: myController.formatCurrency(item.GiaBan),
                                Url_anh: item.Url_anh,
                                GiamGia: item.GiamGia,
                                GiaGiam: myController.formatCurrency( String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan)) ),
                                IdChiTietDongHo: item.IdChiTietDongHo
                            });
                        });

                        $('#lstDuLieuMain').html(html);
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