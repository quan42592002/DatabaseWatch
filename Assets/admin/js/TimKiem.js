var myController={
    init:function(){
        myController.LoadData();
        myController.Event();

    },
    Event:function(){
        $("#btnReset").off("click").on("click", function () {
            myController.resetForm();
        });
        $("#Search_Ten").off("input").on("input", function () {
            myController.LoadTable();
        });
        $("#Search_ThuongHieu").off("change").on("change", function () {
            myController.LoadTable();
        }); 
        $("#Search_LoaiDay").off("change").on("change", function () {
            myController.LoadTable();
        });
         $("#Search_KieuDang").off("change").on("change", function () {
            myController.LoadTable();
        });
      
        $("#Order_SoLuong").off("change").on("change", function () {
            myController.LoadTable();
        });
    },
    
    LoadData: function () {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/LoadData.php',
            method: 'Get',
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var lstLoaiDay = response.lstLoaiDay;
                    var lstThuongHieu = response.lstThuongHieu;
                    var lstKieuDang = response.lstKieuDang;

                    if (lstLoaiDay != null) {
                        var option = "<option value=''>-- Chọn Loại dây --</option>";
                        $.each(lstLoaiDay, function (index, value) {
                            option += "<option value='" + value.TenGoi + "'>" + (index + 1) + ". " + value.TenGoi + "</option>";
                        });
                        $("#Search_LoaiDay").html(option);
                    }

                    if (lstThuongHieu != null) {
                        var option = "<option value=''>-- Chọn thương hiệu --</option>";
                        $.each(lstThuongHieu, function (index, value) {
                            option += "<option value='" + value.TenGoi + "'>" + (index + 1) + ". " + value.TenGoi + "</option>";
                        });
                        $("#Search_ThuongHieu").html(option);
                    }

                    if (lstKieuDang != null) {
                        var option = "<option value=''>-- Chọn kiểu dáng --</option>";
                        $.each(lstKieuDang, function (index, value) {
                            option += "<option value='" + value.TenGoi + "'>" + (index + 1) + ". " + value.TenGoi + "</option>";
                        });
                        $("#Search_KieuDang").html(option);
                     }
                }
                myController.LoadTable();
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },
    LoadTable:function(page=1){
        var search_ten=$("#Search_Ten").val();
        var search_thuonghieu=$("#Search_ThuongHieu").val();
        var search_loaiday=$("#Search_LoaiDay").val();
        var search_kieudang=$("#Search_KieuDang").val();
        var order_soLuong=$("#Order_SoLuong").val();
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/TimKiem/LoadTable.php?page='+page,
            method: 'Get',
            data:{
                search_ten:search_ten,
                search_thuonghieu:search_thuonghieu,
                search_loaiday:search_loaiday,
                search_kieudang:search_kieudang,
                order_soLuong:order_soLuong,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    var html = "";

                    $.each(datax, function (index, value) {
                        html += "<tr>" +
                        "<td>" + value.IdDongHo + "</td>" +
                            "<td><img src='" + value.Url_anh + "' width='65spx'></td>" +
                            "<td>" + value.TenDongHo + "</a></td>" +
                            "<td>" + value.ThuongHieu + "</td>" +
                            "<td>" + value.LoaiDay + "</td>" +
                            "<td>" + value.KieuDang + "</td>" +
                            "<td>" + value.SoLuong + "</td>" +
                            "</tr>";
                    });

                    $("#tbl_DongHoThem").html(html);

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
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    resetForm:function(){

    },
};
myController.init();