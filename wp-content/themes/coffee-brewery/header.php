<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'coffee-brewery' ); ?></a>

<?php if ( get_theme_mod('coffee_brewery_site_loader', false) == true ) : ?>
	<div class="cssloader">
    	<div class="sh1"></div>
    	<div class="sh2"></div>
    	<h1 class="lt"><?php esc_html_e( 'loading',  'coffee-brewery' ); ?></h1>
    </div>
<?php endif; ?>

<div class="<?php if( get_theme_mod( 'coffee_brewery_sticky_header', false) != '') { ?>sticky-header<?php } else { ?>close-sticky main-menus<?php } ?>">
	<header id="site-navigation">
		<div class="header-outter py-2">
			<div class="container">
				<div class="row header-box">
					<div class="col-lg-2 col-md-4 col-sm-4  align-self-center">
						<div class="logo">
				    		<div class="logo-image">
				    			<?php the_custom_logo(); ?>
					    	</div>
					    	<div class="logo-content">
						    	<?php
						    		if ( get_theme_mod('coffee_brewery_display_header_title', true) == true ) :
							      		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
							      			echo esc_html(get_bloginfo('name'));
							      		echo '</a>';
							      	endif;

							      	if ( get_theme_mod('coffee_brewery_display_header_text', false) == true ) :
						      			echo '<span>'. esc_html(get_bloginfo('description')) . '</span>';
						      		endif;
					    		?>
							</div>
						</div>
					</div>					
					<div class="col-lg-10 col-md-8 col-sm-8 align-self-center nav-main-box">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-sm-4  align-self-center text-start">
								<div class="menu-box">
									<button class="menu-toggle toggle-menu my-2 py-2 px-3" aria-controls="top-menu" aria-expanded="false" type="button">
										<span aria-hidden="true"><?php esc_html_e( 'Menu', 'coffee-brewery' ); ?></span>
									</button>
									<nav id="main-menu" class="close-panal main-menu">
										<?php
											wp_nav_menu( array(
												'theme_location' => 'main-menu',
												'container' => 'false'
											));
										?>
										<button class="close-menu close-menu my-2 p-2" type="button">
											<span aria-hidden="true"><i class="fa fa-times"></i></span>
										</button>
									</nav>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-sm-8 align-self-center">
								<div class="header-search text-end py-3 py-md-0">
						        	<?php if ( get_theme_mod('coffee_brewery_search_box_enable', true) == true ) : ?>
						                <a class="open-search-form" href="#search-form"><i class="fa fa-search" aria-hidden="true"></i></a>
						                <div class="search-form"><?php get_search_form();?></div>
						        	<?php endif; ?>
						        	<?php if(class_exists('woocommerce')){ ?>
							          	<?php if ( is_user_logged_in() ) { ?>
							            	<a class="ms-2 ml-md-2 ml-lg-2 admin-box" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-in-alt"></i><?php esc_html_e('Login','coffee-brewery'); ?></a>
							          	<?php }
							          	else { ?>
							            	<a class="ms-2 ml-md-2 ml-lg-2 admin-box" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','coffee-brewery'); ?>"><i class="fas fa-user"></i><?php esc_html_e('Login','coffee-brewery'); ?></a>
							          	<?php } ?>
					        		<?php }?>
					        		<?php if ( class_exists( 'woocommerce' ) ) {?>
										<a class="cart-customlocation ms-2 ml-md-2 ml-lg-2" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','coffee-brewery' ); ?>"><i class="fas fa-shopping-bag"></i></a>
						        	<?php }?>
				                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
</div>