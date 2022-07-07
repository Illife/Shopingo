<?php

if (!isset($_SESSION['user'])) {
	echo "<script>location.href='" . PATH . "/user/signin" . "';</script>";
}

?>

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--start breadcrumb-->
		<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
			<div class="container">
				<div class="page-breadcrumb d-flex align-items-center">
					<h3 class="breadcrumb-title pe-3">Касса</h3>
					<div class="ms-auto">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= PATH ?>/"><i class="bx bx-home-alt"></i> Главная</a>
								</li>
								<li class="breadcrumb-item"><a href="javascript:;">Магазин</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Касса</li>
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
				<div class="shop-cart">
					<div class="row">
						<div class="col-12 col-xl-8">
							<div class="checkout-details">
								<div class="card bg-transparent rounded-0 shadow-none">
									<div class="card-body">
										<div class="steps steps-light">
											<a class="step-item active" href="<?= PATH ?>/shop-cart">
												<div class="step-progress"><span class="step-count">1</span>
												</div>
												<div class="step-label"><i class='bx bx-cart'></i>Корзина</div>
											</a>
											<a class="step-item active current" href="<?= PATH ?>/order-details">
												<div class="step-progress"><span class="step-count">2</span>
												</div>
												<div class="step-label"><i class='bx bx-user-circle'></i>Детали</div>
											</a>
											<a class="step-item" href="<?= PATH ?>/order-shipping">
												<div class="step-progress"><span class="step-count">3</span>
												</div>
												<div class="step-label"><i class='bx bx-cube'></i>Доставка</div>
											</a>
											<a class="step-item" href="<?= PATH ?>/checkout-payment">
												<div class="step-progress"><span class="step-count">4</span>
												</div>
												<div class="step-label"><i class='bx bx-credit-card'></i>Оплата</div>
											</a>
											<a class="step-item" href="<?= PATH ?>/checkout-review">
												<div class="step-progress"><span class="step-count">5</span>
												</div>
												<div class="step-label"><i class='bx bx-check-circle'></i>Проверка</div>
											</a>
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
								<div class="card rounded-0">
									<div class="card-body">
										<div class="d-flex align-items-center mb-3">
											<div class="">
												<img src="assets/images/avatars/avatar-1.png" width="90" alt="" class="rounded-circle p-1 border">
											</div>
											<div class="ms-2">
												<h6 class="mb-0"><?= $user['display_name'] ?></h6>
												<p class="mb-0"><?= $user['email'] ?></p>
											</div>
											<div class="ms-auto"> <a href="<?= PATH ?>/user/uchyotnaya-zapis" class="btn btn-light btn-ecomm"><i class='bx bx-edit'></i> Редактировать профиль</a>
											</div>
										</div>
										<div class="border p-3">
											<h2 class="h5 mb-0">Адрес Доставки</h2>
											<div class="my-3 border-bottom"></div>
											<div class="form-body">
												<form class="row g-3">
													<div class="col-md-6">
														<label class="form-label">Имя</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="col-md-6">
														<label class="form-label">Фамилия</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="col-md-6">
														<label class="form-label">Email</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="col-md-6">
														<label class="form-label">Телефон</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="col-md-6">
														<label class="form-label">Компания</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<?php

													$ResultReadRegions = new \Models\Order;
													$ResultReadRegions = $ResultReadRegions->read_regions();

													?>
													<div class="col-md-6">
														<label class="form-label">Регион</label>
														<select class="form-select rounded-0">
															<?php foreach ($ResultReadRegions as $region) { ?>
																<option><?= $region['name'] ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="col-md-6">
														<label class="form-label">Почтовый адрес</label>
														<input type="text" class="form-control rounded-0">
													</div>
													<div class="col-md-6">
														<label class="form-label">Страна</label>
														<select class="form-select rounded-0">
															<option>Россия</option>
															<option>Россия</option>
															<option>Россия</option>
															<option>Россия</option>
														</select>
													</div>
													<div class="col-md-6">
														<label class="form-label">Адрес 1</label>
														<textarea class="form-control rounded-0"></textarea>
													</div>
													<div class="col-md-6">
														<label class="form-label">Адрес 2</label>
														<textarea class="form-control rounded-0"></textarea>
													</div>
													<div class="col-md-12">
														<h6 class="mb-0 h5">Платежный Адрес</h6>
														<div class="my-3 border-bottom"></div>
														<div class="form-check">
															<input class="form-check-input" type="checkbox" id="gridCheck" checked>
															<label class="form-check-label" for="gridCheck">Совпадает с адресом доставки</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="d-grid"> <a href="<?= PATH ?>/shop-cart" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Вернуться к корзине</a>
														</div>
													</div>
													<div class="col-md-6">
														<div class="d-grid"> <a href="<?= PATH ?>/order-shipping" class="btn btn-dark btn-ecomm">Оформление заказа<i class='bx bx-chevron-right'></i></a>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-xl-4">
							<div class="order-summary">
								<div class="card rounded-0">
									<div class="card-body">
										<div class="card rounded-0 border bg-transparent shadow-none">
											<div class="card-body">
												<p class="fs-5">Применить Код</p>
												<div class="input-group">
													<input type="text" class="form-control rounded-0" placeholder="Введите код скидки">
													<button class="btn btn-dark btn-ecomm" type="button">Применить</button>
												</div>
											</div>
										</div>
										<div class="card rounded-0 border bg-transparent shadow-none">
											<div class="card-body">
												<p class="fs-5">Краткое описание заказа</p>
												<?php

												foreach ($_SESSION['cart'] as $product_id) {

													$id = $product_id;

													$ResultReadProductById = new \Models\Product;
													$ResultReadProductById = $ResultReadProductById->read_product_by_id($id);
													foreach ($ResultReadProductById as $product) {
														$total_price = $total_price + $product['price'];
												?>
														<div class="my-3 border-top"></div>
														<div class="d-flex align-items-center">
															<a class="d-block flex-shrink-0" href="javascript:;">
																<img src="<?= PATH . "/" . $product['img'] ?>" width="75" alt="Product">
															</a>
															<div class="ps-2">
																<h6 class="mb-1">
																	<a href="javascript:;" class="text-dark">
																		<?php
																		$product_title = $product['title'];
																		$product_title = substr($product_title, 0, 30);
																		$product_title = rtrim($product_title, "!,.-");
																		$product_title = substr($product_title, 0, strrpos($product_title, ' '));
																		echo $product_title . "… ";
																		?>
																	</a>
																</h6>
																<div class="widget-product-meta"><span class="me-2">&#8381;<?= $product['price'] ?><small></small></span><span class="">x 1</span>
																</div>
															</div>
														</div>
													<?php } ?>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
										<div class="card-body">
											<p class="mb-2">Промежуточный итог: <span class="float-end">&#8381;<?= $total_price ?></span>
											</p>
											<p class="mb-2">Доставка: <span class="float-end">--</span>
											</p>
											<p class="mb-2">Налоги: <span class="float-end">&#8381;14.00</span>
											</p>
											<p class="mb-0">Скидка: <span class="float-end">--</span>
											</p>
											<div class="my-3 border-top"></div>
											<h5 class="mb-0">Всего: <span class="float-end"><?= $total_price + 14 ?></span></h5>
										</div>
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
<!--end page wrapper -->