<?php 

session_start();

//untuk memastikan season hilang
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit;

 ?>