var myController = {

    init: function () {
        myController.LoadTable();
        myController.RegesterEvent();
    },


    RegesterEvent: function () {
        $("#btn_TaoMoi").off("click").on("click", function () {
            myController.resetForm();
        });

        $("#btn_SaveData").off("click").on("click", function () {
            myController.SaveData();
        });
    },

    resetForm: function () {
        $("#SoThuTu").val("");
        $("#TenGoi").val("");
    },

    LoadTable: function () {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/ThuongHieu/LoadTable.php',
            method: 'Get',
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    var html = "";
                    $.each(datax, function (index, value) {
                        html += "<tr><td>" + value.IdThuongHieu + "</td>" +
                            "<td>" + value.Stt + "</td>" +
                            "<td>" + value.TenGoi + "</td>" +
                            "<td>" +
                            '<div>'+
                            '<a class="btn btn-success" title="Xem thông tin" href="javascript:myController.LoadDetail(' + value.IdThuongHieu + ')" ><i class="bi bi-pencil"></i></a>'+
                            '<a class="btn btn-primary " title="Xem thông tin" style="margin-left: 5px;" href="javascript:myController.DeleteData(' + value.IdThuongHieu + ')"><i class="bi bi-trash"></i></a>'
                            '</div>'
                            + "</td>" +
                            "</tr>";
                    });

                    $("#tbl_ThuongHieu").html(html);
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    LoadDetail:function(IdThuongHieu){
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/ThuongHieu/SuaThuongHieu.php',
            method: 'Get',
            data: {
                IdThuongHieu: IdThuongHieu,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    if (datax != null) {
                        $("#SoThuTu").val(datax.Stt);
                        $("#TenGoi").val(datax.TenGoi);
                        $("#urlAnh").attr('src', datax.UrlAnh);
                        $("#urlAnh").css('width', '100%')
                        $("#urlAnh").css('border-radius', '0%')
                    }
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

    SaveData: function () {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/ThuongHieu/ThemMoi.php',
            method: 'Post',
            data: {
                SoThuTu: $("#SoThuTu").val(),
                TenGoi: $("#TenGoi").val(),
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    alert("Thành công");
                    myController.LoadTable();
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    }
};
myController.init();