  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo "Mover productos de una sucursal a otra"; ?>
        <small>Panel de control</small>
      </h1>
    </section>

	<!-- Main content -->
	<section class="content">
		<!-- Info boxes -->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form>
					<div class="form-group">
					    <label for="sucursal_envia">Sucursal que mueve productos</label>
					    <select class="form-control" id="sucursal_envia" name="sucursal_envia" required>
					    <?php foreach ($sucursal as $key => $value) {?>
					      <option value="<?php echo $value['id_sucursal']; ?>"><?php echo $value['nombre']; ?></option>
					    <?php }?>
					    </select>
					</div>
					<div class="form-group">
					    <label for="productos">Productos</label>
					    <select class="form-control" id="productos" required>
					     	<?php foreach ($productos as $key => $value) {?>
					      <option value="<?php echo $value['nombre']; ?>"><?php echo $value['nombre']; ?></option>
					    <?php }?>
					    </select>
					</div>
					<div class="form-group">
					    <label for="cantidad">Cantidad de productos</label>
					    <input type="text" class="form-control" id="cantidad" placeholder="cantidad" required>
					 </div>
				  	<div class="form-group">
					    <label for="sucursal_recibe">Sucursal que recibe los productos</label>
					    <select class="form-control" id="sucursal_recibe" name="sucursal_recibe" required>
					      <?php foreach ($sucursal as $key => $value) {?>
					      <option value="<?php echo $value['id_sucursal']; ?>"><?php echo $value['nombre']; ?></option>
					    <?php }?>
					    </select>
					</div>
				  <button type="button" id="subm" class="btn btn-default">Modificar</button>
				</form>
			</div>
		</div>
	</section>  
</div>
<!-- /.content-wrapper -->
<script>
	$("#subm").click(function(){
		if ($("#sucursal_envia").val() != $("#sucursal_recibe").val()){
			$.post("Cart_admin/updateProductosDeSucursal",{
			    suc_env :   $("#sucursal_envia").val(),
			    productos :   $("#productos").val(),
			    cantidad :   $("#cantidad").val(),
			    suc_rec :   $("#sucursal_recibe").val()
			},
			function(result){
			    console.log(result);
			    if (result== "true"){
			    	alert('Producto cambiado con exito');
			    }else{
			    	alert('Ocurrio un error, verifica los datos de llenado');
			    }
			});
		}else{
			alert('No puedes mover productos a la misma sucursal');
		}
	});
</script>
