<?php
include '../config/koneksi.php';

// cek apakah tombol simpan sudah diklik atau belum
if(isset($_POST['simpan'])){
    // ambil data dari formulir untuk data barang
    $id_barang = htmlspecialchars($_POST['id_barang']);
    $id_kategori = htmlspecialchars($_POST['id_kategori']);
    $nama_barang = htmlspecialchars($_POST['nama_barang']);
    $harga_barang = htmlspecialchars($_POST['harga_barang']);
    $deskripsi_barang = htmlspecialchars($_POST['deskripsi_barang']);

    // buat query untuk insert data barang
    $sql_barang = "INSERT INTO barang (id_barang, id_kategori, nama_barang, harga_barang, deskripsi_barang)
    VALUES (?, ?, ?, ?, ?)";
    $stmt_barang = $koneksi->prepare($sql_barang);
    $stmt_barang->bind_param("sssss", $id_barang, $id_kategori, $nama_barang, $harga_barang, $deskripsi_barang);
    
    // eksekusi query untuk data barang
    if($stmt_barang->execute()) {
        // ambil konten file gambar
        $nama_file_1 = isset($_FILES['nama_file_1']) ? file_get_contents($_FILES['nama_file_1']['tmp_name']) : '';
        $nama_file_2 = isset($_FILES['nama_file_2']) ? file_get_contents($_FILES['nama_file_2']['tmp_name']) : '';
        $nama_file_3 = isset($_FILES['nama_file_3']) ? file_get_contents($_FILES['nama_file_3']['tmp_name']) : '';
        $nama_file_4 = isset($_FILES['nama_file_4']) ? file_get_contents($_FILES['nama_file_4']['tmp_name']) : '';

        // buat query dengan parameterized query untuk data foto barang
        $sql_foto = "INSERT INTO foto_barang (id_barang, nama_file_1, nama_file_2, nama_file_3, nama_file_4) VALUES (?, ?, ?, ?, ?)";
        $stmt_foto = $koneksi->prepare($sql_foto);
        $stmt_foto->bind_param("sssss", $id_barang, $nama_file_1, $nama_file_2, $nama_file_3, $nama_file_4);

        // eksekusi query untuk data foto barang
        if($stmt_foto->execute()) {
            // jika berhasil, alihkan ke halaman foto_barang.php dengan status=sukses
            header('Location: ../view/foto_barang.php?status=sukses');
            exit(); // pastikan untuk keluar dari skrip setelah mengalihkan halaman
        } else {
            // jika query untuk data foto barang gagal, alihkan ke halaman foto_barang.php dengan status=gagal
            header('Location: ../view/foto_barang.php?status=gagal');
            exit(); // pastikan untuk keluar dari skrip setelah mengalihkan halaman
        }
    } else {
        // jika query untuk data barang gagal, alihkan ke halaman barang.php dengan status=gagal
        header('Location: ../view/barang.php?status=gagal');
        exit(); // pastikan untuk keluar dari skrip setelah mengalihkan halaman
    }
} else {
    // jika tidak disubmit melalui tombol simpan, akses dilarang
    die("Akses dilarang...");
}
?>
