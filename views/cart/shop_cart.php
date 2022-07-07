<div class="ajax_wishlist_alert">
</div>

<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--start breadcrumb-->
		<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
			<div class="container">
				<div class="page-breadcrumb d-flex align-items-center">
					<h3 class="breadcrumb-title pe-3">Корзина</h3>
					<div class="ms-auto">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?= PATH ?>/"><i class="bx bx-home-alt"></i> Главная</a>
								</li>
								<li class="breadcrumb-item"><a href="javascript:;">Магазин</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Корзина</li>
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
							<div class="shop-cart-list mb-3 p-3">
								<?php

								if (!isset($_SESSION['cart'])) {
									echo "Корзина пуста...";
								}

								?>
								<?php foreach ($_SESSION['cart'] as $product_id) { ?>
									<?php
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
													<input type="number" class="form-control rounded-0 ajax_cart_count_<?= $product['id'] ?>" value="1" min="1">
													<input type="hidden" class="ajax_cart_id_<?= $product['id'] ?>" value="<?= $product['id'] ?>">
												</div>
												<?php

												$total_price = $total_price + $product['price'];

												?>
												<script>
													$(".ajax_cart_count_<?= $product['id'] ?>").bind('keyup mouseup', function() {
														const count = $('.ajax_cart_count_<?= $product['id'] ?>').val() ? $('.ajax_cart_count_<?= $product['id'] ?>').val() : 1;
														const id = $('.ajax_cart_id_<?= $product['id'] ?>').val() ? $('.ajax_cart_id_<?= $product['id'] ?>').val() : 1;
														$.ajax({
															url: 'http://localhost/handlers/cart/count.php',
															type: 'POST',
															data: {
																id: id,
																count: count,
															},
															success: function(data) {
																console.log(data);
																$('.ajax_total').html(data);

															},
															error: function() {
																alert('Error!');
															},
														})
													});
												</script>
											</div>
											<div class="col-12 col-lg-3">
												<div class="text-center">
													<div class="d-flex gap-2 justify-content-center justify-content-lg-end">
														<div class="btn btn-dark rounded-0 btn-ecomm ajax_close_<?= $product['id'] ?>">
															<div class="d-none ajax_product_<?= $product['id'] ?>"><?= $product['id'] ?></div>
															<i class='bx bx-x-circle'></i> Удалить
														</div>
														<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

														<script>
															$(document).ready(function() {
																$('.ajax_close_<?= $product['id'] ?>').on('click', function(e) {
																	e.preventDefault();
																	const id = <?= $product['id'] ?>;
																	$.ajax({
																		url: 'http://localhost/handlers/cart/close.php',
																		type: 'POST',
																		data: {
																			id: id,
																		},
																		success: function(data) {
																			console.log(data);
																			location.reload();

																		},
																		error: function() {
																			alert('Error!');
																		},
																	})

																})
															});
														</script>
														<div class="btn btn-light rounded-0 btn-ecomm product-wishlist">
															<i class='bx bx-heart me-0'></i>
														</div>

														<script>
															$(document).ready(function() {
																$('.product-wishlist').on('click', function(e) {
																	e.preventDefault();
																	const id = <?= $product['id'] ?>;
																	$.ajax({
																		url: 'http://localhost/handlers/wishlist.php',
																		type: 'POST',
																		data: {
																			id: id,
																		},
																		success: function(data) {
																			console.log(data);
																			$(".ajax_wishlist_alert").load("<?= PATH ?>/views/alert/alert_success.php");

																		},
																		error: function() {
																			alert('Error!');
																		},
																	})

																})
															});
														</script>
													</div>
												</div>
											</div>
										</div>
										<br>
									<?php } ?>
								<?php } ?>
								<div class="my-4 border-top"></div>
								<div class="d-lg-flex align-items-center gap-2"> <a href="<?= PATH ?>/" class="btn btn-dark btn-ecomm"><i class='bx bx-shopping-bag'></i> Продожить покупки</a>
									<a href="javascript:;" class="btn btn-light btn-ecomm ms-auto ajax_clear"><i class='bx bx-x-circle'></i> Очистить Корзину</a>
									<script>
										$(document).ready(function() {
											$('.ajax_clear').on('click', function(e) {
												e.preventDefault();
												const id = $('.ajax_product_<?= $product['id'] ?>').text() ? $('.ajax_product_<?= $product['id'] ?>').text() : 1;
												$.ajax({
													url: 'http://localhost/handlers/cart/clear.php',
													type: 'POST',
													success: function(data) {
														console.log(data);
														location.reload();

													},
													error: function() {
														alert('Error!');
													},
												})

											})
										});
									</script>
									<div class="btn btn-white btn-ecomm update">
										<i class='bx bx-refresh'></i> Обновить
									</div>
									<script>
										$(document).ready(function() {
											$('.update').on('click', function(e) {
												e.preventDefault();
												location.reload();
											})
										});
									</script>
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
										<div class="d-grid"> <a href="<?= PATH ?>/order-details" class="btn btn-dark btn-ecomm">Оформление заказа</a>
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