<?php
session_start();
include '../../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Cetak Laporan</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#dbeafe;
    padding:30px;
}

h2{
    text-align:center;
    margin-bottom:30px;
    color:#2563eb;
    font-size:38px;
    font-weight:700;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

th{
    background:#60a5fa;
    color:white;
    padding:12px;
    border:1px solid #ddd;
}

td{
    padding:12px;
    border:1px solid #ddd;
    text-align:center;
}

.btn-print{
    display:inline-block;
    margin-top:25px;
    margin-right:10px;
    padding:12px 25px;
    background:#60a5fa;
    color:white;
    border:none;
    border-radius:12px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.btn-print:hover{
    background:#3b82f6;
}

.btn-kembali{
    display:inline-block;
    margin-top:25px;
    padding:12px 25px;
    background:#3b82f6;
    color:white;
    text-decoration:none;
    border-radius:12px;
    font-weight:600;
    transition:0.3s;
}

.btn-kembali:hover{
    background:#2563eb;
}

@media print{
    .btn-print,
    .btn-kembali{
        display:none;
    }

    body{
        background:white;
    }
}

</style>

</head>
<body>

<h2>Laporan Booking Laboratorium</h2>

<table>

<tr>
    <th>No</th>
    <th>Guru</th>
    <th>Laboratorium</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Keterangan</th>
    <th>Status</th>
</tr>

<?php

$no = 1;

$query = mysqli_query($koneksi, "
SELECT *
FROM booking
INNER JOIN user
ON booking.id_user = user.id_user
INNER JOIN laboratorium
ON booking.id_lab = laboratorium.id_lab
");

while($data = mysqli_fetch_assoc($query)){
?>

<tr>

    <td><?= $no++; ?></td>
    <td><?= $data['username']; ?></td>
    <td><?= $data['nama_lab']; ?></td>
    <td><?= $data['tanggal']; ?></td>
    <td><?= $data['jam']; ?></td>
    <td><?= $data['keterangan']; ?></td>
    <td><?= $data['status']; ?></td>

</tr>

<?php } ?>

</table>

<br>

<button onclick="window.print()" class="btn-print">
    Print
</button>

<a href="laporan_booking.php" class="btn-kembali">
    Kembali
</a>

</body>
</html>