<!-- ============================================= -->
<!-- belajar FOR, WHILE, dan DO WHILE -->
<!-- ============================================= -->

<?php
// FOR
// for($i = 0; $i < 10; $i++){
// 	$j = $i+1; 
// 	echo "Hallo Saya Hadi ke ".$j." <br>";
// }

// WHILE
// $i = 0;
// while($i < 10){
// 	echo "Hallo Saya Adalah Hadi ke ".$i."<br>";
// 	$i++;
// }

// DO WHILE
// $i = 0;
// do{
// 	echo "Hallo Saya Adalah Hadi <br>";
// 	$i++;
// }while($i<5)
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Belajar PHP</title>
</head>
<body>
	<table border="1" cellpadding="20" cellspacing="0">
		<!-- ===================================================== -->
		<!-- Penulisan syntax Biasa -->
		<?php 
			// for($i = 1; $i <= 3; $i++){
			// 	echo "<tr>";
			// 	for($j = 1; $j <= 5; $j++){
			// 		echo "<td>Baris ke $i, kolom ke $j</td>";
			// 	}
			// 	echo "</tr>";
			// }
		 ?>
		 <!-- ============================================================= -->
		 <!-- Penulisan syntax Templateting -->
		 <?php for($i = 1; $i <= 3; $i++) : ?>
		 	<tr>
		 		<?php for($j = 1; $j <= 5; $j++) : ?>
		 		<!-- mengganti syntak php echo -->
		 		<td> <?= "baris ke $i kolom ke $j"; ?> </td>
		 		<?php endfor; ?>
		 	</tr>
		 <?php endfor; ?>

	</table>
</body>
</html>