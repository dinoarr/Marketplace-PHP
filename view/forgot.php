<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FourCreate | Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="header position-absolute top-0 start-50 translate-middle-x mt-3">
        <img src="../assets/img/logo_fourcreate.png" alt="logo" height="50" width="200">
    </div>
    <div class="container-xl">
        <div class="row justify-content-center align-items-center">
            <div class="left col-md-6  justify-content-center align-items-center">
                <h2 class="card-title mt-5 text-black">Welcome To</h2>
                <h2 class="card-title text-white mt-1 mb-4">FourCreate</h2>
                <p class="card-text">Get started today! Register your account and begin shopping
                </p>
                <img src="../assets/img/plane.png" alt="Plane" class="plane-img">
            </div>
            <div class="right col-md-6 justify-content-center align-items-center">
                <div class="content">
                    <h2 class="card-title crd mt-5 text-black text-center mb-5">RESET YOUR ACCOUNT</h2>
                    <form action="../controller/cek_login.php" method="post">
                        <div class="mb-2">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control form-control-lg" id="username" placeholder="Username"
                                name="username">
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password"
                                placeholder="Password" name="password">
                            <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"
                                style="position: absolute; right: 10px; top: 60%; transform: translateY(5%); cursor: pointer;"></span>
                        </div>

                        <button type="submit" class="btn btn-regis w-100 rounded-3 mb-3" 4>RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
@import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');

body {
    font-family: Open Sans;
    margin: 0;
    padding: 0;
    background: url(../assets/img/bg-r.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-size: 100% 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.left {
    background-color: #F2C87E;
    position: relative;
}

.col-md-6 {
    height: 520px;
    width: 420px;
}

.right {
    background-color: #fff;
    color: #000;
}

.card-title {
    font-weight: 800;
    font-size: 43px;
}

.card-text {
    color: #787878;
    font-size: 20px;
    font-weight: 800;
}

.crd {
    font-weight: 800;
    font-size: 22px;
}

.plane-img {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-58%);
    height: 250px;
    width: auto;
}

.text {
    font-weight: 600;
    font-size: 14px;
}

a {
    text-decoration: none;
    color: #FFB304;
}

.text-or {
    font-weight: 400;
    font-size: 12px;
    color: #787878;
}

.content {
    margin: 15px;
}

.form-label {
    font-weight: 600;
    font-size: 13px;
}

::placeholder {
    font-family: League Spartan;
    font-weight: 400;
    font-size: 17px;
    color: #787878;
    align-items: center;
}

.btn.btn-regis {
    border: 1px solid #F2C87E;
    color: #8c8c8c;
    background-color: #F2C87E;
    padding: 10px;
    font-weight: 800;
}

.btn.btn-regis:hover {
    border: 1px solid #F2C87E;
    color: #8c8c8c;
    background-color: #F2C87E;
}
</style>
<script>
document.querySelector('.toggle-password').addEventListener('click', function() {
    const passwordInput = document.querySelector(this.getAttribute('toggle'));
    this.classList.toggle('fa-eye-slash');
    this.classList.toggle('fa-eye');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>