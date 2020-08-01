<?php
    require_once 'Scripts/connection.php';


    $connection = new mysqli($host, $user, $password, $database);

    if ($connection ->connect_error) {
        echo "Проблемы с БД ".$connection -> connect_error;
        exit();
    }

    $query = $connection -> query("SELECT * FROM `goods`");

    if (isset($_POST['searchField'])) {
        $searchTarget = $_POST['searchField'];
        $query = $connection ->query("SELECT * FROM `goods` WHERE `type` = '$searchTarget'");
        header('Location: /index.php');
    }


    $connection -> close();

    require_once 'Scripts/loginHeadUpdate.php';
    require_once 'Pages/catalogPage.php';
?>
