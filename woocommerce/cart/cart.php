<?php
	defined( 'ABSPATH' ) || exit;

	do_action( 'woocommerce_before_cart' ); ?>
	<div class= "container row">
		<!-- Side column -->
		<div class="col-md-3 justify-content-start d-none d-md-block">
			<a href="<?php echo get_home_url().'/checkout' ?>" class="w-75 btn my-3 rounded-0 border-none text-sm text-white bg-primary px-1 py-1">Proceed to Checkout</a>
			<a href="<?php echo get_site_url().'/shop' ?>" class="w-75 btn shadow-sm rounded-0 border-none text-sm  bg-white text-primary px-1 py-1">Continue Shopping</a>
			<form class="woocommerce-cart-form mt-5" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
				
				<button type="submit" class="w-75 btn shadow-sm rounded-0 border-none bg-primary text-sm text-white px-1 py-1" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			</form>
		</div>
		
		
		<form class="woocommerce-cart-form col-md-9 row" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
			<?php do_action( 'woocommerce_before_cart_table' ); ?>

			<?php do_action( 'woocommerce_before_cart_contents' ); ?>
			
			

			

				<!-- Loop Start -->
				<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>

				<!-- Product Card -->
				<div class="col-md-12 justify-content-end mx-auto woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="row shadow-sm p-3 mb-3 bg-body rounded-0">
						<div class="col-md-4 justify-content-end">
							<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image([200]), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail; // PHPCS: XSS ok.
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
								}
							?>
						</div>
						<div class="col-md-6">
							<ul class="list-unstyled">

								<!-- Product Name -->
								<li class="my-2 fw-bolder fs-4 text-black cart-product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
									<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" class="text-decoration-none cart-item-title text-primary">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
										}
									?>
								</li>

								<!-- Price -->
								<li class="mb-2" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
									<p class="fw-bold fs-5 text-black">
										Price: <?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok. 
									?>
									</p>
								</li>

								<!-- Quantity -->
								<li class="mb-2 " data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
								
									<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" class="" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input(
												array(
													'input_name'   => "cart[{$cart_item_key}][qty]",
													'input_value'  => $cart_item['quantity'],
													'max_value'    => $_product->get_max_purchase_quantity(),
													'min_value'    => '0',
													'product_name' => $_product->get_name(),
												),
												$_product,
												false
											);
										}

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
									?>
								</li>

								<!-- Subtotal -->
								<li data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
									<?php
										//echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</li>
							</ul>
						</div>

						<!-- Remove Btn -->
						<div class="col-md-12 d-flex justify-content-end">
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="fw-bold" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-trash">Remove</i></a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
						</div>
					</div>
					
				</div>
				<?php
						}
						}
					?>
			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<div>
				
			<button type="submit" class="button mb-5" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
				<?php if ( wc_coupons_enabled() ) { ?>
					<div class="coupon">
						<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>
					<?php } ?>


					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</div>

				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			
		
			<?php do_action( 'woocommerce_after_cart_table' ); ?>
		</form>
		
	<div>
	<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>