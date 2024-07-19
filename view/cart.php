<?php
include '../config/connect.php';

session_start();

$cart_items = [];
if (isset($_SESSION['cart'])) {
    $cart_items = $_SESSION['cart'];
}

$product_ids = array_keys($cart_items);
if (count($product_ids) > 0) {
    // Menyiapkan placeholder untuk id barang
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));

    // Menyiapkan statement SQL
    $query = "SELECT barang.id_barang, barang.nama_barang, barang.harga_barang, foto_barang.nama_file_1 
              FROM barang 
              JOIN foto_barang ON barang.id_barang = foto_barang.id_barang 
              WHERE barang.id_barang IN ($placeholders)";

    // Menyiapkan statement prepared
    $stmt = mysqli_prepare($koneksi, $query);

    // Mengikat parameter
    $types = str_repeat('s', count($product_ids)); // Merepresentasikan semua nilai sebagai string
    mysqli_stmt_bind_param($stmt, $types, ...$product_ids);

    // Mengeksekusi statement
    mysqli_stmt_execute($stmt);

    // Mendapatkan hasil query
    $result = mysqli_stmt_get_result($stmt);

    // Mengambil hasil sebagai array asosiatif
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $products = [];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FourCreate | Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <style>
    .container-xl {
        padding-top: 6rem;
    }

    .cart {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px;
        border: 1px solid #dedede;
        border-radius: 5px;
    }

    .cart img {
        width: 100px;
        height: auto;
        margin-right: 20px;
    }

    .product-info {
        display: flex;
        flex-direction: column;
    }

    .name {
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 5px;
        display: inline;
    }

    .text-grey {
        color: #a39f9f;
        font-size: 15px;
    }

    .quantity-wrap {
        display: flex;
        flex-direction: row;
        align-items: flex-end;
        margin-bottom: 5px;
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

    .element {
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
        margin-top: auto;
        margin-left: auto;
    }

    .element>* {
        margin-left: 25px;
    }

    .col-md-4 {
        position: fixed;
        right: 15px;
    }

    .btn.btn-checkout {
        border: 1px solid #EFAC13;
        color: #ffff;
        background-color: #EFAC13;
    }

    .btn.btn-checkout:hover {
        border: 1px solid #F2C87E;
        color: #ffff;
        background-color: #F2C87E;
    }

    .btn.btn-checkout:active {
        transform: translateY(1px);
    }
    </style>
</head>

<body>
    <?php include '../layouts/navbar.php'; ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 mt-3 p-3 shadow rounded-3">
                    <h3>Cart <span class="mx-4 fs-5 fw-normal">(<?= count($products) ?> Product)</span></h3>
                    <h5 class="mt-3 mx-2"><input type="checkbox" name="" id="" class="me-3">Select All</h5>
                    <?php foreach ($products as $product): ?>
                    <div class="cart mt-3">
                        <h5><input type="checkbox"></h5>
                        <img class="rounded-1 mx-2"
                            src="data:image/jpeg;base64,<?= base64_encode($product['nama_file_1']) ?>" alt="">
                        <div class="product-info">
                            <div class="name"><?= $product['nama_barang'] ?></div>
                        </div>
                        <div class="element">
                            <div class="quantity-wrap">
                                <button class="decrement-btn">-</button>
                                <input type="text" class="quantity-input"
                                    value="<?= $cart_items[$product['id_barang']] ?>" disabled>
                                <button class="increment-btn">+</button>
                            </div>
                            <div class="price">
                                <h5 class="fs-5">Rp
                                    <?= number_format($product['harga_barang'] * $cart_items[$product['id_barang']], 0, ',', '.') ?>
                                </h5>
                            </div>
                            <div class="icon"><a href="remove_from_cart.php?id_barang=<?= $product['id_barang'] ?>"><i
                                        class="fa fa-trash mb-2 fs-5 text-danger"></i></a></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 mt-3 p-3 shadow rounded-3">
                    <h3>Summary</h3>
                    <?php 
                    $total = 0;
                    foreach ($products as $product) {
                        $total += $product['harga_barang'] * $cart_items[$product['id_barang']];
                    }
                    ?>
                    <h5 class="mt-4 d-flex justify-content-between">Total <span>Rp
                            <?= number_format($total, 0, ',', '.') ?></span></h5>
                    <a href="checkout.php" class="btn btn-checkout" role="button">Checkout</a>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const decrementBtn = document.querySelectorAll('.decrement-btn');
            const incrementBtn = document.querySelectorAll('.increment-btn');
            const quantityInput = document.querySelectorAll('.quantity-input');

            decrementBtn.forEach((btn, index) => {
                btn.addEventListener('click', function() {
                    const currentValue = parseInt(quantityInput[index].value);
                    if (currentValue > 1) {
                        quantityInput[index].value = currentValue - 1;
                    }
                });
            });

            incrementBtn.forEach((btn, index) => {
                btn.addEventListener('click', function() {
                    const currentValue = parseInt(quantityInput[index].value);
                    quantityInput[index].value = currentValue + 1;
                });
            });
        });
        </script>
</body>

</html>