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
                }

            }
        });
    },
}
myKey.init();