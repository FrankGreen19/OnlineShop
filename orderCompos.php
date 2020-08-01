<?php
    require_once 'Scripts/connection.php';

    $connection = new mysqli($host, $user, $password, $database);

    $order_id = $_GET['order_id'];
    $orderproductsGoodsQuery = $connection -> query ("SELECT * FROM `orderproducts`, `goods` where orderproducts.product_id = goods.product_id AND orderproducts.order_id = '$order_id'");
    $ordersUsersQuery = $connection -> query ("SELECT orders.order_id, orders.user_id, orders.date, orders.time, orders.order_price, users.email FROM `orders`, `users` WHERE users.iduser = orders.user_id 
        AND orders.order_id = '$order_id'") -> fetch_assoc();


    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заказ №<?php echo $order_id?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/indexStyle.css">
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #A32B68">
            <div class="container-fluid">
                <a class="navbar-brand waves-effect" href="ordersPanel.php"><strong>ONLINE SHOP.STUFF</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="productsPanel.php">Таблица продуктов</a></li>
                        <li class="nav-item"><a class="nav-link" href="ordersPanel.php">Таблица заказов</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container" role="main">

        <div class="row mt-3">

            <div class="col-md-5">
                <div class="card">
                    <h5 class="card-header">Детальная информация</h5>
                    <div class="card-body">
                        <h5>Заказчик: <?php echo $ordersUsersQuery['email']?></h5>
                        <h5>ID заказчика: <?php echo $ordersUsersQuery['user_id']?> </h5>
                        <h5>ID заказа: <?php echo $ordersUsersQuery['order_id']?></h5>
                        <h5>Цена заказа: <?php echo $ordersUsersQuery['order_price']?>₽</h5>
                        <h5>Дата: <?php echo $ordersUsersQuery['date']?></h5>
                        <h5>Время: <?php echo $ordersUsersQuery['time']?></h5>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>orderproducts_id</td>
                        <td>order_id</td>
                        <td>product_id</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $orderproductsGoodsQuery -> fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['orderproducts_id'];?></td>
                            <td><?php echo $row['order_id'];?></td>
                            <td><?php echo $row['product_id'];?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="col-md-12">
            <div class="row">

                <?php
                $orderproductsGoodsQuery = $connection -> query ("SELECT * FROM `orderproducts`, `goods` where orderproducts.product_id = goods.product_id AND orderproducts.order_id = '$order_id'");
                while ($row = $orderproductsGoodsQuery -> fetch_assoc()):?>
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

                <?php
                endwhile;
                ?>

            </div>
        </div>

    </main>

    <?php
        $connection -> close();
        require_once 'Pages/footer.php';
    ?>

    <script
        src="https://code.jquery.com/jquery-3.5.1.slim.js"
        integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
        crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

</body>
</html>
