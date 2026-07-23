<?php
    include_once __DIR__ . "/../products.php";

    (isset($_GET["p"]) ? $page = $_GET["p"] : $page = "home");

    include_once __DIR__ . "/../components/header.php";
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

    <?php
        (isset($_GET["p"]) ? $page = $_GET["p"] : $page = "home");
        
        if (file_exists(__DIR__ . "/../pages/{$page}.php")) {
            include_once __DIR__ . "/../pages/{$page}.php";
        } else {
            include_once __DIR__ . "/../pages/home.php";
        }
    ?>
    <!-- /.container-fluid -->



    <?php include_once __DIR__ . "/../components/footer.php"; ?>

