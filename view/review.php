<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Result</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
    .rating {
        font-size: 24px;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="border bg-white p-5">
            <h1 class="mb-4">Review Result</h1>
            <div class="rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star-half"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
            </div>

            <!-- Menampilkan hasil review -->
            <div class="mt-4">
                <h3>Review Details</h3>
                <!-- Isi dengan detail review sesuai dengan kebutuhan -->
                <p>Total reviews: 100</p>
                <p>Total stars: 350</p>
                <p>Average rating: 3.5</p>
            </div>
        </div>
    </div>
    <style>
    :root {
        --warna1: #EFAC13;
        --warna2: #F2C87E;
        --warna3: #FFECCF;
        --warna4: #f6f6f6;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: var(--warna4);
    }

    .border {
        border: transparent;

    }

    .main {
        background-color: var(--warna2);
        padding: 20px;
        width: 600px;
        border-radius: 10px;
        box-shadow: 0px 7px 25px rgba(0, 0, 0, 0.1);
    }

    .reviewtext {
        display: block;
        width: 100%;
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

    .star {
        font-size: 2rem;
        color: var(--warna1);
        transition: transform 0.2s ease-in-out;
    }

    .star.clicked {
        transform: scale(1.2);
        /* Mengubah skala ikon menjadi lebih besar saat ditekan */
    }
    </style>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
    const stars = document.querySelectorAll('.star');
    const submitBtn = document.getElementById('submit');
    const speedAnimation = 70; // Atur kecepatan animasi (dalam milidetik)

    // Tambahkan event listener untuk setiap ikon bintang
    stars.forEach((star, index) => {
        star.addEventListener('click', function() {
            // Atur semua ikon menjadi star-outline terlebih dahulu
            stars.forEach((s, i) => {
                s.setAttribute('name', 'star-outline');
            });

            // Tambahkan animasi secara berurutan untuk setiap bintang yang dipilih
            for (let i = 0; i <= index; i++) {
                setTimeout(() => {
                    stars[i].classList.add('clicked');
                }, speedAnimation * i);
            }

            // Atur ikon menjadi star atau star-outline sesuai dengan yang ditekan
            for (let i = 0; i <= index; i++) {
                setTimeout(() => {
                    stars[i].setAttribute('name', 'star');
                }, speedAnimation * (i +
                    1)); // Menunggu sampai animasi sebelumnya selesai sebelum mengubah ikon
            }

            // Validasi bintang harus terisi sebelum mengirim
            if (index > 0) {
                submitBtn.removeAttribute('disabled');
            } else {
                submitBtn.setAttribute('disabled', true);
            }

            // Hapus kelas 'clicked' setelah animasi selesai
            setTimeout(() => {
                stars.forEach((s, i) => {
                    s.classList.remove('clicked');
                });
            }, speedAnimation * (index +
                2)); // Menunggu sampai semua animasi selesai sebelum menghapus kelas

            // Set nilai ratingValue sesuai dengan jumlah bintang yang dipilih
            const ratingValue = index + 1;

            // Simpan nilai rating ke dalam database
            // Gantilah bagian ini dengan kode untuk menyimpan nilai rating ke dalam database sesuai dengan preferensi Anda
            saveRatingToDatabase(ratingValue);
        });
    });

    // Fungsi untuk menyimpan nilai rating ke dalam database
    function saveRatingToDatabase(rating) {
        // Di sini Anda bisa menambahkan logika untuk menyimpan nilai rating ke dalam database
        // Misalnya, menggunakan AJAX request untuk mengirim data ke server
        console.log('Rating saved to database:', rating);
    }
    </script>
</body>

</html>