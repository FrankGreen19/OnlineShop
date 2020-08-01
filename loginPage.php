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

<!--    <nav class="navbar navbar-expand-lg navbar-light" style="background:#A32B68;">-->
<!--        <div class="container-fluid">-->
<!--            <a class="navbar-brand">Online Shop</a>-->
<!--        </div>-->
<!--        <ul class="navbar-nav mr-auto">-->
<!--            <li class="nav-item"><a href="index.php" class="nav-link">Главная</a></li>-->
<!--            <li class="nav-item"><a href="#" class="nav-link">Регистрация</a></li>-->
<!--            <li class="nav-item"><a href="loginPage.php" class="nav-link">Войти</a></li>-->
<!--        </ul>-->
<!--    </nav>-->

    <img src="Images/loginPagePicture2.png" class="img-fluid" alt="Responsive image" id="yellowImage">

    <main>
        <div class="card" id="loginFormContainer">
            <div class="card-header" id="login-card-header">
                <p align="center">Вход</p>
            </div>
            <div class="card-body">
                <form action="/Scripts/loginPagePHP.php" method="post">
                    <p align="center"><input type="text" id="loginField" name="loginField" class="form-control mt-3" placeholder="Логин" required/> </p>
                    <p align="center"><input type="password" id="passwordField" name="passwordField" class="form-control" placeholder="Пароль" required/> </p>
                    <p align="center"><input type="submit" id="loginFormButton" class="btn btn-info" value="Войти"/> </p>
                    <p align="center"><a href="signUpPage.php" style="color: #A32B68">Еще не зарегистрированны?</a></p>
                </form>
            </div>
        </div>
    </main>

    <?php
        require_once 'Pages/footer.php';
    ?>


</body>
</html>