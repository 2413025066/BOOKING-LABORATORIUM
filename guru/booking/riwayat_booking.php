<?php
session_start();
include '../../config/koneksi.php';

if ($_SESSION['role'] != 'guru') {
    header("Location: ../../login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

$data = mysqli_query($koneksi, "
SELECT booking.*, laboratorium.nama_lab
FROM booking
JOIN laboratorium
ON booking.id_lab = laboratorium.id_lab
WHERE booking.id_user = '$id_user'
ORDER BY booking.id_booking DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Riwayat Booking</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
    padding:25px;
}

.container{
    width:100%;
    height:100%;
    background:#ffffff;
    border-radius:30px;
    padding:35px;
    display:flex;
    flex-direction:column;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

h1{
    text-align:center;
    color:#1e40af;
    font-size:36px;
    font-weight:700;
    margin-bottom:25px;
}

.table-container{
    flex:1;
    overflow-y:auto;
    overflow-x:auto;
    border-radius:18px;
    border:1px solid #e2e8f0;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#ffffff;
}

thead{
    background:#2563eb;
    color:white;
    position:sticky;
    top:0;
    z-index:10;
}

th{
    padding:16px;
    font-size:16px;
    font-weight:600;
}

td{
    padding:16px;
    text-align:center;
    border-bottom:1px solid #e2e8f0;
    font-size:15px;
}

tr:hover{
    background:#f8fafc;
}

.status-disetujui{
    background:#22c55e;
    color:white;
    padding:8px 14px;
    border-radius:10px;
    font-size:14px;
    font-weight:600;
}

.status-ditolak{
    background:#ef4444;
    color:white;
    padding:8px 14px;
    border-radius:10px;
    font-size:14px;
    font-weight:600;
}

.status-pending{
    background:#facc15;
    color:black;
    padding:8px 14px;
    border-radius:10px;
    font-size:14px;
    font-weight:600;
}

.btn-kembali{
    display:inline-block;
    width:fit-content;
    margin-top:20px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    padding:12px 22px;
    border-radius:14px;
    font-size:15px;
    font-weight:600;
    transition:0.3s;
}

.btn-kembali:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}

</style>

</head>
<body>

<div class="container">

    <h1>Riwayat Booking</h1>

    <div class="table-container">

        <table>

            <thead>
                <tr>
                    <th>No</th>
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

            while($d = mysqli_fetch_assoc($data)){
            ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $d['nama_lab']; ?></td>

                <td><?= $d['tanggal']; ?></td>

                <td><?= $d['jam']; ?></td>

                <td><?= $d['keterangan']; ?></td>

                <td>

                    <?php if($d['status'] == 'disetujui'){ ?>

                        <span class="status-disetujui">
                            Disetujui
                        </span>

                    <?php } elseif($d['status'] == 'ditolak'){ ?>

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

    <a href="../dashboard_guru.php" class="btn-kembali">
        Kembali
    </a>

</div>

</body>
</html>