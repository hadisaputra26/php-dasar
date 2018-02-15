<?php 

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Daftar Mahasiswa</title>
 </head>
 <body>
 	<h1>DAFTAR MAHASISWA</h1>
 	<table border="1" cellpadding="10" cellspacing="0">
 		<tr>
 			<th>No.</th>
 			<th>NRP</th>
 			<th>Nama</th>
 			<th>Email</th>
 			<th>Jurusan</th>
 		</tr>
 		<?php $i = 1; ?>
 		<?php foreach($mahasiswa as $mhs) : ?>
	 		<tr>
	 			<td><?= $i; ?></td>
	 			<td><?= $mhs["nrp"]; ?></td>
	 			<td><?= $mhs["nama"]; ?></td>
	 			<td><?= $mhs["email"]; ?></td>
	 			<td><?= $mhs["jurusan"]; ?></td>
	 		</tr>
	 		<?php $i++; ?>
 		<?php endforeach; ?>
 	</table>
 </body>
 </html>