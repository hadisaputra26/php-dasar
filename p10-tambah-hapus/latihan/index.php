<?php 
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>
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
		<td><a href="">UBAH</a> |
		<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm ('Yakin Nggak');">HAPUS</a></td>
		<td><img src=""></td>
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