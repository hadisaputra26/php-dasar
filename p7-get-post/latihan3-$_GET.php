<?php 
// Cek Apakah Tidak ada data di $_GET

if( !isset($_GET["nama"]) || 
	!isset($_GET["nrp"]) || 
	!isset($_GET["email"]) || 
	!isset($_GET["jurusan"]) ){
	// redirect
	header("Location: latihan2.php");
	exit;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<ul>
		<li><?= $_GET["nama"]; ?></li>
		<li><?= $_GET["nrp"]; ?></li>
		<li><?= $_GET["email"]; ?></li>
		<li><?= $_GET["jurusan"]; ?></li>
	</ul>
<a href="latihan2.php">Kembali Ke Daftar Mahasiswa</a>
</body>
</html>