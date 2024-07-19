<?php 
session_start();

include '../config/connect.php';

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);


if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}


if (!isset($_SESSION['last_login_attempt'])) {
    $_SESSION['last_login_attempt'] = time();
}

if ($_SESSION['login_attempts'] >= 3 && time() - $_SESSION['last_login_attempt'] > 3600) {
    $_SESSION['login_attempts'] = 0;
}


$query_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
$cek_admin = mysqli_num_rows($query_admin);

$query_user = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE username_pembeli = '$username' AND password = '$password'");
$cek_user = mysqli_num_rows($query_user);


if ($cek_admin > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location: ../Admin/index.php");
    exit();
} elseif ($cek_user > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location: ../view/home.php");
    exit();
} else {
  
    $_SESSION['login_attempts'] += 1;
    $_SESSION['last_login_attempt'] = time();

    if ($_SESSION['login_attempts'] >= 3) {
        echo "<script>alert('Anda telah gagal login sebanyak 3 kali. Silakan klik OK untuk mereset password.'); window.location.href='../view/forgot.php';</script>";
        exit(); 
    } else {
        header("location:../view/login.php?Gagal_Login");
        exit(); 
    }
}
?>xml_error_string