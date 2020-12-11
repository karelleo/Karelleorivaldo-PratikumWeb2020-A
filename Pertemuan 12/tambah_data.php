<?php
//Menggabungkan dengan file koneksi yang telah kita buat
	session_start();
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
	<title>Tambah Data Mahasiswa</title>
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
	<div class="container">
			<!--tambah data ditabel mahasiwa -->
		<h2 align="center" style="margin: 30px;">Tambah Data Mahasiswa</h2>
		<form method="POST" action="">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
                    <div class="form-group">
						<label>NIM Mahasiswa</label><br>
						<input type="text" name="nim" id="nim_mahasiswa" class="form-control" required="true">
					</div>
					<div class="form-group">
						<label>Nama Mahasiswa</label>
						<input type="text" name="nama" id="nama_mahasiswa" class="form-control" required="true">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
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

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>
<?php
//script php untuk meniyimpan data
if (isset($_POST['simpan'])) {
    $nim = htmlspecialchars($_POST['nim']);
	$nama = htmlspecialchars($_POST['nama']);
	$alamat = htmlspecialchars($_POST['alamat']);
//membawa value nilai diatas ke tabel mahasiswa pada database
    mysqli_query($db,"INSERT into mahasiswa VALUES ('','$nim','$nama','$alamat')");
    if (mysqli_affected_rows($db) > 0) {
    	echo "<script>alert('Data Berhasil Disimpan');location='index.php';</script>";
    } else {
    	echo mysqli_error($db);
    }
}
?>