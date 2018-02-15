<?php 

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");
// var_dump($mhs);

if(isset($_POST["cari"])){
	$mahasiswa = cari($_POST["keyword"]);
	// var_dump(count($mahasiswa));
	// print_r(count($mahasiswa));
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Nama Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah Mahasiswa</a> 
	<br><br>
		<form action="" method="post">
			<input type="text" name="keyword" autofocus="" placeholder="Masukan Keyword" autocomplete="off" width="50">
			<button type="submit" name="cari" >Cari!!</button> 
		</form>
	<br>
	<?php if(isset($_POST["cari"])) :?>
		<h1> Hasil Yang Di Temukan Adalah : <?php print_r(count($mahasiswa)); ?></h1>
	<?php endif; ?>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach($mahasiswa as $mhs): ?>
		<tr>
			<td><?= $i; ?></td>
			<td><a href="ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a> | <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick =  "return confirm('Anda yakin')">Hapus</a></td>
			<td><img src="img/<?= $mhs["gambar"]; ?>" alt=""></td>
			<td><?= $mhs["nrp"]; ?></td>
			<td><?= $mhs["nama"]; ?></td>
			<td><?= $mhs["email"]; ?></td>
			<td><?= $mhs["jurusan"]; ?></td>
		</tr>
		<?php $i++ ?>
	<?php endforeach; ?>

	</table>
	
</body>
</html>