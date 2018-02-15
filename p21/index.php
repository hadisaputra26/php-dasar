<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// Menampilkan data berdasarkan Urutan
// $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");
// $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

// $mahasiswa = query("SELECT * FROM mahasiswa WHERE nrp = '16239811'");

// Tombol cari di tekan
if(isset($_POST["cari"])){
	$mahasiswa = cari($_POST["keyword"]);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
	<style>
		
		@media print{
			.logout, .tambah, .formCari, .tombolCari, .aksi {
				display: none;
			}
		}

	</style>
</head>
<body>
<a href="logout.php" class="logout">Logout</a> | <a href="cetak.php">CETAK</a>
<h1>Daftar Mahasiswa</h1>
<a href="tambah.php" class="tambah">Tambah Mahasiswa</a>
<br><br>

<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian" autocomplete="off" id="keyword" class="formCari">
	<button type="submit" name="cari" id="tombolCari" class="tombolCari">Cari!</button>
</form>

<br><br>
<div id="container">
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th class="aksi">Aksi</th>
		<th>Gambar</th>
		<th>NRP</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>

<!-- variable i untuk menggantikan id -->
<?php $i = 1; ?>
<?php foreach($mahasiswa as $row) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td class="aksi"><a href="ubah.php?id=<?= $row["id"]; ?>">UBAH</a> |
		<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Kamu Yakin');">HAPUS</a></td>
		<td><img src="img/<?= $row["gambar"]; ?>" alt=""></td>
		<td><?= $row["nrp"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
</table>
</div>

<script src="js/script.js"></script>
</body>
</html>