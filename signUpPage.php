<?php
    require_once 'Scripts/loginHeadUpdate.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="CSS/indexStyle.css">
</head>
<body>
    <?php
    require_once 'Pages/header.php';
    ?>

    <img src="Images/loginPagePicture2.png" class="img-fluid" alt="Responsive image" id="yellowImage">

    <main>
        <div class="card" id="loginFormContainer">
            <div class="card-header" id="login-card-header">
                <p align="center">Регистрация</p>
            </div>
            <div class="card-body">
                <form action="/Scripts/signUpPHP.php" method="post">
                    <p align="center"><input type="text" id="fioField" name="fioField" class="form-control" placeholder="ФИО" required/> </p>
                    <p align="center"><input type="text" id="loginField" name="loginField" class="form-control mt-3" placeholder="Электронная почта" required/> </p>
                    <p align="center"><input type="text" id="passwordField" name="passwordField" class="form-control" placeholder="Пароль" required/> </p>
                    <p align="center"><input type="text" id="telephoneNumberField" name="telephoneNumberField" class="form-control" placeholder="Телефон" required/> </p>
                    <p align="center"><input type="submit" id="loginFormButton" class="btn btn-info" value="Зарегистрироваться!" style="background-color: #A32B68" required/> </p>
                </form>
            </div>
        </div>
    </main>

    <?php
        require_once 'footer.php';
    ?>


</body>
</html>
