
const imagepreview = document.querySelector('.image-preview');
const input = document.querySelector('#image');
const fileNameDisplay = document.querySelector('.detail-custom__btn--span');

input.addEventListener('change',(event)=>{

    const file = event.target.files[0];

    imagepreview.src = URL.createObjectURL(file);
    imagepreview.style.display = 'block';

    fileNameDisplay.textContent = file.name;
});


const fileSelect = document.querySelector("#fileSelect");
const image = document.querySelector('#image');

fileSelect.addEventListener('click',() =>{
    
        image.click();
});


