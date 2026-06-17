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
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Laporan Booking</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f1f5f9;
    height:100vh;
    overflow:hidden;
}

.container{
    width:90%;
    height:90vh;
    margin:25px auto;
    background:white;
    border-radius:30px;
    padding:30px;
    display:flex;
    flex-direction:column;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

h2{
    text-align:center;
    color:#1e40af;
    font-size:38px;
    font-weight:700;
    margin-bottom:25px;
}

.table-wrapper{
    flex:1;
    overflow-y:auto;
    border-radius:18px;
    border:1px solid #e2e8f0;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

thead{
    position:sticky;
    top:0;
    z-index:10;
}

th{
    background:#2563eb;
    color:white;
    padding:16px;
    font-size:15px;
    font-weight:600;
}

td{
    padding:15px;
    text-align:center;
    border-bottom:1px solid #e2e8f0;
    font-size:14px;
}

tr:hover{
    background:#eff6ff;
}

.status-disetujui{
    background:#22c55e;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.status-ditolak{
    background:#ef4444;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.status-pending{
    background:#facc15;
    color:black;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.btn-cetak{
    display:inline-block;
    width:fit-content;
    margin-top:20px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    padding:12px 22px;
    border-radius:12px;
    font-weight:600;
    transition:0.3s;
}

.btn-cetak:hover{
    background:#1d4ed8;
}

.btn-kembali{
    display:inline-block;
    width:fit-content;
    margin-top:15px;
    background:#60a5fa;
    color:white;
    text-decoration:none;
    padding:12px 22px;
    border-radius:12px;
    font-weight:600;
    transition:0.3s;
}

.btn-kembali:hover{
    background:#3b82f6;
}

</style>

</head>

<body>

<div class="container">

    <h2>Laporan Booking Laboratorium</h2>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Laboratorium</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

            <?php

            $no = 1;

            $query = mysqli_query($koneksi,"
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

                <td>

                    <?php if($data['status']=="disetujui"){ ?>

                        <span class="status-disetujui">
                            Disetujui
                        </span>

                    <?php } elseif($data['status']=="ditolak"){ ?>

                        <span class="status-ditolak">
                            Ditolak
                        </span>

                    <?php } else { ?>

                        <span class="status-pending">
                            Pending
                        </span>

                    <?php } ?>

                </td>

            </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

    <a href="cetak_laporan.php" class="btn-cetak">
        📄 Cetak Laporan
    </a>

    <a href="../dashboard_admin.php" class="btn-kembali">
        Kembali
    </a>

</div>

</body>
</html>