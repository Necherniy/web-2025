const file_input = document.getElementById("file_input");
const photos_block = document.getElementById("photos_block");
const description = document.getElementById("description");
const send_post_btn = document.getElementById("send_post_btn");
const left_slider = document.createElement('button');
const right_slider = document.createElement('button');
const slider_block = document.createElement('div');

const amount_block = document.createElement('div');
const current_photo = document.createElement('span');
const separator = document.createElement('span');
const total_photos = document.createElement('span');

current_photo.innerText = '1';
current_photo.classList.add("photos-amount-font");
amount_block.appendChild(current_photo);

separator.innerText = '/';
separator.classList.add("photos-amount-font");
amount_block.appendChild(separator);

total_photos.innerText = '0';
total_photos.classList.add("photos-amount-font");
amount_block.appendChild(total_photos);

amount_block.classList.add("photos-amount-block");

slider_block.appendChild(left_slider);
slider_block.appendChild(right_slider);
slider_block.classList.add("slider-button-block");
const slider_img_right = document.createElement('img');
const slider_img_left = document.createElement('img');
slider_img_right.src = "../sliderButtonRight.svg";
right_slider.classList.add("slider-button-block__button");
right_slider.appendChild(slider_img_right);
left_slider.classList.add("slider-button-block__button");
slider_img_left.src = "../sliderButtonLeft.svg";
left_slider.appendChild(slider_img_left);
left_slider.classList.add("slider-button-block__button_disabled");

let total_file_list = [];
let total_photos_counter = 0;
let photos_counter = 0;
file_input.addEventListener('change', elem => addPhotos(elem))
    
function addPhotos(elem) {
    let files = file_input.files;
    for(let i = 0; i < files.length; i++) {
        total_photos_counter++;
        if(total_photos_counter > 10) {
            break;
        }
        const file_reader = new FileReader();
        file_reader.onload = function(event) {
            total_file_list.push(files[i]);
            photos_counter++;
            if((description.value != '') && (photos_counter > 0)) {
                send_post_btn.removeAttribute("disabled");
            }
            else {
                send_post_btn.setAttribute("disabled", '');  
            }
            if(photos_counter <= 1) {
                total_photos.innerText = total_file_list.length;
                photos_block.innerHTML = '';
                photos_block.appendChild(slider_block);
                photos_block.appendChild(amount_block);
            }
            let img = document.createElement('img');
            img.src = event.target.result;
            img.id = "img" + photos_counter;
            img.classList.add("photo");
            photos_block.appendChild(img);
            img.classList.add('added-photos-width'); 
            if(photos_counter > 1) {
                img.classList.add('added-photo_disabled');
                total_photos.innerText = total_file_list.length;
            } 
        } 
        file_reader.readAsDataURL(elem.target.files[i]);
    }
}

description.addEventListener('input', elem => checkPost());    
function checkPost() {
    if((description.value != '') && (photos_counter > 0)) {
        send_post_btn.removeAttribute("disabled");
    }
    else {
        send_post_btn.setAttribute("disabled", '');  
    }
}

send_post_btn.addEventListener('click', elem => sendPost());
    
function sendPost() {
    console.log("post_description:", description.value);
    console.log(total_file_list);
}

right_slider.addEventListener('click', elem => rightSliderFunction());
left_slider.addEventListener('click', elem => leftSliderFunction());

function rightSliderFunction() {
    const photosAmount = Number(total_photos.innerText);
    const lastAmount = Number(current_photo.innerText);
    let newAmount = lastAmount;
    if(newAmount < photosAmount) {
        left_slider.classList.remove("slider-button-block__button_disabled");
        newAmount++;
    }
    else {
        right_slider.classList.add("slider-button-block__button_disabled");
    }
    current_photo.innerText = newAmount;
    let visiblePhoto = document.getElementById("img" + lastAmount);
    visiblePhoto.classList.add('added-photo_disabled');
    visiblePhoto = document.getElementById("img" + newAmount);
    visiblePhoto.classList.remove('added-photo_disabled');
}

function leftSliderFunction() {
    const photosAmount = Number(total_photos.innerText);
    const lastAmount = Number(current_photo.innerText);
    let newAmount = lastAmount;
    if(newAmount > 1) {
        right_slider.classList.remove("slider-button-block__button_disabled");
        newAmount--;
    }
    else {
        left_slider.classList.add("slider-button-block__button_disabled");
    }
    current_photo.innerText = newAmount;
    let id = "img" + lastAmount;
    let visiblePhoto = document.getElementById(id);
    visiblePhoto.classList.add('added-photo_disabled');
    id = "img" + newAmount;
    visiblePhoto = document.getElementById(id);
    visiblePhoto.classList.remove('added-photo_disabled');
}

const home_btn = document.getElementById("home_btn");

home_btn.addEventListener('click', function() {
    window.location.href = 'http://localhost:8001/home.php';
})