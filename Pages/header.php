<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 border-bottom shadow-sm waves-effect" >
    <a class="my-0 mr-md-auto font-weight-normal" id="headerLogo" href="/index.php">Online Shop</a>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="index.php">Главная</a>
        <?php if (!isset($_SESSION['email'])):?>
            <a class="p-2 text-dark" href="signUpPage.php">Регистрация</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['email'])):?>
            <a class="p-2 text-dark" href="basketPage.php">Корзина</a>
        <?php endif; ?>
    </nav>
    <div class="my-2 my-md-0 mr-md-3" id="userDropdownMenu">
        <a class="btn btn-outline-primary" id="loginButton" href="<?php echo $loginlink?>"><?php echo $email?></a>
        <div id="dropdown-content">
            <?php if (isset($_SESSION['email'])):?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="/basketPage.php">Корзина</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/ordersPanel.php">Админ панель</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/ordersPage.php">Заказы</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/Scripts/endSession.php">Выйти</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>

</header>


