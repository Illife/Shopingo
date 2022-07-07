<!--start footer section-->
<footer>
    <section class="py-4 border-top bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                <div class="col">
                    <div class="footer-section1 mb-3">
                        <h6 class="mb-3 text-uppercase">Контактная Информация</h6>
                        <div class="address mb-3">
                            <p class="mb-0 text-uppercase">Адрес</p>
                            <p class="mb-0 font-12">Россия, Москва, ул.Долгопрудная д.123</p>
                        </div>
                        <div class="phone mb-3">
                            <p class="mb-0 text-uppercase">Телефон</p>
                            <p class="mb-0 font-13">Звонок бесплатный (123) 472-796</p>
                            <p class="mb-0 font-13">Мобильный : +7 9916403485</p>
                        </div>
                        <div class="email mb-3">
                            <p class="mb-0 text-uppercase">Электронная почта</p>
                            <p class="mb-0 font-13">mail@example.com</p>
                        </div>
                        <div class="working-days mb-3">
                            <p class="mb-0 text-uppercase">РАБОЧИЕ ДНИ</p>
                            <p class="mb-0 font-13">Пн - Пт / 9:30 - 18:30</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-section2 mb-3">
                        <h6 class="mb-3 text-uppercase">Категории товаров</h6>
                        <ul class="list-unstyled">
                            <?php foreach ($ResultReadCategories as $category) { ?>
                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> <?= $category['title'] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-section3 mb-3">
                        <h6 class="mb-3 text-uppercase">Популярные теги</h6>
                        <div class="tags-box"> <a href="javascript:;" class="tag-link">Ткани</a>
                            <a href="javascript:;" class="tag-link">Электроника</a>
                            <a href="javascript:;" class="tag-link">Мебель</a>
                            <a href="javascript:;" class="tag-link">Спорт</a>
                            <a href="javascript:;" class="tag-link">Мужская Одежда</a>
                            <a href="javascript:;" class="tag-link">Женская Одежда</a>
                            <a href="javascript:;" class="tag-link">Ноутбуки</a>
                            <a href="javascript:;" class="tag-link">Рубашки</a>
                            <a href="javascript:;" class="tag-link">Верхняя одежда</a>
                            <a href="javascript:;" class="tag-link">Наушники</a>
                            <a href="javascript:;" class="tag-link">Нижняя одежда</a>
                            <a href="javascript:;" class="tag-link">Сумки</a>
                            <a href="javascript:;" class="tag-link">Диван</a>
                            <a href="javascript:;" class="tag-link">Обувь</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-section4 mb-3">
                        <h6 class="mb-3 text-uppercase">Будьте в курсе событий</h6>
                        <div class="subscribe">
                            <input type="text" class="form-control radius-30" placeholder="Enter Your Email" />
                            <div class="mt-2 d-grid"> <a href="javascript:;" class="btn btn-dark btn-ecomm radius-30">Подписаться</a>
                            </div>
                            <p class="mt-2 mb-0 font-13">Подпишитесь на нашу рассылку новостей, чтобы получать ранние предложения со скидками, обновления и новые продукты.</p>
                        </div>
                        <div class="download-app mt-3">
                            <h6 class="mb-3 text-uppercase">Скачайте наше приложение</h6>
                            <div class="d-flex align-items-center gap-2">
                                <a href="javascript:;">
                                    <img src="<?= PATH ?>/assets/images/icons/apple-store.png" class="" width="160" alt="" />
                                </a>
                                <a href="javascript:;">
                                    <img src="<?= PATH ?>/assets/images/icons/play-store.png" class="" width="160" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <hr />
            <div class="row row-cols-1 row-cols-md-2 align-items-center">
                <div class="col">
                    <p class="mb-0">© 2022. Все права защищены.</p>
                </div>
                <div class="col text-end">
                    <div class="payment-icon">
                        <div class="row row-cols-auto g-2 justify-content-end">
                            <div class="col">
                                <img src="<?= PATH ?>/assets/images/icons/visa.png" alt="" />
                            </div>
                            <div class="col">
                                <img src="<?= PATH ?>/assets/images/icons/paypal.png" alt="" />
                            </div>
                            <div class="col">
                                <img src="<?= PATH ?>/assets/images/icons/mastercard.png" alt="" />
                            </div>
                            <div class="col">
                                <img src="<?= PATH ?>/assets/images/icons/american-express.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
</footer>
<!--end footer section-->

<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
</div>
<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="<?= PATH ?>/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?= PATH ?>/assets/js/jquery.min.js"></script>
<script src="<?= PATH ?>/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?= PATH ?>/assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
<script src="<?= PATH ?>/assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
<script src="<?= PATH ?>/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?= PATH ?>/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--app JS-->
<script src="<?= PATH ?>/assets/plugins/nouislider/nouislider.min.js"></script>
<script src="<?= PATH ?>/assets/js/price-slider.js"></script>
<script src="<?= PATH ?>/assets/js/app.js"></script>
<script src="<?= PATH ?>/assets/js/index.js"></script>
</body>

</html>