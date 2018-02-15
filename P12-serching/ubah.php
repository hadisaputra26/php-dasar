<?php
require 'functions.php';

// Ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0]; 

if( isset($_POST["submit"])){

	// cek apakah data berhasil diubah atau tidak
	if(ubah($_POST) > 0){
		echo "
		<script>
			alert('data berhasil diubah');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data Gagal diubah');
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
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<ul>
			<li>
				<label for="nrp">NRP :</label>
				<input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
			</li>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>"">
			</li>
			<li>
				<label for="jurusan">Jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">gambar :</label>
				<input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"]; ?>">
			</li>
			<li>
				<button type="sumbit" name="submit">Ubah Data</button>
			</li>
		</ul>
	</form>
</body>
</html>