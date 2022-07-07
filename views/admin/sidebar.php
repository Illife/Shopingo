<!--start sidebar -->
<aside class="sidebar-wrapper">
    <div class="iconmenu">
        <div class="nav-toggle-box">
            <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
        </div>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Приборная панель">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-dashboards" type="button"><i class="bi bi-house-door-fill"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Карусели">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-components" type="button"><i class="bi bi-arrow-repeat"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Интернет-магазин">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-ecommerce" type="button"><i class="bi bi-bag-check-fill"></i></button>
            </li>

            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Страницы">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-pages" type="button"><i class="bi bi-award-fill"></i></button>
            </li>
        </ul>
    </div>
    <div class="textmenu">
        <div class="brand-logo">
            <a href="<?= PATH ?>" target="_blank"><img src="/../skodash/assets/images/brand-logo-2.png" width="140" alt="" /></a>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="pills-dashboards">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Приборная панель</h5>
                        </div>
                        <small class="mb-0"></small>
                    </div>
                    <a href="<?= PATH ?>/admin/glavnaya" class="list-group-item"><i class="bi bi-cart-plus"></i>Интернет-магазин</a>
                    <a href="<?= PATH ?>/admin/prodazhi" class="list-group-item"><i class="bi bi-wallet"></i>Продажи</a>
                    <a href="<?= PATH ?>/admin/upravlenie-proektom" class="list-group-item"><i class="bi bi-archive"></i>Управление проектом</a>
                    <a href="<?= PATH ?>/admin/panel-upravleniya" class="list-group-item"><i class="bi bi-cast"></i>Панель управления</a>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-components">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Карусели</h5>
                        </div>
                    </div>
                    <a href="<?= PATH ?>/admin/slajdy" class="list-group-item"><i class="bi bi-list-check"></i>Главная карусель</a>
                </div>

            </div>
            <div class="tab-pane fade" id="pills-ecommerce">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Интернет-магазин</h5>
                        </div>
                    </div>
                    <a href="<?= PATH ?>/admin/kategorii-tovarov" class="list-group-item"><i class="bi bi-card-text"></i>Категории товаров</a>
                    <a href="<?= PATH ?>/admin/products" class="list-group-item"><i class="bi bi-box-seam"></i>Список товаров</a>
                    <a href="<?= PATH ?>/admin/product-create" class="list-group-item"><i class="bi bi-handbag"></i>Добавить Новый Товар</a>
                    <a href="ecommerce-products-grid.html" class="list-group-item"><i class="bi bi-box-seam"></i>Плитка</a>

                    <a href="ecommerce-orders.html" class="list-group-item"><i class="bi bi-plus-square"></i>Заказы</a>
                    <a href="ecommerce-orders-detail.html" class="list-group-item"><i class="bi bi-handbag"></i>Подробная информация о заказах</a>

                    <a href="ecommerce-transactions.html" class="list-group-item"><i class="bi bi-handbag"></i>Операции</a>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-pages">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Страницы</h5>
                        </div>
                    </div>
                    <a href="pages-user-profile.html" class="list-group-item"><i class="bi bi-alarm"></i>Профиль пользователя</a>
                    <a href="pages-timeline.html" class="list-group-item"><i class="bi bi-archive"></i>Временная шкала</a>
                    <a href="pages-faq.html" class="list-group-item"><i class="bi bi-question-diamond"></i>Часто задаваемые вопросы</a>
                    <a href="pages-pricing-tables.html" class="list-group-item"><i class="bi bi-tags"></i>Цены</a>
                    <a href="pages-errors-404-error.html" class="list-group-item"><i class="bi bi-bug"></i>404 Ошибка</a>
                    <a href="pages-errors-500-error.html" class="list-group-item"><i class="bi bi-diagram-2"></i>500 Ошибка</a>
                    <a href="pages-errors-coming-soon.html" class="list-group-item"><i class="bi bi-egg-fried"></i>Скоро будет</a>
                    <a href="pages-blank-page.html" class="list-group-item"><i class="bi bi-flag"></i>Пустая Страница</a>
                </div>
            </div>
        </div>
    </div>
</aside>
<!--start sidebar -->

<div class="ajax_after">

</div>