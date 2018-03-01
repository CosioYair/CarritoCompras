	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Producto</th>
							<th class="column-3">Precio</th>
							<th class="column-4 p-l-70">Cantidad</th>
							<th class="column-5">Total</th>
						</tr>
						<tr v-for="(product, index) in cart.prop.productsCart" class="table-row">
							<td class="column-1">
								<div @click="cart.method.removeToCart(index)" class="cart-img-product b-rad-4 o-f-hidden">
									<img src="images/item-05.jpg" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2">{{ product.nombre }}</td>
							<td class="column-3">${{ product.precio }}</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button @click="cart.method.subtractOne(index)" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product2" :value="product.cantidadCarrito">

									<button @click="cart.method.plusOne(index)" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">${{ product.cantidadPrecioCarrito }}</td>
						</tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><strong>Subtotal:</strong></td>
              <td><strong>${{ cart.prop.subtotalDiscount }}</strong></td>
            </tr>
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
        <div v-if="login.prop.user.empleado == '1'" class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="number" name="coupon-code" placeholder="%" v-model="cart.prop.discount">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button @click="cart.method.applyDiscount" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Aplicar descuento
						</button>
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
					  <a @click="cart.method.saveDiscount" href="checkout" class="linkCheckout">Finalizar compra</a>
					</button>
				</div>
			</div>

		</div>
	</section>
