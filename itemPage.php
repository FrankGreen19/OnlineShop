<?php
require_once 'Scripts/connection.php';
require_once 'Scripts/loginHeadUpdate.php';

    $connection = new mysqli($host, $user, $password, $database);
    $itemArr = "";

    if (isset($_GET["itemid"])) {
        $target = $_GET["itemid"];
        $query = $connection ->query("SELECT * FROM `goods` where `product_id` = '$target'");
        $itemArr = $query ->fetch_assoc();

    } else {
        exit("Проблемы с получением данных товаров");
    }

    if (isset($_POST['insertIntoBasketButton'])) {
        $productId = $itemArr['product_id'];
        $userId = $_SESSION['userId'];
        $query = $connection -> query("INSERT INTO `usersbaskets` VALUES (NULL,'$userId', '$productId')");
    }

    $connection -> close();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Shop</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/CSS/indexStyle.css">
</head>
<body>
    <?php
        require_once 'Pages/header.php';
    ?>

    <main class="container mt-3">
        <div class="card" style="border-color: #A32B68">
            <div class="row">
                <div class="col-md-6">
                    <img class="card-img" src="<?php echo $itemArr['imgpath']?>" alt="Фото вещи">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #A32B68"><?php echo $itemArr['type'] . " " . $itemArr['brand']?></h5>
                        <h5 class="font-weight-bold"><?php echo $itemArr['price'] . " ₽"?></h5>
                        <form method="post">
                            <button type="submit" name="insertIntoBasketButton" class="btn btn-primary mt-5" style="background-color: #A32B68">Добавить в корзину</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </main>

    <?php
        require_once 'Pages/footer.php';
    ?>

    <script
        src="https://code.jquery.com/jquery-3.5.1.slim.js"
        integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
