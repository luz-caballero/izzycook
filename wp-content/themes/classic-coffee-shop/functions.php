<?php
/**
 * Classic Coffee Shop functions and definitions
 *
 * @package Classic Coffee Shop
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'classic_coffee_shop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function classic_coffee_shop_setup() {
	global $classic_coffee_shop_content_width;
	if ( ! isset( $classic_coffee_shop_content_width ) )
		$classic_coffee_shop_content_width = 680;

	load_theme_textdomain( 'classic-coffee-shop', get_template_directory() . '/languages' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'classic-coffee-shop' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );
	
	add_editor_style( 'editor-style.css' );

	global $pagenow;

    if ( is_admin() && 'themes.php' === $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
        add_action('admin_notices', 'classic_coffee_shop_deprecated_hook_admin_notice');
    }
}
endif; // classic_coffee_shop_setup
add_action( 'after_setup_theme', 'classic_coffee_shop_setup' );

function classic_coffee_shop_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a>";

        if (is_category() || is_single()) {
            the_category(' , ');
            if (is_single()) {
                echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function classic_coffee_shop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'classic-coffee-shop' ),
		'description'   => __( 'Appears on blog page sidebar', 'classic-coffee-shop' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'classic-coffee-shop' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'classic-coffee-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'classic-coffee-shop' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'classic-coffee-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'classic-coffee-shop' ),
		'description'   => __( 'Appears on shop page', 'classic-coffee-shop' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
        'name'          => __('Single Product Sidebar', 'classic-coffee-shop'),
        'description'   => __('Sidebar for single product pages', 'classic-coffee-shop'),
		'id'            => 'woocommerce-single-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
	
}
add_action( 'widgets_init', 'classic_coffee_shop_widgets_init' );

// Change number of products per row to 3
add_filter('loop_shop_columns', 'classic_coffee_shop_loop_columns');
if (!function_exists('classic_coffee_shop_loop_columns')) {
    function classic_coffee_shop_loop_columns() {
        $colm = get_theme_mod('classic_coffee_shop_products_per_row', 3); // Default to 3 if not set
        return $colm;
    }
}

// Use the customizer setting to set the number of products per page
function classic_coffee_shop_products_per_page($cols) {
    $cols = get_theme_mod('classic_coffee_shop_products_per_page', 9); // Default to 9 if not set
    return $cols;
}
add_filter('loop_shop_per_page', 'classic_coffee_shop_products_per_page', 9);

function classic_coffee_shop_scripts() {
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'classic-coffee-shop-basic-style', get_stylesheet_uri() );
	wp_style_add_data('classic-coffee-shop-basic-style', 'rtl', 'replace');
	wp_enqueue_style( 'classic-coffee-shop-responsive', esc_url(get_template_directory_uri())."/css/responsive.css" );
	wp_enqueue_style( 'classic-coffee-shop-default', esc_url(get_template_directory_uri())."/css/default.css" );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'classic-coffee-shop-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );

	wp_add_inline_style( 'classic-coffee-shop-basic-style',$classic_coffee_shop_color_scheme_css );
	wp_add_inline_style( 'classic-coffee-shop-default',$classic_coffee_shop_color_scheme_css );

	// Font family
	$classic_coffee_shop_headings_font = esc_html(get_theme_mod('classic_coffee_shop_headings_fonts'));
	$classic_coffee_shop_body_font = esc_html(get_theme_mod('classic_coffee_shop_body_fonts'));

	// Enqueue heading font
	if ($classic_coffee_shop_headings_font) {
	    wp_enqueue_style('classic-coffee-shop-headings-fonts', 'https://fonts.googleapis.com/css?family=' . $classic_coffee_shop_headings_font);
	} else {
	    wp_enqueue_style('merienda-one', 'https://fonts.googleapis.com/css?family=Merienda+One');
	}

	// Enqueue body font
	if ($classic_coffee_shop_body_font) {
	    wp_enqueue_style('poppins', 'https://fonts.googleapis.com/css?family=' . $classic_coffee_shop_body_font);
	} else {
	    wp_enqueue_style('classic-coffee-shop-source-body', 'https://fonts.googleapis.com/css?family=Poppins:0,100,200,300,400,500,600,700,800,900;1,100,200,300,400,500,600,700,800,900');
	}

}
add_action( 'wp_enqueue_scripts', 'classic_coffee_shop_scripts' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load TGM.
 */
require get_template_directory() . '/inc/tgm/tgm.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';


// Include the PHP file
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';



