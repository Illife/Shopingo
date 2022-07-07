<?php

require_once __DIR__ . '/../config.php';

require_once __DIR__ . '/../models/Category.php';

require_once __DIR__ . '/../models/Product.php';

$ResultReadCategories = new \Models\Category;
$ResultReadCategories = $ResultReadCategories->read_categories();
foreach ($ResultReadCategories as $categories) {
}

$ResultReadSubCategories = new \Models\Category;
$ResultReadSubCategories = $ResultReadSubCategories->read_subcategories();

?>


<!doctype html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?= PATH ?>/assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="<?= PATH ?>/assets/plugins/OwlCarousel/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?= PATH ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?= PATH ?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?= PATH ?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="<?= PATH ?>/assets/plugins/nouislider/nouislider.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?= PATH ?>/assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?= PATH ?>/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= PATH ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?= PATH ?>/assets/css/app.css" rel="stylesheet">
    <link href="<?= PATH ?>/assets/css/icons.css" rel="stylesheet">
    <title>Shopingo :: Интернет-магазин</title>
</head>

<body>

    <b class="screen-overlay"></b>
    <!--wrapper-->
    <div class="wrapper">
        <!--start top header wrapper-->
        <div class="header-wrapper">
            <div class="top-menu border-bottom">
                <div class="container">
                    <nav class="navbar navbar-expand">
                        <div class="shiping-title text-uppercase font-13 d-none d-sm-flex">Добро пожаловать в наш интернет-магазин!</div>
                        <ul class="navbar-nav ms-auto d-none d-lg-flex">
                            <li class="nav-item"> <a class="nav-link" href="otslezhivat-zakaz">Отслеживать заказ</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="o-nas">О нас</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="kategorii-tovarov">Категории товаров</a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="kontakty">Контакты</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="header-content pb-3 pb-md-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-4 col-md-auto">
                            <div class="d-flex align-items-center">
                                <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
                                </div>
                                <div class="logo d-none d-lg-flex">
                                    <a href="/">
                                        <img src="<?= PATH ?>/assets/images/logo-icon.png" class="logo-icon" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md order-4 order-md-2">
                            <form action="<?= PATH ?>/handlers/search/handler_search.php" method="post" class="input-group flex-nowrap px-xl-4">
                                <input type="text" class="form-control w-100" placeholder="Search for Products" name="input_search" value="<?= $_GET['search'] ?>">
                                <select class="form-select flex-shrink-0" aria-label="Default select example" style="width: 10.5rem;" name="select_search">
                                    <option value="0" selected>Все Категории</option>
                                    <?php foreach ($ResultReadCategories as $categories) { ?>
                                        <option value="<?= $categories['id'] ?>"><?= $categories['title'] ?></option>
                                    <?php } ?>
                                </select>
                                <button style="border:none; background-color:inherit;">
                                    <span class="input-group-text cursor-pointer bg-transparent">
                                        <i class='bx bx-search'></i>
                                    </span>
                                </button>
                            </form>
                        </div>
                        <div class="col-4 col-md-auto order-3 d-none d-xl-flex align-items-center">
                            <div class="fs-1 text-white"><i class='bx bx-headphone'></i>
                            </div>
                            <div class="ms-2">
                                <p class="mb-0 font-13">ПОЗВОНИТЕ НАМ ПРЯМО СЕЙЧАС</p>
                                <h5 class="mb-0">+7 9541642118</h5>
                            </div>
                        </div>
                        <div class="col-4 col-md-auto order-2 order-md-4">
                            <div class="top-cart-icons float-end">
                                <nav class="navbar navbar-expand">
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item"><a href="<?= PATH ?>/user/signin" class="nav-link cart-link"><i class='bx bx-user'></i></a>
                                        </li>
                                        <li class="nav-item"><a href="<?= PATH ?>/izbrannoe" class="nav-link cart-link"><i class='bx bx-heart'></i></a>
                                        </li>

                                        <?php

                                        $i = 0;

                                        foreach ($_SESSION['cart'] as $item) {
                                            $i++;
                                        }
                                        ?>

                                        <li class="nav-item dropdown dropdown-large">
                                            <a href="<?= PATH ?>/shop-cart" class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link" data-bs-toggle="dropdown">
                                                <span class="alert-count ajax_cart_count"><?= $i ?></span>
                                                <i class='bx bx-shopping-bag'></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="<?= PATH ?>/shop-cart">
                                                    <div class="cart-header">
                                                        <p class="cart-header-title mb-0"><?= $i ?> ТОВАРОВ</p>
                                                        <p class="cart-header-clear ms-auto mb-0">ПРОСМОТР КОРЗИНЫ</p>
                                                    </div>
                                                </a>
                                                <div class="cart-list">
                                                    <?php foreach ($_SESSION['cart'] as $product_id) { ?>
                                                        <?php
                                                        $id = $product_id;

                                                        $ResultReadProductById = new \Models\Product;
                                                        $ResultReadProductById = $ResultReadProductById->read_product_by_id($id);
                                                        foreach ($ResultReadProductById as $product) {
                                                            $total_price = $total_price + $product['price'];
                                                        ?>
                                                            <a class="dropdown-item" href="javascript:;">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-grow-1">
                                                                        <h6 class="cart-product-title">
                                                                            <?php

                                                                            $product_title = $product['title'];
                                                                            $product_title = substr($product_title, 0, 30);
                                                                            $product_title = rtrim($product_title, "!,.-");
                                                                            $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                            echo $product_title . "… ";

                                                                            ?>
                                                                        </h6>
                                                                        <p class="cart-product-price">1 X &#8381;<?= $product['price'] ?></p>
                                                                    </div>
                                                                    <div class="position-relative">
                                                                        <div class="cart-product-cancel position-absolute">
                                                                            <i class='bx bx-x ajax_close_<?= $product['id'] ?>'></i>
                                                                            <div class="d-none ajax_product_<?= $product['id'] ?>"><?= $product['id'] ?></div>
                                                                        </div>
                                                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

                                                                        <script>
                                                                            $(document).ready(function() {
                                                                                $('.ajax_close_<?= $product['id'] ?>').on('click', function(e) {
                                                                                    e.preventDefault();
                                                                                    const id = <?= $product['id'] ?>;
                                                                                    $.ajax({
                                                                                        url: 'http://localhost/handlers/cart/close.php',
                                                                                        type: 'POST',
                                                                                        data: {
                                                                                            id: id,
                                                                                        },
                                                                                        success: function(data) {
                                                                                            console.log(data);
                                                                                            location.reload();

                                                                                        },
                                                                                        error: function() {
                                                                                            alert('Error!');
                                                                                        },
                                                                                    })

                                                                                })
                                                                            });
                                                                        </script>

                                                                        <div class="cart-product">
                                                                            <img src="<?= PATH . "/" . $product['img'] ?>" class="" alt="product image">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                                <a href="javascript:;">
                                                    <div class="text-center cart-footer d-flex align-items-center">
                                                        <h5 class="mb-0">ВСЕГО</h5>
                                                        <h5 class="mb-0 ms-auto">&#8381;<?= $total_price ?></h5>
                                                    </div>
                                                </a>
                                                <div class="d-grid p-3 border-top"> <a href="<?= PATH ?>/order-details" class="btn btn-dark btn-ecomm">КАССА</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
            <div class="primary-menu border-top">
                <div class="container">
                    <nav id="navbar_main d-flex flex-row align-items-center" class="mobile-offcanvas navbar navbar-expand-lg">
                        <div class="offcanvas-header">
                            <button class="btn-close float-end"></button>
                            <h5 class="py-2">Навигация</h5>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item active"> <a class="nav-link" href="/">Главная </a>
                            </li>
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret d-flex" href="#" data-bs-toggle="dropdown">Категории <i class='bx bx-chevron-down'></i></a>
                                <div class="dropdown-menu dropdown-large-menu">
                                    <div class="row">
                                        <?php foreach ($ResultReadCategories as $category) { ?>
                                            <div class="col-md-4">
                                                <h6 class="large-menu-title"><?= $category['title'] ?></h6>
                                                <ul class="">
                                                    <?php foreach ($ResultReadSubCategories as $sub_category) { ?>
                                                        <?php if ($category['id'] == $sub_category['parent_id']) { ?>
                                                            <li><a href="#"><?= $sub_category['title'] ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                        <!-- end col-3 -->

                                        <!-- end col-3 -->
                                        <div class="col-md-4">
                                            <div class="pramotion-banner1">
                                                <img src="assets/images/gallery/menu-img.jpg" class="img-fluid" alt="" />
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- dropdown-large.// -->
                            </li>
                            <!-- <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret d-flex" href="#" data-bs-toggle="dropdown">Магазин <i class='bx bx-chevron-down'></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret d-flex flex-row" href="#">Страницы магазина <i class='bx bx-chevron-right float-end'></i></a>
                                        <ul class="submenu dropdown-menu">
                                            <li><a class="dropdown-item dropdown-toggle dropdown-toggle-nocaret" href="#">Shop Layouts <i class='bx bx-chevron-right float-end'></i></a>
                                                <ul class="submenu dropdown-menu">
                                                    <li><a class="dropdown-item" href="shop-grid-left-sidebar.html">Shop Grid - Left Sidebar</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="shop-grid-right-sidebar.html">Shop Grid - Right Sidebar</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="shop-list-left-sidebar.html">Shop List - Left Sidebar</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="shop-list-right-sidebar.html">Shop List - Right Sidebar</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="shop-grid-filter-on-top.html">Shop Grid - Top Filter</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="shop-list-filter-on-top.html">Shop List - Top Filter</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a class="dropdown-item" href="shop-cart.html">Корзина для покупок</a>
                                            </li>
                                            <li><a class="dropdown-item" href="shop-categories.html">Категории магазина</a>
                                            </li>
                                            <li><a class="dropdown-item" href="checkout-details.html">Детали Оформления заказа</a>
                                            </li>
                                            <li><a class="dropdown-item" href="checkout-shipping.html">Доставка</a>
                                            </li>
                                            <li><a class="dropdown-item" href="checkout-payment.html">Оплата при оформлении заказа</a>
                                            </li>
                                            <li><a class="dropdown-item" href="checkout-review.html">Проверка оформления заказа</a>
                                            </li>
                                            <li><a class="dropdown-item" href="checkout-complete.html">Оформление заказа Завершено</a>
                                            </li>
                                            <li><a class="dropdown-item" href="order-tracking.html">Отслеживание заказов</a>
                                            </li>
                                            <li><a class="dropdown-item" href="product-comparison.html">Сравнение продуктов</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="about-us.html">О нас</a>
                                    </li>
                                    <li><a class="dropdown-item" href="contact-us.html">связаться с нами</a>
                                    </li>
                                    <li><a class="dropdown-item" href="authentication-signin.html">войти в систему</a>
                                    </li>
                                    <li><a class="dropdown-item" href="authentication-signup.html">зарегистрироваться</a>
                                    </li>
                                    <li><a class="dropdown-item" href="authentication-forgot-password.html">Забыли Пароль</a>
                                    </li>
                                </ul>
                            </li> -->
                            <li class="nav-item"> <a class="nav-link" href="o-nas">о нас </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="kontakty">связаться с нами </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="kategorii-tovarov">Наш магазин</a>
                            </li>
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle dropdown-toggle-nocaret d-flex" href="#" data-bs-toggle="dropdown">Мой аккаунт <i class='bx bx-chevron-down'></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= PATH ?>/user/lichnyj-kabinet">Приборная панель</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= PATH ?>/user/zagruzki">Загрузки</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= PATH ?>/user/zakazy">Заказы</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= PATH ?>/user/sposoby-oplaty">Способы оплаты</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= PATH ?>/user/uchyotnaya-zapis">Учётная запись</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--end top header wrapper-->