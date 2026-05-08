<?php 

if(function_exists('waxom_print_extra_content')) {
	waxom_print_extra_content();
}

$footer_color_class = 'dark-footer';
$footer_color = 'dark';
$footer_style = 'footer-classic';
$footer_widgets_class = 'footer-widgets-dark';

if(waxom_option('footer_skin')) {
	$footer_color = waxom_option("footer_skin");
}
if(get_post_meta(waxom_get_id(),'footer_color',TRUE) && get_post_meta(waxom_get_id(),'footer_color',TRUE) != 'default') {
	$footer_color = get_post_meta(waxom_get_id(),'footer_color',TRUE);
}
if($footer_color == 'dark' || get_post_meta(waxom_get_id(),'footer_color',TRUE) == 'default' && waxom_option('footer_skin') == 'dark') {
	$footer_color_class = 'dark-footer';
}
if(waxom_option("footer_style") == 'centered') {
	$footer_style = 'footer-centered';
}
if(get_post_meta(waxom_get_id(),'footer_style',TRUE) && get_post_meta(waxom_get_id(),'footer_style',TRUE) != 'default') {
	$footer_style = get_post_meta(waxom_get_id(),'footer_style',TRUE);
}

?>

	</div>

	<?php 
	
	if(waxom_option('footer_widgets') == true && is_active_sidebar('footer1') && get_post_meta(waxom_get_id(),'footer_widgets',TRUE) != 'disabled' || get_post_meta(waxom_get_id(),'footer_widgets',TRUE) == 'enabled' && is_active_sidebar('footer1')) { 
	
	if(waxom_option("footer_widgets_skin") == "dark" || waxom_option("footer_widgets_skin") == "white") {
		$footer_widgets_class = 'footer-widgets-'.waxom_option("footer_widgets_skin");
	} elseif($footer_color == 'dark') {
		$footer_widgets_class = 'footer-widgets-dark';
	} else {
		$footer_widgets_class = 'footer-widgets-light';
	}
	
	?>
	<div id="footer-widgets" class="<?php echo 'footer-'.esc_attr($footer_color).' '.esc_attr($footer_widgets_class); ?>">
		<div class="container">
			<div class="inner">
				<?php 

				for($i=1;$i<=waxom_get_footer_cols();$i++) {
					if($i == waxom_get_footer_cols()) $last_class = ' vntd-span-last';				
					echo '<div class="'.esc_attr(waxom_get_footer_cols_class()).'">';
					    if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer'.$i) );
					echo '</div>';
				}
				
				?>
			</div>
		</div>
		
	</div>
	<?php
	}
	
	?>
	
	<!-- Footer -->
	<footer id="footer" class="footer <?php echo 'footer-'.$footer_color.' footer-'.$footer_style; ?>">
		<div class="container">
			<div class="inner">
			
			<?php
			if($footer_style == 'footer-centered') {
			
				if(waxom_option('footer_logo')) {
					echo '<div class="footer-logo"><img src="'.esc_attr(waxom_option('footer_logo')).'" alt></div>';
				}
				
				if(waxom_option('footer_extra_text')) {
					echo '<div class="footer-extra-text">'.esc_attr(waxom_option('footer_extra_text')).'</div>';
				}
			
				if(function_exists('waxom_print_social_icons')) {
					waxom_print_social_icons();
				}
			
			}
	
			if($footer_style == 'centered') {
			
				if(waxom_option('logo_url_white')) {
					echo '<div class="footer-logo"><img src="'.esc_attr(waxom_option('logo_url_white')).'" alt></div>';
				}
				
				if(waxom_option('footer_extra_text')) {
					echo '<p class="footer-extra-text">'.waxom_option('footer_extra_text').'</p>';
				}
			
			}
			
			if(function_exists('waxom_print_social_icons') && waxom_option('footer_social_icons') != false) {
				waxom_print_social_icons();
			}	
			
			
			?>
			
			<!-- Text -->
			<p class="copyright subpixel">
				<?php echo waxom_option('copyright'); ?>
			</p>
			
			</div>
		</div>
	</footer>
	<!-- End Footer -->

	<!-- Back To Top Button -->

	<?php if(waxom_option('stt')) echo '<div id="back-top"><a href="#home" class="scroll t-center white"><i class="fa fa-angle-up"></i></a></div>'; ?>	
	
	<!-- End Back To Top Button -->

<?php wp_footer(); ?>

</body>
</html>