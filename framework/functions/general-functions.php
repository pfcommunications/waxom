<?php

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
// 		Theme Functions
//
//		Q: Why place theme here instead of the functions.php file?
//		A: WordPress totally breaks if you make any accident changes
//		   to that file.
//
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Image cropping functions
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if(!function_exists("waxom_thumb")) {
	function waxom_thumb($w,$h = null){
	
		require_once get_template_directory() . '/includes/aq_resizer.php';
		
		global $post;
		$imgurl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail');
		return $imgurl[0];
		return aq_resize($imgurl[0],$w,$h,true);
	}
}

if(!function_exists("waxom_body_class")) {
	function waxom_body_class() {
	
		global $post;
	
		$return = '';
		
		if(!is_front_page() && waxom_option('header_title') != 0 && get_post_meta(get_the_ID(), 'page_header', true) != 'no-header' && !is_page_template('template-onepager.php') || is_search() && waxom_option('header_title') != 0) {
			
			$return .= ' page-with-title'; 
		}
		
		$header_style = 'style-default';
		
		if(waxom_header_style()) $header_style = waxom_header_style();
		
		if(waxom_option('topbar') && $header_style != 'style-boxed' && $header_style != 'style-transparent' && $header_style != 'style-minimal1') {
			$return .= ' page-with-topbar';
		}
		
		if(waxom_vc_active()) {
			$return .= ' page-with-vc';
		} else {
			$return .= ' page-without-vc';
		}
		
		return 'header-'.waxom_header_style().$return;
		return null;
	}
}


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// 		Pagination
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


function waxom_pagination($the_query = NULL)
{  

	global $wp_query,$paged;
	
	$query = '';
	
	if(!$the_query) {
		$query = $wp_query;
	} else {
		$query = $the_query;
	}
	
	$big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
             'format' => ( ( get_option( 'permalink_structure' ) && ! $query->is_search ) || ( is_home() && get_option( 'show_on_front' ) !== 'page' && ! get_option( 'page_on_front' ) ) ) ? '?paged=%#%' : '&paged=%#%', // %#% will be replaced with page number	
            'current' => max( 1, get_query_var('paged') ),
            'total' => $query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text' => '<i class="fa fa-angle-left"></i>'.esc_html__('Prev','waxom'),
			'next_text' => esc_html__('Next','waxom').'<i class="fa fa-angle-right"></i>'
        ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="blog_pagination t-left"><ul class="vntd-pagination">';
        foreach ( $pages as $page ) {
                echo "<li>".$page."</li>";
        }
       echo '</ul></div>';
    }
        
        
	
}

// Pretty Permalinks Fix for Custom Post Types

add_action('init', 'waxom_custom_rewrite_basic');
function waxom_custom_rewrite_basic() {
    global $wp_post_types;
    foreach ($wp_post_types as $wp_post_type) {
        if ($wp_post_type->_builtin) continue;
        if (!$wp_post_type->has_archive && isset($wp_post_type->rewrite) && isset($wp_post_type->rewrite['with_front']) && !$wp_post_type->rewrite['with_front']) {
            $slug = (isset($wp_post_type->rewrite['slug']) ? $wp_post_type->rewrite['slug'] : $wp_post_type->name);
            $page = waxom_get_page_by_slug($slug);
            if ($page) add_rewrite_rule('^' .$slug .'/page/([0-9]+)/?', 'index.php?page_id=' .$page->ID .'&paged=$matches[1]', 'top');
        }
    }
}

function waxom_get_page_by_slug($page_slug, $output = OBJECT, $post_type = 'page' ) {
    global $wpdb;

    $page = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s AND post_status = 'publish'", $page_slug, $post_type ) );

    return ($page ? get_post($page, $output) : NULL);
}

// Fix End

function waxom_ajax_pagination($query = null, $name = null) {
	global $wp_query;

	// Add code to index pages.
	 
	wp_enqueue_script('ajax-load-posts', get_template_directory_uri() . '/js/jquery.load-posts.js', array('jquery'));
	
	if(!$query) $query = $wp_query;
	
	// What page are we on? And what is the pages limit?
	$max = $query->max_num_pages;
	$paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
	
	// Add some parameters for the JS.
	wp_localize_script(
		'ajax-load-posts',
		'pbd_alp_'.$name,
		array(
			'startPage' => $paged,
			'maxPages' => $max,
			'nextLink' => next_posts($max, false)
		)
	);

}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Custom Excerpt Size
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

function waxom_custom_excerpt_length( $length ) {
	return 50; // Increase maximum excerpt size
}
add_filter( 'excerpt_length', 'waxom_custom_excerpt_length', 999 );


