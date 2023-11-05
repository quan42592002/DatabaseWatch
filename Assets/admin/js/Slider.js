var myController = {
    init: function () {
       
        // myController.resetForm();
        myController.LoadSlider();
        myController.Event();
    },

    Event:function () {
      
        $("#btn_TaoMoi").off("click").on("click", function () {
            myController.resetForm();
        });

        $("#btn_SaveData").off("click").on("click", function () {
            myController.SaveData();
        });
        
        $("#PhanLoaiSlider").off("change").on("change", function () {
            myController.LoadSlider();
        });

    },

    resetForm:function(){
        $("#IdSlider").val(0);
        // $("#").val(0);
        $("#duong_dan_tai_lieu").val("");
        $("#urlAnh").attr('src', '');
        $("#nameslider").val("");
        $("#createdate").val("");
    },

    SaveData:function () {
    //   var IdSlider =  $("#IdSlider").val();
    //   var nameSlider = $("#nameslider").val();
    //   var createdate = $("#createdate").val();
      
      var IdSlider = $("#IdSlider").val();
      var nameSlider = $("#nameslider").val();
      var createdate = $("#createdate").val();
      var files = $("#duong_dan_tai_lieu")[0].files;
         // Tạo đối tượng FormData để gửi dữ liệu và tệp ảnh
    var formData = new FormData();
    formData.append('IdSlider', IdSlider);
    formData.append('nameSlider', nameSlider);
    formData.append('createdate', createdate);
    for (var x = 0; x < files.length; x++) {
        if (files[x].size >= 52428800) {
            alert('Chỉ được upload file dưới 50MB', 'Thông báo');
            $('#duong_dan_tai_lieu').val("");
            return;
        }
        formData.append('duong_dan_tai_lieu[]', files[x]); // Sử dụng mảng để gửi nhiều tệp
    }
       
        if (IdSlider == 0) {
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/Slider/Insert.php',
                method: 'POST',
                data: formData,
                contentType: false, // Không đặt header 'Content-Type'
                processData: false, // Không xử lý dữ liệu
                success: function(response) {
                    if (response.status == true) {
                        alert("Cập nhập thành công");
                       
                    myController.LoadSlider();
                    myController.resetForm();
                        
                    }
                },
            });
        } else {
            $.ajax({
                url: 'http://localhost:3000/Controller/admin/Crud/Slider/Edit.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == true) {
                        alert("Sửa sản phẩm thành công");
                        myController.LoadSlider();
                    myController.resetForm();

                    }
                 
                },
            });
        }




    },
     


    LoadDetail:function(IdSlider){
        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/Slider/DetailSlider.php',
            method: 'Get',
            data: {
                //truyền vào detailphp
                IdSlider: IdSlider,
                
            },
            dataType: 'json',
            success: function (response) {
                if (response.status) {
                    var record = response.record;
                    if (record != null) {
                        // $("#duong_dan_tai_lieu").val(record.IdSlider);
                        
                        $("#IdSlider").val(record.IdSlider);
                        $("#nameslider").val(record.NameSlider);
                        $("#createdate").val(record.CreateDate);
                        $("#urlAnh").attr('src', record.UrlSlider);
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

    DeleteData:function(IdSlider){
        // var IdSlider = $("#IdSlider").val();

        $.ajax({
            url: 'http://localhost:3000/Controller/admin/Crud/Slider/DeleteSlider.php',
            method: 'POST',
            data: {
                IdSlidertest: IdSlider,
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    alert("Xóa bản ghi thành công");
                    myController.LoadSlider();
                    myController.resetForm();

                } else {
                    alert("Xóa bản ghi không thành công");
                    myController.resetForm();
                }
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    },

    LoadSlider:function(page=1){
        var phan_loai_slider=$("#PhanLoaiSlider").val();
        $.ajax({
            // đường dẫn xử lý 
            url: 'http://localhost:3000/Controller/admin/Crud/Slider/LoadSlider.php?page='+page,
            method: 'GET',
            data:{
                phan_loai_slider:phan_loai_slider,
            },
            dataType: 'json',
            success: function (response) {
              if (response.status == true) {
                var listSlider = response.listSlider;
                var html = '';
                
                    $.each(listSlider, function (i, item) {
                        html += "<tr><td>" + item.IdSlider + "</td>" +
                        "<td>" + item.NameSlider + "</td>" +
                        "<td>" + item.CreateDate + "</td>" +
                        "<td>" +
                        '<div>' +
                        '<a class="btn btn-success" title="Xem thông tin" href="javascript:myController.LoadDetail(' + item.IdSlider + ')" ><i class="bi bi-pencil"></i></a>' +
                        '<a  class="btn btn-primary" title="Xem thông tin"  style="margin-left: 5px;" href="javascript:myController.DeleteData(' + item.IdSlider + ')"><i class="bi bi-trash"></i></a>' +
                        '</div>' +
                        "</td>" +
                        "</tr>";
                    });
                        
                    $('#tbl_Slider').html(html);
                    

                // Phân trang
                var totalPages = Math.ceil(response.total_items / response.items_per_page);
                var currentPage = response.current_page;

                var paginationHtml = "";
                for (var i = 1; i <= totalPages; i++) {
                    if (i === currentPage) {
                        paginationHtml += '<a href="javascript:myController.LoadSlider(' + i + ')" style="background-color: #0056b3;">' + i + '</a>';
                    } else {
                        paginationHtml += '<a href="javascript:myController.LoadSlider(' + i + ')">' + i + '</a>';
                    }
                }

                $(".pagination").html(paginationHtml);
              }
            },
        });
    }


    // LoadTable:function(){
    //     $.ajax({
    //         url: 'http://localhost:3000/Controller/admin/Crud/Slider/LoadTable.php?page='+page,
    //         method: 'GET',
            
    //         dataType: 'json',
    //     });
    // }
















    // LoadSlider:function(page=1){
    //     $.ajax({
    //         // đường dẫn xử lý 
    //         url: 'http://localhost:3000/Controller/admin/Crud/Slider/LoadSlider.php?page='+page,
    //         method: 'GET',
    //         dataType: 'json',
    //         success: function (response) {
    //           if (response.status == true) {
    //             var listSlider = response.listSlider;
    //             var html = '';
                
    //                 $.each(listSlider, function (i, item) {
    //                     html += "<tr><td>" + item.IdSlider + "</td>" +
    //                     "<td>" + item.NameSlider + "</td>" +
    //                     "<td>" + item.CreateDate + "</td>" +
    //                     "<td>" +
    //                     '<div>' +
    //                     '<a class="btn btn-success" title="Xem thông tin" href="javascript:myController.LoadDetail(' + item.IdSlider + ')" ><i class="bi bi-pencil"></i></a>' +
    //                     '<a  class="btn btn-primary" title="Xem thông tin"  style="margin-left: 5px;" href="javascript:myController.DeleteData(' + item.IdSlider + ')"><i class="bi bi-trash"></i></a>' +
    //                     '</div>' +
    //                     "</td>" +
    //                     "</tr>";
    //                 });

    //                 $('#tbl_Slider').html(html);
                    

    //             // Phân trang
    //             var totalPages = Math.ceil(response.total_items / response.items_per_page);
    //             var currentPage = response.current_page;

    //             var paginationHtml = "";
    //             for (var i = 1; i <= totalPages; i++) {
    //                 if (i === currentPage) {
    //                     paginationHtml += '<a href="javascript:myController.LoadSlider(' + i + ')" style="background-color: #0056b3;">' + i + '</a>';
    //                 } else {
    //                     paginationHtml += '<a href="javascript:myController.LoadSlider(' + i + ')">' + i + '</a>';
    //                 }
    //             }

    //             $(".pagination").html(paginationHtml);
    //           }
    //         },
    //     });
    // }

}
myController.init();