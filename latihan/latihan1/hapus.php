<?php 

require 'functions.php';

$id = $_GET["id"];

if (hapus($id) > 0){
	echo "
	<script>
		alert('Data Berhasil Di Hapus');
		document.location = 'index.php';
	</script>
	";

} else {
	echo "
	<script>
		alert('Data GAGAL Di Hapus');
		document.location = 'index.php';
	</script>
	";
}

 ?>