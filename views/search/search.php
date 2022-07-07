<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js" integrity="sha512-1mDhG//LAjM3pLXCJyaA+4c+h5qmMoTc7IuJyuNNPaakrWT9rVTxICK4tIizf7YwJsXgDC2JP74PGCc7qxLAHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="ajax_wishlist_alert">
</div>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Товары</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="<?= PATH ?>"><i class="bx bx-home-alt"></i> Главная</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Магазин</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Поиск</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop area-->
        <section class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-3">
                        <div class="btn-mobile-filter d-xl-none"><i class='bx bx-slider-alt'></i>
                        </div>

                        <?php require_once __DIR__ . '/sidebar.php'; ?>

                    </div>
                    <div class="col-12 col-xl-9">
                        <div class="product-wrapper">
                            <div class="toolbox d-flex align-items-center mb-3 gap-2">
                                <div class="d-flex flex-wrap flex-grow-1 gap-1">
                                    <div class="d-flex align-items-center flex-nowrap">
                                        <p class="mb-0 font-13 text-nowrap">Сортировка:</p>
                                        <select class="form-select ms-3 rounded-0 ajax_sort_select" name="sort">
                                            <option value="menu_order" class="ajax_sort" selected="selected" disabled>По умолчанию</option>
                                            <option value="popularity" class="ajax_sort">По популярности</option>
                                            <option value="rating" class="ajax_sort">По рейтингу</option>
                                            <option value="date" class="ajax_sort">По новизне</option>
                                            <option value="price" class="ajax_sort">По цене: от низкой к высокой</option>
                                            <option value="price-desc" class="ajax_sort">По цене: от высокой к низкой</option>
                                        </select>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $('.ajax_sort_select').on('click', function(e) {
                                                e.preventDefault();
                                                const sort = $('.ajax_sort_select option:selected').val();
                                                const category = <?= $_GET['category'] ?>;
                                                $.ajax({
                                                    url: 'http://localhost/handlers/search/sort.php',
                                                    type: 'POST',
                                                    data: {
                                                        sort: sort,
                                                        category: category,
                                                    },
                                                    success: function(data) {
                                                        console.log(data);
                                                        window.location = data;

                                                    },
                                                    error: function() {
                                                        alert('Error!');
                                                    },
                                                })

                                            })
                                        });
                                    </script>
                                </div>
                                <div class="d-flex flex-wrap">
                                    <div class="d-flex align-items-center flex-nowrap">
                                        <p class="mb-0 font-13 text-nowrap">Show:</p>
                                        <select class="form-select ms-3 rounded-0">
                                            <option>9</option>
                                            <option>12</option>
                                            <option>16</option>
                                            <option>20</option>
                                            <option>50</option>
                                            <option>100</option>
                                        </select>
                                    </div>
                                </div>
                                <div> <a href="shop-grid-left-sidebar.html" class="btn btn-white rounded-0"><i class='bx bxs-grid me-0'></i></a>
                                </div>
                                <div> <a href="shop-list-left-sidebar.html" class="btn btn-light rounded-0"><i class='bx bx-list-ul me-0'></i></a>
                                </div>
                            </div>

                            <!-- здесь выводятся товары -->

                            <div class="product-grid">
                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 ajax_products">
                                    <?php if ($_GET['category'] !== 0 && (!isset($_GET['search'])) && (!isset($_GET['min_price'])) && (!isset($_GET['size'])) && (!isset($_GET['brand'])) && (!isset($_GET['sort']))) {
                                        $category_id = $_GET['category'];
                                        // для каждой категории находим 4 подкатегории
                                        $ResultReadCategoryByParentId = new \Models\Category;
                                        $ResultReadCategoryByParentId = $ResultReadCategoryByParentId->read_category_by_parent_id($category_id);
                                        // для каждой подкатегории находим товары
                                        foreach ($ResultReadCategoryByParentId as $subcategory) {
                                            $category_id = $subcategory['id'];
                                            $sql = "SELECT * FROM product WHERE category_id=$category_id";
                                            if (isset($_GET['min'])) {
                                                $min_price = $_GET['min_price'];
                                                $max_price = $_GET['max_price'];

                                                $sql = "SELECT * FROM product WHERE category_id=$category_id AND `price` BETWEEN $min_price AND $max_price";
                                            }

                                            $ResultReadProductsSearchBySql = new \Models\Product;
                                            $ResultReadProductsSearchBySql = $ResultReadProductsSearchBySql->read_products_search_by_sql($sql);

                                            foreach ($ResultReadProductsSearchBySql as $products) { ?>

                                                <div class="col price_range">
                                                    <div class="card rounded-0 product-card">
                                                        <div class="card-header bg-transparent border-bottom-0">
                                                            <div class="d-flex align-items-center justify-content-end gap-3">
                                                                <a href="javascript:;">
                                                                    <div class="product-compare"><span><i class="bx bx-git-compare"></i> Сравнить</span>
                                                                    </div>
                                                                </a>
                                                                <div class="product-wishlist product-wishlist_<?= $products['id'] ?>_3">
                                                                    <div class="d-none wishlist_<?= $products['id'] ?>_3">
                                                                        <?= $products['id'] ?>
                                                                    </div>

                                                                    <i class='bx bx-heart'></i>
                                                                </div>
                                                                <script>
                                                                    $(document).ready(function() {
                                                                        $('.product-wishlist_<?= $products['id'] ?>_3').on('click', function(e) {
                                                                            e.preventDefault();
                                                                            const id = $('.wishlist_<?= $products['id'] ?>_3').text() ? $('.wishlist_<?= $products['id'] ?>_3').text() : 1;
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
                                                        <img src="<?= PATH . '/' . $products['img'] ?>" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <div class="product-info">
                                                                <a href="javascript:;">
                                                                    <p class="product-catergory font-13 mb-1"><?= $category['title'] ?></p>
                                                                </a>
                                                                <a href="javascript:;">
                                                                    <h6 class="product-name mb-2">
                                                                        <?php
                                                                        $product_title = $products['title'];
                                                                        $product_title = substr($product_title, 0, 30);
                                                                        $product_title = rtrim($product_title, "!,.-");
                                                                        $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                        echo $product_title . "… ";
                                                                        ?>
                                                                    </h6>
                                                                </a>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                                            &#8381;<?= $products['old_price'] ?></span>
                                                                        <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                                    </div>
                                                                    <div class="cursor-pointer ms-auto">
                                                                        <?php
                                                                        $rating = $products['average_rating'];
                                                                        $rating = round($rating);
                                                                        for ($i = 0; $i < $rating; $i++) {
                                                                        ?>
                                                                            <i class="bx bxs-star text-warning"></i>
                                                                        <?php } ?>


                                                                    </div>
                                                                </div>
                                                                <div class="product-action mt-2">
                                                                    <div class="d-grid gap-2">
                                                                        <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
                                                                        <a href="javascript:;" class="btn btn-light btn-ecomm view_<?= $products['id'] ?>_1" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?= $products['id'] ?>"><i class="bx bx-zoom-in"></i>Быстрый просмотр</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="QuickViewProduct<?= $products['id'] ?>">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                        <div class="modal-content rounded-0 border-0">
                                                            <div class="modal-body">
                                                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                                <div class="row g-0">
                                                                    <div class="col-12 col-lg-6">
                                                                        <div class="image-zoom-section">
                                                                            <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                                <div class="item">
                                                                                    <img src="<?= PATH . '/' . $products['img'] ?>" class="img-fluid" alt="">
                                                                                </div>

                                                                                <?php
                                                                                $product_id = $products['id'];
                                                                                $ResultReadProductById = new \Models\Product;
                                                                                $ResultReadProductById = $ResultReadProductById->read_product_gallery_by_id($product_id);
                                                                                foreach ($ResultReadProductById as $product_image) {

                                                                                ?>

                                                                                    <div class="item">
                                                                                        <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="img-fluid" alt="">
                                                                                    </div>

                                                                                <?php } ?>

                                                                            </div>
                                                                            <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                                <button class="owl-thumb-item">
                                                                                    <img src="<?= PATH . '/' . $products['img'] ?>" class="" alt="">
                                                                                </button>

                                                                                <?php foreach ($ResultReadProductById as $product_image) { ?>
                                                                                    <button class="owl-thumb-item">
                                                                                        <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="" alt="">
                                                                                    </button>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-6">
                                                                        <div class="product-info-section p-3">
                                                                            <h3 class="mt-3 mt-lg-0 mb-0"><?= $products['title'] ?></h3>
                                                                            <div class="product-rating d-flex align-items-center mt-2">
                                                                                <div class="rates cursor-pointer font-13">

                                                                                    <?php
                                                                                    $rating = $products['average_rating'];
                                                                                    $rating = round($rating);
                                                                                    for ($i = 0; $i < $rating; $i++) {
                                                                                    ?>
                                                                                        <i class="bx bxs-star text-warning"></i>
                                                                                    <?php } ?>

                                                                                </div>
                                                                                <div class="ms-1">
                                                                                    <p class="mb-0">(<?= $products['total_rating'] ?> Рейтинг)</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                                                <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;<?= $products['old_price'] ?></h5>
                                                                                <h4 class="mb-0">&#8381;<?= $products['price'] ?></h4>
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <h6>Описание :</h6>
                                                                                <p class="mb-0"><?= $products['description'] ?></p>
                                                                            </div>
                                                                            <dl class="row mt-3">
                                                                                <dt class="col-sm-3">Id товара:</dt>
                                                                                <dd class="col-sm-9"><?= $products['id'] ?></dd>
                                                                            </dl>
                                                                            <div class="row row-cols-auto align-items-center mt-3">
                                                                                <div class="col">
                                                                                    <label class="form-label">Количество:</label>
                                                                                    <select class="form-select form-select-sm">
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label class="form-label">Размер:</label>
                                                                                    <select class="form-select form-select-sm">
                                                                                        <?php

                                                                                        $product_id = $products['id'];
                                                                                        $ResultReadProductSizeById = new \Models\Product;
                                                                                        $ResultReadProductSizeById = $ResultReadProductSizeById->read_product_size_by_id($product_id);
                                                                                        foreach ($ResultReadProductSizeById as $product_size) {

                                                                                        ?>
                                                                                            <option><?= $product_size['size'] ?></option>

                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label class="form-label">Цвета:</label>
                                                                                    <select class="form-select form-select-sm">
                                                                                        <?php

                                                                                        $product_id = $products['id'];
                                                                                        $ResultReadProductColorById = new \Models\Product;
                                                                                        $ResultReadProductColorById = $ResultReadProductColorById->read_product_color_by_id($product_id);
                                                                                        foreach ($ResultReadProductColorById as $product_color) {

                                                                                        ?>
                                                                                            <option><?= $product_color['color'] ?></option>

                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <!--end row-->
                                                                            <div class="d-flex gap-2 mt-3">
                                                                                <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
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

                                                <!-- добавляем просмотры -->

                                                <script>
                                                    $(document).ready(function() {
                                                        $('.view_<?= $products['id'] ?>_1').on('click', function(e) {
                                                            e.preventDefault();
                                                            const id = <?= $products['id'] ?>;
                                                            $.ajax({
                                                                url: 'http://localhost/handlers/search/view.php',
                                                                type: 'POST',
                                                                data: {
                                                                    id: id,
                                                                },
                                                                success: function(data) {
                                                                    console.log(data);
                                                                },
                                                                error: function() {
                                                                    alert('Error!');
                                                                },
                                                            })

                                                        })
                                                    });
                                                </script>

                                                <!-- добавляем просмотры -->

                                            <?php } ?>

                                            <?php
                                            // для каждой подкатегории находим подкатегории 3 уровня
                                            $ResultReadCategoryByParent_3_Id = new \Models\Category;
                                            $ResultReadCategoryByParent_3_Id = $ResultReadCategoryByParent_3_Id->read_category_by_parent_id($category_id);
                                            // для каждой подкатегории 3 уровня находим товары
                                            foreach ($ResultReadCategoryByParent_3_Id as $subcategory_3) {

                                                $category_id = $subcategory_3['id'];
                                                $ResultReadProductsByCategory_3_Id = new \Models\Product;
                                                $ResultReadProductsByCategory_3_Id = $ResultReadProductsByCategory_3_Id->read_products_by_category_id($category_id);
                                                foreach ($ResultReadProductsByCategory_3_Id as $products) { ?>

                                                    <div class="col price_range">
                                                        <div class="card rounded-0 product-card">
                                                            <div class="card-header bg-transparent border-bottom-0">
                                                                <div class="d-flex align-items-center justify-content-end gap-3">
                                                                    <a href="javascript:;">
                                                                        <div class="product-compare"><span><i class="bx bx-git-compare"></i> Сравнить</span>
                                                                        </div>
                                                                    </a>
                                                                    <div class="product-wishlist product-wishlist_<?= $products['id'] ?>_4">
                                                                        <div class="d-none wishlist_<?= $products['id'] ?>_4">
                                                                            <?= $products['id'] ?>
                                                                        </div>

                                                                        <i class='bx bx-heart'></i>
                                                                    </div>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            $('.product-wishlist_<?= $products['id'] ?>_4').on('click', function(e) {
                                                                                e.preventDefault();
                                                                                const id = $('.wishlist_<?= $products['id'] ?>_4').text() ? $('.wishlist_<?= $products['id'] ?>_4').text() : 1;
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
                                                            <img src="<?= PATH . '/' . $products['img'] ?>" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <div class="product-info">
                                                                    <a href="javascript:;">
                                                                        <p class="product-catergory font-13 mb-1"><?= $category['title'] ?></p>
                                                                    </a>
                                                                    <a href="javascript:;">
                                                                        <h6 class="product-name mb-2">
                                                                            <?php
                                                                            $product_title = $products['title'];
                                                                            $product_title = substr($product_title, 0, 30);
                                                                            $product_title = rtrim($product_title, "!,.-");
                                                                            $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                            echo $product_title . "… ";
                                                                            ?>
                                                                        </h6>
                                                                    </a>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                                                &#8381;<?= $products['old_price'] ?></span>
                                                                            <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                                        </div>
                                                                        <div class="cursor-pointer ms-auto">
                                                                            <?php
                                                                            $rating = $products['average_rating'];
                                                                            $rating = round($rating);
                                                                            for ($i = 0; $i < $rating; $i++) {
                                                                            ?>
                                                                                <i class="bx bxs-star text-warning"></i>
                                                                            <?php } ?>


                                                                        </div>
                                                                    </div>
                                                                    <div class="product-action mt-2">
                                                                        <div class="d-grid gap-2">
                                                                            <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
                                                                            <a href="javascript:;" class="btn btn-light btn-ecomm view_<?= $products['id'] ?>_2" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?= $products['id'] ?>"><i class="bx bx-zoom-in"></i>Быстрый просмотр</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="QuickViewProduct<?= $products['id'] ?>">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                            <div class="modal-content rounded-0 border-0">
                                                                <div class="modal-body">
                                                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                                    <div class="row g-0">
                                                                        <div class="col-12 col-lg-6">
                                                                            <div class="image-zoom-section">
                                                                                <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                                    <div class="item">
                                                                                        <img src="<?= PATH . '/' . $products['img'] ?>" class="img-fluid" alt="">
                                                                                    </div>

                                                                                    <?php
                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductById = new \Models\Product;
                                                                                    $ResultReadProductById = $ResultReadProductById->read_product_gallery_by_id($product_id);
                                                                                    foreach ($ResultReadProductById as $product_image) {

                                                                                    ?>

                                                                                        <div class="item">
                                                                                            <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="img-fluid" alt="">
                                                                                        </div>

                                                                                    <?php } ?>

                                                                                </div>
                                                                                <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                                    <button class="owl-thumb-item">
                                                                                        <img src="<?= PATH . '/' . $products['img'] ?>" class="" alt="">
                                                                                    </button>

                                                                                    <?php foreach ($ResultReadProductById as $product_image) { ?>
                                                                                        <button class="owl-thumb-item">
                                                                                            <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="" alt="">
                                                                                        </button>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6">
                                                                            <div class="product-info-section p-3">
                                                                                <h3 class="mt-3 mt-lg-0 mb-0"><?= $products['title'] ?></h3>
                                                                                <div class="product-rating d-flex align-items-center mt-2">
                                                                                    <div class="rates cursor-pointer font-13">

                                                                                        <?php
                                                                                        $rating = $products['average_rating'];
                                                                                        $rating = round($rating);
                                                                                        for ($i = 0; $i < $rating; $i++) {
                                                                                        ?>
                                                                                            <i class="bx bxs-star text-warning"></i>
                                                                                        <?php } ?>

                                                                                    </div>
                                                                                    <div class="ms-1">
                                                                                        <p class="mb-0">(<?= $products['total_rating'] ?> Рейтинг)</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-center mt-3 gap-2">
                                                                                    <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;<?= $products['old_price'] ?></h5>
                                                                                    <h4 class="mb-0">&#8381;<?= $products['price'] ?></h4>
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <h6>Описание :</h6>
                                                                                    <p class="mb-0"><?= $products['description'] ?></p>
                                                                                </div>
                                                                                <dl class="row mt-3">
                                                                                    <dt class="col-sm-3">Id товара:</dt>
                                                                                    <dd class="col-sm-9"><?= $products['id'] ?></dd>
                                                                                </dl>
                                                                                <div class="row row-cols-auto align-items-center mt-3">
                                                                                    <div class="col">
                                                                                        <label class="form-label">Количество:</label>
                                                                                        <select class="form-select form-select-sm">
                                                                                            <option>1</option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="form-label">Размер:</label>
                                                                                        <select class="form-select form-select-sm">
                                                                                            <?php

                                                                                            $product_id = $products['id'];
                                                                                            $ResultReadProductSizeById = new \Models\Product;
                                                                                            $ResultReadProductSizeById = $ResultReadProductSizeById->read_product_size_by_id($product_id);
                                                                                            foreach ($ResultReadProductSizeById as $product_size) {

                                                                                            ?>
                                                                                                <option><?= $product_size['size'] ?></option>

                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="form-label">Цвета:</label>
                                                                                        <select class="form-select form-select-sm">
                                                                                            <?php

                                                                                            $product_id = $products['id'];
                                                                                            $ResultReadProductColorById = new \Models\Product;
                                                                                            $ResultReadProductColorById = $ResultReadProductColorById->read_product_color_by_id($product_id);
                                                                                            foreach ($ResultReadProductColorById as $product_color) {

                                                                                            ?>
                                                                                                <option><?= $product_color['color'] ?></option>

                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <!--end row-->
                                                                                <div class="d-flex gap-2 mt-3">
                                                                                    <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
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

                                                    <!-- добавляем просмотры -->

                                                    <script>
                                                        $(document).ready(function() {
                                                            $('.view_<?= $products['id'] ?>_2').on('click', function(e) {
                                                                e.preventDefault();
                                                                const id = <?= $products['id'] ?>;
                                                                $.ajax({
                                                                    url: 'http://localhost/handlers/search/view.php',
                                                                    type: 'POST',
                                                                    data: {
                                                                        id: id,
                                                                    },
                                                                    success: function(data) {
                                                                        console.log(data);
                                                                    },
                                                                    error: function() {
                                                                        alert('Error!');
                                                                    },
                                                                })

                                                            })
                                                        });
                                                    </script>

                                                    <!-- добавляем просмотры -->

                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if (($_GET['category'] == 0 || (!isset($_GET['category']))) && (!isset($_GET['search'])) && (!isset($_GET['min_price'])) && (!isset($_GET['size'])) && (!isset($_GET['brand'])) && (!isset($_GET['sort']))) {
                                        $ResultReadProducts = new \Models\Product;
                                        $ResultReadProducts = $ResultReadProducts->read_products();
                                        foreach ($ResultReadProducts as $products) { ?>
                                            <div class="col price_range">
                                                <div class="card rounded-0 product-card">
                                                    <div class="card-header bg-transparent border-bottom-0">
                                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                                            <a href="javascript:;">
                                                                <div class="product-compare"><span><i class="bx bx-git-compare"></i> Сравнить</span>
                                                                </div>
                                                            </a>
                                                            <div class="product-wishlist product-wishlist_<?= $products['id'] ?>_5">
                                                                <div class="d-none wishlist_<?= $products['id'] ?>_5">
                                                                    <?= $products['id'] ?>
                                                                </div>

                                                                <i class='bx bx-heart'></i>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $('.product-wishlist_<?= $products['id'] ?>_5').on('click', function(e) {
                                                                        e.preventDefault();
                                                                        const id = $('.wishlist_<?= $products['id'] ?>_5').text() ? $('.wishlist_<?= $products['id'] ?>_5').text() : 1;
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
                                                    <img src="<?= PATH . '/' . $products['img'] ?>" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a href="javascript:;">
                                                                <p class="product-catergory font-13 mb-1"><?= $category['title'] ?></p>
                                                            </a>
                                                            <a href="javascript:;">
                                                                <h6 class="product-name mb-2">
                                                                    <?php
                                                                    $product_title = $products['title'];
                                                                    $product_title = substr($product_title, 0, 30);
                                                                    $product_title = rtrim($product_title, "!,.-");
                                                                    $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                    echo $product_title . "… ";
                                                                    ?>
                                                                </h6>
                                                            </a>
                                                            <div class="d-flex align-items-center">
                                                                <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                                        &#8381;<?= $products['old_price'] ?></span>
                                                                    <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                                </div>
                                                                <div class="cursor-pointer ms-auto">
                                                                    <?php
                                                                    $rating = $products['average_rating'];
                                                                    $rating = round($rating);
                                                                    for ($i = 0; $i < $rating; $i++) {
                                                                    ?>
                                                                        <i class="bx bxs-star text-warning"></i>
                                                                    <?php } ?>


                                                                </div>
                                                            </div>
                                                            <div class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
                                                                    <a href="javascript:;" class="btn btn-light btn-ecomm view_<?= $products['id'] ?>_3" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?= $products['id'] ?>"><i class="bx bx-zoom-in"></i>Быстрый просмотр</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="QuickViewProduct<?= $products['id'] ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                    <div class="modal-content rounded-0 border-0">
                                                        <div class="modal-body">
                                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                            <div class="row g-0">
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="image-zoom-section">
                                                                        <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                            <div class="item">
                                                                                <img src="<?= PATH . '/' . $products['img'] ?>" class="img-fluid" alt="">
                                                                            </div>

                                                                            <?php
                                                                            $product_id = $products['id'];
                                                                            $ResultReadProductById = new \Models\Product;
                                                                            $ResultReadProductById = $ResultReadProductById->read_product_gallery_by_id($product_id);
                                                                            foreach ($ResultReadProductById as $product_image) {

                                                                            ?>

                                                                                <div class="item">
                                                                                    <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="img-fluid" alt="">
                                                                                </div>

                                                                            <?php } ?>

                                                                        </div>
                                                                        <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                            <button class="owl-thumb-item">
                                                                                <img src="<?= PATH . '/' . $products['img'] ?>" class="" alt="">
                                                                            </button>

                                                                            <?php foreach ($ResultReadProductById as $product_image) { ?>
                                                                                <button class="owl-thumb-item">
                                                                                    <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="" alt="">
                                                                                </button>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="product-info-section p-3">
                                                                        <h3 class="mt-3 mt-lg-0 mb-0"><?= $products['title'] ?></h3>
                                                                        <div class="product-rating d-flex align-items-center mt-2">
                                                                            <div class="rates cursor-pointer font-13">

                                                                                <?php
                                                                                $rating = $products['average_rating'];
                                                                                $rating = round($rating);
                                                                                for ($i = 0; $i < $rating; $i++) {
                                                                                ?>
                                                                                    <i class="bx bxs-star text-warning"></i>
                                                                                <?php } ?>

                                                                            </div>
                                                                            <div class="ms-1">
                                                                                <p class="mb-0">(<?= $products['total_rating'] ?> Рейтинг)</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center mt-3 gap-2">
                                                                            <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;<?= $products['old_price'] ?></h5>
                                                                            <h4 class="mb-0">&#8381;<?= $products['price'] ?></h4>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <h6>Описание :</h6>
                                                                            <p class="mb-0"><?= $products['description'] ?></p>
                                                                        </div>
                                                                        <dl class="row mt-3">
                                                                            <dt class="col-sm-3">Id товара:</dt>
                                                                            <dd class="col-sm-9"><?= $products['id'] ?></dd>
                                                                        </dl>
                                                                        <div class="row row-cols-auto align-items-center mt-3">
                                                                            <div class="col">
                                                                                <label class="form-label">Количество:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label class="form-label">Размер:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <?php

                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductSizeById = new \Models\Product;
                                                                                    $ResultReadProductSizeById = $ResultReadProductSizeById->read_product_size_by_id($product_id);
                                                                                    foreach ($ResultReadProductSizeById as $product_size) {

                                                                                    ?>
                                                                                        <option><?= $product_size['size'] ?></option>

                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label class="form-label">Цвета:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <?php

                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductColorById = new \Models\Product;
                                                                                    $ResultReadProductColorById = $ResultReadProductColorById->read_product_color_by_id($product_id);
                                                                                    foreach ($ResultReadProductColorById as $product_color) {

                                                                                    ?>
                                                                                        <option><?= $product_color['color'] ?></option>

                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <!--end row-->
                                                                        <div class="d-flex gap-2 mt-3">
                                                                            <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
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

                                            <!-- добавляем просмотры -->

                                            <script>
                                                $(document).ready(function() {
                                                    $('.view_<?= $products['id'] ?>_3').on('click', function(e) {
                                                        e.preventDefault();
                                                        const id = <?= $products['id'] ?>;
                                                        $.ajax({
                                                            url: 'http://localhost/handlers/search/view.php',
                                                            type: 'POST',
                                                            data: {
                                                                id: id,
                                                            },
                                                            success: function(data) {
                                                                console.log(data);
                                                            },
                                                            error: function() {
                                                                alert('Error!');
                                                            },
                                                        })

                                                    })
                                                });
                                            </script>

                                            <!-- добавляем просмотры -->

                                        <?php } ?>
                                    <?php } ?>

                                    <?php if (isset($_GET['search']) && (!isset($_GET['min_price'])) && (!isset($_GET['sort']))) {
                                        $category_id = $_GET['category'];
                                        $search = $_GET['search'];
                                        $ResultReadProductsSearch = new \Models\Product;
                                        $ResultReadProductsSearch = $ResultReadProductsSearch->read_products_search($search, $category_id);
                                        foreach ($ResultReadProductsSearch as $products) {
                                    ?>
                                            <div class="col price_range">
                                                <div class="card rounded-0 product-card">
                                                    <div class="card-header bg-transparent border-bottom-0">
                                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                                            <a href="javascript:;">
                                                                <div class="product-compare"><span><i class="bx bx-git-compare"></i> Сравнить</span>
                                                                </div>
                                                            </a>
                                                            <div class="product-wishlist product-wishlist_<?= $products['id'] ?>_6">
                                                                <div class="d-none wishlist_<?= $products['id'] ?>_6">
                                                                    <?= $products['id'] ?>
                                                                </div>

                                                                <i class='bx bx-heart'></i>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $('.product-wishlist_<?= $products['id'] ?>_6').on('click', function(e) {
                                                                        e.preventDefault();
                                                                        const id = $('.wishlist_<?= $products['id'] ?>_6').text() ? $('.wishlist_<?= $products['id'] ?>_6').text() : 1;
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
                                                    <img src="<?= PATH . '/' . $products['img'] ?>" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a href="javascript:;">
                                                                <p class="product-catergory font-13 mb-1"><?= $category['title'] ?></p>
                                                            </a>
                                                            <a href="javascript:;">
                                                                <h6 class="product-name mb-2">
                                                                    <?php
                                                                    $product_title = $products['title'];
                                                                    $product_title = substr($product_title, 0, 30);
                                                                    $product_title = rtrim($product_title, "!,.-");
                                                                    $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                    echo $product_title . "… ";
                                                                    ?>
                                                                </h6>
                                                            </a>
                                                            <div class="d-flex align-items-center">
                                                                <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                                        &#8381;<?= $products['old_price'] ?></span>
                                                                    <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                                </div>
                                                                <div class="cursor-pointer ms-auto">
                                                                    <?php
                                                                    $rating = $products['average_rating'];
                                                                    $rating = round($rating);
                                                                    for ($i = 0; $i < $rating; $i++) {
                                                                    ?>
                                                                        <i class="bx bxs-star text-warning"></i>
                                                                    <?php } ?>


                                                                </div>
                                                            </div>
                                                            <div class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
                                                                    <a href="javascript:;" class="btn btn-light btn-ecomm view_<?= $products['id'] ?>_4" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?= $products['id'] ?>"><i class="bx bx-zoom-in"></i>Быстрый просмотр</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="QuickViewProduct<?= $products['id'] ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                    <div class="modal-content rounded-0 border-0">
                                                        <div class="modal-body">
                                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                            <div class="row g-0">
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="image-zoom-section">
                                                                        <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                            <div class="item">
                                                                                <img src="<?= PATH . '/' . $products['img'] ?>" class="img-fluid" alt="">
                                                                            </div>

                                                                            <?php
                                                                            $product_id = $products['id'];
                                                                            $ResultReadProductById = new \Models\Product;
                                                                            $ResultReadProductById = $ResultReadProductById->read_product_gallery_by_id($product_id);
                                                                            foreach ($ResultReadProductById as $product_image) {

                                                                            ?>

                                                                                <div class="item">
                                                                                    <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="img-fluid" alt="">
                                                                                </div>

                                                                            <?php } ?>

                                                                        </div>
                                                                        <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                            <button class="owl-thumb-item">
                                                                                <img src="<?= PATH . '/' . $products['img'] ?>" class="" alt="">
                                                                            </button>

                                                                            <?php foreach ($ResultReadProductById as $product_image) { ?>
                                                                                <button class="owl-thumb-item">
                                                                                    <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="" alt="">
                                                                                </button>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="product-info-section p-3">
                                                                        <h3 class="mt-3 mt-lg-0 mb-0"><?= $products['title'] ?></h3>
                                                                        <div class="product-rating d-flex align-items-center mt-2">
                                                                            <div class="rates cursor-pointer font-13">

                                                                                <?php
                                                                                $rating = $products['average_rating'];
                                                                                $rating = round($rating);
                                                                                for ($i = 0; $i < $rating; $i++) {
                                                                                ?>
                                                                                    <i class="bx bxs-star text-warning"></i>
                                                                                <?php } ?>

                                                                            </div>
                                                                            <div class="ms-1">
                                                                                <p class="mb-0">(<?= $products['total_rating'] ?> Рейтинг)</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center mt-3 gap-2">
                                                                            <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;<?= $products['old_price'] ?></h5>
                                                                            <h4 class="mb-0">&#8381;<?= $products['price'] ?></h4>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <h6>Описание :</h6>
                                                                            <p class="mb-0"><?= $products['description'] ?></p>
                                                                        </div>
                                                                        <dl class="row mt-3">
                                                                            <dt class="col-sm-3">Id товара:</dt>
                                                                            <dd class="col-sm-9"><?= $products['id'] ?></dd>
                                                                        </dl>
                                                                        <div class="row row-cols-auto align-items-center mt-3">
                                                                            <div class="col">
                                                                                <label class="form-label">Количество:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label class="form-label">Размер:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <?php

                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductSizeById = new \Models\Product;
                                                                                    $ResultReadProductSizeById = $ResultReadProductSizeById->read_product_size_by_id($product_id);
                                                                                    foreach ($ResultReadProductSizeById as $product_size) {

                                                                                    ?>
                                                                                        <option><?= $product_size['size'] ?></option>

                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label class="form-label">Цвета:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <?php

                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductColorById = new \Models\Product;
                                                                                    $ResultReadProductColorById = $ResultReadProductColorById->read_product_color_by_id($product_id);
                                                                                    foreach ($ResultReadProductColorById as $product_color) {

                                                                                    ?>
                                                                                        <option><?= $product_color['color'] ?></option>

                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <!--end row-->
                                                                        <div class="d-flex gap-2 mt-3">
                                                                            <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
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

                                            <!-- добавляем просмотры -->

                                            <script>
                                                $(document).ready(function() {
                                                    $('.view_<?= $products['id'] ?>_4').on('click', function(e) {
                                                        e.preventDefault();
                                                        const id = <?= $products['id'] ?>;
                                                        $.ajax({
                                                            url: 'http://localhost/handlers/search/view.php',
                                                            type: 'POST',
                                                            data: {
                                                                id: id,
                                                            },
                                                            success: function(data) {
                                                                console.log(data);
                                                            },
                                                            error: function() {
                                                                alert('Error!');
                                                            },
                                                        })

                                                    })
                                                });
                                            </script>

                                            <!-- добавляем просмотры -->

                                    <?php
                                        }
                                    }
                                    ?>

                                    <?php if (isset($_GET['min_price']) && (!isset($_GET['sort']))) {
                                        $category_id = $_GET['category'];
                                        $min_price = round($_GET['min_price']);
                                        $max_price = round($_GET['max_price']);

                                        // для каждой категории находим 4 подкатегории
                                        $ResultReadCategoryByParentId = new \Models\Category;
                                        $ResultReadCategoryByParentId = $ResultReadCategoryByParentId->read_category_by_parent_id($category_id);
                                        // для каждой категории находим 4 подкатегории

                                        // для каждой подкатегории находим товары
                                        foreach ($ResultReadCategoryByParentId as $subcategory) {
                                            $category_id = $subcategory['id'];
                                            $sql = "SELECT * FROM product WHERE category_id=$category_id AND `price` BETWEEN $min_price AND $max_price";

                                            $ResultReadProductsSearchBySql = new \Models\Product;
                                            $ResultReadProductsSearchBySql = $ResultReadProductsSearchBySql->read_products_search_by_sql($sql);

                                            foreach ($ResultReadProductsSearchBySql as $products) {
                                    ?>

                                                <div class="col price_range">
                                                    <div class="card rounded-0 product-card">
                                                        <div class="card-header bg-transparent border-bottom-0">
                                                            <div class="d-flex align-items-center justify-content-end gap-3">
                                                                <a href="javascript:;">
                                                                    <div class="product-compare"><span><i class="bx bx-git-compare"></i> Сравнить</span>
                                                                    </div>
                                                                </a>
                                                                <div class="product-wishlist product-wishlist_<?= $products['id'] ?>_7">
                                                                    <div class="d-none wishlist_<?= $products['id'] ?>_7">
                                                                        <?= $products['id'] ?>
                                                                    </div>

                                                                    <i class='bx bx-heart'></i>
                                                                </div>
                                                                <script>
                                                                    $(document).ready(function() {
                                                                        $('.product-wishlist_<?= $products['id'] ?>_7').on('click', function(e) {
                                                                            e.preventDefault();
                                                                            const id = $('.wishlist_<?= $products['id'] ?>_7').text() ? $('.wishlist_<?= $products['id'] ?>_7').text() : 1;
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
                                                        <img src="<?= PATH . '/' . $products['img'] ?>" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <div class="product-info">
                                                                <a href="javascript:;">
                                                                    <p class="product-catergory font-13 mb-1"><?= $category['title'] ?></p>
                                                                </a>
                                                                <a href="javascript:;">
                                                                    <h6 class="product-name mb-2">
                                                                        <?php
                                                                        $product_title = $products['title'];
                                                                        $product_title = substr($product_title, 0, 30);
                                                                        $product_title = rtrim($product_title, "!,.-");
                                                                        $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                        echo $product_title . "… ";
                                                                        ?>
                                                                    </h6>
                                                                </a>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                                            &#8381;<?= $products['old_price'] ?></span>
                                                                        <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                                    </div>
                                                                    <div class="cursor-pointer ms-auto">
                                                                        <?php
                                                                        $rating = $products['average_rating'];
                                                                        $rating = round($rating);
                                                                        for ($i = 0; $i < $rating; $i++) {
                                                                        ?>
                                                                            <i class="bx bxs-star text-warning"></i>
                                                                        <?php } ?>


                                                                    </div>
                                                                </div>
                                                                <div class="product-action mt-2">
                                                                    <div class="d-grid gap-2">
                                                                        <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
                                                                        <a href="javascript:;" class="btn btn-light btn-ecomm view_<?= $products['id'] ?>_5" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?= $products['id'] ?>"><i class="bx bx-zoom-in"></i>Быстрый просмотр</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="QuickViewProduct<?= $products['id'] ?>">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                        <div class="modal-content rounded-0 border-0">
                                                            <div class="modal-body">
                                                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                                <div class="row g-0">
                                                                    <div class="col-12 col-lg-6">
                                                                        <div class="image-zoom-section">
                                                                            <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                                <div class="item">
                                                                                    <img src="<?= PATH . '/' . $products['img'] ?>" class="img-fluid" alt="">
                                                                                </div>

                                                                                <?php
                                                                                $product_id = $products['id'];
                                                                                $ResultReadProductById = new \Models\Product;
                                                                                $ResultReadProductById = $ResultReadProductById->read_product_gallery_by_id($product_id);
                                                                                foreach ($ResultReadProductById as $product_image) {

                                                                                ?>

                                                                                    <div class="item">
                                                                                        <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="img-fluid" alt="">
                                                                                    </div>

                                                                                <?php } ?>

                                                                            </div>
                                                                            <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                                <button class="owl-thumb-item">
                                                                                    <img src="<?= PATH . '/' . $products['img'] ?>" class="" alt="">
                                                                                </button>

                                                                                <?php foreach ($ResultReadProductById as $product_image) { ?>
                                                                                    <button class="owl-thumb-item">
                                                                                        <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="" alt="">
                                                                                    </button>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-6">
                                                                        <div class="product-info-section p-3">
                                                                            <h3 class="mt-3 mt-lg-0 mb-0"><?= $products['title'] ?></h3>
                                                                            <div class="product-rating d-flex align-items-center mt-2">
                                                                                <div class="rates cursor-pointer font-13">

                                                                                    <?php
                                                                                    $rating = $products['average_rating'];
                                                                                    $rating = round($rating);
                                                                                    for ($i = 0; $i < $rating; $i++) {
                                                                                    ?>
                                                                                        <i class="bx bxs-star text-warning"></i>
                                                                                    <?php } ?>

                                                                                </div>
                                                                                <div class="ms-1">
                                                                                    <p class="mb-0">(<?= $products['total_rating'] ?> Рейтинг)</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                                                <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;<?= $products['old_price'] ?></h5>
                                                                                <h4 class="mb-0">&#8381;<?= $products['price'] ?></h4>
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <h6>Описание :</h6>
                                                                                <p class="mb-0"><?= $products['description'] ?></p>
                                                                            </div>
                                                                            <dl class="row mt-3">
                                                                                <dt class="col-sm-3">Id товара:</dt>
                                                                                <dd class="col-sm-9"><?= $products['id'] ?></dd>
                                                                            </dl>
                                                                            <div class="row row-cols-auto align-items-center mt-3">
                                                                                <div class="col">
                                                                                    <label class="form-label">Количество:</label>
                                                                                    <select class="form-select form-select-sm">
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label class="form-label">Размер:</label>
                                                                                    <select class="form-select form-select-sm">
                                                                                        <?php

                                                                                        $product_id = $products['id'];
                                                                                        $ResultReadProductSizeById = new \Models\Product;
                                                                                        $ResultReadProductSizeById = $ResultReadProductSizeById->read_product_size_by_id($product_id);
                                                                                        foreach ($ResultReadProductSizeById as $product_size) {

                                                                                        ?>
                                                                                            <option><?= $product_size['size'] ?></option>

                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label class="form-label">Цвета:</label>
                                                                                    <select class="form-select form-select-sm">
                                                                                        <?php

                                                                                        $product_id = $products['id'];
                                                                                        $ResultReadProductColorById = new \Models\Product;
                                                                                        $ResultReadProductColorById = $ResultReadProductColorById->read_product_color_by_id($product_id);
                                                                                        foreach ($ResultReadProductColorById as $product_color) {

                                                                                        ?>
                                                                                            <option><?= $product_color['color'] ?></option>

                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <!--end row-->
                                                                            <div class="d-flex gap-2 mt-3">
                                                                                <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
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

                                                <!-- добавляем просмотры -->

                                                <script>
                                                    $(document).ready(function() {
                                                        $('.view_<?= $products['id'] ?>_5').on('click', function(e) {
                                                            e.preventDefault();
                                                            const id = <?= $products['id'] ?>;
                                                            $.ajax({
                                                                url: 'http://localhost/handlers/search/view.php',
                                                                type: 'POST',
                                                                data: {
                                                                    id: id,
                                                                },
                                                                success: function(data) {
                                                                    console.log(data);
                                                                },
                                                                error: function() {
                                                                    alert('Error!');
                                                                },
                                                            })

                                                        })
                                                    });
                                                </script>

                                                <!-- добавляем просмотры -->

                                            <?php } ?>
                                            <!-- для каждой подкатегории находим товары -->
                                            <?php
                                            // для каждой подкатегории находим подкатегории 3 уровня
                                            $ResultReadCategoryByParent_3_Id = new \Models\Category;
                                            $ResultReadCategoryByParent_3_Id = $ResultReadCategoryByParent_3_Id->read_category_by_parent_id($category_id);
                                            ?>
                                            <!-- для каждой подкатегории 3 уровня находим товары -->
                                            <?php

                                            foreach ($ResultReadCategoryByParent_3_Id as $subcategory_3) {

                                                $category_id = $subcategory_3['id'];
                                                $sql = "SELECT * FROM product WHERE category_id=$category_id AND `price` BETWEEN $min_price AND $max_price";

                                                $ResultReadProductsSearchBySql = new \Models\Product;
                                                $ResultReadProductsSearchBySql = $ResultReadProductsSearchBySql->read_products_search_by_sql($sql);
                                                foreach ($ResultReadProductsSearchBySql as $products) { ?>

                                                    <div class="col price_range">
                                                        <div class="card rounded-0 product-card">
                                                            <div class="card-header bg-transparent border-bottom-0">
                                                                <div class="d-flex align-items-center justify-content-end gap-3">
                                                                    <a href="javascript:;">
                                                                        <div class="product-compare"><span><i class="bx bx-git-compare"></i> Сравнить</span>
                                                                        </div>
                                                                    </a>
                                                                    <div class="product-wishlist product-wishlist_<?= $products['id'] ?>_8">
                                                                        <div class="d-none wishlist_<?= $products['id'] ?>_8">
                                                                            <?= $products['id'] ?>
                                                                        </div>

                                                                        <i class='bx bx-heart'></i>
                                                                    </div>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            $('.product-wishlist_<?= $products['id'] ?>_8').on('click', function(e) {
                                                                                e.preventDefault();
                                                                                const id = $('.wishlist_<?= $products['id'] ?>_8').text() ? $('.wishlist_<?= $products['id'] ?>_8').text() : 1;
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
                                                            <img src="<?= PATH . '/' . $products['img'] ?>" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <div class="product-info">
                                                                    <a href="javascript:;">
                                                                        <p class="product-catergory font-13 mb-1"><?= $category['title'] ?></p>
                                                                    </a>
                                                                    <a href="javascript:;">
                                                                        <h6 class="product-name mb-2">
                                                                            <?php
                                                                            $product_title = $products['title'];
                                                                            $product_title = substr($product_title, 0, 30);
                                                                            $product_title = rtrim($product_title, "!,.-");
                                                                            $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                            echo $product_title . "… ";
                                                                            ?>
                                                                        </h6>
                                                                    </a>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                                                &#8381;<?= $products['old_price'] ?></span>
                                                                            <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                                        </div>
                                                                        <div class="cursor-pointer ms-auto">
                                                                            <?php
                                                                            $rating = $products['average_rating'];
                                                                            $rating = round($rating);
                                                                            for ($i = 0; $i < $rating; $i++) {
                                                                            ?>
                                                                                <i class="bx bxs-star text-warning"></i>
                                                                            <?php } ?>


                                                                        </div>
                                                                    </div>
                                                                    <div class="product-action mt-2">
                                                                        <div class="d-grid gap-2">
                                                                            <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
                                                                            <a href="javascript:;" class="btn btn-light btn-ecomm view_<?= $products['id'] ?>_6" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?= $products['id'] ?>"><i class="bx bx-zoom-in"></i>Быстрый просмотр</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="QuickViewProduct<?= $products['id'] ?>">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                            <div class="modal-content rounded-0 border-0">
                                                                <div class="modal-body">
                                                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                                    <div class="row g-0">
                                                                        <div class="col-12 col-lg-6">
                                                                            <div class="image-zoom-section">
                                                                                <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                                    <div class="item">
                                                                                        <img src="<?= PATH . '/' . $products['img'] ?>" class="img-fluid" alt="">
                                                                                    </div>

                                                                                    <?php
                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductById = new \Models\Product;
                                                                                    $ResultReadProductById = $ResultReadProductById->read_product_gallery_by_id($product_id);
                                                                                    foreach ($ResultReadProductById as $product_image) {

                                                                                    ?>

                                                                                        <div class="item">
                                                                                            <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="img-fluid" alt="">
                                                                                        </div>

                                                                                    <?php } ?>

                                                                                </div>
                                                                                <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                                    <button class="owl-thumb-item">
                                                                                        <img src="<?= PATH . '/' . $products['img'] ?>" class="" alt="">
                                                                                    </button>

                                                                                    <?php foreach ($ResultReadProductById as $product_image) { ?>
                                                                                        <button class="owl-thumb-item">
                                                                                            <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="" alt="">
                                                                                        </button>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6">
                                                                            <div class="product-info-section p-3">
                                                                                <h3 class="mt-3 mt-lg-0 mb-0"><?= $products['title'] ?></h3>
                                                                                <div class="product-rating d-flex align-items-center mt-2">
                                                                                    <div class="rates cursor-pointer font-13">

                                                                                        <?php
                                                                                        $rating = $products['average_rating'];
                                                                                        $rating = round($rating);
                                                                                        for ($i = 0; $i < $rating; $i++) {
                                                                                        ?>
                                                                                            <i class="bx bxs-star text-warning"></i>
                                                                                        <?php } ?>

                                                                                    </div>
                                                                                    <div class="ms-1">
                                                                                        <p class="mb-0">(<?= $products['total_rating'] ?> Рейтинг)</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-center mt-3 gap-2">
                                                                                    <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;<?= $products['old_price'] ?></h5>
                                                                                    <h4 class="mb-0">&#8381;<?= $products['price'] ?></h4>
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <h6>Описание :</h6>
                                                                                    <p class="mb-0"><?= $products['description'] ?></p>
                                                                                </div>
                                                                                <dl class="row mt-3">
                                                                                    <dt class="col-sm-3">Id товара:</dt>
                                                                                    <dd class="col-sm-9"><?= $products['id'] ?></dd>
                                                                                </dl>
                                                                                <div class="row row-cols-auto align-items-center mt-3">
                                                                                    <div class="col">
                                                                                        <label class="form-label">Количество:</label>
                                                                                        <select class="form-select form-select-sm">
                                                                                            <option>1</option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="form-label">Размер:</label>
                                                                                        <select class="form-select form-select-sm">
                                                                                            <?php

                                                                                            $product_id = $products['id'];
                                                                                            $ResultReadProductSizeById = new \Models\Product;
                                                                                            $ResultReadProductSizeById = $ResultReadProductSizeById->read_product_size_by_id($product_id);
                                                                                            foreach ($ResultReadProductSizeById as $product_size) {

                                                                                            ?>
                                                                                                <option><?= $product_size['size'] ?></option>

                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="form-label">Цвета:</label>
                                                                                        <select class="form-select form-select-sm">
                                                                                            <?php

                                                                                            $product_id = $products['id'];
                                                                                            $ResultReadProductColorById = new \Models\Product;
                                                                                            $ResultReadProductColorById = $ResultReadProductColorById->read_product_color_by_id($product_id);
                                                                                            foreach ($ResultReadProductColorById as $product_color) {

                                                                                            ?>
                                                                                                <option><?= $product_color['color'] ?></option>

                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <!--end row-->
                                                                                <div class="d-flex gap-2 mt-3">
                                                                                    <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
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

                                                    <!-- добавляем просмотры -->

                                                    <script>
                                                        $(document).ready(function() {
                                                            $('.view_<?= $products['id'] ?>_6').on('click', function(e) {
                                                                e.preventDefault();
                                                                const id = <?= $products['id'] ?>;
                                                                $.ajax({
                                                                    url: 'http://localhost/handlers/search/view.php',
                                                                    type: 'POST',
                                                                    data: {
                                                                        id: id,
                                                                    },
                                                                    success: function(data) {
                                                                        console.log(data);
                                                                    },
                                                                    error: function() {
                                                                        alert('Error!');
                                                                    },
                                                                })

                                                            })
                                                        });
                                                    </script>

                                                    <!-- добавляем просмотры -->

                                                <?php } ?>
                                            <?php } ?>

                                    <?php }
                                    }
                                    ?>
                                    <?php
                                    if (isset($_GET['size']) && (!isset($_GET['sort']))) {
                                        // выводим товары определённого размера для всех категорий
                                        $size = $_GET['size'];
                                        $ResultReadProductBySizeByAllCat = new \Models\Product;
                                        $ResultReadProductBySizeByAllCat = $ResultReadProductBySizeByAllCat->read_product_by_size_by_all_categories($size);
                                        foreach ($ResultReadProductBySizeByAllCat as $products) {
                                    ?>
                                            <div class="col price_range">
                                                <div class="card rounded-0 product-card">
                                                    <div class="card-header bg-transparent border-bottom-0">
                                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                                            <a href="javascript:;">
                                                                <div class="product-compare"><span><i class="bx bx-git-compare"></i> Сравнить</span>
                                                                </div>
                                                            </a>
                                                            <div class="product-wishlist product-wishlist_<?= $products['id'] ?>_9">
                                                                <div class="d-none wishlist_<?= $products['id'] ?>_9">
                                                                    <?= $products['id'] ?>
                                                                </div>

                                                                <i class='bx bx-heart'></i>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $('.product-wishlist_<?= $products['id'] ?>_9').on('click', function(e) {
                                                                        e.preventDefault();
                                                                        const id = $('.wishlist_<?= $products['id'] ?>_9').text() ? $('.wishlist_<?= $products['id'] ?>_9').text() : 1;
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
                                                    <img src="<?= PATH . '/' . $products['img'] ?>" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a href="javascript:;">
                                                                <p class="product-catergory font-13 mb-1"><?= $category['title'] ?></p>
                                                            </a>
                                                            <a href="javascript:;">
                                                                <h6 class="product-name mb-2">
                                                                    <?php
                                                                    $product_title = $products['title'];
                                                                    $product_title = substr($product_title, 0, 30);
                                                                    $product_title = rtrim($product_title, "!,.-");
                                                                    $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                    echo $product_title . "… ";
                                                                    ?>
                                                                </h6>
                                                            </a>
                                                            <div class="d-flex align-items-center">
                                                                <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                                        &#8381;<?= $products['old_price'] ?></span>
                                                                    <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                                </div>
                                                                <div class="cursor-pointer ms-auto">
                                                                    <?php
                                                                    $rating = $products['average_rating'];
                                                                    $rating = round($rating);
                                                                    for ($i = 0; $i < $rating; $i++) {
                                                                    ?>
                                                                        <i class="bx bxs-star text-warning"></i>
                                                                    <?php } ?>


                                                                </div>
                                                            </div>
                                                            <div class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
                                                                    <a href="javascript:;" class="btn btn-light btn-ecomm view_<?= $products['id'] ?>_7" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?= $products['id'] ?>"><i class="bx bx-zoom-in"></i>Быстрый просмотр</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="QuickViewProduct<?= $products['id'] ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                    <div class="modal-content rounded-0 border-0">
                                                        <div class="modal-body">
                                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                            <div class="row g-0">
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="image-zoom-section">
                                                                        <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                            <div class="item">
                                                                                <img src="<?= PATH . '/' . $products['img'] ?>" class="img-fluid" alt="">
                                                                            </div>

                                                                            <?php
                                                                            $product_id = $products['id'];
                                                                            $ResultReadProductById = new \Models\Product;
                                                                            $ResultReadProductById = $ResultReadProductById->read_product_gallery_by_id($product_id);
                                                                            foreach ($ResultReadProductById as $product_image) {

                                                                            ?>

                                                                                <div class="item">
                                                                                    <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="img-fluid" alt="">
                                                                                </div>

                                                                            <?php } ?>

                                                                        </div>
                                                                        <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                            <button class="owl-thumb-item">
                                                                                <img src="<?= PATH . '/' . $products['img'] ?>" class="" alt="">
                                                                            </button>

                                                                            <?php foreach ($ResultReadProductById as $product_image) { ?>
                                                                                <button class="owl-thumb-item">
                                                                                    <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="" alt="">
                                                                                </button>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="product-info-section p-3">
                                                                        <h3 class="mt-3 mt-lg-0 mb-0"><?= $products['title'] ?></h3>
                                                                        <div class="product-rating d-flex align-items-center mt-2">
                                                                            <div class="rates cursor-pointer font-13">

                                                                                <?php
                                                                                $rating = $products['average_rating'];
                                                                                $rating = round($rating);
                                                                                for ($i = 0; $i < $rating; $i++) {
                                                                                ?>
                                                                                    <i class="bx bxs-star text-warning"></i>
                                                                                <?php } ?>

                                                                            </div>
                                                                            <div class="ms-1">
                                                                                <p class="mb-0">(<?= $products['total_rating'] ?> Рейтинг)</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center mt-3 gap-2">
                                                                            <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;<?= $products['old_price'] ?></h5>
                                                                            <h4 class="mb-0">&#8381;<?= $products['price'] ?></h4>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <h6>Описание :</h6>
                                                                            <p class="mb-0"><?= $products['description'] ?></p>
                                                                        </div>
                                                                        <dl class="row mt-3">
                                                                            <dt class="col-sm-3">Id товара:</dt>
                                                                            <dd class="col-sm-9"><?= $products['id'] ?></dd>
                                                                        </dl>
                                                                        <div class="row row-cols-auto align-items-center mt-3">
                                                                            <div class="col">
                                                                                <label class="form-label">Количество:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label class="form-label">Размер:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <?php

                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductSizeById = new \Models\Product;
                                                                                    $ResultReadProductSizeById = $ResultReadProductSizeById->read_product_size_by_id($product_id);
                                                                                    foreach ($ResultReadProductSizeById as $product_size) {

                                                                                    ?>
                                                                                        <option><?= $product_size['size'] ?></option>

                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label class="form-label">Цвета:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <?php

                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductColorById = new \Models\Product;
                                                                                    $ResultReadProductColorById = $ResultReadProductColorById->read_product_color_by_id($product_id);
                                                                                    foreach ($ResultReadProductColorById as $product_color) {

                                                                                    ?>
                                                                                        <option><?= $product_color['color'] ?></option>

                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <!--end row-->
                                                                        <div class="d-flex gap-2 mt-3">
                                                                            <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
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

                                            <!-- добавляем просмотры -->

                                            <script>
                                                $(document).ready(function() {
                                                    $('.view_<?= $products['id'] ?>_7').on('click', function(e) {
                                                        e.preventDefault();
                                                        const id = <?= $products['id'] ?>;
                                                        $.ajax({
                                                            url: 'http://localhost/handlers/search/view.php',
                                                            type: 'POST',
                                                            data: {
                                                                id: id,
                                                            },
                                                            success: function(data) {
                                                                console.log(data);
                                                            },
                                                            error: function() {
                                                                alert('Error!');
                                                            },
                                                        })

                                                    })
                                                });
                                            </script>

                                            <!-- добавляем просмотры -->

                                        <?php } ?>
                                        <!-- выводим товары определённого размера для всех категорий -->
                                    <?php } ?>

                                    <?php if (isset($_GET['brand']) && (!isset($_GET['sort']))) {
                                        $brand_id = $_GET['brand'];

                                        $ResultReadProductsByBrandId = new \Models\Product;
                                        $ResultReadProductsByBrandId = $ResultReadProductsByBrandId->read_products_by_brand_id($brand_id);

                                        //выводим все товары определённого бренда

                                        foreach ($ResultReadProductsByBrandId as $products) {
                                    ?>

                                            <div class="col price_range">
                                                <div class="card rounded-0 product-card">
                                                    <div class="card-header bg-transparent border-bottom-0">
                                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                                            <a href="javascript:;">
                                                                <div class="product-compare"><span><i class="bx bx-git-compare"></i> Сравнить</span>
                                                                </div>
                                                            </a>
                                                            <div class="product-wishlist product-wishlist_<?= $products['id'] ?>_10">
                                                                <div class="d-none wishlist_<?= $products['id'] ?>_10">
                                                                    <?= $products['id'] ?>
                                                                </div>

                                                                <i class='bx bx-heart'></i>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $('.product-wishlist_<?= $products['id'] ?>_10').on('click', function(e) {
                                                                        e.preventDefault();
                                                                        const id = $('.wishlist_<?= $products['id'] ?>_10').text() ? $('.wishlist_<?= $products['id'] ?>_10').text() : 1;
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
                                                    <img src="<?= PATH . '/' . $products['img'] ?>" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a href="javascript:;">
                                                                <p class="product-catergory font-13 mb-1"><?= $category['title'] ?></p>
                                                            </a>
                                                            <a href="javascript:;">
                                                                <h6 class="product-name mb-2">
                                                                    <?php
                                                                    $product_title = $products['title'];
                                                                    $product_title = substr($product_title, 0, 30);
                                                                    $product_title = rtrim($product_title, "!,.-");
                                                                    $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                    echo $product_title . "… ";
                                                                    ?>
                                                                </h6>
                                                            </a>
                                                            <div class="d-flex align-items-center">
                                                                <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                                        &#8381;<?= $products['old_price'] ?></span>
                                                                    <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                                </div>
                                                                <div class="cursor-pointer ms-auto">
                                                                    <?php
                                                                    $rating = $products['average_rating'];
                                                                    $rating = round($rating);
                                                                    for ($i = 0; $i < $rating; $i++) {
                                                                    ?>
                                                                        <i class="bx bxs-star text-warning"></i>
                                                                    <?php } ?>


                                                                </div>
                                                            </div>
                                                            <div class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
                                                                    <a href="javascript:;" class="btn btn-light btn-ecomm view_<?= $products['id'] ?>_8" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?= $products['id'] ?>"><i class="bx bx-zoom-in"></i>Быстрый просмотр</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="QuickViewProduct<?= $products['id'] ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                    <div class="modal-content rounded-0 border-0">
                                                        <div class="modal-body">
                                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                            <div class="row g-0">
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="image-zoom-section">
                                                                        <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                            <div class="item">
                                                                                <img src="<?= PATH . '/' . $products['img'] ?>" class="img-fluid" alt="">
                                                                            </div>

                                                                            <?php
                                                                            $product_id = $products['id'];
                                                                            $ResultReadProductById = new \Models\Product;
                                                                            $ResultReadProductById = $ResultReadProductById->read_product_gallery_by_id($product_id);
                                                                            foreach ($ResultReadProductById as $product_image) {

                                                                            ?>

                                                                                <div class="item">
                                                                                    <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="img-fluid" alt="">
                                                                                </div>

                                                                            <?php } ?>

                                                                        </div>
                                                                        <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                            <button class="owl-thumb-item">
                                                                                <img src="<?= PATH . '/' . $products['img'] ?>" class="" alt="">
                                                                            </button>

                                                                            <?php foreach ($ResultReadProductById as $product_image) { ?>
                                                                                <button class="owl-thumb-item">
                                                                                    <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="" alt="">
                                                                                </button>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="product-info-section p-3">
                                                                        <h3 class="mt-3 mt-lg-0 mb-0"><?= $products['title'] ?></h3>
                                                                        <div class="product-rating d-flex align-items-center mt-2">
                                                                            <div class="rates cursor-pointer font-13">

                                                                                <?php
                                                                                $rating = $products['average_rating'];
                                                                                $rating = round($rating);
                                                                                for ($i = 0; $i < $rating; $i++) {
                                                                                ?>
                                                                                    <i class="bx bxs-star text-warning"></i>
                                                                                <?php } ?>

                                                                            </div>
                                                                            <div class="ms-1">
                                                                                <p class="mb-0">(<?= $products['total_rating'] ?> Рейтинг)</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center mt-3 gap-2">
                                                                            <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;<?= $products['old_price'] ?></h5>
                                                                            <h4 class="mb-0">&#8381;<?= $products['price'] ?></h4>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <h6>Описание :</h6>
                                                                            <p class="mb-0"><?= $products['description'] ?></p>
                                                                        </div>
                                                                        <dl class="row mt-3">
                                                                            <dt class="col-sm-3">Id товара:</dt>
                                                                            <dd class="col-sm-9"><?= $products['id'] ?></dd>
                                                                        </dl>
                                                                        <div class="row row-cols-auto align-items-center mt-3">
                                                                            <div class="col">
                                                                                <label class="form-label">Количество:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label class="form-label">Размер:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <?php

                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductSizeById = new \Models\Product;
                                                                                    $ResultReadProductSizeById = $ResultReadProductSizeById->read_product_size_by_id($product_id);
                                                                                    foreach ($ResultReadProductSizeById as $product_size) {

                                                                                    ?>
                                                                                        <option><?= $product_size['size'] ?></option>

                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col">
                                                                                <label class="form-label">Цвета:</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <?php

                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductColorById = new \Models\Product;
                                                                                    $ResultReadProductColorById = $ResultReadProductColorById->read_product_color_by_id($product_id);
                                                                                    foreach ($ResultReadProductColorById as $product_color) {

                                                                                    ?>
                                                                                        <option><?= $product_color['color'] ?></option>

                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <!--end row-->
                                                                        <div class="d-flex gap-2 mt-3">
                                                                            <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
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

                                            <!-- добавляем просмотры -->

                                            <script>
                                                $(document).ready(function() {
                                                    $('.view_<?= $products['id'] ?>_8').on('click', function(e) {
                                                        e.preventDefault();
                                                        const id = <?= $products['id'] ?>;
                                                        $.ajax({
                                                            url: 'http://localhost/handlers/search/view.php',
                                                            type: 'POST',
                                                            data: {
                                                                id: id,
                                                            },
                                                            success: function(data) {
                                                                console.log(data);
                                                            },
                                                            error: function() {
                                                                alert('Error!');
                                                            },
                                                        })

                                                    })
                                                });
                                            </script>

                                            <!-- добавляем просмотры -->


                                        <?php
                                        }
                                        //выводим все товары определённого бренда
                                        ?>
                                    <?php }
                                    ?>

                                    <?php if (isset($_GET['sort'])) {
                                        if ($_GET['sort'] == 'popularity') {
                                            $category_id = $_GET['category'];
                                            // для каждой категории находим 4 подкатегории
                                            $ResultReadCategoryByParentId = new \Models\Category;
                                            $ResultReadCategoryByParentId = $ResultReadCategoryByParentId->read_category_by_parent_id($category_id);
                                            // для каждой подкатегории находим товары
                                            foreach ($ResultReadCategoryByParentId as $subcategory) {
                                                $category_id = $subcategory['id'];

                                                $ResultReadProductsSortByPopularity = new \Models\Product;
                                                $ResultReadProductsSortByPopularity = $ResultReadProductsSortByPopularity->read_products_sort_by_popularity($category_id);

                                                foreach ($ResultReadProductsSortByPopularity as $products) { ?>

                                                    <div class="col price_range">
                                                        <div class="card rounded-0 product-card">
                                                            <div class="card-header bg-transparent border-bottom-0">
                                                                <div class="d-flex align-items-center justify-content-end gap-3">
                                                                    <a href="javascript:;">
                                                                        <div class="product-compare"><span><i class="bx bx-git-compare"></i> Сравнить</span>
                                                                        </div>
                                                                    </a>
                                                                    <div class="product-wishlist product-wishlist_<?= $products['id'] ?>_11">
                                                                        <div class="d-none wishlist_<?= $products['id'] ?>_11">
                                                                            <?= $products['id'] ?>
                                                                        </div>

                                                                        <i class='bx bx-heart'></i>
                                                                    </div>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            $('.product-wishlist_<?= $products['id'] ?>_11').on('click', function(e) {
                                                                                e.preventDefault();
                                                                                const id = $('.wishlist_<?= $products['id'] ?>_11').text() ? $('.wishlist_<?= $products['id'] ?>_11').text() : 1;
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
                                                            <img src="<?= PATH . '/' . $products['img'] ?>" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <div class="product-info">
                                                                    <a href="javascript:;">
                                                                        <p class="product-catergory font-13 mb-1"><?= $category['title'] ?></p>
                                                                    </a>
                                                                    <a href="javascript:;">
                                                                        <h6 class="product-name mb-2">
                                                                            <?php
                                                                            $product_title = $products['title'];
                                                                            $product_title = substr($product_title, 0, 30);
                                                                            $product_title = rtrim($product_title, "!,.-");
                                                                            $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                            echo $product_title . "… ";
                                                                            ?>
                                                                        </h6>
                                                                    </a>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                                                &#8381;<?= $products['old_price'] ?></span>
                                                                            <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                                        </div>
                                                                        <div class="cursor-pointer ms-auto">
                                                                            <?php
                                                                            $rating = $products['average_rating'];
                                                                            $rating = round($rating);
                                                                            for ($i = 0; $i < $rating; $i++) {
                                                                            ?>
                                                                                <i class="bx bxs-star text-warning"></i>
                                                                            <?php } ?>


                                                                        </div>
                                                                    </div>
                                                                    <div class="product-action mt-2">
                                                                        <div class="d-grid gap-2">
                                                                            <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
                                                                            <a href="javascript:;" class="btn btn-light btn-ecomm view_<?= $products['id'] ?>_9" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?= $products['id'] ?>"><i class="bx bx-zoom-in"></i>Быстрый просмотр</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="QuickViewProduct<?= $products['id'] ?>">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                            <div class="modal-content rounded-0 border-0">
                                                                <div class="modal-body">
                                                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                                    <div class="row g-0">
                                                                        <div class="col-12 col-lg-6">
                                                                            <div class="image-zoom-section">
                                                                                <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                                    <div class="item">
                                                                                        <img src="<?= PATH . '/' . $products['img'] ?>" class="img-fluid" alt="">
                                                                                    </div>

                                                                                    <?php
                                                                                    $product_id = $products['id'];
                                                                                    $ResultReadProductById = new \Models\Product;
                                                                                    $ResultReadProductById = $ResultReadProductById->read_product_gallery_by_id($product_id);
                                                                                    foreach ($ResultReadProductById as $product_image) {

                                                                                    ?>

                                                                                        <div class="item">
                                                                                            <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="img-fluid" alt="">
                                                                                        </div>

                                                                                    <?php } ?>

                                                                                </div>
                                                                                <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                                    <button class="owl-thumb-item">
                                                                                        <img src="<?= PATH . '/' . $products['img'] ?>" class="" alt="">
                                                                                    </button>

                                                                                    <?php foreach ($ResultReadProductById as $product_image) { ?>
                                                                                        <button class="owl-thumb-item">
                                                                                            <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="" alt="">
                                                                                        </button>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6">
                                                                            <div class="product-info-section p-3">
                                                                                <h3 class="mt-3 mt-lg-0 mb-0"><?= $products['title'] ?></h3>
                                                                                <div class="product-rating d-flex align-items-center mt-2">
                                                                                    <div class="rates cursor-pointer font-13">

                                                                                        <?php
                                                                                        $rating = $products['average_rating'];
                                                                                        $rating = round($rating);
                                                                                        for ($i = 0; $i < $rating; $i++) {
                                                                                        ?>
                                                                                            <i class="bx bxs-star text-warning"></i>
                                                                                        <?php } ?>

                                                                                    </div>
                                                                                    <div class="ms-1">
                                                                                        <p class="mb-0">(<?= $products['total_rating'] ?> Рейтинг)</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex align-items-center mt-3 gap-2">
                                                                                    <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;<?= $products['old_price'] ?></h5>
                                                                                    <h4 class="mb-0">&#8381;<?= $products['price'] ?></h4>
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <h6>Описание :</h6>
                                                                                    <p class="mb-0"><?= $products['description'] ?></p>
                                                                                </div>
                                                                                <dl class="row mt-3">
                                                                                    <dt class="col-sm-3">Id товара:</dt>
                                                                                    <dd class="col-sm-9"><?= $products['id'] ?></dd>
                                                                                </dl>
                                                                                <div class="row row-cols-auto align-items-center mt-3">
                                                                                    <div class="col">
                                                                                        <label class="form-label">Количество:</label>
                                                                                        <select class="form-select form-select-sm">
                                                                                            <option>1</option>
                                                                                            <option>2</option>
                                                                                            <option>3</option>
                                                                                            <option>4</option>
                                                                                            <option>5</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="form-label">Размер:</label>
                                                                                        <select class="form-select form-select-sm">
                                                                                            <?php

                                                                                            $product_id = $products['id'];
                                                                                            $ResultReadProductSizeById = new \Models\Product;
                                                                                            $ResultReadProductSizeById = $ResultReadProductSizeById->read_product_size_by_id($product_id);
                                                                                            foreach ($ResultReadProductSizeById as $product_size) {

                                                                                            ?>
                                                                                                <option><?= $product_size['size'] ?></option>

                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label class="form-label">Цвета:</label>
                                                                                        <select class="form-select form-select-sm">
                                                                                            <?php

                                                                                            $product_id = $products['id'];
                                                                                            $ResultReadProductColorById = new \Models\Product;
                                                                                            $ResultReadProductColorById = $ResultReadProductColorById->read_product_color_by_id($product_id);
                                                                                            foreach ($ResultReadProductColorById as $product_color) {

                                                                                            ?>
                                                                                                <option><?= $product_color['color'] ?></option>

                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <!--end row-->
                                                                                <div class="d-flex gap-2 mt-3">
                                                                                    <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
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

                                                    <!-- добавляем просмотры -->

                                                    <script>
                                                        $(document).ready(function() {
                                                            $('.view_<?= $products['id'] ?>_9').on('click', function(e) {
                                                                e.preventDefault();
                                                                const id = <?= $products['id'] ?>;
                                                                $.ajax({
                                                                    url: 'http://localhost/handlers/search/view.php',
                                                                    type: 'POST',
                                                                    data: {
                                                                        id: id,
                                                                    },
                                                                    success: function(data) {
                                                                        console.log(data);
                                                                    },
                                                                    error: function() {
                                                                        alert('Error!');
                                                                    },
                                                                })

                                                            })
                                                        });
                                                    </script>

                                                    <!-- добавляем просмотры -->

                                                <?php } ?>

                                                <?php
                                                // для каждой подкатегории находим подкатегории 3 уровня
                                                $ResultReadCategoryByParent_3_Id = new \Models\Category;
                                                $ResultReadCategoryByParent_3_Id = $ResultReadCategoryByParent_3_Id->read_category_by_parent_id($category_id);
                                                // для каждой подкатегории 3 уровня находим товары
                                                foreach ($ResultReadCategoryByParent_3_Id as $subcategory_3) {

                                                    $category_id = $subcategory_3['id'];
                                                    $ResultReadProductsSortByPopularity = new \Models\Product;
                                                    $ResultReadProductsSortByPopularity = $ResultReadProductsSortByPopularity->read_products_sort_by_popularity($category_id);
                                                    foreach ($ResultReadProductsSortByPopularity as $products) { ?>

                                                        <div class="col price_range">
                                                            <div class="card rounded-0 product-card">
                                                                <div class="card-header bg-transparent border-bottom-0">
                                                                    <div class="d-flex align-items-center justify-content-end gap-3">
                                                                        <a href="javascript:;">
                                                                            <div class="product-compare"><span><i class="bx bx-git-compare"></i> Сравнить</span>
                                                                            </div>
                                                                        </a>
                                                                        <div class="product-wishlist product-wishlist_<?= $products['id'] ?>_12">
                                                                            <div class="d-none wishlist_<?= $products['id'] ?>_12">
                                                                                <?= $products['id'] ?>
                                                                            </div>

                                                                            <i class='bx bx-heart'></i>
                                                                        </div>
                                                                        <script>
                                                                            $(document).ready(function() {
                                                                                $('.product-wishlist_<?= $products['id'] ?>_12').on('click', function(e) {
                                                                                    e.preventDefault();
                                                                                    const id = $('.wishlist_<?= $products['id'] ?>_12').text() ? $('.wishlist_<?= $products['id'] ?>_12').text() : 1;
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
                                                                <img src="<?= PATH . '/' . $products['img'] ?>" class="card-img-top" alt="...">
                                                                <div class="card-body">
                                                                    <div class="product-info">
                                                                        <a href="javascript:;">
                                                                            <p class="product-catergory font-13 mb-1"><?= $category['title'] ?></p>
                                                                        </a>
                                                                        <a href="javascript:;">
                                                                            <h6 class="product-name mb-2">
                                                                                <?php
                                                                                $product_title = $products['title'];
                                                                                $product_title = substr($product_title, 0, 30);
                                                                                $product_title = rtrim($product_title, "!,.-");
                                                                                $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                                                echo $product_title . "… ";
                                                                                ?>
                                                                            </h6>
                                                                        </a>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">
                                                                                    &#8381;<?= $products['old_price'] ?></span>
                                                                                <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                                            </div>
                                                                            <div class="cursor-pointer ms-auto">
                                                                                <?php
                                                                                $rating = $products['average_rating'];
                                                                                $rating = round($rating);
                                                                                for ($i = 0; $i < $rating; $i++) {
                                                                                ?>
                                                                                    <i class="bx bxs-star text-warning"></i>
                                                                                <?php } ?>


                                                                            </div>
                                                                        </div>
                                                                        <div class="product-action mt-2">
                                                                            <div class="d-grid gap-2">
                                                                                <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
                                                                                <a href="javascript:;" class="btn btn-light btn-ecomm view_<?= $products['id'] ?>_10" data-bs-toggle="modal" data-bs-target="#QuickViewProduct<?= $products['id'] ?>"><i class="bx bx-zoom-in"></i>Быстрый просмотр</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade" id="QuickViewProduct<?= $products['id'] ?>">
                                                            <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                                                <div class="modal-content rounded-0 border-0">
                                                                    <div class="modal-body">
                                                                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                                        <div class="row g-0">
                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="image-zoom-section">
                                                                                    <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                                        <div class="item">
                                                                                            <img src="<?= PATH . '/' . $products['img'] ?>" class="img-fluid" alt="">
                                                                                        </div>

                                                                                        <?php
                                                                                        $product_id = $products['id'];
                                                                                        $ResultReadProductById = new \Models\Product;
                                                                                        $ResultReadProductById = $ResultReadProductById->read_product_gallery_by_id($product_id);
                                                                                        foreach ($ResultReadProductById as $product_image) {

                                                                                        ?>

                                                                                            <div class="item">
                                                                                                <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="img-fluid" alt="">
                                                                                            </div>

                                                                                        <?php } ?>

                                                                                    </div>
                                                                                    <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                                        <button class="owl-thumb-item">
                                                                                            <img src="<?= PATH . '/' . $products['img'] ?>" class="" alt="">
                                                                                        </button>

                                                                                        <?php foreach ($ResultReadProductById as $product_image) { ?>
                                                                                            <button class="owl-thumb-item">
                                                                                                <img src="<?= PATH . '/' . $product_image['gallery'] ?>" class="" alt="">
                                                                                            </button>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-lg-6">
                                                                                <div class="product-info-section p-3">
                                                                                    <h3 class="mt-3 mt-lg-0 mb-0"><?= $products['title'] ?></h3>
                                                                                    <div class="product-rating d-flex align-items-center mt-2">
                                                                                        <div class="rates cursor-pointer font-13">

                                                                                            <?php
                                                                                            $rating = $products['average_rating'];
                                                                                            $rating = round($rating);
                                                                                            for ($i = 0; $i < $rating; $i++) {
                                                                                            ?>
                                                                                                <i class="bx bxs-star text-warning"></i>
                                                                                            <?php } ?>

                                                                                        </div>
                                                                                        <div class="ms-1">
                                                                                            <p class="mb-0">(<?= $products['total_rating'] ?> Рейтинг)</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-flex align-items-center mt-3 gap-2">
                                                                                        <h5 class="mb-0 text-decoration-line-through text-light-3">&#8381;<?= $products['old_price'] ?></h5>
                                                                                        <h4 class="mb-0">&#8381;<?= $products['price'] ?></h4>
                                                                                    </div>
                                                                                    <div class="mt-3">
                                                                                        <h6>Описание :</h6>
                                                                                        <p class="mb-0"><?= $products['description'] ?></p>
                                                                                    </div>
                                                                                    <dl class="row mt-3">
                                                                                        <dt class="col-sm-3">Id товара:</dt>
                                                                                        <dd class="col-sm-9"><?= $products['id'] ?></dd>
                                                                                    </dl>
                                                                                    <div class="row row-cols-auto align-items-center mt-3">
                                                                                        <div class="col">
                                                                                            <label class="form-label">Количество:</label>
                                                                                            <select class="form-select form-select-sm">
                                                                                                <option>1</option>
                                                                                                <option>2</option>
                                                                                                <option>3</option>
                                                                                                <option>4</option>
                                                                                                <option>5</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label class="form-label">Размер:</label>
                                                                                            <select class="form-select form-select-sm">
                                                                                                <?php

                                                                                                $product_id = $products['id'];
                                                                                                $ResultReadProductSizeById = new \Models\Product;
                                                                                                $ResultReadProductSizeById = $ResultReadProductSizeById->read_product_size_by_id($product_id);
                                                                                                foreach ($ResultReadProductSizeById as $product_size) {

                                                                                                ?>
                                                                                                    <option><?= $product_size['size'] ?></option>

                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label class="form-label">Цвета:</label>
                                                                                            <select class="form-select form-select-sm">
                                                                                                <?php

                                                                                                $product_id = $products['id'];
                                                                                                $ResultReadProductColorById = new \Models\Product;
                                                                                                $ResultReadProductColorById = $ResultReadProductColorById->read_product_color_by_id($product_id);
                                                                                                foreach ($ResultReadProductColorById as $product_color) {

                                                                                                ?>
                                                                                                    <option><?= $product_color['color'] ?></option>

                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--end row-->
                                                                                    <div class="d-flex gap-2 mt-3">
                                                                                        <a href="javascript:;" class="btn btn-dark btn-ecomm"> <i class="bx bxs-cart-add"></i>Добавить в корзину</a>
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

                                                        <!-- добавляем просмотры -->

                                                        <script>
                                                            $(document).ready(function() {
                                                                $('.view_<?= $products['id'] ?>_10').on('click', function(e) {
                                                                    e.preventDefault();
                                                                    const id = <?= $products['id'] ?>;
                                                                    $.ajax({
                                                                        url: 'http://localhost/handlers/search/view.php',
                                                                        type: 'POST',
                                                                        data: {
                                                                            id: id,
                                                                        },
                                                                        success: function(data) {
                                                                            console.log(data);
                                                                        },
                                                                        error: function() {
                                                                            alert('Error!');
                                                                        },
                                                                    })

                                                                })
                                                            });
                                                        </script>

                                                        <!-- добавляем просмотры -->

                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                    <?php }
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- здесь выводятся товары -->


                            <hr>

                            <?php if (!empty($search_product)) { ?>
                                <nav class="d-flex justify-content-between" aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="javascript:;"><i class='bx bx-chevron-left'></i> Prev</a>
                                        </li>
                                    </ul>
                                    <ul class="pagination">
                                        <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span>
                                        </li>
                                        <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">2</a>
                                        </li>
                                        <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">3</a>
                                        </li>
                                        <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">4</a>
                                        </li>
                                        <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">5</a>
                                        </li>
                                    </ul>
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="javascript:;" aria-label="Next">Next <i class='bx bx-chevron-right'></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end shop area-->
    </div>
</div>
<!--end page wrapper -->