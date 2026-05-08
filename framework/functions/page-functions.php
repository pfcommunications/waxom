<?php
//
// Blog Post Settings
//


add_action("admin_init", "waxom_page_metaboxes");   

function waxom_page_metaboxes(){    
    add_meta_box("waxom_page_settings", "Page Settings", "waxom_page_settings_config", "page", "side", "low");
    add_meta_box("waxom_page_settings", "Page Settings", "waxom_page_settings_config", "post", "side", "low");
    add_meta_box("waxom_page_settings", "Page Settings", "waxom_page_settings_config", "portfolio", "side", "low");
    
    add_meta_box("waxom_page_settings_advanced", "Advanced Page Settings", "waxom_page_settings_advanced_config", "page", "side", "low", true, true);
    add_meta_box("waxom_page_settings_advanced", "Advanced Page Settings", "waxom_page_settings_advanced_config", "post", "side", "low");
    add_meta_box("waxom_page_settings_advanced", "Advanced Page Settings", "waxom_page_settings_advanced_config", "portfolio", "side", "low");
   
    add_meta_box("waxom_page_custom_pagetitle", "Customize Page Title", "waxom_pagetitle_config", "page", "normal", "low");
    add_meta_box("waxom_page_custom_pagetitle", "Customize Page Title", "waxom_pagetitle_config", "post", "normal", "low");
    add_meta_box("waxom_page_custom_pagetitle", "Customize Page Title", "waxom_pagetitle_config", "portfolio", "normal", "low");
}   

function waxom_page_settings_config() {
        global $post;	
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);
        $footer_widgets = $page_header = $page_subtitle = $navbar_style = $navbar_color = $page_layout = $page_sidebar = $page_width = $footer_color = $footer_widgets = '';
        if(array_key_exists("page_header", $custom)) {
			$page_header = $custom["page_header"][0];
		}
		if(array_key_exists("page_subtitle", $custom)) {
			$page_subtitle = $custom["page_subtitle"][0];
		}
		if(array_key_exists("navbar_style", $custom)) {
			$navbar_style = $custom["navbar_style"][0];
		}
		if(array_key_exists("navbar_color", $custom)) {
			$navbar_color = $custom["navbar_color"][0];
		}
		if(array_key_exists("page_layout", $custom)) {
			$page_layout = $custom["page_layout"][0];	
		}
		if(array_key_exists("page_sidebar", $custom)) {
			$page_sidebar = $custom["page_sidebar"][0];
		}
		if(array_key_exists("page_width", $custom)) {
			$page_width = $custom["page_width"][0];
		}
		if(array_key_exists("footer_color", $custom)) {
			$footer_color = $custom["footer_color"][0];
		}
		if(array_key_exists("footer_widgets", $custom)) {
			$footer_widgets = $custom["footer_widgets"][0];
		}
