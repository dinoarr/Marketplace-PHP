<?php
include '../config/koneksi.php';

if(isset($_GET['kode'])) {
    $id_barang = $_GET['kode'];

    // buat query untuk mengambil foto barang yang terkait dengan barang yang akan dihapus
    $sql_select_foto = "SELECT id_foto FROM foto_barang WHERE id_barang='$id_barang'";
    $result_select_foto = mysqli_query($koneksi, $sql_select_foto);

    // cek apakah query berhasil dieksekusi
    if($result_select_foto) {
        // loop untuk menghapus setiap foto yang terkait dengan barang yang akan dihapus
        while($row = mysqli_fetch_assoc($result_select_foto)) {
            $id_foto = $row['id_foto'];
            // buat query untuk menghapus foto berdasarkan id foto
            $sql_delete_foto = "DELETE FROM foto_barang WHERE id_foto='$id_foto'";
            $result_delete_foto = mysqli_query($koneksi, $sql_delete_foto);
            // cek apakah query berhasil dieksekusi
            if(!$result_delete_foto) {
                die("Gagal menghapus foto...");
            }
        }
    } else {
        die("Gagal mengambil foto...");
    }

    // buat query hapus barang
    $sql_hapus_barang = "DELETE FROM barang WHERE id_barang='$id_barang'";
    $query_hapus_barang = mysqli_query($koneksi, $sql_hapus_barang);
    
    // apakah query hapus barang berhasil?
    if($query_hapus_barang) {
        header('Location: ../view/barang.php?hapus=sukses');
    } else {
        die("Gagal menghapus barang...");
    }
    
} else {
    die("Akses dilarang...");
}
?>
