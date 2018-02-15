<?php 

$conn = mysqli_connect("localhost", "root", "", "phpdasar");
 
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;

}

function tambah($data){
	global $conn;
	$nrp = $data["nrp"];
	$nama = $data["nama"];
	$email = $data["email"];
	$jurusan = $data["jurusan"];
	
	$gambar = upload();
	if(!$gambar){
		return false;
	}

	$tambah = "INSERT INTO mahasiswa VALUES 
	('','$nrp','$nama','$email','$jurusan','$gambar');
	";
	mysqli_query($conn,$tambah);

	return mysqli_affected_rows($conn);
}

function upload(){

	$namaFile = $_FILES["gambar"]["name"];
	$tmpName = $_FILES["gambar"]["tmp_name"];
	$error = $_FILES["gambar"]["error"];
	$ukuranFile = $_FILES["gambar"]["size"];

	//untuk mengecek ada gambar atau tidak
	if($error == 4){
		echo "
		<script>
			alert('Gambar Belum Di Masukan');
		</script>
		";
		return false;
	}

	// jika file yang dimasukan bukan gambar
	$ekstensiGambarVaild = ['jpg', 'jpeg', 'png'];
	$extensiGambar = explode('.', $namaFile);
	$extensiGambar = strtolower(end($extensiGambar));
	if(!in_array($extensiGambar, $ekstensiGambarVaild)){
		echo "
		<script>
			alert('file yang anda masukan buka gambar');
		</script>
		";
		return false;
	}

	// jika ukuran gambar terlalu besar
	if($ukuranFile > 1000000){
		echo "
		<script>
			alert('Ukuran file terlalu besar');
		</script>
		";
		return false;
	}

	// jika gambar layak untuk di upload
	$namaFileBaru = uniqid();
	$namaFileBaru .= ".";
	$namaFileBaru .= $extensiGambar;
	move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
	return $namaFileBaru;

}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

	return mysqli_affected_rows($conn);

}

function ubah($data){
	global $conn;

	$ids = $data["id"];
	$nrp = $data["nrp"];
	$nama = $data["nama"];
	$email = $data["email"];
	$jurusan = $data["jurusan"];

	$gambarLama = $data["gambarLama"];

	if($_FILES["gambar"]["error"] == 4){
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	$ubah = "UPDATE mahasiswa SET 
	nrp = '$nrp',
	nama = '$nama',
	email = '$email',
	jurusan = '$jurusan',
	gambar = '$gambar'
	WHERE id = $ids
	";
	mysqli_query($conn, $ubah);

	return mysqli_affected_rows($conn);

}

