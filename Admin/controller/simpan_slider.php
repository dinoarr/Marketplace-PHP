<?php
include '../config/koneksi.php';

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['simpan'])){
    // ambil data dari formulir
    $id_slider = htmlspecialchars($_POST['id_slider']);
    $judul_slider = htmlspecialchars($_POST['judul_slider']);
    
    // ambil konten file gambar
    $thumbnail = file_get_contents($_FILES['thumbnail']['tmp_name']);

    // buat query dengan parameterized query
    $sql = "INSERT INTO slider (id_slider, judul_slider, thumbnail) VALUES (?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sss", $id_slider, $judul_slider, $thumbnail);

    // eksekusi query
    if($stmt->execute()) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../view/slider.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: ../view/slider.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>
