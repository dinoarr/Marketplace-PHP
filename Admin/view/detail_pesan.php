<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Detail</title>
</head>

<body>
    <?php 
include '../config/koneksi.php'; 
?>
    <div class="container1">
        <?php
        include '../layouts/sidebar.php';
        ?>
        <!-- Main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- Search Bar -->
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- <div class="market">
                <img src="assets/img/profile.png" alt="User">
            </div> -->
            </div>

            <!-- Card -->


            <!-- Detail -->
            <div class="details">
                <div class="recentOrder">
                    <div class="cardHeader">
                        <h2>Detail Pemesanan</h2>
                        <a href="tambah_foto.php" class="btn">Tambah Pesanan</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Id Detail</td>
                                <td>Id Pemesanan</td>
                                <td>Alamat</td>
                                <td>Waktu Pemesanan</td>
                                <td>Estimasi</td>
                                <td>Tools</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $sql = "SELECT * FROM detail_pemesanan";
                    $query = mysqli_query($koneksi, $sql);

                    while($data = mysqli_fetch_array($query)){
                        echo "<tr>";

                        echo "<td>".$data['id_dtl_pemesanan']."</td>";
                        echo "<td>".$data['id_pemesanan']."</td>";
                        echo "<td>".$data['alamat']."</td>";
                        echo "<td>".$data['waktu_pemesanan']."</td>";
                        echo "<td>".$data['est_pemesanan']."</td>";
                        echo "<td>";
                        echo "<button class='aksi-button' onclick=\"window.location.href='edit_detail.php?id=".$data['id_dtl_pemesanan']."'\">Edit</button>";
                        echo "<button class='aksi-button1' onclick=\"window.location.href='#?kode=".$data['id_dtl_pemesanan']."'\">Hapus</button>";
                        echo "</td>";
                        echo "<tr>";
                    }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>