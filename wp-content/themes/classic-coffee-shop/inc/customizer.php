<?php
/**
 * Classic Coffee Shop Theme Customizer
 *
 * @package Classic Coffee Shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classic_coffee_shop_customize_register( $wp_customize ) {

	function classic_coffee_shop_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function classic_coffee_shop_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	wp_enqueue_style('classic-coffee-shop-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

    function classic_coffee_shop_sanitize_select( $input, $setting ){
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);
        //get the list of possible select options
        $choices = $setting->manager->get_control( $setting->id )->choices;
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//Logo
    $wp_customize->add_setting('classic_coffee_shop_logo_width',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'classic_coffee_shop_sanitize_integer'
	));
	$wp_customize->add_control(new Classic_Coffee_Shop_Slider_Custom_Control( $wp_customize, 'classic_coffee_shop_logo_width',array(
		'label'	=> esc_html__('Logo Width','classic-coffee-shop'),
		'section'=> 'title_tagline',
		'settings'=>'classic_coffee_shop_logo_width',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting('classic_coffee_shop_title_enable',array(
		'default' => false,
		'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_coffee_shop_title_enable', array(
	   'settings' => 'classic_coffee_shop_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','classic-coffee-shop'),
	   'type'      => 'checkbox'
	));

	// site title color
	$wp_customize->add_setting('classic_coffee_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_sitetitle_color', array(
	   'settings' => 'classic_coffee_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_coffee_shop_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_coffee_shop_tagline_enable', array(
	   'settings' => 'classic_coffee_shop_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','classic-coffee-shop'),
	   'type'      => 'checkbox'
	));

	// site tagline color
	$wp_customize->add_setting('classic_coffee_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_sitetagline_color', array(
	   'settings' => 'classic_coffee_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// woocommerce section
	$wp_customize->add_section('classic_coffee_shop_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'classic-coffee-shop'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('classic_coffee_shop_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_coffee_shop_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('classic_coffee_shop_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __(' Check To Enable Shop page sidebar','classic-coffee-shop'),
		'section' => 'classic_coffee_shop_woocommerce_page_settings',
	 ));

    // shop page sidebar alignment
    $wp_customize->add_setting('classic_coffee_shop_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_coffee_shop_sanitize_choices',
	));
	$wp_customize->add_control('classic_coffee_shop_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'classic-coffee-shop'),
		'section'        => 'classic_coffee_shop_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-coffee-shop'),
			'Right Sidebar' => __('Right Sidebar', 'classic-coffee-shop'),
		),
	));	 

	$wp_customize->add_setting('classic_coffee_shop_wooproducts_nav',array(
		'default' => 'Yes',
		'sanitize_callback'	=> 'classic_coffee_shop_sanitize_choices'
	));
	$wp_customize->add_control('classic_coffee_shop_wooproducts_nav',array(
		'type' => 'select',
		'label' => __('Shop Page Products Navigation','classic-coffee-shop'),
		'choices' => array(
			 'Yes' => __('Yes','classic-coffee-shop'),
			 'No' => __('No','classic-coffee-shop'),
		 ),
		'section' => 'classic_coffee_shop_woocommerce_page_settings',
	));

	$wp_customize->add_setting( 'classic_coffee_shop_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_coffee_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('classic_coffee_shop_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Check To Enable Single Product Page Sidebar','classic-coffee-shop'),
		'section' => 'classic_coffee_shop_woocommerce_page_settings'
    ));

	// single product page sidebar alignment
    $wp_customize->add_setting('classic_coffee_shop_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_coffee_shop_sanitize_choices',
	));
	$wp_customize->add_control('classic_coffee_shop_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page Sidebar', 'classic-coffee-shop'),
		'section'        => 'classic_coffee_shop_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-coffee-shop'),
			'Right Sidebar' => __('Right Sidebar', 'classic-coffee-shop'),
		),
	));	

	$wp_customize->add_setting('classic_coffee_shop_related_product_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_coffee_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_coffee_shop_related_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Check To Enable Related product','classic-coffee-shop'),
		'section' => 'classic_coffee_shop_woocommerce_page_settings',
	));	

	$wp_customize->add_setting( 'classic_coffee_shop_woo_product_img_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_coffee_shop_sanitize_integer'
    ) );
    $wp_customize->add_control(new Classic_Coffee_Shop_Slider_Custom_Control( $wp_customize, 'classic_coffee_shop_woo_product_img_border_radius',array(
		'label'	=> esc_html__('Woo Product Img Border Radius','classic-coffee-shop'),
		'section'=> 'classic_coffee_shop_woocommerce_page_settings',
		'settings'=>'classic_coffee_shop_woo_product_img_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

    // Add a setting for number of products per row
    $wp_customize->add_setting('classic_coffee_shop_products_per_row', array(
	   'default'   => '3',
	   'transport' => 'refresh',
	   'sanitize_callback' => 'classic_coffee_shop_sanitize_integer'
    ));
    $wp_customize->add_control('classic_coffee_shop_products_per_row', array(
	   'label'    => __('Woo Products Per Row', 'classic-coffee-shop'),
	   'section'  => 'classic_coffee_shop_woocommerce_page_settings',
	   'settings' => 'classic_coffee_shop_products_per_row',
	   'type'     => 'select',
	   'choices'  => array(
		  '2' => '2',
		  '3' => '3',
		  '4' => '4',
	   ),
   ));

   // Add a setting for the number of products per page
   $wp_customize->add_setting('classic_coffee_shop_products_per_page', array(
	  'default'   => '9',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'classic_coffee_shop_sanitize_integer'
   ));
   $wp_customize->add_control('classic_coffee_shop_products_per_page', array(
	  'label'    => __('Woo Products Per Page', 'classic-coffee-shop'),
	  'section'  => 'classic_coffee_shop_woocommerce_page_settings',
	  'settings' => 'classic_coffee_shop_products_per_page',
	  'type'     => 'number',
	  'input_attrs' => array(
		 'min'  => 1,
		 'step' => 1,
	 ),
   ));

    $wp_customize->add_setting('classic_coffee_shop_product_sale_position',array(
        'default' => 'Left',
        'sanitize_callback' => 'classic_coffee_shop_sanitize_choices'
	));
	$wp_customize->add_control('classic_coffee_shop_product_sale_position',array(
        'type' => 'radio',
        'label' => __('Product Sale Position','classic-coffee-shop'),
        'section' => 'classic_coffee_shop_woocommerce_page_settings',
        'choices' => array(
            'Left' => __('Left','classic-coffee-shop'),
            'Right' => __('Right','classic-coffee-shop'),
        ),
	) );     

	//Theme Options
	$wp_customize->add_panel( 'classic_coffee_shop_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'classic-coffee-shop' ),
	) );

	// Header Section
	$wp_customize->add_section('classic_coffee_shop_general_section', array(
        'title' => __('Manage Site Layout Section', 'classic-coffee-shop'),
		'description' => __('<p class="sec-title">Manage General Section</p>','classic-coffee-shop'),
        'priority' => null,
		'panel' => 'classic_coffee_shop_panel_area',
 	));

	$wp_customize->add_setting('classic_coffee_shop_preloader',array(
		'default' => false,
		'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_coffee_shop_preloader', array(
	   'section'   => 'classic_coffee_shop_general_section',
	   'label'	=> __('Check to show preloader','classic-coffee-shop'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_coffee_shop_preloader_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_coffee_shop_preloader_bg_image',array(
        'section' => 'classic_coffee_shop_general_section',
		'label' => __('Preloader Background Image','classic-coffee-shop'),
	)));

	$wp_customize->add_setting( 'classic_coffee_shop_theme_page_breadcrumb',array(
		'default' => false,
        'sanitize_callback'	=> 'classic_coffee_shop_sanitize_checkbox',
	) );
	 $wp_customize->add_control('classic_coffee_shop_theme_page_breadcrumb',array(
       'section' => 'classic_coffee_shop_general_section',
	   'label' => __( 'Check To Enable Theme Page Breadcrumb','classic-coffee-shop' ),
	   'type' => 'checkbox'
   ));	

    // Add Settings and Controls for Page Layout
    $wp_customize->add_setting('classic_coffee_shop_sidebar_page_layout',array(
	  'default' => 'full',
	  'sanitize_callback' => 'classic_coffee_shop_sanitize_choices'
	));
	$wp_customize->add_control('classic_coffee_shop_sidebar_page_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Page Sidebar Position', 'classic-coffee-shop'),
		'section' => 'classic_coffee_shop_general_section',
		'choices' => array(
			'left' => __('Left','classic-coffee-shop'),
			'right' => __('Right','classic-coffee-shop'),
			'full' => __('No Sidebar','classic-coffee-shop')
	),
	) );	

	$wp_customize->add_setting( 'classic_coffee_shop_layout_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_layout_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			 <a target='_blank' href='". esc_url(CLASSIC_COFFEE_SHOP_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_coffee_shop_general_section'
	));	

	//Global Color
	$wp_customize->add_section('classic_coffee_shop_global_color', array(
		'title'    => __('Manage Global Color Section', 'classic-coffee-shop'),
		'panel'    => 'classic_coffee_shop_panel_area',
	));

	$wp_customize->add_setting('classic_coffee_shop_first_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_coffee_shop_first_color', array(
		'label'    => __('Theme Color', 'classic-coffee-shop'),
		'section'  => 'classic_coffee_shop_global_color',
		'settings' => 'classic_coffee_shop_first_color',
	)));	

	$wp_customize->add_setting('classic_coffee_shop_second_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_coffee_shop_second_color', array(
		'label'    => __('Theme Color', 'classic-coffee-shop'),
		'section'  => 'classic_coffee_shop_global_color',
		'settings' => 'classic_coffee_shop_second_color',
	)));		

	// Header Section
	$wp_customize->add_section('classic_coffee_shop_links_section', array(
        'title' => __('Manage Header Section', 'classic-coffee-shop'),
		'description' => __('<p class="sec-title">Manage Header Section</p>','classic-coffee-shop'),
        'priority' => null,
		'panel' => 'classic_coffee_shop_panel_area',
 	));

 	$wp_customize->add_setting('classic_coffee_shop_social_media',array(
		'default' => true,
		'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_coffee_shop_social_media', array(
	   'section'   => 'classic_coffee_shop_links_section',
	   'label'	=> __('Check to show Social icons','classic-coffee-shop'),
	   'type'      => 'checkbox'
 	));

 	$wp_customize->add_setting('classic_coffee_shop_fb_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_shop_fb_link', array(
	   'settings' => 'classic_coffee_shop_fb_link',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Facebook Link', 'classic-coffee-shop'),
	   'type'      => 'url'
	));

	// fackbook icon color
	$wp_customize->add_setting('classic_coffee_fb_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_fb_color', array(
	   'settings' => 'classic_coffee_fb_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Facebook Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_coffee_shop_insta_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_shop_insta_link', array(
	   'settings' => 'classic_coffee_shop_insta_link',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Instagram Link', 'classic-coffee-shop'),
	   'type'      => 'url'
	));

	// Instagram icon color
	$wp_customize->add_setting('classic_coffee_instagram_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_instagram_color', array(
	   'settings' => 'classic_coffee_instagram_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Instagram Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_coffee_shop_twitt_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_shop_twitt_link', array(
	   'settings' => 'classic_coffee_shop_twitt_link',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Twitter Link', 'classic-coffee-shop'),
	   'type'      => 'url'
	));

	// Twitter icon color
	$wp_customize->add_setting('classic_coffee_twitter_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_twitter_color', array(
	   'settings' => 'classic_coffee_twitter_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Twitter Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_coffee_shop_linked_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_shop_linked_link', array(
	   'settings' => 'classic_coffee_shop_linked_link',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Linkdin Link', 'classic-coffee-shop'),
	   'type'      => 'url'
	));

	// Linkdin icon color
	$wp_customize->add_setting('classic_coffee_linkdin_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_linkdin_color', array(
	   'settings' => 'classic_coffee_linkdin_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Linkdin Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_coffee_shop_youtube_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_shop_youtube_link', array(
	   'settings' => 'classic_coffee_shop_youtube_link',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Youtube Link', 'classic-coffee-shop'),
	   'type'      => 'url'
	));

	// youtube icon color
	$wp_customize->add_setting('classic_coffee_youtube_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_youtube_color', array(
	   'settings' => 'classic_coffee_youtube_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Youtube Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// header bg color
	$wp_customize->add_setting('classic_coffee_bg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_bg_color', array(
	   'settings' => 'classic_coffee_bg_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('BG Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// header border color
	$wp_customize->add_setting('classic_coffee_headerborder_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_headerborder_color', array(
	   'settings' => 'classic_coffee_headerborder_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Border Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// header menu color
	$wp_customize->add_setting('classic_coffee_headermenu_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_headermenu_color', array(
	   'settings' => 'classic_coffee_headermenu_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Menu Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// header menuhover color
	$wp_customize->add_setting('classic_coffee_headermenuhover_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_headermenuhover_color', array(
	   'settings' => 'classic_coffee_headermenuhover_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Menu Hover Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// header submenu color
	$wp_customize->add_setting('classic_coffee_headersubmenu_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_headersubmenu_color', array(
	   'settings' => 'classic_coffee_headersubmenu_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('SubMenu Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// header submenuhover color
	$wp_customize->add_setting('classic_coffee_headersubmenuhover_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_headersubmenuhover_color', array(
	   'settings' => 'classic_coffee_headersubmenuhover_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('SubMenu Hover Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// header submenbg color
	$wp_customize->add_setting('classic_coffee_headersubmenbg_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_headersubmenbg_color', array(
	   'settings' => 'classic_coffee_headersubmenbg_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('SubMenu BG Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// icon hover color
	$wp_customize->add_setting('classic_coffee_headericonhvr_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_headericonhvr_color', array(
	   'settings' => 'classic_coffee_headericonhvr_color',
	   'section'   => 'classic_coffee_shop_links_section',
	   'label' => __('Icon Hover Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting( 'classic_coffee_shop_header_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_header_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			 <a target='_blank' href='". esc_url(CLASSIC_COFFEE_SHOP_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_coffee_shop_links_section'
	));	

	// Home Category Dropdown Section
	$wp_customize->add_section('classic_coffee_shop_one_cols_section',array(
		'title'	=> __('Manage Slider Section','classic-coffee-shop'),
		'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (1200 x 450).','classic-coffee-shop'),
		'priority'	=> null,
		'panel' => 'classic_coffee_shop_panel_area'
	));

	$wp_customize->add_setting('classic_coffee_shop_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_shop_hide_categorysec', array(
	   'settings' => 'classic_coffee_shop_hide_categorysec',
	   'section'   => 'classic_coffee_shop_one_cols_section',
	   'label'     => __('Check To Enable This Section','classic-coffee-shop'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting( 'classic_coffee_shop_slidersection', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Classic_Coffee_Shop_Category_Dropdown_Custom_Control( $wp_customize, 'classic_coffee_shop_slidersection', array(
		'section' => 'classic_coffee_shop_one_cols_section',
		'label' => __('Select the post category to show slider', 'classic-coffee-shop'),
		'settings'   => 'classic_coffee_shop_slidersection',
	) ) );

	$wp_customize->add_setting('classic_coffee_shop_button_text',array(
		'default' => 'SHOP HERE',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_shop_button_text', array(
	   'settings' => 'classic_coffee_shop_button_text',
	   'section'   => 'classic_coffee_shop_one_cols_section',
	   'label' => __('Add Button Text', 'classic-coffee-shop'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_coffee_shop_button_link_slider',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('classic_coffee_shop_button_link_slider',array(
        'label' => esc_html__('Add Button Link','classic-coffee-shop'),
        'section'=> 'classic_coffee_shop_one_cols_section',
        'type'=> 'url'
    ));

    //Slider height
    $wp_customize->add_setting('classic_coffee_shop_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('classic_coffee_shop_slider_img_height',array(
        'label' => __('Slider Image Height','classic-coffee-shop'),
        'description'   => __('Add the slider image height here (eg. 600px)','classic-coffee-shop'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'classic-coffee-shop' ),
        ),
        'section'=> 'classic_coffee_shop_one_cols_section',
        'type'=> 'text'
    ));

	// slider Title color
	$wp_customize->add_setting('classic_coffee_slider_title_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_slider_title_color', array(
	   'settings' => 'classic_coffee_slider_title_color',
	   'section'   => 'classic_coffee_shop_one_cols_section',
	   'label' => __('Title Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// slider description color
	$wp_customize->add_setting('classic_coffee_slider_description_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_slider_description_color', array(
	   'settings' => 'classic_coffee_slider_description_color',
	   'section'   => 'classic_coffee_shop_one_cols_section',
	   'label' => __('Description Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// slider buttonborder color
	$wp_customize->add_setting('classic_coffee_slider_buttonborder_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_slider_buttonborder_color', array(
	   'settings' => 'classic_coffee_slider_buttonborder_color',
	   'section'   => 'classic_coffee_shop_one_cols_section',
	   'label' => __('Button Border Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// slider buttontext color
	$wp_customize->add_setting('classic_coffee_slider_buttontext_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_slider_buttontext_color', array(
	   'settings' => 'classic_coffee_slider_buttontext_color',
	   'section'   => 'classic_coffee_shop_one_cols_section',
	   'label' => __('Button Text Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// slider buttonhover color
	$wp_customize->add_setting('classic_coffee_slider_buttonhover_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_slider_buttonhover_color', array(
	   'settings' => 'classic_coffee_slider_buttonhover_color',
	   'section'   => 'classic_coffee_shop_one_cols_section',
	   'label' => __('Button Hover Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// slider buttontexthover color
	$wp_customize->add_setting('classic_coffee_slider_buttontexthover_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_slider_buttontexthover_color', array(
	   'settings' => 'classic_coffee_slider_buttontexthover_color',
	   'section'   => 'classic_coffee_shop_one_cols_section',
	   'label' => __('Button Text Hover Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// slider opacity color
	$wp_customize->add_setting('classic_coffee_slider_opacity_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_slider_opacity_color', array(
	   'settings' => 'classic_coffee_slider_opacity_color',
	   'section'   => 'classic_coffee_shop_one_cols_section',
	   'label' => __('Opacity Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// slider arrow color
	$wp_customize->add_setting('classic_coffee_slider_arrow_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_slider_arrow_color', array(
	   'settings' => 'classic_coffee_slider_arrow_color',
	   'section'   => 'classic_coffee_shop_one_cols_section',
	   'label' => __('Arrow Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting( 'classic_coffee_shop_slider_settings_upgraded_features',array(
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_slider_settings_upgraded_features', array(
	    'type'=> 'hidden',
	    'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
	        <a target='_blank' href='". esc_url(CLASSIC_COFFEE_SHOP_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
	    'section' => 'classic_coffee_shop_one_cols_section'
	));

	// Hot Products Category Section
	$wp_customize->add_section('classic_coffee_shop_two_cols_section',array(
		'title'	=> __('Manage Products Category Section','classic-coffee-shop'),
		'description' => __('<p class="sec-title">Manage Products Category Section</p>','classic-coffee-shop'),
		'priority'	=> null,
		'panel' => 'classic_coffee_shop_panel_area'
	));

	$wp_customize->add_setting('classic_coffee_shop_hidcatpro',array(
		'default' => true,
		'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_shop_hidcatpro', array(
	   'settings' => 'classic_coffee_shop_hidcatpro',
	   'section'   => 'classic_coffee_shop_two_cols_section',
	   'label'     => __('Check To Enable This Section','classic-coffee-shop'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('classic_coffee_shop_product_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_shop_product_title', array(
	   'settings' => 'classic_coffee_shop_product_title',
	   'section'   => 'classic_coffee_shop_two_cols_section',
	   'label' => __('Add Section Title', 'classic-coffee-shop'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_coffee_shop_product_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_shop_product_text', array(
	   'settings' => 'classic_coffee_shop_product_text',
	   'section'   => 'classic_coffee_shop_two_cols_section',
	   'label' => __('Add Section Text', 'classic-coffee-shop'),
	   'type'      => 'text'
	));

	$args = array(
       	'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
	$categories = get_categories($args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($m==0){
			$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('classic_coffee_shop_hot_products_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'classic_coffee_shop_sanitize_select',
	));
	$wp_customize->add_control('classic_coffee_shop_hot_products_cat',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display products ','classic-coffee-shop'),
		'section' => 'classic_coffee_shop_two_cols_section',
	));

	// product heading color
	$wp_customize->add_setting('classic_coffee_product_heading_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_product_heading_color', array(
	   'settings' => 'classic_coffee_product_heading_color',
	   'section'   => 'classic_coffee_shop_two_cols_section',
	   'label' => __('Heading Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// product subheading color
	$wp_customize->add_setting('classic_coffee_product_subheading_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_product_subheading_color', array(
	   'settings' => 'classic_coffee_product_subheading_color',
	   'section'   => 'classic_coffee_shop_two_cols_section',
	   'label' => __('Sub Heading Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// product title color
	$wp_customize->add_setting('classic_coffee_product_title_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_product_title_color', array(
	   'settings' => 'classic_coffee_product_title_color',
	   'section'   => 'classic_coffee_shop_two_cols_section',
	   'label' => __('Product Title Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// product border color
	$wp_customize->add_setting('classic_coffee_product_border_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_product_border_color', array(
	   'settings' => 'classic_coffee_product_border_color',
	   'section'   => 'classic_coffee_shop_two_cols_section',
	   'label' => __('Product Border Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// product opacity color
	$wp_customize->add_setting('classic_coffee_product_opacity_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_product_opacity_color', array(
	   'settings' => 'classic_coffee_product_opacity_color',
	   'section'   => 'classic_coffee_shop_two_cols_section',
	   'label' => __('Product Opacity Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting( 'classic_coffee_shop_secondsec_settings_upgraded_features',array(
	  	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_secondsec_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_COFFEE_SHOP_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_coffee_shop_two_cols_section'
	));

	//Blog post
	$wp_customize->add_section('classic_coffee_shop_blog_post_settings',array(
        'title' => __('Manage Post Section', 'classic-coffee-shop'),
        'priority' => null,
        'panel' => 'classic_coffee_shop_panel_area'
    ) );

	$wp_customize->add_setting('classic_coffee_shop_metafields_date', array(
	    'default' => true,
	    'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_coffee_shop_metafields_date', array(
	    'settings' => 'classic_coffee_shop_metafields_date', 
	    'section'   => 'classic_coffee_shop_blog_post_settings',
	    'label'     => __('Check to Enable Date', 'classic-coffee-shop'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('classic_coffee_shop_metafields_comments', array(
		'default' => true,
		'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
	));	
	$wp_customize->add_control('classic_coffee_shop_metafields_comments', array(
		'settings' => 'classic_coffee_shop_metafields_comments',
		'section'  => 'classic_coffee_shop_blog_post_settings',
		'label'    => __('Check to Enable Comments', 'classic-coffee-shop'),
		'type'     => 'checkbox',
	));

	$wp_customize->add_setting('classic_coffee_shop_metafields_author', array(
		'default' => true,
		'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_coffee_shop_metafields_author', array(
		'settings' => 'classic_coffee_shop_metafields_author',
		'section'  => 'classic_coffee_shop_blog_post_settings',
		'label'    => __('Check to Enable Author', 'classic-coffee-shop'),
		'type'     => 'checkbox',
	));		

	$wp_customize->add_setting('classic_coffee_shop_metafields_time', array(
		'default' => true,
		'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_coffee_shop_metafields_time', array(
		'settings' => 'classic_coffee_shop_metafields_time',
		'section'  => 'classic_coffee_shop_blog_post_settings',
		'label'    => __('Check to Enable Time', 'classic-coffee-shop'),
		'type'     => 'checkbox',
	));	

	$wp_customize->add_setting('classic_coffee_shop_metabox_seperator',array(
		'default' => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_metabox_seperator',array(
		'type' => 'text',
		'label' => __('Metabox Seperator','classic-coffee-shop'),
		'description' => __('Ex: "/", "|", "-", ...','classic-coffee-shop'),
		'section' => 'classic_coffee_shop_blog_post_settings'
	)); 

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('classic_coffee_shop_sidebar_post_layout',array(
		'default' => 'right',
		'sanitize_callback' => 'classic_coffee_shop_sanitize_choices'
	));
	$wp_customize->add_control('classic_coffee_shop_sidebar_post_layout',array(
		'type' => 'radio',
		'label'     => __('Theme Post Sidebar Position', 'classic-coffee-shop'),
		'description'   => __('This option work for blog page, archive page and search page.', 'classic-coffee-shop'),
		'section' => 'classic_coffee_shop_blog_post_settings',
		'choices' => array(
			'left' => __('Left','classic-coffee-shop'),
			'right' => __('Right','classic-coffee-shop'),
			'three-column' => __('Three Columns','classic-coffee-shop'),
			'four-column' => __('Four Columns','classic-coffee-shop'),
			'grid' => __('Grid Layout','classic-coffee-shop'),
			'full' => __('No Sidebar','classic-coffee-shop')
     ),
	) );

	$wp_customize->add_setting('classic_coffee_shop_blog_post_description_option',array(
    	'default'   => 'Full Content', 
        'sanitize_callback' => 'classic_coffee_shop_sanitize_choices'
	));
	$wp_customize->add_control('classic_coffee_shop_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','classic-coffee-shop'),
        'section' => 'classic_coffee_shop_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','classic-coffee-shop'),
            'Excerpt Content' => __('Excerpt Content','classic-coffee-shop'),
            'Full Content' => __('Full Content','classic-coffee-shop'),
        ),
	) );

	$wp_customize->add_setting('classic_coffee_shop_blog_post_thumb',array(
        'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('classic_coffee_shop_blog_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Show / Hide Blog Post Thumbnail', 'classic-coffee-shop'),
        'section'     => 'classic_coffee_shop_blog_post_settings',
    ));

    $wp_customize->add_setting( 'classic_coffee_shop_blog_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_coffee_shop_sanitize_integer'
    ) );
    $wp_customize->add_control(new Classic_Coffee_Shop_Slider_Custom_Control( $wp_customize, 'classic_coffee_shop_blog_post_page_image_box_shadow',array(
		'label'	=> esc_html__('Blog Page Image Box Shadow','classic-coffee-shop'),
		'section'=> 'classic_coffee_shop_blog_post_settings',
		'settings'=>'classic_coffee_shop_blog_post_page_image_box_shadow',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting( 'classic_coffee_shop_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			 <a target='_blank' href='". esc_url(CLASSIC_COFFEE_SHOP_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_coffee_shop_blog_post_settings'
	));	

	//Single Post Settings
	$wp_customize->add_section('classic_coffee_shop_single_post_settings',array(
		'title' => __('Manage Single Post Section', 'classic-coffee-shop'),
		'priority' => null,
		'panel' => 'classic_coffee_shop_panel_area'
	));

	$wp_customize->add_setting( 'classic_coffee_shop_single_page_breadcrumb',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_coffee_shop_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_coffee_shop_single_page_breadcrumb',array(
		'section' => 'classic_coffee_shop_single_post_settings',
		'label' => __( 'Check To Enable Breadcrumb','classic-coffee-shop' ),
		'type' => 'checkbox'
	));	

	$wp_customize->add_setting('classic_coffee_shop_single_post_date',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_coffee_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_coffee_shop_single_post_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date ','classic-coffee-shop'),
		'section' => 'classic_coffee_shop_single_post_settings'
	));	

	$wp_customize->add_setting('classic_coffee_shop_single_post_author',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_coffee_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_coffee_shop_single_post_author',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Author','classic-coffee-shop'),
		'section' => 'classic_coffee_shop_single_post_settings'
	));

	$wp_customize->add_setting('classic_coffee_shop_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_coffee_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_coffee_shop_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','classic-coffee-shop'),
		'section' => 'classic_coffee_shop_single_post_settings'
	));	

	$wp_customize->add_setting('classic_coffee_shop_single_post_time',array(
		'default' => true,
		'sanitize_callback'	=> 'classic_coffee_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('classic_coffee_shop_single_post_time',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Time','classic-coffee-shop'),
		'section' => 'classic_coffee_shop_single_post_settings'
	));	

	$wp_customize->add_setting('classic_coffee_shop_single_post_metabox_seperator',array(
		'default' => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_single_post_metabox_seperator',array(
		'type' => 'text',
		'label' => __('Metabox Seperator','classic-coffee-shop'),
		'description' => __('Ex: "/", "|", "-", ...','classic-coffee-shop'),
		'section' => 'classic_coffee_shop_single_post_settings'
	)); 

	$wp_customize->add_setting('classic_coffee_shop_sidebar_single_post_layout',array(
		'default' => 'right',
			'sanitize_callback' => 'classic_coffee_shop_sanitize_choices'
	));
	$wp_customize->add_control('classic_coffee_shop_sidebar_single_post_layout',array(
			'type' => 'radio',
		'label'     => __('Single post sidebar layout', 'classic-coffee-shop'),
			'section' => 'classic_coffee_shop_single_post_settings',
			'choices' => array(
			'left' => __('Left','classic-coffee-shop'),
			'right' => __('Right','classic-coffee-shop'),
			'full' => __('No Sidebar','classic-coffee-shop'),
		),
	));

	$wp_customize->add_setting( 'classic_coffee_shop_single_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_single_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_COFFEE_SHOP_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_coffee_shop_single_post_settings'
	));

	// 404 Page Settings
	$wp_customize->add_section('classic_coffee_shop_page_not_found', array(
		'title'	=> __('Manage 404 Page Section','classic-coffee-shop'),
		'priority'	=> null,
		'panel' => 'classic_coffee_shop_panel_area',
	));
	
	$wp_customize->add_setting('classic_coffee_shop_page_not_found_heading',array(
		'default'=> __('404 Not Found','classic-coffee-shop'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_page_not_found_heading',array(
		'label'	=> __('404 Heading','classic-coffee-shop'),
		'section'=> 'classic_coffee_shop_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('classic_coffee_shop_page_not_found_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('classic_coffee_shop_page_not_found_content',array(
		'label'	=> __('404 Text','classic-coffee-shop'),
		'input_attrs' => array(
			'placeholder' => __( 'Looks like you have taken a wrong turn.....Don\'t worry... it happens to the best of us.', 'classic-coffee-shop' ),
		),
		'section'=> 'classic_coffee_shop_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'classic_coffee_shop_page_not_found_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_page_not_found_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_COFFEE_SHOP_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_coffee_shop_page_not_found'
	));

	// Footer Section
	$wp_customize->add_section('classic_coffee_shop_footer', array(
		'title'	=> __('Manage Footer Section','classic-coffee-shop'),
		'description' => __('<p class="sec-title">Manage Footer Section</p>','classic-coffee-shop'),
		'priority'	=> 999,
		'panel' => 'classic_coffee_shop_panel_area',
	));

	$wp_customize->add_setting('classic_coffee_shop_footer_bg_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_coffee_shop_footer_bg_color', array(
        'label'    => __('Footer Background Color', 'classic-coffee-shop'),
        'section'  => 'classic_coffee_shop_footer',
    )));

	$wp_customize->add_setting('classic_coffee_shop_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_coffee_shop_footer_bg_image',array(
        'label' => __('Footer Background Image','classic-coffee-shop'),
        'section' => 'classic_coffee_shop_footer',
    )));

	$wp_customize->add_setting('classic_coffee_shop_copyright_line',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_coffee_shop_copyright_line', array(
	   'section' 	=> 'classic_coffee_shop_footer',
	   'label'	 	=> __('Copyright Line','classic-coffee-shop'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    $wp_customize->add_setting('classic_coffee_shop_copyright_link',array(
		'default' => 'https://www.theclassictemplates.com/products/free-coffee-shop-wordpress-theme',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_coffee_shop_copyright_link', array(
	   'section' 	=> 'classic_coffee_shop_footer',
	   'label'	 	=> __('Link','classic-coffee-shop'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

	// footer copyright color
	$wp_customize->add_setting('classic_coffee_footercopyright_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_footercopyright_color', array(
	   'settings' => 'classic_coffee_footercopyright_color',
	   'section'   => 'classic_coffee_shop_footer',
	   'label' => __('Footer Copyright Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// footer fb color
	$wp_customize->add_setting('classic_coffee_footerfb_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_footerfb_color', array(
	   'settings' => 'classic_coffee_footerfb_color',
	   'section'   => 'classic_coffee_shop_footer',
	   'label' => __('Facebook Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// footer twitter color
	$wp_customize->add_setting('classic_coffee_footertwitter_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_footertwitter_color', array(
	   'settings' => 'classic_coffee_footertwitter_color',
	   'section'   => 'classic_coffee_shop_footer',
	   'label' => __('Twitter Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// footer linkedin color
	$wp_customize->add_setting('classic_coffee_footerlinkedin_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_footerlinkedin_color', array(
	   'settings' => 'classic_coffee_footerlinkedin_color',
	   'section'   => 'classic_coffee_shop_footer',
	   'label' => __('Linkedin Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// footer insta color
	$wp_customize->add_setting('classic_coffee_footerinsta_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_footerinsta_color', array(
	   'settings' => 'classic_coffee_footerinsta_color',
	   'section'   => 'classic_coffee_shop_footer',
	   'label' => __('Instagram Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	// footer youtube color
	$wp_customize->add_setting('classic_coffee_footeryoutube_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_coffee_footeryoutube_color', array(
	   'settings' => 'classic_coffee_footeryoutube_color',
	   'section'   => 'classic_coffee_shop_footer',
	   'label' => __('Youtube Color', 'classic-coffee-shop'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_coffee_shop_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'classic_coffee_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'classic_coffee_shop_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'classic-coffee-shop' ),
        'section'        => 'classic_coffee_shop_footer',
        'settings'       => 'classic_coffee_shop_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('classic_coffee_shop_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'classic_coffee_shop_sanitize_choices'
    ));
    $wp_customize->add_control('classic_coffee_shop_scroll_position',array(
        'type' => 'radio',
        'section' => 'classic_coffee_shop_footer',
        'label'	 	=> __('Scroll To Top Positions','classic-coffee-shop'),
        'choices' => array(
            'Right' => __('Right','classic-coffee-shop'),
            'Center' => __('Center','classic-coffee-shop')
        ),
    ) );

	$wp_customize->add_setting('classic_coffee_shop_scroll_text',array(
		'default'	=> __('TOP','classic-coffee-shop'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('classic_coffee_shop_scroll_text',array(
		'label'	=> __('Scroll To Top Button Text','classic-coffee-shop'),
		'section'	=> 'classic_coffee_shop_footer',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'classic_coffee_shop_scroll_top_shape', array(
		'default'           => 'circle',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_coffee_shop_scroll_top_shape', array(
		'label'    => __( 'Scroll to Top Button Shape', 'classic-coffee-shop' ),
		'section'  => 'classic_coffee_shop_footer',
		'settings' => 'classic_coffee_shop_scroll_top_shape',
		'type'     => 'radio',
		'choices'  => array(
			'box'        => __( 'Box', 'classic-coffee-shop' ),
			'curved' => __( 'Curved', 'classic-coffee-shop'),
			'circle'     => __( 'Circle', 'classic-coffee-shop' ),
		),
	));

    $wp_customize->add_setting( 'classic_coffee_shop_footer_settings_upgraded_features',array(
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_coffee_shop_footer_settings_upgraded_features', array(
	    'type'=> 'hidden',
	    'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
	        <a target='_blank' href='". esc_url(CLASSIC_COFFEE_SHOP_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
	    'section' => 'classic_coffee_shop_footer'
	));

    // Google Fonts
    $wp_customize->add_section( 'classic_coffee_shop_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'classic-coffee-shop' ),
		'priority'       => 24,
	) );

	$font_choices = array(
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Abril Fatface' => 'Abril Fatface',
		'Acme' => 'Acme',
		'Anton' => 'Anton',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Architects Daughter' => 'Architects Daughter',
		'Arsenal' => 'Arsenal',
		'Alegreya' => 'Alegreya',
		'Alfa Slab One' => 'Alfa Slab One',
		'Averia Serif Libre' => 'Averia Serif Libre',
		'Bitter:400,700,400italic' => 'Bitter',
		'Bangers' => 'Bangers',
		'Boogaloo' => 'Boogaloo',
		'Bad Script' => 'Bad Script',
		'Bree Serif' => 'Bree Serif',
		'BenchNine' => 'BenchNine',
		'Cabin:400,700,400italic' => 'Cabin',
		'Cardo' => 'Cardo',
		'Courgette' => 'Courgette',
		'Cherry Swash' => 'Cherry Swash',
		'Cormorant Garamond' => 'Cormorant Garamond',
		'Crimson Text' => 'Crimson Text',
		'Cuprum' => 'Cuprum',
		'Cookie' => 'Cookie',
		'Chewy' => 'Chewy',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Droid Sans:400,700' => 'Droid Sans',
		'Days One' => 'Days One',
		'Dosis' => 'Dosis',
		'Emilys Candy:' => 'Emilys Candy',
		'Economica' => 'Economica',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Fredoka One' => 'Fredoka One',
		'Frank Ruhl Libre' => 'Frank Ruhl Libre',
		'Gloria Hallelujah' => 'Gloria Hallelujah',
		'Great Vibes' => 'Great Vibes',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Montserrat:400,700' => 'Montserrat',
		'Oxygen:400,300,700' => 'Oxygen',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Rokkitt:400' => 'Rokkitt',
		'Raleway:400,700' => 'Raleway',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
	);

	$wp_customize->add_setting( 'classic_coffee_shop_headings_fonts', array(
		'sanitize_callback' => 'classic_coffee_shop_sanitize_fonts',
	));
	$wp_customize->add_control( 'classic_coffee_shop_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'classic-coffee-shop'),
		'section' => 'classic_coffee_shop_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'classic_coffee_shop_body_fonts', array(
		'sanitize_callback' => 'classic_coffee_shop_sanitize_fonts'
	));
	$wp_customize->add_control( 'classic_coffee_shop_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'classic-coffee-shop' ),
		'section' => 'classic_coffee_shop_google_fonts_section',
		'choices' => $font_choices
	));
}
add_action( 'customize_register', 'classic_coffee_shop_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classic_coffee_shop_customize_preview_js() {
	wp_enqueue_script( 'classic_coffee_shop_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'classic_coffee_shop_customize_preview_js' );
