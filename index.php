<?php
 include 'config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FourCreate | Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-xl">
        <nav class="navbar navbar-expand-lg fixed-top text-dark shadow-5">
            <div class="container-fluid">
                <a class="navbar-brand mx-3" href="">
                    <img src="assets/img/logo_fourcreate.png" alt="logo" height="50" width="200">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
                    aria-controls="staticBackdrop" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item fw-bold">
                        <form class="d-flex align-items-center" role="search">
                            <input class="form-control bg-transparent border-black me-2" type="search"
                                placeholder="&#xf002; Type here to search"
                                style="font-family:League Spartan, FontAwesome; width: 700px;">
                        </form>
                    </li>
                    <li class="nav-item nava fw-bold">
                        <a class="nav-link me-2" href="#"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
                    </li>
                    <li class="nav-item nava fw-bold">
                        <a class="nav-link me-2" href="#"><i class="fa-solid fa-message fa-lg"></i></a>
                    </li>
                    <h3 class="me-2 line">|</h3>
                    <br>
                    <li class="nav-item">
                        <a class="me-2 btn btn-login" href="view/login.php" role="button">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="me-2 btn btn-regis" href="view/regis.php" role="button">Daftar</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
            aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    I will not close if you click outside of me.
                </div>
            </div>
        </div>
        <section class="slide">
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
                        <img src="./assets/img/slide.png" class="d-block w-100" alt="slide" style="object-fit: cover;">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="./assets/img/slide.png" class="d-block w-100" alt="slide" style="object-fit: cover;">
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <img src="./assets/img/slide.png" class="d-block w-100" alt="slide" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </section>
        <section class="category">
            <h3 class="mb-4">Browse by Category</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <div class="col">
                    <a href="./Pages/product_rpl.php">
                        <img src="assets/img/rpl.png" class="card-img-top rounded " alt="RPL">
                    </a>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <a href="./Pages/product_mesin.php">
                            <img src="assets/img/mesin.png" class="card-img-top rounded" alt="MESIN">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <a href="./Pages/product_sipil.php">
                            <img src="assets/img/sipil.png" class="card-img-top rounded" alt="SIPIL">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <a href="./Pages/product_listrik.php">
                            <img src="assets/img/listrik.png" class="card-img-top rounded" alt="LISTRIK">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="recommendation">
            <h3>Recommendation</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4">
                <?php
                // Query untuk mengambil data barang dan foto barang
                $query = "SELECT barang.id_barang, barang.nama_barang, barang.harga_barang, 
                foto_barang.nama_file_1, foto_barang.nama_file_2, 
                foto_barang.nama_file_3, foto_barang.nama_file_4 
                FROM barang 
                JOIN foto_barang ON barang.id_barang = foto_barang.id_barang";
                $result = mysqli_query($koneksi, $query);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        // Ambil gambar pertama (atau gambar lain jika tidak ada)
                        $gambar = $row['nama_file_1'] ? $row['nama_file_1'] : ($row['nama_file_2'] ? $row['nama_file_2'] : ($row['nama_file_3'] ? $row['nama_file_3'] : $row['nama_file_4']));

                        // Encode gambar ke base64
                        $gambarBase64 = base64_encode($gambar);

                        echo '<div class="col">';
                        echo '<a href="view/details.php?id_barang=' . urlencode($row['id_barang']).'" class="text-decoration-none">';
                        echo '<div class="card  border-0 shadow product-card">';
                        echo '<img src="data:image/jpeg;base64,'.$gambarBase64.'" class="card-img-top" alt="product" style="object-fit: cover; width: 100%; height: 200px;">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text text-dark fw-normal my-0">'.$row['nama_barang'].'</p>';
                        echo '<p class="card-text text-dark fw-bold my-0">Rp '.number_format($row['harga_barang'], 0, ',', '.').'</p>';
                        echo '<p class="card-text text-dark fw-normal"><i class="fa-solid fa-star" style="color: #FFD43B;"></i></p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center">No products found</p>';
                }
                ?>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer mt-3">
            <div class="row-r">
                <h2 class="mb-4"><img src="assets/img/logo_fourcreate.png" alt="logo" height="50" width="200"></h2>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
            </div>

            <div class="row-r">
                <ul>
                    <li><a href="#">&#xf3c5; SMKN 4 Tangerang</a></li>
                    <li><a href="#">&#xf095; 085777667680</a></li>
                    <li><a href="#">&#xf0e0; fourcreate@gmail.com</a></li>
                </ul>
            </div>

            <div class="row-r">
                FourCreate Copyright © 2024 FourCreate - All rights reserved
            </div>
        </div>
</body>
<style>
@import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');

body {
    margin: 0;
    padding: 0;
    font-family: League Spartan;
}

nav {
    background-color: #f0f0f0;
    font-family: League Spartan;
    font-weight: 400;
}

.nava:active {
    transform: translateY(1px);
}

.btn.btn-login {
    border: 1px solid #EFAC13;
    color: #EFAC13;
}

.btn.btn-login:active {
    transform: translateY(1px);
}

.btn.btn-regis:active {
    transform: translateY(1px);
}

.btn.btn-login:hover {
    border: 1px solid #F2C87E;
    color: #F2C87E;
}

.btn.btn-regis {
    border: 1px solid #EFAC13;
    color: #ffff;
    background-color: #EFAC13;
}

.btn.btn-regis:hover {
    border: 1px solid #F2C87E;
    color: #ffff;
    background-color: #F2C87E;
}

section {
    padding-top: 6rem;
}

.category {
    display: flex;
    flex-wrap: wrap;
    padding-top: 3rem;
}

.line {
    color: #EFAC13;
}

.product-card {
    height: 100%;
}

.card-container {
    width: 100%;
}

.recommendation {
    padding-top: 3rem;
}

.card-text {
    font-size: 18px;
    font-weight: 300;
}

.btn-more {
    background-color: #EFAC13;
    color: #ffff;
    padding: 12px 25px;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
}

.btn-more:hover {
    color: #ffff;
    background-color: #F2C87E;
}

.footer {
    background: #f0f0f0;
    padding: 5px 0px;
    text-align: center;
    font-family: League Spartan, FontAwesome;
}

.footer .row-r {
    width: 100%;
    margin: 1% 0%;
    padding: 0.6% 0%;
    color: #000;
    font-size: 0.9em;
}

.footer .row-r a {
    text-decoration: none;
    color: #000;
}

.footer .row-r ul {
    width: 100%;
}


.footer .row-r ul li {
    display: inline-block;
    margin: 0px 30px;
}

.footer .row-r a i {
    font-size: 2em;
    margin: 0% 1%;
}

@media (max-width:720px) {
    .footer {
        text-align: left;
        padding: 5%;
    }

    .footer .row-r ul li {
        display: block;
        margin: 10px 0px;
        text-align: left;
    }

    .footer .row-r a i {
        margin: 0% 3%;
    }
}

@media(max-width: 990px) {
    .navbar-nav {
        display: none;
    }
}

@media(max-width: 1024px) {
    form {
        width: 500px;
    }
}
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>