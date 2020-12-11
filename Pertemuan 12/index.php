<?php
    //buat koneksi ke database
    include 'koneksi.php';
    session_start();

    //klo user masuk index sebelum login maka index = login
    if (!isset($_SESSION['username']))
        header('Location: login.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- memangil dan menginformasikan user yang sedang aktif  dim ana user bisa menambahkan data atau pun keluar di dalam page ini-->
            <a class="navbar-brand" href="index.php"><p><h1><center>Selamat Datang <?= $_SESSION['username'] ?></center></h1></p></a>
            <span class="navbar">
                <a href="tambah_data.php" class="btn btn-warning mr-1">Tambah Data</a>
                <a href="logout.php" class="btn btn-warning">Logout</a> 
            </span>  
        </div>
    </nav>
    <!-- akhir navbar -->
<div class="container mt-5"> 
    <!--buat tabel untuk data mahasiswa yang diambil dari tabel mahasiswa--> 
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>No</td>
                <td>NIM Mahasiswa</td>
                <td>Nama Mahasiswa</td>
                <td>Alamat</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <!--ambil data di tabel mahasiswa-->
            <?php if (mysqli_num_rows(mysqli_query($db,"SELECT * from mahasiswa")) > 0) : ?>
            <?php
                //start numbering dimulai dari 1
                $no = 1;
                $query = "SELECT * FROM mahasiswa ORDER BY nim_mahasiswa ASC"; //melakukan query data dari field nim
                $mhs = mysqli_query($db,$query);
                foreach ($mhs as $data) : //bawa data mahasiswa jadi ke data
            ?>
                <tr>
                    <!--cetak data pada gtabel mahasiswa-->
                    <td><?= $no++ ?></td> 
                    <td><?= $data["nim_mahasiswa"]; ?></td> 
                    <td><?= $data["nama_mahasiswa"]; ?></td>
                    <td><?= $data["alamat"]; ?></td>
                    <td>
                        <a href="edit_data.php?id=<?= $data['id'] ?>"> <!--button edit data-->
                            <button class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit </button>
                        </a>
                        <?php if ($_SESSION['role'] == 1) : ?> <!--session pada user admin deimanha memiliki role untuk hapus data-->
                        <a href="hapus_data.php?id=<?= $data['id'] ?>"> <!--hapus data di database-->
                            <button class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus </button>
                        </a>
                        <?php endif; ?> 
                    </td>
                </tr>
            <?php endforeach; ?> 
                <?php else : ?>
                <tr>
                    <!-- kondisi jika data tidak ditemukan atau bernilai null -->
                    <td colspan='6'>Tidak ada data ditemukan</td> 
                </tr>
                <?php endif; ?>
        </tbody>
    </table>           
</div>
</body>
</html>