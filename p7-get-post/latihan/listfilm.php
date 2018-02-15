<?php 
$mahasiswa = [
	["judul"=>"Edga Of Tomorrow", "tahun"=>"2015", "genre"=>"War, Action, Adventure","durasi"=>"1 jam 30 menit"],
	["judul"=>"Inception", "tahun"=>"2010", "genre"=>"Action, Thrailer, Fantasy","durasi"=>"2 jam 10 menit"],
	["judul"=>"The Conjuring", "tahun"=>"2013", "genre"=>"Thrailer, horror","durasi"=>"1 jam 50 menit"]
];
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Film</title>
 </head>
 <body>
 	<h2>List Film</h2>
 	<ul>
 		<?php foreach($mahasiswa as $mhs): ?>
 			<li><a href="infofilm.php?judul=<?= $mhs["judul"];?>
 				&tahun=<?= $mhs["tahun"];?>
 				&genre=<?= $mhs["genre"];?>
 				&durasi=<?= $mhs["durasi"];?>
 				"><?= $mhs["judul"]; ?></a></li>
 		<?php endforeach; ?>
 	</ul>
 </body>
 </html>