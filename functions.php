<?php

//
// Waxom Theme Functions
//
// Author: Veented
// URL: http://themeforest.net/user/Veented/
// Design: ThemeFire
//
//

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Load Framework
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


require_once( get_template_directory() . '/framework/plugins/plugins-config.php'); 			// Plugins Manager
require_once( get_template_directory() . '/framework/functions/general-functions.php'); 		// General functions
require_once( get_template_directory() . '/framework/functions/blog-functions.php'); 		// Blog related functions
require_once( get_template_directory() . '/framework/functions/page-functions.php'); 		// Page functions & metaboxes
require_once( get_template_directory() . '/framework/functions/header-functions.php'); 		// Header related functions
require_once( get_template_directory() . '/framework/widgets/widgets.php'); 					// Widgets

// Visual Composer:

if(class_exists('Vc_Manager')) {	

	function waxom_extend_composer() {
		require_once get_template_directory() . '/wpbakery/vc-extend.php';
	}
	
	$list = array(
	    'page',
	    'post',
	    'portfolio'
	);
	vc_set_default_editor_post_types( $list );

	add_action('init', 'waxom_extend_composer', 20);	
}

// Theme Options / Redux Framework

if ( !class_exists( 'ReduxFramework' ) && file_exists( get_template_directory() . '/framework/theme-panel/ReduxCore/framework.php' ) ) {
    require_once( get_template_directory() . '/framework/theme-panel/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( get_template_directory() . '/framework/theme-panel/waxom/waxom-config.php' ) ) {
    require_once( get_template_directory() . '/framework/theme-panel/waxom/waxom-config.php' );
}


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Localization
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


function waxom_theme_setup() {

	load_theme_textdomain( 'waxom', get_template_directory() . '/lang' );
	add_editor_style( array( '/css/editor.css' ) );
	
	global $wp_version;
	
	if ( version_compare( $wp_version, '3.4', '>=' ) ) {
	    add_theme_support( "custom-header");
	    add_theme_support( "custom-background");
	}
	
}
add_action( 'after_setup_theme', 'waxom_theme_setup' );


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Theme Scripts & Styles
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


function waxom_custom() {
	if (!is_admin()) 
	{
	
		// Load jQuery scripts
			
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true);
		wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '', true);
		wp_enqueue_script('appear', get_template_directory_uri() . '/js/jquery.appear.js', array( 'jquery' ), '', true);
		wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), '', true);
		wp_enqueue_script('waxom-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '', true);
							
		wp_register_script('vntdIsotope', get_template_directory_uri() . '/js/jquery.isotope.js', array('jquery'));	
		wp_register_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'));	
		wp_register_script('vntd-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'));	
		wp_register_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'));	
		wp_register_script('YTPlayer', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.js', array('jquery'));		
		wp_register_script('google-map-sensor', 'http://maps.googleapis.com/maps/api/js', array('jquery'));	
		wp_register_script('google-map-label', get_template_directory_uri() . '/js/markerwithlabel.js', array('google-map-sensor'));
		wp_register_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'));		
		wp_register_script('cubePortfolio', get_template_directory_uri() . '/js/jquery.cubeportfolio.min.js', array('jquery'));
		wp_register_script('cubeConfig', get_template_directory_uri() . '/js/jquery.cubeConfig.js', array('jquery'));
		wp_register_script('swiper', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'));	
		
		// Load stylesheets
		
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');	
		wp_enqueue_style('simple-line-icons', get_template_directory_uri() . '/css/simple-line-icons/simple-line-icons.css');
		wp_enqueue_style('animate', get_template_directory_uri() . '/css/scripts/animate.min.css');
		wp_dequeue_style('font-awesome'); // Dequeue plugin version	
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css', false, '5.4.0');
		wp_enqueue_style('waxom-styles', get_template_directory_uri() . '/style.css', array('bootstrap')); // MAIN STYLESHEET
		wp_enqueue_style('socials', get_template_directory_uri() . '/css/socials.css');

		
		wp_enqueue_style('waxom-responsive', get_template_directory_uri() . '/css/responsive.css');	// Load responsive stylesheet			
		wp_enqueue_style('waxom-dynamic-styles', get_template_directory_uri() . '/css/style-dynamic.php', array('waxom-responsive'));
			
		wp_register_style('owl-carousel', get_template_directory_uri() . '/css/scripts/owl.carousel.css');
		wp_register_style('flexslider', get_template_directory_uri() . '/css/scripts/flexslider.css');
		wp_register_style('YTPlayer', get_template_directory_uri() . '/css/scripts/YTPlayer.css');
		wp_register_style('magnific-popup', get_template_directory_uri() . '/css/scripts/magnific-popup.css');
		wp_register_style('prettyPhoto', get_template_directory_uri() . '/css/scripts/prettyPhoto.css');		
		wp_register_style('vimeoBg', get_template_directory_uri() . '/css/scripts/fullscreen_background.css');
		wp_register_style('cubePortfolio', get_template_directory_uri() . '/css/scripts/cubeportfolio.min.css');
		wp_register_style('swiperCSS', get_template_directory_uri() . '/css/scripts/swiper.min.css');
				
	}
}
add_action('wp_enqueue_scripts', 'waxom_custom');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// 		Custom Image Sizes & Post Formats
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