if ( ! function_exists( 'classic_coffee_shop_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */

function classic_coffee_shop_setup_theme() {
	if ( ! defined( 'CLASSIC_COFFEE_SHOP_PRO_NAME' ) ) {
		define( 'CLASSIC_COFFEE_SHOP_PRO_NAME', __( 'About classic coffee shop', 'classic-coffee-shop' ));
	}
	
	if ( ! defined( 'CLASSIC_COFFEE_SHOP_THEME_PAGE' ) ) {
	define('CLASSIC_COFFEE_SHOP_THEME_PAGE',__('https://www.theclassictemplates.com/collections/best-wordpress-templates','classic-coffee-shop'));
	}
	if ( ! defined( 'CLASSIC_COFFEE_SHOP_SUPPORT' ) ) {
	define('CLASSIC_COFFEE_SHOP_SUPPORT',__('https://wordpress.org/support/theme/classic-coffee-shop','classic-coffee-shop'));
	}
	if ( ! defined( 'CLASSIC_COFFEE_SHOP_REVIEW' ) ) {
	define('CLASSIC_COFFEE_SHOP_REVIEW',__('https://wordpress.org/support/theme/classic-coffee-shop/reviews/#new-post','classic-coffee-shop'));
	}
	if ( ! defined( 'CLASSIC_COFFEE_SHOP_PRO_DEMO' ) ) {
	define('CLASSIC_COFFEE_SHOP_PRO_DEMO',__('https://live.theclassictemplates.com/demo/classic-coffee-shop','classic-coffee-shop'));
	}
	if ( ! defined( 'CLASSIC_COFFEE_SHOP_PREMIUM_PAGE' ) ) {
	define('CLASSIC_COFFEE_SHOP_PREMIUM_PAGE',__('https://www.theclassictemplates.com/products/cafe-wordpress-theme','classic-coffee-shop'));
	}
	if ( ! defined( 'CLASSIC_COFFEE_SHOP_THEME_DOCUMENTATION' ) ) {
	define('CLASSIC_COFFEE_SHOP_THEME_DOCUMENTATION',__('https://live.theclassictemplates.com/demo/docs/classic-coffee-shop-free/','classic-coffee-shop'));
	}
	// Footer Link
	define('CLASSIC_COFFEE_SHOP_FOOTER_LINK',__('https://www.theclassictemplates.com/products/free-coffee-shop-wordpress-theme','classic-coffee-shop'));
	
}
add_action( 'after_setup_theme', 'classic_coffee_shop_setup_theme' );


/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'footer-1' => array(
				'categories',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'meta',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));

/*radio button sanitization*/
function classic_coffee_shop_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

if ( ! function_exists( 'classic_coffee_shop_sanitize_integer' ) ) {
	function classic_coffee_shop_sanitize_integer( $input ) {
		return (int) $input;
	}
}

function classic_coffee_shop_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		if( has_custom_logo() ){
			the_custom_logo();
		}else{
			echo "<a href='".esc_url( home_url() )."' rel='home'><img src='".esc_url(get_template_directory_uri())."/images/Logo.png' alt='" . esc_attr__("Classic Coffee Shop logo", 'classic-coffee-shop') . "'/></a>";
		}
	}
}
endif;

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );

/* Activation Notice */
function classic_coffee_shop_deprecated_hook_admin_notice() {
    $classic_coffee_shop_theme = wp_get_theme();
    $classic_coffee_shop_dismissed = get_user_meta( get_current_user_id(), 'classic_coffee_shop_dismissable_notice', true );
    if ( !$classic_coffee_shop_dismissed) { ?>
        <div class="getstrat updated notice notice-success is-dismissible notice-get-started-class">
            <div class="admin-image">
                <img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
            </div>
            <div class="admin-content" >
                <h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'classic-coffee-shop' ), esc_html($classic_coffee_shop_theme->get( 'Name' )), esc_html($classic_coffee_shop_theme->get( 'Version' ))); ?>
                </h1>
                <p><?php _e('Get Started With Theme By Clicking On Getting Started.', 'classic-coffee-shop'); ?></p>
                <div style="display: grid;">
                    <a class="admin-notice-btn button button-hero upgrade-pro" target="_blank" href="<?php echo esc_url( CLASSIC_COFFEE_SHOP_PREMIUM_PAGE ); ?>"><?php esc_html_e('Upgrade Pro', 'classic-coffee-shop') ?><i class="dashicons dashicons-cart"></i></a>
                    <a class="admin-notice-btn button button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=classic-coffee-shop' )); ?>"><?php esc_html_e( 'Get started', 'classic-coffee-shop' ) ?><i class="dashicons dashicons-backup"></i></a>
                    <a class="admin-notice-btn button button-hero" target="_blank" href="<?php echo esc_url( CLASSIC_COFFEE_SHOP_THEME_DOCUMENTATION ); ?>"><?php esc_html_e('Free Doc', 'classic-coffee-shop') ?><i class="dashicons dashicons-visibility"></i></a>
                    <a  class="admin-notice-btn button button-hero" target="_blank" href="<?php echo esc_url( CLASSIC_COFFEE_SHOP_PRO_DEMO ); ?>"><?php esc_html_e('View Demo', 'classic-coffee-shop') ?><i class="dashicons dashicons-awards"></i></a>
                </div>
            </div>
        </div>
    <?php }
}