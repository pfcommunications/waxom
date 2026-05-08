<?php

$sidebar_id = "default_sidebar";

$sidebar_id = get_post_meta(waxom_get_id(), 'page_sidebar', true);

if(is_archive() || is_search()) {
	$sidebar_id = 'archives';
}

if(!$sidebar_id || !is_active_sidebar( $sidebar_id )) {
	$sidebar_id = 'default_sidebar';
}

if (class_exists('Woocommerce')) {
	if(is_shop() || is_product_category() || is_product_tag()) {
		$sidebar_id = "woocommerce_shop";
	}
}

$widget_style = 'default';
if(waxom_option('widget_style')) $widget_style = waxom_option('widget_style');

?>

<div id="sidebar" class="page_sidebar sidebar-style-<?php echo esc_attr($widget_style); ?>">
	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar_id)) ?>
</div>