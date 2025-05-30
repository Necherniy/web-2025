const parentElem = document.body
const buttonElem = document.querySelectorAll('.slider-button-block__button');

buttonElem.forEach((slider) => sliderButtons(slider));

function sliderButtons(slider) {
    slider.addEventListener('click', function() {
        const sliderId = this.id;
        const slider = document.getElementById(sliderId);
        const photoStatisticId = 'amount' + sliderId.slice(-3);
        let photoStatistic = document.getElementById(photoStatisticId);
        let photoStatisticText = photoStatistic.textContent;
        let numbersSeparator = '';
        let symbolsBetweenNumbers = 0;
        let postId = sliderId.slice(sliderId.indexOf('t') + 1);
        if(photoStatisticText.includes('/')) {
            numbersSeparator = '/';
        }
        else {
            numbersSeparator = 'з';
            symbolsBetweenNumbers = 2;
        }
        const lastAmount = Number(photoStatisticText.slice(0, (photoStatisticText.indexOf(numbersSeparator) - symbolsBetweenNumbers)));
        let newAmount = lastAmount;
        if(photoStatisticText.includes('/')) {
            symbolsBetweenNumbers++;
        }
        let photosAmount = Number(photoStatisticText.slice(photoStatisticText.indexOf(numbersSeparator) + symbolsBetweenNumbers))
        if ((sliderId.includes('Right')) && (lastAmount < photosAmount)) {
            newAmount++;
            let sliderId2 = sliderId.slice(0, 6) + 'Left' + postId;
            let button2 = document.getElementById(sliderId2);
            button2.classList.remove('slider-button-block__button_disabled');
        }
        if ((sliderId.includes('Right')) && (newAmount == photosAmount)) {
            slider.classList.add('slider-button-block__button_disabled');
        }
        if ((sliderId.includes('Left')) && (lastAmount > 1)) {
            newAmount--;
            let sliderId2 = sliderId.slice(0, 6) + 'Right' + postId;
            let button2 = document.getElementById(sliderId2);
            button2.classList.remove('slider-button-block__button_disabled');
        }
        if ((sliderId.includes('Left')) && (newAmount == 1)) {
            slider.classList.add('slider-button-block__button_disabled'); 
        }
        let visiblePhotoId = 'photo' + postId + ':' + lastAmount;
        let visiblePhoto = document.getElementById(visiblePhotoId);
        visiblePhoto.classList.add('post-photo_transparent');
        visiblePhotoId = 'photo' + postId + ':' + newAmount;
        visiblePhoto = document.getElementById(visiblePhotoId);
        visiblePhoto.classList.remove('post-photo_transparent'); 
        photoStatistic.textContent = newAmount + photoStatisticText.slice(1);
    });
}

const postElem = document.querySelectorAll('.post-photo');
const modalWindow = document.createElement('div');
const cross = document.createElement('img');
let postParent;
let post;
let LastPostSibling;
let photosAmount;
let cloneOfPost;
let modalCounter = 0;
modalWindow.classList.add('modal-window');
cross.src = 'modal_window_cross.svg';
cross.classList.add('modal-window__cross');
modalWindow.appendChild(cross);
parentElem.classList.add()
postElem.forEach((elem) => addModalWindow(elem));

function addModalWindow(element) {
    element.addEventListener('click', function() {
        if (modalCounter == 0) {
            parentElem.classList.add('body_modal-window');
            let elemId = this.id;
            const postId = 'post' + elemId.slice(5, elemId.indexOf(':'));
            post = document.getElementById(postId);
            postParent = post.parentNode;
            cloneOfPost = post.cloneNode(false);
            post = document.getElementById(postId);
            post.classList.add('modal-window__post');
            LastPostSibling = post.nextElementSibling;
            parentElem.appendChild(modalWindow);
            modalWindow.appendChild(post);
            postParent.insertBefore(cloneOfPost, LastPostSibling);
            photosAmount = post.lastElementChild.lastElementChild;
            const photosAmountText = photosAmount.textContent;
            photosAmount.textContent = photosAmountText.slice(0, photosAmountText.indexOf('/')) + ' из ' + photosAmountText.slice(photosAmountText.indexOf('/') + 1);
            photosAmount.parentNode.classList.add('modal-window__photos-amount');
            modalCounter++;
        }
    })
}
cross.addEventListener('click', function(){
    parentElem.classList.remove('body_modal-window');
    post.classList.remove('modal-window__post');
    postParent.removeChild(cloneOfPost);
    const photosAmountText = photosAmount.textContent;
    photosAmount.textContent = photosAmountText.slice(0, photosAmountText.indexOf(' ')) + '/' + photosAmountText.slice(photosAmountText.indexOf('з') + 2);
    photosAmount.parentNode.classList.remove('modal-window__photos-amount');
    postParent.insertBefore(post, LastPostSibling);
    parentElem.removeChild(modalWindow);
    modalCounter = 0;
})

parentElem.addEventListener('keydown', function(event) {
    if((event.key === 'Escape') && (this.parentElement.contains(modalWindow))) {
        parentElem.classList.remove('body_modal-window');
        post.classList.remove('modal-window__post');
        postParent.removeChild(cloneOfPost);
        const photosAmountText = photosAmount.textContent;
        photosAmount.textContent = photosAmountText.slice(0, photosAmountText.indexOf(' ')) + '/' + photosAmountText.slice(photosAmountText.indexOf('з') + 2);
        photosAmount.parentNode.classList.remove('modal-window__photos-amount');
        postParent.insertBefore(post, LastPostSibling);
        parentElem.removeChild(modalWindow);
        modalCounter = 0;
    }
})

const moreBtns = document.querySelectorAll(".post-info__more-btn");
let descrSpan;
let moreBtn;
let moreBtnCounter = 0;

moreBtns.forEach((elem) => showHide(elem));

function showHide(elem) {
     elem.addEventListener('click', function() {
        if (moreBtnCounter == 0) {
            let elemId = this.id;
            moreBtn = document.getElementById(elemId);
            descrSpan = moreBtn.previousElementSibling;
            descrSpan.classList.add('more-btn_pushed'); 
            descrSpan.classList.remove('post-info__post-description');
            moreBtn.textContent = 'свернуть';
            moreBtnCounter++;
        }
        else {
            descrSpan.classList.remove('more-btn_pushed'); 
            descrSpan.classList.add('post-info__post-description');
            moreBtn.textContent = 'ещё';
            moreBtnCounter = 0;
        }
    })
}