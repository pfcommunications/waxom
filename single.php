<?php 
$post = $wp_query->post;
get_header();
$layout = get_post_meta($post->ID, 'page_layout', true);
$page_width = get_post_meta($post->ID, 'page_width', true);
if(!$page_width) $page_width = 'content';
?>

<div class="single-post post blog page-holder page-layout-<?php echo esc_attr($layout); ?>">
		
	<?php 		
	
	if($page_width != 'fullwidth') {
		echo '<div class="inner clearfix">';
	}
	
	if($layout != "fullwidth") {
		echo '<div class="page_inner">';
	}
	
	if (have_posts()) : while (have_posts()) : the_post(); 
	        
		waxom_blog_post_content($layout);
		
		if(get_trackback_url()) {
			echo '<p>Trackback URL: <a href="'.get_trackback_url().'">'.get_trackback_url().'</a></p>';
		}
		
		wp_link_pages();
		
		waxom_blog_post_tags();
		
		waxom_blog_post_author();
		
	          
	endwhile; endif; 
	
	if (comments_open()){ comments_template(); } // Load comments if enabled	     
	
	if($layout != "fullwidth") { 
		echo '</div>';
		get_sidebar();    		
	}
	
	if($page_width != 'fullwidth') {
		echo '</div>';
	}
	
	?>

</div>

<?php get_footer(); ?>