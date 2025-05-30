<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Coffee Shop
 */

get_header(); ?>

<div id="content">
  <?php
    $classic_coffee_shop_hidcatslide = get_theme_mod('classic_coffee_shop_hide_categorysec', false);
    $classic_coffee_shop_slidersection = get_theme_mod('classic_coffee_shop_slidersection');

    if ($classic_coffee_shop_hidcatslide && $classic_coffee_shop_slidersection) { ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('classic_coffee_shop_slidersection',false) ) { ?>
          <?php $classic_coffee_shop_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('classic_coffee_shop_slidersection',false)));
            while( $classic_coffee_shop_queryvar->have_posts() ) : $classic_coffee_shop_queryvar->the_post(); ?>
              <div class="slidesection">
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail('full');
                  } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="<?php echo esc_attr( 'slider', 'classic-coffee-shop'); ?>"/>
                <?php } ?>
                <div class="slider-box text-center">
                  <h1><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h1>
                  <?php
                    $classic_coffee_shop_trimexcerpt = get_the_excerpt();
                    $classic_coffee_shop_shortexcerpt = wp_trim_words( $classic_coffee_shop_trimexcerpt, $num_words = 15 );
                    echo '<p class="mt-4">' . esc_html( $classic_coffee_shop_shortexcerpt ) . '</p>';
                  ?>
                  <div class="rsvp_button mt-0 mt-md-5">
                    <?php 
                    $classic_coffee_shop_button_text = get_theme_mod('classic_coffee_shop_button_text', 'SHOP HERE');
                    $classic_coffee_shop_button_link_slider = get_theme_mod('classic_coffee_shop_button_link_slider', ''); 
                    if (empty($classic_coffee_shop_button_link_slider)) {
                        $classic_coffee_shop_button_link_slider = get_permalink();
                    }
                    if ($classic_coffee_shop_button_text || !empty($classic_coffee_shop_button_link_slider)) { ?>
                      <?php if(get_theme_mod('classic_coffee_shop_button_text', 'SHOP HERE') != ''){ ?>
                        <a href="<?php echo esc_url($classic_coffee_shop_button_link_slider); ?>" class="button redmor">
                          <?php echo esc_html($classic_coffee_shop_button_text); ?>
                            <span class="screen-reader-text"><?php echo esc_html($classic_coffee_shop_button_text); ?></span>
                        </a>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php
    $classic_coffee_shop_hidcatpro = get_theme_mod('classic_coffee_shop_hidcatpro', true);
    $classic_coffee_shop_hot_products_cat = get_theme_mod('classic_coffee_shop_hot_products_cat');

    if ($classic_coffee_shop_hidcatpro && $classic_coffee_shop_hot_products_cat) { ?>
    <section id="product_cat_slider" class="py-5">
      <div class="container">
        <div class="product-head-box">
          <?php if ( get_theme_mod('classic_coffee_shop_product_title') != "") { ?>
            <img src="<?php echo esc_url(get_template_directory_uri()) . '/images/head.png' ?>" alt="<?php echo esc_attr( 'image', 'classic-coffee-shop'); ?>">
            <h2><?php echo esc_html(get_theme_mod('classic_coffee_shop_product_title','')); ?></h2>
          <?php }?>
          <?php if ( get_theme_mod('classic_coffee_shop_product_text') != "") { ?>
            <p class="mb-0"><?php echo esc_html(get_theme_mod('classic_coffee_shop_product_text','')); ?></p>
          <?php }?>
        </div>
        <div class="owl-carousel">
          <?php if(class_exists('woocommerce')){
            $args = array(
              'post_type' => 'product',
              'posts_per_page' => 50,
              'product_cat' => get_theme_mod('classic_coffee_shop_hot_products_cat'),
              'order' => 'ASC'
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
              <div class="product-image">
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                <?php if ( has_post_thumbnail() ) { ?>
                    <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                <?php }?>
                <div class="box-content">
                  <h3 class="product-text my-2 "><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h3>
                </div>
              </div>
            <?php endwhile; wp_reset_query(); ?>
          <?php }?>
        </div>
      </div>
    </section>
  <?php } ?>
</div>

<?php get_footer(); ?>
