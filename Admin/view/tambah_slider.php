<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/tambah.css">
    <title>Tambah Foto Barang</title>
</head>
<body>
<div class="main">
    <header>
        <h3>Tambah Foto Barang</h3>
    </header>
    <form action="../controller/simpan_slider.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <p>
                <input type="text" name="id_slider" placeholder="Id Slider"/>
            </p>
            <p>
                <input type="text" name="judul_slider" placeholder="Judul Slider"/>
            </p>
            <p>
                <p>Pilih Gambar</p>
                <input type="file" name="thumbnail" placeholder="Gambar Barang"/>
            </p>
            <div class="button-container">
                <input type="submit" value="Simpan" name="simpan" class="button"/>
                <a href="slide.php" class="button">Kembali</a>
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