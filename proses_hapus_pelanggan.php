<?php
// koneksi database
include 'koneksi.php';

// ambil id pelanggan dari URL
$id = $_GET['id'];

// query DELETE
$query = "DELETE FROM pelanggan WHERE id_pelanggan='$id'";
$result = mysqli_query($koneksi, $query);

// cek hasil query
if (!$result) {
    die("Gagal menghapus data: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
} else {
    echo "<script>
            alert('Data pelanggan berhasil dihapus');
            window.location='index.php';
          </script>";
}
