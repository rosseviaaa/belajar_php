<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "maysekolah";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal : " . mysqli_conect_error());
}
?> 