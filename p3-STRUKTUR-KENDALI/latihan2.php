<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Belajar PHP</title>
	<style>
		.warna1 {
			background-color: silver;
		}
		.warna2{
			background-color: green;
		}
		.warna3{
			background-color: orange;
		}
		.warna4{
			background-color: yellow;
		}

	</style>
</head>
<body>
	<table border="1" cellpadding="20" cellspacing="0">
		<!-- Pengulangan baris -->
		 <?php for($i = 1; $i <= 10; $i++) : ?>
		 	<!-- Pengkondisian tag tr -->
		 	<?php if($i % 2 == 1): ?>
		 		<tr class="warna1">
		 	<?php else : ?>
		 		<tr class="warna2">
		 	<?php endif; ?>
				<!-- Pengulangan kolom -->
		 		<?php for($j = 1; $j <= 5; $j++) : ?>
		 			<!-- pengkondisian tag td -->
			 		<?php if($j % 2 == 1): ?>
			 			<td class="warna3"> 
			 		<?php else : ?>
			 			<td class="warna4">
			 		<?php endif; ?>
		 		<?= "baris ke $i kolom ke $j"; ?> 
		 		</td>
		 		<?php endfor; ?>

		 	</tr>
		 <?php endfor; ?>

	</table>
</body>
</html>