if (function_exists('add_theme_support')) { 
	
	// Post Formats	
	
	add_theme_support('post-formats', array('gallery', 'video', 'quote', 'link')); 	
	
	// Image Sizes		
	
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(100, 100, true);
		
	add_image_size('vntd-bg-image', 1920, 9999);
	add_image_size('vntd-fullwidth-landscape', 1170, 620, true);
	add_image_size('vntd-sidebar-landscape', 880, 470, true);
	add_image_size('vntd-sidebar-auto', 880, 9999);	
	add_image_size('vntd-sidebar-square', 660, 540, true);
	add_image_size('vntd-portfolio-square', 450, 340, true);	
	add_image_size('vntd-portfolio-auto', 450, 9999);
	
}

function waxom_image_sizes($sizes) {
	
    $sizes['vntd-fullwidth-landscape'] = esc_html__( 'Fullwidth Landscape', 'waxom');
    $sizes['vntd-sidebar-landscape'] = esc_html__( 'Content Landscape', 'waxom'); 
    $sizes['vntd-sidebar-auto'] = esc_html__( 'Content Portrait', 'waxom');
    $sizes['vntd-portfolio-auto'] = esc_html__( 'Portfolio Portrait', 'waxom');
    $sizes['vntd-portfolio-square'] = esc_html__( 'Portfolio Square', 'waxom');
    return $sizes;
}
add_filter('image_size_names_choose', 'waxom_image_sizes');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// 		Custom Menus
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


add_action('init', 'waxom_register_custom_menu');
 
function waxom_register_custom_menu() {
	register_nav_menu('primary', esc_html__('Primary Navigation','waxom'));
	register_nav_menu('topbar', esc_html__('Top Bar Navigation','waxom'));
}

class waxom_Custom_Menu_Class extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
}

function waxom_walk_nav_menu_items($output, $item, $depth, $args) {

	global $post;
	$front_id = get_option('page_on_front');
	
	if(is_object($post)) {
		$output = str_replace( 'http://frontpage_url/', get_permalink($front_id), $output);	
		$output = str_replace( get_permalink($post->ID).'#', '#', $output );
	}
    
    
    return $output;
}
add_filter( 'walker_nav_menu_start_el', 'waxom_walk_nav_menu_items', 10, 4);

// Remove custom post type parent element

