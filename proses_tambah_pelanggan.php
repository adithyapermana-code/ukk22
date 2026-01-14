<?php
// memanggil file koneksi.php untuk koneksi database
include 'koneksi.php';

// ambil data dari form
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat         = $_POST['alamat'];
$no_hp          = $_POST['no_hp'];
$email          = $_POST['email'];

// query INSERT data pelanggan
$query = "INSERT INTO pelanggan (nama_pelanggan, alamat, no_hp, email)
          VALUES ('$nama_pelanggan', '$alamat', '$no_hp', '$email')";

$result = mysqli_query($koneksi, $query);

// cek apakah query berhasil
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
    echo "<script>
            alert('Data pelanggan berhasil ditambahkan');
            window.location='index.php';
          </script>";
}
