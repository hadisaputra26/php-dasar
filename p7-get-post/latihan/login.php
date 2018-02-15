<?php 

if(isset($_POST["sumbit"])){
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
 	<title>LOGIN</title>
 </head>
 <body>
 	<h1>Masukan username dan password</h1>
 	<?php if(isset($error)): ?>
 		<h2 style="color:red; font-style: italic;">Username dan Password Salah</h2>
 	<?php endif; ?>
 	<form action="" method="post">
 		<label for="user">Username</label>
 		<input type="text" name="user" id="user">
 		<br>
 		<label for="pass">Password</label>
 		<input type="password" name="pass" id="pass">
 		<br>
 		<button type="sumbit" name="sumbit">KIRIM</button>


 	</form>
 </body>
 </html>