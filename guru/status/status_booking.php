<?php
session_start();
include '../../config/koneksi.php';

if ($_SESSION['role'] != 'guru') {
    header("Location: ../../login.php");
}

$id_user = $_SESSION['id_user'];

$query = mysqli_query($conn, "SELECT booking.*, laboratorium.nama_lab

FROM booking

JOIN laboratorium
ON booking.id_lab = laboratorium.id_lab

WHERE booking.id_user = '$id_user'

ORDER BY booking.id_booking DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Status Booking</title>
</head>
<body>

<h2>Status Booking Laboratorium</h2>

<table border="1" cellpadding="10">

<tr>

    <th>No</th>
    <th>Laboratorium</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Keterangan</th>
    <th>Status</th>

</tr>

<?php
$no = 1;

while($data = mysqli_fetch_assoc($query)) {
?>

<tr>

    <td><?= $no++; ?></td>

    <td><?= $data['nama_lab']; ?></td>

    <td><?= $data['tanggal']; ?></td>

    <td><?= $data['jam']; ?></td>

    <td><?= $data['keterangan']; ?></td>

    <td><?= $data['status']; ?></td>

</tr>

<?php } ?>

</table>

<br><br>

<a href="../dashboard_guru.php">
    Kembali
</a>

</body>
</html>