<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/tambah.css">
    <title>Edit Foto Barang</title>
</head>
<body>
<div class="main">
    <header>
        <h3>Edit Foto Barang</h3>
    </header>
    <form action="../controller/proses_foto_barang.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <select name="id_barang" style="100%;">
					<?php
					include '../config/koneksi.php';
					$query = mysqli_query($koneksi, "SELECT * FROM barang");
					while ($data = mysqli_fetch_array($query)) {
					?>
						<option value="<?=$data["id_barang"]; ?>"><?php echo $data['nama_barang']; ?></option>
					<?php
					}
					?>
				</select>
            <p>
                <p>Pilih Gambar Barang</p>
                <input type="file" name="nama_file_1" placeholder="Gambar Barang"/>
                <input type="file" name="nama_file_2" placeholder="Gambar Barang"/>
                <input type="file" name="nama_file_3" placeholder="Gambar Barang"/>
                <input type="file" name="nama_file_4" placeholder="Gambar Barang"/>
            </p>
            <div class="button-container">
                <input type="submit" value="Simpan" name="simpan" class="button"/>
                <a href="foto_barang.php" class="button">Kembali</a>
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