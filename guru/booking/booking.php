<?php
session_start();
include '../../config/koneksi.php';

if ($_SESSION['role'] != 'guru') {
    header("Location: ../../login.php");
    exit;
}

$lab = mysqli_query($koneksi, "SELECT * FROM laboratorium");

if(isset($_POST['booking'])){

    $id_user = $_SESSION['id_user'];
    $id_lab = $_POST['id_lab'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $keterangan = $_POST['keterangan'];

    mysqli_query($koneksi, "INSERT INTO booking
    VALUES(
        '',
        '$id_user',
        '$id_lab',
        '$tanggal',
        '$jam',
        '$keterangan',
        'pending'
    )");

    echo "
    <script>
        alert('Booking berhasil!');
        window.location='riwayat_booking.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Laboratorium</title>

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
    min-height:100vh;
    padding:25px;
}

.container{
    width:100%;
    max-width:950px;
    margin:auto;
    background:#ffffff;
    border-radius:30px;
    padding:35px;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

h1{
    text-align:center;
    font-size:38px;
    color:#1e40af;
    font-weight:700;
    margin-bottom:30px;
}

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:22px;
}

.full{
    grid-column:1 / 3;
}

label{
    display:block;
    margin-bottom:8px;
    font-size:15px;
    font-weight:600;
    color:#334155;
}

input,
select,
textarea{
    width:100%;
    padding:14px;
    border:1px solid #cbd5e1;
    border-radius:14px;
    font-size:15px;
    outline:none;
    transition:0.3s;
}

input:focus,
select:focus,
textarea:focus{
    border-color:#2563eb;
    box-shadow:0 0 0 3px rgba(37,99,235,0.15);
}

textarea{
    height:120px;
    resize:none;
}

.btn-booking{
    width:100%;
    background:#2563eb;
    color:white;
    border:none;
    padding:15px;
    border-radius:14px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.btn-booking:hover{
    background:#1d4ed8;
}

.btn-kembali{
    display:inline-block;
    margin-top:20px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    padding:12px 24px;
    border-radius:14px;
    font-size:15px;
    font-weight:600;
    transition:0.3s;
}

.btn-kembali:hover{
    background:#1d4ed8;
}

@media(max-width:768px){

    .form-grid{
        grid-template-columns:1fr;
    }

    .full{
        grid-column:auto;
    }

}

</style>

</head>
<body>

<div class="container">

    <h1>Booking Laboratorium</h1>

    <form method="POST">

        <div class="form-grid">

            <div>
                <label>Pilih Laboratorium</label>

                <select name="id_lab" required>
                    <option value="">-- Pilih Laboratorium --</option>

                    <?php while($d = mysqli_fetch_array($lab)){ ?>

                    <option value="<?= $d['id_lab']; ?>">
                        <?= $d['nama_lab']; ?>
                    </option>

                    <?php } ?>

                </select>
            </div>

            <div>
                <label>Tanggal</label>
                <input type="date" name="tanggal" required>
            </div>

            <div>
                <label>Jam</label>
                <input type="time" name="jam" required>
            </div>

            <div>
                <label>Keterangan</label>
                <textarea name="keterangan" required></textarea>
            </div>

            <div class="full">
                <button type="submit" name="booking" class="btn-booking">
                    Booking Laboratorium
                </button>
            </div>

        </div>

    </form>

    <a href="../dashboard_guru.php" class="btn-kembali">
        Kembali
    </a>

</div>

</body>
</html>