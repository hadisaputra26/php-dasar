<?php
require 'functions.php';

if( isset($_POST["submit"])){

// Untuk test bug
	// var_dump($_POST);
	// var_dump($_FILES);
	// die;


	
	// cek apakah data berhasil ditambahkan atau tidak
	if(tambah($_POST) > 0){
		echo "
		<script>
			alert('Data berhasil ditambahkan');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('Data Gagal ditambahkan');
		</script>
		";
	}


}


  ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h1>Tambah data Mahasiswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nrp">NRP :</label>
				<input type="text" name="nrp" id="nrp" required="">
			</li>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email">
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan">
			</li>
			<li>
				<label for="gambar">gambar :</label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="sumbit" name="submit">Tambah Data</button>
			</li>
		</ul>
	</form>
</body>
</html>