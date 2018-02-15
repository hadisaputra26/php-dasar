<?php 

$x = 10;

function nilai(){
	// Membuat $x menjadi Variable global
	global $x;
	echo "$x";
}

nilai();

 ?>