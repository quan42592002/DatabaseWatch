var myController={
    init:function(){
        myController.LoadData();
    },
    LoadData:function(){
        var IdTopList = $("#IdTopList").val();

        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/BaiViet/LoadDetail.php',
            method: 'Get',
            data: {
                IdTopList: IdTopList,
            },
            dataType:'json',
            success: function (response) {
                if (response.status) {
                    var listdata=response.listdata;
                    if (listdata != null) {
                        var tenBaiViet = listdata.TenBaiViet;
                        var NoiDung = listdata.NoiDung;
                        $("#tenbaiviet").html(tenBaiViet);

                        $("#main-baiviet").html(NoiDung);
                    }
                    else {
                        console.error("Dữ liệu không hợp lệ");
                    }

                }
            },
            error: function (error) {
                console.error("Đã xảy ra lỗi trong quá trình tải dữ liệu: ", error);
            }
        });
    },
    
}
myController.init();