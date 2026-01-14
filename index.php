<?php
include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Aplikasi Penjualan</title>

<style>
* {
  font-family: "Trebuchet MS", Arial, sans-serif;
  box-sizing: border-box;
}

body {
  margin: 0;
  background: #FFF8DC;
}

/* ===== LAYOUT ===== */
.wrapper {
  display: flex;
  min-height: 100vh;
}

/* ===== SIDEBAR ===== */
.sidebar {
  width: 230px;
  background: linear-gradient(180deg, #FFD600, #FFB300);
  padding-top: 20px;
  box-shadow: 4px 0 15px rgba(0,0,0,0.2);
}

.sidebar h2 {
  text-align: center;
  color: #333;
  margin-bottom: 30px;
  font-size: 20px;
}

/* ===== MENU ===== */
.sidebar button {
  width: 100%;
  background: transparent;
  border: none;
  padding: 16px 20px;
  text-align: left;
  font-size: 14px;
  cursor: pointer;
  color: #333;
  transition: 0.3s;
}

.sidebar button:hover {
  background: rgba(255,255,255,0.5);
}

/* MENU AKTIF */
.sidebar button.active {
  background: #fff;
  font-weight: bold;
  border-left: 6px solid #ff6f61;
}

/* ===== CONTENT ===== */
.content {
  flex: 1;
  padding: 30px;
}

/* ===== JUDUL ===== */
h1 {
  text-transform: uppercase;
  color: #ff6f61;
  text-align: center;
  margin-bottom: 10px;
}

/* ===== HOME ===== */
.home-box {
  background: #fff;
  padding: 40px;
  border-radius: 15px;
  text-align: center;
  box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.home-box h2 {
  color: #ff6f61;
  margin-bottom: 15px;
}

.home-box p {
  color: #555;
  font-size: 15px;
}

/* ===== TOMBOL TAMBAH ===== */
.tambah {
  display: inline-block;
  background: #ff6f61;
  color: #fff;
  padding: 10px 18px;
  font-size: 12px;
  border-radius: 6px;
  text-decoration: none;
  margin-bottom: 15px;
}

/* ===== TABEL ===== */
table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 12px 25px rgba(0,0,0,0.1);
}

thead {
  background: linear-gradient(45deg, #ff6f61, #ff9a8b);
}

thead th {
  color: #fff;
  padding: 14px;
  text-align: left;
}

tbody td {
  padding: 12px;
  border-bottom: 1px solid #eee;
  font-size: 13px;
}

tbody tr:hover {
  background: #FFF3CD;
}

/* ===== GAMBAR ===== */
tbody img {
  width: 85px;
  border-radius: 8px;
}

/* ===== AKSI ===== */
.aksi a {
  background: #ff6f61;
  color: #fff;
  padding: 6px 10px;
  border-radius: 4px;
  font-size: 12px;
  text-decoration: none;
  margin-right: 4px;
}

.aksi a.hapus {
  background: #d9534f;
}
</style>

<script>
function showMenu(menuId, el) {
  const sections = document.querySelectorAll('.section');
  sections.forEach(sec => sec.style.display = 'none');

  document.getElementById(menuId).style.display = 'block';

  const buttons = document.querySelectorAll('.sidebar button');
  buttons.forEach(btn => btn.classList.remove('active'));

  el.classList.add('active');
}
</script>

</head>
<body>

<div class="wrapper">

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">
  <h2>🍽 APLIKASI</h2>
  <button class="active" onclick="showMenu('home', this)">🏠 Home</button>
  <button onclick="showMenu('produk', this)">📦 Data Produk</button>
  <button onclick="showMenu('pelanggan', this)">👥 Data Pelanggan</button>
</div>

<!-- ===== CONTENT ===== -->
<div class="content">

<!-- ===== HOME ===== -->
<div id="home" class="section">
  <div class="home-box">
    <h2>Selamat Datang 👋</h2>
    <p>
      Ini adalah <b>Aplikasi Penjualan</b> berbasis <b>PHP & MySQL</b><br>
      Gunakan menu di sebelah kiri untuk mengelola:
    </p>
    <p>
      📦 Produk <br>
      👥 Pelanggan <br>
      🧾 Transaksi
    </p>
    <p><b>Theme Kuning – Modern – UKK Ready</b></p>
  </div>
</div>

<!-- ===== PRODUK ===== -->
<div id="produk" class="section" style="display:none;">
  <h1>Data Produk</h1>
  <center>
    <a href="tambah_produk.php" class="tambah">+ Tambah Produk</a>
  </center>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Produk</th>
        <th>Deskripsi</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $q = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id ASC");
    while ($p = mysqli_fetch_assoc($q)) {
    ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $p['nama_produk']; ?></td>
        <td><?= substr($p['deskripsi'],0,30); ?>...</td>
        <td>Rp <?= number_format($p['harga_beli'],0,',','.'); ?></td>
        <td>Rp <?= number_format($p['harga_jual'],0,',','.'); ?></td>
        <td><img src="gambar/<?= $p['gambar_produk']; ?>"></td>
        <td class="aksi">
          <a href="edit_produk.php?id=<?= $p['id']; ?>">Edit</a>
          <a href="proses_hapus.php?id=<?= $p['id']; ?>" class="hapus"
             onclick="return confirm('Yakin hapus data?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

<!-- ===== PELANGGAN ===== -->
<div id="pelanggan" class="section" style="display:none;">
  <h1>Data Pelanggan</h1>
  <center>
    <a href="tambah_pelanggan.php" class="tambah">+ Tambah Pelanggan</a>
  </center>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>Email</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $q = mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY id_pelanggan ASC");
    while ($pl = mysqli_fetch_assoc($q)) {
    ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $pl['nama_pelanggan']; ?></td>
        <td><?= substr($pl['alamat'],0,30); ?>...</td>
        <td><?= $pl['no_hp']; ?></td>
        <td><?= $pl['email']; ?></td>
        <td class="aksi">
          <a href="edit_pelanggan.php?id=<?= $pl['id_pelanggan']; ?>">Edit</a>
          <a href="hapus_pelanggan.php?id=<?= $pl['id_pelanggan']; ?>" class="hapus"
             onclick="return confirm('Yakin hapus data?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

</div>
</div>

</body>
</html>
