<header class="header-wrapper">
    <div class="header-container align-center header-flex">
        <a href="?controller=TrangChuController">
            <picture class="logo_header">
                <source type="image/webp" srcset="https://www.watchstore.vn/upload/image/logo-watchstore.webp">
                <source type="image/jpeg" srcset="https://www.watchstore.vn/upload/original-image/logo-watchstore.png">
                <img class="lazyload_none" width="160" height="35" src="https://www.watchstore.vn/upload/original-image/logo-watchstore.png" alt="Đồng hồ Watchstore">
            </picture>
        </a>
        <nav class="navbar header-navbar">
            <div id="cssmenu" class="menu-navbar">
                <ul>
                    <li> <a href="?controller=DanhSachSPController"><span class="text_menu" style="color: #DE0D0F;">Xả kho</span></a></li>
                    <li> <a href="/gioi-thieu"><span class="text_menu">Giới thiệu</span></a></li>
                    <li> <a href="/collections/dong-ho-nam-chinh-hang"><span class="text_menu">Menu</span></a></li>
                    <li> <a href="/collections/dong-ho-nu-chinh-hang"><span class="text_menu">Name</span></a></li>
                    <li> <a href="/collections/dong-ho-luxury-chinh-hang"><span class="text_menu">Nữ</span></a></li>
                    <li> <a href="/collections/dong-ho-luxury-chinh-hang"><span class="text_menu">Luxury</span></a></li>
                    <li> <a href="/collections/dong-ho-luot-chinh-hang"><span class="text_menu">Hàng lướt 99%</span></a></li>
                </ul>
            </div>
        </nav>

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
            <div class="card-shop">
                <a href="http://" class="card-shop-header">
                    <i class="bi bi bi-cart iconuser" style="color: #8f8f8f;"></i>
                </a>
            </div>
        </div>
    </div>

</header>