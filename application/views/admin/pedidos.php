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
				  if (!empty($pedidos)) {

				  	$pedido = true;
				  	$acciones = true;
				  	$temp=$pedidos[0]['id_pedido'];
				  	foreach ($pedidos as $key => $value) {
				  		if ($temp == $value['id_pedido']) {
				  			$pedido = true;
				  		}else{
				  			$pedido = false;
				  			$acciones=true;
				  			$temp=$value['id_pedido'];
				  		}
				  	  	if ($pedido){
				  ?>
				  	<tr>
				  <?php }else{ ?>
				  	<tr style="background-color: #aacbff;">
				  <?php }
				  	if ($acciones) {
				  ?>
				      <th scope="row"><?php echo $value['id_pedido']; ?></th>
				   <?php }else { ?>
				   	  <th scope="row"></th>
				    <?php } ?>
				      <td><?php echo $value['nombre_completo']; ?></td>
				      <td><?php echo $value['empleado_vendio']; ?></td>
				      <td><?php echo $value['nombre']; ?></td>
				      <td><?php echo $value['cantidad']; ?></td>
				      <td><?php echo $value['precio_elegido_venta']; ?></td>
				      <td><?php echo $value['fecha_entrega']; ?></td>
				      <?php
				  		if ($acciones) {
				 	  ?>
				      <td>
				      	<a href="<?php echo 'deletePedido?id=' . $value['id_pedido'];?>"><i class="fa fa-trash btn btn-default" aria-hidden="true"></i></a>
				      <a href="<?php echo base_url('detallePedido') .'/?id='.$value['id_pedido']; ?>"><i class="fa fa-search btn btn-default" aria-hidden="true"></i></a>
				      </td>
				      <?php }else{echo "<td></td>"; } ?>
				    </tr>
				   <?php
				   	$acciones=false;
				   	} }
				   ?>
				  </tbody>
				</table>
			</div>
		</div>
	</section>
</div>
<!-- /.content-wrapper -->

