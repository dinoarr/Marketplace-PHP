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

    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM foto_barang";
    if ($search) {
        $sql .= " WHERE id_barang LIKE '%" . mysqli_real_escape_string($koneksi, $search) . "%'";
    }
    $query = mysqli_query($koneksi, $sql);
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
                    <form method="GET" action="">
                        <label>
                            <input type="text" name="search" placeholder="Search by ID">
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </form>
                </div>
            </div>

            <!-- Detail -->
            <div class="details">
                <div class="recentOrder">
                    <div class="cardHeader">
                        <h2>Foto Barang</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Id Foto</td>
                                <td>Id Barang</td>
                                <td>File 1</td>
                                <td>File 2</td>
                                <td>File 3</td>
                                <td>File 4</td>
                                <td>Tools</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($data = mysqli_fetch_array($query)){
                                echo "<tr>";
                                echo "<td>".$data['id_foto']."</td>";
                                echo "<td>".$data['id_barang']."</td>";
                                echo "<td><img class='gambar-barang' src='data:image/jpeg;base64,".base64_encode($data['nama_file_1'])."' alt='Gambar Barang'></td>";
                                echo "<td><img class='gambar-barang' src='data:image/jpeg;base64,".base64_encode($data['nama_file_2'])."' alt='Gambar Barang'></td>";
                                echo "<td><img class='gambar-barang' src='data:image/jpeg;base64,".base64_encode($data['nama_file_3'])."' alt='Gambar Barang'></td>";
                                echo "<td><img class='gambar-barang' src='data:image/jpeg;base64,".base64_encode($data['nama_file_4'])."' alt='Gambar Barang'></td>";
                                echo "<td>";
                                echo "<button class='aksi-button' onclick=\"window.location.href='edit_foto.php?id=".$data['id_foto']."'\">Edit</button>";
                                echo "<button class='aksi-button1' onclick=\"window.location.href='#?kode=".$data['id_foto']."'\">Hapus</button>";
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