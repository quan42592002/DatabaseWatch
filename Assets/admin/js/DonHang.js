var files;
var myController = {

    init: function () {
        myController.LoadData();
        myController.RegesterEvent();
    },

    RegesterEvent: function () {
        $("#IdUsers").off("change").on("change", function () {
            myController.LoadTable();
        });

        $("#btnDuyetDonHang").off("click").on("click", function () {
            myController.Duyet();
        });
    },

    LoadData: function () {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/DonHang/LoadData.php',
            method: 'Get',
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var lstUser = response.lstUser;
                    if (lstUser != null) {
                        var option = "<option value=''>-- Chọn khách hàng --</option>";
                        $.each(lstUser, function (index, value) {
                            option += "<option value='" + value.IdUsers + "'>" + (index + 1) + ". " + value.TenDayDu + "</option>";
                        });
                        $("#IdUsers").html(option);
                    }

                }
            },
        });
        myController.LoadTable();
    },

    LoadTable: function () {
        $(document).ready(function () {
            var IdUsers = $("#IdUsers").val();
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/DonHang/LoadTable.php',
                method: 'Get',
                data: {
                    IdUsers: IdUsers,
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        var lstTable = response.datax;

                        if (lstTable != null) {
                            $("#tbl_XetDuyet").bootstrapTable('load', lstTable);
                        } else {
                            $("#tbl_XetDuyet").bootstrapTable('removeAll');
                        }
                    }
                },
            });
        });
    },

    Duyet: function () {
        var IdUsers = $("#IdUsers").val();

        if (IdUsers < 0 || IdUsers == "") {
            Swal.fire({
                title: "Bạn chưa chọn khách hàng?",
                icon: "error"
            });
            return;
        }
        Swal.fire({
            title: "Xác nhận đặt?",
            text: "Hãy xem kiểm tra kỹ khi xác nhận!Bạn sẽ không thể thay đổi khi bấm vào đồng í",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Đồng ý !",
            cancelButtonText: "Thoát"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'http://localhost:3000/Controller/admin/Crud/DonHang/DuyetDon.php',
                    method: 'Post',
                    data: {
                        IdUsers: IdUsers
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status) {
                            Swal.fire({
                                icon: "success"
                            });
                            myController.LoadTable();
                        }
                    },
                });
            }
        });
    },




};
myController.init();

function TrangThaiMua(e, value, row, index) {
    if (value.IdChiTietDonDat == null || value.IdChiTietDonDat == "") {
        return [
            '<div style="">',
            '<a href="#" style="text-decoration: none" class="btn btn-primary btn-sm"><i class="bi bi-check-lg"></i> Chưa bán</a>',
            '</div>'
        ].join('');
    } else {
        return [
            '<div style="">',
            '<a href="#" style="text-decoration: none" class="btn btn-danger btn-sm"><i class="bi bi-check-lg"></i> Đã bán</a>',
            '</div>'
        ].join('');
    }

};