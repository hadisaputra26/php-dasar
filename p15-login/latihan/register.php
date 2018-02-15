<?php 
require 'functions.php';

if(isset($_POST["submit"])){

	if(register($_POST) > 0){
		echo "
		<script>
			alert('Data Berhasil Di Tambahkan');
		</script>
		";
	} else {
		echo "
		<script>
			alert('Data GAGAL Di Tambahkan');
		</script>
		";
	}

}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Register</title>
 	<style>
 		label {
 			display:block;
 		}
 	</style>
 </head>
 <body>
<h1>Halaman Registrasi</h1>
 	<form action="" method="post">
 		<ul>
 			<li>
 				<label for="username">Username : </label>
 				<input type="text" id="username" name="username" autocomplete="off">
 			</li>
 			<li>
 				<label for="password">password : </label>
 				<input type="password" id="password" name="password">
 			</li>
 			<li>
 				<label for="password2">password : </label>
 				<input type="password" id="password2" name="password2">
 			</li>
 			<li>
 				<button type="submit" name="submit">Kirim Data</button>
 			</li>
 		</ul>
 	</form>
 	
 </body>
 </html>