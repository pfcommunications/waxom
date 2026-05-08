<?php

/**
 * Theme Dynamic Stylesheet
 *
 * @package Waxom
 * @since 1.0
 *
 */
 
header("Content-type: text/css;");

require_once('../../../../wp-load.php');

$waxom_accent_color = '#fecb16';
$waxom_accent_color2 = '#362f2d';
$waxom_accent_color3 = '#998675';
$waxom_accent_color4 = '#fbfaf8';

global $waxom_options;

if($waxom_options['accent_color']) {
   	$waxom_accent_color = esc_attr(waxom_option('accent_color'));
}
if($waxom_options['accent_color2']) {
	$waxom_accent_color2 = esc_attr(waxom_option('accent_color2'));
}
if($waxom_options['accent_color3']) {
	$waxom_accent_color3 = esc_attr(waxom_option('accent_color3'));
}
if($waxom_options['accent_color4']) {
	$waxom_accent_color4 = esc_attr(waxom_option('accent_color4'));
}


?>

<?php
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//		General
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
?>

a,
a:focus,
.vntd-accent-color {
	color:				<?php echo $waxom_accent_color; ?>;
}


/* Accent Text Colors */

	#navigation .mobile-nav-button:hover,
	footer.footer a:hover,
	section.page_header .page_header_inner .p_head_right a.p-head-button:hover,
	body.dark-layout section.page_header .page_header_inner .p_head_right a.p-head-button:hover,
	#blog .details .post-info a.post-item:hover,
	.dark-nav .nav-menu ul.dropdown-menu li a:hover,
	.dark-nav .nav-menu ul.dropdown-menu li.active a,
	a.text-button:hover,
	.blog .details a.post-item:hover,
	span.post-item a:hover,
	.nav-menu ul li a:hover,
	.nav-menu ul li.active a,
	#page-content .color-accent,
	a.read-more-post:hover,
	.address-soft a.mail-text:hover,
	.bar.widget_rss a.rsswidget:hover,
	.twitter-feed-icon:hover,
	.menu-item a:hover,
	#navigation-mobile a:hover,
	.nav-extra-item-text i,
	#site-navigation .nav-extra-item:hover i,
	#navigation_sticky .nav-extra-item:hover i,
	#topbar a:hover,
	#topbar .menu li:hover a,
	.nav-bottom-search .search-button:hover,
	.nav-bottom .nav li a:hover,
	#navigation .nav-menu ul.dropdown-menu li a:hover,
	#navigation .nav-menu ul.dropdown-menu li a:hover:after,
	#page-content ul.products li.product h3:hover,
	#page-content .accent-hover,
	.vntd-blog .read-more-post:hover,
	#page-content h1 a:hover,
	#page-content h2 a:hover,
	#page-content h3 a:hover,
	#page-content h4 a:hover,
	#page-content h5 a:hover,
	.vntd-meta-section a:hover,
	#footer-widgets .twitter-content p > a:first-child,
	.bar ul li a:hover:before, .bar ul li > a:hover,
	#footer-widgets .twitter-content p > a:hover,
	.vntd-icon-box.icon-box-hover:hover .icon-box-link-button,
	.vntd-icon-box.icon-box-hover:hover .icon-box-title,
	#page-content .team-member-icons a:hover,
	.vntd-list-accent i,
	.accent-hover:hover,
	.breadcrumbs a:hover,
	.btn-style-stroke.btn-accent,
	.icon-box-big-centered-outline.icon-box-hover:hover .icon-box-icon,
	.pie-style1 .vc_pie_chart_value,
	.vntd-carousel .testimonial-item:hover .testimonial-author h5,
	.vntd-testimonials-grid .testimonial-item:hover h5,
	.vntd-carousel .testimonial-item:hover .testimonial-author span,
	.vntd-testimonials-grid .testimonial-item:hover span,
	.nav-cart:hover i,
	.portfolio.portfolio-bottom .portfolio-overlay-title:hover,
	.portfolio-overlay-title,
	#page-content .progress-bar-style4 .progress-bar-value .vc_label_units,
	#page-content .icon-box-small-left:hover .icon-box-icon,
	#page-content .icon-box-big-centered-icon.icon-box-hover:hover .icon-box-icon,
	.dropcap-style1,
	.vntd-meta-section span span,
	.comment-mini-heading li.comment-name,
	#page-content .widget-tabbed-nav li.active-tab,
	.pricing-box-color-accent.vntd-pricing-box h4,
	.portfolio-overlay-icons span:hover,
	.vntd-blog .read-more-post,
	.carousel-post-overlay .fa:hover,
	.counter-color-accent,
	#page-content .icon-box-medium-right-triangle:hover .icon-box-icon,
	#page-content .icon-box-medium-left-triangle:hover .icon-box-icon,
	#page-content .vc_active .vc_tta-title-text,
	#page-content .vntd-team.team-style-hover .team-member-data .team-member-icons a:hover,
	#page-content .price,
	#reviews #comments .meta strong,
	.owl-nav > div:hover:before,
	.portfolio-love-button a,
	.blog-style-boxed.vntd-blog .item:hover .blog-item-inner h5.blog-post-title a,
	h3.portfolio-outer-title a,
	.video-lightbox a.video-link:hover i,
	.video-lightbox-length,
	#page-content .progress-bar-style2 .vc_label_units,
	#page-content .progress-bar-style1 .vc_label_units,
	.testimonial-content p,
	.vntd-blog-carousel.blog-style-minimal .item:hover h5.blog-post-title a,
	#breadcrumbs li,
	.vntd-cta h1 .heading-highlight,
	.post-media-container a:after:hover,
	#vntd-woocommerce-filters li ul li a:hover,
	#woo-nav-cart.nav-cart-active i,
	.nav-menu ul li a:hover,
	#site-navigation ul.dropdown-menu li a:hover,
	.vntd-icon-box.icon-box-hover:hover .icon-box-link-button, .vntd-icon-box.icon-box-hover:hover .icon-box-title,
	#page-content .icon-box-small-left:hover .icon-box-icon,
	.vntd-icon-box.icon-box-hover:hover .icon-box-link-button,
	.vntd-icon-box.icon-box-hover:hover .icon-box-title {
		color: <?php echo $waxom_accent_color; ?>;
	}
	
	#site-navigation ul.dropdown-menu li a:hover,
	#site-navigation li a:hover,
	.current_page_item > a,
	.current-menu-ancestor > a,
	.current-menu-parent > a,
	.current-menu-item > a,
	#footer .vntd-social-icons a:hover,
	.vntd-team .item:hover h6.member-position,
	.btn-style-stroke.btn-hover-accent:hover,
	.product-overlay-icon:hover,
	.owl-nav > div:hover,
	.btn-style-stroke.btn-white:hover,
	.navigation-mobile ul li a:hover,
	.item:hover .portfolio-outer-cats,
	.counter-color-accent .counter-title h6 {
		color: <?php echo $waxom_accent_color; ?> !important;
	}
	
	.portfolio-filters li.cbp-filter-item-active,
	.portfolio-filters li:hover {
		color: <?php echo $waxom_accent_color; ?>;
	}

