<?php
session_start();
include "../config/config.php"; // Pastikan untuk menyesuaikan path ke file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $seminar_id = $_POST['seminar_id'];
    $user_name = $_POST['user_name'];

    // Query untuk menyimpan data pendaftaran
    $query = "INSERT INTO registrations (seminar_id, user_name) VALUES ('$seminar_id', '$user_name')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Pendaftaran berhasil
        header("Location: ../view/view_jadwal.php?status=success"); // Ganti ke jadwal.php
    } else {
        // Pendaftaran gagal
        header("Location: ../view/jadwal.php?status=error"); // Ganti ke jadwal.php
    }
} else {
    header("Location: ../view/jadwal.php");
    exit();
}
