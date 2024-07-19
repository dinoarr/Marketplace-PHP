<?php
include 'config/koneksi.php'; 
$sql = "SELECT * from barang";
$query_barang = mysqli_query($koneksi, $sql);

$sql = "SELECT * from kategori_barang";
$query_kat = mysqli_query($koneksi, $sql);

$sql = "SELECT * from foto_barang";
$query_foto = mysqli_query($koneksi, $sql);

$sql = "SELECT * from detail_pemesanan";
$query_pesan = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container1">
        <div class="nav">
            <ul>
                <li>
                    <a href="#">
                        <img src="assets/img/logo_fourcreate.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="view/barang.php">
                        <span class="icon">
                            <ion-icon name="cube-outline"></ion-icon>
                        </span>
                        <span class="title">Barang</span>
                    </a>
                </li>
                <li>
                    <a href="view/foto_barang.php">
                        <span class="icon">
                            <ion-icon name="images-outline"></ion-icon>
                        </span>
                        <span class="title">Foto Barang</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="slider.php">
                        <span class="icon">
                            <ion-icon name="image-outline"></ion-icon>
                        </span>
                        <span class="title">Slider</span>
                    </a>
                </li> -->
                <li>
                    <a href="view/detail_pesan.php">
                        <span class="icon">
                            <ion-icon name="document-attach-outline"></ion-icon>
                        </span>
                        <span class="title">Detail Pesan</span>
                    </a>
                </li>
                <li>
                    <a href="../controller/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
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
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo mysqli_num_rows($query_barang) ?></div>
                        <div class="cardName">Barang</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo mysqli_num_rows($query_kat) ?></div>
                        <div class="cardName">Kategori</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo mysqli_num_rows($query_foto)?></div>
                        <div class="cardName">Foto Barang</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo mysqli_num_rows($query_pesan)?></div>
                        <div class="cardName">Pesanan</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- Detail -->
            <div class="details">
                <div class="recentOrder">
                    <div class="cardHeader">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>