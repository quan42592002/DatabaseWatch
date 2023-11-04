<div class="header-wrapper">
    <div class="header-container align-center header-flex">
        <div class="search-acount" style="display: flex;">
            <div id="sider-icon-full" style="position: fixed;
                top: 11px;
                left: 313px;">
                <i class="bi bi-arrows-fullscreen" style="color: #8f8f8f;font-size: 20px"></i>
            </div>
            <!--Begin search-product -->
            <div id="seach-product" style="position: relative;">
            <h4 style="margin: 10px; ">Thông báo: 10</h4>
            </div>
            <!--End search-product -->
            <div class="admin-login"><i class="bi bi-envelope iconNotifi" style="color: #8f8f8f;"></i>
                <div class="admin-noti">
                    <ul>
                        <li>
                            <a href='#'>
                                <h5>Duyệt đơn hàng : <small>11/05/2023</small></h5>
                                <span style="color: #9d0000;">Nội dung : Đông đã đặt mua đơn hàng</span>
                            </a>
                        </li>
                        <li>
                            <a href='#'>
                                <h5>Duyệt đơn hàng : <small>11/05/2023</small></h5>
                                <span style="color: #9d0000;">Nội dung : Đông đã đặt mua đơn hàng</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--End search-product -->
            <div class="admin-login"><i class="bi bi-person-circle iconuser" style="color: #8f8f8f;"></i>
                <div class="admin-sub">
                    <ul>
                        <li style="height: 40px;
                            background: linear-gradient(45deg, #1fa3d6, #e0ddeb);
                            border-radius: 11px 11px 0px 0px;
                            text-align: -webkit-center;">
                            <h3 style="margin-top: -4px;line-height: 40px;">
                                <?php
                                if (isset($_SESSION['Username'])) {
                                    echo $_SESSION['Username'];
                                } else {
                                    echo "Tài khoản";
                                }
                                ?>
                            </h3>
                        </li>
                        <?php
                        if (isset($_SESSION['Username'])) {
                            echo "<li><a href='#'>Thông tin cá nhân</a></li>
                            <li><a href='#'>Danh mục yêu thích</a></li>
                            <li><a href='?controller=Logout'>Đăng xuất</a></li>";
                        } else {
                            echo "
                            <li><a href='?controller=LoginController'>Đăng nhập</a></li>
                            <li><a href='#'>Danh mục yêu thích</a></li>
                            ";
                        }
                        ?>

                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>