/* Accent Background Colors */

	/* ::selection, */
	.colored-bg,
	a.page-content-button:hover,
	.feature-box:hover a.box-icon,
	.vntd-portfolio-carousel .works .item .featured-ball:hover,
	.vntd-cta-button:hover,
	.vntd-pricing-box.p-table.active a.p-button,
	.vntd-pricing-box.p-table a.p-button:hover,
	a.active-colored,
	.blocked,
	.modal .modal-inner a.close:hover,
	.portfolio a.portfolio-view-more:hover,
	body.dark-layout .portfolio a.portfolio-view-more:hover,
	#team .team .team-boxes .item .member-details .details a.member-detail-button:hover,
	.bar .tagcloud a:hover,
	ul.pagination li.active a,
	ul.pagination li.active a:hover,
	body.dark-layout ul.pagination li.active a,
	body.dark-layout ul.pagination li.active a:hover,
	.contact form button.contact-form-button:hover,
	.btn-accent,
	.vntd-list-bg i,
	.vntd-accent-bgcolor,
	#navigation .nav-menu > ul > li.current_page_item > a:before,
	.pagination .current,
	.contact .wpcf7-submit:hover,	
	.blog-extra-meta .extra-meta-comments,
	.vntd-bg-color-accent,
	.vntd-icon-box.icon-box-hover:hover .icon-box-icon,
	.vntd-pricing-box.active h3,
	.vntd-pricing-box.active .pricing-box-button a.btn,
	.vntd-contact-form.contact form .wpcf7-submit:hover,
	.portfolio-title_categories_excerpt .portfolio-overlay-excerpt:after, 
	.portfolio-bottom .portfolio-overlay-excerpt:after,
	#vntd-woocommerce-layout-switcher li.active-item,
	#vntd-woocommerce-layout-switcher li:hover,
	.vntd-pagination li span.current,
	#page-content .woocommerce-pagination li span.current,
	.btn-hover-accent:hover,
	#page-content .vc_progress-bar-color-accent .vc_bar,
	.vntd-dropcap.dropcap-style2,
	.vntd-pagination li > a:hover, #page-content .woocommerce-pagination li > a:hover,
	.portfolio-style .item-inner,
	.blog-post-thumbnail,
	#page-content .vc_active .vc_tta-controls-icon,
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
	.woocommerce #review_form #respond .form-submit input,
	.wpb_text_column ul li:before,
	.icon-box-big-centered-icon .icon-box-content:after,
	#page-content .vntd-blog .item:hover .extra-meta-item,
	#page-content .vntd-blog .item:hover .extra-meta-item .vntd-day,
	#page-content .blog-index .post:hover .extra-meta-item,
	#page-content .blog-index .post:hover .extra-meta-item .vntd-day,
	.bg-accent,
	.woo-cart-count {
		background-color: <?php echo $waxom_accent_color; ?>;
	}
	
	.btn-dark:hover,
	.btn-black:hover,
	.vntd-accent-bgcolor-hover:hover,
	#page-content .tp-bullets.simplebullets .bullet.selected,
	#page-content ul.products li.product .add_to_cart_button,
	.bar .tagcloud a:hover,
	.vc_single_bar.accent .vc_bar,
	#page-content .accent-hover-bg:hover,
	#page-content .ui-tabs-nav .ui-tabs-active a,
	.vntd-icon-box.icon-box-hover:hover .icon-box-icon {
		background-color: <?php echo $waxom_accent_color; ?> !important;
	}

