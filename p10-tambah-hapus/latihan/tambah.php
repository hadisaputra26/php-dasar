<?php 
require 'functions.php';

if(isset($_POST["submit"])){

	if(tambah($_POST) > 0){
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
 	<title>Tambah Mahasiswa</title>
 </head>
 <body>
 	<h1>Tambah Mahasiswa</h1>
 	<form action="" method="post">
 		<ul>
 			<li>
		 		<label for="nrp">NRP: </label>
		 		<input type="text" id="nrp" name="nrp">
 			</li>
 			<li>
		 		<label for="nama">Nama: </label>
		 		<input type="text" id="nama" name="nama">
 			</li>
 			<li>
		 		<label for="email">email: </label>
		 		<input type="text" id="email" name="email">
 			</li>
 			<li>
		 		<label for="jurusan">jurusan: </label>
		 		<input type="text" id="jurusan" name="jurusan">
 			</li>
 			<li>
		 		<label for="gambar">gambar: </label>
		 		<input type="text" id="gambar" name="gambar">
 			</li>
 			<li>
 				<button type="submit" name="submit">Tambah Data</button>
 			</li>
 		</ul>


 	</form>
 	
 </body>
 </html>