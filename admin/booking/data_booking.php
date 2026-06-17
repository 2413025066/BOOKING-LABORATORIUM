<?php
session_start();
include '../../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../../login.php");
    exit;
}

$query = mysqli_query($koneksi, "
SELECT
booking.*,
user.username,
laboratorium.nama_lab
FROM booking
LEFT JOIN user
ON booking.id_user = user.id_user
LEFT JOIN laboratorium
ON booking.id_lab = laboratorium.id_lab
");

$total_booking = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Booking</title>

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
    min-height:100vh;
    padding:25px;
}

.container{
    width:100%;
    height:calc(100vh - 50px);
    background:white;
    border-radius:25px;
    padding:30px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
}

h2{
    text-align:center;
    color:#2563eb;
    font-size:36px;
    margin-bottom:20px;
    font-weight:700;
}

.info-box{
    background:#eff6ff;
    color:#1e40af;
    padding:12px 18px;
    border-radius:12px;
    margin-bottom:20px;
    width:fit-content;
    font-weight:600;
}

.table-box{
    flex:1;
    overflow:auto;
    border-radius:15px;
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

tbody tr{
    transition:0.3s;
}

tbody tr:hover{
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

.btn{
    text-decoration:none;
    color:white;
    padding:9px 14px;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    display:inline-block;
    transition:0.3s;
}

.setuju{
    background:#22c55e;
}

.setuju:hover{
    background:#16a34a;
}

.tolak{
    background:#ef4444;
}

.tolak:hover{
    background:#dc2626;
}

.kembali{
    margin-top:20px;
    width:fit-content;
    text-decoration:none;
    background:#2563eb;
    color:white;
    padding:12px 22px;
    border-radius:12px;
    font-weight:600;
    transition:0.3s;
}

.kembali:hover{
    background:#1d4ed8;
}

</style>
</head>

<body>

<div class="container">

    <h2>📅 Data Booking Laboratorium</h2>

    <div class="info-box">
        Total Booking : <strong><?= $total_booking; ?></strong>
    </div>

    <div class="table-box">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Laboratorium</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $no = 1;

            if(mysqli_num_rows($query) == 0){
                echo "
                <tr>
                    <td colspan='8'>
                        Data booking belum ada
                    </td>
                </tr>";
            }

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

                <td>

                    <a class="btn setuju"
                    href="validasi_booking.php?id=<?= $data['id_booking']; ?>&status=disetujui">
                        ✓ Setujui
                    </a>

                    <a class="btn tolak"
                    href="validasi_booking.php?id=<?= $data['id_booking']; ?>&status=ditolak">
                        ✕ Tolak
                    </a>

                </td>

            </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

    <a href="../dashboard_admin.php" class="kembali">
        Kembali
    </a>

</div>

</body>
</html>