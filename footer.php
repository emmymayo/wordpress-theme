<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Doors_and_Handles
 */

?>

	<footer id="colophon" class="site-footer mt-5">
		<div class="site-info">
			<section class="start-footer py-4">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<?php the_custom_logo(); ?>
						</div>
						<div class="col-md-5">
							<?php dynamic_sidebar( 'dh_footer_widget_one' ) ?>
						</div>
						<div class="col-md-5">
						<?php dynamic_sidebar( 'dh_footer_widget_two' ) ?>
						</div>
					</div>
				</div>
			</section>
			<section class="end-footer py-4">
				<div class="container mb-5 py-2">
					<div class="row d-flex flex-column flex-md-row justify-content-between">
						
						<div class="col p-2">
							<h6 class="fs-6 fw-bold">JOIN US ON</h6>
							<div class="d-flex justify-content-start">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</div>
						</div>
						<div class="col p-2">
							<h6 class="fs-6 fw-bold">PAYMENT METHODS & PARTNERS</h6>
							<div class="d-flex">
								
								<span><i class="fa fa-cc-mastercard"></i></span>
								<!-- <span><i class="fa fa-cc-stripe"></i></span> -->
								<span><i class="fa fa-cc-visa"></i></span>
								<!-- <span><i class="fa fa-paypal"></i></span>
								<span><i class="fa fa-google-wallet"></i></span> -->
							</div>
						</div>
					</div>
					<div class="container my-5 pb-5">
						<p class="text-center"> Copyright &copy <?php echo date('Y') ?> Doorsandhandle. All rights reserved.</p>
					</div>
					
				</div>
			</section>
		</div><!-- .site-info -->
		<div class="mobile-bottom-bar bg-white shadow-lg py-3 px-2 d-flex d-md-none justify-content-between position-fixed bottom-0 start-0 end-0" style="z-index:99">
		<a href="<?php echo esc_url( home_url( '/' ) ).'/my-account'; ?>" rel="home">
		<span class="text-primary"><i class="fa fa-user fa-2x"></i></span>            
        </a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<span class="text-primary"><i class="fa fa-home fa-2x"></i></span>            
        </a>
		<a href="<?php echo esc_url( home_url( '/' ) ).'/cart'; ?>" rel="home">
		<span class="text-primary"><i class="fa fa-shopping-cart fa-2x"></i></span>            
        </a>
			

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
