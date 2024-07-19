<?php
include '../config/koneksi.php';

// cek apakah parameter kode sudah diterima
if(isset($_GET['kode'])){
    // ambil kode foto dari parameter URL
    $id_foto = $_GET['kode'];
    
    // buat query untuk menghapus foto berdasarkan kode
    $sql = "DELETE FROM foto_barang WHERE id_foto=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $id_foto);

    // eksekusi query
    if($stmt->execute()) {
        // kalau berhasil alihkan ke halaman foto_barang.php dengan status=sukses
        header('Location: ../view/foto_barang.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman foto_barang.php dengan status=gagal
        header('Location: ../view/foto_barang.php?status=gagal');
    }
} else {
    // kalau parameter kode tidak diterima, alihkan ke halaman foto_barang.php
    header('Location: ../view/foto_barang.php');
}
?>
