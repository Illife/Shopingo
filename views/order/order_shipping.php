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
							<div class="checkout-shipping">
								<div class="card bg-transparent rounded-0 shadow-none">
									<div class="card-body">
										<div class="steps steps-light">
											<a class="step-item active" href="<?= PATH ?>/shop-cart">
												<div class="step-progress"><span class="step-count">1</span>
												</div>
												<div class="step-label"><i class='bx bx-cart'></i>Корзина</div>
											</a>
											<a class="step-item active" href="<?= PATH ?>/order-details">
												<div class="step-progress"><span class="step-count">2</span>
												</div>
												<div class="step-label"><i class='bx bx-user-circle'></i>Детали</div>
											</a>
											<a class="step-item active current" href="<?= PATH ?>/order-shipping">
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
								<div class="card rounded-0 shadow-none">
									<div class="card-body">
										<h2 class="h5 mb-0">Выберите Способ Доставки</h2>
										<div class="my-3 border-bottom"></div>
										<div class="table-responsive">
											<table class="table">
												<thead class="table-light">
													<tr>
														<th>Метод</th>
														<th>Время</th>
														<th>Гонорар</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Фиксированная ставка</td>
														<td>2 дня</td>
														<td>&#8381;567</td>
													</tr>
													<tr>
														<td>Международные перевозки</td>
														<td>12 дней</td>
														<td>&#8381;681</td>
													</tr>
													<tr>
														<td>Доставка в тот же день</td>
														<td>1 день</td>
														<td>&#8381;1248</td>
													</tr>
													<tr>
														<td>Ускоренная доставка</td>
														<td>--</td>
														<td>&#8381;851</td>
													</tr>
													<tr>
														<td>Местный Пикап</td>
														<td>--</td>
														<td>&#8381;0.00</td>
													</tr>
													<tr>
														<td>UPS Ground</td>
														<td>2-5 дней</td>
														<td>&#8381;907</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="card rounded-0 shadow-none">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="d-grid"> <a href="<?= PATH ?>/order-details" class="btn btn-light btn-ecomm"><i class="bx bx-chevron-left"></i>Вернуться к деталям</a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="d-grid"> <a href="<?= PATH ?>/checkout-payment" class="btn btn-white btn-ecomm">Перейти к оплате<i class="bx bx-chevron-right"></i></a>
												</div>
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
					<!--end row-->
				</div>
			</div>
		</section>
		<!--end shop cart-->
	</div>
</div>
<!--end page wrapper -->