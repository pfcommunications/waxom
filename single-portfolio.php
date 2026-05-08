<?php 
$post = $wp_query->post;
get_header();
$page_width = get_post_meta($post->ID, 'page_width', true);

if(!$page_width) $page_width == 'fullwidth';
?>

<div class="single-post portfolio-post page-holder">
		
	<?php 	
	
	// If Visual Composer is not enabled for the page
	if(!waxom_vc_active()) echo '<div class="inner">';	
	echo '<div class="portfolio-post-content">';
	
	if (have_posts()) : while (have_posts()) : the_post(); 
	        
		the_content();
	          
	endwhile; endif;    
	
	echo '</div>';
	
	if(!waxom_vc_active()) echo '</div>';	
	
	?>

</div>

<?php get_footer(); ?>