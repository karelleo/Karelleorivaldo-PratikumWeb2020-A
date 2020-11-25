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
			for ($i=0; $i <= $n - 1; $i++)
			{
			$nim [$i] = $_POST['nim'.$i]; //perulangan untuk  nim sebesar n inputan user
			}
			for ($i=0; $i <= $n - 1; $i++)
			{
			$nama [$i] = $_POST['nama'.$i]; //perulangan untuk  nama sebesar n inputan user
			}
			for ($i=0; $i <= $n - 1; $i++)
			{
			$bilangan[$i] = $_POST['data'.$i]; //perulangan untuk  data nilai 1 sebesar n inputan user
			}
			for ($i=0; $i <= $n - 1; $i++)
			{
			$bilangan1[$i] = $_POST['data1'.$i]; //perulangan untuk  data nilai 2 sebesar n inputan user
			} 

			for ($i=0; $i <= $n - 1; $i++) //perulangan untuk mencetak ouput biodata siswa sebesar n inputan user
			{
			echo "Nim"." ".$nim[$i]."<br>"; // menampikan nim sesuai isi index
			echo "Nama"." ".$nama[$i]."<br>"; // menampikan nama sesuai isi index
			echo "Nilai 1"." = ".$bilangan[$i]."<br>"; // menampikan nilai 1 sesuai isi index
			echo "Nilai 2"." = ".$bilangan1[$i]."<br>"; // menampikan nilai 2 sesuai isi index
			echo "Jumlah nilai"." = ".( $bilangan1[$i] + $bilangan[$i] )."<br>"; // menampikan jumlah nilai sesuai isi index yang didapat dari aritmetika index array bilangan + bilangan 1
			echo "Rata-rata"." = ".( $bilangan1[$i] + $bilangan[$i] ) /2 ."<br>";  // menampikan rata-rata nilai sesuai isi index yang didapat dari aritmetika index array bilangan + bilangan 1 /2
			$ratarata[$i]= ( $bilangan1[$i] + $bilangan[$i] ) /2; // deklarasi rata2
				if( $ratarata[$i] >= 90){ //kondisi untuk kata2 motivasi jika lebih dari 90
					echo "Pertahankan Anda Jajaran Terbaik<br><br>";
				}
				elseif($ratarata[$i] >= 70){ //kondisi untuk kata2 motivasi jika lebih dari 70
					echo "Nilai anda cukup<br><br>";
				}
				elseif($ratarata[$i] >= 50){ //kondisi untuk kata2 motivasi jika lebih dari 50
					echo "Anda harus belajar lebih giat<br><br>";
				}
				else{
					echo "Sepertinya anda memiliki masalah<br><br>"; //kondisi untuk kata2 motivasi jika kurang dari 50
				}
			}
			echo "Daftar Lulus : ";
			for ($i=0; $i <= $n - 1; $i++) // perulangan untuk mencetaj nama nama yang lulus dengan kndisi nilai minim 70
			{
			if( $ratarata[$i] >= 70){
					echo $nama[$i].", ";
				}
			}
			echo "<br> Remidial : ";
			for ($i=0; $i <= $n - 1; $i++) // perulangan untuk mencetak nama nama yang remidial dengan kondisi nilai kurang dari 70
			{
			if( $ratarata[$i] < 70){
					echo $nama[$i].", ";
				}
			}
			?>
	</div>
	</div>
	</div>

    <!-- Optional JavaScript
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> <!-- script js dari boostrap yang digunakan online untuk responsive -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     </script>
</body>
</html>