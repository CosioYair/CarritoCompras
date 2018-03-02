	<!-- Productos-->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
				  {{ products.prop.titleCategory }}
				</h3>
			</div>
			<div class="row">
        <!-- Block -->
				<div v-for="product in products.prop.productsCategory" class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
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
