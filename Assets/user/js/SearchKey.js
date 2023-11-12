var myKey={
    init:function(){
        myKey.event();
        myKey.loaddata();
    },
    event:function(){
        $("#input_key").off("input").on("input", function () {
            myKey.loaddata();
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
                                url:item.Url_anh,
                                TenDongHo: item.TenDongHo,
                                // GiaBan: item.GiaBan,
                                // GiamGia:item.GiamGia,
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
}
myKey.init();