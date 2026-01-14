<?php
// tampilkan error agar tidak blank putih
error_reporting(E_ALL);
ini_set('display_errors', 1);

// memanggil file koneksi.php untuk melakukan koneksi database 
include 'koneksi.php'; 
 
// membuat variabel untuk menampung data dari form 
$id = $_POST['id']; 
$nama_produk   = $_POST['nama_produk']; 
$deskripsi     = $_POST['deskripsi']; 
$harga_beli    = $_POST['harga_beli']; 
$harga_jual    = $_POST['harga_jual']; 
$gambar_produk = $_FILES['gambar_produk']['name']; 

// cek dulu jika merubah gambar produk jalankan coding ini 
if($gambar_produk != "") { 

    $ekstensi_diperbolehkan = array('png','jpg'); 
    $x = explode('.', $gambar_produk); 
    $ekstensi = strtolower(end($x)); 
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];    
    $angka_acak = rand(1,999); 
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; 

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  { 

        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); 

        // QUERY UPDATE (DITAMBAHKAN SPASI SEBELUM WHERE)
        $query  = "UPDATE produk SET nama_produk = '$nama_produk', 
                   deskripsi = '$deskripsi', 
                   harga_beli = '$harga_beli', 
                   harga_jual = '$harga_jual', 
                   gambar_produk = '$nama_gambar_baru' ";
        $query .= "WHERE id = '$id'"; 

        $result = mysqli_query($koneksi, $query); 

        if(!$result){ 
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi)); 
        } else { 
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>"; 
        } 

    } else {      
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='edit_produk.php';</script>"; 
    } 

} else { 

    // QUERY UPDATE TANPA GAMBAR (DITAMBAHKAN SPASI SEBELUM WHERE)
    $query  = "UPDATE produk SET nama_produk = '$nama_produk', 
               deskripsi = '$deskripsi', 
               harga_beli = '$harga_beli', 
               harga_jual = '$harga_jual' ";
    $query .= "WHERE id = '$id'"; 

    $result = mysqli_query($koneksi, $query); 

    if(!$result){ 
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi)); 
    } else { 
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>"; 
    } 
}
