<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['role'] != 'guru') {
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Laboratorium</title>
</head>
<body>

<h1>Data Laboratorium</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Lab</th>
        <th>Lokasi</th>
        <th>Kapasitas</th>
    </tr>

<?php
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM laboratorium");

while ($d = mysqli_fetch_array($data)) {
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama_lab']; ?></td>
    <td><?= $d['lokasi']; ?></td>
    <td><?= $d['kapasitas']; ?></td>
</tr>

<?php } ?>

</table>

<br>
<a href="dashboard_guru.php">Kembali</a>

</body>
</html>