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
        <h3>GIỎ HÀNG/<a href="?controller=TrangThaiController" style="font-size: 14px;
    font-weight: 600;
    color: cornflowerblue;">Lịch sử đơn hàng</a></h3>
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
        <div class="cart-product-right" style="width: 100%;">
            <div style=" border-bottom: 1px solid rgb(133, 129, 129);;">
                <h3 style="margin-bottom: 5px;color: red;">Thông tin cá nhân: </h3>
                <div style="padding: 3px;">
                    <label for="" style="font-weight: bold;">Họ tên :</label>
                    <span>Trần Minh Quân</span>
                </div>
                <div style="padding: 3px;">
                    <label for="" style="font-weight: bold;">Địa chỉ nhận hàng :</label>
                    <span>Số nhà 117 Kim Lâm, Kim Bài thanh Oai Hà nội<a href="#" style="text-decoration: none" class="btn btn-danger btn-sm"><i class="bi bi-pencil"></i> Thay đổi</a></span>
                </div>
                <div style="padding: 3px">
                    <label for="" style="font-weight: bold;">Số điện thoại :</label>
                    <span>0332581817 </span>
                </div>
                <div style="padding: 3px;margin-bottom: 10px">
                    <label for="" style="font-weight: bold;">Hình thức thanh toán :</label>
                    <span>Thanh toán khi nhận hàng</span>
                </div>
            </div>
            <div style="width: 318px;display:flex;" class="sub-price">
                <h style="font-size: 14px;font-weight: bold;margin-right: 140px;height:35px;color: red">Tổng tiền</h>
                <div id="sub-price">0đ</div>
            </div>
            <button class="pay"> <a style="color:white;" href="javascript:myGioHang.DatHang()">ĐẶT HÀNG NGAY</a></button>

            <button class="pay"> <a style="color:white;" href="?controller=DanhSachSPController">TIẾP TỤC MUA HÀNG</a> </button>
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
                    <li> <a style="font-weight: bold ;color:black" href="">{{TenDongHo}}</a> </li>
                    <li style="cursor: pointer;color:rgb(232, 24, 84) ;"> <a style="cursor: pointer;color:rgb(232, 24, 84) ;" href="javascript:myGioHang.RemoveCard({{Id}})"><i class="bi bi-trash2"></i> Xóa</a> </li>
                </ul>

                <div class="box-price">
                    <p style="text-decoration: line-through;text-decoration-color: red; color:#8a8a8a">{{ GiaGiam }}</p>
                </div>
                <div class="box-price">
                    <p>{{GiaBan}}</p>
                    <div>
                    <button class="quantity-btn increase-btn" data-operation="increase" type="button">+</button>
                    <input type="number" value="{{ SoLuongMua }}"  class="form-control quantity-input" style="width:30%;text-align: center;font-weight: bold;">
                    <input type="hidden" value="{{ Id }}" class="form-control id_update">
                    <button class="quantity-btn decrease-btn" data-operation="decrease" type="button">-</button>
                    </div>
                </div>
            </div>
        </div>
    </script>
</div>

<style>
    .alerttb {
        display: block;
        overflow: hidden;
        background-color: #f5f5f5;
        text-align: center;
        padding: 10px 0;
        width: 100%;
        margin: auto;
        text-transform: uppercase;
        color: red;
    }

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
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css
" rel="stylesheet">
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js
"></script>
<script src="http://localhost:3000/Assets/user/js/mutasche.min.js"></script>
<script src="http://localhost:3000/Assets/user/js/giohang.js"></script>
<script>
    $(document).ready(function() {
        // Bắt sự kiện click cho nút tăng số lượng
        $(".increase-btn").off('click').on("click", function() {
            var id_update = $(this).siblings(".id_update").val();
            var CbPhanLoai = 1;
            myGioHang.UpdateSoLuong(id_update,CbPhanLoai);
        });

        // Bắt sự kiện click cho nút giảm số lượng
        $(".decrease-btn").off('click').on("click", function() {
            var id_update = $(this).siblings(".id_update").val();
            var inputElement = $(this).siblings(".quantity-input");
            var currentValue = parseInt(inputElement.val());
            if (currentValue == 0) {
                alert("Bạn hãy bấm vào nút xóa");
                return;
            }
            var CbPhanLoai = 0;
            myGioHang.UpdateSoLuong(id_update,CbPhanLoai);
        });
    });
</script>