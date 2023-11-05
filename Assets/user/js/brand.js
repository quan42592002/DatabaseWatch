var myController={
    init:function(){
        myController.LoadBrand();
    },
    LoadBrand:function(){
    $.ajax({
        //đường dẫn xử lý
        url:'http://localhost:3000/Controller/user/Crud/DongHo/Brand.php',
        //phương thức
        method:'Get',
        dataType: 'json',
        success: function(response){
            if(response.status==true){
                var lstBrand=response.listBrand;
                if(lstBrand!=null){
                    var html='';
                var template=$('#data-brand').html();
                $.each(lstBrand,function(i,item){
                    html+=Mustache.render(template,{
                        Url:item.UrlAnh,
                        TenThuongHieu:item.TenGoi,
                    });
                }); 
                 $('#list-brand').html(html);
                }
              

            }
        }

    })
    }
}
myController.init();