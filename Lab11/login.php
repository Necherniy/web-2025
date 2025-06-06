<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="Styles/login_style.css" rel="stylesheet">
    <script src="scripts/login.js" defer></script>
    <title>Логин</title>
</head>
<body class="body-tag">
    <h1 class="header">Войти</h1>
    <div class="wrapper">
        <img class="image" src="login_traveler_photo.png" alt="Картинка путешественника">
        <form class="login-form">
            <label for="email" class="login-form__labels">Электропочта</label>
            <input id="email" class="login-form__inputs" type="text" name="address">
            <label id="email_label" class="login-form__labels login-form__labels_email-font">Введите электропочту в формате *****@***.**</label>
            <label for="password" class="login-form__labels">Пароль</label>
            <input id="password" class="login-form__inputs login-form__inputs_password-padding" type="password" name="password">
            <img class="login-form__eye-button-img" src="login_password_eye.svg" alt="Скрыть/показать">
            <input class="login-form__submit-input" type="submit" value="Продолжить">
        </form>
    </div> 
</body>
</html>