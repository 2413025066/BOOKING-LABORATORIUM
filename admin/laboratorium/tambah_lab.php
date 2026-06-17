<?php
include '../../config/koneksi.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama_lab'];
    $lokasi = $_POST['lokasi'];
    $kapasitas = $_POST['kapasitas'];

    mysqli_query($koneksi,"INSERT INTO laboratorium VALUES(
        NULL,
        '$nama',
        '$lokasi',
        '$kapasitas'
    )");

    header("Location: data_lab.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Laboratorium</title>

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
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.container{
    width:100%;
    max-width:700px;
    background:#ffffff;
    border-radius:25px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

h1{
    text-align:center;
    color:#1e40af;
    font-size:36px;
    font-weight:700;
    margin-bottom:25px;
}

.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    margin-bottom:8px;
    font-size:15px;
    font-weight:600;
    color:#334155;
}

input{
    width:100%;
    padding:14px 16px;
    border:1.5px solid #cbd5e1;
    border-radius:12px;
    font-size:15px;
    outline:none;
    transition:0.3s;
}

input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 4px rgba(37,99,235,0.15);
}

.button-group{
    display:flex;
    gap:12px;
    margin-top:10px;
}

.btn{
    background:#2563eb;
    color:white;
    border:none;
    padding:12px 24px;
    border-radius:12px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}

.btn-kembali{
    text-decoration:none;
    background:#64748b;
    color:white;
    padding:12px 24px;
    border-radius:12px;
    font-size:15px;
    font-weight:600;
    transition:0.3s;
}

.btn-kembali:hover{
    background:#475569;
    transform:translateY(-2px);
}

</style>
</head>

<body>

<div class="container">

    <h1>Tambah Laboratorium</h1>

    <form method="POST">

        <div class="form-group">
            <label>Nama Laboratorium</label>
            <input type="text" name="nama_lab" required>
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" required>
        </div>

        <div class="form-group">
            <label>Kapasitas</label>
            <input type="number" name="kapasitas" required>
        </div>

        <div class="button-group">

            <button type="submit" name="simpan" class="btn">
                Simpan
            </button>

            <a href="data_lab.php" class="btn-kembali">
                Kembali
            </a>

        </div>

    </form>

</div>

</body>
</html>