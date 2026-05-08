<?php

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
// 		Header related functions
//
//		Q: Why place theme here instead of the functions.php file?
//		A: WordPress totally breaks if you make any accident changes
//		   to that file.
//
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// 		Mobile Navigation
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if(!function_exists('waxom_mobile_nav')) {
function waxom_mobile_nav($button = NULL) {
	
	if($button) {
		echo '<div id="vntd-mobile-nav-toggle"><i class="fa fa-bars"></i></div>';
	} else { ?>
		<div id="mobile-navigation" class="vntd-container">
			<?php wp_nav_menu( array('theme_location' => 'primary' )); ?>
		</div>	
	<?php }

}
}

if(!function_exists('waxom_nav_menu')) {
function waxom_nav_menu() {
	global $post;
	
	if (has_nav_menu('primary')) {
		if(get_post_meta(get_the_ID(), 'page_nav_menu', true) && get_post_meta(get_the_ID(), 'page_nav_menu', true) != 'default') {
			wp_nav_menu( array('menu' => get_post_meta(get_the_ID(), 'page_nav_menu', true),'container' => false,'menu_class' => 'nav', 'walker' => new waxom_Custom_Menu_Class())); 
		} else {
			wp_nav_menu( array('theme_location' => 'primary','container' => false,'menu_class' => 'nav', 'walker' => new waxom_Custom_Menu_Class())); 
		}
	} else {
		echo '<span class="vntd-no-nav">No custom menu created!</span>';
	}
}
}

if(!function_exists('waxom_header_extra_content')) {
function waxom_header_extra_content() {
	echo '<div class="nav-extra-item nav-extra-item-text">';
	
	if(waxom_option('navbar_extra_type') == 'text') {
		echo do_shortcode(waxom_option('navbar_extra'));
	} elseif(waxom_option('navbar_extra_type') == 'search') {
		echo '<div class="nav-extra-search">';
		get_template_part('searchform');
		echo '</div>';
	} elseif(waxom_option('navbar_extra_type') == 'search-product') {
	
	}				
	
	
	
	echo '</div>';
}
}


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// 		Breadcrumbs
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if(!function_exists('waxom_breadcrumbs')) {
function waxom_breadcrumbs() {

	global $post;
		
	if (!is_front_page()) {
	
        echo '<ul id="breadcrumbs" class="breadcrumbs page-title-side">';
        echo '<li><a href="';
        echo esc_url(home_url('/'));
        echo '">';
        //bloginfo('name');
        echo esc_html__('Accueil', 'waxom') . '</a></li>';
        
		$product = false;
		if(class_exists('Woocommerce')) {
			if(is_product()) $product = true;
		}
        if (is_category()){

		} elseif (is_single() && get_post_type($post->ID) == 'portfolio') { // Portfolio post type
		
			$portfolio_parent_id = get_post_meta($post->ID, 'home_button_link', true);
			
			if(!$portfolio_parent_id) {
				$portfolio_parent_id = waxom_option('portfolio_url');
			}

			if($portfolio_parent_id != '') {
				echo '<li><a href="' . get_permalink( $portfolio_parent_id ) . '">' . get_the_title( $portfolio_parent_id ) . '</a></li>';
			}
			
		} elseif (is_single() && !$product){
            if ( is_day() ) {
                printf( '%s', get_the_date() );
            } elseif ( is_month() ) {
                printf( '%s', get_the_date( esc_html_x( 'F Y', esc_html__('monthly archives date format','waxom'), 'waxom' ) ) );
            } elseif ( is_year() ) {
                printf( '%s', get_the_date( esc_html_x( 'Y', esc_html__('yearly archives date format','waxom'), 'waxom' ) ) );
            } else {
            	echo '<li>';
            	$frontpage_id = get_option('page_for_posts');
            	//echo '<a href="'.get_permalink($frontpage_id).'">'.get_the_title($frontpage_id).' test</a>';
				echo '<a href="'. get_bloginfo('url') .'/conseils">Conseils</a>';
                echo '</li>';
            }
            
        }
        if (class_exists('Woocommerce')) {
	        if(is_woocommerce() || is_product() || is_shop() || is_cart() || is_checkout() || is_account_page()) {        
	        	echo '<li><a href="'.get_permalink(get_option('woocommerce_shop_page_id')).'" title="'.get_the_title(get_option('woocommerce_shop_page_id')).'">'.get_the_title(get_option('woocommerce_shop_page_id')).'</a></li>';        
	        }
	    }
	    
	    if(is_404()) {
	    	echo '<li>'.esc_html__('Page not found','waxom').'</li>';
	    }

        if (is_single()) {
            echo '<li>';
            
            if(strlen(get_the_title()) > 30) {
            	echo substr(get_the_title(),0,30).'...';
            } else {
            	echo get_the_title();
            }
            
            echo '</li>';
        }

        if (is_page()) {
        	$parent_id = $post->post_parent;
        	if($parent_id) {
        	
        		$parent_page = get_page($post->post_parent);
        		
        		if($parent_page->post_parent) {
        			echo '<li><a href="'.get_permalink($parent_page->post_parent).'" title="'.get_the_title($parent_page->post_parent).'">'.get_the_title($parent_page->post_parent).'</a></li>';
        	     }
        	     echo '<li><a href="'.get_permalink($parent_id).'" title="'.get_the_title($parent_id).'">'.get_the_title($parent_id).'</a></li>';
        	}
        	echo '<li>';
        	
            if(strlen(get_the_title()) > 30) {
            	echo substr(get_the_title(),0,30).'...';
            } else {
            	echo get_the_title();
            }
            
            echo '</li>';
        }
        
        if (is_tag()) {
        	echo '<li>'.esc_html__('Archives','waxom').'</li>';
        	echo '<li>'.esc_html__('Posts tagged by','waxom').' "';
            echo single_tag_title('', false);
            echo '"</li>';
        } elseif (is_category()) {
        	echo '<li>'.esc_html__('Archives','waxom').'</li>';
        	echo '<li>'.esc_html__('Posts by category','waxom').' "';
            echo single_cat_title('', false);
            echo '"</li>';
        } elseif (is_month() || is_day()) {
        	echo '<li>'.esc_html__('Archives','waxom').'</li>';
        	echo '<li>';
            the_time('F Y');
            echo '</li>';
        } elseif (is_year()) {
        	echo '<li>'.esc_html__('Archives','waxom').'</li>';
        	echo '<li>';
            the_time('Y');
            echo '"</li>';
        } elseif (is_search()) {
            echo '<li>'.esc_html__('Search results for','waxom').' "'.get_search_query().'"</li>';
        }

        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                echo '<li>';
                the_title();
                echo '</li>';
                rewind_posts();
            }
        }

        echo '</ul>';
    }
}
}

