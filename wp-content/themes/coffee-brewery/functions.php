<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function coffee_brewery_enqueue_google_fonts() {

	require_once get_theme_file_path( 'core/includes/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'google-fonts-inter',
		coffee_brewery_enqueue_wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap' ), // font-family: "Inter", sans-serif;
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'google-fonts-julee',
		coffee_brewery_enqueue_wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Julee&display=swap' ), //  font-family: "Julee", cursive;
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'google-fonts-bebas+neue',
		coffee_brewery_enqueue_wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap' ), //  font-family: "Bebas Neue", sans-serif;
		array(),
		'1.0'
	);
	
}
add_action( 'wp_enqueue_scripts', 'coffee_brewery_enqueue_google_fonts' );

if (!function_exists('coffee_brewery_enqueue_scripts')) {

	function coffee_brewery_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			get_template_directory_uri() . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('coffee-brewery-style', get_stylesheet_uri(), array() );

		wp_enqueue_style('dashicons');

		wp_style_add_data('coffee-brewery-style', 'rtl', 'replace');

		wp_enqueue_style(
			'coffee-brewery-media-css',
			get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'coffee-brewery-woocommerce-css',
			get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'coffee-brewery-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);
		
		wp_enqueue_script(
			'bootstrap-js',get_template_directory_uri() . '/js/bootstrap.js',
			array('jquery'),
			'5.1.3',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			get_template_directory_uri() . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'coffee-brewery-script',
			get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$coffee_brewery_css = '';

		if ( get_header_image() ) :

			$coffee_brewery_css .=  '
				header#site-navigation{
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'coffee-brewery-style', $coffee_brewery_css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'coffee-brewery-style',$coffee_brewery_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'coffee_brewery_enqueue_scripts' );
}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('coffee_brewery_after_setup_theme')) {

	function coffee_brewery_after_setup_theme() {

		load_theme_textdomain( 'coffee-brewery', get_stylesheet_directory() . '/languages' );
		if ( ! isset( $coffee_brewery_content_width ) ) $coffee_brewery_content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'coffee-brewery' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'ffffff'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'width' => 1920,
			'height' => 100
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_editor_style( array( '/css/editor-style.css' ) );

		require get_template_directory() .'/core/includes/theme-breadcrumb.php';
		require get_template_directory() .'/core/includes/tgm.php';
		require get_template_directory() . '/core/includes/customizer.php';
		load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );
	}

	add_action( 'after_setup_theme', 'coffee_brewery_after_setup_theme', 999 );

}

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme logo style */
/*-----------------------------------------------------------------------------------*/
function coffee_brewery_logo_resizer() {

    $coffee_brewery_theme_logo_size_css = '';
    $coffee_brewery_logo_resizer = get_theme_mod('coffee_brewery_logo_resizer');

	$coffee_brewery_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($coffee_brewery_logo_resizer).'px !important;
			width: '.esc_attr($coffee_brewery_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'coffee-brewery-style',$coffee_brewery_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'coffee_brewery_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function coffee_brewery_global_color() {

    $coffee_brewery_theme_color_css = '';
    $coffee_brewery_copyright_bg = get_theme_mod('coffee_brewery_copyright_bg');

	$coffee_brewery_theme_color_css = '
    .copyright {
			background: '.esc_attr($coffee_brewery_copyright_bg).';
		}
	';
    wp_add_inline_style( 'coffee-brewery-style',$coffee_brewery_theme_color_css );
    wp_add_inline_style( 'coffee-brewery-woocommerce-css',$coffee_brewery_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'coffee_brewery_global_color' );

function coffee_brewery_sanitize_select( $input, $setting ) {
	// Ensure input is a slug
	$input = sanitize_key( $input );

	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('coffee_brewery_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function coffee_brewery_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'coffee-brewery');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'coffee-brewery'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_attr('%1$s at %2$s', '1: date, 2: time', 'coffee-brewery'), esc_attr( get_comment_date() ), esc_attr( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'coffee-brewery' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'coffee-brewery'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for coffee_brewery_comment()

if (!function_exists('coffee_brewery_widgets_init')) {

	function coffee_brewery_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','coffee-brewery'),
			'id'   => 'coffee-brewery-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'coffee-brewery'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 2','coffee-brewery'),
			'id'   => 'coffee-brewery-sidebar-2',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'coffee-brewery'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 3','coffee-brewery'),
			'id'   => 'coffee-brewery-sidebar-3',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'coffee-brewery'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer Sidebar','coffee-brewery'),
			'id'   => 'coffee-brewery-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'coffee-brewery'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'coffee_brewery_widgets_init' );

}

function coffee_brewery_get_categories_select() {
	$coffee_brewery_teh_cats = get_categories();
	$coffee_brewery_results = array();
	$coffee_brewery_count = count($coffee_brewery_teh_cats);
	for ($i=0; $i < $coffee_brewery_count; $i++) {
	if (isset($coffee_brewery_teh_cats[$i]))
  		$coffee_brewery_results[$coffee_brewery_teh_cats[$i]->slug] = $coffee_brewery_teh_cats[$i]->name;
	else
  		$coffee_brewery_count++;
	}
	return $coffee_brewery_results;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'coffee_brewery_loop_columns');
if (!function_exists('coffee_brewery_loop_columns')) {
	function coffee_brewery_loop_columns() {
		$coffee_brewery_columns = get_theme_mod( 'coffee_brewery_per_columns', 3 );
		return $coffee_brewery_columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'coffee_brewery_per_page', 20 );
function coffee_brewery_per_page( $coffee_brewery_cols ) {
  	$coffee_brewery_cols = get_theme_mod( 'coffee_brewery_product_per_page', 9 );
	return $coffee_brewery_cols;
}

// Add filter to modify the number of related products
add_filter( 'woocommerce_output_related_products_args', 'coffee_brewery_products_args' );
function coffee_brewery_products_args( $args ) {
    $args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );
    $args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );
    return $args;
}

function coffee_brewery_get_page_id_by_title($coffee_brewery_pagename){

    $args = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'title' => $coffee_brewery_pagename
    );
    $query = new WP_Query( $args );

    $page_id = '1';
    if (isset($query->post->ID)) {
        $page_id = $query->post->ID;
    }

    return $page_id;
}

add_action( 'customize_register', 'coffee_brewery_remove_setting', 20 );
function coffee_brewery_remove_setting( $wp_customize ) {
    // Check if the setting or control exists before removing
    if ( $wp_customize->get_setting( 'header_textcolor' ) ) {
        $wp_customize->remove_setting( 'header_textcolor' );
    }

    if ( $wp_customize->get_control( 'header_textcolor' ) ) {
        $wp_customize->remove_control( 'header_textcolor' );
    }
}

// edit link option
if (!function_exists('coffee_brewery_edit_link')) :
    function coffee_brewery_edit_link($view = 'default')
    {
    global $post;
        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'coffee-brewery'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link"><i class="fas fa-edit"></i>',
            '</span>'
        );
    }
endif;?>