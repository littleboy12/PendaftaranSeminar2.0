<?php
include "../config/config.php";
session_start();

$userOrEmail = $password = "";
$error = [];

if (isset($_POST['login'])) {
    $userOrEmail = $_POST['userOrEmail'];
    $password = $_POST['password'];

    $sqlCekAccount = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$userOrEmail' OR email = '$userOrEmail'");
    $sqlCekAccountPass = mysqli_query($conn, "SELECT * FROM tb_user WHERE `password` = '$password'");

    if (mysqli_num_rows($sqlCekAccount) > 0) {
        if (mysqli_num_rows($sqlCekAccountPass) > 0) {
            $row = mysqli_fetch_array($sqlCekAccount);
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['level'] = $row['level'];

            header("Location: ../view/view_beranda.php");

            exit();
        } else {
            $error['errPassword'] = "Password Salah";
        }
    } else {
        $error['errUsername'] = "Username Atau Email Tidak Terdaftar";
    }
}
