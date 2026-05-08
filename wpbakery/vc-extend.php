<?php

//
// Custom Visual Composer Scripts for a Theme Integration
//

vc_disable_frontend();

vc_remove_element('vc_raw_js');
vc_remove_element('vc_wp_tagcloud');
vc_remove_element('vc_wp_custommenu');
vc_remove_element('vc_wp_links');
vc_remove_element('vc_posts_grid');
vc_remove_element('vc_wp_search');
vc_remove_element('vc_wp_meta');
vc_remove_element('vc_wp_text');
vc_remove_element('vc_wp_categories');
vc_remove_element('vc_wp_archives');
vc_remove_element('vc_wp_rss');
vc_remove_element('vc_wp_calendar');
vc_remove_element('vc_posts_slider');
vc_remove_element('vc_carousel');
vc_remove_element('vc_posts_grid');
vc_remove_element('vc_wp_pages');
vc_remove_element('vc_wp_recentcomments');
vc_remove_element('vc_wp_posts');
vc_remove_element('vc_flickr');
vc_remove_element('vc_pinterest');
vc_remove_element('vc_button2'); // To-do
vc_remove_element('vc_cta_button');
vc_remove_element('vc_cta_button2');


// Fade Animation for elements

function waxom_vc_animation($css_animation) {
	$animation_data = '';
	
	if($css_animation != '') {
		$animation_data = ' data-animation="';
		if($css_animation == 'left-to-right') {
			$animation_data .= 'fadeInLeft';
		} elseif($css_animation == 'right-to-left') {
			$animation_data .= 'fadeInRight';
		} elseif($css_animation == 'top-to-bottom') {
			$animation_data .= 'fadeInDown';
		} elseif($css_animation == 'bottom-to-top') {
			$animation_data .= 'fadeInUp';
		} else {
			$animation_data .= 'fadeIn';
		}
		$animation_data .= '" data-animation-delay="100"';
	}
	
	return $animation_data;
}

// VC Row

vc_remove_param("vc_row","el_class");

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Font Color Scheme", 'waxom'),
	"param_name" => "color_scheme",
	"value" => array(
		"Default" => "",
		"White Scheme" => "white"	
	),
	"description" => esc_html__("White Scheme - all text styled to white color, recommended for dark backgrounds. Custom - choose your own heading and text color.", 'waxom'),
));



vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Predefined Background Color",
	"param_name" => "bg_predefined_color",
	"value" => array(
		"None" => "none",
		"Accent" => "accent",
		"Accent 2" => "accent2",
		"Accent 3" => "accent3",
		"Accent 4" => "accent4"
	),
	'admin_label' => true,
	"description" => esc_html__("Enable the row's background overlay to darken or lighten the background image.", 'waxom'),
	'param_holder_class' => 'vc_colored-dropdown'
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Background Image Overlay",
	"param_name" => "bg_overlay",
	"value" => array(
		"None" => "",
		"Dark" => "dark",
		"Darker" => "darker",
		"Black" => "black",
		"Accent" => "accent",
		"Light" => "light",
		"Dark Blue" => 'dark_blue'
	),
	"description" => esc_html__("Enable the row's background overlay to darken or lighten the background image.", 'waxom'),
));



// VC Pie

$colors_pie_arr = array(
	esc_html__( 'Accent', 'waxom' ) => 'accent',
	esc_html__( 'Grey', 'waxom' ) => 'vntd-color-grey',
	esc_html__( 'Blue', 'waxom' ) => 'vntd-color-blue',
	esc_html__( 'Turquoise', 'waxom' ) => 'vntd-color-turquoise',
	esc_html__( 'Green', 'waxom' ) => 'vntd-color-green',
	esc_html__( 'Orange', 'waxom' ) => 'vntd-color-orange',
	esc_html__( 'Red', 'waxom' ) => 'vntd-color-red',
	esc_html__( 'Black', 'waxom' ) => "vntd-color-black"
);

// VC Accordion

vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Accordion Style",
	"param_name" => "style",
	"value" => array(
		"Style 1" => "style1",
		"Style 2" => "style2",
		"Style 3" => "style3",
		"Style 4" => "style4",
	),
	"description" => "Choose a style for your accordion section."
));

// VC Video

vc_add_param("vc_video", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Frame Style",
	"param_name" => "frame",
	"value" => array(
		"None" => "",
		"iPad" => "ipad"		
	),
	"description" => "Enable the iPad frame around the video embed. If enabled, the video will be displayed with preset height and width.",
));

// VC Carousel

//vc_remove_param("vc_images_carousel","title");
//vc_remove_param("vc_images_carousel","el_class");
//vc_remove_param("vc_images_carousel","onclick");
//vc_remove_param("vc_images_carousel","custom_links");
//vc_remove_param("vc_images_carousel","custom_links_target");
//vc_remove_param("vc_images_carousel","mode");
//vc_remove_param("vc_images_carousel","speed");
//vc_remove_param("vc_images_carousel","slides_per_view");
//vc_remove_param("vc_images_carousel","autoplay");
//vc_remove_param("vc_images_carousel","hide_pagination_control");
//vc_remove_param("vc_images_carousel","hide_prev_next_buttons");
//vc_remove_param("vc_images_carousel","partial_view");
//vc_remove_param("vc_images_carousel","wrap");
//
//vc_add_param("vc_images_carousel", array(
//	"type" => "dropdown",
//	"heading" => esc_html__("Captions", 'waxom'),
//	"param_name" => "captions",
//	"class" => "hidden-label",
//	"value" => array("Yes, from media library" => "library", "Yes, custom" => "custom", "None" => 'none'),
//	"description" => esc_html__("Choose a type of captions or completely disable them.", 'waxom')
//));
//
//vc_add_param("vc_images_carousel", array(
//	"type" => "exploded_textarea",
//	"heading" => esc_html__("Custom Captions", 'waxom'),
//	"param_name" => "custom_captions",
//	"class" => "hidden-label",
//	"value" => "Slide 1 Title|Slide 1 Subtitle,Slide 2 Title|Slide 2 Subtitle,Slide 3 Title|Slide 3 Subtitle",
//	"description" => esc_html__("Enter custom captions for your slider images. Separate each with new line (Enter)", 'waxom'),
//	"dependency" => Array('element' => "captions", 'value' => array("custom"))
//));
//
//vc_add_param("vc_images_carousel", array(
//	"type" => "dropdown",
//	"heading" => esc_html__("Fullscreen", 'waxom'),
//	"param_name" => "fullscreen",
//	"class" => "hidden-label",
//	"value" => array("No" => "no", "Yes" => "yes"),
//	"description" => esc_html__("Toggle the fullscreen size of the image slider.", 'waxom')
//));
 

// VC Tabs

vc_remove_param("vc_tabs","el_class");

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Tabs Style",
	"param_name" => "style",
	"value" => array(
		"Style 1" => 'style1',
		"Style 2" => 'style2',
		"Style 3" => 'style3',
		"Style 4" => 'style4',
		"Style 5 (Minimalistic)" => 'style5'
	),
	"description" => "Tab's style.",
));


// VC Separator

vc_add_param("vc_separator", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Fullscreen width",
	"param_name" => "fullwidth",
	"value" => array(
		"No" => "",
		"Yes" => "yes"
	),
	"description" => "Make the divider stretch to full size of the browser's viewport.",
));

// VC Text

vc_add_param("vc_column_text", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Paragraph font size",
	"param_name" => "font_size",
	"value" => array(
		"Default" => "",
		"16px" => "p16px",
		"17px" => "p17px",
		"18px" => "p18px"
	),
	"description" => "Choose a font size for the paragraph text.",
));

// VC Progress Bar

vc_remove_param("vc_progress_bar","options");
vc_remove_param("vc_progress_bar","el_class");

vc_add_param("vc_progress_bar", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Progress Bar Style",
	"param_name" => "style",
	"value" => array(
		"Style 1" => "style1",
		"Style 2 (text inside the bar)" => "style3",
	),
	"description" => "Choose a style for your accordion section."
));

add_action( 'vc_after_init', 'waxom_add_progress_bar_color' ); /* Note: here we are using vc_after_init because WPBMap::GetParam and mutateParame are available only when default content elements are "mapped" into the system */

function waxom_add_progress_bar_color() {
  //Get current values stored in the color param in "Call to Action" element
  $param = WPBMap::getParam( 'vc_progress_bar', 'color' );
  //Append new value to the 'value' array
  $param['value'][esc_html__( 'Accent', 'waxom' )] = 'accent';
  //Finally "mutate" param with new values
  vc_update_shortcode_param( 'vc_progress_bar', $param );
}

function waxom_vc_update_defaults() {

  	// Change the default single image size to 'full'
  	$param = WPBMap::getParam( 'vc_single_image', 'img_size' );
  	$param['value'] = 'full';
  	vc_update_shortcode_param( 'vc_single_image', $param );
  
  	// Add Accent color to Progress Bars
  	
  	$param = WPBMap::getParam( 'vc_progress_bar', 'bgcolor' );
  	$param['value'][esc_html__( 'Accent', 'waxom' )] = 'accent';
  	vc_update_shortcode_param( 'vc_progress_bar', $param );
}

add_action('init', 'waxom_vc_update_defaults', 100); // Visual Composer Defaults

// VC Gallery

//vc_remove_param("vc_gallery","type");
//vc_remove_param("vc_gallery","interval");
//vc_remove_param("vc_gallery","el_class");
//vc_remove_param("vc_gallery","img_size");
//
//vc_add_param("vc_gallery", array(
//    "type" => "dropdown",
//    "heading" => esc_html__("Image Size", 'waxom'),
//    "param_name" => "img_size",
//    "description" => esc_html__('Choose an image size for your gallery thumbnails.', 'waxom'),
//    'value' => array(
//    	"875x360" => "875x360",
//    	"800x600" => "800x600",
//    	"460x368" => "460x368",
//    	"Custom size" => "custom",
//    )
//));
//
//vc_add_param("vc_gallery", array(
//    "type" => "textfield",
//    "heading" => esc_html__("Image size", 'waxom'),
//    "param_name" => "img_size_custom",
//    "value" => "",
//    "description" => esc_html__("Enter image size in pixels, e.g: 300x200 (Width x Height).", 'waxom'),
//    "dependency" => Array('element' => "img_size", 'value' => array("custom"))
//));


// Font Awesome Icons Param

