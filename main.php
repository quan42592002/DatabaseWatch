    <?php
    require('View/SharedUser/UHeadCssMenu.php');
    session_start();

    require('View/SharedUser/HeaderUser.php');
    require('View/SharedUser/MenuUser.php');
    ?>
    <div class="wrapper">
        <div class="wrapper-container">
            <div class="row">
                <?php

                if (isset($_GET['controller'])) {
                    require 'Route/user/web.php'; /*xử lý các request trong Route/web.php*/
                } else {
                    require('View/Client/TrangChu.html'); /*require giao diện trang chủ*/
                }

                // if (isset($_SESSION['username'])) {
                //     require('View/Admin/Login.php');
                // } else {
                //     require('View/Client/TrangChu.html');
                // }
                ?>
            </div>
        </div>
    </div>
    <?php
    require('View/SharedUser/UFooterCssMenu.php');
    ?>