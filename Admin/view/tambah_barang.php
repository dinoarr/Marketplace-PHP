<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/tambah.css">
</head>
<body>
    <div class="main">
        <header>
            <h3>Tambah Barang</h3>
        </header>
        <form action="../controller/proses_simpan_barang.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <p>
                <input type="text" name="id_barang" placeholder="Id Barang" required>
                </p>
                <p>
                    <select name="id_kategori" style="width: 100%;">
                        <?php
                        include '../config/koneksi.php';
                        $query = mysqli_query($koneksi, "SELECT * FROM kategori_barang");
                        while ($data = mysqli_fetch_array($query)) {
                            echo '<option value="' . $data["id_kategori"] . '">' . $data['nama_kategori'] . '</option>';
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <input type="text" name="nama_barang" placeholder="Nama Barang" required>
                </p>
                <p>
                    <input type="text" name="harga_barang" placeholder="Harga Barang" required>
                </p>
                <p>
                    <textarea name="deskripsi_barang" placeholder="Deskripsi Barang" required></textarea>
                </p>
            </fieldset>
        </div>
        <div class="main mx-5">
            <fieldset>
                <p>
                    <label for="nama_file_1">Pilih Gambar Barang 1</label>
                    <input type="file" name="nama_file_1" id="nama_file_1" accept="image/*" required>
                </p>
                <p>
                    <label for="nama_file_2">Pilih Gambar Barang 2</label>
                    <input type="file" name="nama_file_2" id="nama_file_2" accept="image/*" required>
                </p>
                <p>
                    <label for="nama_file_3">Pilih Gambar Barang 3</label>
                    <input type="file" name="nama_file_3" id="nama_file_3" accept="image/*" required>
                </p>
                <p>
                    <label for="nama_file_4">Pilih Gambar Barang 4</label>
                    <input type="file" name="nama_file_4" id="nama_file_4" accept="image/*" required>
                </p>
                <div class="button-container">
                    <input type="submit" value="Simpan" name="simpan" class="button">
                    <a href="barang.php" class="button">Kembali</a>
                </div>
            </fieldset>
        </form>
    </div>
    <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
