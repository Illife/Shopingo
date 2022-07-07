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
							<div class="checkout-review">
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
											<a class="step-item active" href="<?= PATH ?>/order-shipping">
												<div class="step-progress"><span class="step-count">3</span>
												</div>
												<div class="step-label"><i class='bx bx-cube'></i>Доставка</div>
											</a>
											<a class="step-item active" href="<?= PATH ?>/checkout-payment">
												<div class="step-progress"><span class="step-count">4</span>
												</div>
												<div class="step-label"><i class='bx bx-credit-card'></i>Оплата</div>
											</a>
											<a class="step-item active current" href="<?= PATH ?>/checkout-review">
												<div class="step-progress"><span class="step-count">5</span>
												</div>
												<div class="step-label"><i class='bx bx-check-circle'></i>Проверка</div>
											</a>
										</div>
									</div>
								</div>
								<div class="card  rounded-0 shadow-none mb-3 border">
									<div class="card-body">
										<h5 class="mb-0">Просмотр Заказа</h5>
										<div class="my-3 border-bottom"></div>
										<?php

										foreach ($_SESSION['cart'] as $product_id) {

											$id = $product_id;

											$ResultReadProductById = new \Models\Product;
											$ResultReadProductById = $ResultReadProductById->read_product_by_id($id);
											foreach ($ResultReadProductById as $product) {

										?>
												<div class="row align-items-center g-3">
													<div class="col-12 col-lg-6">
														<div class="d-lg-flex align-items-center gap-2">
															<div class="cart-img text-center text-lg-start">
																<img src="<?= PATH . "/" . $product['img'] ?>" width="130" alt="">
															</div>
															<div class="cart-detail text-center text-lg-start">
																<h6 class="mb-2">
																	<?php
																	$product_title = $product['title'];
																	$product_title = substr($product_title, 0, 30);
																	$product_title = rtrim($product_title, "!,.-");
																	$product_title = substr($product_title, 0, strrpos($product_title, ' '));
																	echo $product_title . "… ";
																	?>
																</h6>
																<p class="mb-0">Размер: <span><?= $product['size'] ?></span>
																</p>
																<p class="mb-2">Цвет: <span><?= $product['color'] ?></span>
																</p>
																<h5 class="mb-0">&#8381;<?= $product['price'] ?></h5>
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-3">
														<div class="cart-action text-center">
															<input type="number" class="form-control rounded-0" value="2" min="1">
														</div>
													</div>
													<?php

													$total_price = $total_price + $product['price'];

													?>
													<div class="col-12 col-lg-3">
														<div class="text-center">
															<div class="d-flex gap-2 justify-content-center justify-content-lg-end"> <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-x-circle me-0'></i></a>
																<a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-edit'></i> Редактировать</a>
															</div>
														</div>
													</div>
												</div>
												<div class="my-4 border-top"></div>

											<?php } ?>
										<?php } ?>

									</div>
								</div>
								<div class="card rounded-0 shadow-none mb-3 border">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="shipping-aadress">
													<h5 class="mb-3">Доставка в:</h5>
													<p class="mb-1"><span class="text-dark">Покупатель:</span> Jhon Michle</p>
													<p class="mb-1"><span class="text-dark">Адрес:</span> 47-A, Street Name, City, Australia</p>
													<p class="mb-1"><span class="text-dark">Телефон:</span> (123) 472-796</p>
												</div>
											</div>
											<div class="col-md-6">
												<div class="payment-mode">
													<h5 class="mb-3">Способ оплаты:</h5>
													<img src="<?= PATH ?>/assets/images/icons/visa.png" width="150" class="p-2 border bg-light rounded" alt="">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card rounded-0 shadow-none mb-3 border">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="d-grid"><a href="javascript:;" class="btn btn-light btn-ecomm"><i class="bx bx-chevron-left"></i>Вернуться к оплате</a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="d-grid"><a href="<?= PATH ?>/checkout-complete" class="btn btn-white btn-ecomm">Оформить заказ<i class="bx bx-chevron-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-xl-4">
							<div class="checkout-form p-3 bg-light">
								<div class="card rounded-0 border bg-transparent shadow-none">
									<div class="card-body">
										<p class="fs-5">Применить Код</p>
										<div class="input-group">
											<input type="text" class="form-control rounded-0" placeholder="Введите код скидки">
											<button class="btn btn-dark btn-ecomm" type="button">Применить</button>
										</div>
									</div>
								</div>
								<!-- <div class="card rounded-0 border bg-transparent shadow-none">
									<div class="card-body">
										<p class="fs-5">Cтоимость доставки</p>
										<div class="my-3 border-top"></div>
										<div class="mb-3">
											<label class="form-label">Country Name</label>
											<select class="form-select rounded-0">
												<option selected>United States</option>
												<option value="1">Australia</option>
												<option value="2">India</option>
												<option value="3">Canada</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">State/Province</label>
											<select class="form-select rounded-0">
												<option selected>California</option>
												<option value="1">Texas</option>
												<option value="2">Canada</option>
											</select>
										</div>
										<div class="mb-0">
											<label class="form-label">Zip/Postal Code</label>
											<input type="email" class="form-control rounded-0">
										</div>
									</div>
								</div> -->
								<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
									<div class="card-body">
										<p class="mb-2">Промежуточный итог: <span class="float-end ajax_total">
												&#8381;<?= $total_price ?></span>
										</p>
										<p class="mb-2">Доставка: <span class="float-end">--</span>
										</p>
										<p class="mb-2">Налоги: <span class="float-end">
												&#8381;14</span>
										</p>
										<p class="mb-0">Скидка: <span class="float-end">--</span>
										</p>
										<div class="my-3 border-top"></div>
										<h5 class="mb-0">Всего: <span class="float-end ajax_total"><?= $total_price + 14 ?></span></h5>
										<div class="my-4"></div>
										<div class="d-grid"> <a href="<?= PATH ?>/checkout-complete" class="btn btn-dark btn-ecomm">Оформление заказа</a>
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