<?php
include 'koneksi.php';

// cek apakah ada id di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM pelanggan WHERE id_pelanggan='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "<script>alert('Data tidak ditemukan');window.location='index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan');window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Pelanggan</title>

<style>
* {
  font-family: "Trebuchet MS", Arial, sans-serif;
}
body {
  background: #f4f6f8;
  padding: 30px 0;
}
h1 {
  text-transform: uppercase;
  color: #ff6f61;
  text-align: center;
}
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
}
textarea {
  resize: none;
  height: 80px;
}
button {
  width: 100%;
  background: #ff6f61;
  color: #fff;
  border: none;
  padding: 12px;
  border-radius: 6px;
  cursor: pointer;
}
button:hover {
  background: #e85b50;
}
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

<h1>Edit Pelanggan</h1>

<div class="form-box">
<form action="proses_edit_pelanggan.php" method="POST">
    
    <input type="hidden" name="id_pelanggan" value="<?= $data['id_pelanggan']; ?>">

    <label>Nama Pelanggan</label>
    <input type="text" name="nama_pelanggan" value="<?= $data['nama_pelanggan']; ?>" required>

    <label>Alamat</label>
    <textarea name="alamat"><?= $data['alamat']; ?></textarea>

    <label>No HP</label>
    <input type="text" name="no_hp" value="<?= $data['no_hp']; ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= $data['email']; ?>">

    <button type="submit">Simpan Perubahan</button>
</form>

<a href="index.php" class="back">← Kembali</a>
</div>

</body>
</html>
