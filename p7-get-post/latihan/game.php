<?php 

$comp = rand(1,3);

// Random Angka
if($comp == 1){
	$nilai = "batu";
} else if ($comp == 2){
	$nilai = "gunting";
} else if ($comp == 3){
	$nilai = "Kertas";
}

if(isset($_POST["kirim"])){
	if($nilai == $_POST["swit"]){
		$hasil = "SERI";
	} else if ($_POST["swit"] == "batu" ){
		if ($nilai == "kertas"){
			$hasil = "Kalas";
		}else {
			$hasil = "Menang";
		}
	} else if ($_POST["swit"] == "kertas"){
		if($nilai == "batu"){
			$hasil = "Menang";
		} else {
			$hasil = "kalah";
		}

	} else if ($_POST["swit"] == "gunting"){
		if($nilai == "batu"){
			$hasil = "Kalah";
		} else {
			$hasil = "Menang";
		}
	}
}
// Rule Game


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Game Swit</title>
 </head>
 <body>
 	<form action="" method="post">
 		<h3>Pilih Batu, Gunting, atau Kertas</h3>
 		<label for="swit">Masukan Nilai</label>
 		<input type="text" id="swit" name="swit">
 		<button type="text" name="kirim">kirim</button>
 	</form>
 	<?php if(isset($_POST["kirim"])) :  ?>
		<p>Kamu Memilih <?= $_POST["swit"]; ?> dan Komputer memilih <?= $nilai; ?></p>
		<p>Maka Hasilnya Anda <?= $hasil; ?></p>
	<?php endif; ?>

 </body>
 </html>