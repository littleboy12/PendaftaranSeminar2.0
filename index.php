<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./view/view_login.php");

    exit();
}

?>