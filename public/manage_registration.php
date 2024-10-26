<?php
include '../config/config.php';

$error = [];

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $email = $_POST['email'];
    $negara = $_POST['negara'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $id_registration = $_POST['id_registration'];

    if ($status == '0') {
        $error['errStatus'] = "Tidak Ada Perubahan";
    } else {
        $sqlUpdateData = mysqli_query($conn, "UPDATE `registration` SET `id_registration`='$id_registration',`nama`='$nama',`email`='$email',`insitusi`='$institusi',`negara`='$negara',`alamat`='$alamat',`status`='$status',`is_delete`='0' WHERE id_registration='$id_registration'");

        if ($sqlUpdateData) {
            $error['errStatusAcc'] = "Data Telah Di Ubah";
        } else {
            $error['errStatusAcc'] = "Gagal Mengubah Data";
        }
    }
}

if (isset($_POST['hapus'])) {
    $error['errStatusConfirm'] = "Yakin Akan Di Hapus ? ";

}

if (isset($_POST['tidak'])) {
    $error = [];
} 

if (isset($_POST['ya'])){
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $email = $_POST['email'];
    $negara = $_POST['negara'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];
    $id_registration = $_POST['id_registration'];

    $sqlUpdateData = mysqli_query($conn, "UPDATE `registration` SET `id_registration`='$id_registration',`nama`='$nama',`email`='$email',`insitusi`='$institusi',`negara`='$negara',`alamat`='$alamat',`status`='$status',`is_delete`='1' WHERE id_registration='$id_registration'");

    if ($sqlUpdateData) {
        header("Location: ./view_manage_registration.php");
        exit();
    }
}