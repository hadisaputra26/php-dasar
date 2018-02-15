<?php 
session_start();
require 'functions.php';

//cek cookie
if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
	$id = $_COOKIE["id"];
	$key = $_COOKIE["key"];

	// ambil data di database berdasarkan id
	$cookie = "SELECT * FROM user WHERE id = $id";
	$result = mysqli_query($conn, $cookie);
	$row = mysqli_fetch_assoc($row);

	// cek apakah cookienya sama
	if ($key === hash(joaat, $row["username"])) {
		$_SESSION["login"] = true;
	}

}
 
if(isset($_SESSION["login"])){
	header("Location: index.php");
	exit;
}

if(isset($_POST["login"])){

	$username = $_POST["username"];
	$password = $_POST["password"];

	$cekuser = "SELECT * FROM user WHERE username = '$username'";
	$result = mysqli_query($conn, $cekuser);

	// cek username
	if( mysqli_num_rows($result) === 1){

		//cek password
		$row =  mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])){
			// set session
			$_SESSION["login"] = true;

			// set cookie
			if(isset($_POST["remmember"])){
				//set cookie
				setcookie("id", $row["id"], time() + 60);
				setcookie("key", hash('joaat', $row["username"]), time() +60);
			}


		

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
			<label for="remmember">Remmember me :</label>
			<input type="checkbox" id="remmember" name="remmember">
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>

</form>
	
</body>
</html>