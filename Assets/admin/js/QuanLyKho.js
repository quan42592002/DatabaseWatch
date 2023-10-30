var files;
var myController = {

    init: function () {
        myController.LoadTable();
        // myController.RegesterEvent();
    },


    RegesterEvent: function () {

        $(".js-example-basic-single").select2({
            width: "100%",
        });


        $('#duong_dan_tai_lieu').filestyle({
            text: 'Đính kèm tệp',
            dragdrop: false,
            placeholder: 'Không có tệp đính kèm nào',
            btnClass: 'btn-success cssFile',
            htmlIcon: '<span class="fa fa-upload"></span> ',
        });

        $('#duong_dan_tai_lieu').on('change', function (e) {
            files = e.target.files;
            if (files.length > 0) {

                for (var x = 0; x < files.length; x++) {
                    if (files[x].size >= 52428800) {
                        XNoti_CanhBao('Chỉ được upload file dưới 50mb', 'Thông báo');
                        $("#duong_dan_tai_lieu").filestyle('clear');
                        $("#duong_dan_tai_lieu").filestyle('placeholder', "Không có tệp đính kèm nào");
                        $('#is_thay_doi').val('true');
                        return;
                    }
                    $('#is_thay_doi').val('true');
                }
            }
        });

        $("#btn_TaoMoi").off("click").on("click", function () {
            $("#modal-DongHo").show();
            myController.resetForm();
        });

        $("#btn_TaoChiTiet").off("click").on("click", function () {
            myController.SaveNewChiTiet();
        });


        $("#btn_Thoat").off("click").on("click", function () {
            $("#modal-DongHo").hide();
        });

        $("#btn_Save").off("click").on("click", function () {
            myController.SaveData();
        });
    },


    LoadTable: function (page = 1) {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/NhapHang/LoadTable.php?page=' + page,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    var html = "";

                    $.each(datax, function (index, value) {
                        html += "<tr><td><img src='"+ value.Url_anh +"' width='65spx'></td>" +
                            "<td>" + value.TenDongHo + "</td>" +
                            "<td>" + value.TenGoi + "</td>" +
                            "<td>" + value.NamNu + "</td>" +
                            "<td>" + value.SoLuong + "</td>" +
                            "<td>" + value.GiaMua + "</td>" +
                            "<td>" + value.GiaBan + "</td>" +
                            "</tr>";
                    });

                    $("#tbl_DongHo").html(html);

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


};
myController.init();