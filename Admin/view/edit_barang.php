<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/tambah.css">
    <title>Edit Barang</title>
</head>
<body>
<?php
include '../config/koneksi.php';
if(isset($_GET['id'])) {
    $id_barang = $_GET['id'];
    $query_barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
    while($data_barang = mysqli_fetch_array($query_barang)) {
        $id_barang = $data_barang['id_barang'];
        $nama_barang = $data_barang['nama_barang'];
        $harga_barang = $data_barang['harga_barang'];
        $deskripsi_barang = $data_barang['deskripsi_barang'];
        $id_kategori_barang = $data_barang['id_kategori']; 
    }
}
?>
<div class="main">
    <header>
        <h3>Edit Barang</h3>
    </header>
    <form action="../controller/proses_edit_barang.php" method="POST">
        <fieldset>
            <p>
            <label for="id_barang">Id Barang</label>
                <input type="text" name="id_barang" value="<?php echo $id_barang ?>" readonly/>
            </p>
            <p>
            <label for="id_kategori">Id Kategori</label>
            <select name="id_kategori" style="100%;">
					<?php
					 $query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori_barang");
                    while ($data_kategori = mysqli_fetch_array($query_kategori)) {
                        $selected = ($id_kategori_barang == $data_kategori['id_kategori']) ? 'selected' : '';
                    ?>
                        <option value="<?php echo $data_kategori["id_kategori"]; ?>" <?php echo $selected; ?>><?php echo $data_kategori['nama_kategori']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </p>
            <p>
            <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" value="<?php echo $nama_barang ?>">
            </p>
            <p>
            <label for="harga_barang">Harga Barang</label>
                <input type="text" name="harga_barang" value="<?php echo $harga_barang ?>">
            </p>
            <p>
            <label for="deskripsi_barang">Deskripsi Barang</label>
                <textarea name="deskripsi_barang" ><?php echo $deskripsi_barang ?></textarea>
            </p>
            <div class="button-container">
                <input type="submit" value="Simpan" name="simpan" class="button"/>
                <a href="barang.php" class="button">Kembali</a>
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