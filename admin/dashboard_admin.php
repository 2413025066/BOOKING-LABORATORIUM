<?php
session_start();

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="stylesheet" href="../assets/css/admin.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<div class="container">

    <h1>Dashboard Admin</h1>

    <p class="subtitle">
        Selamat datang Admin
    </p>

    <div class="menu">

        <a href="laboratorium/data_lab.php" class="card">
            🖥 Data Laboratorium
        </a>

        <a href="booking/data_booking.php" class="card">
            📅 Data Booking
        </a>

        <a href="pengguna/data_pengguna.php" class="card">
            👤 Data Pengguna
        </a>

        <a href="laporan/laporan_booking.php" class="card">
            📄 Laporan Booking
        </a>

        <a href="../logout.php" class="logout">
            Logout
        </a>

    </div>

</div>

</body>
</html>