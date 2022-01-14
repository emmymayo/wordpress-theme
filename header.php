<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Doors_and_Handles
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'doors-and-handles' ); ?></a>
<!-- 
	<div class="top-info-bar shadow-sm py-2">
		<div class="container">
			<div class="row">
				<div class="col-md-8 d-none d-md-block">
					<ul class="top-info-bar__list">
						<li>
							<i class="fa fa-phone rounded-circle"></i>
							<a href="tel: +234 80 3473 4903 "> +234 80 3473 4903</a>
						</li>
						<li>
							<i class="fa fa-envelope-o rounded-circle"></i>
							<a href="mailto: mail@mail.com "> mail@mail.com</a>
						</li>
					</ul>
				</div>

				<div class="col-md-4 d-flex align-items-center justify-content-center justify-content-md-end">
					<ul class="top-info-bar__list ">
						<li>
							<a href="# "> <i class="fa fa-instagram rounded-circle"></i> </a>
						</li>
						<li>
							<a href="# "> <i class="fa fa-facebook rounded-circle"></i> </a>
						</li>
						<li>
							<a href="# "> <i class="fa fa-twitter rounded-circle"></i> </a>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</div> -->

	<header id="masthead" class="site-header sticky-top glass ">

		<div class="d-none d-md-block container-fluid  py-2 ">
			<div class="row align-items-center justify-content-between">
				<div class="col-md-1 site-header__logo" >
					<?php the_custom_logo(); ?>
				</div>

				<div class="col-md-8  site-header__menu" >
					<nav id="site-navigation" class="main-navigation  d-none d-md-block">
						<div class="container-fluid d-flex justify-content-center">
							<div class="row">
								<div class="col-12 d-flex justify-content-start">
								<button class="menu-toggle " aria-controls="primary-menu" aria-expanded="false">
									<i class="fa fa-bars"></i>	<?php esc_html_e( '', 'doors-and-handles' ); ?>
									</button>
								</div>
								<div class="col-12 text-center">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
								</div>
							</div>
						</div>
					</nav><!-- #site-navigation -->
				</div>

				
				
				<div class="col   d-flex align-items-center justify-content-around ">
					<div>
						<a class="cart-customlocatio text-decoration-none" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
							<!-- <i class="fa fa-shopping-cart fa-2x"></i>	 -->
						<svg xmlns="http://www.w3.org/2000/svg" class="text-primary" style="height:1rem;width:1rem" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
						</svg>
						<!-- <sup class="bg-primary text-white px-1   rounded-circle" style="font-size: xx-small"><?php echo WC()->cart->get_cart_contents_count(); ?> </sup> -->
						</a>
					</div>
						
					<a href="# "> <i class="text-primary fa fa-instagram rounded-circle"></i> </a>
					<a href="# "> <i class="text-primary fa fa-facebook rounded-circle"></i> </a>
					<a href="# "> <i class="text-primary fa fa-twitter rounded-circle"></i> </a>
				</div>
				
				
				
			</div>
		</div>
		<!-- Mobile logo and cart -->
		<div class="container d-md-none py-2">
			<div class="row align-items-center justify-content-between">
				<div class="col site-header__logo" >
					<?php the_custom_logo(); ?>
				</div>

				
				

				<div  class="col site-header__cart d-flex justify-content-end" >
					<!-- <a class="cart-customlocatio text-decoration-none" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
						<i class="fa fa-shopping-cart fa-2x"></i>	
					<svg xmlns="http://www.w3.org/2000/svg" class="text-primary" style="height:1.5rem;width:1.5rem" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
					</svg>
					<sup class="bg-primary text-white px-1   rounded-circle" style="font-size: xx-small"><?php echo WC()->cart->get_cart_contents_count(); ?> </sup>
					</a> -->
					<!-- Toggle -->
					<button class="navbar-toggler text-primary border-none" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon fa fa-bars"></span>
					</button>
				</div>
				
				
			</div>
		</div>
		<!-- Mobile search -->
		<!-- <div class="d-block d-md-none  container py-2">
			<div class="row align-items-center justify-content-between">
				<div class="col-md-6  site-header__search" >
				 	<?php dynamic_sidebar( 'dh_header_widget_search' ) ?>
				</div>
			</div>
		</div> -->
		

		<nav class="d-block d-md-none navbar navbar-expand-md navbar-light bg-light ">
			<div class="container ">
				<a class="navbar-brand" href="#"></a>
				
				
				<div class="collapse navbar-collapse px-0 mx-0 text-primary" id="main-menu">
					<?php
					wp_nav_menu(array(
						'menu_id'        => 'primary-menu',
						'container' => false,
						'menu_class' => '',
						'fallback_cb' => '__return_false',
						'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 mx-0 text-primary  %2$s">%3$s</ul>',
						'depth' => 2,
						'walker' => new dh_wp_nav_menu_walker()
					));
					?>
				</div>
			</div>
		</nav>


		
		
	</header><!-- #masthead -->
