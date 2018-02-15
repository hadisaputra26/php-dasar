<<?php
$mahasiswa = [
	["Hadi Saputra","123456","Teknik Informatika","hadisaputra26@gmail.com"],
	["Tika Iwaraty","98765","Sistem Informasi","tika@gmail.com"]
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
 		<?php foreach($mhs as $mhs1) : ?>
 	<ul>
 		<li>Nama : <?= $mh1 ?></li>
 	</ul>
 		<?php endforeach; ?>
 	<?php endforeach; ?>
 	
 </body>
 </html>