<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Brand.php';
$ResultReadProducts = new \Models\Product;
$ResultReadProducts = $ResultReadProducts->read_products();
// foreach ($ResultReadProducts as $product) {
//     echo ("<img src=\"" . $product['img'] . "\">");
//     echo ("<br>");
// }

$ResultSortProductsByRating = new \Models\Product;
$ResultSortProductsByRating = $ResultSortProductsByRating->sort_products_by_rating();
foreach ($ResultSortProductsByRating as $product) {
    // $category_id = $product['category_id'];
    // echo ("<br>");
}

$ResultSortProductsById = new \Models\Product;
$ResultSortProductsById = $ResultSortProductsById->sort_products_by_id();
foreach ($ResultSortProductsById as $product_by_id) {
    // echo $product['id'];
    // echo ("<br>");
}
// echo ('<pre>');
// echo var_dump($response);
// echo ('</pre>');

?>
<div class="ajax_wishlist_alert">
</div>
<div class="ajax_cart_alert">
</div>

<!--start slider section-->
<section class="slider-section">
    <div class="first-slider">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                $i = 0;
                foreach ($ResultReadSlides as $slider) {
                ?>
                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $i ?>" class="<?php if ($i == 0) {
                                                                                                        echo ('active');
                                                                                                    } ?>"></li>
                <?php
                    $i++;
                } ?>
            </ol>
            <div class="carousel-inner">
                <?php $i = 1;
                foreach ($ResultReadSlides as $slider) { ?>
                    <div class="carousel-item <?php if ($i == 1) {
                                                    echo ('active');
                                                } ?> bg-dark-gery <?php if ($i == 2) {
                                                                        echo ('carousel_item2');
                                                                    } ?>">
                        <div class="row d-flex align-items-center">
                            <div class="col d-none d-lg-flex justify-content-center">
                                <div class="">
                                    <h3 class="h3 fw-light"><?= $slider['title'] ?></h3>
                                    <h1 class="h1"><?= $slider['subtitle'] ?></h1>
                                    <p class="pb-3"><?= $slider['text'] ?></p>
                                    <div class=""> <a class="btn btn-dark btn-ecomm" href="javascript:;"><?= $slider['btn'] ?> <i class='bx bx-chevron-right'></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <img src="<?= $slider['img'] ?>" class="img-fluid" alt="...">
                            </div>
                        </div>
                    </div>
                <?php $i++;
                } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </a>
        </div>
    </div>
