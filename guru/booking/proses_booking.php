<?php
session_start();
include '../../config/koneksi.php';

if ($_SESSION['role'] != 'guru') {
    header("Location: ../../login.php");
}

$id_user = $_SESSION['id_user'];

$id_lab = $_POST['id_lab'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$keterangan = $_POST['keterangan'];

$status = "Menunggu";

$query = mysqli_query($conn, "INSERT INTO booking 
VALUES (
    NULL,
    '$id_user',
    '$id_lab',
    '$tanggal',
    '$jam',
    '$keterangan',
    '$status'
)");

if ($query) {

    echo "
    <script>
        alert('Booking berhasil dikirim!');
        window.location='../dashboard_guru.php';
    </script>
    ";

} else {

    echo "
    <script>
        alert('Booking gagal!');
        window.location='booking.php';
    </script>
    ";

}
?>