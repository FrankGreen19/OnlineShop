<?php
require_once 'Scripts/connection.php';

$connection = new mysqli($host, $user, $password, $database);

$product_idDelete = $_GET['delete'];
$deleteQuery = $connection -> query("DELETE FROM goods WHERE product_id = '$product_idDelete'");

header('Location: /productsPanel.php');

$connection -> close();
