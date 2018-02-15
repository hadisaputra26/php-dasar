<?php 

//Pengulagan pada Array
// menggunakan for / foreach

$numbers = [2,6,9,13,27,39,41,46,58,93,101,109];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Latihan 2</title>
	<style>
		.kotak {
			width: 50px;
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px;
			margin: 3px;
			float: left;
		}
		
		.clear{
			clear:both;
		}

	</style>
</head>
<body>
	<!-- Pengulangan Menggunakan FOR -->
	<?php for( $i = 0; $i < count($numbers); $i++) : ?>
		<div class=kotak><?= $numbers[$i]; ?></div>
	<?php endfor; ?>

	<div class="clear"></div>

	<!-- Pengulangan menggunakan FOREACH -->
	<?php foreach($numbers as $angka) : ?>
		<div class="kotak"><?= $angka ?></div>
	<?php endforeach; ?>


</body>
</html>