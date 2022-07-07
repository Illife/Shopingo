<!--start page wrapper -->

<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Категории Товаров</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item home"><a href="javascript:;"><i class="bx bx-home-alt"></i> Главная</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Магазин</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Категории Товаров</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop categories-->
        <section class="py-4">
            <div class="container">
                <div class="product-categories">
                    <div class="row row-cols-1 row-cols-lg-4 g-4">
                        <?php foreach ($ResultReadCategories as $category) { ?>
                            <div class="col">
                                <div class="card rounded-0 product-card">
                                    <a href="javascript:;">
                                        <img src="<?= $category['img'] ?>" class="card-img-top border-bottom bg-dark-1" alt="...">
                                    </a>
                                    <div class="list-group list-group-flush">
                                        <a href="javascript:;" class="list-group-item bg-transparent">
                                            <h6 class="mb-0 text-uppercase"><?= $category['title'] ?></h6>
                                        </a>
                                        <?php foreach ($ResultReadSubCategories as $sub_category) { ?>
                                            <?php if ($category['id'] == $sub_category['parent_id']) { ?>
                                                <a href="javascript:;" class="list-group-item bg-transparent d-flex justify-content-between align-items-center">
                                                    <?= $sub_category['title'] ?>
                                                    <span class="badge bg-primary rounded-pill">14</span>
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end shop categories-->
        <!--start brand-->
        <section class="py-4">
            <div class="container">
                <div class="popular-brands">
                    <div class="text-center">
                        <h2 class="text-uppercase mb-0">Популярные Бренды</h2>
                        <hr>
                    </div>
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-xl-5 g-4">
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/01.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/02.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/03.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/04.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/05.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/06.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/07.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/08.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/09.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/10.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/11.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/12.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/13.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/14.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card shadow-none border">
                                <div class="card-body">
                                    <a href="javscript:;">
                                        <img src="assets/images/brands/15.png" class="img-fluid" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end brand-->
    </div>
</div>
<!--end page wrapper -->