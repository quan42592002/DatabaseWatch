var myController={
    init:function(){
        myController.LoadData();
        myController.Event();

    },
    Event:function(){
        $("#btnReset").off("click").on("click", function () {
            myController.resetForm();
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
                        $("#LoaiDay").html(option);
                    }

                    if (lstThuongHieu != null) {
                        var option = "<option value=''>-- Chọn thương hiệu --</option>";
                        $.each(lstThuongHieu, function (index, value) {
                            option += "<option value='" + value.TenGoi + "'>" + (index + 1) + ". " + value.TenGoi + "</option>";
                        });
                        $("#ThuongHieu").html(option);
                    }

                    if (lstKieuDang != null) {
                        var option = "<option value=''>-- Chọn kiểu dáng --</option>";
                        $.each(lstKieuDang, function (index, value) {
                            option += "<option value='" + value.TenGoi + "'>" + (index + 1) + ". " + value.TenGoi + "</option>";
                        });
                        $("#KieuDang").html(option);
                     }
                }
                myController.LoadTable();
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },
    LoadTable:function(){
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DongHo/LoadData.php',
            method: 'Get',
            dataType: 'json',
        });
    },

    resetForm:function(){

    },
};
myController.init();