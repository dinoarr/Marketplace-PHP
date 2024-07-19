<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/tambah.css">
    <title>Tambah Detail Pesanan</title>
</head>
<body>
<div class="main">
    <header>
        <h3>Tambah Detail Pesanan</h3>
    </header>
    <form action="#" method="post">
        <fieldset>
            <p>
                <input type="text" name="id_dtl_pemesanan" placeholder="Id Detail Pemesanan"/>
            </p>
            <p>
            <p>
                <input type="text" name="id_pemesanan" placeholder="Id Pemesanan"/>
            </p>
            <p>
                <textarea name="alamat" placeholder="Alamat"></textarea>
            </p>
            <p>
                <label for="waktu_pemesanan">Waktu Pemesanan</label>
                <input type="datetime-local" id="waktu_pemesanan" name="waktu_pemesanan">
            </p>
            <p>
                <label for="est_pemesanan">Estimasi</label>
                <input type="datetime-local" id="est_pemesanan" name="Estimasi">
            </p>
            <div class="button-container">
                <input type="submit" value="Simpan" name="simpan" class="button"/>
                <a href="detail_pesan.php" class="button">Kembali</a>
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