?>
    <div class="metabox-options form-table side-options">
  		
		<div id="page-header" class="label-radios">  		
			<h5><?php esc_html_e('Page Title','waxom'); ?>:</h5>
    	    <?php
    	    $headers = array(
    	    	'Enabled' => "default",
    	    	'No Page Title' => 'no-header'
    	    );
    	    
    	    waxom_create_dropdown('page_header',$headers,$page_header);
    	    
    	    ?>
    	    
    	</div>
    	
    	<div id="navbar-style">  		
    		<h5><?php esc_html_e('Header Style','waxom'); ?>:</h5>
    	    <?php
    	    $navbar_styles = array(
    	    	'Default set in Theme Options' => "default",    	    	
    	    	"Style 1 - Default Style" => "style-default",
    	    	"Style 2 - Transparent Menu" => "style-transparent",
    	    	"Style 3 - Appear after first section" => "style-default-slide",
    	    	"Disable" => "disable" 
    	    );
    	    
    	    waxom_create_dropdown('navbar_style',$navbar_styles,$navbar_style);
    	    
    	    ?>
    	    
    	</div>
    	
    	<?php if(get_post_type(get_the_id()) == 'portfolio') { } else { ?>
    	
    	<div class="metabox-option">
			<h5><?php esc_html_e('Page Layout','waxom'); ?>:</h5>
			
			<?php 
			if(!$page_layout) $page_layout = waxom_option('default_layout');
			$page_layout_arr = array('Right Sidebar' => 'sidebar_right', 'Left Sidebar' => 'sidebar_left', "Fullwidth" => 'fullwidth');  
			
			waxom_create_dropdown('page_layout',$page_layout_arr,$page_layout,true);
			
			?>
		</div>
		<div class="metabox-option fold fold-page_layout fold-sidebar_right fold-sidebar_left" <?php if($page_layout == "fullwidth" || !$page_layout) echo 'style="display:none;"'; ?>>
			<h5><?php esc_html_e('Page Sidebar','waxom'); ?>:</h5>
			<select name="page_sidebar" class="select"> 
                <option value="Default Sidebar"<?php if($page_sidebar == "Default Sidebar" || !$page_sidebar) echo "selected"; ?>>Default Sidebar</option>
            	<?php
            								
				// Retrieve custom sidebars
											
				$sidebars = waxom_option('sidebar_generator');  
  				global $waxom_options;
  				
  				if(array_key_exists('sidebar_generator', $waxom_options)) {
  					foreach($waxom_options["sidebar_generator"] as $sidebar)  
  					{  
  						
  						?>
  						
  						<option value="<?php echo esc_textarea($sidebar); ?>"<?php if($page_sidebar == $sidebar) echo "selected"; ?>><?php echo esc_textarea($sidebar); ?></option>
  						
  						<?php 
  					}
  				}
				
				if(class_exists('Woocommerce')) {
				
					if($page_sidebar == "WooCommerce Shop Page") $selected_shop = "selected";
					if($page_sidebar == "WooCommerce Product Page") $selected_product = "selected";
					
					echo '<option value="WooCommerce Shop Page" '.$selected_shop.'>WooCommerce Shop Page</option>';
					echo '<option value="WooCommerce Product Page" '.$selected_product.'>WooCommerce Product Page</option>';
				}			
				?>            	

            </select>
		</div>
		
		<?php } ?>
        
    </div>
<?php

}	

function waxom_page_settings_advanced_config() {
        global $post;	
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);
        $footer_widgets = $footer_style = $footer_color = $page_nav_menu = '';
        if(array_key_exists("page_nav_menu", $custom)) {
        	$page_nav_menu = $custom["page_nav_menu"][0];
        }
		if(array_key_exists("footer_style", $custom)) {
			$footer_style = $custom["footer_style"][0];
		}
		if(array_key_exists("footer_color", $custom)) {
			$footer_color = $custom["footer_color"][0];
		}
		if(array_key_exists("footer_widgets", $custom)) {
			$footer_widgets = $custom["footer_widgets"][0];
		}
?>
    <div class="metabox-options form-table side-options">
    	
    	<div class="metabox-option fold fold-page_layout fold-sidebar_right fold-sidebar_left">
			<h5><?php esc_html_e('Page Nav Menu','waxom'); ?>:</h5>
			
			<select name="page_nav_menu" class="select"> 
			    <option value="default" <?php if($page_nav_menu == "default" || !$page_nav_menu) echo "selected"; ?>>Default Nav Menu</option>
			<?php
			
			$nav_menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );	
			$selected = '';
			foreach($nav_menus as $nav_menu)  
			{  	
				$selected = '';
				if($page_nav_menu == $nav_menu->slug) $selected = ' selected';
				echo '<option value="'.$nav_menu->slug.'"'.esc_attr($selected).'>'.$nav_menu->name.'</option>';
			}
			
			?>
			</select>
		</div>
		
		<div id="footer-color">  		
			<h5><?php esc_html_e('Footer Widgets Area','waxom'); ?>:</h5>
		    <?php
		    $footer_widgets_arr = array(
		    	'Default set in Theme Options' => "default",
		    	'Enabled' => 'enabled',
		    	'Disabled' => 'disabled'
		    );
		    
		    waxom_create_dropdown('footer_widgets',$footer_widgets_arr,$footer_widgets);
		    
		    ?>
		    
		</div>
        
    </div>
<?php

}
 

