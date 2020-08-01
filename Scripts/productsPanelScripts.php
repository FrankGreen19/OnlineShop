<?php
    require_once 'connection.php';

    $product_id = "";
    $type = "";
    $brand = "";
    $price = "";
    $imgPath = "";
    $appendUpdateButtonName = "Append";
    $appendUpdateButtonValue = "Добавить";

    $connection = new mysqli($host, $user, $password, $database) or die("DB PROBLEMS");

    $result = $connection -> query("SELECT * FROM goods");

    if (isset($_GET['edit'])) {
        $product_id = $_GET['edit'];
        $productFindingQuery = $connection -> query("SELECT * FROM goods WHERE product_id = '$product_id'") -> fetch_assoc();
        $type = $productFindingQuery['type'];
        $brand = $productFindingQuery['brand'];
        $price = $productFindingQuery['price'];
        $imgPath = $productFindingQuery['imgpath'];
        $appendUpdateButtonName = "Update";
        $appendUpdateButtonValue = "Изменить";
    }

    if (isset($_POST['AppendButton'])) {
        $product_type = $_POST['typeField'];
        $product_brand = $_POST['brandField'];
        $product_price = $_POST['priceField'];
        $product_imgPath = $_POST['imgPathField'];
        $appendQuery = $connection -> query("INSERT INTO goods VALUES (NULL, '$product_type', '$product_brand', '$product_price', '$product_imgPath')");

        header('Location: /productsPanel.php');
    }

    if (isset($_POST['UpdateButton'])) {
        $product_id = $_POST['product_idField'];
        $product_type = $_POST['typeField'];
        $product_brand = $_POST['brandField'];
        $product_price = $_POST['priceField'];
        $product_imgPath = $_POST['imgPathField'];
        $updateQuery = $connection -> query("UPDATE goods SET `type` = '$product_type', brand = '$product_brand', price = '$product_price', 
            imgpath = '$product_imgPath' WHERE product_id = '$product_id'");

        header('Location: /productsPanel.php');
    }

