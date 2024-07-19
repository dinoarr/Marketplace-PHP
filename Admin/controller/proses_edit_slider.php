<?php
include '../config/koneksi.php';

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan'])){
    // ambil data dari formulir
    $id_slider = htmlspecialchars($_POST['id_slider']);
    $judul_slider = htmlspecialchars($_POST['judul_slider']);
    
    // cek apakah ada file gambar yang diunggah
    if(isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
        // ambil konten file gambar
        $thumbnail = file_get_contents($_FILES['thumbnail']['tmp_name']);
        
        // buat query untuk update data slider dengan thumbnail
        $sql = "UPDATE slider SET judul_slider = ?, thumbnail = ? WHERE id_slider = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sss", $judul_slider, $thumbnail, $id_slider);
    } else {
        // jika tidak ada file gambar yang diunggah, hanya update judul slider
        $sql = "UPDATE slider SET judul_slider = ? WHERE id_slider = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ss", $judul_slider, $id_slider);
    }

    // eksekusi query
    if($stmt->execute()) {
        // kalau berhasil alihkan ke halaman slider.php dengan status=sukses
        header('Location: ../view/slider.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman slider.php dengan status=gagal
        header('Location: ../view/slider.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>
