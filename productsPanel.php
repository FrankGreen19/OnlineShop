<?php
    require_once 'Scripts/productsPanelScripts.php';
    
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Таблица продуктов</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS/indexStyle.css">

    <script type="text/javascript">
        function deleteCheck() {
            if (confirm("Подтвердите удаление")) {
                <?php
                    if (isset($_GET['delete'])) {
                        $product_idDelete = $_GET['delete'];
                        $deleteQuery = $connection -> query("DELETE FROM goods WHERE product_id = '$product_idDelete'");

                        header('Location: /productsPanel.php');
                    }
                ?>
            }
        }
    </script>

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
                        <li class="nav-item active"><a class="nav-link " href="productsPanel.php">Таблица продуктов</a></li>
                        <li class="nav-item"><a class="nav-link" href="ordersPanel.php">Таблица заказов</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</header>

    <main class="container-fluid">
        <div class="row">

            <div class="col-xl-3 col-lg-5 col-md-6 col-sm-6 mt-3 mr-auto ml-auto">
                <div class="card">
                    <h5 class="card-header text-center">Детали товара</h5>
                    <div class="card-body">
                        <form action="Scripts/productsPanelScripts.php" method="post">
                            <div class="container">
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-6 col-md-6 col-sm-5 col-form-label" for="product_idField">Product ID</label>
                                    <input type="text" class="col-xl-8 col-lg-6 col-md-6 col-sm-7 form-control" name="product_idField" id="product_idField" value="<?php echo $product_id;?>" readonly>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-6 col-md-6 col-sm-5 col-form-label" for="typeField">Type</label>
                                    <input type="text" class="col-xl-8 col-lg-6 col-md-6 col-sm-7 form-control" name="typeField" id="typeField" value="<?php echo $type;?>" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-6 col-md-6 col-sm-5 col-form-label" for="brandField">Brand</label>
                                    <input type="text" class="col-xl-8 col-lg-6 col-md-6 col-sm-7 form-control" name="brandField" id="brandField" value="<?php echo $brand;?>" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-6 col-md-6 col-sm-5 col-form-label" for="priceField">Price</label>
                                    <input type="text" class="col-xl-8 col-lg-6 col-md-6 col-sm-7 form-control" name="priceField" id="priceField" value="<?php echo $price;?>" required>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-4 col-lg-6 col-md-6 col-sm-5 col-form-label" for="imgPathField">Image path</label>
                                    <input type="text" class="col-xl-8 col-lg-6 col-md-6 col-sm-7 form-control" name="imgPathField" id="imgPathField" value="<?php echo $imgPath;?>" required>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <input class="btn btn-md" type="submit" value="<?php echo $appendUpdateButtonValue;?>" name="<?php echo $appendUpdateButtonName?>Button" style="background-color: #A32B68; color: white">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-9 col-lg-7 mt-3">
                <div class="" id="productsPanelTableHeader">
                    <h5 class="text-center mt-2">Таблица товаров</h5>
                </div>

                <table class="table table-hover table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>product_id</th>
                            <th>type</th>
                            <th>brand</th>
                            <th>price</th>
                            <th colspan="2" class="text-center w-25">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result -> fetch_assoc()):?>
                            <tr>
                                <td><?php echo $row['product_id'];?></td>
                                <td><?php echo $row['type'];?></td>
                                <td><?php echo $row['brand'];?></td>
                                <td><?php echo $row['price'];?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="productsPanel.php?edit=<?php echo $row['product_id'];?>">Изменить</a>
                                    <a class="btn btn-danger btn-sm" href="deleteProductScript.php?delete=<?php echo $row['product_id'];?>" onclick="return confirm('Удалить продукт?')">Удалить</a>
                                </td>
                            </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <?php
        $connection -> close();
        require_once 'Pages/footer.php';
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
