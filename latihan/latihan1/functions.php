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

	$tambah = "INSERT INTO mahasiswa VALUES 
	('','$nrp','$nama','$email','$jurusan','');
	";
	mysqli_query($conn,$tambah);

	return mysqli_affected_rows($conn);
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

	$ubah = "UPDATE mahasiswa SET 
	nrp = '$nrp',
	nama = '$nama',
	email = '$email',
	jurusan = '$jurusan'
	WHERE id = $ids
	";
	mysqli_query($conn, $ubah);

	return mysqli_affected_rows($conn);

}