</section>
<!--end slider section-->
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start information-->
        <section class="py-3 border-top border-bottom">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">
                    <div class="col">
                        <div class="d-flex align-items-center p-3 bg-white">
                            <div class="fs-1"><i class='bx bx-taxi'></i>
                            </div>
                            <div class="info-box-content ps-3">
                                <h6 class="mb-0">БЕСПЛАТНАЯ ДОСТАВКА И ВОЗВРАТ</h6>
                                <p class="mb-0">Бесплатная доставка при покупке</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center p-3 bg-white">
                            <div class="fs-1"><i class='bx bx-dollar-circle'></i>
                            </div>
                            <div class="info-box-content ps-3">
                                <h6 class="mb-0">ГАРАНТИЯ ВОЗВРАТА ДЕНЕГ</h6>
                                <p class="mb-0">100% гарантия возврата денег</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex align-items-center p-3 bg-white">
                            <div class="fs-1"><i class='bx bx-support'></i>
                            </div>
                            <div class="info-box-content ps-3">
                                <h6 class="mb-0">ОНЛАЙН-ПОДДЕРЖКА 24/7</h6>
                                <p class="mb-0">Круглосуточная поддержка 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end information-->
        <!--start pramotion-->
        <section class="py-4">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col">
                        <div class="card rounded-0 border shadow-none">
                            <div class="row g-0 align-items-center">
                                <div class="col">
                                    <img src="assets/images/promo/01.png" class="img-fluid" alt="" />
                                </div>
                                <div class="col">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Мужская одежда</h5>
                                        <p class="card-text text-uppercase">От &#8381;639</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">КУПИТЬ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-0 border shadow-none">
                            <div class="row g-0 align-items-center">
                                <div class="col">
                                    <img src="assets/images/promo/02.png" class="img-fluid" alt="" />
                                </div>
                                <div class="col">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Женская одежда</h5>
                                        <p class="card-text text-uppercase">От &#8381;639</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">КУПИТЬ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card rounded-0 border shadow-none">
                            <div class="row g-0 align-items-center">
                                <div class="col">
                                    <img src="assets/images/promo/03.png" class="img-fluid" alt="" />
                                </div>
                                <div class="col">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Детская одежда</h5>
                                        <p class="card-text text-uppercase">От &#8381;639</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">КУПИТЬ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end pramotion-->
        <!--start Featured product-->
        <section class="py-4">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-uppercase mb-0">РЕКОМЕНДУЕМЫЕ ТОВАРЫ</h5>
                    <a href="javascript:;" class="btn btn-dark btn-ecomm ms-auto rounded-0">Больше ТОВАРОВ<i class='bx bx-chevron-right'></i></a>
                </div>
                <hr />
                <div class="product-grid">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                        <?php foreach ($ResultSortProductsByRating as $product) { ?>
                            <div class="col">
                                <div class="card rounded-0 product-card">
                                    <div class="card-header bg-transparent border-bottom-0">
                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                            <a href="javascript:;">
                                                <div class="product-compare"><span><i class='bx bx-git-compare'></i> Сравнить</span>
                                                </div>
                                            </a>
                                            <div class="product-wishlist product-wishlist_<?= $product['id'] ?>_1">
                                                <div class="d-none wishlist_<?= $product['id'] ?>">
                                                    <?= $product['id'] ?>
                                                </div>

                                                <i class='bx bx-heart'></i>
                                            </div>
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

                                            <script>
                                                $(document).ready(function() {
                                                    $('.product-wishlist_<?= $product['id'] ?>_1').on('click', function(e) {
                                                        e.preventDefault();
                                                        const id = $('.wishlist_<?= $product['id'] ?>').text() ? $('.wishlist_<?= $product['id'] ?>').text() : 1;
                                                        $.ajax({
                                                            url: 'http://localhost/handlers/wishlist.php',
                                                            type: 'POST',
                                                            data: {
                                                                id: id,
                                                            },
                                                            success: function(data) {
                                                                console.log(data);
                                                                $(".ajax_wishlist_alert").load("<?= PATH ?>/views/alert/alert_success.php");
                                                            },
                                                            error: function() {
                                                                alert('Error!');
                                                            },
                                                        })

                                                    })
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <a href="product-details.html">
                                        <div>
                                            <img src="<?= $product['img'] ?>" class="card-img-top" alt="...">
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <div class="product-info">
                                            <a href="javascript:;">
                                                <p class="product-catergory font-13 mb-1">
                                                    <?php
                                                    $category_id = $product['category_id'];
                                                    require_once __DIR__ . '/../models/Category.php';
                                                    $ResultReadCategoryById = new \Models\Category;
                                                    $ResultReadCategoryById = $ResultReadCategoryById->read_category_by_id($category_id);
                                                    foreach ($ResultReadCategoryById as $category) {
                                                        echo $category['title'];
                                                    }
                                                    ?>
                                                </p>
                                            </a>
                                            <a href="javascript:;">
                                                <h6 class="product-name mb-2">
                                                    <?php

                                                    $product_title = $product['title'];
                                                    $product_title = substr($product_title, 0, 30);
                                                    $product_title = rtrim($product_title, "!,.-");
                                                    $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                    echo $product_title . "… ";

                                                    ?>
                                                </h6>
                                            </a>
                                            <div class="d-flex align-items-center">
                                                <div class="mb-1 product-price">
                                                    <span class="me-1 text-decoration-line-through">
                                                        <?php
                                                        if (!$product['old_price'] == 0) {
                                                            echo ("&#8381;" . $product['old_price']);
                                                        }
                                                        ?>
                                                    </span>
                                                    <span class="fs-5">&#8381;<?= $product['price'] ?></span>
                                                </div>
                                                <div class="cursor-pointer ms-auto">
                                                    <?= $product['average_rating'] ?>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                    <i class="bx bxs-star text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="product-action mt-2">
                                                <div class="d-grid gap-2">
                                                    <div class="btn btn-dark btn-ecomm product_cart_<?= $product['id'] ?>_1">
                                                        <i class='bx bxs-cart-add'></i>
                                                        <div class="d-none cart_<?= $product['id'] ?>_1"><?= $product['id'] ?></div>Добавить в корзину
                                                    </div>
                                                    <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Быстрый просмотр</a>
                                                </div>
                                            </div>
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                                            <script>
                                                $(document).ready(function() {
                                                    $('.product_cart_<?= $product['id'] ?>_1').on('click', function(e) {
                                                        e.preventDefault();
                                                        const id = $('.cart_<?= $product['id'] ?>_1').text() ? $('.cart_<?= $product['id'] ?>_1').text() : 1;
                                                        $.ajax({
                                                            url: 'http://localhost/handlers/cart.php',
                                                            type: 'POST',
                                                            data: {
                                                                id: id,
                                                            },
                                                            success: function(data) {
                                                                console.log(data);
                                                                $(".ajax_cart_alert").load("<?= PATH ?>/views/alert/cart_alert_success.php");
                                                            },
                                                            error: function() {
                                                                alert('Error!');
                                                            },
                                                        })

                                                    })
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end Featured product-->
        <!--start New Arrivals-->
        <section class="py-4">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-uppercase mb-0">Новые Поступления</h5>
                    <a href="javascript:;" class="btn btn-dark ms-auto rounded-0">Просмотреть Все<i class='bx bx-chevron-right'></i></a>
                </div>
                <hr />
                <div class="product-grid">
                    <div class="new-arrivals owl-carousel owl-theme">
                        <?php foreach ($ResultSortProductsById as $product_by_id) { ?>
                            <div class="item">
                                <div class="card rounded-0 product-card">
                                    <div class="card-header bg-transparent border-bottom-0">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div class="product-wishlist product-wishlist_<?= $product_by_id['id'] ?>_2">
                                                <div class="d-none wishlist_<?= $product_by_id['id'] ?>">
                                                    <?= $product_by_id['id'] ?>
                                                </div>

                                                <i class='bx bx-heart'></i>
                                            </div>
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

                                            <script>
                                                $(document).ready(function() {
                                                    $('.product-wishlist_<?= $product_by_id['id'] ?>_2').on('click', function(e) {
                                                        e.preventDefault();
                                                        const id = $('.wishlist_<?= $product_by_id['id'] ?>').text() ? $('.wishlist_<?= $product_by_id['id'] ?>').text() : 1;
                                                        $.ajax({
                                                            url: 'http://localhost/handlers/wishlist.php',
                                                            type: 'POST',
                                                            data: {
                                                                id: id,
                                                            },
                                                            success: function(data) {
                                                                console.log(data);
                                                                $(".ajax_wishlist_alert").load("<?= PATH ?>/views/alert/alert_success.php");
                                                            },
                                                            error: function() {
                                                                alert('Error!');
                                                            },
                                                        })

                                                    })
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <a href="product-details.html">
                                        <img src="<?= $product_by_id['img'] ?>" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <div class="product-info">
                                            <a href="javascript:;">
                                                <p class="product-catergory font-13 mb-1">
                                                    <?php
                                                    $category_id = $product_by_id['category_id'];
                                                    require_once __DIR__ . '/../models/Category.php';
                                                    $ResultReadCategoryById = new \Models\Category;
                                                    $ResultReadCategoryById = $ResultReadCategoryById->read_category_by_id($category_id);
                                                    foreach ($ResultReadCategoryById as $category) {
                                                    }
                                                    $category_title = $category['title'];
                                                    $category_title = substr($category_title, 0, 50);
                                                    $category_title = rtrim($category_title, "!,.-");
                                                    $category_title = substr($category_title, 0, strrpos($category_title, ' '));
                                                    echo $category_title . "… ";
                                                    ?>
                                                </p>
                                            </a>
                                            <a href="javascript:;">
                                                <h6 class="product-name mb-2">
                                                    <?php

                                                    $product_title = $product_by_id['title'];
                                                    $product_title = substr($product_title, 0, 30);
                                                    $product_title = rtrim($product_title, "!,.-");
                                                    $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                    echo $product_title . "… ";

                                                    ?>
                                                </h6>
                                            </a>
                                            <div class="d-flex align-items-center">
                                                <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                        <?php
                                                        if (!$product_by_id['old_price'] == 0) {
                                                            echo ("&#8381;" . $product_by_id['old_price']);
                                                        }
                                                        ?>
                                                    </span>
                                                    <span class="fs-5">&#8381;<?= $product_by_id['price'] ?></span>
                                                </div>
                                                <div class="cursor-pointer ms-auto"> <span><?= $product_by_id['average_rating'] ?></span> <i class="bx bxs-star text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="product-action mt-2">
                                                <div class="d-grid gap-2">
                                                    <div class="btn btn-dark btn-ecomm product_cart_<?= $product_by_id['id'] ?>_2"> <i class='bx bxs-cart-add'></i>
                                                        <div class="d-none cart_<?= $product_by_id['id'] ?>_2"><?= $product_by_id['id'] ?> </div>Добавить в корзину
                                                    </div>
                                                    <a href="javascript:;" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Быстрый просмотр</a>
                                                </div>
                                            </div>
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                                            <script>
                                                $(document).ready(function() {
                                                    $('.product_cart_<?= $product_by_id['id'] ?>_2').on('click', function(e) {
                                                        e.preventDefault();
                                                        const id = $('.cart_<?= $product_by_id['id'] ?>_2').text() ? $('.cart_<?= $product_by_id['id'] ?>_2').text() : 1;
                                                        $.ajax({
                                                            url: 'http://localhost/handlers/cart.php',
                                                            type: 'POST',
                                                            data: {
                                                                id: id,
                                                            },
                                                            success: function(data) {
                                                                console.log(data);
                                                                $(".ajax_cart_alert").load("<?= PATH ?>/views/alert/cart_alert_success.php");
                                                            },
                                                            error: function() {
                                                                alert('Error!');
                                                            },
                                                        })

                                                    })
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--end New Arrivals-->
        <!--start Advertise banners-->
        <section class="py-4">
            <div class="container">
                <div class="add-banner">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100 border shadow-none">
                                <img src="assets/images/promo/04.png" class="card-img-top" alt="...">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-10%</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Продажа солнцезащитных очков</h5>
                                    <p class="card-text">Посмотрите все солнцезащитные очки и получите скидку 10%</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">ПОДОБРАТЬ ОЧКИ</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100 border shadow-none">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-80%</span>
                                </div>
                                <div class="card-body text-center mt-5">
                                    <h5 class="card-title">Продажа косметики</h5>
                                    <p class="card-text">Покупайте косметические средства и получите скидку 30% на всю косметику</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">КОСМЕТИКА</a>
                                </div>
                                <img src="assets/images/promo/08.png" class="card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100 border shadow-none">
                                <img src="assets/images/promo/06.png" class="card-img h-100" alt="...">
                                <div class="card-img-overlay text-center top-20">
                                    <div class="border border-white border-3 py-3 bg-dark-3">
                                        <h5 class="card-title text-white">Модная Летняя Распродажа</h5>
                                        <p class="card-text text-uppercase fs-1 lh-1 mt-3 mb-2 text-white">Скидка до 80%</p>
                                        <p class="card-text fs-5 text-white">Лучшие Модные Бренды</p> <a href="javascript:;" class="btn btn-white btn-ecomm">Одежда</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100 border shadow-none">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class="">-50%</span>
                                </div>
                                <div class="card-body text-center">
                                    <img src="assets/images/promo/07.png" class="card-img-top" alt="...">
                                    <h5 class="card-title fs-2 text-uppercase ">Супер Распродажа</h5>
                                    <p class="card-text text-uppercase fs-4 lh-1 mb-2">Скидка до 50%</p>
                                    <p class="card-text">На Всю Электронику</p> <a href="javascript:;" class="btn btn-dark btn-ecomm">ПОТОРОПИТЕСь!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end Advertise banners-->
        <!--start categories-->
        <section class="py-4">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-uppercase mb-0">Выбрать категорию</h5>
                    <a href="shop-categories.html" class="btn btn-dark ms-auto rounded-0">Просмотреть Все<i class='bx bx-chevron-right'></i></a>
                </div>
                <hr />
                <div class="product-grid">

                    <div class="browse-category owl-carousel owl-theme">
                        <?php foreach ($ResultReadCategories as $category) { ?>
                            <div class="item">
                                <div class="card rounded-0 product-card border">
                                    <div class="card-body">
                                        <img src="<?= $category['img'] ?>" class="img-fluid" alt="...">
                                    </div>
                                    <div class="card-footer text-center">
                                        <h6 class="mb-1 text-uppercase"><?= $category['title'] ?></h6>
                                        <p class="mb-0 font-12 text-uppercase">
                                            <?php
                                            $category_id = $category['id'];
                                            //считаем товары в категориях
                                            $ResultReadProductsByCategoryId = new \Models\Category;
                                            $ResultReadProductsByCategoryId = $ResultReadProductsByCategoryId->read_products_by_id($category_id);
                                            $i = 0;
                                            foreach ($ResultReadProductsByCategoryId as $products) {
                                                $i++;
                                            }
                                            // echo $i;
                                            //выводим подкатегории
                                            $ResultReadCategoryByParentId = new \Models\Category;
                                            $ResultReadCategoryByParentId = $ResultReadCategoryByParentId->read_category_by_parent_id($category_id);
                                            foreach ($ResultReadCategoryByParentId as $subcategory) {
                                                $category_id = $subcategory['id'];
                                                //считаем товары в подкатегориях
                                                $ResultReadProductsByCategoryId = new \Models\Category;
                                                $ResultReadProductsByCategoryId = $ResultReadProductsByCategoryId->read_products_by_id($category_id);
                                                foreach ($ResultReadProductsByCategoryId as $products) {
                                                    $i++;
                                                }
                                            }
                                            echo $i;
                                            $last = $i % 10;
                                            ?>

                                            Товар<?php
                                                    if ($last == 0) {
                                                        echo ("ов");
                                                    }
                                                    if ($last == 1) {
                                                        echo ("");
                                                    }
                                                    if ($last >= 2 && $last < 5) {
                                                        echo ("a");
                                                    }
                                                    if ($last >= 5 && $last <= 9) {
                                                        echo ("ов");
                                                    }
                                                    ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </section>
        <!--end categories-->
        <!--start support info-->
        <section class="py-4 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">
                    <div class="col">
                        <div class="text-center">
                            <div class="font-50"> <i class='bx bx-cart'></i>
                            </div>
                            <h2 class="fs-5 text-uppercase mb-0">Бесплатная доставка</h2>
                            <p class="text-capitalize">Бесплатная доставка</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <div class="font-50"> <i class='bx bx-credit-card'></i>
                            </div>
                            <h2 class="fs-5 text-uppercase mb-0">Безопасный платеж</h2>
                            <p class="text-capitalize">У нас есть сертификат SSL</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <div class="font-50"> <i class='bx bx-dollar-circle'></i>
                            </div>
                            <h2 class="fs-5 text-uppercase mb-0">Бесплатные возвраты</h2>
                            <p class="text-capitalize">Возврат денег в течение 30 дней</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <div class="font-50"> <i class='bx bx-support'></i>
                            </div>
                            <h2 class="fs-5 text-uppercase mb-0">служба поддержки</h2>
                            <p class="text-capitalize">Дружественная поддержка клиентов 24/7</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end support info-->
        <!--start brands-->
        <section class="py-4">
            <div class="container">
                <h3 class="d-flex text-uppercase fs-5">Бренды</h3>
                <div class="brand-grid">
                    <div class="brands-shops owl-carousel owl-theme border">
                        <?php
                        $ResultReadBrands = new \Models\Brand;
                        $ResultReadBrands = $ResultReadBrands->read_brands();
                        foreach ($ResultReadBrands as $brands) {
                        ?>
                            <div class="item border-end">
                                <div class="p-4">
                                    <a href="javascript:;">
                                        <img src="
                                        <?php
                                        echo $brands['img'];
                                        ?>" class="img-fluid" alt="...">
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!--end brands-->
        <!--start bottom products section-->
        <section class="py-4 border-top">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                    <div class="col">
                        <div class="bestseller-list mb-3">
                            <h6 class="mb-3 text-uppercase">Самые Продаваемые Продукты</h6>
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="product-details.html">
                                        <img src="assets/images/products/01.png" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">Краткое Название Продукта</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </div>
                                    <p class="mb-0"><strong>&#8381;4190</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="product-details.html">
                                        <img src="assets/images/products/02.png" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </div>
                                    <p class="mb-0"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="product-details.html">
                                        <img src="assets/images/products/03.png" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </div>
                                    <p class="mb-0"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="product-details.html">
                                        <img src="assets/images/products/04.png" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </div>
                                    <p class="mb-0"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="featured-list mb-3">
                            <h6 class="mb-3 text-uppercase">Рекомендуемые продукты</h6>
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="product-details.html">
                                        <img src="assets/images/products/05.png" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">Краткое Название Продукта</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </div>
                                    <p class="mb-0"><strong>&#8381;4190</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="product-details.html">
                                        <img src="assets/images/products/06.png" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </div>
                                    <p class="mb-0"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="product-details.html">
                                        <img src="assets/images/products/07.png" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </div>
                                    <p class="mb-0"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="product-details.html">
                                        <img src="assets/images/products/08.png" width="100" alt="">
                                    </a>
                                </div>
                                <div class="ms-0">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                    </div>
                                    <p class="mb-0"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="new-arrivals-list mb-3">
                            <h6 class="mb-3 text-uppercase">Новые поступления</h6>
                            <?php
                            $ResultSortProductsByIdLimit4 = new \Models\Product;
                            $ResultSortProductsByIdLimit4 = $ResultSortProductsByIdLimit4->sort_products_by_id_limit4();
                            foreach ($ResultSortProductsByIdLimit4 as $product) {

                            ?>
                                <div class="d-flex align-items-center">
                                    <div class="bottom-product-img">
                                        <a href="jproduct-details.html">
                                            <img src="<?= $product['img'] ?>" width="100" alt="">
                                        </a>
                                    </div>
                                    <div class="ms-0">
                                        <h6 class="mb-0 fw-light mb-1">

                                            <?php
                                            $product_title = $product['title'];
                                            $product_title = substr($product_title, 0, 30);
                                            $product_title = rtrim($product_title, "!,.-");
                                            $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                            echo $product_title . "… ";
                                            ?>
                                        </h6>
                                        <div class="rating font-12">
                                            <?php
                                            $product_rating = $product['average_rating'];
                                            $product_rating = round($product_rating);
                                            for ($i = 0; $i < $product_rating; $i++) {
                                                echo ('<i class="bx bxs-star text-warning"></i>');
                                            }
                                            ?>
                                        </div>
                                        <p class="mb-0"><strong>&#8381;<?= $product['price'] ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <hr />
                            <?php  } ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="top-rated-products-list mb-3">
                            <h6 class="mb-3 text-uppercase"> Высокий рейтинг</h6>
                            <?php
                            $ResultSortProductsByRatingLimit4 = new \Models\Product;
                            $ResultSortProductsByRatingLimit4 = $ResultSortProductsByRatingLimit4->sort_products_by_rating_limit4();
                            foreach ($ResultSortProductsByRatingLimit4 as $product) {

                            ?>
                                <div class="d-flex align-items-center">
                                    <div class="bottom-product-img">
                                        <a href="product-details.html">
                                            <img src="<?= $product['img'] ?>" width="100" alt="">
                                        </a>
                                    </div>
                                    <div class="ms-0">
                                        <h6 class="mb-0 fw-light mb-1">
                                            <?php
                                            $product_title = $product['title'];
                                            $product_title = substr($product_title, 0, 20);
                                            $product_title = rtrim($product_title, "!,.-");
                                            $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                            echo $product_title . "… ";
                                            ?>
                                        </h6>
                                        <div class="rating font-12">
                                            <?php
                                            $product_rating = $product['average_rating'];
                                            $product_rating = round($product_rating);
                                            for ($i = 0; $i < $product_rating; $i++) {
                                                echo ('<i class="bx bxs-star text-warning"></i>');
                                            }
                                            ?>
                                        </div>
                                        <p class="mb-0"><strong>&#8381;<?= $product['price'] ?></strong>
                                        </p>
                                    </div>
                                </div>
                                <hr />
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end bottom products section-->
    </div>
</div>
<!--end page wrapper -->

<!--start quick view product-->
<!-- Modal -->
<div class="modal fade" id="QuickViewProduct">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
        <div class="modal-content rounded-0 border-0">
            <div class="modal-body">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                <div class="row g-0">
                    <div class="col-12 col-lg-6">
                        <div class="image-zoom-section">
                            <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                <div class="item">
                                    <img src="assets/images/product-gallery/01.png" class="img-fluid" alt="">
                                </div>
                                <div class="item">
                                    <img src="assets/images/product-gallery/02.png" class="img-fluid" alt="">
                                </div>
                                <div class="item">
                                    <img src="assets/images/product-gallery/03.png" class="img-fluid" alt="">
                                </div>
                                <div class="item">
                                    <img src="assets/images/product-gallery/04.png" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                <button class="owl-thumb-item">
                                    <img src="assets/images/product-gallery/01.png" class="" alt="">
                                </button>
                                <button class="owl-thumb-item">
                                    <img src="assets/images/product-gallery/02.png" class="" alt="">
                                </button>
                                <button class="owl-thumb-item">
                                    <img src="assets/images/product-gallery/03.png" class="" alt="">
                                </button>
                                <button class="owl-thumb-item">
                                    <img src="assets/images/product-gallery/04.png" class="" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="product-info-section p-3">
                            <h3 class="mt-3 mt-lg-0 mb-0">Allen Solly Men's Polo T-Shirt</h3>
                            <div class="product-rating d-flex align-items-center mt-2">
                                <div class="rates cursor-pointer font-13"> <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-light-4"></i>
                                </div>
                                <div class="ms-1">
                                    <p class="mb-0">(Рейтинг: 24)</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3 gap-2">
                                <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;6960.00</h5>
                                <h4 class="mb-0">&#8381;3480</h4>
                            </div>
                            <div class="mt-3">
                                <h6>Описание :</h6>
                                <p class="mb-0">Virgil Abloh’s Off-White - это коллекция, вдохновленная уличной одеждой, которая продолжает отрываться от условностей мейнстрим-моды. Эти черно-коричневые кроссовки с низким верхом Odsy-1000 сделаны в Италии.</p>
                            </div>
                            <dl class="row mt-3">
                                <dt class="col-sm-3">ID</dt>
                                <dd class="col-sm-9">#BHU5879</dd>
                                <dt class="col-sm-3">Доставка</dt>
                                <dd class="col-sm-9">Россия</dd>
                            </dl>
                            <div class="row row-cols-auto align-items-center mt-3">
                                <div class="col">
                                    <label class="form-label">Количество</label>
                                    <select class="form-select form-select-sm">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Размер</label>
                                    <select class="form-select form-select-sm">
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XS</option>
                                        <option>XL</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Цвета</label>
                                    <div class="color-indigators d-flex align-items-center gap-2">
                                        <div class="color-indigator-item bg-primary"></div>
                                        <div class="color-indigator-item bg-danger"></div>
                                        <div class="color-indigator-item bg-success"></div>
                                        <div class="color-indigator-item bg-warning"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <div class="d-flex gap-2 mt-3">
                                <a href="javascript:;" class="btn btn-dark btn-ecomm product_cart_<?= $product['id'] ?>">
                                    <i class="bx bxs-cart-add"></i>
                                    <div class="d-none cart_<?= $product['id'] ?>">
                                        <?= $product['id'] ?>
                                    </div>Добавить в корзину
                                </a>
                                <a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-heart"></i>Добавить в избранное</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
</div>
<!--end quick view product-->