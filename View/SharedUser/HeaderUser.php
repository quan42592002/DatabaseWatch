<header class="header-wrapper">
    <div class="header-container align-center header-flex">
        <a href="?controller=TrangChuController">
            <picture class="logo_header">
                <source type="image/webp" srcset="https://www.watchstore.vn/upload/image/logo-watchstore.webp">
                <source type="image/jpeg" srcset="https://www.watchstore.vn/upload/original-image/logo-watchstore.png">
                <img class="lazyload_none" width="160" height="35" src="https://www.watchstore.vn/upload/original-image/logo-watchstore.png" alt="Đồng hồ Watchstore">
            </picture>
        </a>
        <div id="dialog" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 style="color: #3f93db; font-size: 25px; margin: 0;">UTCmember</h2>
                <p style="font-size: 15px; color:#747d8c; font-weight: 700; line-height: 20px; text-align: justify; font-family: sans-serif;">
                    Vui lòng đăng nhập tài khoản UTCmember để có trải nghiệm mua sắm tốt hơn
                </p>
                <div class="buttons">
                    <a href="?controller=LoginController" class="login-btn">Đăng nhập ngay</a>
                    <a href="?controller=RegisterController" class="register-btn">Đăng ký</a>
                </div>
            </div>
        </div>
        <!-- end header main cart-->
        <div class="modal-backdropp" id="backdrop"></div>
        <nav class="navbar header-navbar">
            <div id="cssmenu" class="menu-navbar">
                <ul>
                    <li> <a href="?controller=DanhSachSPController"><span class="text_menu" style="color: #DE0D0F;">Sản phẩm</span></a></li>
                    <li> <a href="/gioi-thieu"><span class="text_menu">Giới thiệu</span></a></li>
                    <script>
                        $('document').ready(function() {
                            $('.display-sub-menu').hover(function() {
                                $('.sub-menu').show();
                            })

                            $('.display-sub-menu').mouseleave(function() {
                                $('.sub-menu').hide();
                            })
                        });
                    </script>
                    <!-- END SUB-menu-->

                    </li>
                    <li> <a href="/collections/dong-ho-nu-chinh-hang"><span class="text_menu">Name</span></a></li>
                    <li> <a href="/collections/dong-ho-luxury-chinh-hang"><span class="text_menu">Nữ</span></a></li>
                    <li> <a href="/collections/dong-ho-luxury-chinh-hang"><span class="text_menu">Luxury</span></a></li>
                    <li> <a href="/collections/dong-ho-luot-chinh-hang"><span class="text_menu">Hàng lướt 99%</span></a></li>

                </ul>

            </div>
        </nav>

        <div class="search-acount" style="display: flex;">
            <!--Begin search-product -->
            <div class="search-acount" style="display: flex;">
                <!--Begin search-product -->
                <div id="seach-product" style="position: relative;">
                    <input onkeyup="ok();" style="width:220px;height:30px;margin-top:4px;border-radius:8px;border:1px solid #bababa" type="text" id="input_key" placeholder="Tìm đồng hồ theo tên,hãng...">
                    <i style="position:absolute;top:9px;font-size: 18px;right:12px;" class="bi bi-search"></i>
                    <div id="show-product-search" style="box-shadow: 0px 0px 15px -7px;" class="show-product-search">
                        <!-- title -->
                        <div class="viewed">Có phải bạn muốn tìm</div>

                        <!-- BEGIN List product -->
                        <div id="list-productkey" class="list-pk">

                        </div>
                        <!--END List product -->
                    </div>
                </div>

                <!--End search-product -->
                <div class="admin-login" id="<?php if (isset($_SESSION['Username'])) {
                                                    echo 'main_user';
                                                } else {
                                                    echo  'li_user';
                                                } ?>"><i class="bi bi-person-circle iconuser" style="color: #020101;"></i>
                    <span class="textUser"> <?php
                                            function layTen($hoTen)
                                            {
                                                $HoTen = explode(' ', $hoTen);
                                                $tenCuoiCung = end($HoTen);
                                                return $tenCuoiCung;
                                            }
                                            if (isset($_SESSION['Username'])) {
                                                $tenCuoiCung = layTen($_SESSION['TenDayDu']);
                                                echo $tenCuoiCung;
                                            } else {
                                                echo "Đăng nhập";
                                            }
                                            ?>
                    </span>

                    <ul class="vertical-menu hidden" id="submenu_user" style="border-radius: 10px;">
                        <li style="border-radius: 5px 5px 0 0 ;"><a href="?controller=DetailAccountController"><i class="fa-solid fa-circle-info"></i> Tài khoản</a></li>
                        <li><a href="?controller=TrangThaiController"><i class="fa-solid fa-rectangle-list"></i>Lịch sử Đơn hàng</a></li>
                        <li style="border-radius: 0 0 5px 5px;"><a href="?controller=Logout"> <i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a></li>
                    </ul>

                </div>
                <div class="card-shop">
                    <a href="?controller=GioHangController" class="card-shop-header">
                        <i class="bi bi bi-cart iconuser" style="color: #020101;"></i>
                    </a>
                </div>
            </div>
        </div>

