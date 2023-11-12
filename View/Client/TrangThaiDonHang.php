<input type="hidden" id="UsersId" value="<?php
                                            if (isset($_SESSION['IdRole'])) {
                                                echo $_SESSION['IdUsers'];
                                            }
                                            ?>">
<div class="cart-body" id="hidden-list-1">
    <div class="title">
        <h3><a href="?controller=TrangThaiController" style="font-size: 14px;
    font-weight: 600;
    color: cornflowerblue;">Lịch sử đơn hàng</a></h3>
    </div>
    <div id="lstHistory">

    </div>

</div>

<script id="data-gio-hang" type="x-tmpl-mustache">
    <section>
        <div>
            <div style="display: flex;">
                <h4>Ngày mua hàng: 11/10/2023</h4>
                <h4 style="margin-left: 51%;">Trạng thái: <span style="color:red">Đơn hàng đang được xét duyệt</span></h4>
            </div>
            <div class="order-item">
                <img src="https://placekitten.com/300/200" alt="Product 1">
                <h2>Product 1</h2>
                <p>Giá: $50.00</p>
                <p>Số lượng: 1</p>
            </div>

            <div class="order-item">
                <img src="https://placekitten.com/300/201" alt="Product 2">
                <h2>Product 2</h2>
                <p>Giá: $40.00</p>
                <p>Số lượng: 2</p>
            </div>
        </div>
    </section>
</script>

<!-- <div class="ent-container ent-flex" id="hidden-list">
        <div class="tbhh">
            <div class="alerttb"> <i class="cartnew-tb"></i><strong>Không có thông tin sản phẩm nào</strong> </div>
            <div class="ordercontent">
                <p>Hiện không có sản phẩm nào trong giỏ hàng của bạn. Bạn có thể đặt hàng trực tiếp qua <b> Holine 032581817</b> hoặc <b><a href="https://zalo.me/4455668531311407892" rel="nofollow" target="_blank">Zalo</a></b>. WatchStore sẽ hỗ trợ bạn.</p>
            </div>
            <div class="timetakegoods"> <button onclick="history.back()">Quay lại</button> </div>
            <div class="timetakegoods" style="float: right;"> <a href="http://localhost:3000/main.php?controller=TrangChuController" class="buyanother"> Về trang chủ </a> </div>
        </div>
    </div> -->
<link rel="stylesheet" href="http://localhost:3000/Assets/css/trangthaidon.css">
<script src="http://localhost:3000/Assets/user/js/mutasche.min.js"></script>
<link rel="stylesheet" href="http://localhost:3000/Assets/user/js/HistoryCard.js">