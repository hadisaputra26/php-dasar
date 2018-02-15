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

	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	// $gambar = htmlspecialchars($data["gambar"]);

	// upload gambar
	$gambar = upload();
	if(!$gambar){
		return false;
	}

	$query = "INSERT INTO mahasiswa VALUES ('','$nrp','$nama','$email','$jurusan','$gambar')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload(){

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

// cek apakah ada gambar yang di upload
	if ( $error == 4){
		echo "
		<script>
			alert('Upload Gambar Terlebih Dahulu');
		</script>
		";
		return false;
	}

// cek apakah yang di upload adalah gambar
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	// untuk memecah string menjadi array
	// cth: hadi.jpg >> ['hadi','jpg']
	// karena dipisah dari delimiter [.]
	$ekstensiGambar = explode('.', $namaFile);
	// fungsi [strtolower] untuk memaksa jadi huruf kecil semua
	// fungsi [end] untuk memilih index array paling terakhir
	$ekstensiGambar1 = strtolower(end($ekstensiGambar));
	// fungsi[in_array] untuk mencari jarum didalam jerami
	// artinya, mencari sebuah string didalam array
	if (!in_array($ekstensiGambar1, $ekstensiGambarValid)){
		echo "
		<script>
			alert('yang anda upload bukan gambar');
		</script>
		";
		return false;
	}

// cek jika ukuran gambar terlalu besar
	if( $ukuranFile > 1000000) {
		echo "
		<script>
			alert('Ukuran Gambar Terlalu Besar');
		</script>
		";
		return false;
	}

// lolos pengecekan, gambar siap diupload
	// generete nama gambar baru
	$namaFileBaru = uniqid(); // men-generet string random
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar1;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return $namaFileBaru;


}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
	return mysqli_affected_rows($conn);

}

function ubah($data){
	global $conn;

	$id = $data["id"];
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	// Mengambil gambar yang lama
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if($_FILES["gambar"]["error"] == 4){
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}


	$query = "UPDATE mahasiswa SET 
	nrp = '$nrp',
	nama = '$nama',
	email = '$email',
	jurusan = '$jurusan',
	gambar = '$gambar'
	where id = $id
	";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function cari($keyword){
$query = "SELECT * FROM mahasiswa 
WHERE 
nama LIKE '%$keyword%' OR 
nrp LIKE '%$keyword%' OR 
email LIKE '%$keyword%' OR 
jurusan LIKE '%$keyword%' 
";
	return query($query);

}

 ?>