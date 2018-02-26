  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo "Pedidos"; ?>
        <small>Panel de control</small>
      </h1>
    </section>

	<!-- Main content -->
	<section class="content">
		<!-- Info boxes -->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<table id="table_pedidos" class="table table-dark table_pedidos">
				  <thead>
				    <tr>
				      <th scope="col">Numero de pedido</th>
				      <th scope="col">Cliente</th>
				      <th scope="col">Empleado</th>
				      <th scope="col">Prodcuto</th>
				      <th scope="col">Cantidad</th>
				      <th scope="col">Precio</th>
				      <th scope="col">Fecha de entrega</th>
				      <th scope="col">Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php
				  	$pedido = $pedidos[0]['id_pedido']; 
				  	foreach ($pedidos as $key => $value) { 
				  		if ($pedido == $value['id_pedido']) {
				  ?>
				  	<tr>
				  <?php else{ ?>
				  	<tr style="background-color: blue;">
				  <?php }?>
				      <th scope="row"><?php echo $i; ?></th>
				      <td>Mark</td>
				      <td>Otto</td>
				      <td>@mdo</td>
				      <td>@mdo</td>
				      <td>@mdo</td>
				      <td>@mdo</td>
				      <td>
				      	<i class="fa fa-trash btn btn-default" aria-hidden="true"></i>
				      	<i class="fa fa-pencil btn btn-default" aria-hidden="true"></i>
				      </td>
				    </tr>
				   <?php } ?>
				  </tbody>
				</table>
			</div>
		</div>
	</section>  
</div>
<!-- /.content-wrapper -->

