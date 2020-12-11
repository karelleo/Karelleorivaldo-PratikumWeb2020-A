<?php
	include 'koneksi.php';
	session_start();
	//hubungkan dengan database pada tabel mahasiswa
	$id = $_GET["id"];
	$mhs = mysqli_query($db, "SELECT * from mahasiswa where id = $id");
	$mhs = mysqli_fetch_assoc($mhs);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
	<title>Edit Data Mahasiswa</title>
	<!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-dark bg-primary">
	  <a class="navbar-brand" href="index.php"><p><h1><center>Selamat Datang <?= $_SESSION['username'] ?></center></h1></p></a>
	</nav>
	<!-- akhir navbar -->
	<div class="container">
		<!-- edit data ditabel mahasiwa -->
		<h2 align="center" style="margin: 30px;">Edit Data Mahasiswa</h2>
		<form method="POST" action="">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
                    <div class="form-group">
						<label>NIM Mahasiswa</label><br>
						<input type="text" name="nim" id="nim" class="form-control" required="true" value="<?= $mhs['nim_mahasiswa'] ?>">
					</div>
					<div class="form-group">
						<label>Nama Mahasiswa</label>
						<input type="text" name="nama" id="nama" class="form-control" value="<?= $mhs['nama_mahasiswa'] ?>" required="true">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control" required="true"><?= $mhs['alamat']; ?></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="simpan" id="simpan" class="btn btn-primary">
							<i class="fa fa-save"></i> Simpan
						</button>
					</div>
				</div>
			</div>
		</form>
    </div>
</body>
</html>
<?php
//script php0 untuk meniyimpan data
if (isset($_POST["simpan"])) {
	$nim = htmlspecialchars($_POST["nim"]);
	$nama = htmlspecialchars($_POST["nama"]);
	$alamat = htmlspecialchars($_POST["alamat"]);
//mealukan update ke dalam tabel mahasiswa
	mysqli_query($db, "UPDATE mahasiswa SET nim_mahasiswa = '$nim', nama_mahasiswa = '$nama', alamat = '$alamat' where id = $id");
	//kalau sudah berhasil diedit maka ada pesan alert dimana jika salah akan tgerjadi pesa eeror, disini harus terjadi perubahan dalam tabel karena jika tidak akan muncul kode pesan eror
	if (mysqli_affected_rows($db) > 0){
		echo "
			<script>
				alert('data berhasil diubah');
				window.location = 'index.php';
			</script>
		";
	}else {
		echo mysqli_error();
	}
}
?>