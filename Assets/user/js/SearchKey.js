var myController={
    init:function(){
        myController.event();
        myController.loaddata();
    },
    event:function(){
        $("#input_key").off("input").on("input", function () {
            myController.loaddata();
            $(".show-product-search").attr("style", "display:block;");
        });
        
    },
    loaddata:function(){
        var input_key=$("#input_key").val();
        $.ajax({
            url: 'http://localhost:3000/Controller/user/Crud/SearchKey/SearchKey.php',
            method:'Get',
            data:{
                input_key:input_key,
            },
            dataType: 'json',
            success: function (response){
                if (response.status == true) {
                    var listdata=response.listdata;
                    if(listdata!=null){
                        var html='';
                        var template = $('#data-pk').html();
                        $.each(listdata, function (i, item) {
                            html += Mustache.render(template, {
                                TenDongHo: item.NamNu == "Nam" ? item.TenDongHo + " 42mm Nam " + item.MaDongHo : item.TenDongHo + " 38mm Nữ " + item.MaDongHo,
                                GiaBan: myEventHome.formatCurrency(item.GiaBan),
                                url: item.Url_anh,
                                GiamGia: item.GiamGia,
                                GiaGiam: myEventHome.formatCurrency(String(parseInt(((item.GiaBan * item.GiamGia) / 100)) + parseInt(item.GiaBan))),
                                IdChiTietDongHo: item.IdChiTietDongHo,
                                IdDongHo: item.IdDongHo
                            });
                        });
    
                        $('#list-productkey').html(html);
                    }
             
                    // $.each(listdata, function (i, item) {
                    //     html += '<a class="product-key" href="">'+
                    //    "<img src='"+ item.Url_anh+"'>"+
                    //    '<div class="infor">'+
                    //     '<div class="name-pk">'+item.TenDongHo +'</div>'+
                    //     '<span class="showgia">'+   
                    //     '<strong style="color: #ED1C24;font-weight: bold;line-height: 24px;">'+item.GiaBan+'</strong>'+
                    //     "<span class='linethough'>"+item.GiaBan+"</span>"+
                    //     "<label class='discount-pk'>"+item.GiamGia+"</label>"+
                    //     "</span>"+
                    //     "</div>"+       
                    //     "</a>"
                    // });


                }

            }
        });
   
        
    },
    formatCurrency: function (number) {
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return n2.split('').reverse().join('') + ' VNĐ';
    }
}
myController.init();