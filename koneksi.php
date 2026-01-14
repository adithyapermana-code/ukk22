<?php
$host = "localhost";
$user = "root";
$pass = "";
$nama_db = "ukk"; // nama database

// membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $nama_db);

// cek koneksi
if (!$koneksi) {
    die("Koneksi dengan database gagal: " . mysqli_connect_error());
}
?>
