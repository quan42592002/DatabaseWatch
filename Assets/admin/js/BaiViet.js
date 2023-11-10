var myController = {
    init: function () {
        myController.LoadTable();
        myController.RegisterEvent();
    },

    RegisterEvent: function () {
        $(document).ready(function () {
            CKEDITOR.replace('content', {
                height: 600,
            });
        });

        $('#btn_SaveData').on('click', function () {
            var content = CKEDITOR.instances['content'].getData();
            var TenBaiViet = $('#TenBaiViet').val();

            if (content == "") {
                alert("Bạn chưa có bài viết");
                return;
            }
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/BaiViet/SaveData.php',
                method: 'Post',
                data: {
                    TenBaiViet: TenBaiViet,
                    content: content,
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        alert("Thêm mới thành công");
                    }
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });

        });

    },

    LoadTable: function () {
        $(document).ready(function () {
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/BaiViet/LoadTable.php',
                method: 'Get',
                dataType: 'json',
                success: function (response) {
                    if (response.status) {
                        lstTable = response.datax;
                        if (lstTable != null) {
                            $("#tbl_BaiViet").bootstrapTable('load', lstTable);
                        } else {
                            $("#tbl_BaiViet").bootstrapTable('removeAll');
                        }
                    }
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    },

    
    LoadDetail: function (IdBaiViet) {
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/BaiViet/LoadDetail.php',
            method: 'Get',
            data: {
                IdBaiViet: IdBaiViet,
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var datax = response.datax;
                    if (datax != null) {
                        $("#IdBaiViet").val(datax.IdBaiViet);
                        $("#TenBaiViet").val(datax.TenBaiViet);
                        CKEDITOR.instances['content'].setData(datax.NoiDung);
                    }
                }
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    },

};
myController.init();

function ChucNang(e, value, row, index) {
    return [
        '<div style="">',
        '<a href="javaScript:myController.LoadDetail(' + value.IdBaiViet + ')" class="btn btn-primary btn-sm"><i class="bi bi-pencil mr-0"></i></a>',
        '<a  style="margin-left:10px" href="javaScript:myController.DeleteMenu(' + value.IdBaiViet + ')" class="btn btn-danger btn-sm ml-1"><i class="bi bi-trash"></i></a>',
        '</div>'
    ].join('');
};
