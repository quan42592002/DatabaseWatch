<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đồng hồ</title>
    <link rel="stylesheet" href="http://localhost:3000/Assets/css/style.css">
    <link rel="stylesheet" href="http://localhost:3000/Assets/css/main.css">
    <link rel="stylesheet" href="http://localhost:3000/Assets/css/trangchuuser.css">
</head>

<body>
    <?php
    session_start();

    require('View/SharedUser/HeaderUser.php');
    require('View/SharedUser/MenuUser.php');
    ?>
    <div class="wrapper">
        <div class="wrapper-container">
            <div class="row">
                <?php
                if (isset($_SESSION['username'])) {
                    require('View/Admin/Login.php');
                } else {
                    require('View/Client/TrangChu.html');
                }
                ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="coppy_right"> © 2020 - 2023 bản quyền thuộc WatchStore Việt Nam. Hotline: 093.189.2222 - 097.189.3333 - 096.139.5555. Email: info@watchstore.vn</div>
    </footer>

    <!-- css của trang chủ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(".iconuser").click(function() {
            $(".admin-sub").slideToggle();
        });
    </script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <!-- /* END BANNER */ -->
</body>

</html>