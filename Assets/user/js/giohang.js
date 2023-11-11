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
                    if (lstGioHang.length > 0) {
                        var html = '';
                        var template = $('#data-gio-hang').html();
                        var tong_tien = 0;

                        $.each(lstGioHang, function (i, item) {
                            html += Mustache.render(template, {
                                TenDongHo: item.NamNu == "Nam" ? item.TenDongHo + " 42mm Nam " + item.Imei : item.TenDongHo + " 38mm Nữ " + item.Imei,
                                GiaBan: myController.formatCurrency(item.GiaBan),
                                Url_anh: item.Url_anh,
                                GiamGia: item.GiamGia,
                                Id: item.Id,
                                GiaGiam: myController.formatCurrency(String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan))),
                                IdChiTietDongHo: item.IdChiTietDongHo
                            });
                            tong_tien += parseInt(item.GiaBan);
                        });
                        $('#sub-price').html(myController.formatCurrency(String(tong_tien)));
                        $('#lst_GioHang').html(html);
                    } else {
                        var html = '<div class="alerttb"><div><img src="/UpLoad/Public/empty-cart.png" alt="" width="200px"></div><i class="cartnew-tb"></i><strong>Không có sản phẩm trong giỏ hàng</strong></div>';
                        $('#lst_GioHang').html(html);
                    }
                }
            },
            error: function (error) {
                var html = '<div class="alerttb"><div><img src="/UpLoad/Public/empty-cart.png" alt="" width="200px"></div><i class="cartnew-tb"></i><strong>Không có sản phẩm trong giỏ hàng</strong></div>';
                $('#lst_GioHang').html(html);
            }
        });
    },
    RemoveCard: function (Id) {
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

    DatHang: function () {
        var UsersId = $('#UsersId').val();

        if (UsersId == "") {
            Swal.fire({
                title: "Đặt hàng thất bại!",
                icon: "error"
            });
            return;
        }
        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/GioHang/UpdateDatHang.php',
            method: 'Post',
            data: {
                UsersId: UsersId,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    Swal.fire({
                        title: "Đặt hàng thành công!",
                        text: "Hệ thống sẽ sớm xác nhận và trả lời bạn!",
                        icon: "success"
                    });
                    myController.LoadData();
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });

    },

    formatCurrency: function (number) {
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return n2.split('').reverse().join('') + ' VNĐ';
    }
}
myController.init();