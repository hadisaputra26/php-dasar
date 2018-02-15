<?php 
session_start();

if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}

require 'functions.php';

// pagination
// konfigurasinya 
$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

$halamanAktif = (isset ($_GET["halaman"])) ? $_GET["halaman"] : 1;
$dataAwal = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $dataAwal, $jumlahDataPerHalaman");

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
</head>
<body>
<a href="logout.php">Logout</a>
<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">Tambah Mahasiswa</a>
<br><br>

<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
	<button type="submit" name="cari">Cari!</button>
</form>
<br><br>

<!-- pagination -->
	<!-- prev -->
<?php if($halamanAktif > 1): ?>
	<a href="?halaman=<?= $halamanAktif - 1; ?>">prev</a>
<?php endif; ?>
	<!-- end prev -->
	<!-- number -->
<?php for( $i = 1; $i <= $jumlahHalaman; $i++): ?>
	<?php if($halamanAktif == $i) : ?>
		<a href="?halaman=<?= $i; ?>" style="color: red; font-weight: bold;"> <?= $i; ?> </a>
	<?php else : ?>
		<a href="?halaman=<?= $i; ?>"> <?= $i; ?> </a>
	<?php endif; ?>
<?php endfor; ?>
	<!-- end number -->
<?php if($halamanAktif < $jumlahHalaman): ?>
	<a href="?halaman=<?= $halamanAktif + 1; ?>">Next</a>
<?php endif; ?>
<!-- end pagination -->

<br><br>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
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
		<td><a href="ubah.php?id=<?= $row["id"]; ?>">UBAH</a> |
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


</body>
</html>