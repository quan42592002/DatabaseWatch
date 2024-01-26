var files;
var myController = {

    init: function () {
        myController.RegesterEvent();
        myController.LoadTable();
        myController.resetForm();
    },


    RegesterEvent: function () {


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

        $("#tbl_DongHo input[type='checkbox']").on("click", function () {
            var checkboxId = $(this).attr("id"); // Lấy id của ô checkbox
            var Url_anh = $(this).closest("tr").find("td:eq(0)").find("img").attr("src");
            var TenDongHo = $(this).closest("tr").find("td:eq(1)").text();
            var ThuongHieu = $(this).closest("tr").find("td:eq(2)").text();
            var PhanLoai = $(this).closest("tr").find("td:eq(3)").text();
            var SoLuong = $(this).closest("tr").find("td:eq(4)").text();
            var IdDongHo = $(this).closest("tr").find("input[id^='chk_']").attr("id").substring(4);


            var data = {
                IdDongHo: IdDongHo,
                Url_anh: Url_anh,
                TenDongHo: TenDongHo,
                ThuongHieu: ThuongHieu,
                PhanLoai: PhanLoai,
                SoLuong: SoLuong,
            }

            if ($(this).is(":checked")) {
                $("#" + checkboxId).closest("tr").css("background-color", "#ffffa8");
                myController.AddTableThem(checkboxId, data);
            } else {
                myController.RemoveTableThem(checkboxId, data);
                // Đã bỏ kiểm tra ô checkbox, xử lý tại đây
                $("#" + checkboxId).closest("tr").css("background-color", "");
            }
        });

    },

    resetForm: function () {
        $("#SoluongNhap").val(0);
        $("#tbl_DongHoThem").html("");
    },


    RemoveTableThem: function (checkboxId, data) {
        $("#tbl_DongHoThem").find("td#check_" + data.IdDongHo).closest("tr").remove();
        var SoLuong = $("#SoluongNhap").val();
        var SoLuonCurrent = parseInt(SoLuong) - parseInt(data.SoLuong);
        $("#SoluongNhap").val(SoLuonCurrent);
    },

    AddTableThem: function (checkboxId, data) {

        var html = "<tr>" +
            "<td id='check_" + data.IdDongHo + "'>" + data.IdDongHo + "</td>" +
            "<td><img src='" + data.Url_anh + "' width='65spx'></td>" +
            "<td>" + data.TenDongHo + "</td>" +
            "<td>" + data.ThuongHieu + "</td>" +
            "<td>" + data.PhanLoai + "</td>" +
            "<td>" + data.SoLuong + "</td>" +
            "</tr>";

        $("#tbl_DongHoThem").append(html);
        var SoLuong = $("#SoluongNhap").val();
        var SoLuonCurrent = parseInt(SoLuong) + parseInt(data.SoLuong);
        $("#SoluongNhap").val(SoLuonCurrent);
    },

    SaveData: function () {
        var IdUsers = $("#IdUsers").val();
        var MaPhieuNhap = $("#MaPhieuNhap").val();
        var SoluongNhap = $("#SoluongNhap").val();

        if (IdUsers <= 0) {
            alert("Chưa có người nhập");
            return;
        }

        if (MaPhieuNhap == "" || MaPhieuNhap == null) {
            alert("Mã phiếu không được để trống");
            return;
        }

        if (SoluongNhap <= 0) {
            alert("Bạn chưa có số lượng");
            return;
        }

        var lstCheckedItem = "";

        $(".allCK").each(function (e, data) {
            if (data.checked == true) {
                var id = data.id.substring(4);;
                if (id > 0) {
                    lstCheckedItem += id + ",";
                }
            }
        });

        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/NhapHang/SaveData.php',
            method: 'Post',
            data: {
                lstCheckedItem: lstCheckedItem,
                IdUsers: IdUsers,
                MaPhieuNhap: MaPhieuNhap,
                SoluongNhap: SoluongNhap,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    alert("Cập nhập thành công");
                    myController.RegesterEvent();
                    myController.LoadTable();
                    myController.resetForm();
                }
            },
        });

    },

    LoadTable: function () {
        $(document).ready(function () {
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/NhapHang/LoadTable.php',
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
                        myController.RegesterEvent();
                    }
                },
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
function ChucNang(e, value, row, index) {
    return [
        '<div style="85px">',
        "<input type='checkbox' class='allCK'  id='chk_" + value.IdDongHo + "'>",
        '</div>'
    ].join('');
};
