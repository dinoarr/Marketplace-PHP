<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "fourcreate_rev" ;

$koneksi = mysqli_connect($server, $user, $pass, $db);

if (!$koneksi) {
    die('koneksi database gagal : ' . mysqli_connect_error());
}
?>