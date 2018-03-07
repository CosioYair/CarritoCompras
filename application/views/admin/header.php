<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Vinos | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/style_sckam.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini" style="height: 100%;">
  <div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url("dashboard"); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/admin/dist/img/avatar-ninja.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('user')->nombre_completo;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENÚ DE NAVEGACIÓN</li>
        <li <?php echo ($this->uri->segment(2) == "nuevo-ingreso-bachi" or $this->uri->segment(2) == "nuevo-ingreso-facultad" ) ? 'class="active treeview"' : 'class="treeview"'; ?>>
          <a href="#">
            <i class="fa fa-th"></i><span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php echo ($this->uri->segment(2) == "dashboard") ? 'class="active"' : ""; ?>><a href="<?php echo base_url("dashboard"); ?>"><i class="fa fa-circle-o"></i>Inicio</a></li>

          </ul>
        </li>
        <li <?php echo ($this->uri->segment(2) == "catCategorias") ? 'class="active"' : ""; ?>>
          <a href="<?php echo base_url("Cart_admin/catCategorias"); ?>">
            <i class="fa fa-list" aria-hidden="true"></i><span>Categorias</span>
          </a>
        </li>
        <li <?php echo ($this->uri->segment(2) == "catNivel") ? 'class="active"' : ""; ?>>
          <a href="<?php echo base_url("Cart_admin/catNivel"); ?>">
            <i class="fa fa-list" aria-hidden="true"></i><span>Nivel</span>
          </a>
        </li>
        <li <?php echo ($this->uri->segment(2) == "catSucursal") ? 'class="active"' : ""; ?>>
          <a href="<?php echo base_url("Cart_admin/catSucursal"); ?>">
            <i class="fa fa-list" aria-hidden="true"></i><span>Sucursales</span>
          </a>
        </li>
        <li <?php echo ($this->uri->segment(2) == "catUsuarios") ? 'class="active"' : ""; ?>>
          <a href="<?php echo base_url("Cart_admin/catUsuarios"); ?>">
            <i class="fa fa-list" aria-hidden="true"></i><span>Usuarios</span>
          </a>
        </li>
        <li <?php echo ($this->uri->segment(2) == "catProvedores") ? 'class="active"' : ""; ?>>
          <a href="<?php echo base_url("Cart_admin/catProvedores"); ?>">
            <i class="fa fa-list" aria-hidden="true"></i><span>Provedores</span>
          </a>
        </li>
        <li <?php echo ($this->uri->segment(2) == "catProductos") ? 'class="active"' : ""; ?>>
          <a href="<?php echo base_url("Cart_admin/catProductos"); ?>">
            <i class="fa fa-list" aria-hidden="true"></i><span>Productos</span>
          </a>
        </li>
        <li <?php echo ($this->uri->segment(2) == "lstPedidos") ? 'class="active"' : ""; ?>>
          <a href="<?php echo base_url("Cart_admin/lstPedidos"); ?>">
            <i class="fa fa-list" aria-hidden="true"></i><span>Listado Pedidos</span>
          </a>
        </li>
        <li <?php echo ($this->uri->segment(1) == "pedidos" or $this->uri->segment(1) == "detallePedido") ? 'class="active"' : ""; ?>>
          <a href="<?php echo base_url("pedidos"); ?>">
            <i class="fa fa-list" aria-hidden="true"></i><span>Pedidos</span>
          </a>
        </li>
        <li <?php echo ($this->uri->segment(1) == "moverProductos") ? 'class="active"' : ""; ?>>
          <a href="<?php echo base_url("moverProductos"); ?>">
            <i class="fa fa-list" aria-hidden="true"></i><span>Mover productos de sucursal</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url("login/logout"); ?>">
            <i class="fa fa-sign-out"></i> <span>Cerrar sesión</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
