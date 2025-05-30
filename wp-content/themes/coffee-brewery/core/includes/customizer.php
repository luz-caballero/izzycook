<?php

if ( class_exists("Kirki")){
	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'coffee_brewery_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'coffee-brewery' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'coffee-brewery' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'coffee_brewery_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'coffee-brewery' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'coffee-brewery' ),
			'off' => esc_html__( 'Disable', 'coffee-brewery' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'coffee_brewery_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'coffee-brewery' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'coffee-brewery' ),
			'off' => esc_html__( 'Disable', 'coffee-brewery' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'coffee_brewery_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'coffee-brewery' ),
	) );

	Kirki::add_section( 'coffee_brewery_font_style_section', array(
		'title'      => esc_html__( 'Typography Option',  'coffee-brewery' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_all_headings_typography',
		'section'     => 'coffee_brewery_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'coffee-brewery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'coffee_brewery_all_headings_typography',
		'label'       => esc_html__( 'Heading Typography',  'coffee-brewery' ),
		'description' => esc_html__( 'Select the typography options for your heading.',  'coffee-brewery' ),
		'section'     => 'coffee_brewery_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_body_content_typography',
		'section'     => 'coffee_brewery_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'coffee-brewery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'coffee_brewery_body_content_typography',
		'label'       => esc_html__( 'Content Typography',  'coffee-brewery' ),
		'description' => esc_html__( 'Select the typography options for your content.',  'coffee-brewery' ),
		'section'     => 'coffee_brewery_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

		// PANEL
	Kirki::add_panel( 'coffee_brewery_panel_id_5', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Animations', 'coffee-brewery' ),
	) );

	// ANIMATION SECTION
	Kirki::add_section( 'coffee_brewery_section_animation', array(
	    'title'          => esc_html__( 'Animations', 'coffee-brewery' ),
	    'priority'       => 2,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'coffee_brewery_animation_enabled',
		'label'       => esc_html__( 'Turn To Show Animation', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_section_animation',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'coffee-brewery' ),
			'off' => esc_html__( 'Disable', 'coffee-brewery' ),
		],
	] );

	// PANEL
	Kirki::add_panel( 'coffee_brewery_panel_id_3', array(
	    'priority'    => 10,
	    'title'       => esc_html__( '404 Settings', 'coffee-brewery' ),
	) );

	// 404 SECTION
	Kirki::add_section( 'coffee_brewery_section_404', array(
	    'title'          => esc_html__( '404 Settings', 'coffee-brewery' ),
	    'priority'       => 3,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'coffee_brewery_not_found_heading',
	    'section'     => 'coffee_brewery_section_404',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Not Found Heading', 'coffee-brewery' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'coffee_brewery_404_page_title',
		'section'  => 'coffee_brewery_section_404',
		'default'  => esc_html__('404 Not Found', 'coffee-brewery'),
		'priority' => 10,
	] );

		Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'coffee_brewery_not_found_text',
	    'section'     => 'coffee_brewery_section_404',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Not Found Content', 'coffee-brewery' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'coffee_brewery_404_page_content',
		'section'  => 'coffee_brewery_section_404',
		'default'  => esc_html__('Sorry, no posts matched your criteria.', 'coffee-brewery'),
		'priority' => 10,
	] );
	// PANEL

	Kirki::add_panel( 'coffee_brewery_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'coffee-brewery' ),
	) );

	// Additional Settings

	Kirki::add_section( 'coffee_brewery_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'coffee-brewery' ),
	    'panel'          => 'coffee_brewery_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'coffee_brewery_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_additional_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'coffee_brewery_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'coffee-brewery' ),
			'Center' => esc_html__( 'Center', 'coffee-brewery' ),
			'Right'  => esc_html__( 'Right', 'coffee-brewery' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'coffee_brewery_scroll_top_icon',
		'label'    => esc_html__( 'Select Appropriate Scroll Top Icon', 'coffee-brewery' ),
		'section'  => 'coffee_brewery_additional_settings',
		'default'  => 'dashicons dashicons-arrow-up-alt',
		'priority' => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_coffee_brewery',
		'label'       => esc_html__( 'Menus Text Transform', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_additional_settings',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'coffee-brewery' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'coffee-brewery' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'coffee-brewery' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'coffee-brewery' ),

		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'coffee_brewery_menu_zoom',
		'label'       => esc_html__( 'Menu Transition', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_additional_settings',
		'default' => 'Zoom Out',
		'placeholder' => esc_html__( 'Choose an option', 'coffee-brewery' ),
		'choices'     => [
			'Zoomout' => __('Zoom Out','coffee-brewery'),
            'Zoominn' => __('Zoom Inn','coffee-brewery'),
            
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'coffee_brewery_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'coffee_brewery_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'coffee_brewery_sticky_header',
		'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'coffee_brewery_page_layout',
		'label'       => esc_html__( 'Page Layout Setting', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_additional_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'coffee-brewery' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','coffee-brewery'),
            'Right Sidebar' => __('Right Sidebar','coffee-brewery'),
            'One Column' => __('One Column','coffee-brewery')
		],
	] );

	if ( class_exists("woocommerce")){

	// Woocommerce Settings

	Kirki::add_section( 'coffee_brewery_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'coffee-brewery' ),
		'panel'          => 'coffee_brewery_panel_id',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'coffee_brewery_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'coffee_brewery_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'coffee_brewery_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
		[
			'settings' => 'coffee_brewery_per_columns',
			'label'    => esc_html__( 'Product Per Row', 'coffee-brewery' ),
			'section'  => 'coffee_brewery_woocommerce_settings',
			'default'  => 3,
			'choices'  => [
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'coffee_brewery_product_per_page',
			'label'    => esc_html__( 'Product Per Page', 'coffee-brewery' ),
			'section'  => 'coffee_brewery_woocommerce_settings',
			'default'  => 9,
			'choices'  => [
				'min'  => 1,
				'max'  => 15,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number_per_row',
		'label'    => esc_html__( 'Related Product Per Column', 'coffee-brewery' ),
		'section'  => 'coffee_brewery_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number',
		'label'    => esc_html__( 'Related Product Per Page', 'coffee-brewery' ),
		'section'  => 'coffee_brewery_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'coffee_brewery_shop_page_layout',
		'label'       => esc_html__( 'Shop Page Layout Setting', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'coffee-brewery' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','coffee-brewery'),
            'Right Sidebar' => __('Right Sidebar','coffee-brewery')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'coffee_brewery_product_page_layout',
		'label'       => esc_html__( 'Product Page Layout Setting', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'coffee-brewery' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','coffee-brewery'),
            'Right Sidebar' => __('Right Sidebar','coffee-brewery')
		],
	] );

	new \Kirki\Field\Radio_Buttonset( [
		'settings'    => 'coffee_brewery_woocommerce_pagination_position',
		'label'       => esc_html__( 'Woocommerce Pagination Alignment', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_woocommerce_settings',
		'default'     => 'Center',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'coffee-brewery' ),
			'Center' => esc_html__( 'Center', 'coffee-brewery' ),
			'Right'  => esc_html__( 'Right', 'coffee-brewery' ),
		],
	]
	);

}

	// POST SECTION

	Kirki::add_section( 'coffee_brewery_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'coffee-brewery' ),
	    'panel'          => 'coffee_brewery_panel_id',
	    'priority'       => 160,
	) );

	new \Kirki\Field\Sortable(
	[
		'settings' => 'coffee_brewery_archive_element_sortable',
		'label'    => __( 'Archive Post Page element Reordering', 'coffee-brewery' ),
		'section'  => 'coffee_brewery_section_post',
		'default'  => [ 'option1', 'option2', 'option3' ],
		'choices'  => [
			'option1' => esc_html__( 'Post Meta', 'coffee-brewery' ),
			'option2' => esc_html__( 'Post Title', 'coffee-brewery' ),
			'option3' => esc_html__( 'Post Content', 'coffee-brewery' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'coffee_brewery_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'coffee_brewery_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'coffee_brewery_archive_sidebar_layout',
		'label'       => esc_html__( 'Archive Post Sidebar Layout Setting', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'coffee-brewery' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','coffee-brewery'),
            'Right Sidebar' => __('Right Sidebar','coffee-brewery'),
            'Three Column' => __('Three Column','coffee-brewery'),
            'Four Column' => __('Four Column','coffee-brewery'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','coffee-brewery'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','coffee-brewery'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','coffee-brewery')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'coffee_brewery_single_post_sidebar_layout',
		'label'       => esc_html__( 'Single Post Sidebar Layout Setting', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'coffee-brewery' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','coffee-brewery'),
            'Right Sidebar' => __('Right Sidebar','coffee-brewery'),
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'coffee_brewery_search_sidebar_layout',
		'label'       => esc_html__( 'Search Page Sidebar Layout Setting', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'coffee-brewery' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','coffee-brewery'),
            'Right Sidebar' => __('Right Sidebar','coffee-brewery'),
            'Three Column' => __('Three Column','coffee-brewery'),
            'Four Column' => __('Four Column','coffee-brewery'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','coffee-brewery'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','coffee-brewery'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','coffee-brewery')
		],
	] );

	// Breadcrumb
	Kirki::add_section( 'coffee_brewery_bradcrumb', array(
	    'title'          => esc_html__( 'Breadcrumb Settings', 'coffee-brewery' ),
	    'panel'          => 'coffee_brewery_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_enable_breadcrumb_heading',
		'section'     => 'coffee_brewery_bradcrumb',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Single Page Breadcrumb', 'coffee-brewery' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'coffee_brewery_breadcrumb_enable',
		'label'       => esc_html__( 'Breadcrumb Enable / Disable', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_bradcrumb',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'coffee-brewery' ),
			'off' => esc_html__( 'Disable', 'coffee-brewery' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'default'     => '/',
        'settings' => 'coffee_brewery_breadcrumb_separator' ,
        'label'    => esc_html__( 'Breadcrumb Separator',  'coffee-brewery' ),
        'section'  => 'coffee_brewery_bradcrumb',
    ] );

	// SLIDER SECTION

	Kirki::add_section( 'coffee_brewery_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'coffee-brewery' ),
        'panel'          => 'coffee_brewery_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_enable_heading_2',
		'section'     => 'coffee_brewery_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'coffee-brewery' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'coffee_brewery_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'coffee-brewery' ),
			'off' => esc_html__( 'Disable', 'coffee-brewery' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_slider_heading',
		'section'     => 'coffee_brewery_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'coffee-brewery' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'coffee_brewery_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_blog_slide_section',
		'default'     => 0,
		'description' => esc_html__( 'Enter the number of sliders you want, then publish the page and refresh the front end to display your form.', 'coffee-brewery' ),
		'choices'     => [
			'min'  => 0,
			'max'  => 3,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'coffee_brewery_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'coffee-brewery' ),
		'priority'    => 10,
		'choices'     => coffee_brewery_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Short Heading',  'coffee-brewery' ),
		'type'     => 'text',
		'settings' => 'coffee_brewery_slider_short_heading',
		'section'  => 'coffee_brewery_blog_slide_section',
    ] );

    Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Slider Bar 1 Text',  'coffee-brewery' ),
		'type'     => 'text',
		'settings' => 'coffee_brewery_slider_bar_1',
		'section'  => 'coffee_brewery_blog_slide_section',
    ] );

    Kirki::add_field( 'theme_config_id', [
		'label'    => esc_html__( 'Slider Bar 2 Text',  'coffee-brewery' ),
		'type'     => 'text',
		'settings' => 'coffee_brewery_slider_bar_2',
		'section'  => 'coffee_brewery_blog_slide_section',
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_enable_socail_link',
		'section'     => 'coffee_brewery_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'coffee-brewery' ) . '</h3>',
		'priority'    => 11,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'coffee_brewery_blog_slide_section',
		'priority'    => 11,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'coffee-brewery' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'coffee-brewery' ),
		'settings'     => 'coffee_brewery_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'coffee-brewery' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'coffee-brewery' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'coffee-brewery' ),
				'description' => esc_html__( 'Add the social icon url here.', 'coffee-brewery' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

	// OUR PRODUCTS SECTION

	Kirki::add_section( 'coffee_brewery_products_section', array(
        'title'          => esc_html__( 'Our Products Settings', 'coffee-brewery' ),
        'panel'          => 'coffee_brewery_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_products_section_enable_heading',
		'section'     => 'coffee_brewery_products_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Products Section', 'coffee-brewery' ) . '</h3>',
		'priority'    => 1,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'coffee_brewery_products_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_products_section',
		'default'     => true,
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'coffee-brewery' ),
			'off' => esc_html__( 'Disable', 'coffee-brewery' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_products_heading',
		'section'     => 'coffee_brewery_products_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Our Products Headings',  'coffee-brewery' ) . '</h3>',
		'priority'    => 3,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'coffee_brewery_products_main_heading',
		'label'    => esc_html__( 'Main Heading', 'coffee-brewery' ),
		'section'  => 'coffee_brewery_products_section',
		'priority' => 5,
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'coffee_brewery_products_main_content',
		'label'    => esc_html__( 'Main Content', 'coffee-brewery' ),
		'section'  => 'coffee_brewery_products_section',
		'priority' => 5,
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_our_product_heading',
		'section'     => 'coffee_brewery_products_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Hot Products', 'coffee-brewery' ) . '</h3>',
		'priority'    => 7,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'coffee_brewery_products_per_page',
		'label'       => esc_html__( 'Number of products to show', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_products_section',
		'default'     => 8,
		'choices'     => [
			'min'  => 0,
			'max'  => 12,
			'step' => 1,
		],
	] );

	// FOOTER SECTION

	Kirki::add_section( 'coffee_brewery_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'coffee-brewery' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'coffee-brewery' ),
        'panel'          => 'coffee_brewery_panel_id',
        'priority'       => 160,
    ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_footer_enable_heading',
		'section'     => 'coffee_brewery_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'coffee-brewery' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'coffee_brewery_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'coffee-brewery' ),
			'off' => esc_html__( 'Disable', 'coffee-brewery' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_footer_text_heading',
		'section'     => 'coffee_brewery_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'coffee-brewery' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'coffee_brewery_footer_text',
		'section'  => 'coffee_brewery_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'coffee_brewery_footer_text_heading_2',
	'section'     => 'coffee_brewery_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'coffee-brewery' ) . '</h3>',
	'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'coffee_brewery_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'coffee-brewery' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'coffee-brewery' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'coffee-brewery' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'coffee-brewery' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'coffee_brewery_footer_text_heading_1',
	'section'     => 'coffee_brewery_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'coffee-brewery' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'coffee_brewery_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'coffee-brewery' ),
		'section'     => 'coffee_brewery_footer_section',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'coffee_brewery_enable_footer_socail_link',
		'section'     => 'coffee_brewery_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'coffee-brewery' ) . '</h3>',
		'priority'    => 11,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'coffee_brewery_footer_section',
		'priority'    => 11,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icon', 'coffee-brewery' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'coffee-brewery' ),
		'settings'     => 'coffee_brewery_footer_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'coffee-brewery' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'coffee-brewery' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'coffee-brewery' ),
				'description' => esc_html__( 'Add the social icon url here.', 'coffee-brewery' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );
}

add_action( 'customize_register', 'coffee_brewery_customizer_settings' );
function coffee_brewery_customizer_settings( $wp_customize ) {
	$coffee_brewery_args = array(
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
	$categories = get_categories($coffee_brewery_args);
	$coffee_brewery_cat_posts = array();
	$coffee_brewery_m = 0;
	$coffee_brewery_cat_posts[]='Select';
	foreach($categories as $category){
		if($coffee_brewery_m==0){
			$default = $category->slug;
			$coffee_brewery_m++;
		}
		$coffee_brewery_cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('coffee_brewery_products_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'coffee_brewery_sanitize_select',
		'description'    => esc_html__( 'You have to select product category to show product section.', 'coffee-brewery' ),
	));

	$wp_customize->add_control('coffee_brewery_products_category',array(
		'type'    => 'select',
		'choices' => $coffee_brewery_cat_posts,
		'label' => __('Select category to display products ','coffee-brewery'),
		'section' => 'coffee_brewery_products_section',
	));
}