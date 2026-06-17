<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'guru') {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins', sans-serif;
        }

        body{
            background:#f1f5f9;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .container{
            width:80%;
            max-width:1000px;
            background:#ffffff;
            border-radius:30px;
            padding:40px;
            box-shadow:0 15px 35px rgba(0,0,0,0.08);
        }

        h1{
            text-align:center;
            color:#1e40af;
            font-size:38px;
            margin-bottom:8px;
            font-weight:700;
        }

        .welcome{
            text-align:center;
            font-size:16px;
            color:#64748b;
            margin-bottom:35px;
        }

        .menu{
            display:grid;
            grid-template-columns:repeat(2,1fr);
            gap:22px;
            margin-bottom:25px;
        }

        .card{
            background:#ffffff;
            border-radius:22px;
            padding:30px;
            text-align:center;
            text-decoration:none;
            color:#1e293b;
            font-size:18px;
            font-weight:600;
            border:1px solid #e2e8f0;
            box-shadow:0 6px 18px rgba(0,0,0,0.05);
            transition:all 0.3s ease;
        }

        .card:hover{
            transform:translateY(-6px);
            box-shadow:0 12px 24px rgba(59,130,246,0.18);
            border-color:#60a5fa;
            color:#2563eb;
        }

        .logout{
            display:block;
            width:100%;
            background:#2563eb;
            color:white;
            text-align:center;
            padding:18px;
            border-radius:22px;
            text-decoration:none;
            font-size:18px;
            font-weight:600;
            transition:0.3s;
        }

        .logout:hover{
            background:#1d4ed8;
            transform:translateY(-2px);
        }

    </style>

</head>
<body>

<div class="container">

    <h1>Dashboard Guru</h1>

    <div class="welcome">
        Selamat datang Guru
    </div>

    <div class="menu">

        <a href="../admin/laboratorium/data_lab.php" class="card">
            🖥️ <br><br>
            Data Laboratorium
        </a>

        <a href="booking/booking.php" class="card">
            📅 <br><br>
            Booking Laboratorium
        </a>

        <a href="booking/riwayat_booking.php" class="card">
            📋 <br><br>
            Riwayat Booking
        </a>

    </div>

    <a href="../logout.php" class="logout">
        Logout
    </a>

</div>

</body>
</html>