function waxom_pagetitle_config() {
        global $post;	
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);
        $customize_enable = $customize_textcolor = $customize_bgcolor = $customize_bg_image = $customize_textalign = $customize_bgimage = $customize_breadcrumbs = $customize_fontsize = $customize_fontweight = $customize_texttransform = $customize_height = $customize_animated = $customize_bgoverlay = '';
        if(array_key_exists("customize_enable", $custom)) {
			$customize_enable = $custom["customize_enable"][0];
		}
		if(array_key_exists("customize_textcolor", $custom)) {
			$customize_textcolor = $custom["customize_textcolor"][0];
		}
		if(array_key_exists("customize_bgcolor", $custom)) {
			$customize_bgcolor = $custom["customize_bgcolor"][0];
		}
		if(array_key_exists("customize_bgimage", $custom)) {
			$customize_bgimage = $custom["customize_bgimage"][0];
		}
		if(array_key_exists("customize_textalign", $custom)) {
			$customize_textalign = $custom["customize_textalign"][0];	
		}
		if(array_key_exists("customize_fontweight", $custom)) {
			$customize_fontweight = $custom["customize_fontweight"][0];
		}
		if(array_key_exists("customize_fontsize", $custom)) {
			$customize_fontsize = $custom["customize_fontsize"][0];
		}
		if(array_key_exists("customize_texttransform", $custom)) {
			$customize_texttransform = $custom["customize_texttransform"][0];
		}
		if(array_key_exists("customize_breadcrumbs", $custom)) {
			$customize_breadcrumbs = $custom["customize_breadcrumbs"][0];
		}
		if(array_key_exists("customize_height", $custom)) {
			$customize_height = $custom["customize_height"][0];
		}
		if(array_key_exists("customize_animated", $custom)) {
			$customize_animated = $custom["customize_animated"][0];
		}
		if(array_key_exists("customize_bgoverlay", $custom)) {
			$customize_bgoverlay = $custom["customize_bgoverlay"][0];
		}
		
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker', '', '', '', true);

