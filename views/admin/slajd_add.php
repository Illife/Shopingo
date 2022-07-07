<!--start content-->
<main class="page-content">
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Слайды</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="<?= PATH . "/admin" ?>"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Добавление слайда</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
      <div class="btn-group">
        <button type="button" class="btn btn-primary">Настройки</button>
        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Выпадающий список</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Действие</a>
          <a class="dropdown-item" href="javascript:;">Другое действие</a>
          <a class="dropdown-item" href="javascript:;">Что-нибудь ещё здесь</a>
          <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Ссылка</a>
        </div>
      </div>
    </div>
  </div>
  <!--end breadcrumb-->

  <div class="row">
    <div class="col-xl-6 mx-auto">

      <div class="card">
        <div class="card-body">
          <div class="border p-3 rounded">
            <h6 class="mb-0 text-uppercase">Добавить слайд</h6>
            <hr />
            <form class="row g-3" method="post" action="<?= PATH ?>/handlers/glavnaya_karusel_slajd_add.php" enctype="multipart/form-data">
              <div class="col-12">
                <label class="form-label">Заголовок</label>
                <input type="text" class="form-control" name="title">
              </div>
              <div class="col-12">
                <label class="form-label">Подзаголовок</label>
                <input type="text" class="form-control" name="subtitle">
              </div>
              <div class="col-12">
                <label class="form-label">Текст</label>
                <input type="text" class="form-control" name="text">
              </div>
              <div class="col-12">
                <label class="form-label">Кнопка:</label>
                <input type="text" name="btn" class="form-control ajax_btn">
              </div>
              <div class="col-12">
                <label class="form-label">Изображение</label>
                <label for="fancy-file-upload" class="btn d-flex flex-column">
                  <img class="slider_img" width=600 height=600 src="/uploads/04.png" alt="">
                </label>
                <input id="fancy-file-upload" class="ajax_file" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple onchange="previewFile()" style="visibility:hidden;">
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
  <!--end row-->

  <!--end row-->
</main>
<!--end page main-->