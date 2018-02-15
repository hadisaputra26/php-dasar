<?php 

if(isset($_POST["submit"])){
	if($_POST["user"] == "admin" && $_POST["pass"] == "123456"){
		header("Location: admin.php");
		exit;
	} else {
		$error = true;
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Admin</title>
</head>
<body>
	<h1>Login Admin</h1>

	<?php if(isset($error)): ?>
		<h1 style = "color:red; font-style: italic;"> Username / Password salah</h1>
	<?php endif; ?>

<ul>
	<form action="" method="post">
		<li>
			<label for="user">username: </label>
			<input type="text" id="user" name="user">
		</li>
		<li>
			<label for="pass">Password: </label>
			<input type="password" id="pass" name="pass">
		</li>
		<li>
			<button type="submit" name="submit">Kirim</button>
		</li>
	</form>
</ul>
</body>
</html>