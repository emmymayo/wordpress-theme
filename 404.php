<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Doors_and_Handles
 */

get_header();
?>

	<main id="primary" class="site-main ">

		<section class="error-404 not-found container">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'doors-and-handles' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p class="text-center"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'doors-and-handles' ); ?></p>

			<!-- Product category and new in -->

		<section class="container ">
            <div class="container my-5">
                <h6 class="h6 text-center text-uppercase fw-bolder"> Shop by category</h6>
                <!-- Centered Dash -->
                <div class="d-flex justify-content-center align-items-center">
                    <hr class=" text-primary fw-bolder" style="width:5rem;height:0.2rem">
                </div>
            </div>
            
            <?php echo do_shortcode('[product_categories limit="-1" columns="4" hide_empty="1"]'); ?>
        </section>
        

        <section class="container">
            <div class="container my-5">
                <h6 class="h6 text-center text-uppercase fw-bolder"> New in</h6>
                <!-- Centered Dash -->
                <div class="d-flex justify-content-center align-items-center">
                    <hr class=" text-primary fw-bolder" style="width:5rem;height:0.2rem">
                </div>
                
            </div>
            
            <?php echo do_shortcode('[products limit="4" columns="4" orderby="id" order="DESC" visibility="visible"]'); ?>
        </section>
<!-- 
					<?php
					// get_search_form();

					// the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'doors-and-handles' ); ?></h2>
						<ul>
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div>

					<?php
					/* translators: %1$s: smiley */
					$doors_and_handles_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'doors-and-handles' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$doors_and_handles_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?> -->

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
