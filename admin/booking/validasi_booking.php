<?php
include '../../config/koneksi.php';

$id = $_GET['id'];
$status = $_GET['status'];

mysqli_query($conn, "UPDATE booking 
SET status='$status'
WHERE id_booking='$id'");

header("Location: data_booking.php");
?>