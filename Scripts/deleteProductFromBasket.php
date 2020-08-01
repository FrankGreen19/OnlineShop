<?php
    require_once 'connection.php';

    $connection = new mysqli($host, $user, $password, $database);
    if ($connection ->connect_error) {
        die("DB ERROR");
    }

    $itemId = $_POST['itemId'];
    $userId = $_SESSION['userId'];
    $query = $connection ->query("DELETE FROM `usersbaskets` WHERE `itemid` = '$itemId'");
    header('Location: /basketPage.php');