?>
    <div class="metabox-options form-table side-options pagetitle-customize">
  		
  		<div id="customize_textcolor">  		
  		    <?php
  		    
  		    $arr_enable = array(
  		    	"Don't use a custom page title" => 'no',
  		    	'Use a custom page title' => "yes",
  		    	
  		    );
  		    
  		    waxom_create_dropdown('customize_enable',$arr_enable,$customize_enable);
  		    
  		    ?>
  		    
  		</div>	
    	
    	<?php 
    	$extra_class = 'hidden';
    	if($customize_enable == 'yes') $extra_class = ' not-hidden';
    	
    	?>
    	<div id="customize_textalign" class="hidden <?php echo esc_attr($extra_class); ?>">  		
    		<h5><?php esc_html_e('Text Align','waxom'); ?>:</h5>
    		
    	    <?php
    	    
    		$arr_textalign = array(
    			'Left' => "left",
    			'Center' => "center"
    		);
    		
    		waxom_create_dropdown('customize_textalign',$arr_textalign,$customize_textalign);
    	    
    	    ?>
    	    
    	</div> 	
    	
    	<div id="customize_breadcrumbs" class="hidden <?php echo esc_attr($extra_class); ?>">  		
    		<h5><?php esc_html_e('Breadcrumbs','waxom'); ?>:</h5>
    		
    	    <?php
    	    
			$arr_breadcrumbs = array(
				'Disabled' => 'disabled',
				'Enabled' => "enabled"				
			);
			
			waxom_create_dropdown('customize_breadcrumbs',$arr_breadcrumbs,$customize_breadcrumbs);
    	    
    	    ?>
    	    
    	</div>
    	
    	<div id="customize_fontweight" class="hidden <?php echo esc_attr($extra_class); ?>">  		
    		<h5><?php esc_html_e('Title Font Weight','waxom'); ?>:</h5>
    		
    	    <?php
    	    
    		$arr_fontweight = array(
    			'Normal' => "normal",
    			'Bold' => 700,
    			'Extra Bold' => 800
    		);
    		
    		waxom_create_dropdown('customize_fontweight',$arr_fontweight,$customize_fontweight);
    	    
    	    ?>
    	    
    	</div>
    	
    	<div id="customize_fontsize" class="hidden <?php echo esc_attr($extra_class); ?>">  		
    		<h5><?php esc_html_e('Title Font Size','waxom'); ?>:</h5>
    		
    	    <?php
    	    
    		$arr_fontsize = array(
    			'30' => 30,
    			'32' => 32,
    			'36' => 36,
    			'40' => 40,
    			'44' => 44,
    			'48' => 48,
    			'52' => 52,
    			'56' => 56,
    			'60' => 60,
    			'64' => 64,
    			'68' => 68,
    			'72' => 72,
    			'76' => 76
    		);
    		
    		waxom_create_dropdown('customize_fontsize',$arr_fontsize,$customize_fontsize);
    	    
    	    ?>
    	    
    	</div>
    	
    	<div id="customize_texttransform" class="hidden <?php echo esc_attr($extra_class); ?>">  		
    		<h5><?php esc_html_e('Text Transform','waxom'); ?>:</h5>
    		
    	    <?php
    	    
    		$arr_texttransform = array(
    			'Normal' => "normal",
    			'Uppercase' => "uppercase"
    		);
    		
    		waxom_create_dropdown('customize_texttransform',$arr_texttransform,$customize_texttransform);
    	    
    	    ?>
    	    
    	</div>
    	
    	<div id="customize_height" class="hidden <?php echo esc_attr($extra_class); ?>">  		
    		<h5><?php esc_html_e('Page Title Height','waxom'); ?>:</h5>
    		
    	    <input type="text/css" value="<?php if(!$customize_height) { echo '80'; } else { echo esc_attr($customize_height); } ?>" name="customize_height">
    	    
    	</div>
    	
		<div id="customize_textcolor" class="hidden <?php echo esc_attr($extra_class); ?>">  		
			<h5><?php esc_html_e('Text Color','waxom'); ?>:</h5>

		    <input name="customize_textcolor" type="text" value="<?php echo esc_attr($customize_textcolor); ?>" class="wp-color-picker">
		</div>
    	
		<div id="customize_bgcolor" class="hidden <?php echo esc_attr($extra_class); ?>">  		
			<h5><?php esc_html_e('Background Color','waxom'); ?>:</h5>

		    <input name="customize_bgcolor" type="text" value="<?php echo esc_attr($customize_bgcolor); ?>" class="wp-color-picker">
		</div>
		
		<div id="customize_bgimage" class="hidden image-upload image-upload-dep <?php echo esc_attr($extra_class); ?>">  		
			<h5><?php esc_html_e('Background Image','waxom'); ?>:</h5>

		    <input name="customize_bgimage" type="hidden" value="<?php echo $customize_bgimage; ?>" class="image-upload-data">
		    <div class="image-upload-preview show-on-upload" <?php if($customize_bgimage) echo 'style="display:block;"'; ?>>
		    	<?php
		    		$imgurl = '';
		    		if($customize_bgimage) {
			    		$imgurl = wp_get_attachment_image_src( $customize_bgimage, 'thumbnail');			
			    		$imgurl = $imgurl[0];
			    	}
		    	?>
		    	<img src="<?php echo esc_url($imgurl);?>">
		    </div>
		    <div class="button add-single-image"><?php if($customize_bgimage) { esc_html_e('Change image','waxom'); } else { esc_html_e('Upload image','waxom'); } ?></div>
		    <div class="button remove-single-image show-on-upload" <?php if($customize_bgimage) echo 'style="display:inline-block;"'; ?>><?php esc_html_e('Remove image','waxom'); ?></div>
		</div>
		
		<div id="customize_overlay" class="hidden <?php echo esc_attr($extra_class); ?>">  		
			<h5><?php esc_html_e('Background Image Overlay','waxom'); ?>:</h5>
			
		    <?php
		    
			$arr_bgoverlays = array(
				'None' => 'none',
				'Dark' => 'dark',
				'Darker' => 'darker'
			);
			
			waxom_create_dropdown('customize_bgoverlay',$arr_bgoverlays,$customize_bgoverlay);
		    
		    ?>
		    
		</div>
        
    </div>
<?php

}	


	
// Save Custom Fields
	
add_action('save_post', 'waxom_save_page_settings'); 

function waxom_save_page_settings(){
    global $post;  

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return $post_id;
	}else{		
	
		$post_metas = array('page_layout','page_sidebar','page_width','navbar_style','navbar_color','footer_color','footer_style','page_header','page_title','page_subtitle','footer_widgets', 'customize_fontsize', 'customize_texttransform', 'customize_textalign', 'customize_fontweight', 'customize_textcolor', 'customize_bgcolor', 'customize_bgimage', 'customize_breadcrumbs', 'customize_enable', 'customize_height', 'customize_animated', 'page_nav_menu','customize_bgoverlay');
		
		foreach($post_metas as $post_meta) {
			if(isset($_POST[$post_meta])) update_post_meta($post->ID, $post_meta, $_POST[$post_meta]);
		}

    }

}