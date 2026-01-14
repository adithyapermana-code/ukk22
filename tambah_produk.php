<?php
include('koneksi.php');
// agar index terhubung dengan database
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Produk</title>

<style>
* {
  font-family: "Trebuchet MS";
}

h1 {
  text-transform: uppercase;
  color: salmon;
  text-align: center;
}

button {
  background-color: salmon;
  color: #fff;
  padding: 10px;
  font-size: 12px;
  border: 0;
  margin-top: 20px;
  cursor: pointer;
}

label {
  margin-top: 10px;
  display: block;
}

input {
  padding: 6px;
  width: 100%;
  box-sizing: border-box;
  background: #f8f8f8;
  border: 2px solid #ccc;
  outline-color: salmon;
}

.base {
  width: 400px;
  padding: 20px;
  margin: auto;
  background: #ededed;
}
</style>
</head>

<body>

<h1>Tambah Produk</h1>

<form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
  <section class="base">

    <label>Nama Produk</label>
    <input type="text" name="nama_produk" required autofocus>

    <label>Deskripsi</label>
    <input type="text" name="deskripsi">

    <label>Harga Beli</label>
    <input type="number" name="harga_beli" required>

    <label>Harga Jual</label>
    <input type="number" name="harga_jual" required>

    <label>Gambar Produk</label>
    <input type="file" name="gambar_produk" required>

    <button type="submit">Simpan Produk</button>

  </section>
</form>

</body>
</html>
