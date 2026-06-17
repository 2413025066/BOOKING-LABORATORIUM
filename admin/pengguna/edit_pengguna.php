<?php
session_start();
include '../../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../../login.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi,
"SELECT * FROM user WHERE id_user='$id'");

$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];

    mysqli_query($koneksi, "
    UPDATE user SET
    username='$username',
    password='$password',
    role='$role'
    WHERE id_user='$id'
    ");

    header("Location: data_pengguna.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Pengguna</title>

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
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    width:420px;
    background:white;
    padding:30px;
    border-radius:25px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

h1{
    text-align:center;
    color:#2563eb;
    font-size:32px;
    margin-bottom:25px;
    font-weight:700;
}

label{
    display:block;
    margin-top:15px;
    margin-bottom:8px;
    font-size:15px;
    font-weight:600;
    color:#334155;
}

input,
select{
    width:100%;
    padding:12px 14px;
    border:2px solid #dbeafe;
    border-radius:12px;
    font-size:14px;
    outline:none;
    transition:0.3s;
}

input:focus,
select:focus{
    border-color:#60a5fa;
}

.btn-update{
    width:100%;
    margin-top:25px;
    padding:13px;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:12px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

.btn-update:hover{
    background:#1d4ed8;
}

.btn-kembali{
    display:inline-block;
    margin-top:15px;
    background:#60a5fa;
    color:white;
    padding:10px 18px;
    border-radius:12px;
    text-decoration:none;
    font-size:14px;
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

    <h1>Edit Pengguna</h1>

    <form method="POST">

        <label>Username</label>

        <input
            type="text"
            name="username"
            value="<?= $data['username']; ?>"
            required>

        <label>Password</label>

        <input
            type="text"
            name="password"
            value="<?= $data['password']; ?>"
            required>

        <label>Role</label>

        <select name="role" required>

            <option value="admin"
            <?= $data['role'] == 'admin' ? 'selected' : ''; ?>>
                Admin
            </option>

            <option value="guru"
            <?= $data['role'] == 'guru' ? 'selected' : ''; ?>>
                Guru
            </option>

        </select>

        <button type="submit" name="update" class="btn-update">
            Update
        </button>

    </form>

    <a href="data_pengguna.php" class="btn-kembali">
        Kembali
    </a>

</div>

</body>
</html>