<?php
include_once "../config/config.php";
session_start();

$error = [];

$nama = $email = $negara = $provinsi = $alamat = $institusi = $username = $password = $rePassword = "";

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $negara = $_POST['negara'];
    $alamat = $_POST['alamat'];
    $institusi = $_POST['institusi'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];

    if ($password != $rePassword) {
        $error['errPassword'] = "Password Tidak Sama";
    } else {
        $sqlCekEmail = mysqli_query($conn, "SELECT email FROM tb_user WHERE email = '$email'");
        if (mysqli_num_rows($sqlCekEmail) > 0) {
            $error['errEmail'] = "Email Sudah Terdaftar, Silahkan <a href = './view_login.php'>Login</a>";
        } else {
            $sqlCekAccount = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
            if (mysqli_num_rows($sqlCekAccount) > 0) {
                $error['errUsername'] = "Username Sudah Terdaftar";
            } else {
                $sqlInsertAccount = mysqli_query($conn, "INSERT INTO `tb_user`(`nama`, `username`, `email`, `password`, `level`) VALUES ('$nama','$username','$email','$password','user')");
                
                if ($sqlCekAccount) {
                    $sqlInsertData = mysqli_query($conn, "INSERT INTO `registration`(`nama`, `email`, `insitusi`, `negara`, `alamat`, `status`, `is_delete`) VALUES ('$nama','$email','$institusi','$negara','$alamat', 'belum', '0')");
                    if ($sqlInsertData) {
                        $_SESSION['username'] = $username;
                        $_SESSION['nama'] = $nama;
                        $_SESSION['level'] = 'user';
    
                        header("Location: ../view/view_beranda.php");
                        exit();
                    }
                } else {
                    $error['errDatabase'] = "Gagal Menginput Data";
                }
            }
        }
    }
}
