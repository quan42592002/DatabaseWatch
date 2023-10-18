    <?php
    require('View/SharedUser/UHeadCssMenu.php');
    session_start();

    require('View/SharedUser/HeaderUser.php');
    // if (isset($_SESSION['IdRole'])) {
    //     if ($_SESSION['IdRole'] == 1) {
    //         require('View/SharedAdmin/MenuAdmin.php');
    //     } else {
    //         // require('View/SharedUser/MenuUser.php');
    //     }
    // } else {
    //     require('View/SharedUser/MenuUser.php');
    // }
    ?>
    <div class="wrapper">
        <div class="wrapper-container">
            <div class="row">
                <?php
                if (isset($_GET['controller'])) {
                    if (isset($_SESSION['IdRole'])) {
                        if ($_SESSION['IdRole'] == 1) {
                            require 'Route/admin/web.php';
                        }else{
                            require 'Route/user/web.php';
                        }
                    }else{
                        require 'Route/user/web.php';
                    }
                } else {
                    if (isset($_SESSION['IdRole'])) {
                        if ($_SESSION['IdRole'] == 1) {
                            require('View/Admin/DashBoard.php');
                        }else{
                            require('View/Client/TrangChu.html');
                        }
                    }else{
                        require('View/Client/TrangChu.html');
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    require('View/SharedUser/UFooterCssMenu.php');
    ?>