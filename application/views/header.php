<!DOCTYPE html>
<html lang="en">
<head>
	<title>vinos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
<div id="app">
	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="wrap_header">
				<!-- Logo -->
				<a href="home" class="logo">
					<img src="<?php echo base_url(); ?>assets/images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a>Todas las categorias</a>
								<ul class="sub_menu">
							    <li v-for="category in products.prop.mainCategories">
							    	<a :href="'categories?id=' + category.id_categoria">{{ category.nombre }}</a>
							    </li>
								</ul>
							</li>

							<li v-for="category in products.prop.categories">
								<a :href="'categories?id=' + category.id_categoria">{{ category.nombre }}</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a @click="login.method.logout" href="#" class="header-wrapicon1 dis-block">
            Cerrar sesion
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="<?php echo base_url(); ?>assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">{{ cart.prop.productsCart.length }}</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li v-for="(product, index) in cart.prop.productsCart" class="header-cart-item">
									<div @click="cart.method.removeToCart(index)" class="header-cart-item-img">
										<img src="<?php echo base_url(); ?>assets/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
										  {{ product.nombre }}
										</a>

										<span class="header-cart-item-info">
											{{ product.cantidadCarrito }} x ${{ product.precio }}
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: ${{ cart.prop.subtotalDiscount }}
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn" style="margin: auto">
									<!-- Button -->
									<a href="cart" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									  Ver carrito
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="<?php echo base_url(); ?>assets/images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="<?php echo base_url(); ?>assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li v-for="(product, index) in cart.prop.productsCart" class="header-cart-item">
									<div @click="cart.method.removeToCart(index)" class="header-cart-item-img">
										<img src="<?php echo base_url(); ?>assets/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
										  {{ product.nombre }}
										</a>

										<span class="header-cart-item-info">
											{{ product.cantidadCarrito }} x ${{ product.precio }}
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: ${{ cart.prop.subtotalDiscount }}
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn" style="margin: auto">
									<!-- Button -->
									<a href="cart" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									  Ver carrito
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-menu-mobile">
						<a>Todas las categorias</a>
						<ul class="sub_menu">
					    <li v-for="category in products.prop.mainCategories">
					    	<a :href="'categories?id=' + category.id_categoria">{{ category.nombre }}</a>
					    </li>
						</ul>
					</li>

					<li class="item-menu-mobile" v-for="category in products.prop.categories">
						<a :href="'categories?id=' + category.id_categoria">{{ category.nombre }}</a>
					</li>

					<li class="item-menu-mobile">
					  <a @click="login.method.logout" href="#">
              Cerrar sesion
					  </a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
