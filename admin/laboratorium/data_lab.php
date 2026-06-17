<?php
session_start();
include '../../config/koneksi.php';

if($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'guru'){
    header("Location: ../../login.php");
    exit;
}

$data = mysqli_query($koneksi, "SELECT * FROM laboratorium");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Laboratorium</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
    display:flex;
    flex-direction:column;
}

h1{
    text-align:center;
    color:#1e40af;
    font-size:36px;
    font-weight:700;
    margin-bottom:25px;
}

.btn-tambah{
    display:inline-block;
    width:fit-content;
    background:#2563eb;
    color:white;
    text-decoration:none;
    padding:14px 24px;
    border-radius:14px;
    font-size:15px;
    font-weight:600;
    margin-bottom:20px;
    transition:0.3s;
}

.btn-tambah:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
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
    background:white;
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

.btn-edit{
    display:inline-block;
    background:#60a5fa;
    color:white;
    text-decoration:none;
    padding:9px 15px;
    border-radius:10px;
    margin-right:5px;
    transition:0.3s;
}

.btn-edit:hover{
    background:#3b82f6;
}

.btn-hapus{
    display:inline-block;
    background:#ef4444;
    color:white;
    text-decoration:none;
    padding:9px 15px;
    border-radius:10px;
    transition:0.3s;
}

.btn-hapus:hover{
    background:#dc2626;
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

    <h1>Data Laboratorium</h1>

    <?php if($_SESSION['role']=="admin"){ ?>

    <a href="tambah_lab.php" class="btn-tambah">
        + Tambah Laboratorium
    </a>

    <?php } ?>

    <div class="table-container">

        <table>

            <thead>
                <tr>

                    <th>No</th>
                    <th>Nama Laboratorium</th>
                    <th>Kapasitas</th>

                    <?php if($_SESSION['role']=="admin"){ ?>
                    <th>Aksi</th>
                    <?php } ?>

                </tr>
            </thead>

            <tbody>

            <?php
            $no = 1;

            while($d = mysqli_fetch_array($data)){
            ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $d['nama_lab']; ?></td>

                <td><?= $d['kapasitas']; ?></td>

                <?php if($_SESSION['role']=="admin"){ ?>

                <td>

                    <a href="edit_lab.php?id=<?= $d['id_lab']; ?>" class="btn-edit">
                        Edit
                    </a>

                    <a href="hapus_lab.php?id=<?= $d['id_lab']; ?>"
                       class="btn-hapus"
                       onclick="return confirm('Yakin ingin menghapus data?')">
                        Hapus
                    </a>

                </td>

                <?php } ?>

            </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

    <a href="<?=
    $_SESSION['role']=="admin"
    ? "../dashboard_admin.php"
    : "../../guru/dashboard_guru.php"
    ?>" class="btn-kembali">

        Kembali

    </a>

</div>

</body>
</html>