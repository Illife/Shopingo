<!--start content-->
<main class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Интернет-магазин</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="<?= PATH ?>/admin"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Категории</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Настройки</button>
        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Выпадающий список</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
          <a class="dropdown-item" href="javascript:;">Действие</a>
          <a class="dropdown-item" href="javascript:;">Другое действие</a>
          <a class="dropdown-item" href="javascript:;">Что-нибудь ещё</a>
          <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Ссылка</a>
        </div>
      </div>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="card">
    <div class="card-header py-3">
      <h6 class="mb-0">Добавить категорию</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-lg-4 d-flex">
          <div class="card border shadow-none w-100">
            <div class="card-body">
              <form class="row g-3" method="post" action="<?= PATH ?>/handlers/category_add.php" enctype="multipart/form-data">
                <div class="col-12">
                  <label class="form-label">Выбрать изображение (*необязательно):</label>
                  <label for="fancy-file-upload" class="btn d-flex flex-column" style="height:35px; border:1px solid #ced4da">
                  </label>
                  <input id="fancy-file-upload" class="ajax_file" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple onchange="previewFile()" style="visibility:hidden;">
                </div>
                <div class="col-12">
                  <label class="form-label">Название:</label>
                  <input type="text" class="form-control" placeholder="Название категории" name="title">
                </div>
                <div class="col-12">
                  <label class="form-label">Слаг:</label>
                  <input type="text" class="form-control" placeholder="Слаг" name="slug">
                </div>
                <div class="col-12">
                  <label class="form-label">Родительская категория:</label>
                  <select class="form-select" name="parent_id">
                    <option value="0">Отдельная категория</option>
                    <?php foreach ($ResultReadCategories as $category) { ?>
                      <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn btn-primary">Добавить категорию</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-8 d-flex">
          <div class="card border shadow-none w-100">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-middle">
                  <thead class="table-light">
                    <tr>
                      <th><input class="form-check-input" type="checkbox"></th>
                      <th>Id</th>
                      <th>Название</th>
                      <th>Слаг</th>
                      <th>Заказы</th>
                      <th>Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ResultReadCategories as $category) { ?>
                      <tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['title'] ?></td>
                        <td><?= $category['slug'] ?></td>
                        <td>54</td>
                        <td>
                          <div class="d-flex align-items-center gap-3 fs-6">
                            <a href="<?= PATH . '/admin/kategoriya/?id=' . $category['id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                            <a href="<?= PATH . '/admin/kategoriya-delete/?id=' . $category['id'] ?>" class="text-danger category_delete"><i class="bi bi-trash-fill"></i></a>
                            <!-- Modal -->

                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <nav class="float-end mt-0" aria-label="Page navigation">
                <ul class="pagination">
                  <?php

                  if (($page - 1) > 0) {
                    $previous = $page - 1;
                  } else {
                    $previous = 1;
                  }

                  if (($page + 1) < $countPages) {
                    $next = $page + 1;
                  } else {
                    $next = $countPages;
                  }

                  ?>
                  <li class="page-item"><a class="page-link" href="<?= PATH . '/admin/kategorii-tovarov/' . '?page=' . $previous ?>">Назад</a></li>
                  <?php for ($i = 1; $i <= $countPages; $i++) { ?>
                    <li class="page-item <?php if ($i == $page) {
                                            echo ('active');
                                          } ?>"><a class="page-link" href="<?= PATH . '/admin/kategorii-tovarov/' . '?page=' . $i ?>"><?= $i ?></a></li>
                  <?php } ?>

                  <li class="page-item"><a class="page-link" href="<?= PATH . '/admin/kategorii-tovarov/' . '?page=' . $next ?>">Вперёд</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>

</main>
<!--end page main-->