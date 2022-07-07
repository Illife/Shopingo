<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Компоненты</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Карусель</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Настройки</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Переключить выпадающий список</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Действие</a>
                    <a class="dropdown-item" href="javascript:;">Еще одно действие</a>
                    <a class="dropdown-item" href="javascript:;">Здесь что-то еще</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Разделенная ссылка</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <?php
    foreach ($ResultReadSlide as $slide) {
        // echo ('<pre>');
        // echo print_r($slide);
        // echo ('</pre>');
    }
    ?>
    <div class="row">
        <div class="col col-lg-9 mx-auto">

            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Слайд <?= $slide['id'] ?></h6>
                        <hr />
                        <form class="row g-3" method="post" action="<?= PATH ?>/handlers/glavnaya_karusel.php" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $slide['id'] ?>">
                            <input type="hidden" name="old_img" class="ajax_img" value="<?= $slide['img'] ?>">
                            <div class="col-12">
                                <label class="form-label">Заголовок:</label>
                                <input type="text" name="title" class="form-control ajax_title" value="<?= $slide['title'] ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Подзаголовок:</label>
                                <input type="text" name="subtitle" class="form-control ajax_subtitle" value="<?= $slide['subtitle'] ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Текст:</label>
                                <input type="text" name="text" class="form-control ajax_text" value="<?= $slide['text'] ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Кнопка:</label>
                                <input type="text" name="btn" class="form-control ajax_btn" value="<?= $slide['btn'] ?>">
                            </div>
                            <div class="col-12 d-flex flex-column">
                                <label class="form-label">Выбрать изображение:</label>
                                <label for="fancy-file-upload" class="btn d-flex flex-column">
                                    <img class="slider_img" width=600 height=600 src="<?= PATH . $slide['img'] ?>" alt="">
                                </label>
                                <input id="fancy-file-upload" class="ajax_file" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple onchange="previewFile()" style="visibility:hidden;">


                            </div>

                            <!-- <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end-->


</main>
<!--end page main-->