<?php
//koneksi ke database
require_once 'koneksi.php';
session_start();
//pengecekan terhadap database pada tabel user dengan kondisi if
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE user = '$username'";
    $hasil = $db->query($sql)->fetch_assoc();
    if ($hasil) {
        //jika ada maka akan ke index.php
        if (strcmp($password, $hasil['password']) == 0) {
            $_SESSION['role'] = $hasil['role'];
            $_SESSION['username'] = $hasil['user'];
            header('Location: index.php');
        }
        //jika tidak akan terdapat pesa erro
    } else {
        $pesanerror = "Data blom ada nich di database";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/fef9209b86.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="dashboard.css">
    <!-- Type JS -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <!--membuat class card dengan shadow agar membentuk banyangan-->
        <div class="card shadow  w-50 mx-auto">
            <div class="card-header text-center">
                <h1 style="color: blue;"><b>Login</b></h1>
                <!--jika dagta belum ada di database dengan field posisi username maka pesan error dimunculkan-->
                <?php if (isset($pesanerror)) : ?>
                    <div class="alert alert-danger">
                        <?= $pesanerror ?>
                    </div>
                <?php endif ?>
            </div>
            <!-- form login user menggunakan card -->
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="">Username</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-block" type="submit" name="submit">Log In</button>
                </form>
            </div>
        </div>
    </div>
    <br>
</body>
</html>
<?php
// kondisi menggunakan alert dimana alert akan keluar jika user mengintruksikan untuk refresh ke halaman sebelumnya
if (isset($_SESSION["username"])){
    echo "
        <script>
            alert('Anda sudah login, log out dulu kalau mau keluar');
            window.location = 'index.php';
        </script>
    ";
}
?>