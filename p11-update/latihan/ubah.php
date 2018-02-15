<?php
require 'functions.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if( isset($_POST["submit"])){

	// cek apakah data berhasil ditambahkan atau tidak
	if(ubah($_POST) > 0){
		echo "
		<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data Gagal ditambahkan');
			document.location.href = 'index.php';
		</script>
		";
	}


}


  ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Data Mahasiswa</title>
</head>
<body>
	<h1>Ubah data Mahasiswa</h1>
	<form action="" method="post">
		<input type="hidden" value="<?= $mhs["id"]; ?>">
		<ul>
			<li>
				<label for="nrp">NRP :</label>
				<input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"];?>">
			</li>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"];?>">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required value="<?= $mhs["email"];?>">
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"];?>">
			</li>
			<li>
				<label for="gambar">gambar :</label>
				<input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"];?>">
			</li>
			<li>
				<button type="sumbit" name="submit">Tambah Data</button>
			</li>
		</ul>
	</form>
</body>
</html>