<?php
    require_once 'Scripts/loginHeadUpdate.php';
    require_once 'Scripts/connection.php';


    $connection = new mysqli($host, $user, $password, $database) or die("DB ERROR");


    $userId = $_SESSION['userId'];
    $query = $connection ->query("SELECT * FROM `usersbaskets`, `goods` WHERE usersbaskets.productId = goods.product_id 
                AND `userId` = '$userId'");


    if (isset($_GET['makeOrder'])) {

        $date = date("Y-m-d");
        $time = date("H:i:s");

        $finalPrice = $_GET['makeOrder'];

        $ordersQuery = $connection -> query("INSERT INTO `orders` VALUES (NULL, '$userId', '$date', '$time', '$finalPrice')");
        $orderIdQuery = $connection -> query("SELECT `order_id` FROM `orders` WHERE `user_id` = '$userId' AND `date` = '$date' AND `time` = '$time'") -> fetch_assoc();
        $orderId = $orderIdQuery['order_id'];

        while ($row = $query -> fetch_assoc()) {
            $productId = $row['product_id'];
            $insertQuery = $connection ->query("INSERT INTO `orderproducts` VALUES (NULL, '$orderId', '$productId')");
        }

        $deleteQuery = $connection -> query("DELETE FROM `usersbaskets` WHERE `userId` = '$userId'");

    }

    $connection -> close();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/indexStyle.css">
</head>
<body>
    <?php
        require_once 'Pages/header.php';
    ?>

    <main>
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <?php
                        $finalPrice = 0;

                        while ($row = $query ->fetch_assoc()) :
                            $finalPrice += $row['price']; ?>
                        <div class="card mt-3" style="border-color: #A32B68">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-3">
                                        <img class="card-img" src="<?php echo $row['imgpath']?>" alt="">
                                    </div>

                                    <div class="col-md-9">
                                        <div class="card-body">

                                            <form action="Scripts/deleteProductFromBasket.php" method="post">
                                                <input type="text" name="itemId" value="<?php echo $row['itemid']?>" style="display: none">
                                                <button type="submit" class="close" name="productDeleteButton" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </form>

                                            <h5 class="card-text"><?php echo $row['type']?></h5>
                                            <h5 class="card-text"><?php echo $row['brand']?></h5>
                                            <h5 class="card-text"><?php echo $row['price']?>₽</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>

                <div class="col-md-4 order-md-2">
                    <div class="card mt-3" style="border-color: #A32B68">
                        <div class="card-body text-center">
                            <form action="" method="post">
                                <h5>Итоговая стоимость: <?php echo $finalPrice?>₽</h5>
                                <a class="btn btn-primary mt-3" href="basketPage.php?makeOrder=<?php echo $finalPrice?>" style="background-color: #A32B68">
                                    Заказать!
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php
        require_once 'Pages/footer.php';
    ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
