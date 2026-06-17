<?php

$koneksi = mysqli_connect(
    "sql103.infinityfree.com",
    "ifo_42120393",
    "DindaLab2026",
    "ifo_42120393_bookinglab"
);

$conn = $koneksi;

if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>