function waxom_fontawesome_array() {
	$icons = array ('fa-glass' => 'fa-glass',
	  'fa-music' => 'fa-music',
	  'fa-search' => 'fa-search',
	  'fa-envelope-o' => 'fa-envelope-o',
	  'fa-heart' => 'fa-heart',
	  'fa-star' => 'fa-star',
	  'fa-star-o' => 'fa-star-o',
	  'fa-user' => 'fa-user',
	  'fa-film' => 'fa-film',
	  'fa-th-large' => 'fa-th-large',
	  'fa-th' => 'fa-th',
	  'fa-th-list' => 'fa-th-list',
	  'fa-check' => 'fa-check',
	  'fa-times' => 'fa-times',
	  'fa-search-plus' => 'fa-search-plus',
	  'fa-search-minus' => 'fa-search-minus',
	  'fa-power-off' => 'fa-power-off',
	  'fa-signal' => 'fa-signal',
	  'fa-cog' => 'fa-cog',
	  'fa-trash-o' => 'fa-trash-o',
	  'fa-home' => 'fa-home',
	  'fa-file-o' => 'fa-file-o',
	  'fa-clock-o' => 'fa-clock-o',
	  'fa-road' => 'fa-road',
	  'fa-download' => 'fa-download',
	  'fa-arrow-circle-o-down' => 'fa-arrow-circle-o-down',
	  'fa-arrow-circle-o-up' => 'fa-arrow-circle-o-up',
	  'fa-inbox' => 'fa-inbox',
	  'fa-play-circle-o' => 'fa-play-circle-o',
	  'fa-repeat' => 'fa-repeat',
	  'fa-refresh' => 'fa-refresh',
	  'fa-list-alt' => 'fa-list-alt',
	  'fa-lock' => 'fa-lock',
	  'fa-flag' => 'fa-flag',
	  'fa-headphones' => 'fa-headphones',
	  'fa-volume-off' => 'fa-volume-off',
	  'fa-volume-down' => 'fa-volume-down',
	  'fa-volume-up' => 'fa-volume-up',
	  'fa-qrcode' => 'fa-qrcode',
	  'fa-barcode' => 'fa-barcode',
	  'fa-tag' => 'fa-tag',
	  'fa-tags' => 'fa-tags',
	  'fa-book' => 'fa-book',
	  'fa-bookmark' => 'fa-bookmark',
	  'fa-print' => 'fa-print',
	  'fa-camera' => 'fa-camera',
	  'fa-font' => 'fa-font',
	  'fa-bold' => 'fa-bold',
	  'fa-italic' => 'fa-italic',
	  'fa-text-height' => 'fa-text-height',
	  'fa-text-width' => 'fa-text-width',
	  'fa-align-left' => 'fa-align-left',
	  'fa-align-center' => 'fa-align-center',
	  'fa-align-right' => 'fa-align-right',
	  'fa-align-justify' => 'fa-align-justify',
	  'fa-list' => 'fa-list',
	  'fa-outdent' => 'fa-outdent',
	  'fa-indent' => 'fa-indent',
	  'fa-video-camera' => 'fa-video-camera',
	  'fa-picture-o' => 'fa-picture-o',
	  'fa-pencil' => 'fa-pencil',
	  'fa-map-marker' => 'fa-map-marker',
	  'fa-adjust' => 'fa-adjust',
	  'fa-tint' => 'fa-tint',
	  'fa-pencil-square-o' => 'fa-pencil-square-o',
	  'fa-share-square-o' => 'fa-share-square-o',
	  'fa-check-square-o' => 'fa-check-square-o',
	  'fa-arrows' => 'fa-arrows',
	  'fa-step-backward' => 'fa-step-backward',
	  'fa-fast-backward' => 'fa-fast-backward',
	  'fa-backward' => 'fa-backward',
	  'fa-play' => 'fa-play',
	  'fa-pause' => 'fa-pause',
	  'fa-stop' => 'fa-stop',
	  'fa-forward' => 'fa-forward',
	  'fa-fast-forward' => 'fa-fast-forward',
	  'fa-step-forward' => 'fa-step-forward',
	  'fa-eject' => 'fa-eject',
	  'fa-chevron-left' => 'fa-chevron-left',
	  'fa-chevron-right' => 'fa-chevron-right',
	  'fa-plus-circle' => 'fa-plus-circle',
	  'fa-minus-circle' => 'fa-minus-circle',
	  'fa-times-circle' => 'fa-times-circle',
	  'fa-check-circle' => 'fa-check-circle',
	  'fa-question-circle' => 'fa-question-circle',
	  'fa-info-circle' => 'fa-info-circle',
	  'fa-crosshairs' => 'fa-crosshairs',
	  'fa-times-circle-o' => 'fa-times-circle-o',
	  'fa-check-circle-o' => 'fa-check-circle-o',
	  'fa-ban' => 'fa-ban',
	  'fa-arrow-left' => 'fa-arrow-left',
	  'fa-arrow-right' => 'fa-arrow-right',
	  'fa-arrow-up' => 'fa-arrow-up',
	  'fa-arrow-down' => 'fa-arrow-down',
	  'fa-share' => 'fa-share',
	  'fa-expand' => 'fa-expand',
	  'fa-compress' => 'fa-compress',
	  'fa-plus' => 'fa-plus',
	  'fa-minus' => 'fa-minus',
	  'fa-asterisk' => 'fa-asterisk',
	  'fa-exclamation-circle' => 'fa-exclamation-circle',
	  'fa-gift' => 'fa-gift',
	  'fa-leaf' => 'fa-leaf',
	  'fa-fire' => 'fa-fire',
	  'fa-eye' => 'fa-eye',
	  'fa-eye-slash' => 'fa-eye-slash',
	  'fa-exclamation-triangle' => 'fa-exclamation-triangle',
	  'fa-plane' => 'fa-plane',
	  'fa-calendar' => 'fa-calendar',
	  'fa-random' => 'fa-random',
	  'fa-comment' => 'fa-comment',
	  'fa-magnet' => 'fa-magnet',
	  'fa-chevron-up' => 'fa-chevron-up',
	  'fa-chevron-down' => 'fa-chevron-down',
	  'fa-retweet' => 'fa-retweet',
	  'fa-shopping-cart' => 'fa-shopping-cart',
	  'fa-folder' => 'fa-folder',
	  'fa-folder-open' => 'fa-folder-open',
	  'fa-arrows-v' => 'fa-arrows-v',
	  'fa-arrows-h' => 'fa-arrows-h',
	  'fa-bar-chart-o' => 'fa-bar-chart-o',
	  'fa-twitter-square' => 'fa-twitter-square',
	  'fa-facebook-square' => 'fa-facebook-square',
	  'fa-camera-retro' => 'fa-camera-retro',
	  'fa-key' => 'fa-key',
	  'fa-cogs' => 'fa-cogs',
	  'fa-comments' => 'fa-comments',
	  'fa-thumbs-o-up' => 'fa-thumbs-o-up',
	  'fa-thumbs-o-down' => 'fa-thumbs-o-down',
	  'fa-star-half' => 'fa-star-half',
	  'fa-heart-o' => 'fa-heart-o',
	  'fa-sign-out' => 'fa-sign-out',
	  'fa-linkedin-square' => 'fa-linkedin-square',
	  'fa-thumb-tack' => 'fa-thumb-tack',
	  'fa-external-link' => 'fa-external-link',
	  'fa-sign-in' => 'fa-sign-in',
	  'fa-trophy' => 'fa-trophy',
	  'fa-github-square' => 'fa-github-square',
	  'fa-upload' => 'fa-upload',
	  'fa-lemon-o' => 'fa-lemon-o',
	  'fa-phone' => 'fa-phone',
	  'fa-square-o' => 'fa-square-o',
	  'fa-bookmark-o' => 'fa-bookmark-o',
	  'fa-phone-square' => 'fa-phone-square',
	  'fa-twitter' => 'fa-twitter',
	  'fa-facebook' => 'fa-facebook',
	  'fa-github' => 'fa-github',
	  'fa-unlock' => 'fa-unlock',
	  'fa-credit-card' => 'fa-credit-card',
	  'fa-rss' => 'fa-rss',
	  'fa-hdd-o' => 'fa-hdd-o',
	  'fa-bullhorn' => 'fa-bullhorn',
	  'fa-bell' => 'fa-bell',
	  'fa-certificate' => 'fa-certificate',
	  'fa-hand-o-right' => 'fa-hand-o-right',
	  'fa-hand-o-left' => 'fa-hand-o-left',
	  'fa-hand-o-up' => 'fa-hand-o-up',
	  'fa-hand-o-down' => 'fa-hand-o-down',
	  'fa-arrow-circle-left' => 'fa-arrow-circle-left',
	  'fa-arrow-circle-right' => 'fa-arrow-circle-right',
	  'fa-arrow-circle-up' => 'fa-arrow-circle-up',
	  'fa-arrow-circle-down' => 'fa-arrow-circle-down',
	  'fa-globe' => 'fa-globe',
	  'fa-wrench' => 'fa-wrench',
	  'fa-tasks' => 'fa-tasks',
	  'fa-filter' => 'fa-filter',
	  'fa-briefcase' => 'fa-briefcase',
	  'fa-arrows-alt' => 'fa-arrows-alt',
	  'fa-users' => 'fa-users',
	  'fa-link' => 'fa-link',
	  'fa-cloud' => 'fa-cloud',
	  'fa-flask' => 'fa-flask',
	  'fa-scissors' => 'fa-scissors',
	  'fa-files-o' => 'fa-files-o',
	  'fa-paperclip' => 'fa-paperclip',
	  'fa-floppy-o' => 'fa-floppy-o',
	  'fa-square' => 'fa-square',
	  'fa-bars' => 'fa-bars',
	  'fa-list-ul' => 'fa-list-ul',
	  'fa-list-ol' => 'fa-list-ol',
	  'fa-strikethrough' => 'fa-strikethrough',
	  'fa-underline' => 'fa-underline',
	  'fa-table' => 'fa-table',
	  'fa-magic' => 'fa-magic',
	  'fa-truck' => 'fa-truck',
	  'fa-pinterest' => 'fa-pinterest',
	  'fa-pinterest-square' => 'fa-pinterest-square',
	  'fa-google-plus-square' => 'fa-google-plus-square',
	  'fa-google-plus' => 'fa-google-plus',
	  'fa-money' => 'fa-money',
	  'fa-caret-down' => 'fa-caret-down',
	  'fa-caret-up' => 'fa-caret-up',
	  'fa-caret-left' => 'fa-caret-left',
	  'fa-caret-right' => 'fa-caret-right',
	  'fa-columns' => 'fa-columns',
	  'fa-sort' => 'fa-sort',
	  'fa-sort-desc' => 'fa-sort-desc',
	  'fa-sort-asc' => 'fa-sort-asc',
	  'fa-envelope' => 'fa-envelope',
	  'fa-linkedin' => 'fa-linkedin',
	
	  'fa-undo' => 'fa-undo',
	  'fa-gavel' => 'fa-gavel',
	  'fa-tachometer' => 'fa-tachometer',
	  'fa-comment-o' => 'fa-comment-o',
	  'fa-comments-o' => 'fa-comments-o',
	  'fa-bolt' => 'fa-bolt',
	  'fa-sitemap' => 'fa-sitemap',
	  'fa-umbrella' => 'fa-umbrella',
	  'fa-clipboard' => 'fa-clipboard',
	  'fa-lightbulb-o' => 'fa-lightbulb-o',
	  'fa-exchange' => 'fa-exchange',
	  'fa-cloud-download' => 'fa-cloud-download',
	  'fa-cloud-upload' => 'fa-cloud-upload',
	  'fa-user-md' => 'fa-user-md',
	  'fa-stethoscope' => 'fa-stethoscope',
	  'fa-suitcase' => 'fa-suitcase',
	  'fa-bell-o' => 'fa-bell-o',
	  'fa-coffee' => 'fa-coffee',
	  'fa-cutlery' => 'fa-cutlery',
	  'fa-file-text-o' => 'fa-file-text-o',
	  'fa-building-o' => 'fa-building-o',
	  'fa-hospital-o' => 'fa-hospital-o',
	  'fa-ambulance' => 'fa-ambulance',
	  'fa-medkit' => 'fa-medkit',
	  'fa-fighter-jet' => 'fa-fighter-jet',
	  'fa-beer' => 'fa-beer',
	  'fa-h-square' => 'fa-h-square',
	  'fa-plus-square' => 'fa-plus-square',
	  'fa-angle-double-left' => 'fa-angle-double-left',
	  'fa-angle-double-right' => 'fa-angle-double-right',
	  'fa-angle-double-up' => 'fa-angle-double-up',
	  'fa-angle-double-down' => 'fa-angle-double-down',
	  'fa-angle-left' => 'fa-angle-left',
	  'fa-angle-right' => 'fa-angle-right',
	  'fa-angle-up' => 'fa-angle-up',
	  'fa-angle-down' => 'fa-angle-down',
	  'fa-desktop' => 'fa-desktop',
	  'fa-laptop' => 'fa-laptop',
	  'fa-tablet' => 'fa-tablet',
	  'fa-mobile' => 'fa-mobile',
	  'fa-circle-o' => 'fa-circle-o',
	  'fa-quote-left' => 'fa-quote-left',
	  'fa-quote-right' => 'fa-quote-right',
	  'fa-spinner' => 'fa-spinner',
	  'fa-circle' => 'fa-circle',
	  'fa-reply' => 'fa-reply',
	  'fa-github-alt' => 'fa-github-alt',
	  'fa-folder-o' => 'fa-folder-o',
	  'fa-folder-open-o' => 'fa-folder-open-o',
	  'fa-smile-o' => 'fa-smile-o',
	  'fa-frown-o' => 'fa-frown-o',
	  'fa-meh-o' => 'fa-meh-o',
	  'fa-gamepad' => 'fa-gamepad',
	  'fa-keyboard-o' => 'fa-keyboard-o',
	  'fa-flag-o' => 'fa-flag-o',
	  'fa-flag-checkered' => 'fa-flag-checkered',
	  'fa-terminal' => 'fa-terminal',
	  'fa-code' => 'fa-code',
	  'fa-reply-all' => 'fa-reply-all',
	  'fa-star-half-o' => 'fa-star-half-o',
	  'fa-location-arrow' => 'fa-location-arrow',
	  'fa-crop' => 'fa-crop',
	  'fa-code-fork' => 'fa-code-fork',
	  'fa-chain-broken' => 'fa-chain-broken',
	  'fa-question' => 'fa-question',
	  'fa-info' => 'fa-info',
	  'fa-exclamation' => 'fa-exclamation',
	  'fa-superscript' => 'fa-superscript',
	  'fa-subscript' => 'fa-subscript',
	  'fa-eraser' => 'fa-eraser',
	  'fa-puzzle-piece' => 'fa-puzzle-piece',
	  'fa-microphone' => 'fa-microphone',
	  'fa-microphone-slash' => 'fa-microphone-slash',
	  'fa-shield' => 'fa-shield',
	  'fa-calendar-o' => 'fa-calendar-o',
	  'fa-fire-extinguisher' => 'fa-fire-extinguisher',
	  'fa-rocket' => 'fa-rocket',
	  'fa-maxcdn' => 'fa-maxcdn',
	  'fa-chevron-circle-left' => 'fa-chevron-circle-left',
	  'fa-chevron-circle-right' => 'fa-chevron-circle-right',
	  'fa-chevron-circle-up' => 'fa-chevron-circle-up',
	  'fa-chevron-circle-down' => 'fa-chevron-circle-down',
	  'fa-html5' => 'fa-html5',
	  'fa-css3' => 'fa-css3',
	  'fa-anchor' => 'fa-anchor',
	  'fa-unlock-alt' => 'fa-unlock-alt',
	  'fa-bullseye' => 'fa-bullseye',
	  'fa-ellipsis-h' => 'fa-ellipsis-h',
	  'fa-ellipsis-v' => 'fa-ellipsis-v',
	  'fa-rss-square' => 'fa-rss-square',
	  'fa-play-circle' => 'fa-play-circle',
	  'fa-ticket' => 'fa-ticket',
	  'fa-minus-square' => 'fa-minus-square',
	  'fa-minus-square-o' => 'fa-minus-square-o',
	  'fa-level-up' => 'fa-level-up',
	  'fa-level-down' => 'fa-level-down',
	  'fa-check-square' => 'fa-check-square',
	  'fa-pencil-square' => 'fa-pencil-square',
	  'fa-external-link-square' => 'fa-external-link-square',
	  'fa-share-square' => 'fa-share-square',
	  'fa-compass' => 'fa-compass',
	  'fa-caret-square-o-down' => 'fa-caret-square-o-down',
	  'fa-caret-square-o-up' => 'fa-caret-square-o-up',
	  'fa-caret-square-o-right' => 'fa-caret-square-o-right',
	  'fa-eur' => 'fa-eur',
	  'fa-gbp' => 'fa-gbp',
	  'fa-usd' => 'fa-usd',
	  'fa-inr' => 'fa-inr',
	  'fa-jpy' => 'fa-jpy',
	  'fa-rub' => 'fa-rub',
	  'fa-krw' => 'fa-krw',
	  'fa-btc' => 'fa-btc',
	  'fa-file' => 'fa-file',
	  'fa-file-text' => 'fa-file-text',
	  'fa-sort-alpha-asc' => 'fa-sort-alpha-asc',
	  'fa-sort-alpha-desc' => 'fa-sort-alpha-desc',
	  'fa-sort-amount-asc' => 'fa-sort-amount-asc',
	  'fa-sort-amount-desc' => 'fa-sort-amount-desc',
	  'fa-sort-numeric-asc' => 'fa-sort-numeric-asc',
	  'fa-sort-numeric-desc' => 'fa-sort-numeric-desc',
	  'fa-thumbs-up' => 'fa-thumbs-up',
	  'fa-thumbs-down' => 'fa-thumbs-down',
	  'fa-youtube-square' => 'fa-youtube-square',
	  'fa-youtube' => 'fa-youtube',
	  'fa-xing' => 'fa-xing',
	  'fa-xing-square' => 'fa-xing-square',
	  'fa-youtube-play' => 'fa-youtube-play',
	  'fa-dropbox' => 'fa-dropbox',
	  'fa-stack-overflow' => 'fa-stack-overflow',
	  'fa-instagram' => 'fa-instagram',
	  'fa-flickr' => 'fa-flickr',
	  'fa-adn' => 'fa-adn',
	  'fa-bitbucket' => 'fa-bitbucket',
	  'fa-bitbucket-square' => 'fa-bitbucket-square',
	  'fa-tumblr' => 'fa-tumblr',
	  'fa-tumblr-square' => 'fa-tumblr-square',
	  'fa-long-arrow-down' => 'fa-long-arrow-down',
	  'fa-long-arrow-up' => 'fa-long-arrow-up',
	  'fa-long-arrow-left' => 'fa-long-arrow-left',
	  'fa-long-arrow-right' => 'fa-long-arrow-right',
	  'fa-apple' => 'fa-apple',
	  'fa-windows' => 'fa-windows',
	  'fa-android' => 'fa-android',
	  'fa-linux' => 'fa-linux',
	  'fa-dribbble' => 'fa-dribbble',
	  'fa-skype' => 'fa-skype',
	  'fa-foursquare' => 'fa-foursquare',
	  'fa-trello' => 'fa-trello',
	  'fa-female' => 'fa-female',
	  'fa-male' => 'fa-male',
	  'fa-gittip' => 'fa-gittip',
	  'fa-sun-o' => 'fa-sun-o',
	  'fa-moon-o' => 'fa-moon-o',
	  'fa-archive' => 'fa-archive',
	  'fa-bug' => 'fa-bug',
	  'fa-vk' => 'fa-vk',
	  'fa-weibo' => 'fa-weibo',
	  'fa-renren' => 'fa-renren',
	  'fa-pagelines' => 'fa-pagelines',
	  'fa-stack-exchange' => 'fa-stack-exchange',
	  'fa-arrow-circle-o-right' => 'fa-arrow-circle-o-right',
	  'fa-arrow-circle-o-left' => 'fa-arrow-circle-o-left',
	  'fa-caret-square-o-left' => 'fa-caret-square-o-left',
	  'fa-dot-circle-o' => 'fa-dot-circle-o',
	  'fa-wheelchair' => 'fa-wheelchair',
	  'fa-vimeo-square' => 'fa-vimeo-square',
	  'fa-try' => 'fa-try',
	  'fa-plus-square-o' => 'fa-plus-square-o',
	  'fa-space-shuttle' => 'fa-space-shuttle',
	  'fa-slack' => 'fa-slack',
	  'fa-envelope-square' => 'fa-envelope-square',
	  'fa-wordpress' => 'fa-wordpress',
	  'fa-openid' => 'fa-openid',
	  'fa-university' => 'fa-university',
	  'fa-graduation-cap' => 'fa-graduation-cap',
	  'fa-yahoo' => 'fa-yahoo',
	  'fa-google' => 'fa-google',
	  'fa-reddit' => 'fa-reddit',
	  'fa-reddit-square' => 'fa-reddit-square',
	  'fa-stumbleupon-circle' => 'fa-stumbleupon-circle',
	  'fa-stumbleupon' => 'fa-stumbleupon',
	  'fa-delicious' => 'fa-delicious',
	  'fa-digg' => 'fa-digg',
	  'fa-pied-piper' => 'fa-pied-piper',
	  'fa-pied-piper-alt' => 'fa-pied-piper-alt',
	  'fa-drupal' => 'fa-drupal',
	  'fa-joomla' => 'fa-joomla',
	  'fa-language' => 'fa-language',
	  'fa-fax' => 'fa-fax',
	
	  'fa-building' => 'fa-building',
	  'fa-child' => 'fa-child',
	  'fa-paw' => 'fa-paw',
	  'fa-spoon' => 'fa-spoon',
	  'fa-cube' => 'fa-cube',
	  'fa-cubes' => 'fa-cubes',
	  'fa-behance' => 'fa-behance',
	  'fa-behance-square' => 'fa-behance-square',
	  'fa-steam' => 'fa-steam',
	  'fa-steam-square' => 'fa-steam-square',
	  'fa-recycle' => 'fa-recycle',
	  'fa-car' => 'fa-car',
	  'fa-taxi' => 'fa-taxi',
	  'fa-tree' => 'fa-tree',
	  'fa-spotify' => 'fa-spotify',
	  'fa-deviantart' => 'fa-deviantart',
	  'fa-soundcloud' => 'fa-soundcloud',
	  'fa-database' => 'fa-database',
	  'fa-file-pdf-o' => 'fa-file-pdf-o',
	  'fa-file-word-o' => 'fa-file-word-o',
	  'fa-file-excel-o' => 'fa-file-excel-o',
	  'fa-file-powerpoint-o' => 'fa-file-powerpoint-o',
	  'fa-file-image-o' => 'fa-file-image-o',
	  'fa-file-archive-o' => 'fa-file-archive-o',
	  'fa-file-audio-o' => 'fa-file-audio-o',
	  'fa-file-video-o' => 'fa-file-video-o',
	  'fa-file-code-o' => 'fa-file-code-o',
	  'fa-vine' => 'fa-vine',
	  'fa-codepen' => 'fa-codepen',
	  'fa-jsfiddle' => 'fa-jsfiddle',
	  'fa-life-ring' => 'fa-life-ring',
	  'fa-circle-o-notch' => 'fa-circle-o-notch',
	  'fa-rebel' => 'fa-rebel',
	  'fa-empire' => 'fa-empire',
	  'fa-git-square' => 'fa-git-square',
	  'fa-git' => 'fa-git',
	  'fa-hacker-news' => 'fa-hacker-news',
	  'fa-tencent-weibo' => 'fa-tencent-weibo',
	  'fa-qq' => 'fa-qq',
	  'fa-weixin' => 'fa-weixin',
	  'fa-paper-plane' => 'fa-paper-plane',
	  'fa-paper-plane-o' => 'fa-paper-plane-o',
	  'fa-history' => 'fa-history',
	  'fa-circle-thin' => 'fa-circle-thin',
	  'fa-header' => 'fa-header',
	  'fa-paragraph' => 'fa-paragraph',
	  'fa-sliders' => 'fa-sliders',
	  'fa-share-alt' => 'fa-share-alt',
	  'fa-share-alt-square' => 'fa-share-alt-square',
	  'fa-angellist' => 'fa-angellist',
	  'fa-bomb' => 'fa-bomb');
	
	return $icons;
}

