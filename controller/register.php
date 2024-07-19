<?php
session_start();

include '../config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $check_username = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE username_pembeli = '$username'");
    if(mysqli_num_rows($check_username) > 0) {
        header("location: ../view/regis.php?pesan=username_taken");
        exit();
    }

    $check_email = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE email = '$email'");
    if(mysqli_num_rows($check_email) > 0) {
        header("location: ../view/regis.php?pesan=email_taken");
        exit();
    }

    $query = mysqli_query($koneksi, "INSERT INTO pembeli (username_pembeli, email, password) 
    VALUES ('$username', '$email', '$password')");

    if ($query) {
        header("location: ../view/login.php?pesan=register_success");
        exit();
    } else {
        header("location: ../view/registration.php?pesan=register_failed");
        exit();
    }
} else {
    header("location: ../view/registration.php");
    exit();
}
?>