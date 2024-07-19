<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/tambah.css">
    <title>Edit detail</title>
</head>
<body>
<?php
include '../config/koneksi.php';
if(isset($_GET['id'])) {
    $id_detail_pemesanan = $_GET['id'];
    $query_detail_pemesanan = mysqli_query($koneksi, "SELECT * FROM detail_pemesanan WHERE id_dtl_pemesanan = '$id_dtl_pemesanan'");
    while($data_detail_pemesanan = mysqli_fetch_array($query_detail_pemesanan)) {
        $id_dtl_pemesanan = $data_detail_pemesanan['id_dtl_pemesanan'];
        $id_pemesanan = $data_detail_pemesanan['id_pemesanan'];
        $alamat = $data_detail_pemesanan['alamat'];
        $waktu_pemesanan = $data_detail_pemesanan['waktu_pemesanan'];
        $est_pemesanan = $data_detail_pemesanan['id_kategori']; 
    }
}
?>
<div class="main">
    <header>
        <h3>Edit Detail Pemesanan</h3>
    </header>
    <form action="#" method="post">
        <fieldset>
            <p>
            <label for="id_dtl_pemesanan">Id Detail</label>
                <input type="text" name="id_barang" value="<?php echo $data['id_barang'] ?>" readonly/>
            </p>
            <p>
            <select name="id_pemesanan" style="100%;">
					<?php
					$query = mysqli_query($koneksi, "SELECT * FROM kategori_barang");
					while ($data = mysqli_fetch_array($query)) {
					?>
						<option value="<?=$data["id_kategori"]; ?>"><?php echo $data['nama_kategori']; ?></option>
					<?php
					}
					?>
				</select>
            </p>
            <p>
                <textarea name="alamat" placeholder="Alamat"></textarea>
            </p>
            <p>
                <label for="waktu_pemesanan">Waktu Pemesanan</label>
                <input type="datetime-local" name="waktu_pemesanan" placeholder="Nama Barang"/>
            </p>
            <p>
                <label for="est_pemesanan">Estimasi</label>
                <input type="datetime-local" name="est_pemesanan" placeholder="estimasi"/>
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