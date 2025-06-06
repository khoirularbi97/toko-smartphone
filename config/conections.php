<?php
$con= mysqli_connect("localhost", "tokoadmin","passwordku","toko_smartphone");

if(!($con)){
    die("Koneksi gagal: " . mysqli_connect_error());
}

// waktu asia
date_default_timezone_set('Asia/Jakarta');
?>