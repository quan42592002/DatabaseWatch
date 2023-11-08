<?php
if (!isset($_SESSION['IdRole'])) {
    echo '<script>window.location.href="http://localhost:3000/main.php?controller=LoginController";</script>';
    exit;
}
?>
<input type="hidden" id="UsersId" value="<?php
                                            if (isset($_SESSION['IdRole'])) {
                                                echo $_SESSION['IdUsers'];
                                            }
                                            ?>">
<div class="cart-body">
    <div class="title">
        <h3>GIỎ HÀNG</h3>
    </div>
    <!-- cart-product -->
    <div class="cart-product">
        <form style="width: 804px;margin-right: 50px;" id="frm" method="post" action="/Cart/Update">
            <div style="overflow: auto; margin: 0px;" class="cart-product-left" id="lst_GioHang">
            </div>

        </form>
        <!-- cart-product-left -->
        <!-- END cart-product-right -->
        <!-- cart-product-right -->
        <div class="cart-product-right">
            <div style="width: 318px;display:flex;" class="sub-price">
                <h style="font-size: 14px;font-weight: bold;margin-right: 140px;height:35px;">Tạm Tính</h>
                <div id="sub-price">780.000đ</div>
            </div>

            <div style="width: 318px;" class="price">
                <h style="margin-left: -10px;">Thành Tiền</h>
                <div id="price" style=" margin-left: 100px; font-size: 24px;
                    font-weight: bold;color:rgb(232, 24, 84) ;">
                    840,000đ
                </div>
            </div>


            <div style="background-color:white;display: flex;" class="pay">
                <button style="width: 115px;height: 100%;background-color:rgb(232, 24, 84);border:none;margin-right: 25px;border-radius:5px;color:white;">
                    <a style="color:white;" href="#">Cập nhật</a>
                </button>
                <button style="width: 115px;height: 100%;background-color:rgb(232, 24, 84) ;border:none;border-radius:5px;margin-right: -10px;color:white;">
                    <a>Xóa hết Sp</a>
                </button>
            </div>
            <button class="pay"> <a style="color:white;" href="/cart/checkout">ĐẶT HÀNG NGAY</a></button>


            <button class="pay"> <a style="color:white;" href="/products/category">TIẾP TỤC MUA HÀNG</a> </button>
        </div>
        <!-- cart-product-right -->

    </div>
    <!-- cart-product -->
    <script id="data-gio-hang" type="x-tmpl-mustache">
        <!-- product 1 -->
        <div class="product-left">
            <div style="text-align:center" class="image-prd"> <img src="{{Url_anh}}" alt=""></div>
            <div class="sub-product">
                <ul style="width: 160px;">
                    <li> <a style="font-weight: bold ;color:black" href="/Products/Detail/@item.ProductRecord.Id">{{TenDongHo}}</a> </li>
                    <li style="cursor: pointer;color:rgb(232, 24, 84) ;"> <a onclick="return window.confirm('Are you sure?')" style="cursor: pointer;color:rgb(232, 24, 84) ;" href="cart/remove/@item.ProductRecord.Id">Xóa</a> </li>
                </ul>

                <div class="box-price">
                    <p style="text-decoration: line-through;text-decoration-color: red; color:#8a8a8a">{{ GiaGiam }}</p>
                </div>
                <div class="box-price">
                    <p>{{GiaBan}}</p>
                </div>
            </div>
        </div>
    </script>
</div>

<style>
    /*cart*/
    .sub-price div {
        font-size: 16px;
        font-weight: bold;
    }

    .price {
        height: 61px;
        display: flex;
        line-height: 61px;
    }
</style>
<script src="http://localhost:3000/Assets/user/js/mutasche.min.js"></script>
<script src="http://localhost:3000/Assets/user/js/giohang.js"></script>