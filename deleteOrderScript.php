<?php
require_once 'Scripts/connection.php';

$connection = new mysqli($host, $user, $password, $database);

$order_id = $_GET['delete'];
$deleteQuery = $connection -> query("DELETE FROM orders WHERE order_id = '$order_id'");

header('Location: /ordersPanel.php');

$connection -> close();