if(!function_exists('waxom_excerpt')) {
	function waxom_excerpt($limit, $more = NULL) {
	
		global $post;
		
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		}
		
		$excerpt = '<p>'.preg_replace('`[[^]]*]`','',$excerpt).'</p>';
		
		if(get_post_format($post->ID) == "link") {
			$excerpt .= '<a href="'.esc_url(get_post_meta($post->ID,"post_link",TRUE)).'" class="read-more-post">'.esc_html__('Visit Site','waxom').'</a>';
		}elseif($more) {
			$excerpt .= '<a href="'.esc_url(get_permalink($post->ID)).'" class="read-more-post">'.esc_html__('Read more','waxom').'</a>';
		}
		
		return $excerpt;
	}
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		Post Gallery
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

function waxom_post_gallery($type,$thumb_size) {
		
	global $post;

	$gallery_images = get_post_meta($post->ID, 'gallery_images', true);
	
	if(!$gallery_images && has_post_thumbnail()) { // No Gallery Images	
		$url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $thumb_size);
		return '<img src="'.$url[0].'" alt="'.get_the_title($post->ID).'">';
	}
	
	echo '<div class="vntd-post-gallery vntd-post-gallery-'.$type.'">';	
				
	if($type == "slider") { // Slider Gallery
	
		wp_enqueue_script('vntd-flexslider', '', '', '', true);
		
		echo '<div class="flexslider vntd-flexslider"><ul class="slides">';
					
		$ids = explode(",", $gallery_images);				
		foreach($ids as $id){
			$image_url = wp_get_attachment_image_src($id, $thumb_size);
			echo '<li><img src="'.esc_url($image_url[0]).'" alt></li>';
		}
							
		echo '</ul></div>';				
		
	} elseif($type == "list" || $type == "list_lightbox") {
		
		$ids = explode(",", $gallery_images);				
		foreach($ids as $id){
			//global $post = $post=>$id;
			$image_url = wp_get_attachment_image_src($id, $thumb_size);
			$big_url = wp_get_attachment_image_src($id, 'fullwidth-auto');
			echo '<div class="vntd-gallery-item">';
			if($type == "list_lightbox") echo '<a href="'.esc_url($big_url[0]).'" class="hover-item" rel="gallery[gallery'.$post->ID.']" title="'.get_post($id)->post_excerpt.'"><span class="hover-overlay"></span><span class="hover-icon hover-icon-zoom"></span>';			
			echo '<img src="'.esc_url($image_url[0]).'" alt>';
			if($type == "list_lightbox") echo '</a>';
			echo '</div>';
		}	
	
	} else {	
		// If Lightbox Gallery
		echo '<div class="featured-image-holder"><div class="gallery clearfix">';
		
		$ids = explode(",", $gallery_images);
		if($gallery_images) $id = array_shift(array_values($ids));
		$image_url = wp_get_attachment_image_src($id, $thumb_size);
		$large_url = wp_get_attachment_image_src($id, 'large');
		echo '<a class="hover-item" href="'.esc_url($large_url[0]).'" rel="gallery[gallery'.$post->ID.']"><img src="'.esc_url($image_url[0]).'"><span class="hover-overlay"></span><span class="hover-icon hover-icon-zoom"></span></a>';
			
			if($gallery_images){
			
				echo '<div class="lightbox-hidden">';								
				foreach(array_slice($ids,1) as $id){
					echo '<a href="'.wp_get_attachment_url($id).'" rel="gallery[gallery'. $post->ID .']"></a>';
				}
				echo '</div>';
							
			}
								
		echo '</div></div>';
		
	}
	
	echo '</div>';
}


