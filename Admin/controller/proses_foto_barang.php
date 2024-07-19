<?php
include '../config/koneksi.php';

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan'])){
    // ambil data dari formulir
    $id_barang = htmlspecialchars($_POST['id_barang']);
    
    // ambil konten file gambar
    $nama_file_1 = isset($_FILES['nama_file_1']) ? file_get_contents($_FILES['nama_file_1']['tmp_name']) : '';
    $nama_file_2 = isset($_FILES['nama_file_2']) ? file_get_contents($_FILES['nama_file_2']['tmp_name']) : '';
    $nama_file_3 = isset($_FILES['nama_file_3']) ? file_get_contents($_FILES['nama_file_3']['tmp_name']) : '';
    $nama_file_4 = isset($_FILES['nama_file_4']) ? file_get_contents($_FILES['nama_file_4']['tmp_name']) : '';

    // buat query dengan parameterized query
    $sql = "UPDATE foto_barang SET nama_file_1=?, nama_file_2=?, nama_file_3=?, nama_file_4=? WHERE id_barang=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssss", $nama_file_1, $nama_file_2, $nama_file_3, $nama_file_4, $id_barang);

    // eksekusi query
    if($stmt->execute()) {
        // kalau berhasil alihkan ke halaman foto_barang.php dengan status=sukses
        header('Location: ../view/foto_barang.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman foto_barang.php dengan status=gagal
        header('Location: ../view/foto_barang.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>
