<?php 

$mahasiswa = [["Hadi Saputra","123456","Teknik Informatika","hadisaputra26@gmail.com"],["Tika Iwaraty","98765","Sistem Informasi","tika@gmail.com"]];

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
 		<li>Nama : <?= $mhs[0] ?></li>
 		<li>NIM : <?= $mhs[1] ?></li>
 		<li>Jurusan : <?= $mhs[2] ?></li>
 		<li>Email : <?= $mhs[3] ?></li>
 	</ul>
 	<?php endforeach; ?>
 	
 </body>
 </html>

