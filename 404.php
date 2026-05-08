<?php 
get_header();
?>

<div class="page-content page-content-404 container">

	<section id="home" class="container relative">
			
		<div class="inner t-center">
			
			<div class="not-found-big vntd-accent-color">404</div>
			
			<div class="vntd-special-heading">
				<h1 class="not-found-title"><?php esc_html_e('Oops! Page Not Available.','waxom'); ?></h1>
				<h3 class="not-found-description"><?php esc_html_e('It looks like nothing was found at this location.','waxom'); ?><br><?php esc_html_e('Maybe try a search?','waxom'); ?></h3>
			</div>		
			 
			 <?php get_template_part('searchform'); ?>

	</div><!-- End Inner -->

	</section><!-- End Home Section -->


</div>	

<?php get_footer(); ?>