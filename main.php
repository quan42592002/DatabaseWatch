<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đồng hồ</title>
    <link rel="stylesheet" href="http://localhost:3000/Assets/css/style.css">
    <link rel="stylesheet" href="http://localhost:3000/Assets/css/main.css">
    <link rel="stylesheet" href="http://localhost:3000/Assets/css/trangchuuser.css">

    <!-- css của trang chủ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    
</head>

<body>
    <?php
    // require_once('Modal/Database.php');
    // // Gọi đến kết nối mysql
    // $db = new Database;
    // $db->connect();

    require('View/SharedUser/HeaderUser.php');
    require('View/SharedUser/MenuUser.php');
    ?>
    <div class="wrapper">
        <div class="wrapper-container">
            <div class="row">
                <?php
                require('View/Client/TrangChu.html');
                ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="coppy_right"> © 2020 - 2023 bản quyền thuộc WatchStore Việt Nam. Hotline: 093.189.2222 - 097.189.3333 - 096.139.5555. Email: info@watchstore.vn</div>
    </footer>

</body>

</html>