//
// Register new params
//

// Dropdown menu of blog categories

function waxom_vc_blog_cats() {
	$blog_cats = array();
	$blog_categories = get_categories();
	
	foreach($blog_categories as $blog_cat) {
		$blog_cats[$blog_cat->name] = $blog_cat->term_id;
	}
	
	return $blog_cats;
}

// Dropdown menu of portfolio categories

function waxom_vc_portfolio_cats() {

	$portfolio_categories = get_categories('taxonomy=project-type');
	
	if(is_array($portfolio_categories)) {
	
		$portfolio_cats = array();
		
		foreach($portfolio_categories as $portfolio_cat) {
			if(is_object($portfolio_cat)) {
				$portfolio_cats[$portfolio_cat->name] = $portfolio_cat->slug;
			}
		}
		
		return $portfolio_cats;
	
	}
		
	return null;
	
}

function waxom_vc_slider_cats() {

	$portfolio_categories = get_categories('taxonomy=slide-locations');
	
	$portfolio_cats = array();
	
	foreach($portfolio_categories as $portfolio_cat) {
		if(is_object($portfolio_cat)) {
			$portfolio_cats[$portfolio_cat->name] = $portfolio_cat->slug;
		}
	}
	
	return $portfolio_cats;
	
}

function waxom_vc_team_cats() {

	$team_categories = get_categories('taxonomy=member-position');
	
	$team_cats = array();
	
	foreach($team_categories as $team_cat) {
		if(is_object($team_cat)) {
			$team_cats[$team_cat->name] = $team_cat->slug;
		}
	}
	
	return $team_cats;
	
}

//
// Register new shortcodes:
//


// Carousel Portfolio

add_action("admin_init", "waxom_vc_shortcodes"); 

