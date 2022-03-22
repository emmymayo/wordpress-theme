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
								<span><i class="fa fa-cc-visa"></i></span>
								<span><i class="fa fa-paypal"></i></span>
								<!-- <span><i class="fa fa-cc-verve"></i></span> -->
								<!-- <span><i class="fa fa-cc-stripe"></i></span> -->
								<!-- <span><i class="fa fa-google-wallet"></i></span> -->

							</div>
						</div>

						<div class="col">
							<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
							<input required class="rounded border-0" placeholder="Email">
							<button class="border-0 rounded bg-primary text-white">Submit</button>
							</form>
						</div>

						
					</div>

					<div class="mt-3 row d-flex flex-column flex-md-row justify-content-between">
						<div class="col">
							<ul class="m-0">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><li>About Us</li></a>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><li>Contact Us</li></a>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><li>Terms & Condition</li></a>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><li>Privacy & Policies</li></a>
							</ul>
						</div>
						<div class="col">
							<ul class="m-0">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><li>Support</li></a>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><li>FAQs</li></a>
							</ul>
						</div>
					</div>

					<div class="container mt-3 pb-5">
						<p class="text-center"> Copyright &copy <?php echo date('Y') ?> Doorsandhandle. All rights reserved.</p>
					</div>
					
				</div>
			</section>
		</div><!-- .site-info -->
		<div class="rounded-0 mobile-bottom-bar shadow-lg glass py-3 px-2 d-flex d-md-none justify-content-between position-fixed bottom-0 start-0 end-0" style="z-index:99">
		<a href="<?php echo esc_url( home_url( '/' ) ).'/my-account'; ?>" rel="home">
		<span class="text-primary p-1 "><i class="fa fa-user-o fa-2x"></i></span>            
        </a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<span class="text-primary p-1 text-center ">
			<svg xmlns="http://www.w3.org/2000/svg" style="height:2rem;width:2rem" class=" " fill="none" viewBox="0 0 24 24" stroke="currentColor">
  				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
			</svg>
		</span>            
        </a>
		<a href="<?php echo esc_url( home_url( '/' ) ).'/cart'; ?>" rel="home">
		<span class="text-primary p-1 ">
			<svg xmlns="http://www.w3.org/2000/svg" class="text-primary" style="height:2rem;width:2rem" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
			</svg>
		</span>            
        </a>
			

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
