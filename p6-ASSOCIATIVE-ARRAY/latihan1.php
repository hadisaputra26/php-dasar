<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Associative Array</title>
	<style>
		.kotak {
			width: 60px;
			height: 60px;
			background-color: yellow;
			text-align: center;
			line-height: 60px;
			margin: 3px;
			float: left;
			transition: 1s;
		}

		.kotak:hover {
			transform: rotate(360deg);
			border-radius: 50%;
		}
		.clear {
			clear: both;
		}

	</style>
</head>
<body>
<?php 
$angka = [[1,2,3],[4,5,6],[7,8,9]];
 ?>

<?php foreach($angka as $agk1): ?>
	<?php foreach($agk1 as $agk2): ?>
		<div class="kotak"><?= $agk2; ?></div>
	<?php endforeach; ?>
	<div class="clear"></div>
<?php endforeach; ?>



</body>
</html>