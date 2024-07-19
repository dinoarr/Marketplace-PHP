<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/tambah.css">
    <title>Edit Foto Barang</title>
</head>
<body>
<?php
include '../config/koneksi.php';
if(isset($_GET['id'])) {
    $id_slider = $_GET['id'];
    $query_slider = mysqli_query($koneksi, "SELECT * FROM slider WHERE id_slider = '$id_slider'");
    while($data_slider = mysqli_fetch_array($query_slider)) {
        $id_slider = $data_slider['id_slider'];
        $judul_slider = $data_slider['judul_slider'];
    }
}
?>
<div class="main">
    <header>
        <h3>Edit Foto Barang</h3>
    </header>
    <form action="../controller/proses_edit_slider.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <p>
                <input type="text" name="id_slider" value="<?php echo $id_slider ?>" readonly/>
            </p>
            <p>
                <input type="text" name="judul_slider" value="<?php echo $judul_slider ?>"/>
            </p>
            <p>
                <p>Pilih gambar thumbnail</p>
                <input type="file" name="thumbnail" placeholder="thumbnail"/>
            </p> 
            <div class="button-container">
                <input type="submit" value="Simpan" name="simpan" class="button"/>
                <a href="slider.php" class="button">Kembali</a>
            </div>
        </fieldset>
    </form>
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>