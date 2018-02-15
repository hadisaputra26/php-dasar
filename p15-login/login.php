<?php 
require 'functions.php';

if(isset($_POST["login"])){

	$username = $_POST["username"];
	$password = $_POST["password"];

	$cekuser = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($conn, $cekuser);

	// Bugging program
	// $row =  mysqli_fetch_assoc($result);
	// var_dump($result);
	// var_dump($row);
	// die;

	// cek username
	if( mysqli_num_rows($result) === 1){

		//cek password
		$row =  mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])){
			header("Location: index.php");
			exit;
		}
		
	}
	$error = true;
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Login</title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
<h1>Halaman Login</h1>

<?php if(isset($error)): ?>
	<h2 style="color: red; font-style: italic;">Username / Password Salah</h2>
<?php endif; ?>

<form action="" method="post">
	<ul>
		<li>
			<label for="username">Username : </label>
			<input type="text" id="username" name="username">
		</li>
		<li>
			<label for="password">password : </label>
			<input type="password" id="password" name="password">
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>

</form>
	
</body>
</html>