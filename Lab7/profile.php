<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="profile_style.css" rel="stylesheet">
    <title>Profile</title>
</head>
<body>
    <div>
        <button class="main_icons"><img src="house_icon.png" alt="House_icon"></button>  
        <button class="main_icons"><img src="profile_icon.png" alt="Porfile_icon"></button>
        <img src="under_dot.png" alt="Under_dot">
        <button class="main_icons"><img src="plus_icon.png" alt="Plus_icon"></button>
    </div>
    <?php
        include "profile_shablon.php";
        if (isset($_GET["id"])) {
            trim($_GET["id"]);
            $id_check = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if ($id_check) {
                $id = "id" . $_GET["id"];
                if (isset(json_decode(file_get_contents("profileData.json"), true)["users"][$id])) 
                {
                    profile_layout($id);
                }
                else 
                {
                    header("Location: http://localhost:8001/home.php");
                    exit;
                }
            }
            else
            {
                header("Location: http://localhost:8001/home.php");
                exit;
            }
        }
        else
            {
                header("Location: http://localhost:8001/home.php");
                exit;
            }
    ?>
</body>
</html>