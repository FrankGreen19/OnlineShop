<?php
    require_once "Scripts/ordersPageScripts.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заказы</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/indexStyle.css">
</head>
<body>
    <?php
        require_once 'Scripts/loginHeadUpdate.php';
        require_once 'Pages/header.php';
    ?>


    <main class="container-fluid">
        <div class="row">

            <div class="col-md-4">

            <?php while ($row = $result -> fetch_assoc()): ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5>Order №<?php echo $row['order_id'];?> - <?php echo $row['date'];?> <?php echo $row['email'];?></h5>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <a class="btn" href="ordersPage.php?loadInf=<?php echo $row['order_id']?>" style="border-color: #A32B68; color: #A32B68;">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
            <div class="col-md-8">

                <div class="row">
                    <?php if ($orderInf != ""):?>
                        <div class="col-md-12 mt-3">
                            <div class="card">
                                <h5 class="card-header">Детальная информация</h5>
                                <div class="card-body">
                                    <h5>№ заказа: <?php echo $orderInf['order_id'];?></h5>
                                    <h5>Цена заказа: <?php echo $orderInf['order_price'];?>₽</h5>
                                    <h5>Дата: <?php echo $orderInf['date'];?></h5>
                                    <h5>Время: <?php echo $orderInf['time'];?></h5>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                <p style="color: #A32B68; font-size: 2.5em;">Выберете заказ либо создайте его!</p>
                            </div>
                        </div>
                    <?php endif; ?>


                </div>

                <div class="row">
                    <?php
                        if ($productsInf != "")
                            while ($row = $productsInf -> fetch_assoc()): ?>
                                <div class="col-md-3 mt-3">
                                    <div class="card">
                                        <a href="/itemPage.php?itemid=<?php echo $row['product_id'];?>" style="text-decoration: none; color: #A32B68">
                                            <img class="card-img-top" src="<?php echo $row['imgpath'];?>" alt="Товар">
                                            <div class="card-body text-center">
                                                <h5><?php echo $row['type'];?></h5>
                                                <h5><?php echo $row['brand'];?></h5>
                                                <h5><?php echo $row['price'];?> ₽</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
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