function waxom_vc_shortcodes() {

	// Link Target array
	$target_arr = array(esc_html__("Same window", 'waxom') => "_self", esc_html__("New window", 'waxom') => "_blank");
	$colors_arr = array(esc_html__("Accent Color", 'waxom') => "accent",esc_html__("Accent Color 2", 'waxom') => "accent2",esc_html__("Accent Color 3", 'waxom') => "accent3", esc_html__("Dark", 'waxom') => "dark",esc_html__("Blue", 'waxom') => "blue", esc_html__("Turquoise", 'waxom') => "turquoise", esc_html__("Green", 'waxom') => "green", esc_html__("Orange", 'waxom') => "orange", esc_html__("Red", 'waxom') => "red", esc_html__("Dark", 'waxom') => "dark",esc_html__("Grey", 'waxom') => "grey", esc_html__("Custom Color", 'waxom') => "custom");
	$pixel_icons = array(
		array( 'vc_pixel_icon vc_pixel_icon-alert' => esc_html__( 'Alert', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-info' => esc_html__( 'Info', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-tick' => esc_html__( 'Tick', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-explanation' => esc_html__( 'Explanation', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-address_book' => esc_html__( 'Address book', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-alarm_clock' => esc_html__( 'Alarm clock', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-anchor' => esc_html__( 'Anchor', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-application_image' => esc_html__( 'Application Image', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-arrow' => esc_html__( 'Arrow', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-asterisk' => esc_html__( 'Asterisk', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-hammer' => esc_html__( 'Hammer', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-balloon' => esc_html__( 'Balloon', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-balloon_buzz' => esc_html__( 'Balloon Buzz', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-balloon_facebook' => esc_html__( 'Balloon Facebook', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-balloon_twitter' => esc_html__( 'Balloon Twitter', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-battery' => esc_html__( 'Battery', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-binocular' => esc_html__( 'Binocular', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-document_excel' => esc_html__( 'Document Excel', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-document_image' => esc_html__( 'Document Image', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-document_music' => esc_html__( 'Document Music', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-document_office' => esc_html__( 'Document Office', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-document_pdf' => esc_html__( 'Document PDF', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-document_powerpoint' => esc_html__( 'Document Powerpoint', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-document_word' => esc_html__( 'Document Word', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-bookmark' => esc_html__( 'Bookmark', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-camcorder' => esc_html__( 'Camcorder', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-camera' => esc_html__( 'Camera', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-chart' => esc_html__( 'Chart', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-chart_pie' => esc_html__( 'Chart pie', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-clock' => esc_html__( 'Clock', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-fire' => esc_html__( 'Fire', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-heart' => esc_html__( 'Heart', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-mail' => esc_html__( 'Mail', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-play' => esc_html__( 'Play', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-shield' => esc_html__( 'Shield', 'waxom' ) ),
		array( 'vc_pixel_icon vc_pixel_icon-video' => esc_html__( 'Video', 'waxom' ) ),
	);
	
	vc_map( array(
	   "name" => esc_html__("Portfolio Carousel", "waxom"),
	   "base" => "portfolio_carousel",
	   "class" => "font-awesome",
	   "icon"      => "fa-briefcase",
	   "controls" => "full",
	   "description" => "Carousel of portfolio posts",
	   "category" => array("Carousels", "Posts"),
	   "params" => array(
	      array(
	         "type" => "checkbox",
	         "class" => "hidden-label",
	         "value" => waxom_vc_portfolio_cats(),
	         "heading" => esc_html__("Portfolio Categories", "waxom"),
	         "param_name" => "cats",
	         "admin_label" => true,
	         "description" => esc_html__("Select categories to be displayed in your carousel. Leave blank for all.", "waxom")
	      ),	      
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Number of posts to show", "waxom"),
	         "param_name" => "posts_nr",
	         "value" => "8",
	         "description" => esc_html__("This is a total number of posts in the carousel.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "heading" => esc_html__("Columns", "waxom"),
	         "param_name" => "cols",
	         "value" => array("5","4","3","2"),
	         "std" => "3",
	         "description" => esc_html__("Number of columns", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Style", "waxom"),
	         "param_name" => "thumb_style",
	         "value" => array(
	         	
	         		"Title + category" => "title_category",
	         		"Title + category, centered" => "title_category_center",
	         		"Title + excerpt" => "title_excerpt",
	         		"Default (details only on hover)" => "simple",
	         ),
	         "description" => esc_html__("Choose a style of your portfolio.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Hover Style", "waxom"),
	         "param_name" => "hover_style",
	         "value" => array(
	         	"Zoom and Link icons" => "link_zoom_icons",
	         		"Link Icon" => "link_icon",
	         		"Zoom icon + title, categories" => "icons_title_categories",
	         		"title, categories" => "title_categories",
	         ),
	         "description" => esc_html__("Choose a style of your portfolio.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Spacing", "waxom"),
	         "param_name" => "thumb_space",
	         "value" => array("Yes" => "yes","No" => "no"),
	         "description" => esc_html__("Enable or disable the white space between post thumbnails.", "waxom")
	      ),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Carousel Title", "waxom"),
	         "param_name" => "carousel_title",
	         "value" => "",
	         "description" => esc_html__("Optional carousel title.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Bullet Navigation", "waxom"),
	         "param_name" => "dots",
	         "value" => array("True" => "true","False" => "false"),
	         "description" => esc_html__("Enable or disable the carousel bullet navigation", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Arrow Navigation", "waxom"),
	         "param_name" => "nav",
	         "value" => array("False" => "false","True" => "true"),
	         "description" => esc_html__("Enable or disable the carousel arrow navigation", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Arrow Navigation Position", "waxom"),
	         "param_name" => "nav_position",
	         "value" => array("Top Right" => "top_right","Bottom" => "bottom"),
	         "dependency" => Array('element' => "nav", 'value' => array("true")),
	         "description" => esc_html__("Select position for the carousel arrow navigation.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Autoplay", "waxom"),
	         "param_name" => "autoplay",
	         "value" => array("True" => "true","False" => "false"),
	         "description" => esc_html__("Enable or disable the autoplay of the carousel.", "waxom")
	      ),
	      	array(
	      	   "type" => "textfield",
	      	   "class" => "hidden-label",
	      	   "heading" => esc_html__("Carousel Speed", "waxom"),
	      	   "param_name" => "autoplay_timeout",
	      	   "value" => "7000",
	      	   "description" => esc_html__("Time beetween slides in miliseconds. Default: 7000", "waxom")
	      	),
	   )
	));
	
	// Team Carousel
	
	vc_map( array(
	   "name" => esc_html__("Blog Carousel", "waxom"),
	   "base" => "blog_carousel",
	   "class" => "font-awesome",
	   "icon"      => "fa-file-text-o",
	   "controls" => "full",
	   "category" => array("Carousels", "Posts"),
	   "description" => "Carousel of your blog posts",
	   "params" => array(
	   	array(
	   	   "type" => "checkbox",
	   	   "class" => "hidden-label",
	   	   "value" => waxom_vc_blog_cats(),
	   	   "heading" => esc_html__("Blog Categories", "waxom"),
	   	   "param_name" => "cats",
	   	   "admin_label" => true,
	   	   "description" => esc_html__("Select categories to be displayed in your carousel. Leave blank for all.", "waxom")
	   	),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Number of posts to show", "waxom"),
	         "param_name" => "posts_nr",
	         "value" => "8",
	         "admin_label" => true,
	         "description" => esc_html__("Number of team members to be displayed in the carousel.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "heading" => esc_html__("Columns", "waxom"),
	         "param_name" => "cols",
	         "value" => array("5","4","3","2","1"),
	         "std" => "3",
	         "description" => esc_html__("Number of columns", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Style", "waxom"),
	         "param_name" => "style",
	         "value" => array(	         	
	         	 "Boxed" => "boxed",
				 "Minimal (no thumbnail)" => "minimal"
	         ),
	         "description" => esc_html__("Choose a style for your blog thumbnails.", "waxom")
	      ),
	      	array(
	      	   "type" => "dropdown",
	      	   "class" => "hidden-label",
	      	   "heading" => esc_html__("Hover Style", "waxom"),
	      	   "param_name" => "hover_style",
	      	   "value" => array(	         	
	      	   	 "Light - subtle hover effect" => "light",
	      	   	 "Accent - cover the background with accent color" => "accent"
	      	   ),
	      	   "dependency" => Array('element' => "style", 'value' => array("boxed")),
	      	   "description" => esc_html__("Choose a style for your blog thumbnails.", "waxom")
	      	),
	      array(
			  "type" => "dropdown",
			  "class" => "hidden-label",
	          "heading" => esc_html__("Post Meta Style", "waxom"),
	          "param_name" => "style_meta",
	          "value" => array(
				  "Minimal - just date on thumbnail" => "minimal",
				  "Classic Meta Section (below title)" => "classic"
	         ),
			"dependency" => Array('element' => "style", 'value' => array("boxed","classic")),
	         "description" => esc_html__("Choose a style for your post's meta (author, date, number of comments).", 'waxom')
	      ),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Carousel Title", "waxom"),
	         "param_name" => "carousel_title",
	         "value" => "Latest News",
	         "description" => esc_html__("Optional carousel title.", "waxom")
	      ),
		   array(
			   "type" => "textfield",
			   "class" => "hidden-label",
			   "heading" => esc_html__("View All button label", "waxom"),
			   "param_name" => "view_all",
			   "value" => "View All",
			   "dependency" => Array('element' => "carousel_title", 'not_empty' => true),
			   "description" => esc_html__("Set a label for the 'View All' button linking to your Blog page. Leave blank to disable.", 'waxom')
		   ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Bullet Navigation", "waxom"),
	         "param_name" => "dots",
	         "value" => array("True" => "true","False" => "false"),
	         "description" => esc_html__("Enable or disable the carousel bullet navigation", 'waxom')
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Bullet Navigation Align", "waxom"),
	         "param_name" => "dots_align",
	         "value" => array("Center" => "center","Left" => "left","Right" => "right"),
	         "dependency" => Array('element' => "dots", 'value' => array("true")),
	         "description" => esc_html__("Select the alignment for the carousel bullet navigation.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Arrow Navigation", "waxom"),
	         "param_name" => "nav",
	         "value" => array("False" => "false","True" => "true"),
	         "description" => esc_html__("Enable or disable the carousel arrow navigation", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Arrow Navigation Position", "waxom"),
	         "param_name" => "nav_position",
	         "value" => array("Bottom" => "bottom","Top Right" => "top_right"),
	         "dependency" => Array('element' => "nav", 'value' => array("true")),
	         "description" => esc_html__("Select position for the carousel arrow navigation.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Autoplay", "waxom"),
	         "param_name" => "autoplay",
	         "value" => array("True" => "true","False" => "false"),
	         "description" => esc_html__("Enable or disable the autoplay of the carousel.", "waxom")
	      ),
	      	array(
	      	   "type" => "textfield",
	      	   "class" => "hidden-label",
	      	   "heading" => esc_html__("Carousel Speed", "waxom"),
	      	   "param_name" => "autoplay_timeout",
	      	   "value" => "7000",
	      	   "description" => esc_html__("Time beetween slides in miliseconds. Default: 7000", "waxom")
	      	),
	      
	   )
	));
		
	// Testimonials Carousel
	
	vc_map( array(
	   "name" => esc_html__("Testimonials Carousel", "waxom"),
	   "base" => "testimonials",
	   "icon" => "fa-comments",
	   "class" => "font-awesome",
	   "category" => array("Carousels"),
	   "description" => "Fancy testimonials",
	   "params" => array(  
			array(
			   "type" => "dropdown",
			   "description" => "Choose a style for your testimonials carousel",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Testimonials Style", "waxom"),
			   "param_name" => "style",
			   "value" => array(
			   		"Basic Carousel" => "simple",
				    "Minimalistic Carousel" => "minimal",
			   		"Grid" => "grid"
			   	),
			   "admin_label" => true
			),
			array(	      
			 "type" => "textfield",
			 "class" => "hidden-label",
			 "heading" => esc_html__("Number of posts to show", "waxom"),
			 "param_name" => "posts_nr",
			 "value" => "8"
			),
			array(
			   "type" => "dropdown",
			   "heading" => esc_html__("Columns", "waxom"),
			   "param_name" => "cols",
			   "value" => array("4","3","2","1"),
			   "description" => esc_html__("Number of columns", "waxom")
			),
			array(
			   "type" => "textfield",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Carousel Title", "waxom"),
			   "param_name" => "carousel_title",
			   "value" => "",
			   "dependency" => Array('element' => "style", 'value' => array("simple","minimal")),
			   "description" => esc_html__("Optional carousel title.", "waxom")
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Bullet Navigation", "waxom"),
			   "param_name" => "dots",
			   "value" => array("True" => "true","False" => "false"),
			   "dependency" => Array('element' => "style", 'value' => array("simple","minimal")),
			   "description" => esc_html__("Enable or disable the carousel bullet navigation", "waxom")
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Arrow Navigation", "waxom"),
			   "param_name" => "nav",
			   "value" => array("False" => "false","True" => "true"),
			   "dependency" => Array('element' => "style", 'value' => array("simple","minimal")),
			   "description" => esc_html__("Enable or disable the carousel arrow navigation", "waxom")
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Arrow Navigation Position", "waxom"),
			   "param_name" => "nav_position",
			   "value" => array("Bottom" => "bottom","Top Right" => "top_right"),
			   "dependency" => Array('element' => "style", 'value' => array("simple","minimal")),
			   "description" => esc_html__("Select position for the carousel arrow navigation.", "waxom")
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Autoplay", "waxom"),
			   "param_name" => "autoplay",
			   "value" => array("True" => "true","False" => "false"),
			   "description" => esc_html__("Enable or disable the autoplay of the carousel.", "waxom")
			),
				array(
				   "type" => "textfield",
				   "class" => "hidden-label",
				   "heading" => esc_html__("Carousel Speed", "waxom"),
				   "param_name" => "autoplay_timeout",
				   "value" => "7000",
				   "description" => esc_html__("Time beetween slides in miliseconds. Default: 7000", "waxom")
				),
	   )
	));
	
	// Logos Carousel
	
	vc_map( array(
	   "name" => esc_html__("Logos Carousel", "waxom"),
	   "base" => "logos_carousel",
	   "icon" => "fa-css3",
	   "class" => "font-awesome",
	   "category" => array("Carousels"),
	   "description" => "Carousel of logo images",
	   "params" => array(  
			array(
				'type' => 'attach_images',
				'heading' => esc_html__( 'Images', 'waxom' ),
				'param_name' => 'images',
				'value' => '',
				'description' => esc_html__( 'Select images from media library.', 'waxom' )
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'On click', 'waxom' ),
				'param_name' => 'onclick',
				'value' => array(
					esc_html__( 'Do nothing', 'waxom' ) => 'link_no',
					esc_html__( 'Open custom link', 'waxom' ) => 'custom_link'
				),
				'description' => esc_html__( 'Define action for onclick event if needed.', 'waxom' )
			),
			array(
				'type' => 'exploded_textarea',
				'heading' => esc_html__( 'Custom links', 'waxom' ),
				'param_name' => 'custom_links',
				'description' => esc_html__( 'Enter links for each logo here. Divide links with linebreaks (Enter) . ', 'waxom' ),
				'dependency' => array(
					'element' => 'onclick',
					'value' => array( 'custom_link' )
				)
			),
			array(
			   "type" => "dropdown",
			   "heading" => esc_html__("Columns", "waxom"),
			   "param_name" => "cols",
			   "value" => array("7","6","5","4","3","2","1"),
				"std" => "4",
			   "description" => esc_html__("Number of columns", "waxom")
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Logos Height', 'waxom' ),
				'param_name' => 'logos_height',
				'value' => array(
					esc_html__( 'Regular', 'waxom' ) => 'regular',
					esc_html__( 'High', 'waxom' ) => 'high'
				),
				'description' => esc_html__( 'Use the "high" option for high, vertical logo images.', 'waxom' )
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Logos Style", "waxom"),
			   "param_name" => "logos_style",
			   'value' => array(
			   	esc_html__( 'Regular', 'waxom' ) => 'regular',
			   	esc_html__( 'Transparent - reduce opacity and increase on mouse hover.', 'waxom' ) => 'transparent'
			   ),
			   "description" => esc_html__("Choose a style of your logo carousel.", "waxom")
			),
			array(
			   "type" => "textfield",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Carousel Title", "waxom"),
			   "param_name" => "carousel_title",
			   "value" => "",
			   "description" => esc_html__("Optional carousel title.", "waxom")
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Bullet Navigation", "waxom"),
			   "param_name" => "dots",
			   "value" => array("True" => "true","False" => "false"),
			   "description" => esc_html__("Enable or disable the carousel bullet navigation", "waxom")
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Arrow Navigation", "waxom"),
			   "param_name" => "nav",
			   "value" => array("False" => "false","True" => "true"),
			   "description" => esc_html__("Enable or disable the carousel arrow navigation", "waxom")
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Arrow Navigation Position", "waxom"),
			   "param_name" => "nav_position",
			   "value" => array("Bottom" => "bottom","Top Right" => "top_right", "Side" => "side"),
			   "dependency" => Array('element' => "nav", 'value' => array("true")),
			   "description" => esc_html__("Select position for the carousel arrow navigation.", "waxom")
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Images Overlay", "waxom"),
			   "param_name" => "overlay",
			   "value" => array("No" => "no","Yes" => "yes"),
			   "description" => esc_html__("Enable or disable the gray background overlay behind logo images.", "waxom")
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Autoplay", "waxom"),
			   "param_name" => "autoplay",
			   "value" => array("True" => "true","False" => "false"),
			   "description" => esc_html__("Enable or disable the autoplay of the carousel.", "waxom")
			),
				array(
				   "type" => "textfield",
				   "class" => "hidden-label",
				   "heading" => esc_html__("Carousel Speed", "waxom"),
				   "param_name" => "autoplay_timeout",
				   "value" => "7000",
				   "description" => esc_html__("Time beetween slides in miliseconds. Default: 7000", "waxom")
				),
			
	   )
	));
	
	// Video Lightbox
	
	vc_map( array(
	   "name" => esc_html__("Video Lightbox", "waxom"),
	   "base" => "video_lightbox",
	   "icon" => "fa-play-circle-o",
	   "category" => array("Media"),
	   "class" => "font-awesome",
	   "description" => "Video in lightbox window",
	   "params" => array(  
	   		array(
	   			'type' => 'textfield',
	   			'heading' => esc_html__( 'Video link', 'waxom' ),
	   			'param_name' => 'link',
	   			'admin_label' => true,
	   			'description' => sprintf( esc_html__( 'Link to the video. More about supported formats at %s.', 'waxom' ), '<a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>' )
	   		),
		   array(
			   "type" => "textfield",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Title", "waxom"),
			   "param_name" => "title",
			   "value" => "Our video",
			   "desc" => esc_html__('Title of the element.', 'waxom')
		   ),
			array(	      
			 "type" => "textfield",
			 "class" => "hidden-label",
			 "heading" => esc_html__("Description", "waxom"),
			 "param_name" => "description",
			 "value" => "This is our video!",
			 "desc" => esc_html__('Description of the element', 'waxom')
			),
			array(	      
			 "type" => "textfield",
			 "class" => "hidden-label",
			 "heading" => esc_html__("Video length", "waxom"),
			 "param_name" => "length",
			 "value" => "03:46",
			 "desc" => esc_html__('Video length will be displayed under the description.', 'waxom')
			)
	   )
	));
	
	// Team Carousel
	
	vc_map( array(
	   "name" => esc_html__("Team Carousel", "waxom"),
	   "base" => "team_carousel",
	   "class" => "font-awesome",
	   "icon"      => "fa-users",
	   "controls" => "full",
	   "category" => array("Carousels", "Posts"),
	   "description" => "Carousel of your team members",
	   "params" => array(
	   	array(
	   	   "type" => "textfield",
	   	   "class" => "hidden-label",
	   	   "value" => "",
	   	   "heading" => esc_html__("Team Members ID", "waxom"),
	   	   "param_name" => "ids",
	   	   "description" => esc_html__("Insert IDs of specific team members to be displayed in this carousel. Leave blank to display all", "waxom")
	   	),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Number of posts to show", "waxom"),
	         "param_name" => "posts_nr",
	         "value" => "8",
	         "admin_label" => true,
	         "description" => esc_html__("Number of team members to be displayed in the carousel.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "heading" => esc_html__("Columns", "waxom"),
	         "param_name" => "cols",
	         "value" => array("5","4","3","2"),
	         "description" => esc_html__("Number of columns", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Style", "waxom"),
	         "param_name" => "style",
	         "value" => array(
	         	"Default - title, role and social icons below the thumbnail" => "simple",
	         	"Default Transparent - title, role and social icons below the thumbnail" => "transparent",
	         	"Circle - title, role and social icons below the rounded thumbnail" => "circle",
	         	"Hover - title, role and social icons displayed on thumbnail hover" => "hover",
	      		"Slide from bottom - member data slide up on thumbnail hover" => "slide_bottom"
	         ),
	         "description" => esc_html__("Choose a style of your portfolio.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Display member description", "waxom"),
	         "param_name" => "excerpt",
	         "value" => array("Yes" => "yes","No" => "no"),
	         "description" => esc_html__("Display team member's description.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Spacing", "waxom"),
	         "param_name" => "thumb_space",
	         "value" => array("Yes" => "yes","No" => "no"),
	         "description" => esc_html__("Enable or disable the white space between post thumbnails.", "waxom")
	      ),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Carousel Title", "waxom"),
	         "param_name" => "carousel_title",
	         "value" => "",
	         "description" => esc_html__("Optional carousel title.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Bullet Navigation", "waxom"),
	         "param_name" => "dots",
	         "value" => array("True" => "true","False" => "false"),
	         "description" => esc_html__("Enable or disable the carousel bullet navigation", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Arrow Navigation", "waxom"),
	         "param_name" => "nav",
	         "value" => array("False" => "false","True" => "true"),
	         "description" => esc_html__("Enable or disable the carousel arrow navigation", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Arrow Navigation Position", "waxom"),
	         "param_name" => "nav_position",
	         "value" => array("Bottom" => "bottom","Top Right" => "top_right"),
	         "dependency" => Array('element' => "nav", 'value' => array("true")),
	         "description" => esc_html__("Select position for the carousel arrow navigation.", "waxom")
	      ),
	      
	   )
	));
	
	// Team Grid
	
	vc_map( array(
	   "name" => esc_html__("Team Grid", "waxom"),
	   "base" => "team_grid",
	   "class" => "font-awesome",
	   "icon"      => "fa-users",
	   "controls" => "full",
	   "category" => array('Posts'),
	   "description" => "Portfolio posts grid",
	   "params" => array(
	      
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Team Grid Title", "waxom"),
	         "param_name" => "grid_title",
	         "value" => 'Portfolio',
	         "dependency" => Array('element' => "filter_style", 'value' => array("right", "right_bgcolor")),
	         "description" => esc_html__("Title of your portfolio grid displayed on the left (same row as filtering menu).", "waxom")
	      ),
	      array(
	         "type" => "checkbox",
	         "class" => "hidden-label",
	         "value" => waxom_vc_team_cats(),
	         "heading" => esc_html__("Team member positions", "waxom"),
	         "param_name" => "cats",
	         "description" => esc_html__("Select member positions to be displayed in the grid. Leave blank to display all.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "heading" => esc_html__("Columns", "waxom"),
	         "param_name" => "cols",
	         "value" => array("5","4","3","2"),
	         "std" => '4',
	         "description" => esc_html__("Number of columns", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Style", "waxom"),
	         "param_name" => "style",
	         "value" => array(
	         	"Default - title, role and social icons below the thumbnail" => "simple",
	         	"Circle - title, role and social icons below the rounded thumbnail" => "circle",
	         	"Hover - title, role and social icons displayed on thumbnail hover" => "hover",
	         	"Slide from botton - member data slide up on thumbnail hover" => "slide_bottom",
	         	"Side - member data displayed next to the thumbnail (left/right)" => "side"
	         ),
	         "description" => esc_html__("Choose a style of your team member thumbnail.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Spacing", "waxom"),
	         "param_name" => "thumb_space",
	         "value" => array("Yes" => "yes","No" => "no"),
	         "description" => esc_html__("Enable or disable the white space between post thumbnails.", "waxom")
	      ),	      
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Posts Number", "waxom"),
	         "param_name" => "posts_nr",
	         "value" => '',
	         "description" => esc_html__("Number of portfolio posts to be displayed. Leave blank for no limit.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Filtering menu", "waxom"),
	         "param_name" => "filter",
	         "value" => array("Yes" => "yes","No" => "no"),
	         "description" => esc_html__("Enable or disable the filterable effect.", "waxom"),
	         'group' => esc_html__( 'Filters', 'waxom' )
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Filtering menu style", "waxom"),
	         "param_name" => "filter_style",
	         "value" => array(
	         	"Default" => "default",
	         	"Default with fullwidth bottom grey border" => "default_border",
	         	"Current item with bg color" => "bgcolor",
	         	"Aligned right" => "right",
	         	"Aligned right, current item with bg color" => "right_bgcolor",
	         	"All Dark" => "dark",
	         	"All Dark, current item with bg color" => "dark2"
	         ),
	         "dependency" => Array('element' => "filter", 'value' => array("yes")),
	         "description" => esc_html__("Choose a style of the filtering menu.", "waxom"),
	         'group' => esc_html__( 'Filters', 'waxom' )
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Filtering counter", "waxom"),
	         "param_name" => "filter_counter",
	         "value" => array(
	         	"Yes" => "yes",
	         	"No" => "no"
	         ),
	         "dependency" => Array('element' => "filter", 'value' => array("yes")),
	         "description" => esc_html__("Enable or disable the portfolio item count in a specific category, displayed on category hover.", "waxom"),
	         'group' => esc_html__( 'Filters', 'waxom' )
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Filtering animation", "waxom"),
	         "param_name" => "animation",
	         "value" => array(
	        	 'quicksand',
	         	'rotateSides',
	         	'fadeOut',
	         	'boxShadow',
	         	'bounceLeft',
	         	'bounceTop',
	         	'bounceBottom',
	         	'moveLeft',
	         	'slideLeft',
	         	'fadeOutTop',
	         	'sequentially',
	         	'skew',
	         	'slideDelay',
	         	'flipOutDelay',
	         	'flipOut',
	         	'unfold',
	         	'foldLeft',
	         	'scaleDown',
	         	'scaleSides',
	         	'frontRow',
	         	'flipBottom',
	         	'rotateRoom'
	         ),
	         "std" => "quicksand",
	         "dependency" => Array('element' => "filter", 'value' => array("yes")),
	         "description" => esc_html__("Choose a style of the filtering menu.", "waxom"),
	         'group' => esc_html__( 'Filters', 'waxom' )
	      ),
	   )
	));
	
	// Portfolio Grid
	
	vc_map( array(
	   "name" => esc_html__("Portfolio Grid", "waxom"),
	   "base" => "portfolio_grid",
	   "class" => "font-awesome",
	   "icon"      => "fa-th",
	   "controls" => "full",
	   "category" => array('Posts'),
	   "description" => "Portfolio posts grid",
	   "params" => array(
	      
	      array(
	         "type" => "checkbox",
	         "class" => "hidden-label",
	         "value" => waxom_vc_portfolio_cats(),
	         "heading" => esc_html__("Portfolio Categories", "waxom"),
	         "param_name" => "cats",
	         "description" => esc_html__("Select categories to be displayed in the grid. Leave blank to display all.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "heading" => esc_html__("Columns", "waxom"),
	         "param_name" => "cols",
	         "value" => array("5","4","3","2"),
	         "std" => "4",
	         "description" => esc_html__("Number of columns", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Style", "waxom"),
	         "param_name" => "thumb_style",
	         "value" => array(
	         	"Title + Category" => "title_category",
	         	"Title + Category, Centered" => "title_category_center",
	      		"Title + Excerpt" => "title_excerpt",
	      		"Title + Category + Excerpt" => "title_category_excerpt",
	      		"Minimal (details only on hover)" => "simple"
	         ),
	         "description" => esc_html__("Choose a style of your portfolio.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "heading" => esc_html__("Love Like Button", "waxom"),
	         "param_name" => "love",
	         "value" => array("Yes" => "yes","No" => "no"),
	         "dependency" => Array('element' => "thumb_style", 'value' => array("title_category")),
	         "std" => "yes",
	         "description" => esc_html__("Enable/disable the love like button next to the post title.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Hover Style", "waxom"),
	         "param_name" => "hover_style",
	         "value" => array(	         	
	         	"Zoom and Link icons" => "link_zoom_icons",
	         	"Link Icon" => "link_icon",
	         	"Zoom icon + title, categories" => "icons_title_categories",
	         	"title, categories" => "title_categories",
	         	"Open lightbox" => "lightbox",
	         	"None" => "none"
	         ),
	         "description" => esc_html__("Choose a style of your portfolio.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Spacing", "waxom"),
	         "param_name" => "thumb_space",
	         "value" => array("Yes" => "yes","No" => "no"),
	         "description" => esc_html__("Enable or disable the white space between post thumbnails.", "waxom")
	      ),
	      array(
	         "type" => "textfield",
	         
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Spacing Amount", "waxom"),
	         "param_name" => "thumb_space_amount",
	         "dependency" => Array('element' => "thumb_space", 'value' => array("yes")),
	         "value" => '30',
	         "description" => esc_html__("Amount of space between thumbnails in pixels. Default: 30", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Thumbnail Size", "waxom"),
	         "std"	=> 'square',
	         "param_name" => "thumb_size",
	         "value" => array("Square" => "square","Original Aspect Ratio" => "auto"),
	         "description" => esc_html__("Portfolio grid thumbnails size.", "waxom")
	      ),	      
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Posts Number", "waxom"),
	         "param_name" => "posts_nr",
	         "value" => '',
	         "description" => esc_html__("Number of portfolio posts to be displayed. Leave blank for no limit.", "waxom")
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Ajax load more", "waxom"),
	         "param_name" => "ajax",
	         "value" => array("Yes" => "yes","No" => "no"),
	         "description" => esc_html__("Enable the dynamic loading of posts.", "waxom")
	      ),
	      array(
  	         "type" => "dropdown",
  	         "class" => "hidden-label",
  	         "heading" => esc_html__("Filtering menu", "waxom"),
  	         "param_name" => "filter",
  	         "value" => array("Yes" => "yes","No" => "no"),
  	         "description" => esc_html__("Enable or disable the filterable effect.", "waxom"),
  	         'group' => esc_html__( 'Filters', 'waxom' )
  	      ),
  	      array(
  	         "type" => "dropdown",
  	         "class" => "hidden-label",
  	         "heading" => esc_html__("Filtering menu style", "waxom"),
  	         "param_name" => "filter_style",
  	         "value" => array(
  	         	"Boxed" => "boxed",
  	         	"Regular (just text)" => "regular",
  	         ),
  	         "dependency" => Array('element' => "filter", 'value' => array("yes")),
  	         "description" => esc_html__("Choose a style of the filtering menu.", "waxom"),
  	         'group' => esc_html__( 'Filters', 'waxom' )
  	      ),
  	      array(
  	           "type" => "dropdown",
  	           "class" => "hidden-label",
  	           "heading" => esc_html__("Filtering menu color", "waxom"),
  	           "param_name" => "filter_color",
  	           "value" => array("Default Dark" => "dark","White" => "white"),
  	           "dependency" => Array('element' => "filter", 'value' => array("yes")),
  	           "description" => esc_html__("Select a color scheme for your filtering menu.", "waxom"),
  	           'group' => esc_html__( 'Filters', 'waxom' )
  	        ),
  	      array(
  	             "type" => "dropdown",
  	             "class" => "hidden-label",
  	             "heading" => esc_html__("Filtering menu counter", "waxom"),
  	             "param_name" => "filter_counter",
  	             "value" => array("Yes" => "yes","No" => "no"),
  	             "dependency" => Array('element' => "filter", 'value' => array("yes")),
  	             "description" => esc_html__("Enable or disable the item counter for each category.", "waxom"),
  	             'group' => esc_html__( 'Filters', 'waxom' )
  	          ),
  	      array(
  	         "type" => "dropdown",
  	         "class" => "hidden-label",
  	         "heading" => esc_html__("Filtering animation", "waxom"),
  	         "param_name" => "animation",
  	         "value" => array(
  	         	'rotateSides',
  	         	'fadeOut',
  	         	'quicksand',
  	         	'boxShadow',
  	         	'bounceLeft',
  	         	'bounceTop',
  	         	'bounceBottom',
  	         	'moveLeft',
  	         	'slideLeft',
  	         	'fadeOutTop',
  	         	'sequentially',
  	         	'skew',
  	         	'slideDelay',
  	         	'flipOutDelay',
  	         	'flipOut',
  	         	'unfold',
  	         	'foldLeft',
  	         	'scaleDown',
  	         	'scaleSides',
  	         	'frontRow',
  	         	'flipBottom',
  	         	'rotateRoom'
  	         ),
  	         "dependency" => Array('element' => "filter", 'value' => array("yes")),
  	         "description" => esc_html__("Choose a style of the filtering menu.", "waxom"),
  	         'group' => esc_html__( 'Filters', 'waxom' )
  	      ),
  	      array(
  	         "type" => "textfield",
  	         "class" => "hidden-label",
  	         "heading" => esc_html__("Portfolio Grid Title", "waxom"),
  	         "param_name" => "grid_title",
  	         "value" => 'Portfolio',
  	         "dependency" => Array('element' => "filter_style", 'value' => array("right", "right_bgcolor")),
  	         "description" => esc_html__("Title of your portfolio grid displayed on the left (same row as filtering menu).", "waxom")
  	      ),
	   )
	));
	
	// Blog
	
	vc_map( array(
	   "name" => esc_html__("Blog", "waxom"),
	   "base" => "vntd_blog",
	   "class" => "font-awesome",
	   "icon" => "fa-file-text-o",
	   "controls" => "full",
	   "category" => "Posts",
	   "params" => array(     
	      array(
	         "type" => "checkbox",
	         "class" => "hidden-label",
	         "value" => waxom_vc_blog_cats(),
	         "heading" => esc_html__("Blog Categories", "waxom"),
	         "param_name" => "cats"
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Blog Style", "waxom"),
	         "param_name" => "blog_style",
	         "value" => array(
	         	"Classic" 	=> "classic",
	         	"Grid" 		=> "grid",
	         	"Minimal"	=> "minimal"
	         )
	      ), 
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Grid Columns", "waxom"),
	         "param_name" => "grid_cols",
	         "value" => array("4","3","2"),
	         "std" => "3",
	         "dependency" => Array('element' => "blog_style", 'value' => array("grid"))
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Grid Style", "waxom"),
	         "param_name" => "grid_style",
	         "value" => array(
	         	"Boxed" 	=> "boxed",
	         	"Classic" 	=> "classic"
	         ),
	         "dependency" => Array('element' => "blog_style", 'value' => array("grid"))
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Grid Post Meta Style", "waxom"),
	         "param_name" => "style_meta",
	         "value" => array(
	         	"Classic Meta Section (below title)" => "classic",	         	
	         	"Minimal - just date on thumbnail" => "minimal"
	         ),
	         "description" => esc_html__("Choose a style for your post's meta (author, date, number of comments).", "waxom"),
	         "dependency" => Array('element' => "blog_style", 'value' => array("grid"))
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Ajax Pagination (Load More button)", "waxom"),
	         "param_name" => "ajax",
	         "value" => array(
	         	"No" 	=> "no",
	         	"Yes" 	=> "yes",
	         )
	      ),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Posts per page", "waxom"),
	         "param_name" => "posts_nr",
	         "value" => '',
	      )      
	   )
	));
	
	
	// Icon Box
	
	vc_map( array(
	   "name" => esc_html__("Icon Box", "waxom"),
	   "base" => "icon_box",
	   "class" => "font-awesome",
	   "icon" => "fa-check-circle-o",
	   "controls" => "full",
	   "category" => 'Content',
	   "description" => "Text with an icon",
	   "params" => array(
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Title", "waxom"),
	         "param_name" => "title",
	         "holder" => "h4",
	         "value" => 'Icon Box Title'
	      ), 	      
	      array(
	         "type" => "textarea",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Text Content", "waxom"),
	         "param_name" => "text",
	         "holder" => "span",
	         "value" => 'Icon Box text content, feel free to change it!',
	      ), 
	      array(
	        "type" => "textfield",
	        "heading" => esc_html__("URL (Link)", 'waxom'),
	        "param_name" => "url",
	        "description" => esc_html__("Optional icon link.", 'waxom')
	      ),
	      array(
	        "type" => "dropdown",
	        "heading" => esc_html__("Link Button", 'waxom'),
	        "param_name" => "link_button",
	        "value" => array(
	        	'No' => 'no',
	        	'Yes' => 'yes'
	        	),
	        "dependency" => Array('element' => "url", 'not_empty' => true)
	      ),
	      array(
	        "type" => "textfield",
	        "heading" => esc_html__("Link Button Label", 'waxom'),
	        "param_name" => "link_button_label",
	        "value" => 'Read more',
	        "dependency" => Array('element' => "link_button", 'value' => 'yes')
	      ),
	      array(
	        "type" => "dropdown",
	        "heading" => esc_html__("Target", 'waxom'),
	        "param_name" => "target",
	        "value" => $target_arr,
	        "dependency" => Array('element' => "url", 'not_empty' => true)
	      ),
	      array(
	         "type" => "dropdown",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Style", "waxom"),
	         "param_name" => "style",
	         "value" => array(
	         	'Big Centered' => 'big-centered-icon',
	         	'Big Centered Triangle' => 'big-centered-triangle',
	         	'Big Centered Circle' => 'big-centered',
	         	'Big Centered Circle Outline' => 'big-centered-outline',
	         	'Big Boxed'	=> 'boxed-solid',
	         	'Small Aligned Left'	=> 'small-left',
	         	'Medium Aligned Left'	=> 'medium-left',
	         	'Medium Aligned Left Triangle'	=> 'medium-left-triangle',
	         	'Medium Aligned Right'	=> 'medium-right',
	         	'Medium Aligned Right Triangle'	=> 'medium-right-triangle'
	         	)
	      ),
	      array(
	        "type" => "dropdown",
	        "heading" => esc_html__("Hover Effect", 'waxom'),
	        "param_name" => "animated",
	        "value" => array("Yes" => "yes","No" => "no"),
	        "description" => "Change icon box color on mouse over?",
	        "dependency" => Array('element' => "url", 'not_empty' => false)
	      ),
	      array(
	        "type" => "dropdown",
	        "heading" => esc_html__("Animated", 'waxom'),
	        "param_name" => "animated",
	        "value" => array("Yes" => "yes","No" => "no"),
	        "description" => "Enable the element fade in animation on scroll"
	      ),
	      	array(
	      	  "type" => "textfield",
	      	  "heading" => esc_html__("Animation Delay", 'waxom'),
	      	  "param_name" => "animation_delay",
	      	  "value" => '100',
	      	  "description" => "Fade in animation delay. Can be used to create a nice delay effect if multiple elements of same type.",
	      	  "dependency" => Array('element' => "animated", 'value' => 'yes')
	      	),
	      	
	      array(
	      	'type' => 'dropdown',
	      	'heading' => esc_html__( 'Icon library', 'waxom' ),
	      	'value' => array(
	      		esc_html__( 'Font Awesome', 'waxom' ) => 'fontawesome',
	      		esc_html__( 'Open Iconic', 'waxom' ) => 'openiconic',
	      		esc_html__( 'Typicons', 'waxom' ) => 'typicons',
	      		esc_html__( 'Entypo', 'waxom' ) => 'entypo',
	      		esc_html__( 'Linecons', 'waxom' ) => 'linecons',
	      		esc_html__( 'Pixel', 'waxom' ) => 'pixelicons',
	      	),
	      	'param_name' => 'icon_type',
	      	'description' => esc_html__( 'Select icon library.', 'waxom' ),
	      ),
	      array(
	      	'type' => 'iconpicker',
	      	'heading' => esc_html__( 'Icon', 'waxom' ),
	      	'param_name' => 'icon_fontawesome',
	          'value' => 'fa fa-info-circle',
	      	'settings' => array(
	      		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	      		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	      	),
	      	'dependency' => array(
	      		'element' => 'icon_type',
	      		'value' => 'fontawesome',
	      	),
	      	'description' => esc_html__( 'Select icon from library.', 'waxom' ),
	      ),
	      array(
	      	'type' => 'iconpicker',
	      	'heading' => esc_html__( 'Icon', 'waxom' ),
	      	'param_name' => 'icon_openiconic',
	      	'settings' => array(
	      		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	      		'type' => 'openiconic',
	      		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	      	),
	      	'dependency' => array(
	      		'element' => 'icon_type',
	      		'value' => 'openiconic',
	      	),
	      	'description' => esc_html__( 'Select icon from library.', 'waxom' ),
	      ),
	      array(
	      	'type' => 'iconpicker',
	      	'heading' => esc_html__( 'Icon', 'waxom' ),
	      	'param_name' => 'icon_typicons',
	      	'settings' => array(
	      		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	      		'type' => 'typicons',
	      		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	      	),
	      	'dependency' => array(
	      	'element' => 'icon_type',
	      	'value' => 'typicons',
	      ),
	      	'description' => esc_html__( 'Select icon from library.', 'waxom' ),
	      ),
	      array(
	      	'type' => 'iconpicker',
	      	'heading' => esc_html__( 'Icon', 'waxom' ),
	      	'param_name' => 'icon_entypo',
	      	'settings' => array(
	      		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	      		'type' => 'entypo',
	      		'iconsPerPage' => 300, // default 100, how many icons per/page to display
	      	),
	      	'dependency' => array(
	      		'element' => 'icon_type',
	      		'value' => 'entypo',
	      	),
	      ),
	      array(
	      	'type' => 'iconpicker',
	      	'heading' => esc_html__( 'Icon', 'waxom' ),
	      	'param_name' => 'icon_linecons',
	      	'settings' => array(
	      		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	      		'type' => 'linecons',
	      		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	      	),
	      	'dependency' => array(
	      		'element' => 'icon_type',
	      		'value' => 'linecons',
	      	),
	      	'description' => esc_html__( 'Select icon from library.', 'waxom' ),
	      ),
	      array(
	      	'type' => 'iconpicker',
	      	'heading' => esc_html__( 'Icon', 'waxom' ),
	      	'param_name' => 'icon_pixelicons',
	      	'settings' => array(
	      		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	      		'type' => 'pixelicons',
	      		'source' => $pixel_icons,
	      	),
	      	'dependency' => array(
	      		'element' => 'icon_type',
	      		'value' => 'pixelicons',
	      	),
	      	'description' => esc_html__( 'Select icon from library.', 'waxom' ),
	      ),     
	   )
	));	
	
	
	// Google Map
	
	vc_map( array(
	   "name" => esc_html__("Google Map", "waxom"),
	   "base" => "gmap",
	   "icon"      => "icon-wpb-map-pin",
	   "category" => 'Content',
	   "description" => "Map block",
	   "params" => array(
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Location Latitude", "waxom"),
	         "param_name" => "lat",
	         "value" => '41.862274',
	         "description" => esc_html__("Please insert the map address latitude if you have problems displaying it. Helpful site: <a target='_blank' href='http://www.latlong.net/'>http://www.latlong.net/</a>", "waxom")
	      ),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Location Longitude", "waxom"),
	         "param_name" => "long",
	         "value" => '-87.701328',
	         "description" => esc_html__("Please insert the map address longitude value.", "waxom")
	      ),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Map Height", "waxom"),
	         "param_name" => "height",
	         "value" => '400',
	         "description" => esc_html__("Height of the map element in pixels.", "waxom")
	      ),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Map Zoom", "waxom"),
	         "param_name" => "zoom",
	         "value" => '15',
	         "description" => esc_html__("Choose the map zoom. Default value: 15", "waxom")
	      ),
	      array(
	      	'type' => 'dropdown',
	      	'heading' => esc_html__( 'Map Style', 'waxom' ),
	      	'value' => array(
	      		esc_html__( 'Default', 'waxom' ) => 'default',
	      		esc_html__( 'Grayscale', 'waxom' ) => 'grayscale',
	      	),
	      	'param_name' => 'map_style',
	      	'description' => esc_html__( 'Choose a style for your map.', 'waxom' ),
	      ),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Marker 1 Title", "waxom"),
	         "param_name" => "marker1_title",
	         "value" => 'Office 1',
	         "description" => esc_html__("Marker 1 Title.", "waxom")
	      ),
	      
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Marker 1 Text", "waxom"),
	         "param_name" => "marker1_text",
	         "value" => 'Your description goes here.',
	         "description" => esc_html__("Marker 1 description text.", "waxom")
	      ),	      
	      array(
	        "type" => "dropdown",
	        "heading" => esc_html__("Marker 1 Location", 'waxom'),
	        "param_name" => "marker1_location",
	        "value" => array(esc_html__("Map Center", 'waxom') => "center", esc_html__("Custom", 'waxom') => "custom"),
	        "description" => esc_html__("The first marker location", 'waxom')
	      ),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Marker 1 Custom Location", "waxom"),
	         "param_name" => "marker1_location_custom",
	         "value" => '441.863774,-87.721328',
	         "description" => esc_html__("Marker 1 custom location in latitude,longitude format.", "waxom")
	      ),	
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Marker 2 Title", "waxom"),
	         "param_name" => "marker2_title",
	         "value" => '',
	         "description" => esc_html__("Marker 2 Title.", "waxom")
	      ), 
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Marker 2 Text", "waxom"),
	         "param_name" => "marker2_text",
	         "value" => 'My secondary marker description.',
	         "dependency" => Array('element' => "marker2_title", 'not_empty' => true),
	         "description" => esc_html__("Marker 2 description text.", "waxom")
	      ),
	      array(
	         "type" => "textfield",
	         "class" => "hidden-label",
	         "heading" => esc_html__("Marker 2 Custom Location", "waxom"),
	         "param_name" => "marker2_location",
	         "value" => '41.858774,-87.685328',
	         "dependency" => Array('element' => "marker2_title", 'not_empty' => true),
	         "description" => esc_html__("Marker 2 location in latitude,longitude format.", "waxom")
	      ),
	      array(
	      	'type' => 'dropdown',
	      	'heading' => esc_html__( 'Mouse scroll for zoom', 'waxom' ),
	      	'value' => array(
	      		esc_html__( 'No', 'waxom' ) => 'false',
	      		esc_html__( 'Yes', 'waxom' ) => 'true',
	      	),
	      	'param_name' => 'map_scroll',
	      	'description' => esc_html__( 'Choose a style for your map.', 'waxom' ),
	      )         
	      
	   )
	));
		
	vc_map( array(
	  "name" => esc_html__("Button", 'waxom'),
	  "base" => "button",
	  "icon" => "icon-wpb-ui-button",
	  "category" => 'Content',
	  "description" => "Theme Button",
	  "params" => array(
	    array(
	      "type" => "textfield",
	      "heading" => esc_html__("Text on the button", 'waxom'),
	      "holder" => "button",
	      "class" => "button",
	      "param_name" => "label",
	      "value" => esc_html__("Text on the button", 'waxom'),
	      "description" => esc_html__("Text on the button.", 'waxom')
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => esc_html__("URL (Link)", 'waxom'),
	      "param_name" => "url",
	      "description" => esc_html__("Button link.", 'waxom')
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Target", 'waxom'),
	      "param_name" => "target",
	      "value" => $target_arr,
	      "dependency" => Array('element' => "url", 'not_empty' => true)
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Button color", 'waxom'),
	      "param_name" => "color",
	      "class" => "hidden-label",
	      "value" => $colors_arr,
	      "description" => esc_html__("Select button color.", 'waxom'),
	    ),
		    array(
		      "type" => "colorpicker",
		      "heading" => esc_html__("Button custom color", 'waxom'),
		      "param_name" => "customcolor",
		      "class" => "hidden-label",
		      "description" => esc_html__("Select custom color for your button.", 'waxom'),
		      "dependency" => Array('element' => "color", 'value' => array('custom'))
		    ),
		    
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Button hover color", 'waxom'),
		  "param_name" => "hover",
		  "class" => "hidden-label",
		  "value" => array(esc_html__("Dark", 'waxom') => "dark", esc_html__("Accent", 'waxom') => "accent"),
		  "description" => esc_html__("Select button hover color.", 'waxom'),
		), 
		    
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Size", 'waxom'),
		  "param_name" => "size",
		  "class" => "hidden-label",
		  "value" => array(esc_html__("Regular size", 'waxom') => "regular", esc_html__("Small", 'waxom') => "small", esc_html__("Large", 'waxom') => "large"),
		  "description" => esc_html__("Button size.", 'waxom')
		),
		
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Style", 'waxom'),
		  "param_name" => "style",
		  "class" => "hidden-label",
		  "value" => array(esc_html__("Default", 'waxom') => "default", esc_html__("Square - no border radius", 'waxom') => "square", esc_html__("Rounded", 'waxom') => "circle"),
		  "description" => esc_html__("Button size.", 'waxom')
		),
		
		array(
		  "type" => "dropdown",
		  "heading" => esc_html__("Button Align", 'waxom'),
		  "param_name" => "align",
		  "value" =>  array(esc_html__("Left", 'waxom') => "", esc_html__("Centered", 'waxom') => "center"),
		  "description" => esc_html__("Button align.", 'waxom')
		),
	    array(
	      "type" => "dropdown",
	      "heading" => esc_html__("Icon", 'waxom'),
	      "param_name" => "icon_enabled",
	      "class" => "hidden-label",
	      "value" => array(esc_html__("No", 'waxom') => "no", esc_html__("Yes", 'waxom') => "yes",),
	      "description" => esc_html__("Button size.", 'waxom')
	    ),	
	    array(
	    	'type' => 'dropdown',
	    	'heading' => esc_html__( 'Icon library', 'waxom' ),
	    	'value' => array(
	    		esc_html__( 'Font Awesome', 'waxom' ) => 'fontawesome',
	    		esc_html__( 'Open Iconic', 'waxom' ) => 'openiconic',
	    		esc_html__( 'Typicons', 'waxom' ) => 'typicons',
	    		esc_html__( 'Entypo', 'waxom' ) => 'entypo',
	    		esc_html__( 'Linecons', 'waxom' ) => 'linecons',
	    		esc_html__( 'Pixel', 'waxom' ) => 'pixelicons',
	    	),
	    	'param_name' => 'icon_type',
	    	'description' => esc_html__( 'Select icon library.', 'waxom' ),
	    ),
	    array(
	    	'type' => 'iconpicker',
	    	'heading' => esc_html__( 'Icon', 'waxom' ),
	    	'param_name' => 'icon_fontawesome',
	        'value' => 'fa fa-info-circle',
	    	'settings' => array(
	    		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	    		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	    	),
	    	'dependency' => array(
	    		'element' => 'icon_type',
	    		'value' => 'fontawesome',
	    	),
	    	'description' => esc_html__( 'Select icon from library.', 'waxom' ),
	    ),
	    array(
	    	'type' => 'iconpicker',
	    	'heading' => esc_html__( 'Icon', 'waxom' ),
	    	'param_name' => 'icon_openiconic',
	    	'settings' => array(
	    		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	    		'type' => 'openiconic',
	    		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	    	),
	    	'dependency' => array(
	    		'element' => 'icon_type',
	    		'value' => 'openiconic',
	    	),
	    	'description' => esc_html__( 'Select icon from library.', 'waxom' ),
	    ),
	    array(
	    	'type' => 'iconpicker',
	    	'heading' => esc_html__( 'Icon', 'waxom' ),
	    	'param_name' => 'icon_typicons',
	    	'settings' => array(
	    		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	    		'type' => 'typicons',
	    		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	    	),
	    	'dependency' => array(
	    	'element' => 'icon_type',
	    	'value' => 'typicons',
	    ),
	    	'description' => esc_html__( 'Select icon from library.', 'waxom' ),
	    ),
	    array(
	    	'type' => 'iconpicker',
	    	'heading' => esc_html__( 'Icon', 'waxom' ),
	    	'param_name' => 'icon_entypo',
	    	'settings' => array(
	    		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	    		'type' => 'entypo',
	    		'iconsPerPage' => 300, // default 100, how many icons per/page to display
	    	),
	    	'dependency' => array(
	    		'element' => 'icon_type',
	    		'value' => 'entypo',
	    	),
	    ),
	    array(
	    	'type' => 'iconpicker',
	    	'heading' => esc_html__( 'Icon', 'waxom' ),
	    	'param_name' => 'icon_linecons',
	    	'settings' => array(
	    		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	    		'type' => 'linecons',
	    		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	    	),
	    	'dependency' => array(
	    		'element' => 'icon_type',
	    		'value' => 'linecons',
	    	),
	    	'description' => esc_html__( 'Select icon from library.', 'waxom' ),
	    ),
	    array(
	    	'type' => 'iconpicker',
	    	'heading' => esc_html__( 'Icon', 'waxom' ),
	    	'param_name' => 'icon_pixelicons',
	    	'settings' => array(
	    		'emptyIcon' => false, // default true, display an "EMPTY" icon?
	    		'type' => 'pixelicons',
	    		'source' => $pixel_icons,
	    	),
	    	'dependency' => array(
	    		'element' => 'icon_type',
	    		'value' => 'pixelicons',
	    	),
	    	'description' => esc_html__( 'Select icon from library.', 'waxom' ),
	    ),    
	    array(
	      "type" => "textfield",
	      "heading" => esc_html__("Margin Top", 'waxom'),
	      "param_name" => "margin_top",
	      "description" => esc_html__("Change button's top margin value. Default value: 0px", 'waxom')
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => esc_html__("Margin Bottom", 'waxom'),
	      "param_name" => "margin_bottom",
	      "description" => esc_html__("Change button's bottom margin value. Default value: 20px", 'waxom')
	    )
	  )
	));
	
	// Special Heading
	
	vc_map( array(
	   "name" => esc_html__("Special Heading", "waxom"),
	   "base" => "special_heading",
	   "class" => "no-icon",
	   "icon" => "fa-header",
	   "description" => "Centered heading text",
	   "category" => 'Content',
	   "params" => array(     
			array(
			    "type" => "textfield",	         
			    "heading" => esc_html__("Title", 'waxom'),
			    "param_name" => "title",
			    "holder" => "h5",
			    "description" => esc_html__("Main heading text.", 'waxom'),
			    "value" => "This is a Special Heading"
			),
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Subtitle", 'waxom'),
			    "param_name" => "subtitle",
			    "holder" => "span",
			    "description" => esc_html__("Smaller text visible below the Main one.", 'waxom'),
			    "value" => ""
			),    			    
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Animation", 'waxom'),
			  "param_name" => "animated",
			  "class" => "hidden-label",
			  "value" => array(esc_html__("Yes", 'waxom') => "yes", esc_html__("No", 'waxom') => "no"),
			  "description" => esc_html__("Enable the fade-in animation of the heading elements on site scroll.", 'waxom')
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Title Font", "waxom"),
			   "param_name" => "font",
			   "value" => array(
			   	'Primary' => '',
			   	'Secondary' => 'secondary'
			   	)
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Text Align", "waxom"),
			   "param_name" => "text_align",
			   "value" => array(
			   	'Center' => '',
			   	'Left' => 'left'
			   	)
			),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Margin Bottom", 'waxom'),
			  "param_name" => "margin_bottom",
			  "class" => "hidden-label",
			  "value" => '30',
			  "description" => esc_html__("Bottom margin of the heading section, given in pixels. Default: 30", 'waxom')
			)
			
	   )
	));	
	
	// Special Heading
	
	vc_map( array(
	   "name" => esc_html__("Hero Section", "waxom"),
	   "base" => "waxom_hero_section",
	   "class" => "font-awesome",
	   "icon" => "fa-eye",
	   "description" => "Simple Hero Section",
	   "category" => 'Content',
	   "params" => array(     
			array(
			    "type" => "textfield",	         
			    "heading" => esc_html__("Main Heading", 'waxom'),
			    "param_name" => "title",
			    "description" => esc_html__("Main Hero Section heading.", 'waxom'),
			    "value" => "My Hero Section"
			),
			array(
			    "type" => "textfield",	         
			    "heading" => esc_html__("Secondary Heading", 'waxom'),
			    "param_name" => "subheading",
			    "description" => esc_html__("Secondary Hero Section heading.", 'waxom'),
			    "value" => "Secondary Heading"
			),
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Subtitle", 'waxom'),
			    "param_name" => "subtitle",
			    "description" => esc_html__("Smaller text visible below the Main one.", 'waxom'),
			    "value" => ""
			),   
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Background Media Type", "waxom"),
			   "param_name" => "media_type",
			   "value" => array(
			   		'Images' => 'images',
			   		'YouTube video' => 'youtube',
			   		'None' => ''
			   	)
			),  
			array(
				'type' => 'attach_images',
				'heading' => esc_html__( 'Images', 'waxom' ),
				'param_name' => 'images',
				'value' => '',
				'description' => esc_html__( 'Select images from media library. If more than is selected, images will be displayed as a slider.', 'waxom' ),
				'dependency' => array(
					'element' => 'media_type',
					'value' => 'images'
				),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'YouTube video link', 'waxom' ),
				'param_name' => 'youtube_url',
				'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k', // default video url
				'description' => esc_html__( 'Add YouTube link.', 'waxom' ),
				'dependency' => array(
					'element' => 'media_type',
					'value' => array('youtube'),
				),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => "Background Overlay",
				"param_name" => "bg_overlay",
				"value" => array(
					"None" => "",
					"Dark" => "dark",
					"Darker" => "darker",
					"Black" => "black",
					"Accent" => "accent",
					"Light" => "light",
					"Dark Blue" => 'dark_blue'
				),
				"description" => esc_html__("Set a background overlay to darken or lighten the background image/video and make the text better visible.", 'waxom'),
			),
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Height", "waxom"),
			   "param_name" => "height",
			   "value" => array(
				   	'Fullscreen' => 'fullscreen',
				   	'Custom' => 'custom'
			   	)
			), 	
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom Hero Height', 'waxom' ),
				'param_name' => 'height_custom',
				'dependency' => array(
					'element' => 'height',
					'value' => 'custom',
				),
				'value' => '700px',
				"description" => esc_html__("Set a custom height for your hero section in pixels i.e: 400px, 600px, 800px", 'waxom'),
			),	
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Button 1 Label", 'waxom'),
			    "param_name" => "button1_label",

			    "description" => esc_html__("First button label.", 'waxom'),
			    "value" => "Button Text"
			),
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Button 1 URL", 'waxom'),
			    "param_name" => "button1_url",
			    "description" => esc_html__("First button URL (external link or #section_id)", 'waxom'),
			    "value" => "#second",
			    'dependency' => array(
			    	'element' => 'button1_label',
			    	'not_empty' => true,
			    ),
			),  
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Button 1 Color", "waxom"),
			   "param_name" => "button1_color",
			   "value" => array(
				   	'Accent' => "accent",
				   	'Accent 2' => "accent2",
				   	'Black' => "black",
				   	'Gray' => "gray",
				   	'Green' => "green",
				   	'White' => "white"
			   	),
			   	'dependency' => array(
			   		'element' => 'button1_label',
			   		'not_empty' => true,
			   	)
			), 	
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Button 1 Style", "waxom"),
			   "param_name" => "button1_style",
			   "value" => array(
				   	'Default' => 'default',
				   	'Stroke' => 'stroke'
			   	),
			   	'dependency' => array(
			   		'element' => 'button1_label',
			   		'not_empty' => true,
			   	)
			), 
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Button 2 Label", 'waxom'),
			    "param_name" => "button2_label",
			    "description" => esc_html__("Second button label.", 'waxom'),
			    "value" => "Button2 Text"
			),
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Button 2 URL", 'waxom'),
			    "param_name" => "button2_url",
			    "description" => esc_html__("Second button URL (external link or #section_id)", 'waxom'),
			    "value" => "#",
			    'dependency' => array(
			    	'element' => 'button2_label',
			    	'not_empty' => true,
			    ),
			),  
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Button 2 Color", "waxom"),
			   "param_name" => "button2_color",
			   "std" => "white",
			   "value" => array(
				   	'Accent' => "accent",
				   	'Accent 2' => "accent2",
				   	'Black' => "black",
				   	'Gray' => "gray",
				   	'Green' => "green",
				   	'White' => "white"
			   	),
			   	'dependency' => array(
			   		'element' => 'button2_label',
			   		'not_empty' => true,
			   	)
			), 	
			array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Button 2 Style", "waxom"),
			   "param_name" => "button2_style",
			   "value" => array(
				   	'Default' => 'default',
				   	'Stroke' => 'stroke'
			   	),
			   	'dependency' => array(
			   		'element' => 'button2_label',
			   		'not_empty' => true,
			   	)
			),    
			array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "value" => array(
					   "No" => 'no',
					   "Yes" => 'yes'
				   ),
				   "heading" => esc_html__("Scroll down button?", "waxom"),
				   "param_name" => "scroll_button",
				   "description" => esc_html__("Enable or disable a button that scrolls to a #second row of your page (row with an id 'second')", 'waxom'),
			),
			array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "value" => array(
					   "No" => 'no',
					   "Yes" => 'yes'
				   ),
				   "heading" => esc_html__("Bullet Navigation?", "waxom"),
				   "param_name" => "bullet_navigation",
				   'dependency' => array(
				   	'element' => 'media_type',
				   	'value' => 'images'
				   ),
				   "description" => esc_html__("Enable or disable the bullet navigation.", 'waxom'),
			),
			array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "value" => array(
					   "Yes" => 'yes',
					   "No" => 'no'
				   ),
				   "heading" => esc_html__("Arrow Navigation?", "waxom"),
				   "param_name" => "arrow_navigation",
				   'dependency' => array(
				   	'element' => 'media_type',
				   	'value' => 'images'
				   ),
				   "description" => esc_html__("Enable or disable the arrow navigation.", 'waxom'),
			),
			array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "value" => array(
					  "No" => 'false',
					  "Yes" => 'true',
				   ),
				   "heading" => esc_html__("Video Controls?", "waxom"),
				   "param_name" => "video_controls",
				   'dependency' => array(
				   	'element' => 'media_type',
				   	'value' => 'youtube'
				   ),
				   "description" => esc_html__("Enable or disable the video controls (play/pause/mute).", 'waxom'),
			),
			array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "value" => array(
					   "Yes" => 'true',
					   "No" => 'false'
				   ),
				   "heading" => esc_html__("Mute Video?", "waxom"),
				   "param_name" => "video_mute",
				   'dependency' => array(
				   	'element' => 'media_type',
				   	'value' => 'youtube'
				   ),
				   "description" => esc_html__("Mute the video.", 'waxom'),
			),
			array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "value" => array(
					   "Yes" => 'true',
					   "No" => 'false'
				   ),
				   "heading" => esc_html__("Video Autoplay?", "waxom"),
				   "param_name" => "video_autoplay",
				   'dependency' => array(
				   	'element' => 'media_type',
				   	'value' => 'youtube'
				   ),
				   "description" => esc_html__("Should the video start playing automatically?", 'waxom'),
			),
			
	   )
	));
	
	// Callout Box
	
	vc_map( array(
	   "name" => esc_html__("Callout Box", "waxom"),
	   "base" => "callout_box",
	   "class" => "font-awesome",
	   "icon" => "fa-align-left",
	   "category" => 'Content',
	   "description" => "Nice blockquote",
	   "params" => array(     
			array(
			    "type" => "textfield",	         
			    "heading" => esc_html__("Title", 'waxom'),
			    "param_name" => "title",
			    "holder" => "h3",
			    "description" => esc_html__("Main heading text.", 'waxom'),
			    "value" => "Callout"
			),
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Subtitle", 'waxom'),
			    "param_name" => "subtitle",
			    "holder" => "span",
			    "description" => esc_html__("Smaller text visible below the Main one.", 'waxom'),
			    "value" => "Callout Box subtitle"
			)
	   )
	));


		vc_map( array(
		   "name" => esc_html__("Portfolio Post Details", "waxom"),
		   "base" => "portfolio_details",
		   "class" => "font-awesome",
		   "icon" => "fa-suitcase",
		   "description" => "Single portfolio post details",
		   "category" => 'Content',
		   "params" => array(				
				array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "heading" => esc_html__("Style", "waxom"),
				   "param_name" => "style",
				   "value" => array(
				   	'Default Style - 2 columns' => 'default2',
				   	'Default Style - 1 column' => 'default1',
				   	'Minimal Style' => 'minimal'
				   	)
				),
				array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "heading" => esc_html__("Title", "waxom"),
				   "param_name" => "title_type",
				   "value" => array(
				   		'Post Title' => 'post_title',
				   		'Custom Title' => 'custom'
				   	)
				),
				array(
				    "type" => "textfield",	         
				    "heading" => esc_html__("Custom Title", 'waxom'),
				    "param_name" => "title",
				    "dependency" => array('element' => 'title_type', 'value' => array('custom')),
				    "description" => esc_html__("Custom main heading text.", 'waxom'),
				    "value" => "Project Details"
				),
				array(
				    "type" => "textarea_html",	       
				    "heading" => esc_html__("Text Content", 'waxom'),
				    "param_name" => "content",
				    "holder" => "div",
				    "description" => esc_html__("Smaller text visible below the Main one.", 'waxom'),
				    "value" => "Contrary to popular belief, Lorem Ipsum is not simply random text. It has rootsin piece of classical Latin literature from old. Richard McClintock, a Latin profes sor at Hampden-Sydney College in Virginia, looked up."
				),			
				array(
				    "type" => "textfield",	         
				    "heading" => esc_html__("Client Name", 'waxom'),
				    "param_name" => "client",
				    "holder"	=> "p",
				    "description" => esc_html__("Your project client name.", 'waxom'),
				    "dependency" => array('element' => 'style', 'value' => array('default2','default1')),
				    "value" => "Client Name"
				),	
				array(
				    "type" => "textfield",	         
				    "heading" => esc_html__("Client Website", 'waxom'),
				    "param_name" => "client_website",
				    "description" => esc_html__("Your project client's website. Leave blank to hide.", 'waxom'),
				    "dependency" => array('element' => 'style', 'value' => array('default2','default1')),
				    "value" => "www.client-site.com"
				),
				array(
				    "type" => "textfield",	         
				    "heading" => esc_html__("Budget", 'waxom'),
				    "param_name" => "budget",
				    "holder"	=> "p",
				    "description" => esc_html__("Project budget.", 'waxom'),
				    "value" => "$800 - $1200"
				),
				array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "heading" => esc_html__("Display Likes?", "waxom"),
				   "param_name" => "likes",
				   "value" => array(
				   		'Yes' => 'yes',
				   		'No' => 'no'
				   	)
				),	
				array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "heading" => esc_html__("Display Date?", "waxom"),
				   "param_name" => "date",
				   "value" => array(
				   		'No' => 'no',
				   		'Yes' => 'yes'
				   	),
				   	"dependency" => array('element' => 'style', 'value' => array('default2','default1')),
				),
				array(
				   "type" => "dropdown",
				   "class" => "hidden-label",
				   "heading" => esc_html__("Display Categories?", "waxom"),
				   "param_name" => "categories",
				   "value" => array(
				   		'Yes' => 'yes',
				   		'No' => 'no'
				   	)
				),	
				array(
				  "type" => "exploded_textarea",
				  "heading" => esc_html__("Skills", 'waxom'),
				  "param_name" => "skills",
				  "holder" => "p",
				  "value"	=> 'Design,Photography,HTML,jQuery',
				  "dependency" => array('element' => 'style', 'value' => array('default2','default1')),
				  "description" => esc_html__('Enter the projects skills here. Divide each feature with linebreaks (Enter).', 'waxom')
				),
					
				array(
				    "type" => "textfield",	         
				    "heading" => esc_html__("Button1 Label", 'waxom'),
				    "param_name" => "button1_label",
				    "description" => esc_html__("Primary button label.", 'waxom'),
				    "value" => "Live Preview"
				),
				array(
				    "type" => "textfield",	         
				    "heading" => esc_html__("Button1 URL", 'waxom'),
				    "param_name" => "button1_url",
				    "description" => esc_html__("Primary button URL.", 'waxom'),
				    "value" => "http://",
				    'dependency' => Array('element' => "button1_label", 'not_empty' => true)
				),
				array(
				    "type" => "textfield",	         
				    "heading" => esc_html__("Button2 Label", 'waxom'),
				    "param_name" => "button2_label",
				    "description" => esc_html__("Primary button label.", 'waxom'),
				    "value" => ""
				),
				array(
				    "type" => "textfield",	         
				    "heading" => esc_html__("Button2 URL", 'waxom'),
				    "param_name" => "button2_url",
				    "description" => esc_html__("Secondary button URL.", 'waxom'),
				    "value" => "http://",
				    'dependency' => Array('element' => "button1_label", 'not_empty' => true)
				)				 		   
				
			)
		));

	
	// Fancy Block
	
