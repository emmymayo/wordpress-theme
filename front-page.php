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

	<main id="primary" class="site-main " style="">
        <section class="container py-2">
            <h1 class="  text-uppercase text-center fw-bolder mt-4">Welcome to <span class="text-primary">doors</span> & <br>handles</h1>
            <p class="text-center mt-3 py-2 fw-bold">Your favourite store for security, German and vintage doors</p>
        </section>
        <section class="header d-none">
            <?php if ( get_header_image() ) : ?>
                <div id="site-header" class="d-flex justify-content-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img class="img-fluid" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    </a>
                </div>
            <?php endif; ?>

        </section>
        <!-- Carousel -->
        <section class="dh-carousel container">
        <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
           
            <div class="carousel-inner">
                <div class="carousel-item active">
                <!--<img src="https://via.placeholder.com/1024x500?text=Doors+And+Handles+Placeholder" class="d-block w-100" alt="..."> -->
				<img src="<?php echo get_template_directory_uri().'/images/carousel-1.png' ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    
                </div>
                </div>
                <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri().'/images/carousel-2.png' ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                   
                </div>
                </div>
                <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri().'/images/carousel-3.png' ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    
                </div>
                </div>
                <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri().'/images/carousel-4.png' ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </section>

        <!-- spacer -->
        <div class="my-5">&nbsp;</div>
        <section class="container ">
            <div class="container my-5">
                <h6 class="h6 text-center text-uppercase fw-bolder"> Shop by category</h6>
                <!-- Centered Dash -->
                <div class="d-flex justify-content-center align-items-center">
                    <hr class=" text-primary fw-bolder" style="width:5rem;height:0.2rem">
                </div>
            </div>
            
            <?php echo do_shortcode('[product_categories limit="4" columns="4" hide_empty="1"]'); ?>
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

        <section class="container">
            <div class="container my-5">
                <h6 class="h6 text-center text-uppercase fw-bolder"> Featured</h6>
                <!-- Centered Dash -->
                <div class="d-flex justify-content-center align-items-center">
                    <hr class=" text-primary fw-bolder" style="width:5rem;height:0.2rem">
                </div>
                
            </div>
            
            <?php echo do_shortcode('[products limit="4" columns="4" orderby="id" order="DESC" visibility="featured"]'); ?>
        </section>

        <section class="container">
            <div class="container my-5">
            <h6 class="h6 text-center text-uppercase fw-bolder"> Best selling</h6>
                <!-- Centered Dash -->
                <div class="d-flex justify-content-center align-items-center">
                    <hr class=" text-primary fw-bolder" style="width:5rem;height:0.2rem">
                </div>
                
            </div>
            
            <?php echo do_shortcode('[products limit="4" columns="4" orderby="id" order="DESC" best_selling="true"]'); ?>
        </section>

        <section class="container  my-5 ">
            <div class=" container my-5 ">
            <h6 class="h6 text-center text-uppercase fw-bolder"> Popular Now </h6>
                <!-- Centered Dash -->
                <div class="d-flex justify-content-center align-items-center">
                    <hr class=" text-primary fw-bolder" style="width:5rem;height:0.2rem">
                </div>
            </div>
            
            <?php  echo do_shortcode('[products limit="4" columns="4" orderby="popularity" class="quick-sale" on_sale="true" ]'); ?>

            <?php 
                // $products = wc_get_products(array(
                // 'limit'  => 6, 
                // 'status' => 'publish', // Only published products
                // 'orderBy' =>'rand'
                // ) );  
                
            ?>
            <!-- <div class="row  justify-content-between ">
            <?php foreach($products as $product): ?>
                <a class="d-block" href="<?php echo 'product/'.$product->get_slug(); ?>">
                <div class="col-sm-4 d-flex align-items-center my-2 shadow-sm flex-grow-1">
                
                    <div>
                        <?php echo wp_get_attachment_image( get_post_thumbnail_id( $product->id ), [100,100]); ?>
                    </div>
                    <div class="d-flex flex-column mx-3 ">
                        <div class="mb-4 text-truncate"><?php echo $product->get_name(); ?>  </div>
                        <div class="fw-bold"><?php echo  get_woocommerce_currency_symbol(get_woocommerce_currency()).$product->get_price(); ?></div>
                    </div>
                
                </div>
                </a>
            <?php endforeach; ?>
            </div> -->
        </section>

        

	</main><!-- #main -->

<?php
//  get_sidebar();
get_footer();
