<?php
include 'koneksi.php';

// ambil data dari form
$id_pelanggan  = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat         = $_POST['alamat'];
$no_hp          = $_POST['no_hp'];
$email          = $_POST['email'];

// query UPDATE
$query = "UPDATE pelanggan SET
            nama_pelanggan = '$nama_pelanggan',
            alamat = '$alamat',
            no_hp = '$no_hp',
            email = '$email'
          WHERE id_pelanggan = '$id_pelanggan'";

$result = mysqli_query($koneksi, $query);

// cek hasil query
if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
    echo "<script>
            alert('Data pelanggan berhasil diubah');
            window.location='index.php';
          </script>";
}
