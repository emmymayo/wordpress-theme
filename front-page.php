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
<section class="header d-none">
            <?php if ( get_header_image() ) : ?>
                <div id="site-header" class="d-flex justify-content-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img class="img-fluid" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                    </a>
                </div>
            <?php endif; ?>

        </section>

    <main>
        <!-- <div class="circle"></div> -->
        <div class="big-wrapper">
            <div class="showcase-area">
                <div class="lp_container">
                    <div class="left">
                        <div class="big-title">
                            <h1 class="text-semibold fw-bold" >Your Favourite Store For</h1>
                            <h1 class="text-primary text-semibold fw-semibold">Security, Wooden, Luxury Doors and Locks.</h1>
                        </div>
                        <p class="text-md fw-bold lp_text">
                            Doors and handles, your number one choice for high quality security, 
                            interior, flush, steel doors, handles and accessories custom designed products.
                        </p>
                        
                        <div class="cta animate__shakeY">
                            <a href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>" class="animate__animated animate__shakeY animate__slower animate__infinite rounded btn bg-primary text-white lp_btn">Shop Now !!!</a>
                        </div>
                    </div>
    
                    <div class="right">
                        <div class="lp_imgBox">
                            <img src="<?php echo get_template_directory_uri().'/images/2.png' ?>" alt="image_1" class="lp_doors">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom-area mt-1 d-none d-md-block">
                <div class="lp_container">
                    <ul class="lp_thumb">
                        <li><img src="<?php echo get_template_directory_uri().'/images/2.png' ?>" onclick="imgSlider('<?php echo get_template_directory_uri().'/images/2.png' ?>')"></li>
                        <li><img src="<?php echo get_template_directory_uri().'/images/1.png' ?>" onclick="imgSlider('<?php echo get_template_directory_uri().'/images/1.png' ?>')"></li>
                        <li><img src="<?php echo get_template_directory_uri().'/images/4.png' ?>" onclick="imgSlider('<?php echo get_template_directory_uri().'/images/4.png' ?>')"></li>
                        <li><img src="<?php echo get_template_directory_uri().'/images/5.png' ?>" onclick="imgSlider('<?php echo get_template_directory_uri().'/images/5.png' ?>')"></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript">
        function imgSlider(anything){
            document.querySelector('.lp_doors').src = anything;
        }
    </script>

<?php
//  get_sidebar();
get_footer();
