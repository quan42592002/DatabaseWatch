    <?php
    session_start();
    if (isset($_SESSION['IdRole'])) {
        if ($_SESSION['IdRole'] == 1) {
            require('View/SharedAdmin/AHeadCssMenu.php');
            require('View/SharedAdmin/HeaderAdmin.php');
            require('View/SharedAdmin/MenuAdmin.php');
            // require('View/SharedAdmin/BodyAdmin.php');
        } else {
            require('View/SharedUser/UHeadCssMenu.php');
            require('View/SharedUser/HeaderUser.php');
        }
    } else {
        require('View/SharedUser/UHeadCssMenu.php');
        require('View/SharedUser/HeaderUser.php');
    }
    ?>
    <div class="wrapper">
        <div class="wrapper-container">
            <div class="row">
                <?php
                if (isset($_GET['controller'])) {
                    if (isset($_SESSION['IdRole'])) {
                        if ($_SESSION['IdRole'] == 1) {
                            require 'Route/admin/web.php';
                        } else {
                            require 'Route/user/web.php';
                        }
                    } else {
                        require 'Route/user/web.php';
                    }
                } else {
                    if (isset($_SESSION['IdRole'])) {
                        if ($_SESSION['IdRole'] == 1) {
                            require('View/Admin/DashBoard.php');
                        } else {
                            require('View/Client/TrangChu.php');
                        }
                    } else {
                        require('View/Client/TrangChu.php');
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['IdRole'])) {
        if ($_SESSION['IdRole'] == 1) {
            require('View/SharedAdmin/AFooterCssMenu.php');
        } else {
            require('View/SharedUser/UFooterCssMenu.php');
        }
    } else {
        require('View/SharedUser/UFooterCssMenu.php');
    }
    ?>