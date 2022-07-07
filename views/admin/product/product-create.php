<!--start content-->
<main class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Интернет-магазин</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="<?= PATH . '/admin' ?>"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Добавить новый товар</li>
        </ol>
      </nav>
    </div>

  </div>
  <!--end breadcrumb-->

  <div class="row">
    <div class="col-lg-8 mx-auto">
      <div class="card">
        <div class="card-header py-3 bg-transparent">
          <h5 class="mb-0">Добавить новый товар</h5>
        </div>
        <div class="card-body">
          <div class="border p-3 rounded">
            <form class="row g-3" method="post" action="<?= PATH ?>/handlers/product_create_main.php" enctype="multipart/form-data">
              <div class="col-12">
                <label class="form-label">Изображение:</label>
                <input class="form-control" type="file" name="files" required>
              </div>
              <div class="col-12">
                <label class="form-label">Название:</label>
                <input type="text" class="form-control" placeholder="Название" name="title">
              </div>

              <div class="col-12">
                <label class="form-label">Описание:</label>
                <input type="text" class="form-control" placeholder="Описание" name="description">
              </div>

              <div class="col-12">
                <label class="form-label">Цена:</label>
                <input type="text" class="form-control" placeholder="Цена" name="price" required>
              </div>

              <div class="col-12">
                <label class="form-label">Старая цена:</label>
                <input type="text" class="form-control" placeholder="Старая цена" name="old_price" required>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label">Категория:</label>
                <select class="form-select product_create" name="category">
                  <?php foreach ($ResultReadCategories as $category) { ?>
                    <option value="<?= $category_id = $category['id'] ?>"><?= $category['title'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-12 col-md-6">
                <label class="form-label">Подкатегория:</label>

                <select class="form-select product_create_subcategory" name="subcategory">

                </select>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label">Бренд:</label>
                <select class="form-select" name="brand">
                  <?php foreach ($ResultReadAllBrands as $brand) { ?>
                    <option value="<?= $brand['id'] ?>"><?= $brand['title'] ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label">Цвет:</label>
                <input type="text" class="form-control" placeholder="Цвет" name="color">
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label">Размер:</label>
                <input type="text" class="form-control" placeholder="Размер" name="size">
              </div>

              <div class="col-12 col-md-6">
                <label class="form-label">Статус:</label>
                <select class="form-select" name="status">
                  <?php foreach ($ResultReadStatus as $status) { ?>
                    <option value="<?= $status['value'] ?>"><?= $status['value'] ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="col-12">
                <button class="btn btn-primary px-4">Сохранить</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end row-->

</main>
<!--end page main-->