/* Border Colors */

	.colored-border,
	.feature-box:hover a.box-icon:after,
	a.text-button:hover,
	#team .team .team-boxes .item .member-details .details a.member-detail-button:hover,
	.bar .tagcloud a:hover,
	ul.pagination li.active a,
	ul.pagination li.active a:hover,
	.bs-callout-north,
	.vntd-icon-box.box:hover .left-icon a,
	.btn-accent,
	.pagination .current,
	.contact .wpcf7-submit:hover,
	.btn-dark:hover,
	.btn-black:hover,
	blockquote,
	#topbar .menu li:hover a,
	#nav-bottom.nav-bottom-style-bottom2 .nav > li:hover > a,
	#nav-bottom.nav-bottom-style-bottom2 .nav > li.current-menu-item > a,
	.nav-menu ul.dropdown-menu li a:hover,
	#page-content .tp-bullets.simplebullets .bullet.selected,
	.portfolio-filters li.cbp-filter-item-active,
	.vntd-testimonials-tabs .testimonial-item.active-item .testimonial-avatar img,
	.icon-box-medium-left.icon-box-hover:hover .icon-box-icon,
	.icon-box-medium-right.icon-box-hover:hover .icon-box-icon,
	.vntd-team.team-style-circle .item:hover .team-member-image img,
	#page-content .team-member-icons a:hover,
	.blockquote-content,
	.vntd-accordion.accordion-style3 .wpb_accordion_header:hover,
	.vntd-accordion.accordion-style3 .wpb_accordion_header.ui-accordion-header-active,
	.icon-box-big-centered-outline.icon-box-hover:hover .icon-box-icon,
	.icon-box-big-left.icon-box-hover:hover .icon-box-content,
	.icon-box-with-link.icon-box-boxed-outline:hover,
	.icon-box-with-link .icon-box-inner:hover,
	.icon-box-boxed-solid.icon-box-with-link:hover,
	.icon-box-with-link.icon-box-boxed-outline:hover,
	.icon-box-boxed-outline a:hover .icon-box-icon,
	.vntd-carousel .testimonial-item:hover .testimonial-content,
	.vntd-testimonials-grid .testimonial-item:hover .testimonial-content,
	.icon-box-medium-left-light.icon-box-hover:hover .icon-box-icon,
	.icon-box-medium-right-light.icon-box-hover:hover .icon-box-icon,
	#vntd-woocommerce-layout-switcher li.active-item,
	#vntd-woocommerce-layout-switcher li:hover,
	#sidebar .tagcloud a:hover,
	.counter-color-accent .counter-value,
	.vntd-icon-box:hover .icon-box-triangle,
	.vntd-icon-box:hover .icon-box-triangle:after,
	.vntd-icon-box:hover .icon-box-triangle:before,
	.owl-nav > div:hover,
	.pulsed,
	.nav-menu > ul > li.current_page_item > a, .nav-menu > ul > li.current-menu-parent > a,
	.nav-menu > ul > li.current-menu-ancestor > a,
	.accent-hover-border,
	.portfolio-love-button a,
	.video-lightbox a.video-link:hover i,
	.owl-dot.active,
	#page-content .swiper-pagination-bullet.swiper-pagination-bullet-active,
	#page-content .vc_images_carousel .vc_carousel-indicators li.vc_active {
		border-color:<?php echo $waxom_accent_color; ?>;
	}
	
	.nav-menu > ul > li.current_page_item > a, .nav-menu > ul > li.current-menu-parent > a, .nav-menu > ul > li.current-menu-ancestor > a {
		border-color:<?php echo $waxom_accent_color; ?>;
	}
	
	#footer .vntd-social-icons a:hover,
	#page-content .vntd-tabs.tabs-style4 .wpb_tab,
	.btn-style-stroke.btn-hover-accent:hover,
	#page-content .btn-black:hover {
		border-color:<?php echo $waxom_accent_color; ?> !important;
	}

	.tabs .nav-tabs li.active a,
	.nav-menu ul.dropdown-menu,
	.nav-cart-products,
	#page-content .widget-tabbed-nav li.active-tab,
	.vntd-pricing-box.pricing-box-color-accent h3:after,
	#page-content .vc_tta-style-classic .vc_tta-tab.vc_active {
		border-top-color:<?php echo $waxom_accent_color; ?>;
	}
	
	.vntd-tour .nav-tabs li.active a {
		border-left-color:<?php echo $waxom_accent_color; ?>;
	}
	
	
	
	<?php $bg_color = '#ffffff'; if($waxom_options['bg_color']) { $bg_color = $waxom_options['bg_color']; } ?>
	.spinner,
	.cbp-popup-singlePage .cbp-popup-loadingBox {
		border-top-color: <?php echo $waxom_accent_color; ?>;
		border-left-color: <?php echo $waxom_accent_color; ?>;
		border-right-color: <?php echo $waxom_accent_color; ?>;
		border-bottom-color: transparent;
	}
	

