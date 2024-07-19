<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/foto.css">
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
                    <label>
                        <input type="text" placeholder="Search">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
            </div>

            <!-- Detail -->
            <div class="details">
                <div class="recentOrder">
                    <div class="cardHeader">
                        <h2>Slider</h2>
                        <a href="tambah_slider.php" class="btn">Tambah Slider</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Id Slider</td>
                                <td>Judul slider</td>
                                <td>Thumbnail</td>
                                <td>Tools</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $sql = "SELECT * FROM slider";
                    $query = mysqli_query($koneksi, $sql);

                    while($data = mysqli_fetch_array($query)){
                        echo "<tr>";

                        echo "<td>".$data['id_slider']."</td>";
                        echo "<td>".$data['judul_slider']."</td>";
                        echo "<td><img class='thumbnail' src='data:image/jpeg;base64,".base64_encode($data['thumbnail'])."'></td>";
                        echo "<td>";
                        echo "<button class='aksi-button' onclick=\"window.location.href='edit_slider.php?id=".$data['id_slider']."'\">Edit</button>";
                        echo "<button class='aksi-button1' onclick=\"window.location.href='../controller/hapus_slider.php?kode=".$data['id_slider']."'\">Hapus</button>";
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