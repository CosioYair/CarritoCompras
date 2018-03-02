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
							<th class="column-3">Cantidad</th>
							<th class="column-5">Total</th>
						</tr>
						<tr v-for="(product, index) in cart.prop.productsCart" class="table-row">
							<td class="column-1"></td>
							<td class="column-2">{{ product.nombre }}</td>
							<td class="column-3">${{ product.precio }}</td>
							<td class="column-3">{{ product.cantidadCarrito  }}</td>
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
        <div class="col-md-8">
          <label for="comment">Descripcion de la venta:</label>
          <textarea v-model="cart.prop.descriptionOrder" class="form-control" rows="10"></textarea>
        </div>
        <div class="col-md-4">
          <label for="pwd">Fecha de entrega:</label>
          <input v-model="cart.prop.dateOrder" type="date" class="datepicker">
        </div>
			</div>

		</div>
				<div class="size10 trans-0-4 m-t-10 m-b-10 btn-confirm">
					<button @click="cart.method.saveDetails" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
					  <a class="linkCheckout">Confirmar pedido</a>
					</button>
				</div>
	</section>
