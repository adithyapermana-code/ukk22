<?php
include('koneksi.php'); // koneksi database
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pelanggan</title>

<style>
* {
  font-family: "Trebuchet MS", Arial, sans-serif;
}

body {
  background: #f4f6f8;
  margin: 0;
  padding: 30px 0;
}

/* Judul */
h1 {
  text-transform: uppercase;
  color: #ff6f61;
  text-align: center;
  margin-bottom: 20px;
}

/* Form */
.form-box {
  width: 420px;
  background: #fff;
  margin: auto;
  padding: 25px;
  border-radius: 10px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

label {
  font-size: 13px;
  color: #555;
}

input, textarea {
  width: 100%;
  padding: 10px;
  margin-top: 6px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 6px;
  background: #f9f9f9;
  box-sizing: border-box;
}

textarea {
  resize: none;
  height: 80px;
}

/* Tombol */
button {
  width: 100%;
  background: #ff6f61;
  color: #fff;
  border: none;
  padding: 12px;
  font-size: 14px;
  border-radius: 6px;
  cursor: pointer;
  transition: 0.3s;
}

button:hover {
  background: #e85b50;
}

/* Link kembali */
.back {
  display: block;
  text-align: center;
  margin-top: 15px;
  font-size: 13px;
  text-decoration: none;
  color: #555;
}
</style>
</head>

<body>

<h1>Tambah Pelanggan</h1>

<div class="form-box">
  <form action="proses_tambah_pelanggan.php" method="POST">
    
    <label>Nama Pelanggan</label>
    <input type="text" name="nama_pelanggan" required>

    <label>Alamat</label>
    <textarea name="alamat"></textarea>

    <label>No HP</label>
    <input type="text" name="no_hp" required>

    <label>Email</label>
    <input type="email" name="email">

    <button type="submit">Simpan</button>
  </form>

  <a href="index.php" class="back">← Kembali ke Data</a>
</div>

</body>
</html>
