<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Doors_and_Handles
 */

get_header();
?>

	<main id="primary" class="site-main container">

		<div class="woo-content container py-5 row">
			<div class="col-md-3"><?php dynamic_sidebar( 'dh_filter_widget' ) ?></div>

            <div class="col-md-9"> <?php woocommerce_content(); ?> </div>

        </div>

	</main><!-- #main -->

<?php

get_footer();
