<!--start page wrapper -->

<?php

if (isset($_SESSION['user'])) {
    echo "<script>location.href='" . PATH . "/user/lichnyj-kabinet';</script>";
} else {

?>

    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        <h3 class="breadcrumb-title pe-3">Регистрация</h3>
                        <div class="ms-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?= PATH ?>/"><i class="bx bx-home-alt"></i> Главная</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:;">Авторизация</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Регистрация</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <!--start shop cart-->
            <section class="py-0 py-lg-5">
                <div class="container">
                    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
                        <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
                            <div class="col mx-auto">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="border p-4 rounded">
                                            <div class="text-center">
                                                <h3 class="">Регистрация</h3>
                                                <p>У вас уже есть учетная запись? <a href="authentication-signin.html">Войти</a>
                                                </p>
                                            </div>
                                            <div class="d-grid">
                                                <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                                                        <img class="me-2" src="<?= PATH ?>/assets/images/icons/search.svg" width="16" alt="Image Description">
                                                        <span>Войти с помощью Google</span>
                                                    </span>
                                                </a> <a href="javascript:;" class="btn btn-white"><i class="bx bxl-facebook"></i>Войти с помощью Facebook</a>
                                            </div>
                                            <div class="login-separater text-center mb-4"> <span>ИЛИ ВОЙТИ С ПОМОЩЬЮ EMAIL</span>
                                                <hr />
                                            </div>
                                            <div class="form-body">
                                                <form class="row g-3" action="<?= PATH ?>/handlers/user/handler_signup.php" method="post">
                                                    <div class="col-12">
                                                        <label for="inputFirstName" class="form-label">Имя</label>
                                                        <input type="text" class="form-control" id="inputFirstName" placeholder="Jhon" name="name" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="inputEmailAddress" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" name="email" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="inputChoosePassword" class="form-label">Пароль</label>
                                                        <div class="input-group" id="show_hide_password">
                                                            <input type="password" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password" name="password" required>
                                                            <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                            <label class="form-check-label" for="flexSwitchCheckChecked">Я прочитал и согласен с Правилами и условиями</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-dark"><i class='bx bx-user'></i>Зарегистрироваться</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </section>
            <!--end shop cart-->
        </div>
    </div>

<?php } ?>
<!--end page wrapper -->