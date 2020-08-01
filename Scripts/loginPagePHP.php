<?php
require_once 'connection.php';

    $connection = new mysqli($host, $user, $password, $database);

    $email = filter_var($_POST['loginField'], FILTER_SANITIZE_STRING);
    $pass = md5(filter_var($_POST['passwordField'], FILTER_SANITIZE_STRING));

    if ($conn -> connect_error) {
        die ("Ошибка подключения к БД!".$conn -> connect_error);
    }

//    if (isValid()) {
        $query = $connection ->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass'");
        $searchArr = $query ->fetch_assoc();

        if (count($searchArr) == 0) {
            exit("Такого пользователя не существует!");
        } else {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['userId'] = $searchArr['iduser'];
            header("Location: /index.php");
        }
//    } else {
//        echo "<br> <a href='/loginPage.php'>Назад</a>";
//    }

    $connection -> close();

//    function isValid() {
//
//        $fail = false;
//
//        global $order_price;
//        global $pass;
//
//        if (mb_strlen($order_price) < 3 ) {
//            $fail = "Некорректный/пустой EMAIL";
//        } else if (mb_strlen($pass) < 1) {
//            $fail = "Некорректный/пустой пароль";
//        }
//
//        if ($fail) {
//            echo $fail;
//            return false;
//        } else
//            return true;
//    }

?>