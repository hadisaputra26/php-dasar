<?php 
// Koneksi Ke database
// urutan parameternya
// <nama host>, <username>, <Password>, <nama database>

$conn = mysqli_connect("localhost", "root", "", "phpdasar");


// Ambil data dari table mahasiswa / query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fetch) mahasiswa dari object esult
// Artinya untuk mengambil data dari tabel mahasiswa

// mysqli_fetch_row // mengembalikan array numerik
// mysqli_fetch_assoc // mengembalikan array nassociative
// mysqli_fetch_array // mengembalikan keduanya (doble)
// mysqli_fetch_object // 

// while ($mhs = mysqli_fetch_assoc($result)) {
// 	var_dump($mhs);
// }



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>NRP</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>

<!-- variable i untuk menggantikan id -->
<?php $i = 1; ?>
<?php while($row = mysqli_fetch_assoc($result)) : ?>
	<tr>
		<td><?= $i;  ?></td>
		<td><a href="">UBAH</a> |
		<a href="">HAPUS</a></td>
		<td><img src=""></td>
		<td><?= $row["nrp"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
<?php endwhile; ?>
</table>


</body>
</html>