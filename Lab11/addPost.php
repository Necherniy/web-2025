<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить пост</title>
    <link href="Styles/add_post.css" rel="stylesheet">
</head>
<body>
    <div class="icons-block">
        <button class="icons-block__icons icons-block__icons_home-icon-margin"><img src="house_icon.png" alt="House_icon"></button>  
        <img class="buttons-block__dot" src="under_dot.png" alt="Under_dot">
        <button class="icons-block__icons"><img src="profile_icon.svg" alt="Porfile_icon"></button>
        <button class="icons-block__icons"><img src="plus_icon.png" alt="Plus_icon"></button>
    </div>
    <div class="main-block">
        <form>
        <div class="add-photo-block">
            <div class="add-photo-block__photo">
                <img src="addPostPhoto.jpg">
                <input class="add-photo-block__btn" title="" type="file"></input>
            </div>
        </div>
        <input title="" class="add-photos-btn"><img src="addPhotoPlus.svg"> Добавить фото</input>
        <textarea placeholder="Добавьте подпись..." class="add-text-inp"></textarea>
        <button disabled class="add-post-btn">Добавить</button>
        </form>
    </div>
</body>
</html>