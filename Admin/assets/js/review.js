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
      }, speedAnimation * (i + 1)); // Menunggu sampai animasi sebelumnya selesai sebelum mengubah ikon
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
    }, speedAnimation * (index + 2)); // Menunggu sampai semua animasi selesai sebelum menghapus kelas

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
