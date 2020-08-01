<?php
    require_once 'connection.php';

    $connection = new mysqli($host, $user, $password, $database) or die("DB ERROR");

    session_start();
    $user_id = $_SESSION['userId'];

    $result = $connection -> query("SELECT * from orders, users WHERE user_id = iduser AND user_id = '$user_id'");
    $productsInf = "";
    $orderInf = "";


    if (isset($_GET['loadInf'])) {

        $order_id = $_GET['loadInf'];

        $orderInf = $connection -> query("SELECT * FROM orders where order_id = '$order_id'") -> fetch_assoc();

        $productsInf = $connection -> query("SELECT * FROM `orderproducts`, goods WHERE orderproducts.product_id = goods.product_id AND order_id = '$order_id'");
    }

$connection ->close();


