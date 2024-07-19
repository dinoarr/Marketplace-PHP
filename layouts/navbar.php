<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../config/connect.php';

?>

<nav class="navbar navbar-expand-lg fixed-top text-dark shadow-5">
    <div class="container-fluid">
        <a class="navbar-brand mx-3" href="../view/home.php">
            <img src="../assets/img/logo_fourcreate.png" alt="logo" height="50" width="200">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
            aria-controls="staticBackdrop" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav align-items-center">
            <li class="nav-item fw-bold">
                <form class="d-flex align-items-center" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                    role="search">
                    <input class="form-control bg-transparent border-black me-2" name="search_query" type="search"
                        placeholder="&#xf002; Type here to search"
                        style="font-family:League Spartan, FontAwesome; width: 700px;">
                </form>
            </li>
            <li class="nav-item nava fw-bold">
                <a class="nav-link me-2" href="../view/cart.php"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
            </li>
            <li class="nav-item nava fw-bold">
                <a class="nav-link me-2" href="#"><i class="fa-solid fa-message fa-lg"></i></a>
            </li>
            <h3 class="me-2 line">|</h3>
            <?php
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo '
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="btn btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                ' . htmlspecialchars($username) . '
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="../view/account_info.php">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../controller/logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                ';
            } else {
                echo '
                    <li class="nav-item">
                        <a class="me-2 btn btn-login" href="../view/login.php" role="button">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="me-2 btn btn-regis" href="../view/regis.php" role="button">Daftar</a>
                    </li>
                ';
            }
            ?>
        </ul>
    </div>
</nav>

<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
    aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel">FourCreate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            Halo
        </div>
    </div>
</div>


<style>
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

.btn-warning {
    width: 90px;
    margin-left: 20px;
    margin-right: 20px;
    color: #2b2b2b;
}
</style>