<?php

if($waxom_accent_color3 != '#362f2d') { 
?>

/* Accent Color 3 (Default: Green) */

#page-content .color-accent3 {
	color: <?php echo $waxom_accent_color3; ?>;
}

#page-content .btn-accent3,
#page-content .bg-accent3,
.item:hover .item-outer,
.blog-style-boxed.vntd-blog.blog-hover-style-accent .item:hover .blog-item-inner {
	background-color: <?php echo $waxom_accent_color3; ?>;
}

.item:hover .item-outer:before {
	border-bottom-color: <?php echo $waxom_accent_color3; ?>;
}

#page-content .btn-accent3 {
	border-color: <?php echo $waxom_accent_color3; ?>;
}


<?php 
} 

if($waxom_accent_color2 != '#998675') { 
?>

/* Accent Color 2 */

#page-content .color-accent2,
#page-content .btn-style-stroke.btn-white:hover,
#page-content .btn-hover-white:hover,
#page-content .btn-hover-accent2:hover,
#page-content .btn-hover-default:hover,
a:hover,
#page-content .vntd-meta-section a:hover,
.counter-number {
	color: <?php echo $waxom_accent_color2; ?> !important;
}

#page-content .btn-accent2,
#page-content .bg-accent2,
#page-content .btn-hover-accent2:hover,
.blog-style-boxed.vntd-blog .item:hover .vntd-month,
.portfolio-filters-boxed .portfolio-filters li:hover,	
.portfolio-filters-boxed .portfolio-filters li.cbp-filter-item-active,
.vntd-counter:after,
.woocommerce #page-content .button,
.vntd-contact-form.contact form .wpcf7-submit,
#woo-nav-cart p.buttons .button,
#page-content .product .button {
	background-color: <?php echo $waxom_accent_color2; ?>;
}

