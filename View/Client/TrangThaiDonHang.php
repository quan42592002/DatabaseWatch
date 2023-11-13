<input type="hidden" id="UsersId" value="<?php
                                            if (isset($_SESSION['LoaiTaiKhoan'])) {
                                                echo $_SESSION['IdUsers'];
                                            }
                                            ?>">
<div class="cart-body" id="hidden-list-1">
    <div class="title">
        <h3><a href="?controller=TrangThaiController" style="font-size: 14px;
    font-weight: 600;
    color: cornflowerblue;">Lịch sử đơn hàng</a></h3>
    </div>
    <div>
        <section>
            <div id="lstHistory">
            </div>
        </section>
    </div>

</div>

<script id="data-history" type="x-tmpl-mustache">
    <div class="order-item" style="display: block;">
        <div  style="display: flex;">
        <img src="{{ Url_anh }}" alt="">
        <h4>{{TenDongHo}} / <span style="color:red">{{TrangThaiFalse}}</span> <span style="color:green">{{TrangThaiTrue}}</span>/Số lượng : {{SoLuongMua}}</h4>
    </div>
        <div class="box-price" style="margin: 0;">
            <p style="color:#8a8a8a">Giá bán : {{ GiaBan }}</p>
        </div>
    </div>
</script>

<div class="ent-container ent-flex" id="hidden-list">
        <div class="tbhh">
            <div class="alerttb"> <i class="cartnew-tb"></i><strong>Không có thông tin sản phẩm nào</strong> </div>
            <div class="ordercontent">
                <p>Hiện không có sản phẩm nào trong giỏ hàng của bạn. Bạn có thể đặt hàng trực tiếp qua <b> Holine 032581817</b> hoặc <b><a href="https://zalo.me/4455668531311407892" rel="nofollow" target="_blank">Zalo</a></b>. WatchStore sẽ hỗ trợ bạn.</p>
            </div>
            <div class="timetakegoods"> <button onclick="history.back()">Quay lại</button> </div>
            <div class="timetakegoods" style="float: right;"> <a href="http://localhost:3000/main.php?controller=TrangChuController" class="buyanother"> Về trang chủ </a> </div>
        </div>
    </div>
<link rel="stylesheet" href="http://localhost:3000/Assets/css/trangthaidon.css">
<script src="http://localhost:3000/Assets/user/js/mutasche.min.js"></script>
<script src="http://localhost:3000/Assets/user/js/History.js"></script>