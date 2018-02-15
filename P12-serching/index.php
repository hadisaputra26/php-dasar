<?php 
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
</head>
<body>

<h1>Daftar Mahasiswa</h1>
<a href="tambah.php">Tambah Mahasiswa</a>
<br><br>

<form action="" method="post">
	<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
	<button type="cari" name="cari">Cari!</button>
</form>

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
		<td><?= $row["gambar"]; ?></td>
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