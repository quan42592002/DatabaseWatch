var myGioHang = {
    init: function () {
        myGioHang.Event();
        myGioHang.LoadData();
    },

    Event: function () {
        // Bắt sự kiện click cho nút tăng số lượng
        $(".increase-btn").off('click').on("click", function () {
            var id_update = $(this).siblings(".id_update").val();
            var CbPhanLoai = 1;
            myGioHang.UpdateSoLuong(id_update,CbPhanLoai);
        });

        // Bắt sự kiện click cho nút giảm số lượng
        $(".decrease-btn").off('click').on("click", function () {
            var id_update = $(this).siblings(".id_update").val();
            var inputElement = $(this).siblings(".quantity-input");
            var currentValue = parseInt(inputElement.val());
            if (currentValue == 0) {
                alert("Bạn hãy bấm vào nút xóa");
                return;
            }
            var CbPhanLoai = 0;
            myGioHang.UpdateSoLuong(id_update,CbPhanLoai);
        });
    },

    UpdateSoLuong: function (id_update,CbPhanLoai) {
        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/GioHang/UpdateSoLuong.php',
            method: 'Post',
            data: {
                id_update: id_update,
                CbPhanLoai:CbPhanLoai,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status == true) {
                    Swal.fire({
                        title: "Thành công!",
                        icon: "success"
                    })
                    myGioHang.LoadData();
                } else {
                    Swal.fire({
                        title: "Thêm vào giỏ hàng thất bại!",
                        text: "Số lượng bạn đặt không đủ để đáp ứng ! Bạn không thể thêm xin lỗi vì sự bất tiện này",
                        icon: "error"
                    });
                }
            },
            Error: function (response) {
                alert("Có lỗi sảy ra")
            }
        });
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
                                TenDongHo: item.NamNu == "Nam" ? item.TenDongHo + " 42mm Nam " + item.MaDongHo : item.TenDongHo + " 38mm Nữ " + item.MaDongHo,
                                GiaBan: myGioHang.formatCurrency(String(parseInt(item.GiaBan * item.SoLuongMua))),
                                Url_anh: item.Url_anh,
                                GiamGia: item.GiamGia,
                                Id: item.Id,
                                SoLuongMua: item.SoLuongMua,
                                GiaGiam: myGioHang.formatCurrency(String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan))),
                                IdChiTietDongHo: item.IdChiTietDongHo
                            });
                            tong_tien += parseInt(item.GiaBan * item.SoLuongMua);
                        });
                        $('#sub-price').html(myGioHang.formatCurrency(String(tong_tien)));
                        $('#lst_GioHang').html(html);
                    } else {
                        var html = '<div class="alerttb"><div><img src="/UpLoad/Public/empty-cart.png" alt="" width="200px"></div><i class="cartnew-tb"></i><strong>Không có sản phẩm trong giỏ hàng</strong></div>';
                        $('#lst_GioHang').html(html);
                    }
                    myGioHang.Event();
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
                            myGioHang.LoadData();
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
        Swal.fire({
            title: "Xác nhận đặt hàng",
            text: "Hãy xem xét kỹ trước khi đặt hàng!",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Đồng ý !",
            cancelButtonText: "Thoát"
        }).then((result) => {
            if (result.isConfirmed) {
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
                            myGioHang.LoadData();
                        }
                    },
                    error: function (error) {
                        console.log('Error:', error);
                    }
                });
            }
        });
    },

    formatCurrency: function (number) {
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return n2.split('').reverse().join('') + ' VNĐ';
    }
}
myGioHang.init();