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
                        var tong_tien = 0;

                        $.each(lstGioHang, function (i, item) {
                            html += Mustache.render(template, {
                                TenDongHo: item.NamNu == "Nam" ? item.TenDongHo + " 42mm Nam " + item.Imei : item.TenDongHo + " 38mm Nữ " + item.Imei,
                                GiaBan: myController.formatCurrency(item.GiaBan),
                                Url_anh: item.Url_anh,
                                GiamGia: item.GiamGia,
                                Id:item.Id,
                                GiaGiam: myController.formatCurrency( String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan)) ),
                                IdChiTietDongHo: item.IdChiTietDongHo
                            });
                            tong_tien +=  parseInt(item.GiaBan);
                        });
                        $('#sub-price').html(myController.formatCurrency(String(tong_tien)));
                        $('#lst_GioHang').html(html);
                    }
                }
            },
        });
    },
    RemoveCard:function (Id) {
        if (Id <= 0) {
            alert("Không Thể xóa");
            return;
        }
        Swal.fire({
            title: "Bạn muốn bỏ ra khỏi giỏ hàng?",
            text: "Hãy xem xét kỹ trước khi bỏ sản phẩm!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Đồng ý !",
            cancelButtonText: "Thoát"
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'http://localhost:3000/Controller/user/Crud/GioHang/RemoveCard.php',
                    method: 'Post',
                    data: {
                        Id: Id
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status) {
                            Swal.fire({
                                title: "Xóa 1 sản phẩm thành công!",
                                icon: "success"
                              });
                              myController.LoadData();
                        }
                    },
                });
            }
          });
    },

    formatCurrency: function (number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('') + ' VNĐ';
    }
}
myController.init();