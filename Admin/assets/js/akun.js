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