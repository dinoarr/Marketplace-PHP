<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fourcreate | Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
    :root {
        --warna1: #EFAC13;
    }

    .atasan1 {
        border-bottom: 2px solid var(--warna1);
    }

    /* Style untuk input dengan underline */
    .input-item input {
        border: none;
        border-bottom: 1px solid #000;
        /* warna underline */
        outline: none;
    }

    :root {
        --warna1: #EFAC13;
        --warna2: #F2C87E;
        --warna3: #FFECCF;
        --warna4: #f6f6f6;
    }

    .container {
        padding-top: 6rem;
    }

    .container:last-child {
        padding-top: 2rem;
        padding-left: 2rem;
    }

    .border {
        border: transparent;

        margin-bottom: 100px;
        padding-bottom: 100px;
    }

    .atasan,
    .atasan1 {
        color: black;
        font-size: large;
        font-weight: 600;
        text-decoration: transparent;
        margin-right: 30px;
    }

    .atasan:hover {
        border-bottom: 2px solid var(--warna1);
    }

    .atasan1:hover {
        border-bottom: 2px solid var(--warna1);
    }

    .image-box {
        position: relative;
        width: 250px;
        height: 250px;
        border: none;
        background-color: #ccc;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-box input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .image-box button {
        position: absolute;
        padding: 8px 16px;
        background-color: #fff;
        border: none;
        cursor: pointer;
    }

    input {
        width: 90%;
        border: none;
        border-bottom: 1px solid black;
        outline: none;
    }

    .button {
        background-color: var(--warna1);
        border: none;
        border-radius: 10px;
        color: white;
        padding: 8px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
        margin-top: 30px;
    }
    </style>
</head>

<body style="background-color: #f0f0f0;">
    <?php include '../layouts/navbar.php'; ?>

    <div class="container">
        <div class="border bg-white">
            <div class="container">
                <a class="atasan" href="account_info.php">Personal Info</a>
                <a class="atasan1" href="account.php">Account</a>
                <div class="row">
                    <div class="col-3">
                        <!-- Kotak input gambar -->
                        <div class="image-box my-5 mr-3" id="imageBox">
                            <img id="uploadedImage" src="#">
                            <input type="file" accept="image/*" onchange="previewImage(event)">
                            <button id="uploadButton" onclick="chooseFile()">Choose Image</button>
                        </div>
                    </div>
                    <div class="col-9 my-5">
                        <div class="row">
                            <div class="col-12 mb-3 fw-semibold">
                                <label for="Title">Change Your Account</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="username">Username</label>
                            </div>
                            <div class="col">
                                <input type="text" id="username" name="username" placeholder="Kelompok 1">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="password">Password</label>
                            </div>
                            <div class="col">
                                <input type="text" id="password" name="password" placeholder="SMKN 4 Tangerang">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2">
                                <label for="email">Email</label>
                            </div>
                            <div class="col">
                                <input type="text" id="email" name="email" placeholder="Email@Fourcreate.com">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <button type="button" href="#" class="button">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <script>
    function previewImage(event) {
        var imageBox = document.getElementById('imageBox');
        var uploadedImage = document.getElementById('uploadedImage');
        var uploadButton = document.getElementById('uploadButton');

        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            uploadedImage.src = e.target.result;
            uploadButton.style.display = 'none'; // menyembunyikan tombol setelah gambar dipilih
        }

        reader.readAsDataURL(file);
    }

    function chooseFile() {
        document.querySelector('input[type="file"]').click();
    }
    </script>
</body>


</html>