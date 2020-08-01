<?php
require_once 'Scripts/connection.php';


    $CONNECT = new mysqli($host, $user, $password, $database);

    if ($CONNECT ->connect_error) {
        exit("Error ". $CONNECT ->connect_error);
    }

    if (isset($_GET['target'])) {
        $searchTarget = $_GET['target'];
        $query = $CONNECT->query("SELECT * FROM `goods` WHERE `type` = '$searchTarget'");
    }
    else if (isset($_POST['searchField'])) {
        $searchTarget = $_POST['searchField'];
    }

    $query = $CONNECT->query("SELECT * FROM `goods` WHERE `type` = '$searchTarget'");

    $CONNECT ->close();

    require_once 'Scripts/loginHeadUpdate.php';
    require_once 'Pages\catalogPage.php';
