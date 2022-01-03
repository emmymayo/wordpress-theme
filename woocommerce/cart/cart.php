<?php
	defined( 'ABSPATH' ) || exit;

	do_action( 'woocommerce_before_cart' ); ?>

	<form class="woocommerce-cart-form container" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>

		<?php do_action( 'woocommerce_before_cart_contents' ); ?>
		
		<div class="row my-4">
			<div class="col-md-12 justify-content-start">
				<button type="button" class="btn my-3 card border-none text-sm text-white bg-primary px-2 py-1">Proceed to Checkout</button>
				<button type="button" class="btn shadow border-none px-3 bg-white text-primary px-2 py-1">Continue Shopping</button>
			</div>
		</div>

		<div class="row">

			<!-- Loop Start -->
			<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			?>

			<!-- Product Card -->
			<div class="col-md-12 justify-content-end">
				<div class="row shadow p-3 mb-5 bg-body rounded">
					<div class="col-sm-4 justify-content-end">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image([200]), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}
						?>
					</div>
					<div class="col-sm-6">
						<ul class="list-unstyled">

							<!-- Product Name -->
							<li class="my-2 fw-bolder fs-4 text-black" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
								<?php
									if ( ! $product_permalink ) {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
									} else {
										echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
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
							<li class="mb-2" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
								<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
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
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
							</li>
						</ul>
					</div>

					<!-- Remove Btn -->
					<div class="col-sm-2 align-self-end">
						<?php
							echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'woocommerce_cart_item_remove_link',
								sprintf(
									'<a href="%s" class="fw-bold" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fas fa-trash">Remove</i></a>',
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
			<?php if ( wc_coupons_enabled() ) { ?>
				<div class="coupon">
					<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
					<?php do_action( 'woocommerce_cart_coupon' ); ?>
				</div>
				<?php } ?>

				<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			</div>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</div>
	
		<?php do_action( 'woocommerce_after_cart_table' ); ?>
	</form>
	
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