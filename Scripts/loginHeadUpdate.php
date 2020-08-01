<?php

$email = "Войти";
$loginlink = "loginPage.php";

session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $loginlink = "#";
    $registrationlink = "#";

}
