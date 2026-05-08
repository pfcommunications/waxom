<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 

$layout = 'fullwidth';

if(is_shop() || is_product_category() || is_product_tag()) {
	$layout = get_post_meta(get_option('woocommerce_shop_page_id'), 'page_layout', true);
}
if(!$layout) $layout = 'fullwidth';

$shop_cols = 4;
if(waxom_option('shop_grid_cols')) $shop_cols = waxom_option('shop_grid_cols');

$shop_style = 'grid';
if(waxom_option('shop_style')) $shop_style = waxom_option('shop_style');

if(isset($_GET['layout'])) {
	switch($_GET['layout']) {
		case 'fullwidth3' :
			$shop_cols = 3;
		break;
		case 'sidebar3' :
			$shop_cols = 3;
			$layout = 'sidebar-right';
		break;	
		case 'sidebar2' :
			$shop_cols = 2;
			$layout = 'sidebar-right';
		break;		
		case 'details' :
			$shop_cols = 3;
			$layout = 'fullwidth';
			$shop_style = 'list';
		break;	
		case 'details_sidebar' :
			$shop_cols = 3;
			$layout = 'sidebar-right';
			$shop_style = 'list';
		break;	
	}
}


?>

<div id="vntd-woocommerce" class="page-holder page-layout-<?php echo esc_attr($layout); ?> woocommerce-shop-page woocommerce-shop-cols-<?php echo esc_attr($shop_cols); ?> woocommerce-layout-<?php echo esc_attr($shop_style); ?>">
		
	<?php 		
	
	// If Visual Composer is not enabled for the page
	if(!waxom_vc_active()) echo '<div class="inner">';	
	
	if($layout != "fullwidth" || $layout == 'fullwidth' && !waxom_vc_active()) {
		echo '<div class="page_inner">';
	}

		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		
	?>

<?php 

if($layout != "fullwidth" || $layout == 'fullwidth' && !waxom_vc_active()) {
	echo '</div>';
}

if($layout != "fullwidth") { 
	
	get_sidebar();  		
}

if(!waxom_vc_active()) echo '</div>';

?>

</div>

<?php

get_footer( 'shop' ); ?>
