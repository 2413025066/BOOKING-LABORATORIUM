<?php
session_start();
include '../../config/koneksi.php';

if ($_SESSION['role'] != 'guru') {
    header("Location: ../../login.php");
}

$query = mysqli_query($conn, "SELECT * FROM laboratorium");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Laboratorium</title>
</head>
<body>

<h2>Data Laboratorium</h2>

<table border="1" cellpadding="10">

<tr>
    <th>No</th>
    <th>Nama Laboratorium</th>
    <th>Kapasitas</th>
</tr>

<?php
$no = 1;

while($data = mysqli_fetch_assoc($query)) {
?>

<tr>

    <td><?= $no++; ?></td>

    <td><?= $data['nama_lab']; ?></td>

    <td><?= $data['kapasitas']; ?></td>

</tr>

<?php } ?>

</table>

<br><br>

<a href="../dashboard_guru.php">
    Kembali
</a>

</body>
</html>