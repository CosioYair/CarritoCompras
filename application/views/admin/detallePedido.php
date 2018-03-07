  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo "Detalle pedido"; ?>
        <small>Panel de control</small>
      </h1>
    </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
       <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Detalle del pedido realizado</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo base_url('assets/images/cart.png'); ?>" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Cliente:</td>
                        <td><?php echo $pedido->nombre_completo; ?></td>
                      </tr>
                      <tr>
                        <td>Empleado:</td>
                        <td><?php echo $pedido->empleado_vendio; ?></td>
                      </tr>
                      <tr>
                        <td>Descuento</td>
                        <td><?php echo $pedido->descuento; ?></td>
                      </tr>
                      <tr>
                        <td>Numero de pedido</td>
                        <td><?php echo $pedido->id_pedido; ?></td>
                      </tr>
                      <?php foreach ($detallePedido as $key => $value) { ?>
                      <tr>
                        <td>Producto</td>
                        <td><?php echo $value['nombre']; ?></td>
                      </tr>
                      <tr>
                        <td>Codigo producto</td>
                        <td><?php echo $value['codigo']; ?></td>
                      </tr>
                      <tr>
                        <td>Cantidad</td>
                        <td><?php echo $value['cantidad']; ?></td>
                      </tr>
                      <tr>
                        <td>Precio</td>
                        <td><?php echo $value['precio_elegido_venta']; ?></td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td>Fecha de entrega</td>
                        <td><?php echo $pedido->fecha_entrega; ?></td>
                      </tr>
                      <tr>
                        <td>Tipo de venta</td>
                        <td><?php echo $pedido->tipo_venta; ?></td>
                      </tr>
                      <tr>
                        <td>Descripcion</td>
                        <td><?php echo $pedido->descripcion; ?></td>
                      </tr>
                      <tr>
                        <td>Estatus</td>
                        <td><?php echo $pedido->estatus; ?></td>
                      </tr>                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div>
      </div>
    </div>
  </section>  
</div>
<!-- /.content-wrapper -->