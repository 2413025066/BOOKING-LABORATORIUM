<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../../login.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi, "
    SELECT * FROM laboratorium
    WHERE id_lab='$id'
");

$data = mysqli_fetch_assoc($query);

if(isset($_POST['update'])){

    $nama_lab = $_POST['nama_lab'];
    $kapasitas = $_POST['kapasitas'];

    mysqli_query($koneksi, "
        UPDATE laboratorium SET
        nama_lab='$nama_lab',
        kapasitas='$kapasitas'
        WHERE id_lab='$id'
    ");

    header("Location: data_lab.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Laboratorium</title>

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
    max-width:650px;
    background:#ffffff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

h2{
    text-align:center;
    color:#2563eb;
    font-size:32px;
    margin-bottom:30px;
    font-weight:700;
}

.form-group{
    margin-bottom:20px;
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
    padding:14px;
    border:1px solid #cbd5e1;
    border-radius:12px;
    font-size:15px;
    outline:none;
    transition:0.3s;
}

input:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,0.15);
}

.button-group{
    display:flex;
    gap:12px;
    margin-top:25px;
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
}

.btn-kembali{
    background:#64748b;
    color:white;
    text-decoration:none;
    padding:12px 24px;
    border-radius:12px;
    font-size:15px;
    font-weight:600;
    transition:0.3s;
}

.btn-kembali:hover{
    background:#475569;
}

</style>

</head>

<body>

<div class="container">

    <h2>Edit Laboratorium</h2>

    <form method="POST">

        <div class="form-group">
            <label>Nama Laboratorium</label>
            <input
                type="text"
                name="nama_lab"
                value="<?= $data['nama_lab']; ?>"
                required>
        </div>

        <div class="form-group">
            <label>Kapasitas</label>
            <input
                type="number"
                name="kapasitas"
                value="<?= $data['kapasitas']; ?>"
                required>
        </div>

        <div class="button-group">

            <button type="submit" name="update" class="btn">
                Update Data
            </button>

            <a href="data_lab.php" class="btn-kembali">
                Kembali
            </a>

        </div>

    </form>

</div>

</body>
</html>