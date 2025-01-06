<?php
session_start();
require_once("../includes/db_session_chk.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('../includes/header.php');
?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php
            require_once('../includes/sidebar.php');
            require_once('../includes/top_nav.php');
            require_once('../includes/footer_body.php');
            ?>

            <!-- page content -->
            <!-- /page content -->

        </div>
    </div>

    <?php
    require_once('../includes/footer.php');
    ?>
</body>
</html>