#page-content .btn-hover-accent2:hover,
.portfolio-filters-boxed .portfolio-filters li:hover,	
.portfolio-filters-boxed .portfolio-filters li.cbp-filter-item-active {
	border-color: <?php echo $waxom_accent_color2; ?> !important;
}

#page-content .btn-accent2 {
	border-color: <?php echo $waxom_accent_color2; ?>;
}


<?php 
} 

if($waxom_accent_color4 != '#fbfaf8') { 
?>

/* Accent Color 4 */

#page-content .btn-accent4,
#page-content .bg-accent4,
#page-content .btn-hover-accent4:hover,
.item-outer,
.blog-style-boxed.vntd-blog.blog-hover-style-accent .blog-item-inner,
.blog-index .blog-post-wrap,
.icon-box-boxed-solid {
	background-color: <?php echo $waxom_accent_color4; ?>;
}

#page-content .btn-hover-accent4:hover {
	border-color: <?php echo $waxom_accent_color4; ?> !important;
}

.item-outer:before {
	border-bottom-color: <?php echo $waxom_accent_color4; ?>;
}

<?php 
} 

// Top Bar

if($waxom_options['topbar_bg_color'] && $waxom_options['topbar_bg_color'] != '#fafafa') { 
	echo '#topbar { background-color:'.esc_attr($waxom_options['topbar_bg_color']).'; }';
}

// Navigation

if($waxom_options['typography_navigation'] && $waxom_options['typography_navigation']['color'] != '#555555') { 
	echo '.nav-menu ul li a { color:'.esc_attr($waxom_options['typography_navigation']['color']).'; }';
}

if($waxom_options['header_bg_color'] && $waxom_options['header_bg_color'] != '#ffffff') { 
	echo '#navigation,#navigation_sticky,#site-navigation.style-transparent.sticky-now #navigation { background-color:'.esc_attr($waxom_options['header_bg_color']).'; }';
}

// Page Title

if($waxom_options['typography_page_title'] && $waxom_options['typography_page_title']['color'] != '#363636') { 
	echo '#page-title h1 { color:'.esc_attr($waxom_options['typography_page_title']['color']).'; }';
}

$pagetitle_bg_color_start = $waxom_options['pagetitle_bg_color_start'];
$pagetitle_bg_color_end = $waxom_options['pagetitle_bg_color_end'];

if($pagetitle_bg_color_start && $pagetitle_bg_color_start != '#362f2d' || $pagetitle_bg_color_end  && $pagetitle_bg_color_end  != '#534741') { 
	echo '#page-title { background-color:'.esc_attr($pagetitle_bg_color_start).';
	background: -webkit-linear-gradient(left, '.$pagetitle_bg_color_start.', '.$pagetitle_bg_color_end.');
	background: -o-linear-gradient(left, '.$pagetitle_bg_color_start.', '.$pagetitle_bg_color_end.');
	background: -moz-linear-gradient(left, '.$pagetitle_bg_color_start.', '.$pagetitle_bg_color_end.');
	background: linear-gradient(left, '.$pagetitle_bg_color_start.', '.$pagetitle_bg_color_end.');
	 }';
}

if($waxom_options['breadcrumbs_color'] && $waxom_options['breadcrumbs_color'] != '#959595') { 
	echo '.breadcrumbs a { color:'.esc_attr($waxom_options['breadcrumbs_color']).'; }';
}

