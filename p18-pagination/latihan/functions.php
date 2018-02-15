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
$jumlahDataPerhalaman = 2;
$jumlahdata = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahdata / $jumlahDataPerhalaman);

$halamanAktif = (isset($_GET["halaman"])) ?$_GET["halaman"] :1;
$dataAwal = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$query = "SELECT * FROM mahasiswa 
WHERE 
nama LIKE '%$keyword%' OR 
nrp LIKE '%$keyword%' OR 
email LIKE '%$keyword%' OR 
jurusan LIKE '%$keyword%' 
LIMIT $dataAwal, $jumlahDataPerhalaman
";
	return query($query);

}


function register($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$cekusername = "SELECT username FROM user WHERE username = '$username'";
	$result = mysqli_query($conn, $cekusername);
	if( mysqli_fetch_assoc($result)){
		echo "
		<script>
			alert('username sudah terdaftar');
		</script>
		";
		return false;
	}

	// cek konfirmasi password
	if ( $password !== $password2 ){
		echo "
		<script>
			alert('konfirmasi password tidak sesuai');
		</script>
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan userbaru kedalam database
	$user = "INSERT INTO user VALUES ('','$username','$password')";
	mysqli_query($conn, $user);

	return mysqli_affected_rows($conn);

}

// function pagnation(){
// $jumlahDataPerhalaman = 2;
// $jumlahdata = count(query("SELECT * FROM mahasiswa"));
// $jumlahHalaman = ceil($jumlahdata / $jumlahDataPerhalaman);

// $halamanAktif = (isset($data["halaman"])) ?$data["halaman"] :1;
// $dataAwal = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
// return $dataAwal && $jumlahDataPerhalaman;
// }

$jumlahDataPerhalaman = 2;
$jumlahdata = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahdata / $jumlahDataPerhalaman);

$halamanAktif = (isset($_GET["halaman"])) ?$_GET["halaman"] :1;
$dataAwal = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

 ?>