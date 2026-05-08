<?php 
$post = $wp_query->post;
get_header(); 

$layout = 'fullwidth';

if(get_post_meta(waxom_get_id(), 'page_layout', true)) {
	$layout = get_post_meta(waxom_get_id(), 'page_layout', true);
}

$page_width = get_post_meta(waxom_get_id(), 'page_width', true);
if(!$page_width) $page_width = 'content';
$page_links = '';
?>

<div class="page-holder page-layout-<?php echo esc_attr($layout); ?>">
	
	<?php 
	
	// If Visual Composer is not enabled for the page
	if(!waxom_vc_active() || $layout == 'sidebar_right' || $layout == 'sidebar_left' || post_password_required(get_the_ID())) {
		echo '<div class="inner">';		
	}
	
	if($layout != "fullwidth" || $layout == 'fullwidth' && !waxom_vc_active() || post_password_required(get_the_ID())) {
		echo '<div class="page_inner">';
	}
	
	if (have_posts()) : while (have_posts()) : the_post(); 
	        
		the_content(); 
		
		wp_link_pages();
		
		if (comments_open()) { 
			echo '<div class="page-comments inner">'; 
			comments_template();
			echo '</div>';
		}
	          
	endwhile; endif; 	     
	
	if($layout != "fullwidth" || $layout == 'fullwidth' && !waxom_vc_active() || post_password_required(get_the_ID())) {
		echo '</div>';		
	}
	
	if($layout != "fullwidth") {
		get_sidebar();    
	}

	if(!waxom_vc_active() || $layout == 'sidebar_right' || $layout == 'sidebar_left' || post_password_required(get_the_ID())) echo '</div>';
	
	if($page_links == 'yes') {
		wp_link_pages();
	}
	
	?>

</div>

<?php get_footer(); ?>