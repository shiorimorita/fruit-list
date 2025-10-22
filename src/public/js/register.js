
const imagepreview = document.querySelector('.image-preview');
const input = document.querySelector('#image');
const fileNameDisplay = document.querySelector('.detail-custom__btn--span');

/* ユーザーがファイルを選択するとプレビュー表示する */
input?.addEventListener('change', (event) => {

    const file = event.target.files[0];
    if (file) {
        imagepreview.src = URL.createObjectURL(file);
        imagepreview.style.display = 'block';
        fileNameDisplay.textContent = file.name;
    }
});


/* カスタムファイル選択 */
const fileSelect = document.querySelector("#fileSelect");
const image = document.querySelector('#image');

fileSelect?.addEventListener('click', () => {

    image?.click();
});



// /* プルダウン選ばれたら黒に戻す */

// const select = document.querySelector('.product-function__select');

// select.addEventListener('change',()=>{

//     console.log(select);
// });