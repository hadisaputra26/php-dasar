<?php 

require 'functions.php';

$i = $_GET["id"];

if(hapus($i) > 0){
	echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data Gagal dihapus');
			document.location.href = 'index.php';
		</script>
		";
	}

 ?>