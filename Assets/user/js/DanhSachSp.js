var myController={
    init:function(){
        myController.Event();
        myController.LoadData();
    },
    Event:function(){
        $("#SapXep").off("change").on("change", function () {
            myController.LoadData();
        });
        $("#LocThuongHieu").off("change").on("change", function () {
            myController.LoadData();
        });
        $("#LocGia").off("change").on("change", function () {
            myController.LoadData();
        });

    },
    LoadData:function(page=1){
        var sapxep=$("#SapXep").val();
        var LocThuongHieu=$("#LocThuongHieu").val();
        var LocGia=$("#LocGia").val();


        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/DanhSachSp/LoadData.php?page='+page,
            method:'GET',
            data:{
                sapxep:sapxep,
                LocThuongHieu:LocThuongHieu,
                LocGia:LocGia,
            },
            dataType:'Json',
            success:function(response){
                if (response.status == true) {
                    var listdata=response.listdata;
                    if(listdata!=null){
                        var html='';
                        var template = $('#data-danhsach').html();
                        $.each(listdata, function (i, item) {
                            html += Mustache.render(template, {
                                url:item.Url_anh,
                                TenDongHo: item.TenDongHo,
                                MaDongHo:item.MaDongHo,
                                GiamGia:item.GiamGia,
                                 GiaBan:myController.formatCurrency(String(item.GiaBan)),
                                 GiaGiam: myController.DiscountPrice(item.GiaBan,item.GiamGia),
                            });
                        });
    
                        $('#dssp-main').html(html);

                    }
                     // Phân trang
                     var totalPages = Math.ceil(response.total_items / response.items_per_page);
                     var currentPage = response.current_page;
 
                     var paginationHtml = "";
                     for (var i = 1; i <= totalPages; i++) {
                         if (i === currentPage) {
                             paginationHtml +=  '<a href="javascript:myController.LoadData(' + i + ')" style="background-color: #0056b3;">' + i + '</a>';
                         } else {
                             paginationHtml += '<a href="javascript:myController.LoadData(' + i + ')">' + i + '</a>';
                         }
                     }
 
                     $(".pagination").html(paginationHtml);
                }
            }
        });
    },
    formatCurrency: function (number) {
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return n2.split('').reverse().join('') + ' VNĐ';
    },
    DiscountPrice:function(price,discount){
        // Kiểm tra nếu giảm giá là một phần trăm hợp lệ
        if (discount >= 0 && discount <= 100) {
            // Tính giá sau khi chiết khấu
            var discountedPrice = price - (price * discount / 100);
            var formattedPrice = discountedPrice % 1 !== 0 ? discountedPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') : discountedPrice.toFixed(0).replace(/\B(?=(\d{3})+$)/g, ',');
        
            return formattedPrice;

        } else {
            // Nếu giảm giá không hợp lệ, trả về giá không thay đổi
            return price;
        }
    },
}
myController.init();