<?php
 session_start();

 include '../config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPL | Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
</head>

<body>
    <?php include '../layouts/navbar.php'; ?>
    <div class="container-xl">
        <section class="slide">
            <h2 class="mb-3">
                Rekayasa Perangkat Lunak
            </h2>
            <div id="carousel" class="carousel slide rounded-4 shadow" data-bs-ride="carousel"
                style="overflow: hidden;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src=".././assets/img/rpl_banner.png" class="d-block w-100" alt="rpl_banner"
                            style="object-fit: cover;">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src=".././assets/img/rpl_banner.png" class="d-block w-100" alt="rpl_banner"
                            style="object-fit: cover;">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src=".././assets/img/rpl_banner.png" class="d-block w-100" alt="rpl_banner"
                            style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </section>
        <section class="recomendation">
            <h2>All Product From Rekayasa Perangkat Lunak</h2>
            <div class="recom-container d-flex flex-wrap">
                <?php
                $query = "SELECT barang.id_barang, barang.nama_barang, barang.harga_barang, foto_barang.nama_file_1, foto_barang.nama_file_2, foto_barang.nama_file_3, foto_barang.nama_file_4 
                          FROM barang 
                          JOIN foto_barang ON barang.id_barang = foto_barang.id_barang 
                          WHERE barang.id_kategori = (SELECT id_kategori FROM kategori_barang WHERE nama_kategori = 'Rpl')";
                $result = mysqli_query($koneksi, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $gambar = $row['nama_file_1'] ? $row['nama_file_1'] : ($row['nama_file_2'] ? $row['nama_file_2'] : ($row['nama_file_3'] ? $row['nama_file_3'] : $row['nama_file_4']));
                        $gambar = base64_encode($gambar);
                        
                        echo '<a href="../view/details.php?id_barang=' . urlencode($row['id_barang']) . '" class="text-decoration-none">';
                        echo '<div class="card mb-4 border-0 shadow product-card" style="width: 200px; ">';
                        echo '<img src="data:image/jpeg;base64,'.$gambar.'" class="card-img-top" alt="product" style="object-fit: cover; width: 100%; height: 200px;">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text text-dark fw-normal my-0">'.$row['nama_barang'].'</p>';
                        echo '<p class="card-text text-dark fw-bold my-0">Rp '.number_format($row['harga_barang'], 0, ',', '.').'</p>';
                        echo '<p class="card-text text-dark fw-normal"><i class="fa-solid fa-star" style="color: #FFD43B;"></i></p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                } else {
                    echo '<p class="text-center">No products found</p>';
                }
                ?>
            </div>
        </section>
    </div>
    <?php include '.././layouts/footer.php';
    ?>
</body>
<style>
@import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');

body {
    margin: 0;
    padding: 0;
    font-family: League Spartan;
}

h2 {
    font-size: 30px;
    font-weight: 500;

}

section {
    padding-top: 6rem;
}

.product-card {
    margin: 10px;
    height: 95%;
}

.recom-container {
    width: 100%;
    margin-top: 20px;
    gap: 4px;
}

.recomendation {
    display: flex;
    flex-wrap: wrap;
    padding-top: 3rem;
}

.card-text {
    font-size: 18px;
    font-weight: 300;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>