if(!function_exists('waxom_logo_url')) {
function waxom_logo_url() {
	if(is_front_page()) {
		echo '#home';
	} else {
		echo site_url();
	}
}
}

//
// Page Title Function
//

if(!function_exists('waxom_print_page_title')) {
function waxom_print_page_title() {

	global $post;
	
	$page_id = 1;
	
	if(get_post_type() == 'services' || get_post_type() == 'testimonials') {
		return false;
	}	
	
	if(is_object($post)) {
		$page_id = $post->ID;
	}
	
	$page_title = get_the_title($page_id);
	
	if(is_home()) {
		$page_title = esc_html__('Blog','waxom');
	}
	
	$page_tagline_wrap = '';
	
	if(get_post_meta($page_id,'page_subtitle',TRUE)) {
		$page_tagline_wrap = '<p class="p-desc">'.esc_textarea(get_post_meta($page_id,'page_subtitle',TRUE)).'</p>';
	}
	
	if(is_search()) {
		$page_title = esc_html__('Search','waxom');
	} elseif(is_404()) {
		$page_title = esc_html__('Page not found','waxom');
	} elseif(is_archive()) {
		$page_title = esc_html__('Archives','waxom');
	}
	
	if(is_single() && get_post_type() == 'portfolio') {
		$page_title = esc_html__('Portfolio','waxom');
	} elseif(is_single() && get_post_type() == 'post') {
		//$page_title = esc_html__('Blog','waxom');
		$page_title = 'Conseils';
	}
	
	if (class_exists('Woocommerce')) {
	
		global $wp_query;
		
		if(is_shop()) {
			$page_title = esc_html__('Shop','waxom');
		}elseif(is_product_category()) {
			$cat = $wp_query->get_queried_object();
			$page_title = $cat->name;
		}elseif(is_product_tag()) {
			$cat = $wp_query->get_queried_object();
			$page_title = $cat->name;
		}
	}
	
	$extra_class = '';
	
	if(get_post_meta(waxom_get_id(), 'customize_enable', TRUE) == 'yes') {
		
		echo '<style type="text/css"> #page-title {';
		
		if(get_post_meta(waxom_get_id(), 'customize_bgcolor', TRUE) && !get_post_meta(waxom_get_id(), 'customize_bgimage', TRUE)) echo 'background: '.esc_attr(get_post_meta(waxom_get_id(), 'customize_bgcolor', TRUE)).';';
		
		if(get_post_meta(waxom_get_id(), 'customize_bgimage', TRUE)) {
		
			$bg_img = wp_get_attachment_image_src(get_post_meta(waxom_get_id(), 'customize_bgimage', TRUE), 'vntd-bg-image');
			$bg_img_url = $bg_img[0];
			
			$bg_color = '';
			
			if(get_post_meta(waxom_get_id(), 'customize_bgcolor', TRUE)) $bg_color = esc_attr(get_post_meta(waxom_get_id(), 'customize_bgcolor', TRUE));
			
			echo 'background: ' . $bg_color . ' url(' . $bg_img_url . '); background-size: cover; background-position-y: center;';
			
		} 
		 
		
		echo '}';
		
		// Text Align
		
		if(get_post_meta(waxom_get_id(), 'customize_textalign', TRUE) == 'center') {
			echo '.page-title-holder { text-align: center; width:100%; } #breadcrumbs { position:relative; display:none; }';			
		}
		
		// Font Weight
		
		if(get_post_meta(waxom_get_id(), 'customize_fontweight', TRUE) == 700 || get_post_meta(waxom_get_id(), 'customize_fontweight', TRUE) == 800 || get_post_meta(waxom_get_id(), 'customize_fontweight', TRUE) == 'bold') {
			echo '#page-title h1 { font-weight:'.esc_attr(get_post_meta(waxom_get_id(), 'customize_fontweight', TRUE)).'; }';			
		}
		
		// Font Size
		
		if(get_post_meta(waxom_get_id(), 'customize_fontsize', TRUE) != 30) {
			echo '#page-title h1 { font-size:'.esc_attr(get_post_meta(waxom_get_id(), 'customize_fontsize', TRUE)).'px; }';			
		}
		
		// Font Color
		
		if(get_post_meta(waxom_get_id(), 'customize_textcolor', TRUE)) {
			echo 'body #page-title .page-title-holder h1, #breadcrumbs a, #breadcrumbs li { color:'.esc_attr(get_post_meta(waxom_get_id(), 'customize_textcolor', TRUE)).'; }';			
		}
		
		// Text Transform
		
		if(get_post_meta(waxom_get_id(), 'customize_texttransform', TRUE) == "uppercase") {
			echo '#page-title h1, #breadcrumbs { text-transform:uppercase; }';			
		}
		
		// Height
		
		if(get_post_meta(waxom_get_id(), 'customize_height', TRUE) != '80') {
			$half = get_post_meta(waxom_get_id(), 'customize_height', TRUE)/2-28;
			echo '#page-title h1 { line-height:'.esc_attr(get_post_meta(waxom_get_id(), 'customize_height', TRUE)).'px; } #breadcrumbs { margin-bottom: '.$half.'px; }';			
		}
		
		// Breadcrumbs
		
		if(get_post_meta(waxom_get_id(), 'customize_breadcrumbs', TRUE) == "disabled") {
			echo '#breadcrumbs { display:none; }';			
		}		
		
		echo '</style>';
		
		//$extra_class = ' page-title-animated';
		
	}
	
	?>
	
	<?php 
	
		$image_entete = get_field('bg_entete');
		if( !empty($image_entete) ){
			$url_bg_header = is_array($image_entete) ? $image_entete['url'] : $image_entete;
		}
	
	?>
	
	<section id="page-title" class="page_header <?php echo esc_attr(waxom_option('header_style')).esc_attr($extra_class); ?>" <?php if($url_bg_header != ''){ ?>style="background: url(<?php echo $url_bg_header; ?>) no-repeat center;background-size: cover;"<?php } ?> >
		<div class="overlay_bg">
			<?php
			
			if(get_post_meta(waxom_get_id(), 'customize_bgimage', TRUE)) {
				$imgurl = wp_get_attachment_image_src( get_post_meta(waxom_get_id(), 'customize_bgimage', TRUE), 'vntd-bg-image');			
				$imgurl = $imgurl[0];
				echo '<div class="page-title-bg-image" style="background-image:url('.esc_url($imgurl).');"></div>';
			}
			
			if(get_post_meta(waxom_get_id(), 'customize_bgoverlay', TRUE) != 'none' && get_post_meta(waxom_get_id(), 'customize_bgoverlay', TRUE)) {
				echo '<div class="bg-overlay bg-overlay-'.esc_attr(get_post_meta(waxom_get_id(), 'customize_bgoverlay', TRUE)).'"></div>';
			}
			?>
			<div class="page-title-inner inner page_header_inner">
				<div class="page-title-holder">
					<h1><?php echo $page_title; ?></h1>
					<?php echo $page_tagline_wrap; ?>				
				</div>
				
				<?php
				if(waxom_option('breadcrumbs')) {
				
					waxom_breadcrumbs();
					
				}
				?>
				
			</div>
		</div>
	</section>
	
	<?php
	
}
}