function waxom_remove_parent_classes($class)
{
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function waxom_add_class_to_wp_nav_menu($classes)
{

	$classes = array_filter($classes, "waxom_remove_parent_classes");

	return $classes;
}

// Theme Options

if(!function_exists('waxom_option')) {
	function waxom_option($option_name) {

		global $waxom_options;

		if(is_array($waxom_options)) {
			if(array_key_exists($option_name, $waxom_options)) {
				return $waxom_options[$option_name];
			} else {
				return null;
			}
		}
		
		
		return array();

	}
}


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// 		Sidebars
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


if (function_exists('register_sidebar') && !function_exists('waxom_register_sidebars')){
	function waxom_register_sidebars() {
	
		register_sidebar(array(
	        'name' => esc_html__('Default Sidebar','waxom'),
	        'id' => 'default_sidebar',
	        'before_widget' => '<div id="%1$s" class="bar %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h5>',
	        'after_title' => '</h5>',
	    ));	
		register_sidebar(array(
	        'name' => esc_html__('Archives/Search Sidebar','waxom'),
	        'id' => 'archives',
	        'before_widget' => '<div id="%1$s" class="bar %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h5>',
	        'after_title' => '</h5>',
	    ));	
	    
	    register_sidebar(array(
	        'name' => esc_html__('Footer Column 1','waxom'),
	        'id' => 'footer1',
	        'before_widget' => '<div class="bar footer-widget footer-widget-col-1">',
	        'after_widget' => '</div>',
	        'before_title' => '<h4>',
	        'after_title' => '</h4>',
	    ));
	    register_sidebar(array(
	        'name' => esc_html__('Footer Column 2','waxom'),
	        'id' => 'footer2',
	        'before_widget' => '<div class="bar footer-widget footer-widget-col-2">',
	        'after_widget' => '</div>',
	        'before_title' => '<h4>',
	        'after_title' => '</h4>',
	    ));
	    register_sidebar(array(
	        'name' => esc_html__('Footer Column 3','waxom'),
	        'id' => 'footer3',
	        'before_widget' => '<div class="bar footer-widget footer-widget-col-3">',
	        'after_widget' => '</div>',
	        'before_title' => '<h4>',
	        'after_title' => '</h4>',
	    ));
	    register_sidebar(array(
	        'name' => esc_html__('Footer Column 4','waxom'),
	        'id' => 'footer4',
	        'before_widget' => '<div class="bar footer-widget footer-widget-col-4">',
	        'after_widget' => '</div>',
	        'before_title' => '<h4>',
	        'after_title' => '</h4>',
	    ));
	    
	    if (class_exists('Woocommerce')) { // If WooCommerce is enabled, activate related sidebars 
	    
	    	register_sidebar(array(
	    	    'name' => esc_html__('WooCommerce Shop Page', 'waxom'),
	    	    'id'	=> 'woocommerce_shop',
	    	    'before_widget' => '<div id="%1$s" class="sidebar-widget bar %2$s">',
	    	    'after_widget' => '</div>',
	    	    'before_title' => '<h5>',
	    	    'after_title' => '</h5>',
	    	));   	
	    	
	    }
		
		// Sidebar Generator
		
		global $waxom_options;
		
		if(is_array($waxom_options)) {
			if(array_key_exists('sidebar_generator', $waxom_options)) {
				if(is_array($waxom_options["sidebar_generator"])) {
					foreach($waxom_options["sidebar_generator"] as $sidebar)  
					{  
						register_sidebar( array(  
							'name' => esc_textarea($sidebar),
							'id' => waxom_generate_slug($sidebar, 45),
							'before_widget' => '<div id="%1$s" class="bar %2$s">',  
							'after_widget' => '</div>',
							'before_title' => '<h3>',
							'after_title' => '</h3>',
						));  
					}
				}
			}
		}
	}
	
	add_action( 'widgets_init', 'waxom_register_sidebars' );
	
}

function waxom_generate_slug($phrase, $maxLength = null)
{

	if($maxLength == null) $maxLength = 45;
	
    $result = strtolower($phrase);
 
    $result = preg_replace("/[^a-z0-9\s-]/", "", $result);
    $result = trim(preg_replace("/[\s-]+/", " ", $result));
    $result = trim(substr($result, 0, $maxLength));
    $result = preg_replace("/\s/", "-", $result);
 
    return $result;
}


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Configure Tag Cloud
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

function waxom_tag_cloud($args = array()) {
   $args['smallest'] = 14;
   $args['largest'] = 14;
   $args['unit'] = 'px';
   return $args;
   
}
add_filter('widget_tag_cloud_args', 'waxom_tag_cloud', 90);
add_filter('widget_text', 'do_shortcode');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Print comment scripts
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


function waxom_comments() {
	if(is_singular() || is_page())
	wp_enqueue_script( 'comment-reply', '', '', '', true);
}
add_action('wp_enqueue_scripts', 'waxom_comments');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Set content width
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


function waxom_custom_content_width_embed_size($embed_size){
	global $content_width;
	$content_width = 1170;
}
add_filter('template_redirect', 'waxom_custom_content_width_embed_size');


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		WooCommerce Support
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


add_theme_support('woocommerce');

if (class_exists('Woocommerce')) {
	require_once(get_template_directory() . '/woocommerce/config.php'); 	
}

add_theme_support("title-tag");


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Dashboard scripts & styles
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


function waxom_admin_scripts() {	
	wp_enqueue_media();
	wp_register_script('dashboard-jquery', get_template_directory_uri() . '/framework/theme-panel/assets/js/jquery.dashboard.js');
	wp_register_script('media-uploader', get_template_directory_uri() . '/framework/theme-panel/assets/js/media-uploader.js',array( 'jquery' ),true);
	
	wp_enqueue_script('dashboard-jquery', '', '', '', true);
	wp_enqueue_script('media-uploader', '', '', '', true);
	wp_enqueue_script('thickbox', '', '', '', true);	
	wp_localize_script('dashboard-jquery', 'WPURLS', array( 'themeurl' => get_template_directory_uri() ));	
}
add_action( 'admin_enqueue_scripts', 'waxom_admin_scripts' );

if ( !function_exists('waxom_sim_styles') ) {

	function waxom_sim_styles() {
		wp_enqueue_style('cubePortfolio');
		wp_enqueue_style('magnific-popup');
		wp_enqueue_style('owl-carousel');
	}
	
}
add_action('wp_enqueue_scripts', 'waxom_sim_styles');

function waxom_media_view_settings($settings, $post ) {
    if (!is_object($post)) return $settings;
    $shortcode = '[gallery ';
    $ids = get_post_meta($post->ID, 'gallery_images', TRUE);
    $ids = explode(",", $ids);
	
    if (is_array($ids))
        $shortcode .= 'ids = "' . implode(',',$ids) . '"]';
    else
        $shortcode .= "id = \"{$post->ID}\"]";
    $settings['shibaMlib'] = array('shortcode' => $shortcode);
    return $settings;

}

add_filter( 'media_view_settings','waxom_media_view_settings', 10, 2 );

function waxom_admin_styles() {
	wp_enqueue_style('vntd-admin', get_template_directory_uri() . '/framework/theme-panel/assets/css/vntd-admin.css');	
	wp_enqueue_style('vntd-admin-dynamic', get_template_directory_uri() . '/framework/theme-panel/assets/css/vntd-admin-dynamic.php');		
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css');
}


add_action( 'admin_enqueue_scripts', 'waxom_admin_styles' );
add_theme_support( 'automatic-feed-links' );