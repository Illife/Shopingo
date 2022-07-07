<!--start content-->

<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Товар</div>
        <?php
        foreach ($ResultReadProductById as $product) {
        }
        ?>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 d-flex flex-row align-items-center">
                    <li class="breadcrumb-item"><a href="<?= PATH . '/admin' ?>"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $product['title'] ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col col-lg-9 mx-auto">

            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Товар <?= $product['id'] ?></h6>
                        <hr />
                        <form class="row g-3" method="post" action="<?= PATH ?>/handlers/update_product_by_id.php" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="old_img" class="ajax_img" value="<?= $product['img'] ?>">

                            <div class="col-12 d-flex flex-column">

                                <label class="form-label">Выбрать изображение:</label>
                                <label for="fancy-file-upload" class="btn d-flex flex-column">
                                    <img class="slider_img" width=600 <?php if ($product['img'] !== 'empty') { ?> src="<?= PATH . '/' . $product['img'] ?>" <?php }  ?>alt="">
                                </label>
                                <input id="fancy-file-upload" class="ajax_file" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple onchange="previewFile()" style="visibility:hidden;">

                            </div>

                            <div class="col-12">
                                <label class="form-label">Название:</label>
                                <input type="text" name="title" class="form-control ajax_title" value="<?= $product['title'] ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Цена:</label>
                                <input type="text" name="price" class="form-control ajax_text" value="<?= $product['price'] ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Старая цена:</label>
                                <input type="text" name="old_price" class="form-control ajax_text" value="<?= $product['old_price'] ?>">
                            </div>

                            <?php
                            $category_id = $product['category_id'];

                            $ResultReadCategoryById = new \Models\Category;
                            $ResultReadCategoryById = $ResultReadCategoryById->read_category_by_id($category_id);

                            foreach ($ResultReadCategoryById as $category) {
                            }
                            ?>

                            <div class="col-12">
                                <label class="form-label">Категория товара:</label>

                                <select class="form-select select_products_read" name="category">
                                    <?php foreach ($ResultReadCategories as $category) { ?>
                                        <option value="<?= $category['id'] ?>" class="form_products_read_option" <?php if ($category['id'] == $product['category_id']) {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>><?= $category['title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Бренд:</label>
                                <select class="form-select select_products_read" name="brand">
                                    <?php foreach ($ResultReadAllBrands as $brand) { ?>
                                        <option value="<?= $brand['id'] ?>" class="form_products_read_option" <?php if ($brand['id'] == $product['brand_id']) {
                                                                                                                    echo 'selected';
                                                                                                                } ?>><?= $brand['title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Цвет:</label>
                                <input type="text" name="color" class="form-control ajax_text" value="<?= $product['color'] ?>">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Размер:</label>
                                <input type="text" name="size" class="form-control ajax_text" value="<?= $product['size'] ?>">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Статус:</label>
                                <select class="form-select select_products_read" name="status">
                                    <?php foreach ($ResultReadStatus as $status) { ?>
                                        <option value="<?= $status['id'] ?>" class="form_products_read_option" <?php if ($status['value'] == $product['status']) {
                                                                                                                    echo 'selected';
                                                                                                                } ?>><?= $status['value'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Дата:</label>
                                <input type="text" name="date" class="form-control ajax_text" value="<?= $product['date'] ?>">
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end-->


</main>
<!--end page main-->