<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Info Film</title>
</head>
<body>
	<ul>
		<li><?= $_GET["judul"]; ?></li>
		<li><?= $_GET["tahun"]; ?></li>
		<li><?= $_GET["genre"]; ?></li>
		<li><?= $_GET["durasi"]; ?></li>
	</ul>
	<a href="listfilm.php">Kembali</a>
</body>
</html>