<?php
    require_once 'Scripts/connection.php';

    $connection = new mysqli($host, $user, $password, $database);

    $result = $connection -> query ("SELECT orders.order_id, orders.user_id, orders.date, orders.time, orders.order_price, users.email FROM `orders`, `users` WHERE users.iduser = orders.user_id");

    $order_id = "";
    $user_id = "";
    $order_price = "";
    $date = "";
    $time = "";
    $appendUpdateButtonValue = "Добавить";
    $appendUpdateButtonName = "appendButton";

    if (isset($_GET['update'])) {
        $order_id = $_GET['update'];
        $orderQuery = $connection -> query("SELECT * from orders WHERE order_id = '$order_id'") -> fetch_assoc();
        $user_id = $orderQuery['user_id'];
        $order_price = $orderQuery['order_price'];
        $date = $orderQuery['date'];
        $time = $orderQuery['time'];
        $appendUpdateButtonValue = "Обновить";
        $appendUpdateButtonName = "updateButton";
    }

    if (isset($_POST['appendButton'])) {
        $user_id = $_POST['user_id'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $order_price = $_POST['order_price'];
        $orderAppendQuery = $connection ->query("INSERT INTO orders VALUES (NULL, '$user_id', '$date', '$time', '$order_price')") or die("Append Problems");
    }

    if (isset($_POST['updateButton'])) {
        $user_id = $_POST['user_id'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $order_price = $_POST['order_price'];
        $orderAppendQuery = $connection ->query("UPDATE orders SET user_id = '$user_id', `date` = '$date', `time` = '$time', order_price = '$order_price' WHERE order_id = '$order_id'")
            or die("Update Problems");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Таблица заказов</title>
        <!-- Font Awesome -->
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
                        <li class="nav-item active"><a class="nav-link" href="ordersPanel.php">Таблица заказов</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <main class="" role="main">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3 mt-3">
                    <div class="card">
                        <h5 class="card-header text-center">Детали заказа</h5>
                        <div class="card-body">
                            <form class="text-center" method="post" style="padding: 2%">
                                <label class="mt-1" for="order_id">ID заказа</label>
                                <input class="form-control" type="text" name="order_id" id="order_id" value="<?php echo $order_id;?>" readonly>
                                <label class="mt-1" for="user_id">ID пользователя</label>
                                <input class="form-control" type="text" name="user_id" id="user_id" value="<?php echo $user_id;?>">
                                <label class="mt-1" for="email">Цена</label>
                                <input class="form-control" type="text" name="order_price" id="order_price" value="<?php echo $order_price;?>">
                                <label class="mt-1" for="date">Дата</label>
                                <input class="form-control" type="text" name="date" id="date" value="<?php echo $date;?>">
                                <label class="mt-1" for="time">Время</label>
                                <input class="form-control" type="text" name="time" id="time" value="<?php echo $time;?>">
                                <input class="btn mt-3" type="submit" name="<?php echo $appendUpdateButtonName;?>" id="updateOrderButton" value="<?php echo $appendUpdateButtonValue;?>" style="background-color: #A32B68; color: white">
                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-md-9">
                    <div class="mt-3" id="productsPanelTableHeader">
                        <h5 class="text-center mt-2">Таблица заказов</h5>
                    </div>

                    <table class="table table-hover table-bordered mt-3">
                        <thead class="thead-light">
                            <tr>
                                <th>order_id</th>
                                <th>user_id</th>
                                <th>email</th>
                                <th>date</th>
                                <th>time</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = $result ->fetch_assoc()):
                            ?>
                                    <tr class="">
                                        <td><?php echo $row['order_id'];?></td>
                                        <td><?php echo $row['user_id'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['date'];?></td>
                                        <td><?php echo $row['time'];?></td>
                                        <td style="width: 400px">
                                            <a class="btn btn-info btn-sm" href="ordersPanel.php?update=<?php echo $row['order_id'];?>">Изменить</a>
                                            <a class="btn btn-info btn-sm" href="orderCompos.php?order_id=<?php echo $row['order_id'];?>">Подробнее</a>
                                            <a class="btn btn-danger btn-sm " href="deleteOrderScript.php?delete=<?php echo $row['order_id'];?>" onclick="return confirm('Удалить заказ?')">Удалить</a>
                                        </td>
                                    </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


    <?php
        require_once 'Pages/footer.php';
        $connection -> close();
    ?>

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
