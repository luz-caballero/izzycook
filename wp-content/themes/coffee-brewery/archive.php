<?php get_header(); ?>

<div id="content">
  <div class="feature-header">
      <div class="feature-post-thumbnail">
        <div class="slider-alternate">
          <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png'; ?>">
        </div>
        <?php if ( get_theme_mod('coffee_brewery_breadcrumb_enable',true) ) : ?>
          <div class="bread_crumb text-center">
            <h1 class="post-title feature-header-title"><?php esc_html_e('Archive Post','coffee-brewery'); ?></h1>
            <?php coffee_brewery_breadcrumb();  ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <div class="container">
    <div class="row">
      <?php if(get_theme_mod('coffee_brewery_archive_sidebar_layout', 'Right Sidebar') == 'Right Sidebar'){ ?>
      <div class="col-lg-8 col-md-8 mt-5">
        <div class="row">
          <?php
            if ( have_posts() ) :

              while ( have_posts() ) :

                the_post();
                get_template_part( 'template-parts/content', get_post_format() );

              endwhile;

            else:

              esc_html_e( 'Sorry, no post found on this archive.', 'coffee-brewery' );

            endif;

            get_template_part( 'template-parts/pagination' );
          ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <?php get_sidebar(); ?>
      </div>
      <?php } elseif(get_theme_mod('coffee_brewery_archive_sidebar_layout', 'Right Sidebar') == 'Left Sidebar'){ ?>
      <div class="col-lg-4 col-md-4">
        <?php get_sidebar(); ?>
      </div>
      <div class="col-lg-8 col-md-8 mt-5">
        <div class="row">
          <?php
            if ( have_posts() ) :

              while ( have_posts() ) :

                the_post();
                get_template_part( 'template-parts/content', get_post_format() );

              endwhile;

            else:

              esc_html_e( 'Sorry, no post found on this archive.', 'coffee-brewery' );

            endif;

            get_template_part( 'template-parts/pagination' );
          ?>
        </div>
      </div>
      <?php } elseif(get_theme_mod('coffee_brewery_archive_sidebar_layout', 'Right Sidebar') == 'Three Column'){ ?>
      <div class="col-lg-3 col-md-3">
        <?php get_sidebar(); ?>
      </div>
      <div class="col-lg-6 col-md-6 mt-5">
        <div class="row">
          <?php
            if ( have_posts() ) :

              while ( have_posts() ) :

                the_post();
                get_template_part( 'template-parts/content', get_post_format() );

              endwhile;

            else:

              esc_html_e( 'Sorry, no post found on this archive.', 'coffee-brewery' );

            endif;

            get_template_part( 'template-parts/pagination' );
          ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 sidebar-area mt-5">
        <?php dynamic_sidebar('coffee-brewery-sidebar-2'); ?>
      </div>
      <?php } elseif(get_theme_mod('coffee_brewery_archive_sidebar_layout', 'Right Sidebar') == 'Four Column'){ ?>
      <div class="col-lg-3 col-md-3">
        <?php get_sidebar(); ?>
      </div>
      <div class="col-lg-3 col-md-3 sidebar-area mt-5">
        <?php dynamic_sidebar('coffee-brewery-sidebar-2'); ?>
      </div>
      <div class="col-lg-3 col-md-3 mt-5">
        <div class="row">
          <?php
            if ( have_posts() ) :

              while ( have_posts() ) :

                the_post();
                get_template_part( 'template-parts/content', get_post_format() );

              endwhile;

            else:

              esc_html_e( 'Sorry, no post found on this archive.', 'coffee-brewery' );

            endif;

            get_template_part( 'template-parts/pagination' );
          ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 sidebar-area mt-5">
        <?php dynamic_sidebar('coffee-brewery-sidebar-3'); ?>
      </div>
      <?php } elseif(get_theme_mod('coffee_brewery_archive_sidebar_layout', 'Right Sidebar') == 'Grid Layout Without Sidebar'){ ?>
        <div class="row mt-5">
              <?php
                if ( have_posts() ) :

                  while ( have_posts() ) :

                    the_post();
                    get_template_part( 'template-parts/content-grid' );

                  endwhile;

                else:

                  esc_html_e( 'Sorry, no post found on this archive.', 'coffee-brewery' );

                endif;

                get_template_part( 'template-parts/pagination' );
              ?>
        </div>
      <?php } elseif(get_theme_mod('coffee_brewery_archive_sidebar_layout', 'Right Sidebar') == 'Grid Layout With Right Sidebar'){ ?>
        <div class="row">
          <div class="col-lg-8 col-md-8 mt-5">
            <div class="row">
              <?php
                if ( have_posts() ) :

                  while ( have_posts() ) :

                    the_post();
                    get_template_part( 'template-parts/content-grid' );

                  endwhile;

                else:

                  esc_html_e( 'Sorry, no post found on this archive.', 'coffee-brewery' );

                endif;

                get_template_part( 'template-parts/pagination' );
              ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <?php get_sidebar(); ?>
          </div>
        </div>
      <?php } elseif(get_theme_mod('coffee_brewery_archive_sidebar_layout', 'Right Sidebar') == 'Grid Layout With Left Sidebar'){ ?>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <?php get_sidebar(); ?>
          </div>
          <div class="col-lg-8 col-md-8 mt-5">
            <div class="row">
              <?php
                if ( have_posts() ) :

                  while ( have_posts() ) :

                    the_post();
                    get_template_part( 'template-parts/content-grid' );

                  endwhile;

                else:

                  esc_html_e( 'Sorry, no post found on this archive.', 'coffee-brewery' );

                endif;

                get_template_part( 'template-parts/pagination' );
              ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>