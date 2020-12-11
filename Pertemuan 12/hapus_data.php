<?php
//koneksi dengan database
    include 'koneksi.php';
    session_start();
// kalau belum login, tendang ke login.php
    if (!isset($_SESSION["username"])){
    echo "
        <script>
            alert('anda belum login');
            window.location = 'login.php';
        </script>
    ";
}
//jika id sesuai dengan database maka data akan dihapus dari tabel mahasiswa yg ada di database
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM mahasiswa WHERE id = '$id'";
    if ($db->query($sql))
        if ($db->affected_rows > 0)
            echo '<script> alert("Berhasil hapus data"); window.location.href = "index.php"; </script>';
        else
            echo '<script> alert("Data tidak ada"); window.location.href = "index.php"; </script>';
    else
        echo '<script> alert("Gagal hapus data karena ' . $db->error .  '"); window.location.href = "index.php"; </script>';
}
$db->close(); //close database
?>