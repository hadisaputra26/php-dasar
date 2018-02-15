<?php 
 
session_start();

//untuk memastikan season hilang
$_SESSION = [];
session_unset();
session_destroy();

// untuk menghilangkan cookie
setcookie("id", "", time() -3600);
setcookie("key", "", time() - 3600);

header("Location: login.php");
exit;

 ?>