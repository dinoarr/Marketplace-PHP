<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/barang.css">
    <title>Barang</title>
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
                    <form action="barang.php" method="GET" class="search-form">
                        <label>
                            <input type="text" name="search_query" placeholder="Search">
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>
            </div>

            <!-- Card -->
            <div class="cardBox">
                <?php
    $icons = array(
        "RPL" => "laptop-outline",
        "SIPIL" => "home-outline",
        "LISTRIK" => "flash-outline",
        "MESIN" => "cog-outline"
    );

    // Query untuk mengambil jumlah barang untuk setiap kategori
    $sql = "SELECT id_kategori, COUNT(id_barang) as total FROM barang GROUP BY id_kategori";
    $query = mysqli_query($koneksi, $sql);

    // Loop melalui hasil query
    while($data = mysqli_fetch_array($query)){
        // Memeriksa apakah kategori ada dalam array ikon
        if(array_key_exists($data['id_kategori'], $icons)){
            echo "<div class='card'>";
            echo "<div>";
            echo "<div class='numbers'>".$data['total']."</div>";
            echo "<div class='cardName'>".$data['id_kategori']."</div>";
            echo "</div>";
            // Menggunakan ikon sesuai dengan kategori
            echo "<div class='iconBox'><ion-icon name='".$icons[$data['id_kategori']]."'></ion-icon></div>";
            echo "</div>";
        }
    }
    ?>
            </div>


            <!-- Detail -->
            <div class="details">
                <div class="recentOrder">
                    <div class="cardHeader">
                        <h2>Detail Barang</h2>
                        <a href="tambah_barang.php" class="btn">Tambah Barang</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Id Barang</td>
                                <td>Id Kategori</td>
                                <td>Nama Barang</td>
                                <td>Harga Barang</td>
                                <td>Stok</td>
                                <td>Deskripsi Barang</td>
                                <td>Tools</td>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            <?php
                    // Query untuk mengambil data barang
                    $sql = "SELECT * FROM barang";

                    // Periksa apakah ada input pencarian
                    if(isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                        $search_query = $_GET['search_query'];
                        // Tambahkan kondisi pencarian berdasarkan ID kategori atau nama barang
                        $sql .= " WHERE id_kategori LIKE '%$search_query%' OR nama_barang LIKE '%$search_query%' OR id_barang LIKE '%$search_query%'";
                    }

                    $query = mysqli_query($koneksi, $sql);

                    // Tampilkan hasil query
                    while($data = mysqli_fetch_array($query)){
                        echo "<tr>";

                        echo "<td>".$data['id_barang']."</td>";
                        echo "<td>".$data['id_kategori']."</td>";
                        echo "<td>".$data['nama_barang']."</td>";
                        echo "<td>Rp. ".number_format($data['harga_barang'], 0, ',', '.').",00</td>";
                        echo "<td>".$data['stok']."</td>";
                        echo "<td>".$data['deskripsi_barang']."</td>";
                        echo "<td>";
                        echo "<button class='aksi-button' onclick=\"window.location.href='edit_barang.php?id=".$data['id_barang']."'\">Edit</button>";
                        echo "<button class='aksi-button1' onclick=\"window.location.href='../controller/hapus_barang.php?kode=".$data['id_barang']."'\">Hapus</button>";
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