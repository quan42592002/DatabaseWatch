var datax;
var myController = {
    init: function () {
        myController.LoadData();
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
