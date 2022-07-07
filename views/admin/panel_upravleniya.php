<!--start content-->
<main class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3" style="border-right:inherit;">Приборная панель</div>
    <div class="ms-auto">
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Настройки</button>
        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Выпадающий список</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Действие</a>
          <a class="dropdown-item" href="javascript:;">Другое действие</a>
          <a class="dropdown-item" href="javascript:;">Что-нибудь ещё</a>
          <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Ссылка</a>
        </div>
      </div>
    </div>
  </div>
  <!--end breadcrumb-->


  <div class="row">
    <div class="col-12 col-lg-12 col-xl-6 d-flex">
      <div class="card radius-10 w-100">
        <div class="card-body">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3 g-3">
            <div class="col">
              <div class="card radius-10 bg-tiffany mb-0">
                <div class="card-body text-center">
                  <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                    <i class="bi bi-file-earmark-break-fill"></i>
                  </div>
                  <h3 class="text-white">25</h3>
                  <p class="mb-0 text-white">Страниц</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card radius-10 bg-danger mb-0">
                <div class="card-body text-center">
                  <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                    <i class="bi bi-hdd-fill"></i>
                  </div>
                  <h3 class="text-white">35</h3>
                  <p class="mb-0 text-white">Сообщений</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card radius-10 bg-success mb-0">
                <div class="card-body text-center">
                  <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <h3 class="text-white">16</h3>
                  <p class="mb-0 text-white">Пользователей</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card radius-10 bg-dark mb-0">
                <div class="card-body text-center">
                  <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                    <i class="bi bi-file-earmark-check-fill"></i>
                  </div>
                  <h3 class="text-white">18</h3>
                  <p class="mb-0 text-white">Файлов</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card radius-10 bg-purple mb-0">
                <div class="card-body text-center">
                  <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                    <i class="bi bi-tags-fill"></i>
                  </div>
                  <h3 class="text-white">
                    <?php
                    require_once __DIR__ . '/../../models/Category.php';
                    $ResultReadSubCategories = new \Models\Category;
                    $ResultReadSubCategories = $ResultReadSubCategories->read_subcategories();
                    $i = 0;
                    foreach ($ResultReadSubCategories as $category) {
                      $i++;
                    }
                    echo $i;
                    ?>
                  </h3>
                  <p class="mb-0 text-white">Категории</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card radius-10 bg-orange mb-0">
                <div class="card-body text-center">
                  <div class="widget-icon mx-auto mb-3 bg-white-1 text-white">
                    <i class="bi bi-chat-left-quote-fill"></i>
                  </div>
                  <h3 class="text-white">45</h3>
                  <p class="mb-0 text-white">Комментариев</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--end row-->

</main>
<!--end page main-->