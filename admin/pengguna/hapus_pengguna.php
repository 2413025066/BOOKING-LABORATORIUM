<?php
session_start();
include '../../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../../login.php");
}

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM user WHERE id_user='$id'");

header("Location: data_pengguna.php");
?>