//	vc_map( array(
//	   "name" => esc_html__("Fancy Text Block", "waxom"),
//	   "base" => "fancy_text_block",
//	   "class" => "font-awesome",
//	   "icon" => "fa-list-alt",
//	   "category" => 'Content',
//	   "description" => "Eye-catching block of text",
//	   "params" => array( 
//	   		array(
//	   		  "type" => "dropdown",
//	   		  "heading" => esc_html__("Style", 'waxom'),
//	   		  "param_name" => "style",
//	   		  "class" => "hidden-label",
//	   		  "value" => array("Style 1" => "style1", "Style 2 (Transparent Background)" => "style2","Style 3 (Centered)" => "style3"),
//	   		  "description" => esc_html__("Enable the fade-in animation of the heading elements on site scroll.", 'waxom')
//	   		),    
//			array(
//			    "type" => "textfield",	         
//			    "heading" => esc_html__("Title", 'waxom'),
//			    "param_name" => "title",
//			    "holder" => "h2",
//			    "description" => esc_html__("Main heading text.", 'waxom'),
//			    "value" => "Fancy Title"
//			),
//			array(
//			    "type" => "textfield",	       
//			    "heading" => esc_html__("Subtitle", 'waxom'),
//			    "param_name" => "subtitle",
//			    "holder" => "h4",
//			    "description" => esc_html__("Smaller text visible below the Main one.", 'waxom'),
//			    "value" => "Fancy Block subtitle"
//			),
//			array(
//			    "type" => "textfield",	       
//			    "heading" => esc_html__("Alt Title", 'waxom'),
//			    "param_name" => "alttitle",
//			    "description" => esc_html__("Medium text visible above the Main one.", 'waxom'),
//			    "value" => "#01"
//			),
//			array(
//			    "type" => "textarea",	       
//			    "heading" => esc_html__("Text Content", 'waxom'),
//			    "param_name" => "text",
//			    "description" => esc_html__("Fancy Text Block content.", 'waxom'),
//			    "value" => "Text content"
//			),
//			array(
//			    "type" => "textfield",	       
//			    "heading" => esc_html__("Button Label", 'waxom'),
//			    "param_name" => "button_label",
//			    "description" => esc_html__("Button Label.", 'waxom'),
//			    "value" => "Continue"
//			),
//			array(
//			    "type" => "textfield",	       
//			    "heading" => esc_html__("Button URL", 'waxom'),
//			    "param_name" => "button_url",
//			    "description" => esc_html__("Button URL.", 'waxom'),
//			    "value" => "#"
//			),
//			array(
//			    "type" => "textfield",	       
//			    "heading" => esc_html__("Plus Icon URL", 'waxom'),
//			    "param_name" => "plus_url",
//			    "description" => esc_html__("URL for the big, PLUS icon. Leave blank to hide the icon.", 'waxom'),
//			    "value" => ""
//			)
//	   )
//	));
		
	// Social Icons
	
	$social_icons_param = array(
	  "type" => "dropdown",
	  "heading" => esc_html__("Style", 'waxom'),
	  "param_name" => "style",
	  "class" => "hidden-label",
	  "value" => array("Square" => "square", "Round" => "round"),
	  "description" => esc_html__("Social icons style.", 'waxom')
	);
	
	$social_icons_params_arr[] = $social_icons_param;
	
	$social_icons = array('mail' => "E-Mail",'facebook','twitter','instagram','mail' => "E-Mail",'tumblr','linkedin','youtube' => 'YouTube','vimeo','skype','google_plus' => 'Google Plus','flickr','dropbox','pinterest','dribbble','rss');
	
	$icon_key = '';
	
	foreach($social_icons as $social_icon_key => $social_icon_name) {
	
		$icon_key = $social_icon_key;
		
		if(is_numeric($social_icon_key)) {
			$icon_key = $social_icon_name;
		}
		
		$social_icons_params_arr[] = array(
		    "type" => "textfield",	         
		    "heading" => ucfirst($social_icon_name),
		    "param_name" => $icon_key,
		    "holder" => "h5",
		    "description" => ucfirst($social_icon_name).' social site URL.'
		);
	}
	
	vc_map( array(
	   "name" => esc_html__("Social Icons", "waxom"),
	   "base" => "social_icons",
	   "class" => "font-awesome",
	   "icon" => "fa-twitter",
	   "category" => 'Content',
	   "description" => "List of social icons",
	   "params" => $social_icons_params_arr
	));
	
	// Simple Contact Form
	
	
	include_once(ABSPATH . 'wp-admin/includes/plugin.php'); // Require plugin.php to use is_plugin_active() below

	if (is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
	
	vc_remove_element('contact-form-7');
	  global $wpdb;
	  $cf7 = $wpdb->get_results(
	    "
	    SELECT ID, post_title
	    FROM $wpdb->posts
	    WHERE post_type = 'wpcf7_contact_form'
	    "
	  );
	  $contact_forms = array();
	  if ($cf7) {
	  	$contact_forms['Select Contact Form'] = 'none';
	    foreach ( $cf7 as $cform ) {
	      $contact_forms[$cform->post_title] = $cform->ID;
	    }
	  } else {
	    $contact_forms["No contact forms found"] = 0;
	  }	  
	  vc_map( array(
	    "base" => "vntd_contact_form",
	    "name" => esc_html__("Contact Form 7", 'waxom'),
	    "icon" => "icon-wpb-contactform7",
	    "category" => esc_html__('Content', 'waxom'),
	    "description" => esc_html__('Place Contact Form7', 'waxom'),
	    "params" => array(
	      array(
	        "type" => "dropdown",
	        "heading" => esc_html__("Select contact form", 'waxom'),
	        "param_name" => "id",
	        "admin_label" => true,
	        "value" => $contact_forms,
	        "description" => esc_html__("Choose previously created Contact Form 7 form from the drop down list.", 'waxom')
	      ),
	      array(
	        "type" => "dropdown",
	        "heading" => esc_html__("Color Scheme", 'waxom'),
	        "param_name" => "color_scheme",
	        "value" => array("White" => "white", "Dark" => "dark"),
	        "description" => esc_html__("Color scheme of the contact form.", 'waxom')
	      ),
	      array(
	        "type" => "dropdown",
	        "heading" => esc_html__("Animated", 'waxom'),
	        "param_name" => "animated",
	        "value" => array("No" => "no", "Yes" => "no"),
	        "description" => esc_html__("Enable fade in animation on scroll", 'waxom')
	      )
	    )
	  ) );
	} // if contact form7 plugin active
	

	
	// Contact Block
	
	vc_map( array(
	   "name" => esc_html__("Contact Block", "waxom"),
	   "base" => "contact_block",
	   "class" => "font-awesome",
	   "icon" => "fa-envelope-square",
	   "description" => "Show off your contact data",
	   "category" => 'Content',
	   "params" => array( 
		   	array(
		   	    "type" => "textfield",	         
		   	    "heading" => esc_html__("Title", 'waxom'),
		   	    "param_name" => "title",
		   	    "holder" => "div",
		   	    "description" => esc_html__("Title of the contact block.", 'waxom'),
		   	    "value" => "Get in Touch"
		   	),  
		   	array(
		   	    "type" => "textarea",
		   	    "heading" => esc_html__("Description", 'waxom'),
		   	    "param_name" => "description",
		   	    "value" => "",
		   	    "description" => esc_html__("Optional description displayed under the title.", 'waxom')
		   	),  			
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Address", 'waxom'),
			    "param_name" => "address",
			    "holder" => "div",
			    "description" => esc_html__("Your address.", 'waxom'),
			    "value" => "Qaro, Street Name 6901, Melbourne Australia"
			),     
			array(
			    "type" => "textfield",	         
			    "heading" => esc_html__("Phone Number", 'waxom'),
			    "param_name" => "phone",
			    "holder" => "div",
			    "description" => esc_html__("Your phone number.", 'waxom'),
			    "value" => "0123 456 789"
			), 			    
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("E-Mail", 'waxom'),
			    "param_name" => "email",
			    "holder" => "div",
			    "description" => esc_html__("Your e-mail address.", 'waxom'),
			    "value" => "support@sitename.com"
			),
			array(
				"type" => "dropdown",
				"class" => "hidden-label",
				"value" => array(
					"Default" => 'default',
					"Centered (recommended for dark background images)" => 'centered',
				),
				"heading" => esc_html__("Style", "waxom"),
				"description" => esc_html__('Style of the Contact Block.', "waxom"),
				"param_name" => "style"
			), 
			
	   )
	));
	
	// Call to Action
	
	vc_map( array(
	   "name" => esc_html__("Call to Action", "waxom"),
	   "base" => "cta",
	   "class" => "",
	   "icon" => "icon-wpb-call-to-action",
	   "controls" => "edit_popup_delete",
	   "category" => 'Content',
	   "description" => "Heading text with buttons",
	   "params" => array(   	  
	      array(
	          "type" => "textarea",
	          "heading" => esc_html__("Heading", 'waxom'),
	          "param_name" => "heading",
	          "value" => "I am main heading!",
	          "description" => esc_html__("Enter your Call to Action Heading", 'waxom'),
	          "admin_label" => true
	      ),
	      array(
	          "type" => "textarea",
	          "heading" => esc_html__("Subtitle", 'waxom'),
	          "param_name" => "subtitle",
	          "value" => "I'm the CTA subtitle, feel free to change me!",
	          "description" => esc_html__("Subtitle displayed under the main Heading.", 'waxom'),
	          "admin_label" => true
	      ),
	      array(
	      	"type" => "dropdown",
	      	"class" => "hidden-label",
	      	"value" => array(
	      		"Default (Floated)" => 'default',
	      		"Centered (buttons below text)" => 'centered'
	      	),
	      	"heading" => esc_html__("Style", "waxom"),
	      	"description" => esc_html__('Style of your Call to Action area.', "waxom"),
	      	"param_name" => "style"
	      	),	
	      array(
	      	      	"type" => "dropdown",
	      	      	"class" => "hidden-label",
	      	      	"value" => array(
	      	      		"First" => 'first',
	      	      		"None" => 'none'
	      	      	),
	      	      	"heading" => esc_html__("Highlight a specific word", "waxom"),
	      	      	"description" => esc_html__('If "first" is selected, the first word of your heading will be displayed bold in desired color.', "waxom"),
	      	      	"param_name" => "highlight"
	      	      	),
	      	      	
	      array(
				"type" => "dropdown",
				"class" => "hidden-label",
				"value" => array(
					"Accent" => 'accent',
					"Accent 2" => 'accent2',
					"Accent 3" => 'accent3',
					"Accent 4" => 'accent4',
					"White" => 'white'
				),
				"heading" => esc_html__("Highlight color", "waxom"),
				"description" => esc_html__('Choose the word highlight color.', "waxom"),
				"dependency" => Array('element' => "highlight", 'value' => array('first')),
				"param_name" => "highlight_color"
				),
	      array(
	          "type" => "textfield",	          
	          "heading" => esc_html__("Button 1 Label", 'waxom'),
	          "param_name" => "button1_title",
	          "description" => esc_html__("Enter the title for the first button", 'waxom'),
	          "value" => "Click me!",
	          "admin_label" => true
	      ),
	      array(
	          "type" => "textfield",
	          "heading" => esc_html__("Button 1 Link", 'waxom'),
	          "param_name" => "button1_url",
	          "description" => esc_html__("Enter the URL the first button will link to", 'waxom'),
	          "value" => "http://"
	      ), 
	      array(
	          "type" => "textfield",	          
	          "heading" => esc_html__("Button 2 Label", 'waxom'),
	          "param_name" => "button2_title",
	          "description" => esc_html__("Enter the title for the second button", 'waxom'),
	          "value" => ""
	      ),
	      array(
	          "type" => "textfield",
	          "heading" => esc_html__("Button 2 Link", 'waxom'),
	          "param_name" => "button2_url",
	          "description" => esc_html__("Enter the URL the second button will link to", 'waxom'),
	          "dependency" => Array('element' => "button2_title", 'not_empty' => true),
	          "value" => "http://"
	      ),
	      
	      	
	      array(
	         "type" => "dropdown",
         	"class" => "hidden-label",
         	"value" => array(
         		"Light" => 'light',
         		"Accent" => 'accent',
         		"Dark" => 'dark',
         		"None (you can set the background color/image in the row's Design tab)" => 'none',
         		"Custom" => 'custom'
         	),
         	"std" => "none",
	         "heading" => esc_html__("Background color", "waxom"),
	         "param_name" => "bg_color",
	         "description" => esc_html__("Select text color. Leave blank for default", 'waxom'),
	      ), 
	      array(
	         "type" => "colorpicker",
	         "heading" => esc_html__("Custom Background Color", "waxom"),
	         "param_name" => "bg_color_custom",
	         "value" => '',
	         "dependency" => Array('element' => "bg_color", 'value' => array("custom")),
	         "description" => esc_html__("Select a custom color for your background.", 'waxom'),
	      ),  
	      array(
	         "type" => "dropdown",
	      	"class" => "hidden-label",
	      	"value" => array(
	      		"Dark" => 'dark',
	      		"White" => 'white'
	      	),
	         "heading" => esc_html__("Text color", "waxom"),
	         "param_name" => "text_color",
	         "description" => esc_html__("Select text color. Leave blank for default", 'waxom'),
	      ),    
	      array(
	      	"type" => "dropdown",
	      	"class" => "hidden-label",
	      	"value" => array(
	      		"Accent 1" => 'accent',
	      		"Accent 2" => 'accent2',
	      		"Accent 3" => 'accent3',
	      		"Dark" => 'dark',
				"White" => 'white'
	      	),
	      	"heading" => esc_html__("Button 1 Color", "waxom"),
	      	"description" => esc_html__('Color of your Call to Action area button.', "waxom"),
	      	"param_name" => "button1_color"
	      	),
		   array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "value" => array(
				   "Default" => 'default',
				   "Stroke (outline)" => 'stroke'
			   ),
			   "heading" => esc_html__("Button 1 Style", "waxom"),
			   "description" => esc_html__('Style of your Call to Action area button.', "waxom"),
			   "param_name" => "button1_style"
		   ),
		   array(
			"type" => "dropdown",
			"class" => "hidden-label",
			"value" => array(
				"Accent" => 'accent',
				"Dark" => 'dark'   		
			),
			"heading" => esc_html__("Button 2 Color", "waxom"),
			"dependency" => Array('element' => "button2_title", 'not_empty' => true),
			"description" => esc_html__('Color of your Call to Action area buttons.', "waxom"),
			"param_name" => "button2_color"
		),   
	      array(
	          "type" => "textfield",
	          "heading" => esc_html__("Margin bottom", 'waxom'),
	          "param_name" => "margin_bottom",
	          "value" => "0",
	          "dependency" => Array('element' => "fullscreen", 'value' => array("yes"))
	      )    
	   )
	));
	
	// Centered Heading
	
	vc_map( array(
	   "name" => esc_html__("Pricing Box", "waxom"),
	   "base" => "pricing_box",
	   "class" => "font-awesome",
	   "icon" => "fa-usd",
	   "category" => 'Content',
	   "description" => "Product box with prices",
	   "params" => array(     
			array(
			    "type" => "textfield",	         
			    "heading" => esc_html__("Box Title", 'waxom'),
			    "param_name" => "title",
			    "description" => esc_html__("Your Pricing Box title", 'waxom'),
			    "value" => "",
			    "admin_label" => true
			),
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Price", 'waxom'),
			    "param_name" => "price",
			    "description" => esc_html__("Pricing Box price", 'waxom'),
			    "value" => "$99",
			    "admin_label" => true,
			),  
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Period", 'waxom'),
			    "param_name" => "period",
			    "description" => esc_html__("Pricing Box period", 'waxom'),
			    "value" => "per year",	
			), 
			array(
			  "type" => "exploded_textarea",
			  "heading" => esc_html__("Features", 'waxom'),
			  "param_name" => "features",
			  "description" => esc_html__('Enter features here. Divide each feature with linebreaks (Enter). You can also use FontAwesome icons like fa-close for red cross icon or fa-check for green check icon!', 'waxom')
			),  
			array(
				"type" => "dropdown",
				"class" => "hidden-label",
				"value" => array(
					"Light Gray" => "light_gray",
					"Dark Gray" => 'gray',					
					"Accent" => 'accent',					
					"Custom" => 'custom'
				),
				"heading" => esc_html__("Pricing Box Color", "waxom"),
				"description" => esc_html__('Choose a color for your pricing box.', "waxom"),
				"param_name" => "color",
				'group' => esc_html__( 'Design Tab', 'waxom' )
				),
			array(
			   "type" => "colorpicker",
			   "heading" => esc_html__("Custom Pricing Box Color", "waxom"),
			   "param_name" => "color_custom",
			   "value" => '',
			   "dependency" => Array('element' => "color", 'value' => array("custom")),
			   'group' => esc_html__( 'Design Tab', 'waxom' ),
			   "description" => esc_html__("Select a custom color for your pricing box.", 'waxom'),
			), 
			array(
				"type" => "dropdown",
				"class" => "hidden-label",
				"value" => array(
					"None" => 'none',
					"All corners" => 'all',
					"Left Corners" => 'left',
					"Right Corners" => 'right'					
				),
				"heading" => esc_html__("Border Radius", "waxom"),
				"description" => esc_html__('Choose corners to be rounded.', "waxom"),
				"param_name" => "border_radius",
				'group' => esc_html__( 'Design Tab', 'waxom' )
				),
			array(
				"type" => "dropdown",
				"class" => "hidden-label",
				"value" => array(
					"Not Featured" => 'no',
					"Featured" => 'yes',
				),
				"heading" => esc_html__("Featured?", "waxom"),
				"description" => esc_html__('Make the box stand out from the crew.', "waxom"),
				"param_name" => "featured"	
				),
			
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Button Label", 'waxom'),
			    "param_name" => "button_label",
			    "description" => esc_html__("Text visible on the box button", 'waxom'),
			    "value" => "Buy Now"
			),  
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Button URL", 'waxom'),
			    "param_name" => "button_url",
			    "description" => esc_html__("Button URL, start with http://", 'waxom'),
			    "value" => ""	
			),
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Animated", 'waxom'),
			  "param_name" => "animated",
			  "value" => array("Yes" => "yes","No" => "no"),
			  "description" => "Enable the element fade in animation on scroll"
			),
				array(
				  "type" => "textfield",
				  "heading" => esc_html__("Animation Delay", 'waxom'),
				  "param_name" => "animation_delay",
				  "value" => '100',
				  "description" => "Fade in animation delay. Can be used to create a nice delay effect if multiple elements of same type.",
				  "dependency" => Array('element' => "animated", 'value' => 'yes')
				),
				
			
				
			
	   )
	));
	
	// Centered Heading
	
	vc_map( array(
	   "name" => esc_html__("Counter", "waxom"),
	   "base" => "counter",
	   "class" => "font-awesome",
	   "icon" => "fa-clock-o",
	   "category" => 'Content',
	   "description" => "Countdown numbers",
	   "params" => array(     
			array(
			    "type" => "textfield",	         
			    "heading" => esc_html__("Counter Title", 'waxom'),
			    "param_name" => "title",
			    "description" => esc_html__("Your Counter title.", 'waxom'),
			    "value" => "Days",
			    "admin_label" => true
			),
			array(
			    "type" => "textfield",	       
			    "heading" => esc_html__("Number value", 'waxom'),
			    "param_name" => "number",
			    "description" => esc_html__("Value of the counter number.", 'waxom'),
			    "value" => "100",
			    "admin_label" => true
			),
			array(
			   "type" => "dropdown",
				"class" => "hidden-label",
				"value" => array(
					"Accent" => 'accent',
					"Dark" => 'dark',
					"White" => 'white',
					"Custom" => 'custom'
				),
			   "heading" => esc_html__("Counter Color", "waxom"),
			   "param_name" => "color",
			   "description" => esc_html__("Select counter color.", 'waxom'),
			),
			array(
			   "type" => "colorpicker",
			   "heading" => esc_html__("Counter Color", "waxom"),
			   "param_name" => "color_custom",
			   "value" => '',
			   "dependency" => Array('element' => "color", 'value' => array("custom")),
			   "description" => esc_html__("Select a custom color for the counter's icon and text.", 'waxom'),
			), 
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library', 'waxom' ),
				'value' => array(
					esc_html__( 'Font Awesome', 'waxom' ) => 'fontawesome',
					esc_html__( 'Open Iconic', 'waxom' ) => 'openiconic',
					esc_html__( 'Typicons', 'waxom' ) => 'typicons',
					esc_html__( 'Entypo', 'waxom' ) => 'entypo',
					esc_html__( 'Linecons', 'waxom' ) => 'linecons',
					esc_html__( 'Pixel', 'waxom' ) => 'pixelicons',
				),
				'param_name' => 'icon_type',
				
				'description' => esc_html__( 'Select icon library.', 'waxom' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'waxom' ),
				'param_name' => 'icon_fontawesome',
			    'value' => 'fa fa-info-circle',
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome',
				),
				'description' => esc_html__( 'Select icon from library.', 'waxom' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'waxom' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'openiconic',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'waxom' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'waxom' ),
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'typicons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
				'element' => 'icon_type',
				'value' => 'typicons',
			),
				'description' => esc_html__( 'Select icon from library.', 'waxom' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'waxom' ),
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'entypo',
					'iconsPerPage' => 300, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'waxom' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'linecons',
					'iconsPerPage' => 200, // default 100, how many icons per/page to display
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'waxom' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'waxom' ),
				'param_name' => 'icon_pixelicons',
				'settings' => array(
					'emptyIcon' => false, // default true, display an "EMPTY" icon?
					'type' => 'pixelicons',
					'source' => $pixel_icons,
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'pixelicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'waxom' ),
			),			
			
	   )
	));
	
	
	
	// Veented Slider
	
	vc_map( array(
	   "name" => esc_html__("Veented Slider", "waxom"),
	   "base" => "veented_slider",
	   "class" => "font-awesome",
	   "icon" => "fa-picture-o",
	   "category" => 'Media',
	   "params" => array(     
			array(
			   "type" => "checkbox",
			   "class" => "hidden-label",
			   "value" => waxom_vc_slider_cats(),
			   "heading" => esc_html__("Slide Categories", "waxom"),
			   "param_name" => "cats",
			   "admin_label" => true,
			   "description" => esc_html__("Select categories to be displayed in your carousel. Leave blank to display all.", "waxom")
			),
			array(
			   "type" => "dropdown",
				"class" => "hidden-label",
				"value" => array(
					"Fullscreen" => 'fullscreen',
					"Custom" => 'custom'
				),
			   "heading" => esc_html__("Slider Height", "waxom"),
			   "param_name" => "height",
			   "description" => esc_html__("Set the height of your slider.", 'waxom'),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Custom Slider Height', 'waxom' ),
				'param_name' => 'height_custom',
				'dependency' => array(
					'element' => 'height',
					'value' => 'custom',
				),
				'value' => '700px',
				"description" => esc_html__("Set a custom height for your slider in pixels i.e: 400px, 600px, 800px", 'waxom'),
			),
		   array(
			   "type" => "dropdown",
			   "class" => "hidden-label",
			   "value" => array(
				   "No" => 'no',
				   "Yes" => 'yes'
			   ),
			   "heading" => esc_html__("Scroll down button?", "waxom"),
			   "param_name" => "scroll_button",
			   "description" => esc_html__("Enable or disable a button that scrolls to a #second row of your page (row with an id 'second')", 'waxom'),
		   ),
		   array(
			   "type" => "textfield",
			   "class" => "hidden-label",
			   "heading" => esc_html__("Autoplay", "waxom"),
			   "param_name" => "autoplay",
			   'value' => '7000',
			   "description" => esc_html__("Delay between slide transitions in miliseconds (7000ms = 7s). Leave blank to disable autoplay.", 'waxom'),
		   ),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Slider Top Offset', 'waxom' ),
				'param_name' => 'offset',
				'value' => '0px',
				"description" => esc_html__("Set a top offset for your slider: it's an additional space added above the slider's text. It's useful for vertically centering the slider's content when using a transparent header style. Provide a value in pixels like: 80px, 50px etc.", 'waxom'),
			),
	   )
	));


}
  

?>