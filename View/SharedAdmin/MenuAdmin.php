<div class="navbar-wrapper" style="width: 18%;background: white;">
    <nav class="navbar header-navbar" style="width: 100%;">
        <div class="logo_web">
            <a href="?controller=DashBoardController">
                <picture class="logo_header">
                    <source type="image/webp" srcset="https://www.watchstore.vn/upload/image/logo-watchstore.webp">
                    <source type="image/jpeg" srcset="https://www.watchstore.vn/upload/original-image/logo-watchstore.png">
                    <img class="lazyload_none" width="160" height="35" src="https://www.watchstore.vn/upload/original-image/logo-watchstore.png" alt="Đồng hồ Watchstore">
                </picture>
            </a>
        </div>
        <div style="text-align: center; padding: 19px; background-image: url('/UpLoad/Public/bg.jpg');background-size: cover;" class="cssmenu">
            <picture class="logo_header">
                <img class="lazyload_none" width="90" height="90" src="/UpLoad/Public/3135715.png" alt="">
                <div> <?php
                        if (isset($_SESSION['Username'])) {
                            echo $_SESSION['Username'];
                        } else {
                            echo "Tài khoản";
                        }
                        ?></div>
            </picture>
        </div>
        <div style="    margin: 0;
    position: relative;
    top: -19px;
    background: #448aff;" class="cssmenu">
            <h4 style="color:white;padding: 5px;">Các chức năng chính</h4>
        </div>
        <div id="cssmenu" class="menu-navbar cssmenu">
            <ul>
                <li> <a href="?controller=DashBoardController"><i class="bi bi-bar-chart"></i> Trang chủ , thống kê</a></li>
                <li> <a href="/gioi-thieu"><i class="bi bi-bookmarks"></i> Báo cáo </a></li>
                <li> <a href="?controller=DongHoController"><i class="bi bi-app-indicator"></i> Đồng hồ</a></li>
                <li> <a href="?controller=QuanLyKhoController"><i class="bi bi-box-seam"></i> Quản lý phiếu</a></li>
                <li> <a href="?controller=SliderController"><i class="bi bi-funnel"></i>Slider</a></li>
                <li> <a href=""><i class="bi bi-funnel"></i> Tìm kiếm</a></li>
                <li>
                    <a href="javascript:myAdmin.OnClickMenu()"><i class="bi bi-gear"></i> Cấu hình</a>
                    <div class="menu-level-2">
                        <ul>
                            <li style="list-style: none;"><a href="#">Danh mục hệ thống</a></li>
                            <li style="list-style: none;"><a href="?controller=ThuongHieuController">Danh mục thương hiệu</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>