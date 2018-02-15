<?php 
require 'functions.php';

if(isset($_POST["register"])){

	if( register($_POST) > 0){
		echo "
 		<script>
			alert('User Baru Berhasil Ditambahkan');
 		</script>
		";
	} else {
		echo mysqli_error($conn);
	}

}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
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
			<input type="password" id="password" name="password" autocomplete="off">
		</li>
		<li>
			<label for="password2"> konfirmasi password : </label>
			<input type="password" id="password2" name="password2">
		</li>
		<li>
			<button type="submit" name="register">Registrasi</button>
		</li>
	</ul>
</form>

	
</body>
</html>