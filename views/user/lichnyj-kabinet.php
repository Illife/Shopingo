<?php

if (!isset($_SESSION['user'])) {
    echo "<script>location.href='" . PATH . "/user/signup';</script>";
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
                                <li class="breadcrumb-item home"><a href="javascript:;"><i class="bx bx-home-alt"></i> Главная</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Аккаунт</a>
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
                                <div class="card shadow-none mb-3 mb-lg-0 border rounded-0">
                                    <div class="card-body">
                                        <div class="list-group list-group-flush">
                                            <a href="<?= PATH ?>/user/lichnyj-kabinet" class="list-group-item active d-flex justify-content-between align-items-center">Приборная панель <i class='bx bx-tachometer fs-5'></i></a>
                                            <a href="<?= PATH ?>/user/zakazy" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Заказы <i class='bx bx-cart-alt fs-5'></i></a>
                                            <a href="<?= PATH ?>/user/zagruzki" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Загрузки <i class='bx bx-download fs-5'></i></a>
                                            <a href="<?= PATH ?>/user/adresa" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Адреса <i class='bx bx-home-smile fs-5'></i></a>
                                            <a href="<?= PATH ?>/user/sposoby-oplaty" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Способы Оплаты <i class='bx bx-credit-card fs-5'></i></a>
                                            <a href="<?= PATH ?>/user/uchyotnaya-zapis" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Учетная Запись <i class='bx bx-user-circle fs-5'></i></a>
                                            <a href="<?= PATH ?>/handlers/user/exit.php" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Выход <i class='bx bx-log-out fs-5'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                            $id = $_SESSION['user_id'];

                            $ResultReadUserById = new \Models\User;
                            $ResultReadUserById = $ResultReadUserById->read_user_by_id($id);

                            foreach ($ResultReadUserById as $user) {
                            }


                            ?>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
                                        <p>Здравствуйте, <strong><?= $user['display_name'] ?></strong> (не <strong><?= $user['display_name'] ?>?</strong> <a href="<?= PATH ?>/handlers/user/exit.php">Выход</a>)</p>
                                        <p>На панели управления вашей учетной записи вы можете просматривать свои последние заказы, управлять адресами доставки и выставления счетов, а также редактировать свой пароль и данные учетной записи</p>
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