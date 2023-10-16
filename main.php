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
                    require 'Route/user/web.php'; 
                } else {
                    require('View/Client/TrangChu.html'); 
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    require('View/SharedUser/UFooterCssMenu.php');
    ?>