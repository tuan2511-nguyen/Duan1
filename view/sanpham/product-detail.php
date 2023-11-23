<main>
	<div class="container margin_30">
		<div class="row">
			<div class="col-md-6">
				<div class="all">
					<div class="slider">
						<div class="owl-carousel owl-theme main">
							<div style="background-image: url(img/products/shoes/1.jpg);" class="item-box"></div>
							<div style="background-image: url(img/products/shoes/2.jpg);" class="item-box"></div>
							<div style="background-image: url(img/products/shoes/3.jpg);" class="item-box"></div>
							<div style="background-image: url(img/products/shoes/4.jpg);" class="item-box"></div>
							<div style="background-image: url(img/products/shoes/5.jpg);" class="item-box"></div>
							<div style="background-image: url(img/products/shoes/6.jpg);" class="item-box"></div>
						</div>
						<div class="left nonl"><i class="ti-angle-left"></i></div>
						<div class="right"><i class="ti-angle-right"></i></div>
					</div>
					<div class="slider-two">
						<div class="owl-carousel owl-theme thumbs">
							<div style="background-image: url(img/products/shoes/1.jpg);" class="item active"></div>
							<div style="background-image: url(img/products/shoes/2.jpg);" class="item"></div>
							<div style="background-image: url(img/products/shoes/3.jpg);" class="item"></div>
							<div style="background-image: url(img/products/shoes/4.jpg);" class="item"></div>
							<div style="background-image: url(img/products/shoes/5.jpg);" class="item"></div>
							<div style="background-image: url(img/products/shoes/6.jpg);" class="item"></div>
						</div>
						<div class="left-t nonl-t"></div>
						<div class="right-t"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Category</a></li>
						<li>Page active</li>
					</ul>
				</div>
				<!-- /page_header -->
				<form action="" method="post">
					<div class="prod_info">
						<h1><?php echo $ctsp['name']  ?></h1>
						<span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
						<div class="prod_options">
							<div class="row">
								<label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Color</strong></label>
								<div class="col-xl-4 col-lg-5 col-md-6 col-6">
									<div class="custom-select-form">
										<select class="wide" id="color" name="color">
											<?php
											foreach ($load_color as $color) {
												echo "<option value='" . $color['color_id'] . "'>" . $color['color_name'] . "</option>";
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
								<div class="col-xl-4 col-lg-5 col-md-6 col-6">
									<div class="custom-select-form">
										<select class="wide" id="size" name="size">
											<?php
											foreach ($load_size as $size) {
												echo "<option value='" . $size['size_id'] . "'>" . $size['size'] . "</option>";
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
								<div class="col-xl-4 col-lg-5 col-md-6 col-6">
									<div class="numbers-row">
										<input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
										<div>
											<?php
											if (isset($thongbao) && ($thongbao != "")) {
												echo $thongbao;
											}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-lg-5 col-md-6">
								<div class="price_main"><span class="new_price"><?php echo $ctsp['discounted_price'] ?></span><span class="percentage">-20%</span> <span class="old_price"><?php echo $ctsp['base_price'] ?></span></div>
							</div>
							<div class="col-lg-4 col-md-6">
								<input type="hidden" name="product_id" id="product_id" value="<?php echo $ctsp['product_id'] ?>">
								<div class="btn_add_to_cart"><input type="submit" class="btn_1" value="Add to Cart"></div>
							</div>
						</div>
					</div>
				</form>

				<!-- /prod_info -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->

	<div class="tabs_product">
		<div class="container">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Description</a>
				</li>
				<li class="nav-item">
					<a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /tabs_product -->
	<div class="tab_content_wrapper">
		<div class="container">
			<div class="tab-content" role="tablist">
				<div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
					<div class="card-header" role="tab" id="heading-A">
						<h5 class="mb-0">
							<a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
								Description
							</a>
						</h5>
					</div>
					<div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
						<div class="card-body">
							<div class="row justify-content-between">
								<?php echo $ctsp['description'] ?>
							</div>
						</div>
					</div>
				</div>
				<!-- /TAB A -->
				<div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
					<div class="card-header" role="tab" id="heading-B">
						<h5 class="mb-0">
							<a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
								Reviews
							</a>
						</h5>
					</div>
					<div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
						<div class="card-body">
							<div class="row justify-content-between">
								<div class="col-lg-6">
									<div class="review_content">
										<div class="clearfix add_bottom_10">
											<span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
											<em>Published 54 minutes ago</em>
										</div>
										<h4>"Commpletely satisfied"</h4>
										<p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="review_content">
										<div class="clearfix add_bottom_10">
											<span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><i class="icon-star empty"></i><em>4.0/5.0</em></span>
											<em>Published 1 day ago</em>
										</div>
										<h4>"Always the best"</h4>
										<p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="row justify-content-between">
								<div class="col-lg-6">
									<div class="review_content">
										<div class="clearfix add_bottom_10">
											<span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><em>4.5/5.0</em></span>
											<em>Published 3 days ago</em>
										</div>
										<h4>"Outstanding"</h4>
										<p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="review_content">
										<div class="clearfix add_bottom_10">
											<span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
											<em>Published 4 days ago</em>
										</div>
										<h4>"Excellent"</h4>
										<p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
									</div>
								</div>
							</div>
							<!-- /row -->
							<p class="text-end"><a href="index.php?act=binhluan&id_sp=<?=$ctsp['product_id']?>" class="btn_1">Leave a review</a></p>
						</div>
						<!-- /card-body -->
					</div>
				</div>
				<!-- /tab B -->
			</div>
			<!-- /tab-content -->
		</div>
		<!-- /container -->
	</div>
	<!-- /tab_content_wrapper -->

	<div class="container margin_60_35">
		<div class="main_title">
			<h2>Related</h2>
			<span>Products</span>
			<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
		</div>
		<div class="owl-carousel owl-theme products_carousel">
			<?php
			foreach ($load_random as $sp_random) {
				$linksp = "index.php?act=ct_sanpham&id_sp=" . $sp_random['product_id'];
				echo '<div class="item">
					<div class="grid_item">
						<figure>
							<a href="' . $linksp . '">
								<img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg" data-src="img/products/shoes/4.jpg" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="' . $linksp . '">
							<h3>' . $sp_random['name'] . '</h3>
						</a>
						<div class="price_box">
							<span class="new_price">' . $sp_random['discounted_price'] . '</span>
						</div>
					</div>
					<!-- /grid_item -->
				</div>';
			}
			?>
		</div>
		<!-- /products_carousel -->
	</div>
	<!-- /container -->

	<div class="feat">
		<div class="container">
			<ul>
				<li>
					<div class="box">
						<i class="ti-gift"></i>
						<div class="justify-content-center">
							<h3>Free Shipping</h3>
							<p>For all oders over $99</p>
						</div>
					</div>
				</li>
				<li>
					<div class="box">
						<i class="ti-wallet"></i>
						<div class="justify-content-center">
							<h3>Secure Payment</h3>
							<p>100% secure payment</p>
						</div>
					</div>
				</li>
				<li>
					<div class="box">
						<i class="ti-headphone-alt"></i>
						<div class="justify-content-center">
							<h3>24/7 Support</h3>
							<p>Online top support</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!--/feat-->

</main>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
	var product_id = "";
</script>
<script>
	$(document).ready(function() {
		$("#color, #size").change(function() {
			var color_id = $("#color").val();
			var size_id = $("#size").val();
			console.log(color_id);
			console.log(size_id);
			console.log(product_id);
			$.ajax({
				url: 'index.php',
				type: 'post',
				data: {
					act: 'ct_sanpham',
					color: color_id,
					size: size_id,
					id: product_id // Gửi id sản phẩm
				},
				success: function(response) {
					console.log(response);
					$("#stock").text(response);
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
				}
			});
		});
	});
</script> -->