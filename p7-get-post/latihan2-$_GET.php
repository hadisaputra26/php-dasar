<?php 

// SUPERGLOBAL
// Variable global milik php
// merupakan array associative
// contohnya
// $_GET, $_POST, $_REQUEST, $_SESSION, $_COOKIE, $_SERVER, $_ENV

//============================================

$mahasiswa = [
	[
		"nama" => "Hadi Saputra",
		"nrp" => "123456",
		"email" => "hadisaputra26@gmail.com",
		"jurusan" => "teknik informatika"
	],
	[
		"nama" => "Putra Cita",
		"nrp" => "789109",
		"email" => "putracita@gmail.com",
		"jurusan" => "sistem informatika"
	]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
<ul>
	<?php foreach( $mahasiswa as $mhs) : ?>
			<li>
				<a href="latihan3.php?nama=<?= $mhs["nama"];?> 
					&nrp= < ?= $mhs["nrp"];?>
					&email= <?= $mhs["email"];?>
					&jurusan= <?= $mhs["jurusan"];?>
					">
					<?= $mhs["nama"]; ?></li></a>
			</li>
	<?php endforeach; ?>
</ul>

</body>
</html>