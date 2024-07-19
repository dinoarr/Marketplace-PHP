<?php
include '../config/koneksi.php';
if(isset($_GET['kode']) ){

    $id_slider = $_GET['kode'];

    // buat query hapus
    $sql = "DELETE FROM slider WHERE id_slider='$id_slider'";
    $query = mysqli_query($koneksi, $sql);
    
    // apakah query hapus berhasil?
    if( $query) {
        header('Location: ../view/slider.php?hapus=sukses');
    } else {
        die("gagal menghapus...");
    }
    
} else {
    die("akses dilarang...");
}

?>