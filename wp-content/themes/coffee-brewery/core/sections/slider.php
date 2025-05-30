<?php $coffee_brewery_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('coffee_brewery_blog_slide_category'),
  'posts_per_page' => get_theme_mod('coffee_brewery_blog_slide_number'),
); ?>

<?php if ( get_theme_mod('coffee_brewery_blog_box_enable',false) ) : ?>
  <div class="slider">
    <div class="slider-box my-4">
      <div class="slider-inner-banner">
          <div class="owl-carousel">
            <?php $coffee_brewery_arr_posts = new WP_Query( $coffee_brewery_args );
            $i = 1;
            if ( $coffee_brewery_arr_posts->have_posts() ) :
              while ( $coffee_brewery_arr_posts->have_posts() ) :
                $coffee_brewery_arr_posts->the_post();
                ?>
                <div class="row slider-box m-0">
                  <div class="slider-owl-position col-lg-6 col-md-6 align-self-center">
                    <h4 class="mb-3 short-text"><?php echo esc_html(get_theme_mod('coffee_brewery_slider_short_heading'));?></h4>
                    <h3 class="mb-0"><?php the_title(); ?></h3>
                    <p class="mb-4 pb-2 content"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                        <span class="slider-button mb-0">
                          <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php esc_html_e('ORDER NOW','coffee-brewery'); ?></a>
                        </span>
                        <?php $coffee_brewery_settings = get_theme_mod( 'coffee_brewery_social_links_settings' ); ?>
                        <span class="social-links text-center">
                          <?php if ( is_array($coffee_brewery_settings) || is_object($coffee_brewery_settings) ){ ?>
                                <?php foreach( $coffee_brewery_settings as $coffee_brewery_setting ) { ?>
                                    <a href="<?php echo esc_url( $coffee_brewery_setting['link_url'] ); ?>">
                                        <i class="<?php echo esc_attr( $coffee_brewery_setting['link_text'] ); ?>"></i>
                                    </a>
                                <?php } ?>
                          <?php } ?>
                        </span>
                  </div>
                  <div class="slider-image col-lg-6 col-md-6 pe-0 align-self-center">
                    <?php
                      if ( has_post_thumbnail() ) :
                        the_post_thumbnail();
                      else:
                        ?>
                        <div class="slider-alternate">
                          <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/slider.png'; ?>">
                        </div>
                        <?php
                      endif;
                    ?>
                  </div>
                </div>
              <?php
              $i++;
            endwhile;
            wp_reset_postdata();
            endif; ?>
          </div>
      </div>
      <?php if ( get_theme_mod('coffee_brewery_slider_bar_1') ) : ?>
        <div class="bar-1">
          <marquee class="mb-0 bar-text"><?php echo esc_html(get_theme_mod('coffee_brewery_slider_bar_1'));?></marquee>
        </div>
      <?php endif; ?>
      <?php if ( get_theme_mod('coffee_brewery_slider_bar_2') ) : ?>
        <div class="bar-2">
          <marquee class="mb-0 bar-text "scrollamount="7"><?php echo esc_html(get_theme_mod('coffee_brewery_slider_bar_2'));?></marquee>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>