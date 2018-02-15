<?php 
// Koneksi Ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)){
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

	$tambah = "INSERT INTO mahasiswa VALUES ('','$nrp','$nama','$email','$jurusan','')";
	mysqli_query($conn, $tambah);

	return mysqli_affected_rows($conn);

}

function hapus($hps){
	global $conn;

	$hapus = "DELETE FROM mahasiswa WHERE id = $hps";
	mysqli_query($conn, $hapus);

	return mysqli_affected_rows($conn);
}

 ?>