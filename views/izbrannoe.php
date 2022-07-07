<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Избранное</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item home"><a href="<?= PATH ?>/"><i class="bx bx-home-alt"></i> Главная</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Избранное</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start Featured product-->
        <section class="py-4">
            <div class="container">
                <div class="product-grid">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3">


                        <?php

                        foreach ($_SESSION['wishlist'] as $wishlist) {
                            $id = $wishlist;
                            $ResultReadProductById = new \Models\Product;
                            $ResultReadProductById = $ResultReadProductById->read_product_by_id($id);
                            foreach ($ResultReadProductById as $products) {
                        ?>
                                <div class="col">
                                    <div class="card rounded-0 product-card">
                                        <a href="product-details.html">
                                            <img src="<?= PATH . "/" . $products['img'] ?>" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="javascript:;">
                                                    <p class="product-catergory font-13 mb-1">
                                                        <?php

                                                        $category_id = $products['category_id'];
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
                                                        $product_title = $products['title'];
                                                        $product_title = substr($product_title, 0, 20);
                                                        $product_title = rtrim($product_title, "!,.-");
                                                        $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                                                        echo $product_title . "… ";
                                                        ?>
                                                    </h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    <div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">&#8381;<?= $products['old_price'] ?></span>
                                                        <span class="fs-5">&#8381;<?= $products['price'] ?></span>
                                                    </div>
                                                    <div class="cursor-pointer ms-auto"> <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="product-action mt-2">
                                                    <div class="d-grid gap-2">
                                                        <a href="javascript:;" class="btn btn-white btn-ecomm"> <i class='bx bxs-cart-add'></i>Добавить в корзину</a>
                                                        <div class="btn btn-light btn-ecomm wishlist_delete_<?= $products['id'] ?>" style="z-index:100!important;"><i class='bx bx-zoom-out'></i>Удалить Из Списка</div>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('.wishlist_delete_<?= $products['id'] ?>').on('click', function(e) {
                                                                e.preventDefault();
                                                                const id = <?= $products['id'] ?>;
                                                                $.ajax({
                                                                    url: 'http://localhost/handlers/wishlist_delete.php',
                                                                    type: 'POST',
                                                                    data: {
                                                                        id: id,
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>




                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end Featured product-->
    </div>
</div>
<!--end page wrapper -->