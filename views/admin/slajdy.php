<!--start content-->
<main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Интернет-магазин</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= PATH . "/admin" ?>"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Слайды</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Настройки</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Переключить выпадающий список</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                    <a class="dropdown-item" href="<?= PATH . "/admin/slajd-add" ?>">Добавить слайд</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">

        <div class="card-body">

            <div class="table-responsive">
                <?php foreach ($ResultReadSlides as $slider) { ?>
                    <table class="table align-middle">
                        <tbody>
                            <tr class="d-flex flex-row justify-content-between" style="background-color:#f2f2f2;">
                                <td class="productlist d-flex">
                                    <a class="d-flex align-items-center gap-2" href="slajd/?id=<?= $slider['id'] ?>">
                                        <div class="product-box">
                                            <img src="/../..<?= $slider['img'] ?>" alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 product-title"><?= $slider['title'] ?></h6>
                                        </div>
                                    </a>
                                </td>
                                <td class="d-flex">
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="<?= PATH . "/admin/slajd/?id=" . $slider['id'] ?>" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Редактировать" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="<?= PATH . "/admin/slajd-delete/?id=" . $slider['id'] ?>" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Удалить" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>
            </div>

        </div>
    </div>

</main>
<!--end page main-->