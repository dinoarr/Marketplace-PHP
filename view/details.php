<?php
include '../config/connect.php';
session_start(); // Pastikan sesi dimulai

if (isset($_GET['id_barang'])) {
    $id_barang = filter_input(INPUT_GET, 'id_barang', FILTER_SANITIZE_STRING);

    if ($id_barang === null || $id_barang === false) {
        echo "Invalid product ID.";
        exit;
    }

    $query = "SELECT barang.id_barang, barang.nama_barang, barang.harga_barang, barang.deskripsi_barang, 
              foto_barang.nama_file_1, foto_barang.nama_file_2, foto_barang.nama_file_3, foto_barang.nama_file_4 
              FROM barang 
              JOIN foto_barang ON barang.id_barang = foto_barang.id_barang 
              WHERE barang.id_barang = '$id_barang'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        $gambar = $product['nama_file_1'] ? $product['nama_file_1'] : ($product['nama_file_2'] ? $product['nama_file_2'] : ($product['nama_file_3'] ? $product['nama_file_3'] : $product['nama_file_4']));
        $gambar = base64_encode($gambar);
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "No product ID specified.";
    exit;
}

if (isset($_POST['quantity'])) {
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1]
    ]);

    if ($quantity === false) {
        echo "Invalid quantity.";
        exit;
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id_barang])) {
        $_SESSION['cart'][$id_barang] += $quantity;
    } else {
        $_SESSION['cart'][$id_barang] = $quantity;
    }

    header('Location: cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FourCreate | Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
</head>

<body>
    <?php include '../layouts/navbar.php'; ?>
    <div class="container-xl">
        <section class="product">
            <h2>Detail Products</h2>
            <div class="card border-0 shadow p-1">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="data:image/jpeg;base64,<?= $gambar ?>" class="img-fluid-1 rounded mb-3 slide"
                                    alt="Product Image">
                                <div class="item d-flex justify-content-between">
                                    <?php if ($product['nama_file_1']) { ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($product['nama_file_1']) ?>"
                                        class="img-fluid rounded" alt="foto1" height="50" width="100"
                                        onclick="img('data:image/jpeg;base64,<?= base64_encode($product['nama_file_1']) ?>')">
                                    <?php } ?>
                                    <?php if ($product['nama_file_2']) { ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($product['nama_file_2']) ?>"
                                        class="img-fluid rounded" alt="foto2" height="50" width="100"
                                        onclick="img('data:image/jpeg;base64,<?= base64_encode($product['nama_file_2']) ?>')">
                                    <?php } ?>
                                    <?php if ($product['nama_file_3']) { ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($product['nama_file_3']) ?>"
                                        class="img-fluid rounded" alt="foto3" height="50" width="100"
                                        onclick="img('data:image/jpeg;base64,<?= base64_encode($product['nama_file_3']) ?>')">
                                    <?php } ?>
                                    <?php if ($product['nama_file_4']) { ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($product['nama_file_4']) ?>"
                                        class="img-fluid rounded" alt="foto4" height="50" width="100"
                                        onclick="img('data:image/jpeg;base64,<?= base64_encode($product['nama_file_4']) ?>')">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="name"><?= $product['nama_barang'] ?></h3>
                                        <div class="rate">
                                            <span><i class="fa-solid fa-star" style="color: #FFD43B;"></i> 5.0 |</span>
                                            <span>200 Sold |</span>
                                            <span>102 Rating</span>
                                        </div>
                                        <div class="price mt-4">
                                            <h1>Rp <?= number_format($product['harga_barang'], 0, ',', '.') ?></h1>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <form method="POST" action="">
                                            <div class="qty mb-3 mt-3">
                                                <h4>Quantity</h4>
                                                <div class="quantity-wrap">
                                                    <button type="button" class="decrement-btn">-</button>
                                                    <input type="text" name="quantity" class="quantity-input" value="1">
                                                    <button type="button" class="increment-btn">+</button>
                                                </div>
                                            </div>
                                            <div class="button text-start">
                                                <button type="submit" class="me-2 btn btn-cart">Add to Cart</button>
                                                <button type="button" class="me-2 btn btn-buy">Buy Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <h3 class="mt-3 rev">Product Description</h3>
                                <p><?= $product['deskripsi_barang'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="detail">
            <div class="row">
                <div class="col-md-12">
                    <div class="desc">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <div class="card p-3 items border-0">
                                    <h3 class="rev">Product Review</h3>
                                    <p>
                                    <div class="product-review">
                                        <a href="" class="text-decoration-none">
                                            <div class="star-wrap">
                                                <p class="card-text text-dark fw-normal">5<i class="fa-solid fa-star"
                                                        style="color:#ffc800;"></i></p>
                                            </div>
                                        </a>
                                        <a href="" class="text-decoration-none">
                                            <div class="star-wrap">
                                                <p class="card-text text-dark fw-normal">4<i class="fa-solid fa-star"
                                                        style="color:#ffc800;"></i></p>
                                            </div>
                                        </a>
                                        <a href="" class="text-decoration-none">
                                            <div class="star-wrap">
                                                <p class="card-text text-dark fw-normal">3<i class="fa-solid fa-star"
                                                        style="color:#ffc800;"></i></p>
                                            </div>
                                        </a>
                                        <a href="" class="text-decoration-none">
                                            <div class="star-wrap">
                                                <p class="card-text text-dark fw-normal">2<i class="fa-solid fa-star"
                                                        style="color:#ffc800;"></i></p>
                                            </div>
                                        </a>
                                        <a href="" class="text-decoration-none">
                                            <div class="star-wrap">
                                                <p class="card-text text-dark fw-normal">1<i class="fa-solid fa-star"
                                                        style="color:#ffc800;"></i></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <p class="review-body">
                                    Nullam leo mauris, vehicula id sapien vitae, pharetra viverra tellus. Sed nec tortor
                                    pretium, malesuada enim in, efficitur tortor.
                                </p>
                            </div>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
        </section>
        <section class="recomendation">
            <h3>More like that</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 g-4">
                <?php
                $query = "SELECT barang.id_barang, barang.nama_barang, barang.harga_barang, 
                foto_barang.nama_file_1, foto_barang.nama_file_2, 
                foto_barang.nama_file_3, foto_barang.nama_file_4 
                FROM barang 
                JOIN foto_barang ON barang.id_barang = foto_barang.id_barang";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $gambar = $row['nama_file_1'] ? $row['nama_file_1'] : ($row['nama_file_2'] ? $row['nama_file_2'] : ($row['nama_file_3'] ? $row['nama_file_3'] : $row['nama_file_4']));
                        $gambar = base64_encode($gambar);

                        echo '<div class="col">';
                        echo '<a href="details.php?id_barang=' . urlencode($row['id_barang']) . '" class="text-decoration-none">';
                        echo '<div class="card mb-4 border-0 shadow product-card">';
                        echo '<img src="data:image/jpeg;base64,' . $gambar . '" class="card-img-top" alt="product" style="object-fit: cover; width: 100%; height: 200px;">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text text-dark fw-normal my-0">' . $row['nama_barang'] . '</p>';
                        echo '<p class="card-text text-dark fw-bold my-0">Rp ' . number_format($row['harga_barang'], 0, ',', '.') . '</p>';
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
    <?php include '../layouts/footer.php'; ?>
</body>
<style>
@import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');

body {
    margin: 0;
    padding: 0;
    font-family: League Spartan;
}

section {
    padding-top: 6rem;
}

.rate {
    font-weight: 300;
    font-size: 22px;
}

.price h1 {
    font-weight: 600;
    font-size: 40px;
}

.name {
    font-weight: 600;
    font-size: 32px;
}

.d-flex {
    display: flex;
}

.align-items-center {
    align-items: center;
}

.img-fluid {
    height: 75px;
    width: 76px;
    object-fit: cover;
}

.img-fluid-1 {
    height: 270px;
    width: 335px;
    object-fit: cover;
}

.flex-grow-1 {
    flex-grow: 1;
}

.button .btn {
    margin-top: 10px;
}

.qty {
    margin-top: 20px;
}


h2,
.recomendation h3 {
    font-weight: 400;
    font-size: 35px;
}

h4 {
    font-weight: 300;
    font-size: 24px;
}

.detail {
    padding-top: 3rem;
}

.slide {
    transition: opacity 0.4s ease-in-out;
}

.btn-varian {
    background-color: transparent;
    border: 1px solid #000;
    border-radius: 5px;
    color: #000;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    margin: 5px;
    font-size: 17px;
    font-weight: 300;
}

.btn-varian:active {
    border: 1px solid #FFD43B;
    color: #FFD43B;
}

.qty {
    display: flex;
    align-items: center;
}

.qty h4 {
    margin-right: 10px;
}

.quantity-wrap {
    display: flex;
    align-items: center;
    border: 1px solid black;
    width: 100px;
    border-radius: 5px;
}

.quantity-input {
    width: 30px;
    border: 0;
    text-align: center;
    color: #FFD43B;
    font-size: 20px;
}

.decrement-btn,
.increment-btn {
    width: 30px;
    height: 30px;
    cursor: pointer;
    border: 0px;
    margin: 2px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    background-color: transparent;
    border-radius: 3px;
}

.decrement-btn:hover,
.increment-btn:hover {
    background-color: #e0e0e0;
}

.btn.btn-cart {
    border: 1px solid #FFD43B;
    color: #FFD43B;
    background-color: transparent;
    font-size: 20px;
    font-weight: 400;
}

.btn.btn-cart:active {
    transform: translateY(1px);
}

.btn.btn-cart:hover {
    border: 1px solid #FFD43B;
    color: #FFD43B;
}

.btn.btn-buy {
    border: 1px solid #EFAC13;
    color: #FFFFFF;
    background-color: #EFAC13;
    font-size: 20px;
    font-weight: 400;
}

.btn.btn-buy:active {
    transform: translateY(1px);
}

.btn.btn-buy:hover {
    border: 1px solid #EFAC13;
    color: #FFFFFF;
    background-color: #EFAC13;
}

.detail h3 .rev {
    font-size: 20px;
    font-weight: 500;
}

p {
    font-weight: 300;
    font-size: 16px;
}

.product-review {
    display: inline-flex;
    gap: 10px;
}

.card .items {
    background-color: #f8e1b9;
}

.star-wrap {
    display: flex;
    align-items: center;
    border: 1px solid black;
    width: 38px;
    height: 38px;
    border-radius: 5px;
    justify-content: center;
}

.card-container {
    width: 100%;
}

.product-card {
    height: 95%;
}

.card-text {
    font-size: 18px;
    font-weight: 300;
}

.product-description h4 {
    font-size: 24px;
    font-weight: 500;
}
</style>
<script>
//fungsi gambar
function img(anything) {
    const slide = document.querySelector('.slide');
    slide.style.opacity = '0';
    setTimeout(function() {
        slide.src = anything;
        slide.style.opacity = '1';
    }, 150);
}

function change(change) {
    const line = document.querySelector('.home');
    line.style.background = change;
}
//end

//fungsi tambah kurang
document.addEventListener('DOMContentLoaded', function() {
    const decrementBtn = document.querySelector('.decrement-btn');
    const incrementBtn = document.querySelector('.increment-btn');
    const quantityInput = document.querySelector('.quantity-input');

    decrementBtn.addEventListener('click', function() {
        const currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });

    incrementBtn.addEventListener('click', function() {
        const currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    });
});
//end
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>