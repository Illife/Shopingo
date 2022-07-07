<!doctype html>
<html lang="ru" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/../skodash/assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="/../skodash/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/../skodash/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/../skodash/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="/../skodash/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/../skodash/assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="/../skodash/assets/css/style.css" rel="stylesheet" />
    <link href="/../skodash/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="/../skodash/assets/css/pace.min.css" rel="stylesheet" />


    <!--Theme Styles-->
    <link href="/../skodash/assets/css/dark-theme.css" rel="stylesheet" />
    <link href="/../skodash/assets/css/light-theme.css" rel="stylesheet" />
    <link href="/../skodash/assets/css/semi-dark.css" rel="stylesheet" />
    <link href="/../skodash/assets/css/header-colors.css" rel="stylesheet" />

    <title>Shopingo :: Панель администратора</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="mobile-toggle-icon d-xl-none">
                    <i class="bi bi-list"></i>
                </div>
                <div class="top-navbar d-none d-xl-block">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Приборная панель</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="app-emailbox.html">Электронная почта</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">Проекты</a>
                        </li>
                        <li class="nav-item d-none d-xxl-block">
                            <a class="nav-link" href="javascript:;">События</a>
                        </li>
                        <li class="nav-item d-none d-xxl-block">
                            <a class="nav-link" href="app-to-do.html">Задачи</a>
                        </li>
                    </ul>
                </div>
                <div class="search-toggle-icon d-xl-none ms-auto">
                    <i class="bi bi-search"></i>
                </div>
                <form class="searchbar d-none d-xl-flex ms-auto">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i class="bi bi-search"></i></div>
                    <input class="form-control" type="text" placeholder="Поиск">
                    <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i class="bi bi-x-lg"></i></div>
                </form>
                <div class="top-navbar-right ms-3">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center gap-1">
                                    <img src="/../skodash/assets/images/avatars/avatar-1.png" class="user-img" alt="">
                                    <div class="user-name d-none d-sm-block">John Doe</div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="/../skodash/assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="60" height="60">
                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name">John Doe</h6>
                                                <small class="mb-0 dropdown-user-designation text-secondary">Администратор</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-user-profile.html">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-person-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Профиль</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-gear-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Учётная запись</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index2.html">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-speedometer"></i></div>
                                            <div class="setting-text ms-3"><span>Приборная панель</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-piggy-bank-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Прибыль</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-cloud-arrow-down-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Загрузки</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="authentication-signup-with-header-footer.html">
                                        <div class="d-flex align-items-center">
                                            <div class="setting-icon"><i class="bi bi-lock-fill"></i></div>
                                            <div class="setting-text ms-3"><span>Выход</span></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                <div class="projects">
                                    <i class="bi bi-grid-3x3-gap-fill"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="row row-cols-3 gx-2">
                                    <div class="col">
                                        <a href="ecommerce-orders.html">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-primary bg-gradient">
                                                    <i class="bi bi-cart-plus-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Заказы</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="javascript:;">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-danger bg-gradient">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Пользователи</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="ecommerce-products-grid.html">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-success bg-gradient">
                                                    <i class="bi bi-bank2"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Товары</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="component-media-object.html">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-orange bg-gradient">
                                                    <i class="bi bi-collection-play-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Медиа</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="pages-user-profile.html">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-purple bg-gradient">
                                                    <i class="bi bi-person-circle"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Профиль</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="javascript:;">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-dark bg-info bg-gradient">
                                                    <i class="bi bi-file-earmark-text-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Документы</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="ecommerce-orders-detail.html">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-pink bg-gradient">
                                                    <i class="bi bi-credit-card-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">Платежи</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="javascript:;">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-white bg-bronze bg-gradient">
                                                    <i class="bi bi-calendar-check-fill"></i>
                                                </div>
                                                <p class="mb-0 apps-name">События</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a href="javascript:;">
                                            <div class="apps p-2 radius-10 text-center">
                                                <div class="apps-icon-box mb-1 text-dark bg-warning bg-gradient">
                                                    <i class="bi bi-book-half"></i>
                                                </div>
                                                <p class="mb-0 apps-name">История</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                <div class="messages">
                                    <span class="notify-badge">5</span>
                                    <i class="bi bi-messenger"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="p-2 border-bottom m-2">
                                    <h5 class="h5 mb-0">Сообщения</h5>
                                </div>
                                <div class="header-message-list p-2">
                                    <div class="dropdown-item bg-light radius-10 mb-1">
                                        <form class="dropdown-searchbar position-relative">
                                            <div class="position-absolute top-50 start-0 translate-middle-y px-3 search-icon"><i class="bi bi-search"></i></div>
                                            <input class="form-control" type="search" placeholder="Search Messages">
                                        </form>
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="/../skodash/assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span class="msg-time float-end text-secondary">1 мин</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard chunk of lorem...</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="/../skodash/assets/images/avatars/avatar-2.png" alt="" class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span class="msg-time float-end text-secondary">7 мин</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Многие настольные публикации</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="/../skodash/assets/images/avatars/avatar-3.png" alt="" class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span class="msg-time float-end text-secondary">2 ч</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Делая это первым истинным</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="/../skodash/assets/images/avatars/avatar-4.png" alt="" class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Peter Costanzo <span class="msg-time float-end text-secondary">3 ч</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Он был популяризирован в 1960-х годах</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="/../skodash/assets/images/avatars/avatar-5.png" alt="" class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Thomas Wheeler <span class="msg-time float-end text-secondary">1 д</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Если вы собираетесь использовать проход</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="/../skodash/assets/images/avatars/avatar-6.png" alt="" class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Johnny Seitz <span class="msg-time float-end text-secondary">2 н</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">All the Lorem Ipsum generators</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="/../skodash/assets/images/avatars/avatar-1.png" alt="" class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span class="msg-time float-end text-secondary">1 мин</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The standard chunk of lorem...</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="/../skodash/assets/images/avatars/avatar-2.png" alt="" class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span class="msg-time float-end text-secondary">7 мин</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Многие настольные публикации</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="/../skodash/assets/images/avatars/avatar-3.png" alt="" class="rounded-circle" width="52" height="52">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span class="msg-time float-end text-secondary">2 ч</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Делая это первым истинным</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <div class="text-center">Просмотр Всех Сообщений</div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large d-none d-sm-block">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                                <div class="notifications">
                                    <span class="notify-badge">8</span>
                                    <i class="bi bi-bell-fill"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="p-2 border-bottom m-2">
                                    <h5 class="h5 mb-0">Уведомления</h5>
                                </div>
                                <div class="header-notifications-list p-2">
                                    <div class="dropdown-item bg-light radius-10 mb-1">
                                        <form class="dropdown-searchbar position-relative">
                                            <div class="position-absolute top-50 start-0 translate-middle-y px-3 search-icon"><i class="bi bi-search"></i></div>
                                            <input class="form-control" type="search" placeholder="Search Messages">
                                        </form>
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-basket2-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Новые Заказы <span class="msg-time float-end text-secondary">1 м</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Вы получили новые заказы</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-people-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Новые Клиенты <span class="msg-time float-end text-secondary">7 м</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5 новых пользователей</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">24 PDF Файла <span class="msg-time float-end text-secondary">2 ч</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Сгенерированные PDF-файлы</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-collection-play-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Время Отклика <span class="msg-time float-end text-secondary">3 ч</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Среднее время отклика 5,1 мин</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-cursor-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Новый Товар Одобрен <span class="msg-time float-end text-secondary">1 д</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Ваш новый товар одобрен</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-gift-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Новые комментарии <span class="msg-time float-end text-secondary">2 н</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Получены новые комментарии клиентов</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-droplet-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Новые 24 автора<span class="msg-time float-end text-secondary">1 мин</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">На прошлой неделе к нам присоединились 24 новых автора</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-mic-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Ваш товар отправлен <span class="msg-time float-end text-secondary">7 мин</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Ваш товар успешно отправлен</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-lightbulb-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Предупреждения о защите <span class="msg-time float-end text-secondary">2 ч</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">на 45% меньше предупреждений за последние 4 недели</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-bookmark-heart-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">4 Новых Регистраций <span class="msg-time float-end text-secondary">2 н</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">4 Новых регистраций пользователей</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box"><i class="bi bi-briefcase-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Все Загруженные Документы <span class="msg-time float-end text-secondary">1 м</span></h6>
                                                <small class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Успешно загружены все файлы</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" href="#">
                                        <div class="text-center">Просмотр Всех Уведомлений</div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->