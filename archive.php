<?php 
get_header(); 
 
$blog_style = $grid_style = '';

$layout = 'fullwidth';

if(waxom_option('archives_layout')) $layout = waxom_option('archives_layout');

$blog_style = 'classic';

if(waxom_option("blog_style")) $blog_style = waxom_option("blog_style");

if($blog_style == "grid" || $blog_style == "timeline") {

	wp_enqueue_script('vntdIsotope', '', '', '', true);
	
	$grid_style = waxom_option('blog_grid_style');
	
	if(!waxom_option('blog_grid_style')) {
		$grid_style = 'simple';
	}

}

if(waxom_option('blog_ajax') == true && $blog_style == "grid") {
	waxom_ajax_pagination();  
}

?>

<div class="page-holder blog page-layout-<?php echo esc_attr($layout); ?> blog-style-<?php echo esc_attr($blog_style); ?>">

	<div id="blog" class="inner clearfix">	
	
		<?php	
		
		if($layout != "fullwidth") {
			echo '<div class="page_inner">';
		}

		echo '<div class="blog-inner blog-style-'.esc_attr($grid_style).'">';
		
		if($blog_style == "grid" || $blog_style == "timeline") {
			$grid_cols = waxom_option('blog_grid_cols');
			if($blog_style == "timeline") {
				$grid_cols = 2;
			}
			echo '<div class="vntd-grid-container grid-cols-'.esc_attr($grid_cols).' grid-style-'.esc_attr($grid_style).'" data-cols="'.esc_attr($grid_cols).'">';
		}
		
		if (have_posts()) : while (have_posts()) : the_post();
		 	
		 	waxom_blog_post_content($layout, $blog_style); // Layout, Style, Grid Style, Masonry
		 	
		endwhile;
		
	    // Archive doesn't exist:
	    else :
	    
	        esc_html_e('Nothing found, sorry.','waxom');
	    
	    endif;	
	    
	    if($blog_style == "grid" || $blog_style == "timeline") {
	    	echo "</div>";
	    }
	    
	    waxom_pagination();  
    	
    	echo '</div>';
    	
    	if($layout != "fullwidth") { 
    		echo '</div>';
    		get_sidebar();    		
    	}
    	
    	?>
    	
    </div>

</div>

<?php get_footer(); ?>