<div class="header-wrapper">
    <div class="header-container align-center header-flex">
        <div class="search-acount" style="display: flex;">
            <!--Begin search-product -->
            <div id="seach-product" style="position: relative;">
                <input style="width:220px;height:30px;margin-top:4px;border-radius:8px;border:1px solid #bababa" type="text" placeholder="Tìm đồng hồ theo tên,hãng...">
                <i style="position:absolute;top:9px;font-size: 18px;right:12px;" class="bi bi-search"></i>
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