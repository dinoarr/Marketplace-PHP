<?php
include "../config/koneksi.php";
if (isset($_POST['simpan'])) {
    $id_barang = htmlspecialchars($_POST['id_barang']);
    $id_kategori = htmlspecialchars($_POST['id_kategori']);
    $nama_barang = htmlspecialchars($_POST['nama_barang']);
    $harga_barang = htmlspecialchars($_POST['harga_barang']);
    $deskripsi_barang = htmlspecialchars($_POST['deskripsi_barang']);

    $query = mysqli_query($koneksi, "UPDATE barang SET id_kategori='$id_kategori', nama_barang='$nama_barang', harga_barang='$harga_barang', deskripsi_barang='$deskripsi_barang' WHERE id_barang='$id_barang'");
    if ($query) {
        header('location:../view/barang.php?alert=sukses');
    } else {
        header('location:../view/barang.php?alert=gagal');
    }
}
?>
