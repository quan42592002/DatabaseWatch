<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đồng hồ</title>
    <link rel="stylesheet" href="http://localhost:3000/Assets/css/style.css">
    <link rel="stylesheet" href="http://localhost:3000/Assets/css/main.css">
</head>

<body>
    <?php
    require_once('Modal/Database.php');
    // Gọi đến kết nối mysql
    $db = new Database;
    $db->connect();

    require('View/SharedAdmin/HeaderAdmin.php');
    require('View/SharedAdmin/MenuAdmin.php');
    ?>
    <div class="wrapper">
        <div class="wrapper-container">
            <div class="row">
                <?php
                require('View/Admin/Login.php');
                ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="coppy_right"> © 2020 - 2023 bản quyền thuộc WatchStore Việt Nam. Hotline: 093.189.2222 - 097.189.3333 - 096.139.5555. Email: info@watchstore.vn</div>
    </footer>

</body>

</html>