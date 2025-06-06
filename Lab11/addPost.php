<!DOCTYPE html>
<html lang="ru">
<head>
    <script src="scripts/add_post.js" defer></script>
    <meta charset="UTF-8">
    <title>Добавить пост</title>
    <link href="Styles/add_post.css" rel="stylesheet">
</head>
<body>
    <div class="icons-block">
        <button id="home_btn" class="icons-block__icons"><img src="house_icon.png" alt="House_icon"></button>  
        <button class="icons-block__icons"><img src="profile_icon.svg" alt="Porfile_icon"></button>
        <button id="plus_btn" class="icons-block__icons icons-block__icons_home-icon-margin"><img src="plus_icon.png" alt="Plus_icon"></button>
        <img class="buttons-block__dot" src="under_dot.png" alt="Under_dot">
    </div>
    <div class="main-block">
            <div id="photos_block" class="add-photo-block">
                <div class="add-photo-block__photo">
                    <img src="addPostPhoto.jpg">
                    <label for="file_input" class="add-photo-block__btn">Добавить фото</label>
                </div>
            </div>
            <label for="file_input" title="" class="add-photos-btn"><img src="addPhotoPlus.svg"> Добавить фото</label>
            <textarea id="description" placeholder="Добавьте подпись..." class="add-text-inp"></textarea>
            <input multiple accept="image/*" id="file_input" class="disabled-input" type="file"></input>
        <button id="send_post_btn" disabled class="add-post-btn">Добавить</button>
    </div>
</body>
</html>