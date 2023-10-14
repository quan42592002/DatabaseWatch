<?php
if (session_name('is_role') == "admin") {
?>
     <div class="navbar-wrapper">
        <nav class="navbar header-navbar">
            <div id="cssmenu" class="menu-navbar">
                <ul>
                    <li> <a href="/collections/xa-kho-gia-tot"><span class="text_menu">Thống kê,tin tức</span></a></li>
                    <li> <a href="/gioi-thieu"><span class="text_menu"></span></a></li>
                    <li> <a href="/collections/dong-ho-nam-chinh-hang"><span class="text_menu">Nam</span></a></li>
                    <li> <a href="/collections/dong-ho-nu-chinh-hang"><span class="text_menu">Nữ</span></a></li>
                    <li> <a href="/collections/dong-ho-luxury-chinh-hang"><span class="text_menu">Luxury</span></a></li>
                    <li> <a href="/collections/dong-ho-luot-chinh-hang"><span class="text_menu">Hàng lướt 99%</span></a></li>
                </ul>
            </div>
        </nav>
    </div>

<?php
} else {
?>
    <div class="navbar-wrapper">
        <nav class="navbar header-navbar">
            <div id="cssmenu" class="menu-navbar">
                <ul>
                    <li> <a href="/collections/xa-kho-gia-tot"><span class="text_menu">Trang chủ</span></a></li>
                    <li> <a href="/gioi-thieu"><span class="text_menu">Giới thiệu</span></a></li>
                    <li> <a href="/collections/dong-ho-nam-chinh-hang"><span class="text_menu">Nam</span></a></li>
                    <li> <a href="/collections/dong-ho-nu-chinh-hang"><span class="text_menu">Nữ</span></a></li>
                    <li> <a href="/collections/dong-ho-luxury-chinh-hang"><span class="text_menu">Luxury</span></a></li>
                    <li> <a href="/collections/dong-ho-luot-chinh-hang"><span class="text_menu">Hàng lướt 99%</span></a></li>
                </ul>
            </div>
        </nav>
    </div>

<?php
}
?>