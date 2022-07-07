<!--start content-->
<main class="page-content">
    <!--breadcrumb-->

    <?php

    if ($_SESSION['user'] === 'admin') {

    ?>

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Панель администратора</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Вы вошли, как администратор</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

    <?php } else { ?>

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Панель администратора</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Вход</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-6 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">Вход</h6>
                            <hr />
                            <form class="row g-3" action="<?= PATH ?>/handlers/user/is_admin.php" method="post">
                                <div class="col-12">
                                    <label class="form-label">Имя:</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Пароль:</label>
                                    <input type="text" class="form-control" name="password">
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Войти</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php } ?>

</main>
<!--end page main-->