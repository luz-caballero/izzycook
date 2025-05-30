<?php
/*
 * @package Classic Coffee Shop
 */

function classic_coffee_shop_admin_enqueue_scripts() {
    wp_enqueue_style( 'classic-coffee-shop-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'classic_coffee_shop_admin_enqueue_scripts' );

add_action( 'admin_init', 'classic_coffee_shop_options' );

function classic_coffee_shop_options() {
    global $pagenow;

    if ( is_admin() && 'themes.php' === $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
        // Theme activated — future actions can go here, like setting theme mods or showing notices.
    }
}

function classic_coffee_shop_theme_info_menu_link() {

    $classic_coffee_shop_theme = wp_get_theme();
    add_theme_page(
        sprintf( esc_html__( 'Welcome to %1$s %2$s', 'classic-coffee-shop' ), $classic_coffee_shop_theme->get( 'Name' ), $classic_coffee_shop_theme->get( 'Version' ) ),
        esc_html__( 'Theme Info', 'classic-coffee-shop' ),'edit_theme_options','classic-coffee-shop','classic_coffee_shop_theme_info_page'
    );

    // Add "Theme Demo Import" page
    add_theme_page(
        esc_html__( 'Theme Demo Import', 'classic-coffee-shop' ),
        esc_html__( 'Theme Demo Import', 'classic-coffee-shop' ),
        'edit_theme_options',
        'classic-coffee-shop-demo',
        'classic_coffee_shop_demo_content_page'
    );

}
add_action( 'admin_menu', 'classic_coffee_shop_theme_info_menu_link' );

function classic_coffee_shop_theme_info_page() {

    $classic_coffee_shop_theme = wp_get_theme();
    ?>
<div class="wrap theme-info-wrap">
    <h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'classic-coffee-shop' ), esc_html($classic_coffee_shop_theme->get( 'Name' )), esc_html($classic_coffee_shop_theme->get( 'Version' ))); ?>
    </h1>
    <p class="theme-description">
    <?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'classic-coffee-shop' ); ?>
    </p>
    <div class="important-link">
        <p class="main-box columns-wrapper clearfix">
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Pro version of our theme', 'classic-coffee-shop' ); ?></strong></p>
                <p><?php esc_html_e( 'Are you exited for our theme? Then we will proceed for pro version of theme.', 'classic-coffee-shop' ); ?></p>
                <a class="get-premium" href="<?php echo esc_url( CLASSIC_COFFEE_SHOP_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'classic-coffee-shop' ); ?></a>
                <p><strong><?php esc_html_e( 'Check all classic features', 'classic-coffee-shop' ); ?></strong></p>
                <p><?php esc_html_e( 'Explore all the premium features.', 'classic-coffee-shop' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_COFFEE_SHOP_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'classic-coffee-shop' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Need Help?', 'classic-coffee-shop' ); ?></strong></p>
                <p><?php esc_html_e( 'Go to our support forum to help you out in case of queries and doubts regarding our theme.', 'classic-coffee-shop' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_COFFEE_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'classic-coffee-shop' ); ?></a>
                <p><strong><?php esc_html_e( 'Leave us a review', 'classic-coffee-shop' ); ?></strong></p>
                <p><?php esc_html_e( 'Are you enjoying our theme? We would love to hear your feedback.', 'classic-coffee-shop' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_COFFEE_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'classic-coffee-shop' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong><?php esc_html_e( 'Check Our Demo', 'classic-coffee-shop' ); ?></strong></p>
                <p><?php esc_html_e( 'Here, you can view a live demonstration of our premium them.', 'classic-coffee-shop' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_COFFEE_SHOP_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'classic-coffee-shop' ); ?></a>
                <p><strong><?php esc_html_e( 'Theme Documentation', 'classic-coffee-shop' ); ?></strong></p>
                <p><?php esc_html_e( 'Need more details? Please check our full documentation for detailed theme setup.', 'classic-coffee-shop' ); ?></p>
                <a href="<?php echo esc_url( CLASSIC_COFFEE_SHOP_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'classic-coffee-shop' ); ?></a>
            </div>
        </p>
    </div>
    <div id="getting-started">
        <h3><?php printf( esc_html__( 'Getting started with %s', 'classic-coffee-shop' ),
        esc_html($classic_coffee_shop_theme->get( 'Name' ))); ?></h3>
        <div class="columns-wrapper clearfix">
            <div class="column column-half clearfix">
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Description', 'classic-coffee-shop' ); ?></h4>
                    <div class="theme-description-1"><?php echo esc_html($classic_coffee_shop_theme->get( 'Description' )); ?></div>
                </div>
            </div>
            <div class="column column-half clearfix">
                <img src="<?php echo esc_url( $classic_coffee_shop_theme->get_screenshot() ); ?>" alt="<?php echo esc_attr( 'screenshot', 'classic-coffee-shop'); ?>"/>
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Options', 'classic-coffee-shop' ); ?></h4>
                    <p class="about">
                    <?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'classic-coffee-shop' ),esc_html($classic_coffee_shop_theme->get( 'Name' ))); ?></p>
                    <p>
                    <div class="themelink-1">
                        <a target="_blank" href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Customize Theme', 'classic-coffee-shop' ); ?></a>
                        <a href="<?php echo esc_url( CLASSIC_COFFEE_SHOP_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Checkout Premium', 'classic-coffee-shop' ); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="theme-author">
      <p><?php
        printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'classic-coffee-shop' ),
            esc_html($classic_coffee_shop_theme->get( 'Name' )),
            '<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'classic-coffee-shop' ) . '">classictemplate</a>',
            '<a target="_blank" href="' . esc_url( CLASSIC_COFFEE_SHOP_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'classic-coffee-shop' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'classic-coffee-shop' ) . '</a>'
        );
        ?></p>
    </div>
</div>
<?php
}

function classic_coffee_shop_demo_content_page() {

    $classic_coffee_shop_theme = wp_get_theme();
    ?>
    <div class="container">
       <div class="start-box">
          <div class="columns-wrapper m-0"> 
             <div class="column column-half clearfix">
               <div class="wrapper-info"> 
                  <img src="<?php echo esc_url( get_template_directory_uri().'/images/Logo.png' ); ?>" />
                  <h2><?php esc_html_e( 'Welcome to Classic Coffee Shop', 'classic-coffee-shop' ); ?></h2>
                  <span class="version"><?php esc_html_e( 'Version', 'classic-coffee-shop' ); ?>: <?php echo esc_html( wp_get_theme()->get( 'Version' ) ); ?></span>	
                  <p><?php esc_html_e( 'To begin, locate the demo importer button and click on it to initiate the importation of all the demo content.', 'classic-coffee-shop' ); ?></p>
                  <?php require get_parent_theme_file_path( '/inc/demo-content.php' ); ?>
               </div>
             </div>
             <div class="column column-half clearfix">
             <div class="get-screenshot">
               <img src="<?php echo esc_url( get_template_directory_uri().'/screenshot.png' ); ?>" />
             </div>   
             </div>
          </div>
       </div>
    </div>
<?php
}

?>
