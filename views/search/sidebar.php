<div class="filter-sidebar d-none d-xl-flex">
    <div class="card rounded-0 w-100">
        <div class="card-body">
            <hr class="d-flex d-xl-none" />
            <div class="product-categories">
                <h6 class="text-uppercase mb-3">Категории</h6>
                <ul class="list-unstyled mb-0 categories-list">
                    <!-- перебираем категории -->
                    <?php foreach ($ResultReadCategories as $category) { ?>
                        <li>
                            <a href="<?= PATH . '/search/?category=' . $category['id'] ?>"><?= $category['title'] ?>
                                <span class="float-end badge rounded-pill bg-primary">
                                    <?php

                                    $category_id = $category['id'];
                                    // для каждой категории находим 4 подкатегории
                                    $ResultReadCategoryByParentId = new \Models\Category;
                                    $ResultReadCategoryByParentId = $ResultReadCategoryByParentId->read_category_by_parent_id($category_id);
                                    $j = 0;
                                    // для каждой подкатегории находим товары
                                    foreach ($ResultReadCategoryByParentId as $subcategory) {
                                        $category_id = $subcategory['id'];
                                        $ResultReadProductsByCategoryId = new \Models\Product;
                                        $ResultReadProductsByCategoryId = $ResultReadProductsByCategoryId->read_products_by_category_id($category_id);
                                        foreach ($ResultReadProductsByCategoryId as $products) {
                                            $j++;
                                        }
                                        // для каждой подкатегории находим подкатегории 3 уровня
                                        $ResultReadCategoryByParent_3_Id = new \Models\Category;
                                        $ResultReadCategoryByParent_3_Id = $ResultReadCategoryByParent_3_Id->read_category_by_parent_id($category_id);
                                        foreach ($ResultReadCategoryByParent_3_Id as $subcategory_3) {
                                            // для каждой подкатегории 3 уровня находим товары
                                            $category_id = $subcategory_3['id'];
                                            $ResultReadProductsByCategory_3_Id = new \Models\Product;
                                            $ResultReadProductsByCategory_3_Id = $ResultReadProductsByCategory_3_Id->read_products_by_category_id($category_id);
                                            foreach ($ResultReadProductsByCategory_3_Id as $products_3) {
                                                $j++;
                                            }
                                        }
                                    }

                                    echo $j;
                                    ?>
                                </span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <hr>
            <?php
            //находим максимальную цену товара выбраной категории
            if (!empty($_GET['category'])) {
                $category_id = $_GET['category'];
            } else {
                $category_id = 0;
            } ?>
            <?php
            // находим 4 подкатегории
            $ResultReadCategoryByParentId = new \Models\Category;
            $ResultReadCategoryByParentId = $ResultReadCategoryByParentId->read_category_by_parent_id($category_id);
            // для каждой подкатегории выводим самую высокую цену и добавляем в массив
            foreach ($ResultReadCategoryByParentId as $subcategory) {
                $category_id = $subcategory['id'];
                $ResultReadProductsByCategoryIdSortByPriceDesc = new \Models\Product;
                $ResultReadProductsByCategoryIdSortByPriceDesc = $ResultReadProductsByCategoryIdSortByPriceDesc->read_products_by_category_id_sort_by_price_desc($category_id);
                foreach ($ResultReadProductsByCategoryIdSortByPriceDesc as $product) {
                    $price[] = $product['price'];
                }
                // для каждой подкатегории находим подкатегории 3 уровня
                $ResultReadCategoryByParent_3_Id = new \Models\Category;
                $ResultReadCategoryByParent_3_Id = $ResultReadCategoryByParent_3_Id->read_category_by_parent_id($category_id);

                // для каждой подкатегории 3 уровня выводим самую высокую цену и добавляем в массив
                foreach ($ResultReadCategoryByParent_3_Id as $subcategory_3) {

                    $category_id = $subcategory_3['id'];
                    $ResultReadProductsByCategoryIdSortByPriceDesc = new \Models\Product;
                    $ResultReadProductsByCategoryIdSortByPriceDesc = $ResultReadProductsByCategoryIdSortByPriceDesc->read_products_by_category_id_sort_by_price_desc($category_id);
                    foreach ($ResultReadProductsByCategoryIdSortByPriceDesc as $product) {
                        $price[] = $product['price'];
                    }
                }
            }

            //сортируем массив по убыванию
            rsort($price);
            $max_price = $price['0'];

            //находим минимальную цену товара выбраной категории
            if (!empty($_GET['category'])) {
                $category_id = $_GET['category'];
            } else {
                $category_id = 0;
            }
            // находим 4 подкатегории
            $ResultReadCategoryByParentId = new \Models\Category;
            $ResultReadCategoryByParentId = $ResultReadCategoryByParentId->read_category_by_parent_id($category_id);
            // для каждой подкатегории выводим самую низкую цену и добавляем в массив
            foreach ($ResultReadCategoryByParentId as $subcategory) {
                $category_id = $subcategory['id'];
                $ResultReadProductsByCategoryIdSortByPriceAsc = new \Models\Product;
                $ResultReadProductsByCategoryIdSortByPriceAsc = $ResultReadProductsByCategoryIdSortByPriceAsc->read_products_by_category_id_sort_by_price_asc($category_id);
                foreach ($ResultReadProductsByCategoryIdSortByPriceAsc as $product) {
                    $price_asc[] = $product['price'];
                }
                // для каждой подкатегории находим подкатегории 3 уровня
                $ResultReadCategoryByParent_3_Id = new \Models\Category;
                $ResultReadCategoryByParent_3_Id = $ResultReadCategoryByParent_3_Id->read_category_by_parent_id($category_id);

                // для каждой подкатегории 3 уровня выводим самую низкую цену и добавляем в массив
                foreach ($ResultReadCategoryByParent_3_Id as $subcategory_3) {

                    $category_id = $subcategory_3['id'];
                    $ResultReadProductsByCategoryIdSortByPriceAsc = new \Models\Product;
                    $ResultReadProductsByCategoryIdSortByPriceAsc = $ResultReadProductsByCategoryIdSortByPriceAsc->read_products_by_category_id_sort_by_price_asc($category_id);
                    foreach ($ResultReadProductsByCategoryIdSortByPriceAsc as $product) {
                        $price_asc[] = $product['price'];
                    }
                }
            }

            //сортируем массив по убыванию
            sort($price_asc);

            $min_price = $price_asc['0'];
            if (isset($_GET['min_price'])) {
                $min_price = $_GET['min_price'];
                $max_price = $_GET['max_price'];

                // $ResultReadProductsByPriceRange = new \Models\Product;
                // $ResultReadProductsByPriceRange = $ResultReadProductsByPriceRange->read_products_by_price_range($min_price, $max_price);

            } else {
                // находим максимальную цену для всех категорий
                $ResultReadProductsSearchByPriceDesc = new \Models\Product;
                $ResultReadProductsSearchByPriceDesc = $ResultReadProductsSearchByPriceDesc->read_products_sort_by_price_desc();
                foreach ($ResultReadProductsSearchByPriceDesc as $product) {
                }
                $max_price = $product['price'];

                // находим максимальную цену для всех категорий

                // находим минимальную цену для всех категорий
                $ResultReadProductsSearchByPriceAsc = new \Models\Product;
                $ResultReadProductsSearchByPriceAsc = $ResultReadProductsSearchByPriceAsc->read_products_sort_by_price_asc();
                foreach ($ResultReadProductsSearchByPriceAsc as $product) {
                }
                $min_price = $product['price'];
                // находим минимальную цену для всех категорий
            }
            $ResultReadProductsSearchByPriceDesc = new \Models\Product;
            $ResultReadProductsSearchByPriceDesc = $ResultReadProductsSearchByPriceDesc->read_products_sort_by_price_desc();
            foreach ($ResultReadProductsSearchByPriceDesc as $product) {
            }
            $max_price_db = $product['price'];

            ?>

            <div id="slider">

            </div>
            <div class="d-flex flex-row mt-3 justify-content-between ajax_reload">
                <input type="number" value="<?= $min_price ?>" class="d-flex" style="width: 47%; border: 1px solid #ced4da; outline: 1px solid #ced4da; border-radius:3px;">
                <input type="number" value="<?= $max_price ?>" class="d-flex ms-1 max_price" style="width: 47%; border: 1px solid #ced4da; outline: 1px solid #ced4da; border-radius:3px;">
            </div>
            <style>
                input[type="number"]::-webkit-outer-spin-button,
                input[type="number"]::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                }

                input[type='number'],
                input[type="number"]:hover,
                input[type="number"]:focus {
                    appearance: none;
                    -moz-appearance: textfield;
                }
            </style>

            <script>
                var slider = document.getElementById('slider');

                noUiSlider.create(slider, {
                    start: [<?= $min_price ?>, <?= $max_price ?>],
                    connect: true,
                    range: {
                        'min': 0,
                        'max': <?= $max_price_db ?>
                    }

                });
                //frontent price_range

                $(document).ready(function() {
                    $('.noUi-handle').on('click', function(e) {
                        e.preventDefault();
                        const min_price = $('.noUi-handle').attr("aria-valuenow") ? $('.noUi-handle').attr("aria-valuenow") : 1;
                        const max_price = $('.noUi-handle').attr("aria-valuemax") ? $('.noUi-handle').attr("aria-valuemax") : 1;
                        $.ajax({
                            url: 'http://localhost/handlers/search/price_range.php',
                            type: 'POST',
                            data: {
                                min_price: min_price,
                                max_price: max_price,
                                category: <?php if (isset($_GET['category'])) {
                                                echo $_GET['category'];
                                            } else {
                                                echo 0;
                                            } ?>
                            },
                            success: function(data) {
                                console.log(data);
                                // $(".ajax_reload").html(data);
                                window.location = data;

                            },
                            error: function() {
                                alert('Error!');
                            },
                        })

                    })
                });

                //frontent price_range
            </script>

            <div id=" slider-range">
            </div>

            <hr>
            <div class="size-range">
                <h6 class="text-uppercase mb-3">Российский размер</h6>
                <ul class="list-unstyled mb-0 categories-list">
                    <?php

                    $ResultReadExistingSize = new \Models\Size;
                    $ResultReadExistingSize = $ResultReadExistingSize->existing_size();
                    foreach ($ResultReadExistingSize as $existing_size) {

                    ?>
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="<?= $existing_size['value'] ?>" id="size_<?= $existing_size['value'] ?>" <?php if ($_GET['size'] == $existing_size['value']) {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                } ?>>
                                <label class="form-check-label" for="size_<?= $existing_size['value'] ?>"><?= $existing_size['value'] ?></label>
                            </div>
                        </li>
                        <script>
                            $(document).ready(function() {
                                $('#size_<?= $existing_size['value'] ?>').on('click', function(e) {
                                    e.preventDefault();
                                    const size = <?= $existing_size['value'] ?>;
                                    $.ajax({
                                        url: 'http://localhost/handlers/search/size.php',
                                        type: 'POST',
                                        data: {
                                            size: size,
                                            category: <?= $_GET['category'] ?>
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
                    <?php } ?>

                </ul>
            </div>
            <hr>
            <div class="product-brands">
                <h6 class="text-uppercase mb-3">Бренды</h6>
                <ul class="list-unstyled mb-0 categories-list">
                    <?php
                    //выводим бренды
                    $ResultReadAllBrands = new \Models\Brand;
                    $ResultReadAllBrands = $ResultReadAllBrands->read_all_brands();
                    foreach ($ResultReadAllBrands as $brands) {

                    ?>
                        <li>
                            <div class="form-check">
                                <input type="hidden" value="<?= $brands['id'] ?>">
                                <?php

                                $brand_id = $brands['id'];
                                //считаем товары определённого бренда

                                $ResultReadProductsByBrandId = new \Models\Product;
                                $ResultReadProductsByBrandId = $ResultReadProductsByBrandId->read_products_by_brand_id($brand_id);
                                $i = 0;
                                foreach ($ResultReadProductsByBrandId as $product) {
                                    $i++;
                                }
                                $count_products_by_brand_id = $i;

                                //считаем товары определённого бренда

                                ?>

                                <input class="form-check-input" type="checkbox" value="" id="brand_<?= $brand_id ?>" <?php if ($_GET['brand'] == $brands['id']) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                                <label class="form-check-label" for="brand_<?= $brand_id ?>"><?= $brands['title'] ?> (<?= $count_products_by_brand_id ?>)</label>
                            </div>
                        </li>
                        <script>
                            $(document).ready(function() {
                                $('#brand_<?= $brand_id ?>').on('click', function(e) {
                                    e.preventDefault();
                                    const brand_id = <?= $brand_id ?>;
                                    $.ajax({
                                        url: 'http://localhost/handlers/search/brand.php',
                                        type: 'POST',
                                        data: {
                                            category: <?= $_GET['category'] ?>,
                                            brand_id: brand_id,
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
                    <?php
                    }
                    //выводим бренды
                    ?>
                </ul>
            </div>
            <hr>
            <div class="product-colors">
                <h6 class="text-uppercase mb-3">Цвет</h6>
                <ul class="list-unstyled mb-0 categories-list">
                    <?php

                    $ResultReadExistingColor = new \Models\Color;
                    $ResultReadExistingColor = $ResultReadExistingColor->read_existing_color();

                    foreach ($ResultReadExistingColor as $color) {

                    ?>
                        <li>
                            <div class="d-flex align-items-center cursor-pointer">
                                <input class="form-check-input color_ajax" type="checkbox" value="" id="color_<?= $color['id'] ?>" <?php if ($_GET['color'] == $color['value']) {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                                <div class="color-indigator"></div>
                                <p class="mb-0 ms-3 color_ajax"><?= $color['value'] ?></p>
                            </div>
                        </li>
                        <script>
                            $(document).ready(function() {
                                $('#color_<?= $color['id'] ?>').on('click', function(e) {
                                    e.preventDefault();
                                    const color = "<?= $color['value'] ?>";
                                    $.ajax({
                                        url: 'http://localhost/handlers/search/color.php',
                                        type: 'POST',
                                        data: {
                                            category: <?= $_GET['category'] ?>,
                                            color: color,
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
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>