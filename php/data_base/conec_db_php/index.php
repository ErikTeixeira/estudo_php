<?php 

    session_start();

    if (isset($_SESSION['user'])) {
        require_once "template/template.php";
    } else {
        require_once "template/login-template.php";
    }

?>