//
// Top Bar
//

if(!function_exists('waxom_print_topbar')) {
function waxom_print_topbar() {

$topbar_skin = 'light';

if(waxom_option('topbar_skin')) {
	$topbar_skin = waxom_option('topbar_skin');
}

?>
<div id="topbar" class="topbar-skin-<?php echo $topbar_skin; ?>">
	<div class="nav-inner">
		<div class="topbar-left">
			<?php waxom_topbar_content('left'); ?>
		</div>
		<div class="topbar-right">
			<?php waxom_topbar_content('right'); ?>
		</div>
	</div>	
</div>
<?php
}
}

if(!function_exists('waxom_topbar_content')) {
function waxom_topbar_content($side) {
	
	$type = waxom_option('topbar_'.$side);
	
	$top_bar_text = '';
	
	$icon_style = 'font_awesome';
	if(waxom_option('social_icons_style') != 'font_awesome') $icon_style = waxom_option('social_icons_style');
	
	if($icon_style != 'font_awesome') {
		$top_bar_text = str_replace("[icon icon", '[icon icon_style="simple-line" icon',waxom_option('topbar_text_'.$side));
	} else {
		$top_bar_text = waxom_option('topbar_text_'.$side);
	}	
	
	$bar_text = '<span class="topbar-text">'.do_shortcode($top_bar_text).'</span>';
	
	// If more than 1 WPML language, display switcher
	
	
	
	// Switch content type
		
	if($type == 'social') {
	
		echo '<div class="topbar-section topbar-social">';
		
		waxom_print_social_icons();
		
		echo '</div>';
	
	} elseif($type == 'menu') {
	
		echo '<div class="topbar-section topbar-menu">';
	
		wp_nav_menu(array('theme_location' => 'topbar'));
		
		echo '</div>';
	
	} elseif($type == 'textsocial') {
	
		echo '<div class="topbar-section topbar-text icons-'.$icon_style.'">'.$bar_text.'</div>';
		echo '<div class="topbar-section topbar-social">';
		
		waxom_print_social_icons();
		
		echo '</div>';
		
	} else {
		echo '<div class="topbar-section topbar-text icons-'.$icon_style.'">'.$bar_text.'</div>';	
	}
	
	if(function_exists('icl_get_languages') && sizeof(icl_get_languages('skip_missing=0')) > 1 && $side == 'right' && waxom_option('topbar_wpml')) {
		waxom_topbar_langs();
	}
	

}
}

