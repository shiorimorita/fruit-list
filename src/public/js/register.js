
const imagepreview = document.querySelector('.image-preview');
const input = document.querySelector('#image');

input.addEventListener('change',(image)=>{

    imagepreview.src = URL.createObjectURL(image.target.files[0]);
    imagepreview.style.display = 'block';
});