if(!function_exists('waxom_gallery_metabox')) {
	function waxom_gallery_metabox($gallery_images) {
	
		$modal_update_href = esc_url( add_query_arg( array(
		     'page' => 'shiba_gallery',
		     '_wpnonce' => wp_create_nonce('shiba_gallery_options'),
		 ), admin_url('upload.php') ) );
		 ?>	          
		
		 <div class="vntd-gallery-thumbs">
		 	<?php
		 	
	 		if($gallery_images){
	 		
	 			$ids = explode(",", $gallery_images);
	 			
	 			foreach($ids as $id){
	 				echo '<img src="'.wp_get_attachment_thumb_url($id).'" alt>';
	 			}
	 		
	 		}
		 	
		 	?>
		 </div>
		 
		 <input type="text" class="hidden" id="gallery_images" name="gallery_images" value="<?php echo esc_textarea($gallery_images); ?>">
		 <?php if($gallery_images) { $button_text = esc_html__("Modify Gallery", "waxom"); } else { $button_text = esc_html__("Create Gallery", "waxom"); } ?>
		 <a id="vntd-gallery-add" class="button" href="#"
		     data-update-link="<?php echo esc_attr( $modal_update_href ); ?>"
		     data-choose="<?php esc_html_e('Choose a Default Image', "waxom"); ?>"
		     data-update="<?php esc_html_e('Set as default image', "waxom"); ?>"><?php echo esc_textarea($button_text); ?>
		 </a>
		 <?php if($gallery_images){ ?><span class="vntd-gallery-or">
		 <?php esc_html_e('or', 'waxom') ?> </span><input type="button" id="vntd-gallery-remove" class="button" value="Remove Gallery">
		 
		 
		 <?php
		 }
		 // Add to the top of our data-update-link page
		 if (isset($_REQUEST['file'])) { 
		     check_admin_referer("shiba_gallery_options");
		  
		         // Process and save the image id
		     $options = get_option('shiba_gallery_options', TRUE);
		     $options['default_image'] = absint($_REQUEST['file']);
		     update_option('shiba_gallery_options', $options);
		 
		}
	
	}
}

function waxom_get_id() {

	global $post;
	
	$post_id = '';
	
	if(is_object($post)) {
		$post_id = $post->ID;
	}
	if(is_home()) {
		$post_id = get_option('page_for_posts');
	}
	
	return $post_id;
}

if(!function_exists('waxom_fonts')) {
	function waxom_fonts() {
		
		$font_body = 'Raleway';	
		$font_heading = 'Raleway';	
		$font_weight = $nav_font_weight = '';
		
		// Read Font Families from Options Panel
	
		global $waxom_options;
		
		if($waxom_options["typography_body"]["font-family"] && $waxom_options["typography_body"]["font-family"] != $font_body) {
			$font_body = $waxom_options["typography_body"]["font-family"];
		}
	
		if($waxom_options["typography_heading"]["font-family"] && $waxom_options["typography_heading"]["font-family"] != $font_heading) {
			$font_heading = $waxom_options["typography_heading"]["font-family"];
		}
		
		if (strpos($font_heading, ',') !== false) {
			$font_heading = explode(",", $font_heading);
			$font_heading = $font_heading[0];
		}
		
		if (strpos($font_body, ',') !== false) {
			$font_body = explode(",", $font_body);
			$font_body = $font_body[0];
		}
	
		// Heading font weight
		
		$font_heading_weight = ':300,400,500,700,800'; // Each weight is required at some point
		
		// Load Fonts
		
		wp_enqueue_style('vntd-google-font-heading', 'http://fonts.googleapis.com/css?family='.str_replace(' ','+',$font_heading).$font_heading_weight);	
		
		if($font_body != $font_heading) { // If same font is used, there is no point to load it twice
		
			// Body font weight
			
			$font_body_weight = ':300,400';
			
			if($waxom_options["typography_body"]["font-weight"] && $waxom_options["typography_body"]["font-weight"] != '400') {
				$font_body_weight = ':'.$waxom_options["typography_body"]["font-weight"];
			}
			
			// Load body font
		
			wp_enqueue_style('vntd-google-font-body', 'http://fonts.googleapis.com/css?family='.str_replace(' ','+',$font_body).$font_body_weight);
		}	
	
	}
	add_action('wp_enqueue_scripts', 'waxom_fonts');
	add_action( 'admin_enqueue_scripts', 'waxom_fonts');
}

if(!function_exists('waxom_print_social_icons')) {
	function waxom_print_social_icons($style = NULL) {
	
		global $smof_data;
		$target = '';
		
		if(!$style) $style = 'classic';
		
		$icon_style = 'fa fa-';
		
		if(waxom_option('social_icons_style') == 'simple_line_icons') {
			$icon_style = 'icon-social-';
		}
		
		$social_icons = waxom_option("social_icons");
		if(!$social_icons) {
			$social_icons = array(
				"facebook" => "You have no icons",
				"twitter" => "You have no icons",
				"dropbox" => "You have no icons",
				"vimeo" => "You have no icons",
				"dribbble" => "You have no icons"
			);
		}
		if($social_icons) {
		
			echo '<div class="vntd-social-icons social-icons-'.esc_attr($style).' social-icons-'.esc_attr(waxom_option('social_icons_style')).'">';
			
			$target = ' target="_blank"';
			
			foreach($social_icons as $social_icon => $value) {
				
				if($value != "") {
				
					$href = esc_url($value);
					
					if($social_icon == 'E-mail') {
					
						$social_icon = 'envelope';
						$href = 'mailto:' . $value;
					}
					
					echo '<a class="social-'.strtolower($social_icon).'" href="'. $href .'"'.$target.'><i class="'.$icon_style.strtolower($social_icon).'"></i></a>';
				}
				
			}
			
			echo '</div>';
		}
	}
}

