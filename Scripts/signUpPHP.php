<?php
require_once 'connection.php'; // подключаем скрипт

    $email = filter_var($_POST['loginField'], FILTER_SANITIZE_STRING);
    $pass = md5(filter_var($_POST['passwordField'], FILTER_SANITIZE_STRING));
    $fullname = filter_var($_POST['fioField'], FILTER_SANITIZE_STRING);
    $phoneNumber = filter_var($_POST['telephoneNumberField'], FILTER_SANITIZE_STRING);

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn -> connect_error) {
        die ($conn -> connect_error);
    }

//    if (isValid()) {

        $uniqueTest = $conn -> query("SELECT `email` FROM `users` WHERE `email` = '$email'");
        $result = $uniqueTest ->fetch_assoc();

        if (count($result) != 0) {
            exit("Введенный адрес электронной почты уже существует!");
        } else {
            $query = "INSERT INTO `users` VALUES (NULL, '$email', '$pass', '$fullname', '123213')";
            if ($conn -> query($query)) {
                echo "<p align='center' style='color: green'>Аккаунт успешно зарегистрирован!</p>
                  <p align='center'><a href='/index.php'>На главную</a></p>";
            } else
                echo ("Проблемы с БД");
        }
//    } else {
//        echo "<br> <a href='/signUpPage.php'>Назад</a>";
//    }

    $conn -> close();

    function isValid() {

        $fail = false;
        global $order_price;
        global $pass;
        global $fullname;
        global $phoneNumber;

        if (mb_strlen($fullname) < 3 ) {
            $fail = "Некорректное/пустое ФИО"; }
        else if (mb_strlen($order_price) < 3 ) {
            $fail = "Некорректный/пустой EMAIL";
        } else if (mb_strlen($pass) < 1) {
            $fail = "Некорректный/пустой пароль";
        } else if (mb_strlen($phoneNumber) < 3 ) {
            $fail = "Некорректный/пустой телефон";
        }

        if ($fail) {
            echo $fail;
            return false;
        } else
            return true;
    }
?>


