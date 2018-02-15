<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Latihan POST</title>
</head>
<body>
	<form action="" method="post">
		<label for="nilai1">Nilai 1</label>
		<input type="text" id="nilai1" name="nilai1">
		<br>
		<label for="nilai2"> Nilai 2</label>
		<input type="text" id="nilai2" name="nilai2">
		<br>
		<ul>
			<li><button type="text" name="tambah">Tambah</button></li>
			<li><button type="text" name="kurang">kurang</button></li>
			<li><button type="text" name="kali">kali</button></li>
			<li><button type="text" name="bagi">bagi</button></li>
		</ul>
	</form>

<?php 
function tambah($a, $b){
	return $a+$b;
}
function kurang($a,$b){
	return $a-$b;
}
function kali($a,$b){
	return $a*$b;
}
function bagi($a,$b){
	return $a/$b;
}
?>

 	<?php if(isset($_POST["tambah"])): ?>
		<h1>nilai nya : <?= tambah($_POST["nilai1"],$_POST["nilai2"]); ?></h1>
	<?php endif; ?>
	<?php if(isset($_POST["kurang"])): ?>
		<h1>nilai nya : <?= kurang($_POST["nilai1"],$_POST["nilai2"]); ?></h1>
	<?php endif; ?>
	<?php if(isset($_POST["kali"])): ?>
		<h1>nilai nya : <?= kali($_POST["nilai1"],$_POST["nilai2"]); ?></h1>
	<?php endif; ?>
	<?php if(isset($_POST["bagi"])): ?>
		<h1>nilai nya : <?= bagi($_POST["nilai1"],$_POST["nilai2"]); ?></h1>
	<?php endif; ?>

</body>
</html>