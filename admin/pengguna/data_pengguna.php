<?php
include '../../config/koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM user");
$total_pengguna = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Pengguna</title>

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

h1{
    text-align:center;
    font-size:38px;
    font-weight:700;
    color:#2563eb;
    margin-bottom:20px;
}

.info-box{
    background:#eff6ff;
    color:#1e40af;
    padding:12px 18px;
    border-radius:12px;
    margin-bottom:15px;
    width:fit-content;
    font-weight:600;
}

.btn-tambah{
    width:fit-content;
    background:#2563eb;
    color:white;
    padding:12px 22px;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
    margin-bottom:20px;
    transition:0.3s;
}

.btn-tambah:hover{
    background:#1d4ed8;
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

.role-admin{
    background:#2563eb;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.role-guru{
    background:#22c55e;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.btn-edit{
    display:inline-block;
    background:#60a5fa;
    color:white;
    text-decoration:none;
    padding:8px 14px;
    border-radius:10px;
    font-size:13px;
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
    padding:8px 14px;
    border-radius:10px;
    font-size:13px;
    transition:0.3s;
}

.btn-hapus:hover{
    background:#dc2626;
}

.btn-kembali{
    width:fit-content;
    margin-top:20px;
    background:#2563eb;
    color:white;
    padding:12px 22px;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
    transition:0.3s;
}

.btn-kembali:hover{
    background:#1d4ed8;
}

</style>

</head>

<body>

<div class="container">

    <h1>👤 Data Pengguna</h1>

    <div class="info-box">
        Total Pengguna : <strong><?= $total_pengguna; ?></strong>
    </div>

    <a href="tambah_pengguna.php" class="btn-tambah">
        + Tambah Pengguna
    </a>

    <div class="table-box">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
            ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $data['nama']; ?></td>

                <td><?= $data['username']; ?></td>

                <td>

                    <?php if($data['role']=="admin"){ ?>

                        <span class="role-admin">
                            Admin
                        </span>

                    <?php } else { ?>

                        <span class="role-guru">
                            Guru
                        </span>

                    <?php } ?>

                </td>

                <td>

                    <a class="btn-edit"
                    href="edit_pengguna.php?id=<?= $data['id_user']; ?>">
                        ✏ Edit
                    </a>

                    <a class="btn-hapus"
                    href="hapus_pengguna.php?id=<?= $data['id_user']; ?>"
                    onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                        🗑 Hapus
                    </a>

                </td>

            </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

    <a href="../dashboard_admin.php" class="btn-kembali">
        Kembali
    </a>

</div>

</body>
</html>