var datax;
var myController = {
    init: function () {
        myController.resetForm();
        myController.Event();
        myController.LoadTable();
    },
    Event: function () {

        $("#btnXuatBaoCao").off("click").on("click", function () {
            $('#tbl_BaoCao').tableExport({ fileName: 'báo cáo doanh thu', type: 'excel' });
        });

        $("#btnpdf").off("click").on("click", function () {
            $('#tbl_BaoCao').tableExport({
                fileName: 'báo cáo doanh thu', type: 'pdf',
                pdfmake: {
                    enabled: true,
                    docDefinition: { pageOrientation: 'landscape' }
                }
            });
        });


        $("#btnLoc").off("click").on("click", function () {
            myController.LoadTable();
        });


        $("#cbPhanLoai").off("change").on("change", function () {

            var cbPhanLoai = $("#cbPhanLoai").val();

            if (cbPhanLoai == "Theo ngày") {
                $(".theongay").show();
                $(".theothang").hide();
                $(".theonam").hide();
            } else if (cbPhanLoai == "Theo tháng") {
                $(".theongay").hide();
                $(".theothang").show();
                $(".theonam").show();
            } else if (cbPhanLoai == "Theo năm") {
                $(".theongay").hide();
                $(".theothang").hide();
                $(".theonam").show();
            }

        });

    },

    resetForm: function () {
        $(".theongay").show();
        $(".theothang").hide();
        $(".theonam").hide();
    },

    LoadTable: function () {
        $(document).ready(function () {
            var TuNgay = $("#TuNgay").val();
            var DenNgay = $("#DenNgay").val();
            var cbThang = $("#cbThang").val();
            var cbNam = $("#cbNam").val();
            var cbPhanLoai = $("#cbPhanLoai").val();


            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/BaoCao/LoadTable.php',
                method: 'Get',
                data: {
                    TuNgay: TuNgay,
                    DenNgay: DenNgay,
                    cbThang: cbThang,
                    cbNam: cbNam,
                    cbPhanLoai: cbPhanLoai,
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        lstTable = response.datax;
                        var tong_tien = 0;

                        var tien_fomater = "";

                        if (lstTable != null) {
                            $("#tbl_BaoCao").bootstrapTable('load', lstTable);
                        } else {
                            $("#tbl_BaoCao").bootstrapTable('removeAll');
                        }

                        $.each(lstTable, function (i, item) {
                            tong_tien += (parseInt(item.GiaBan) - parseInt(item.GiaMua));
                        });
                        tien_fomater = formatCurrency(String(tong_tien));
                        var $tfoot = $("#tbl_BaoCao tfoot");
                        if ($tfoot.length === 0) {
                            $tfoot = $("<tfoot></tfoot>");
                            $("#tbl_BaoCao").append($tfoot);
                        }

                        $tfoot.html(
                            '<tr>' +
                            '<th colspan="4">Tổng tiền Lãi</th>' +
                            '<th colspan="4">' + tien_fomater + '</th>' +
                            '</tr>'
                        );
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

function TienLaiFomater(e, value, row, index) {
    var TienLai = String(parseInt(value.GiaBan) - parseInt(value.GiaMua));
    return formatCurrency(TienLai);
}