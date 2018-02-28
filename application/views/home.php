<!-- Banner -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url(); ?>assets/images/master-slide-02.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>


				<div class="item-slick1 item3-slick1" style="background-image: url(<?php echo base_url(); ?>assets/images/master-slide-04.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
							Women Collection 2018
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
							New arrivals
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Productos-->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
				  Productos
				</h3>
			</div>
			<div class="row">
        <!-- Block -->
				<div v-for="product in products.prop.productsHome" class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
					<div class="block3">
						<div class="block2-img wrap-pic-w of-hidden pos-relative">
							<img src="<?php echo base_url(); ?>assets/images/item-07.jpg" alt="IMG-PRODUCT">
							<div class="block2-overlay trans-0-4">
								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<button @click="cart.method.addToCart(product)" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										Al carrito
									</button>
								</div>
							</div>
						</div>
						<div class="block3-txt p-t-14">
							<h4 class="p-b-7">
                {{ product.nombre }} - ${{ product.precio }}
							</h4>
              <span class="s-text7">{{ product.descripcion }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