// Footer Widgets related functions

function waxom_get_footer_cols() {
	
	if(is_active_sidebar('footer1') && is_active_sidebar('footer2') && is_active_sidebar('footer3') && is_active_sidebar('footer4')) {
		return 4;
	} elseif(is_active_sidebar('footer1') && is_active_sidebar('footer2') && is_active_sidebar('footer3')) {
		return 3;
	} elseif(is_active_sidebar('footer1') && is_active_sidebar('footer2')) {
		return 2;
	} else {
		return 1;
	}
	
	return 0;
}

function waxom_get_footer_cols_class() {

	$widget_col_class = 'col-xs-3';
	
	if(waxom_get_footer_cols() == 1) {
		$widget_col_class = 'col-xs-12';
	} elseif(waxom_get_footer_cols() == 2) {
		$widget_col_class = 'col-xs-6';
	} elseif(waxom_get_footer_cols() == 3) {
		$widget_col_class = 'col-xs-4';
	}
	
	return $widget_col_class;
}

function waxom_get_footer_widgets_class() {
	
	global $smof_data;
	
	if($smof_data['waxom_footer_widgets_skin'] == 'dark') {
		return 'footer-widgets-dark';
	} elseif($smof_data['waxom_footer_widgets_skin'] == 'night') { 
		return 'footer-widgets-night';
	} elseif($smof_data['waxom_footer_widgets_skin'] == 'dark') {
		return 'footer-widgets-white';
	} else {
		
	}
	
	return 'footer-widgets-white';
	
}

function waxom_vc_active() { // Function to check if Visual Composer is enabled on a specific page.

	global $post;
	
	$found = false;
	
	if(class_exists('Woocommerce')) {
		if(is_shop() || is_product_category()) return $found;
	}
	
	if(is_object($post)) {
		$post_to_check = get_post($post->ID);
	} else {
		return $found;
	}
   
	// check the post content for the short code
	if ( stripos($post_to_check->post_content, '[vc_row') !== false ) {
	    // we have found the short code
	    $found = true;
	}
	
	if(is_home()) {
		$found = false;
	}
	 
	// return our final results
	return $found;

}

// Importer


if ( !function_exists( 'waxom_create_dropdown' ) ) {
	function waxom_create_dropdown($name,$elements,$current_value,$folds = NULL) {
		
		$folds_class = $selected = '';
		if($folds) $folds_class = ' folds';
		echo '<select name="'.$name.'" class="select'.$folds_class.'">';
		
		if(waxom_isAssoc($elements)) {
		
			foreach($elements as $title => $key) {		
				
				if($key == $current_value) $selected = 'selected';
				
				echo '<option value="'.$key.'"'.$selected.'>'.$title.'</option>';
				
				$selected = '';
			}
			
		} else {
			
			foreach($elements as $key) {			
				
				if($key == $current_value) $selected = 'selected';
				
				echo '<option value="'.$key.'"'.$selected.'>'.$key.'</option>';
				
				$selected = '';
			}
			
		}
		
		echo '</select>';
		
	}
}

if ( !function_exists( 'waxom_pages_dropdown' ) ) {
	function waxom_pages_dropdown($name,$current_value) {
		echo '<select name="'.$name.'" class="select">';
			echo '<option>Select page:</option>';
			$pages = get_pages(); 
			$selected = '';
			foreach ( $pages as $page ) {						
				if($page->ID == $current_value) { $selected = 'selected="selected"'; }	
				echo '<option value="'.$page->ID.'" '.$selected.'>'.esc_textarea($page->post_title).'</option>';
				$selected = '';
			}
		
		echo '</select>';
	}
}

if ( !function_exists( 'waxom_isAssoc' ) ) {
	function waxom_isAssoc($arr)
	{
	    return array_keys($arr) !== range(0, count($arr) - 1);
	}
}

if ( !function_exists('waxom_string_between') ) {
	function waxom_string_between($string, $start, $end){
	    $string = ' ' . $string;
	    $ini = strpos($string, $start);
	    if ($ini == 0) return '';
	    $ini += strlen($start);
	    $len = strpos($string, $end, $ini) - $ini;
	    return substr($string, $ini, $len);
	}
}

if ( !function_exists('waxom_query_pagination') ) {
	function waxom_query_pagination() {
	
		$paged = '';
		
		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }
		
		return $paged;
		
	}
}