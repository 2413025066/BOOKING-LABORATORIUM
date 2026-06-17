<?php
session_start();
include 'config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi,
    "SELECT * FROM user
     WHERE username='$username'
     AND password='$password'"
);

$data = mysqli_fetch_array($query);

if(mysqli_num_rows($query) > 0){

    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    if($data['role'] == 'admin'){
        header("Location: admin/dashboard_admin.php");
    } else if($data['role'] == 'guru'){
        header("Location: guru/dashboard_guru.php");
    }

} else {

    echo "
    <script>
        alert('Username atau Password salah!');
        window.location='login.php';
    </script>
    ";

}
?>