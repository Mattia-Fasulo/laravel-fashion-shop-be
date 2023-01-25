import './bootstrap';
import '~resources/scss/app.scss';
// import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**',
    '../fonts/**'
])

// funzione di preview dell'immagine
const previewImage = document.getElementById('cover_image');
previewImage.addEventListener('change', (event) =>{
    var oFReader = new FileReader();
    oFReader.readAsDataURL(previewImage.files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
});