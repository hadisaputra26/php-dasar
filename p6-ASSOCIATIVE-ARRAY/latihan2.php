<<?php
// $mahasiswa = [
// 	["Hadi Saputra","123456","Teknik Informatika","hadisaputra26@gmail.com"],
// 	["Tika Iwaraty","98765","Sistem Informasi","tika@gmail.com"]
// ];

// Array Associative
// Key-nya adalah string yang kita buat sendiri

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
 	<title>Latihan3</title>
 </head>
 <body>
 	<h1>DAFTAR MAHASISWA</h1>
 	<?php foreach($mahasiswa as $mhs) : ?>
 	<ul>
 		<li>Nama : <?= $mhs["nama"] ?></li>
 		<li>NIM : <?= $mhs["nrp"] ?></li>
 		<li>Jurusan : <?= $mhs["jurusan"] ?></li>
 		<li>Email : <?= $mhs["email"] ?></li>
 	</ul>
 	<?php endforeach; ?>
 	
 </body>
 </html>

