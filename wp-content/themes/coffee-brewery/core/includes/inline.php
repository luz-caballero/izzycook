<?php


$coffee_brewery_custom_css = '';

	/*---------------------------text-transform-------------------*/

	$coffee_brewery_text_transform = get_theme_mod( 'menu_text_transform_coffee_brewery','CAPITALISE');
    if($coffee_brewery_text_transform == 'CAPITALISE'){

		$coffee_brewery_custom_css .='#main-menu ul li a{';

			$coffee_brewery_custom_css .='text-transform: capitalize;';

		$coffee_brewery_custom_css .='}';

	}else if($coffee_brewery_text_transform == 'UPPERCASE'){

		$coffee_brewery_custom_css .='#main-menu ul li a{';

			$coffee_brewery_custom_css .='text-transform: uppercase;';

		$coffee_brewery_custom_css .='}';

	}else if($coffee_brewery_text_transform == 'LOWERCASE'){

		$coffee_brewery_custom_css .='#main-menu ul li a{';

			$coffee_brewery_custom_css .='text-transform: lowercase;';

		$coffee_brewery_custom_css .='}';
	}

		/*---------------------------menu-zoom-------------------*/

		$coffee_brewery_menu_zoom = get_theme_mod( 'coffee_brewery_menu_zoom','None');

    if($coffee_brewery_menu_zoom == 'Zoomout'){

		$coffee_brewery_custom_css .='#main-menu ul li a{';

			$coffee_brewery_custom_css .='';

		$coffee_brewery_custom_css .='}';

	}else if($coffee_brewery_menu_zoom == 'Zoominn'){

		$coffee_brewery_custom_css .='#main-menu ul li a:hover{';

			$coffee_brewery_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #713E28;';

		$coffee_brewery_custom_css .='}';
	}

	/*---------------------------Container Width-------------------*/

$coffee_brewery_container_width = get_theme_mod('coffee_brewery_container_width');

		$coffee_brewery_custom_css .='body{';

			$coffee_brewery_custom_css .='width: '.esc_attr($coffee_brewery_container_width).'%; margin: auto';

		$coffee_brewery_custom_css .='}';

		/*---------------------------Copyright Text alignment-------------------*/

	$coffee_brewery_copyright_text_alignment = get_theme_mod( 'coffee_brewery_copyright_text_alignment','LEFT-ALIGN');

	if($coffee_brewery_copyright_text_alignment == 'LEFT-ALIGN'){

		$coffee_brewery_custom_css .='.copy-text p{';

			$coffee_brewery_custom_css .='text-align:left;';

		$coffee_brewery_custom_css .='}';


	}else if($coffee_brewery_copyright_text_alignment == 'CENTER-ALIGN'){

		$coffee_brewery_custom_css .='.copy-text p{';

			$coffee_brewery_custom_css .='text-align:center;';

		$coffee_brewery_custom_css .='}';


	}else if($coffee_brewery_copyright_text_alignment == 'RIGHT-ALIGN'){

		$coffee_brewery_custom_css .='.copy-text p{';

			$coffee_brewery_custom_css .='text-align:right;';

		$coffee_brewery_custom_css .='}';

	}

	/*---------------------------related Product Settings-------------------*/

$coffee_brewery_related_product_setting = get_theme_mod('coffee_brewery_related_product_setting',true);

	if($coffee_brewery_related_product_setting == false){

		$coffee_brewery_custom_css .='.related.products, .related h2{';

			$coffee_brewery_custom_css .='display: none;';

		$coffee_brewery_custom_css .='}';
	}

		/*---------------------------Scroll to Top Alignment Settings-------------------*/

		$coffee_brewery_scroll_top_position = get_theme_mod( 'coffee_brewery_scroll_top_position','Right');

		if($coffee_brewery_scroll_top_position == 'Right'){
	
			$coffee_brewery_custom_css .='.scroll-up{';
	
				$coffee_brewery_custom_css .='right: 20px;';
	
			$coffee_brewery_custom_css .='}';
	
		}else if($coffee_brewery_scroll_top_position == 'Left'){
	
			$coffee_brewery_custom_css .='.scroll-up{';
	
				$coffee_brewery_custom_css .='left: 20px;';
	
			$coffee_brewery_custom_css .='}';
	
		}else if($coffee_brewery_scroll_top_position == 'Center'){
	
			$coffee_brewery_custom_css .='.scroll-up{';
	
				$coffee_brewery_custom_css .='right: 50%;left: 50%;';
	
			$coffee_brewery_custom_css .='}';
		}
	
			/*---------------------------Pagination Settings-------------------*/
	
	
	$coffee_brewery_pagination_setting = get_theme_mod('coffee_brewery_pagination_setting',true);
	
		if($coffee_brewery_pagination_setting == false){
	
			$coffee_brewery_custom_css .='.nav-links{';
	
				$coffee_brewery_custom_css .='display: none;';
	
			$coffee_brewery_custom_css .='}';
		}

	/*---------------------------woocommerce pagination alignment settings-------------------*/

	$coffee_brewery_woocommerce_pagination_position = get_theme_mod( 'coffee_brewery_woocommerce_pagination_position','Center');

	if($coffee_brewery_woocommerce_pagination_position == 'Left'){

		$coffee_brewery_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$coffee_brewery_custom_css .='text-align: left;';

		$coffee_brewery_custom_css .='}';

	}else if($coffee_brewery_woocommerce_pagination_position == 'Center'){

		$coffee_brewery_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$coffee_brewery_custom_css .='text-align: center;';

		$coffee_brewery_custom_css .='}';

	}else if($coffee_brewery_woocommerce_pagination_position == 'Right'){

		$coffee_brewery_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$coffee_brewery_custom_css .='text-align: right;';

		$coffee_brewery_custom_css .='}';
	}