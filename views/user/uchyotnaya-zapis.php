<?php

$id = $_SESSION['user_id'];

$ResultReadUserById = new \Models\User;
$ResultReadUserById = $ResultReadUserById->read_user_by_id($id);

foreach ($ResultReadUserById as $user) {
}

?>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Мои Заказы</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item home"><a href="<?= PATH ?>/"><i class="bx bx-home-alt"></i> Главная</a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?= PATH ?>/user/lichnyj-kabinet">Аккаунт</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Мои Заказы</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section class="py-4">
            <div class="container">
                <h3 class="d-none">Аккаунт</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow-none mb-3 mb-lg-0 border">
                                    <div class="card-body">
                                        <div class="list-group list-group-flush">
                                            <a href="<?= PATH ?>/user/lichnyj-kabinet" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Приборная панель <i class='bx bx-tachometer fs-5'></i></a>
                                            <a href="<?= PATH ?>/user/zakazy" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Заказы <i class='bx bx-cart-alt fs-5'></i></a>
                                            <a href="<?= PATH ?>/user/zagruzki" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Загрузки <i class='bx bx-download fs-5'></i></a>
                                            <a href="<?= PATH ?>/user/adresa" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Адреса <i class='bx bx-home-smile fs-5'></i></a>
                                            <a href="<?= PATH ?>/user/sposoby-oplaty" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Способы Оплаты <i class='bx bx-credit-card fs-5'></i></a>
                                            <a href="<?= PATH ?>/user/uchyotnaya-zapis" class="list-group-item active d-flex justify-content-between align-items-center">Учетная Запись <i class='bx bx-user-circle fs-5'></i></a>
                                            <a href="<?= PATH ?>/handlers/user/exit.php" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Выход <i class='bx bx-log-out fs-5'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0 border">
                                    <div class="card-body">
                                        <form class="row g-3" method="post" action="<?= PATH ?>/handlers/user/handler_uchyotnaya_zapis.php">
                                            <div class="col-md-6">
                                                <label class="form-label">Имя</label>
                                                <input type="text" class="form-control" value="<?= $user['name'] ?>" name="name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Фамилия</label>
                                                <input type="text" class="form-control" value="<?= $user['sirname'] ?>" name="sirname">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Отображаемое Имя</label>
                                                <input type="text" class="form-control" value="<?= $user['display_name'] ?>" name="display_name" required>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Адрес электронной почты</label>
                                                <input type="text" class="form-control" value="<?= $user['email'] ?>" name="email">
                                            </div>
                                            <div class=" col-12">
                                                <label class="form-label">Текущий Пароль</label>
                                                <input type="text" class="form-control" value="<?= $user['password'] ?>" name="password">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Новый Пароль</label>
                                                <input type="text" class="form-control" value="................." name="new_password">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Подтвердите Новый Пароль</label>
                                                <input type="text" class="form-control" value="................." name="confirm_password">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-dark btn-ecomm">Сохранить Изменения</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </section>
        <!--end shop cart-->
    </div>
</div>
<!--end page wrapper -->