// Page Content

if($waxom_options['body_color'] && $waxom_options['body_color'] != '#363636') { 
	echo 'body,.icon-description,.vntd-special-heading h6,#sidebar .bar ul li:before { color:'.esc_attr($waxom_options['body_color']).'; }';
}

if($waxom_options['bg_color'] && $waxom_options['bg_color'] != '#ffffff') { 
	echo '#pageloader,body { background-color:'.esc_attr($waxom_options['bg_color']).'; }';
}

if($waxom_options['heading_color'] && $waxom_options['heading_color'] != '#555555') {
	echo ' h1,h2,h3,h4,h5,h6,#page-content .progress-bar-style2 .progress-bar-value, #page-content .progress-bar-style1 .progress-bar-value,.vntd-blog h5.blog-post-title a,h2.blog-post-title a,.icon-box-big-centered-icon .icon-box-icon { color:'.esc_attr($waxom_options['heading_color']).'; }';
	echo '.icon-box-boxed-solid .icon-box-icon { background-color:'.$waxom_heading_color.'; }';
	echo '#page-content .extra-meta-item .vntd-day, #page-content .extra-meta-item { background-color:'.$waxom_options['heading_color'].'; }';
}

if($waxom_options['sidebar_widget_heading_color'] && $waxom_options['sidebar_widget_heading_color'] != '#363636') {
	echo '#sidebar .bar > h5 { color:' . $waxom_options['sidebar_widget_heading_color'] . '; }';
}

if($waxom_options['sidebar_widget_text_color'] && $waxom_options['sidebar_widget_text_color'] != '#8c8c8c') {
	echo '#sidebar .bar { color:' . $waxom_options['sidebar_widget_text_color'] . '; }';
}

if($waxom_options['sidebar_widget_link_color'] && $waxom_options['sidebar_widget_link_color'] != '#8c8c8c') {
	echo '.page_sidebar .bar ul li > a, .page_sidebar a { color:' . $waxom_options['sidebar_widget_link_color'] . '; }';
}

if($waxom_options['sidebar_widget_border_color'] && $waxom_options['sidebar_widget_border_color'] != '#f1f1f1') {
	echo '.page_sidebar .bar ul li { border-color:' . $waxom_options['sidebar_widget_border_color'] . '; }';
}






// Footer

if($waxom_options['footer_bg_color'] && $waxom_options['footer_bg_color'] != '#202020' && $waxom_options['footer_bg_color'] != '#f6f6f6') { 
	echo '#footer { background-color:'.esc_attr($waxom_options['footer_bg_color']).' !important; }';
}

if($waxom_options['footer_color'] && $waxom_options['footer_color'] != '#666666' && $waxom_options['footer_color'] != '#aeaeae') { 
	echo '.copyright, #footer .vntd-social-icons a { color:'.esc_attr($waxom_options['footer_color']).' !important; }';
	echo '#footer .vntd-social-icons a { border-color:'.esc_attr($waxom_options['footer_color']).' !important; }';
}

if($waxom_options['footer_widgets_bg_color'] && $waxom_options['footer_widgets_bg_color'] != '#252525' && $waxom_options['footer_widgets_bg_color'] != '#fafafa') { 
	echo '#footer-widgets { background-color:'.esc_attr($waxom_options['footer_widgets_bg_color']).' !important; }';
}

?>

	
/* Font Sizes */

<?php 

if($waxom_options["typography_body"]["font-size"] != "14px") {
	echo 'body { font-size:'.esc_attr($waxom_options["typography_body"]["font-size"]).'; }';
}

if($waxom_options["typography_navigation"]["font-size"] != "14px") {
	echo ' .nav-menu ul li a { font-size:'.esc_attr($waxom_options["typography_navigation"]["font-size"]).'; }';
}

if($waxom_options["typography_page_title"]["font-size"] != "30px") {
	echo ' #page-title h1 { font-size:'.esc_attr($waxom_options["typography_page_title"]["font-size"]).'; }';
}

if($waxom_options["typography_special_heading"]["font-size"] != "36px") {
	echo ' #page-content .vntd-special-heading h1 { font-size:'.esc_attr($waxom_options["typography_special_heading"]["font-size"]).'; }';
}

