<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">    

    <?php
	
	wp_head(); 

	?>        

</head>

<body <?php body_class(waxom_body_class()); ?>>
	
	<div id="home" data-accent="<?php echo esc_attr(waxom_option('accent_color')); ?>"></div>
	
	<?php
	
	$header_style = 'style-default';
	$header_style = waxom_header_style();
	
	if(waxom_header_style('style') != 'disable') {
	
	$header_skin = 'light';
	
	if(waxom_option('header_skin')) {
		$header_skin = waxom_option('header_skin');
	}
	
	$dropdown_class = 'dropdown-dark';
	
	if(waxom_option('header_dropdown_color') == 'white' || get_post_meta(get_the_ID(), 'dropdown_color', true) == 'white') {
		$dropdown_class = 'dropdown-white';
	}
	
	?>
	
	<nav id="site-navigation" class="<?php echo waxom_header_style().' header-skin-'.$header_skin.' '.$dropdown_class; ?> sticky-navigation">
	
	<?php
	
	if(waxom_option('topbar') && $header_style != 'style-default-slide' && $header_style != 'style-transparent' || waxom_option('topbar') && waxom_topbar_active() == true && $header_style != 'style-default-slide') {
	
		waxom_print_topbar();
	} 
	
	global $waxom_options;
	
	?>
	
	<nav id="navigation">
	
		<div class="nav-inner">
			<div class="logo">
				<!-- Navigation Logo Link -->
				<a href="<?php esc_url(waxom_logo_url()); ?>" class="scroll">
					<?php

					if(waxom_option("site_logo")) {
						if($header_style == 'style-transparent' && $waxom_options['site_logo_white'] || $header_skin == 'dark' && $waxom_options['site_logo_white']) {
							$logo_url = $waxom_options['site_logo_white']["url"];
						} else {
							$logo_url = $waxom_options['site_logo']["url"];
						}

						echo '<img class="site-logo" src="'.esc_url($logo_url).'" alt="'.get_bloginfo().'">';
						
						if($header_style == 'style-transparent') {
							echo '<img class="site-logo site-logo-overlay" src="'.esc_url($waxom_options['site_logo']["url"]).'" alt="'.get_bloginfo().'">';
						}
						
					}
					?>
				</a>
			</div>
			
			<!-- Mobile Menu Button -->
			<a class="mobile-nav-button<?php if($header_style == 'style-minimal2') echo '-popup'; ?>"><i class="fa fa-bars"></i></a>
			
			<!-- Navigation Menu -->
			
			<div class="nav-menu clearfix">
				 
				<?php 			
				
				if($header_style != 'style-bottom' && $header_style != 'style-bottom2' && $header_style != 'style-minimal2') {
				
					waxom_nav_menu();					
				
				}
				
				if(class_exists('Woocommerce') || waxom_option('header_search')) {
					?>
					<div class="nav-extra-right extra-style-<?php echo esc_attr(waxom_option('header_icons_style')); ?>">
						<?php				
						
						if(class_exists('Woocommerce') && waxom_option('topbar_woocommerce') != false) {
							waxom_woo_nav_cart();	
						}
						
						if(waxom_option('header_search')) {
						?>
							<div class="nav-extra-item header-search header-search-minimal header-search-open"><i class="icon-magnifier"></i></div>
						<?php
						}											
						?>
					</div>
					<?php
				}
				
				?>			

			</div>
			
			<?php if(waxom_option('header_search') && $header_style != 'style-bottom') waxom_print_big_search(); ?>	
			
		</div>
		
	</nav>
	
	<div id="navigation-mobile" class="navigation-mobile<?php if($header_style == 'style-bottom' || $header_style == 'style-bottom2' || $header_skin == 'dark') echo ' navigation-mobile-dark'; ?>">
		<?php
		
		waxom_nav_menu();	
		
		?>
	</div>
	
	</nav>

	<?php 
	
	} // End if header disabled
	
	?>
	
	<div id="page-content">
	
	<?php 
	
	if(!is_front_page() && waxom_option('header_title') != 0 && get_post_meta(get_the_ID(), 'page_header', true) != 'no-header' && !is_page_template('template-onepager.php') || is_search() && waxom_option('header_title') != 0) {		
		waxom_print_page_title();
	}
	
	?>