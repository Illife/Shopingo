<!--start content-->

<main class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Интернет-магазин</div>

    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0 d-flex flex-row align-items-center">
          <li class="breadcrumb-item"><a href="<?= PATH . '/admin' ?>"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Товары</li>
        </ol>
      </nav>
    </div>

  </div>
  <!--end breadcrumb-->

  <div class="card">
    <div class="card-header py-3">
      <div class="row align-items-center m-0">
        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
          <form action="<?= PATH ?>/handlers/products_read_by_category_id.php" method="post" class="form_products_read">
            <select class="form-select select_products_read" name="select">
              <option value="0">Все категории</option>

              <?php foreach ($ResultReadCategories as $category) { ?>
                <option value="<?= $category['id'] ?>" class="form_products_read_option" <?php if ($_GET['category'] == $category['id']) {
                                                                                            echo ('selected');
                                                                                          } ?>><?= $category['title'] ?></option>
              <?php } ?>
            </select>
          </form>
        </div>
        <div class="col-md-2 col-6">
          <form action="<?= PATH ?>/handlers/products_read_by_status.php" method="post" class="form_products_read_by_status">
            <select class="form-select select_products_read_by_status" name="select">
              <option value="в наличии">Статус</option>
              <option value="в наличии">В наличии</option>
              <option value="нет в наличии">Нет в наличии</option>
              <option value="в архиве">В архиве</option>
            </select>
          </form>
        </div>
      </div>
    </div>
    <div class="card-body">

      <div class="table-responsive">
        <table class="table align-middle table-striped">
          <tbody>
            <?php foreach ($ResultReadProductsByCategoryId as $product) { ?>
              <tr>
                <td>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox">
                  </div>
                </td>
                <td class="productlist">
                  <a class="d-flex align-items-center gap-2" href="<?= PATH . '/admin/product/?id=' . $product['id'] ?>">
                    <div class="product-box">
                      <img src="<?= PATH . '/' . $product['img'] ?>" alt="">
                    </div>
                    <div>
                      <?php
                      $product_title = $product['title'];
                      $product_title = substr($product_title, 0, 150);
                      $product_title = rtrim($product_title, "!,.-");
                      $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                      ?>
                      <h6 class="mb-0 product-title"><?= $product_title . "… " ?></h6>
                    </div>
                  </a>
                </td>
                <td><span>&#8381;<?= $product['price'] ?></span></td>
                <td><span class="badge rounded-pill alert-success"><?= $product['status'] ?></span></td>
                <td><span><?= $product['date'] ?></span></td>
                <td>
                  <div class="d-flex align-items-center gap-3 fs-6">
                    <a href="<?= PATH . '/admin/product/?id=' . $product['id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                    <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                  </div>
                </td>
              </tr>
            <?php } ?>

            <?php
            foreach ($ResultReadCategoryByParentId as $category_2) {
              $category_id = $category_2['id'];
              $ResultReadProductsBySubCategoryId = new \Models\Product;
              $ResultReadProductsBySubCategoryId = $ResultReadProductsBySubCategoryId->read_products_by_category_id($category_id);
              foreach ($ResultReadProductsBySubCategoryId as $product) {

            ?>
                <tr>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox">
                    </div>
                  </td>
                  <td class="productlist">
                    <a class="d-flex align-items-center gap-2" href="<?= PATH . '/admin/product/?id=' . $product['id'] ?>">
                      <div class="product-box">
                        <img src="<?= PATH . '/' . $product['img'] ?>" alt="">
                      </div>
                      <div>
                        <?php
                        $product_title = $product['title'];
                        $product_title = substr($product_title, 0, 150);
                        $product_title = rtrim($product_title, "!,.-");
                        $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                        ?>
                        <h6 class="mb-0 product-title"><?= $product_title . "… " ?></h6>
                      </div>
                    </a>
                  </td>
                  <td><span>&#8381;<?= $product['price'] ?></span></td>
                  <td><span class="badge rounded-pill alert-success"><?= $product['status'] ?></span></td>
                  <td><span><?= $product['date'] ?></span></td>
                  <td>
                    <div class="d-flex align-items-center gap-3 fs-6">
                      <a href="<?= PATH . '/admin/product/?id=' . $product['id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                      <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                    </div>
                  </td>
                </tr>
              <?php } ?>
              <?php

              // категории 3 уровня
              $ResultReadCategory_3_ByParentId = new \Models\Category;
              $ResultReadCategory_3_ByParentId = $ResultReadCategory_3_ByParentId->read_category_by_parent_id($category_id);

              foreach ($ResultReadCategory_3_ByParentId as $category_3) {
                $category_id = $category_3['id'];
                //категории 3 уровня
                //товары 3 уровня
                $ResultReadProductsBySubCategoryId = new \Models\Product;
                $ResultReadProductsBySubCategoryId = $ResultReadProductsBySubCategoryId->read_products_by_category_id($category_id);
                foreach ($ResultReadProductsBySubCategoryId as $product) {
              ?>
                  <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                      </div>
                    </td>
                    <td class="productlist">
                      <a class="d-flex align-items-center gap-2" href="<?= PATH . '/admin/product/?id=' . $product['id'] ?>">
                        <div class="product-box">
                          <img src="<?= PATH . '/' . $product['img'] ?>" alt="">
                        </div>
                        <div>
                          <?php
                          $product_title = $product['title'];
                          $product_title = substr($product_title, 0, 150);
                          $product_title = rtrim($product_title, "!,.-");
                          $product_title = substr($product_title, 0, strrpos($product_title, ' '));
                          ?>
                          <h6 class="mb-0 product-title"><?= $product_title . "… " ?></h6>
                        </div>
                      </a>
                    </td>
                    <td><span>&#8381;<?= $product['price'] ?></span></td>
                    <td><span class="badge rounded-pill alert-success"><?= $product['status'] ?></span></td>
                    <td><span><?= $product['date'] ?></span></td>
                    <td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="<?= PATH . '/admin/product/?id=' . $product['id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              <?php } ?>
            <?php } ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>

</main>
<!--end page main-->