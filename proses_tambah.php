<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// menampung data dari form
$nama_produk   = $_POST['nama_produk'];
$deskripsi     = $_POST['deskripsi'];
$harga_beli    = $_POST['harga_beli'];
$harga_jual    = $_POST['harga_jual'];
$gambar_produk = $_FILES['gambar_produk']['name'];

// cek jika ada gambar diupload
if ($gambar_produk != "") {

    // ekstensi file yang diperbolehkan
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');

    $x = explode('.', $gambar_produk);
    $ekstensi = strtolower(end($x));

    $file_tmp = $_FILES['gambar_produk']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar_produk;

    // validasi ekstensi
    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {

        // upload file ke folder gambar
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);

        // query insert
        $query = "INSERT INTO produk 
        (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) 
        VALUES 
        ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', '$nama_gambar_baru')";

        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil ditambahkan');window.location='index.php';</script>";
        }

    } else {
        echo "<script>alert('Ekstensi gambar hanya boleh JPG, JPEG, atau PNG');window.location='tambah_produk.php';</script>";
    }

} else {

    // jika tidak ada gambar
    $query = "INSERT INTO produk 
    (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) 
    VALUES 
    ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', NULL)";

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil ditambahkan');window.location='index.php';</script>";
    }
}
?>
