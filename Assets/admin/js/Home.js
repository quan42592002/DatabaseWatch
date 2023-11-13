var datax;
var myController = {
    init: function () {
        myController.Event();
        myController.LoadData();
    },

    Event:function () {

        $("#lstModal").hide();
        $("#wrapper-admin").show();

        $("#btn_Thoat").off("click").on("click", function () {
            $("#lstModal").hide();
            $("#wrapper-admin").show();
        });
    },

    LoadData: function () {
        $(document).ready(function () {
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/DashBoard/LoadSoLieuThongKe.php',
                method: 'Get',
                data: {
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        $("#tongNhap").text(response.dataNhap[0].TongTatCaNhap);
                        $("#tongBan").text(response.dataBan[0].TongTatCaBan);
                        $("#tongUser").text(response.dataUser[0].TongUser);
                        $("#tongDCD").text(response.dataDCD[0].TongDonChuaDuyet);
                        myController.LoadTable();
                    }
                },
                error: function (error) {
                    console.log('Error:', error);
                }

            });
        });

    },

    LoadTable: function (page = 1) {
        $(document).ready(function () {
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/DashBoard/LoadTable.php?page=' + page,
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        var datax = response.datax;

                        if (datax != null) {
                            $("#tbl_DongHo").bootstrapTable('load', datax);
                        } else {
                            $("#tbl_DongHo").bootstrapTable('removeAll');
                        }

                        // Phân trang
                        var totalPages = Math.ceil(response.total_items / response.items_per_page);
                        var currentPage = response.current_page;

                        var paginationHtml = "";
                        for (var i = 1; i <= totalPages; i++) {
                            if (i === currentPage) {
                                paginationHtml += '<a href="javascript:myController.LoadTable(' + i + ')" style="background-color: #0056b3;">' + i + '</a>';
                            } else {
                                paginationHtml += '<a href="javascript:myController.LoadTable(' + i + ')">' + i + '</a>';
                            }
                        }

                        $(".pagination").html(paginationHtml);
                    }
                },
            });
        });
    },

    DetailChiTiet:function(PhanLoai){
        $("#lstModal").show();
        $("#wrapper-admin").hide();
        if (PhanLoai == "SanPhamBan") {
            $("#tbl_SanPhamDaBan").show();
            $("#tbl_TaiKhoan").hide();
        } else {
            $("#tbl_TaiKhoan").show();
            $("#tbl_SanPhamDaBan").hide();
        }
        
        $(document).ready(function () {
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/DashBoard/DetailChiTiet.php',
                method: 'Get',
                data: {
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        lstTable = response.datax;
                        lstTaiKhoan = response.lstTaiKhoan;

                        if (lstTable != null) {
                            $("#tbl_SanPhamDaBan").bootstrapTable('load', lstTable);
                        } else {
                            $("#tbl_SanPhamDaBan").bootstrapTable('removeAll');
                        }

                        if (lstTaiKhoan != null) {
                            $("#tbl_TaiKhoan").bootstrapTable('load', lstTaiKhoan);
                        } else {
                            $("#tbl_TaiKhoan").bootstrapTable('removeAll');
                        }
                    }
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    },

};
myController.init();
function formatCurrency(number) {
    var n = number.split('').reverse().join("");
    var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
    return n2.split('').reverse().join('') + ' VNĐ';
}

function Anh(e, value, row, index) {
    return [
        '<div style="85px">',
        "<img src='" + value.Url_anh + "' width='65spx'>",
        '</div>'
    ].join('');
};