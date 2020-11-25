<!-- didalam tugas pratikum ke 10 ini saya menggunakan formating php ke html, alasan saya menggunakan hal tersebut dikarenakan pada materi ini berfokus pada php. (mungkin formating pada umumnya adalah membuat html terlebih dahulu baru menggunakan php ) desini saya membagi menjadi 3 page dimana page 1 untuk menentukan inputan siswa page 2 untuk melakukan inputan data diri dan page 3 untuk melakukan proses dan menampilkan hasil, saya menggunakan HTML,CSS, PHP -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- digunakan untuk memanggil syntax css boostrap secara online -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- memanggil file style.css -->
    <title>Tugas PBWA</title>
    <!-- digunakan sebagai title -->
  </head>
  <body>
  	<div class="container">
        <!-- membuat container pada page -->
  	 <div class="jumbotron bg-secondary">
      <!-- memanggil class jumbotron pada class boostrap dengan backgroun abu2 tua-->
  		<div class="card bg-white p-2">
        <!-- memanggil class card dengan padding 2 dan backgroun putih -->
        <div class="jumbotron">
          <!-- membuat class jumbotron -->
          <h1 class="lobster">RAPOTKU</h1>
          <!-- membuat heading 1 dengan class lobstre yang berfungsi sebagai font -->
        </div>
        <?php
        $n = $_POST['n'];
        echo "<form method='post' action='proses.php'>";
        for ($i = 0; $i <= $n-1; $i++) //perulangan sejulah n (inputan user form 1) untuk mencetak biodata siswa dibawah ini
        {
        echo "Nim".""." <input type='text' class='form-group input1' name='nim".$i."' /><br>"; // menginputkan form nim dengan class form group dan input 1 dengan sejumlah perulangan yang di inputan
        echo "Nama".""." <input type='text' class='form-group input2' name='nama".$i."' /><br>"; // menginputkan form nama dengan class form group dan input 2 dengan sejumlah perulangan yang di inputan
        echo "Nilai ke 1"." <input type='text' class='form-group' name='data".$i."' /><br>";// menginputkan form data (nilai bilangan) dengan class form group dengan sejumlah perulangan yang di inputan
        echo "Nilai ke 2"." <input type='text' class='form-group' name='data1".$i."' /><br><br>";// menginputkan form data1 (nilai bilalngan1) dengan class form group dengan sejumlah perulangan yang di inputan
        }
        echo "<input type='submit' class='btn btn-primary' name='submit' value='Submit' />"; // menggunakan class btn dengan backgroun biru umtuk sbmit
        echo "<input type='hidden' name='n' value='".$n."' />";
        echo "</form>";
        ?>
      </div>
     </div>
    </div>
    <!-- Optional JavaScript
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script><!-- script js dari boostrap yang digunakan online untuk responsive -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     </script>
</body>
</html>