</header>
<style>
    .textUser {
        font-size: 16px;
        color: black;
    }

    /* =============
    thêm
    ================*/
    /* Styles for the dialog */

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        border-radius: 10%;
        height: 100%;
        animation: slideIn 0.5s ease-out;
    }

    @keyframes slideIn {
        from {
            transform: translateY(100%);
        }

        to {
            transform: translateY(0);
        }
    }

    .modal-content {
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        max-width: 350px;
        text-align: center;
        border-radius: 20px;
        /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); */
    }

    .close {
        color: #aaaaaa;
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.2s;
        /* Thêm hiệu ứng transition cho màu chữ */
    }

    .close:hover {
        color: #3f93db;
        /* Thay đổi màu chữ khi hover */
        scale: 1.05;
    }

    /* Styles for the buttons */
    .buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .login-btn,
    .register-btn {
        padding: 8px 10px;
        border: none;
        border-radius: 7px;
        color: white;
        cursor: pointer;
        color: #ffffff;
        text-align: center;
        font-size: 17px;
        transition: all 0.5s;
        text-decoration: none;
        width: 50%;
        font-weight: 500;
    }

    .login-btn {
        background-color: #3f93db;
        margin-right: 10px;
    }

    .register-btn {
        color: #3f93db;
        border: 1px solid #3f93db;
    }

    .login-btn:hover,
    .register-btn:hover {
        scale: 1.05;
        text-decoration: none;
        color: #fff;
    }

    .register-btn:hover {
        background-color: #3f93db;
        color: #fff;
    }

    /* Styles for the modal backdrop (màn hình xung quanh hộp thoại) */
    .modal-backdropp {
        position: fixed;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        top: 0;
        left: 0;
        z-index: 100;
        display: none;
        transition: background-color 0.5s ease;
    }

    .modal.show {
        display: block;
    }

    .modal.show .modal-backdropp {
        display: block;
        opacity: 1;
    }

    .vertical-menu {
        list-style: none;
        padding: 0;
        margin: 0;
        z-index: 1000;
        position: absolute;
        top: 50px;
        right: -85px;
        width: 160px;
        font-size: 16px !important;
    }

    .vertical-menu li {
        display: block;
        padding: 0px;
        background-color: #f2f2f2;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    .vertical-menu li:last-child,
    .border__none {
        border-bottom: none;
    }


    .vertical-menu li a {
        text-decoration: none;
        color: #333;
    }

    .vertical-menu li:hover {
        background-color: #ddd;
        cursor: pointer;
    }

    .vertical-menu li:hover a {
        color: #3f93db;
        /* padding: 10px; */
    }

    .vertical-menu li a .fa-solid {
        color: black;
        margin-right: 8px;
    }

    .vertical-menu li a:hover i {
        color: #3f93db;
    }

    #main_user,
    #li_user {
        cursor: pointer;
    }

    /* Ẩn menu con mặc định */
    .hidden {
        display: none;
    }
</style>
<script language="javascript">
    function ok() {
        var key = document.getElementById("input_key").value;
        if (key == "") {
            $(".show-product-search").attr("style", "display:none;");
        }
    }
</script>
<script id="data-pk" type="x-tmpl-mustache">
    <a class="product-key" href="">
                    <img src="{{url}}" alt="">
                     <div class="infor">
                        <div class="name-pk"> {{TenDongHo}} </div>
                      
                        <span class="showgia">   
                        <strong style="color: #ED1C24;font-weight: bold;line-height: 24px;">{{GiaBan}}</strong>
                        <label class="discount-pk">{{GiamGia}}%</label>
                        </span>
                    </div>       
                    </a>
                
            </script>

<script type="text/javascript">
    const main_user = document.getElementById('main_user');
    const subMenu = document.getElementById('submenu_user');

    main_user.addEventListener('click', () => {
        subMenu.classList.toggle('hidden');
    });
</script>

<script>
    const liUser = document.getElementById('li_user');
    const dialog = document.getElementById('dialog');
    const closeBtn = document.querySelector('.close');
    const backdrop = document.getElementById('backdrop');

    liUser.addEventListener('click', () => {
        dialog.classList.add('show');
        backdrop.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        dialog.classList.remove('show');
        backdrop.style.display = 'none';
    });

    backdrop.addEventListener('click', () => {
        dialog.classList.remove('show');
        backdrop.style.display = 'none';
    });
</script>