if(!function_exists('waxom_topbar_langs')) {
	function waxom_topbar_langs() {
	
		if(function_exists('icl_get_languages')) $langs = icl_get_languages('skip_missing=0');
		if(sizeof($langs) <= 1)  return false;
		
		?>
		<div class="topbar-section topbar-langs">
			
			<?php		
			echo '<div class="current-lang">'.ICL_LANGUAGE_NAME_EN.'<i class="fa fa-angle-down"></i>';
			echo '<ul class="vntd-lang-dropdown">';
			foreach($langs as $lang) {
				$name = $lang['translated_name'];
				$current = '';
				if($name != ICL_LANGUAGE_NAME) {
					echo '<li '.$current.'><a href="'.$lang['url'].'">'.$lang['native_name'].'</a></li>';
				}
				
				
			}
			echo '</ul></div>';
			?>
		</div>
		
		<?php
	}
}

if(!function_exists('waxom_print_big_search')) {
	function waxom_print_big_search() {
		?>
		<div class="header-big-search">
			<form class="search-form relative" id="search-form" action="<?php echo esc_url(home_url('/')); ?>/">
				<input name="s" id="s" type="text" value="" placeholder="<?php esc_html_e('Type and hit Enter..','waxom') ?>" class="search">
				<div class="header-search-close accent-hover-color"><i class="fa fa-close"></i></div>
			</form>	
		</div>
		<?php
	}
}

if(!function_exists('waxom_header_style')) {
	function waxom_header_style($real = null) {
		global $post;
		
		$style = 'style-default';
		
		$style = waxom_option('header_style');
		
		if(!is_search() && !is_archive() && !is_tag() && !post_password_required(get_the_ID())) {
			if(get_post_meta(waxom_get_id(),'navbar_style',TRUE) && get_post_meta(waxom_get_id(),'navbar_style',TRUE) != $style && get_post_meta(waxom_get_id(),'navbar_style',TRUE) != 'default') {
				$style = esc_attr(get_post_meta(waxom_get_id(),'navbar_style',TRUE));
			}	
		}
		
		//if($real == null && $style == 'style-transparent-topbar') $style = 'style-transparent';
		
		return $style;
	}
}

if(!function_exists('waxom_topbar_active')) {

	function waxom_topbar_active() {
		
		$return = false;
		
		if(waxom_option('topbar_transparent') == true && waxom_option('topbar_transparent')) {
			$return = true;
		}
		
		return $return;
	}
	
}