<?php 
require 'functions.php';

if(isset($_POST["submit"])){
	if(tambah($_POST) > 0){
		echo "
		<script>
		alert('Data Berhasil Di Tambahkan');
		document.location = 'index.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('Data Gagal Di Tambahkan');
		document.location = 'index.php';
		</script>
		";
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Mahasiswa</title>
</head>
<body>
	<h1>Tambah mahasiswa</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="nrp">NRP : </label>
				<input type="text" id="nrp" name="nrp">
			</li>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" id="nama" name="nama">
			</li>
			<li>
				<label for="email">Email : </label>
				<input type="text" id="email" name="email">
			</li>
			<li>
				<label for="jurusan">Jurusan : </label>
				<input type="text" id="jurusan" name="jurusan">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Mahasiswa</button>
			</li>
		</ul>
	</form>
	<h3><a href="index.php">kembali</a></h3>
</body>
</html>