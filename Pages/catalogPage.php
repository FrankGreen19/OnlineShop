<!DOCTYPE html>
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

    <main>
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">

                    <nav class="navbar navbar-expand-lg navbar-light mt-3" style="background-color: #E7BAD7; border-radius: 7px">
                        <span class="navbar-brand">Категории:</span>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#goodsNavbar" aria-controls="goodsNavbar" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="goodsNavbar">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/indexGoodsSearch.php?target=футболка">Футболки</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/indexGoodsSearch.php?target=худи">Худи</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/index.php">Все товары</a>
                                </li>
                            </ul>

                            <form class="form-inline" action="/indexGoodsSearch.php" method="post">
                                <input type="text" class="form-control mr-1" placeholder="Найти.." name="searchField" required>
                                <button type="submit" class="btn btn-outline-primary my-2 my-sm-0" id="searchButton">
                                    Поиск!
                                </button>
                            </form>
                        </div>

                    </nav>
                </div>

                <?php while ($row = $query -> fetch_assoc()):?>

                    <div class="col-md-6 col-lg-4 col-sm-6 mt-3">
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
        require_once 'Pages/footer.php';
    ?>

    <script
        src="https://code.jquery.com/jquery-3.5.1.slim.js"
        integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
        crossorigin="anonymous"></script>
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>

</body>
</html>
