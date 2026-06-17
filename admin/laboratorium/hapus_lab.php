<?php
session_start();
include '../../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../../login.php");
}

$id = $_GET['id'];

/* hapus booking dulu */
mysqli_query($conn, "DELETE FROM booking 
WHERE id_lab='$id'");

/* lalu hapus laboratorium */
mysqli_query($conn, "DELETE FROM laboratorium 
WHERE id_lab='$id'");

header("Location: data_lab.php");
?>