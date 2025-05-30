<?php if ( get_theme_mod('coffee_brewery_products_section_enable', true) == true ) : ?>

<div id="hot_products" class="py-5">
	<div class="container">
    <?php if ( get_theme_mod('coffee_brewery_products_main_heading') ) : ?>
		 <h3 class="text-center pb-0 mb-2"><?php echo esc_html(get_theme_mod('coffee_brewery_products_main_heading'));?></h3>
    <?php endif; ?>
    <?php if ( get_theme_mod('coffee_brewery_products_main_content') ) : ?>
      <p class="text-center short-heading "><?php echo esc_html(get_theme_mod('coffee_brewery_products_main_content'));?></p>
    <?php endif; ?>
    <div class="owl-carousel mt-4">
      <?php
        $coffee_brewery_product_data = get_theme_mod('coffee_brewery_products_category');
        if ( class_exists( 'WooCommerce' ) ) {
          $coffee_brewery_args = array(
          'post_type' => 'product',
          'posts_per_page' => get_theme_mod('coffee_brewery_products_per_page'),
          'product_cat' => $coffee_brewery_product_data,
          'order' => 'ASC'
        );
        $loop = new WP_Query( $coffee_brewery_args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
      	  <div class="product-box wow zoomIn">
            <div class="product-details mb-4">
              <div class="product-image">
                <figure>
                  <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?>
                </figure>
              </div>
              <h4 class="product-text mb-0"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h4>
              <p class="product-dis mb-2"><?php echo wp_trim_words( get_the_content(),8); ?></p>
              <div class="price-review mb-2">
                <p class="mb-0 <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
              </div>
              <div class="cart-button">
                  <span class="icon" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><span class="button1"><?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?></span></span>
                </div>
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php } ?>
	  </div>
	</div>
</div>

<?php endif; ?>