if($waxom_options["typography_h1"]["font-size"] != "36px") {
	echo ' h1 { font-size:'.esc_attr($waxom_options["typography_h1"]["font-size"]).'; }';
}

if($waxom_options["typography_h2"]["font-size"] != "30px") {
	echo ' h2 { font-size:'.esc_attr($waxom_options["typography_h2"]["font-size"]).'; }';
}

if($waxom_options["typography_h3"]["font-size"] != "26px") {
	echo ' h3 { font-size:'.esc_attr($waxom_options["typography_h3"]["font-size"]).'; }';
}

if($waxom_options["typography_h4"]["font-size"] != "24px") {
	echo ' h4 { font-size:'.esc_attr($waxom_options["typography_h4"]["font-size"]).'; }';
}

if($waxom_options["typography_h5"]["font-size"] != "21px") {
	echo ' h5 { font-size:'.esc_attr($waxom_options["typography_h5"]["font-size"]).'; }';
}

if($waxom_options["typography_h6"]["font-size"] != "18px") {
	echo ' h6 { font-size:'.esc_attr($waxom_options["typography_h6"]["font-size"]).'; }';
}

if($waxom_options["typography_copyright"]["font-size"] != "13px") {
	echo ' footer p, footer a { font-size:'.esc_attr($waxom_options["typography_copyright"]["font-size"]).'; }';
}


/* Font Family */

$font_heading = $waxom_options['typography_heading']["font-family"];
$font_body = $waxom_options['typography_body']["font-family"];

if($font_heading && $font_heading != 'Raleway') {

	if (strpos($font_heading, ',') !== false) {
		$font_heading = explode(",", $font_heading);
		$font_heading = $font_heading[0];
	}
	
	echo ' h1,h2,h3,h4,h5,h6,#navigation,.nav-menu,.font-primary,.w-option-set,#page-content .wpb_content_element .wpb_tabs_nav li,.vntd-pricing-box .properties { font-family:"'.esc_attr($font_heading).'", Helvetica, Arial, sans-serif; }';
}

if($font_body && $font_body != 'Raleway') {

	if (strpos($font_body, ',') !== false) {
		$font_body = explode(",", $font_body);
		$font_body = $font_body[0];
	}
	
	echo ' body,h2.description,.vntd-cta-style-centered h1,.home-fixed-text,.font-secondary,.wpcf7-not-valid-tip,.testimonials h1,input,textarea { font-family:"'.esc_attr($font_body).'", Helvetica, Arial, sans-serif; }';
}

// Text/Font Transform

if($waxom_options['typography_heading']["text-transform"] && $waxom_options['typography_heading']["text-transform"] != 'none') {
	echo " h1,h2,h3,h4,h5,h6,.font-primary,.uppercase { text-transform:".esc_attr($waxom_options['typography_heading']["text-transform"])."; }";
}

if($waxom_options['typography_navigation']["text-transform"] && $waxom_options['typography_navigation']["text-transform"] != 'none') {
	echo " ul.nav { text-transform:".esc_attr($waxom_options['typography_navigation']["text-transform"])."; }";
}

// Font Weight

if($waxom_options['typography_heading']["font-weight"] && $waxom_options['typography_heading']["font-weight"] != "500") {
	echo " h1,h2,h3,h4,h5,h6,.font-primary,.w-option-set,#page-content .wpb_content_element .wpb_tabs_nav li,.vntd-pricing-box .properties { font-weight:".esc_attr($waxom_options['typography_heading']["font-weight"])."; }";
}

// Nav Font Weight

if($waxom_options['typography_navigation']["font-weight"] && $waxom_options['typography_navigation']["font-weight"] != "500") {
	echo " ul.nav { font-weight:".esc_attr($waxom_options['typography_navigation']["font-weight"])."; }";
}

// Custom CSS

if($waxom_options['footer_column_margin']) {
	echo ' .footer-widget-col-1 { margin-top: '. str_replace("px","",esc_attr($waxom_options['footer_column_margin'])) .'px; }';
}

if($waxom_options['custom_css']) {
	echo esc_textarea($waxom_options['custom_css']);
}

?>