<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "waxom_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( get_template_directory() . '/framework/theme-panel/waxom/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( get_template_directory() . '/framework/theme-panel/waxom/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Waxom', 'waxom' ),
        'page_title'           => esc_html__( 'Waxom Theme Options', 'waxom' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
		'templates_path'		=> get_template_directory() . '/framework/theme-panel/waxom/templates/panel/',
        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => esc_html__( 'Documentation', 'waxom' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => esc_html__( 'Support', 'waxom' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => esc_html__( 'Extensions', 'waxom' ),
    );

    // Add content after the form.
    $args['footer_text'] = '<p>Need help? Visit our dedicated <a href="http://veented.com/support" target="_blank">Support Forums</a>.</p>';

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'waxom' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'waxom' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'waxom' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'waxom' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'waxom' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
     
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General', 'waxom' ),
        'id'     => 'general',
        'desc'   => esc_html__( 'General Theme Settings.', 'waxom' ),
        'icon'   => 'fa fa-home',
        'fields' => array(
            array(
                'id'       => 'site_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Website Logo Image', 'waxom' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( "Upload your website's logo image.", 'waxom' ),
                'default'  => array( 'url' => '../wp-content/themes/waxom/img/logo-dark.png' ),
            ),
            array(
                'id'       => 'site_logo_white',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'White Logo Image Version', 'waxom' ),
                'compiler' => 'true',
                'subtitle' => esc_html__( "Used for Transparent Header style.", 'waxom' ),
                'default'  => array( 'url' => '../wp-content/themes/waxom/img/logo-white.png' ),
            ),
            array(
                'id'       => 'stt',
                'type'     => 'switch',
                'title'    => esc_html__( 'Scroll to Top Button', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the Scroll to Top button on your website.', 'waxom' ),
                'default'  => true,
            ),
            array(
                'id'       => 'default_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Default Page Layout', 'waxom' ),
                'subtitle' => esc_html__( 'Choose a default page layout for your pages: Fullwidth, Sidebar Right or Sidebar Left', 'waxom' ),
                'options'  => array(
                    'fullwidth' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    'sidebar_left' => array(
                        'alt' => '2 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    'sidebar_right' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                ),
                'default'  => 'fullwidth'
            ),
        )
    ) );
    
    // Header Tab
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header', 'waxom' ),
        'id'     => 'header',
        'desc'   => esc_html__( 'Header Settings.', 'waxom' ),
        'icon'   => 'fa fa-columns',
        'fields' => array(
            array(
                'id'       => 'header_style',
                'type'     => 'select',
                'title'    => esc_html__( 'Header Style', 'waxom' ),
                'subtitle' => esc_html__( 'Choose a style of your Site Header.', 'waxom' ),
                'options'  => array(
                    'style-default' => 'Classic',
                    'style-transparent' => 'Transparent',
//                    'style-transparent-topbar' => 'Transparent + Top Bar',
                    'style-default-slide' => 'Appear after first selection',
                    'disable' => 'Disable',
                ),
                'default'  => 'style-default'
            ),
            array(
                'id'       => 'header_dropdown_color',
                'type'     => 'select',
                'title'    => esc_html__( 'Dropdown Menu Color', 'waxom' ),
                'subtitle' => esc_html__( 'Choose a color scheme for the dropdown menu.', 'waxom' ),
                'options'  => array(
                    'dark' 	=> 'Dark',
                    'white' => 'White',
                ),
                'default'  => 'dark'
            ),
            array(
                'id'       => 'header_search',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header Search', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the Search field in Header.', 'waxom' ),
                'default'  => true,
            ),
            array(
                'id'       => 'header_title',
                'type'     => 'switch',
                'title'    => esc_html__( 'Page Title', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the Page Title area globally.', 'waxom' ),
                'default'  => true,
            ),
            array(
                'id'       => 'breadcrumbs',
                'type'     => 'switch',
                'title'    => esc_html__( 'Breadcrumbs', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the Breadcrumbs navigation.', 'waxom' ),
                'default'  => true,
            ),
            
        )
    ) );
    
    // Top Bar
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Top Bar', 'waxom' ),
        'id'     => 'topbar',
        'desc'   => esc_html__( 'Top Bar Settings.', 'waxom' ),
        'icon'   => 'fa fa-columns',
        'fields' => array(
            array(
                'id'       => 'topbar',
                'type'     => 'switch',
                'title'    => esc_html__( 'Top Bar', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the Top Bar section.', 'waxom' ),
                'default'  => true,
            ),
            array(
                'id'       => 'topbar_transparent',
                'type'     => 'switch',
                'title'    => esc_html__( 'Top Bar above Transparent Header', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the Top Bar section above transparent style Header.', 'waxom' ),
                'default'  => false,
            ),
            array(
                'id'       => 'topbar_left',
                'type'     => 'select',
                'title'    => esc_html__( 'Left side content type', 'waxom' ),
                'subtitle' => esc_html__( 'Choose a content type for the left side of the Top Bar section.', 'waxom' ),
                'options'  => array(
                    "social" => "Social Icons",
                    "menu" => "Menu",
                    "text" => "Text",
                    "textsocial" => "Text + Social Icons"
                ),
                'default'  => 'text'
            ),
            array(
                'id'       => 'topbar_right',
                'type'     => 'select',
                'title'    => esc_html__( 'Right side content type', 'waxom' ),
                'subtitle' => esc_html__( 'Choose a content type for the right side of the Top Bar section.', 'waxom' ),
                'options'  => array(
                    "social" => "Social Icons",
                    "menu" => "Menu",
                    "text" => "Text",
                    "textsocial" => "Text + Social Icons"
                ),
                'default'  => 'social'
            ),
            array(
                'id'       => 'topbar_text_left',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Left Top Bar Text', 'waxom' ),
                'subtitle' => esc_html__( 'The text content that is being selectable as one of the "content types" for the Top Bar. Supports HTML.', 'waxom' ),
                'default'  => 'Hello there! Reach us at 3591 341 344.',
            ),
            array(
                'id'       => 'topbar_text_right',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Right Top Bar Text', 'waxom' ),
                'subtitle' => esc_html__( 'The text content that is being selectable as one of the "content types" for the Top Bar. Supports HTML.', 'waxom' ),
                'default'  => '[icon icon="envelope"] hello@waxom.com [icon icon="phone"] 591 341 344',
            ),
            array(
                'id'       => 'topbar_wpml',
                'type'     => 'switch',
                'title'    => esc_html__( 'WPML Language Switcher', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the WPML language switcher in the Top Bar.', 'waxom' ),
                'default'  => false,
            ),
            
    	)
    ) );
    
    // Footer
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer', 'waxom' ),
        'id'     => 'footer',
        'desc'   => esc_html__( 'Footer Settings.', 'waxom' ),
        'icon'   => 'fa fa-download',
        'fields' => array(
            array(
                'id'       => 'copyright',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Copyright Text', 'waxom' ),
                'subtitle' => esc_html__( 'Supports HTML.', 'waxom' ),
                'default'  => 'Copyright 2015 Waxom, Designed by ThemeFire.',
            ),
            array(
                'id'       => 'footer_widgets',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Widgets Area', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the Footer Widgets area globally. Please visit Appearance / Widgets menu to add new widgets!', 'waxom' ),
                'default'  => true,
            ),
            array(
                'id'       => 'footer_social_icons',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Social Icons', 'waxom' ),
                'subtitle' => esc_html__( 'Enable the Social Icons displayed in the Footer section.', 'waxom' ),
                'default'  => true,
            ),
            array(
                'id'       => 'footer_column_margin',
                'type'     => 'text',
                'title'    => esc_html__( 'First column top margin', 'waxom' ),
                'subtitle' => esc_html__( 'Set a top margin for the first column of the Widgets Area. Handy if you want to vertically center the first column content (for example with a logo image) with the rest of the columns. Example: -20px.', 'waxom'),
                'default'  => '-27px',
            ),
            
    	)
    ) );    
    
    // Blog
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Blog', 'waxom' ),
        'id'     => 'blog',
        'desc'   => esc_html__( 'Blog Settings.', 'waxom' ),
        'icon'   => 'fa fa-file-text-o',
        'fields' => array(
            array(
                'id'       => 'blog_style',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Style', 'waxom' ),
                'subtitle' => esc_html__( 'Choose a style for your Blog.', 'waxom' ),
                'options'  => array(
                    "classic" => "Classic",
                    "grid" => "Grid",
                    "minimal" => "Minimal",
                ),
                'default'  => 'classic'
            ),
            array(
                'id'       => 'blog_masonry',
                'type'     => 'switch',
                'title'    => esc_html__( 'Masonry', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the Masonry effect for your grid.', 'waxom' ),
                'default'  => true,
                'required' => array('blog_style','=',"grid")
            ),
            array(
                'id'       => 'blog_grid_cols',
                'type'     => 'select',
                'title'    => esc_html__( 'Blog Grid Columns', 'waxom' ),
                'subtitle' => esc_html__( 'Select number of columns for your grid.', 'waxom' ),
                'options'  => array(
                    "4" => "4",
                    "3" => "3",
                    "2" => "2",
                ),
                'default'  => '3',
                'required' => array('blog_style','=',"grid")
            ),
            array(
                'id'       => 'blog_ajax',
                'type'     => 'switch',
                'title'    => esc_html__( 'Ajax Pagination', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the Ajax Pagination.', 'waxom' ),
                'default'  => true
            ),
            
    	)
    ) );    
    
    // Portfolio
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Portfolio', 'waxom' ),
        'id'     => 'portfolio',
        'desc'   => esc_html__( 'Portfolio Settings.', 'waxom' ),
        'icon'   => 'fa fa-briefcase',
        'fields' => array(
            array(
                'id'       => 'portfolio_url',
                'type'     => 'select',
                'data'     => 'pages',
                'title'    => esc_html__( 'Main Portfolio Page', 'waxom' ),
                'subtitle' => esc_html__( 'Select a default portfolio page for the "Back to portfolio" link on single portfolio posts.', 'waxom' ),
            ),
            
    	)
    ) );
    
    // Sidebars
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Sidebars', 'waxom' ),
        'id'     => 'sidebars',
        'icon'   => 'fa fa-indent',
        'fields' => array(
            array(
                'id'       => 'sidebar_generator',
                'type'     => 'multi_text',
                'title'    => esc_html__( 'Sidebar Manager', 'waxom' ),
                'subtitle' => esc_html__( 'Create new sidebars.', 'waxom' ),
            ),
            
    	)
    ) );
    
    // Social Icons
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Icons', 'waxom' ),
        'id'     => 'socialicons',
        'icon'   => 'fa fa-twitter',
        'fields' => array(
        	array(
        	    'id'       => 'social_icons_style',
        	    'type'     => 'select',
        	    'title'    => esc_html__( 'Social Icons Package', 'waxom' ),
        	    'subtitle' => esc_html__( 'Choose a font package for your social icons.', 'waxom' ),
        	    'options'  => array(
        	        "simple_line_icons" => "Simple Line Icons (Outline)",
        	        "font_awesome" => "FontAwesome"
        	    ),
        	    'default'  => 'text'
        	),
            array(
                'id'       => 'social_icons',
                'type'     => 'sortable',
                'title'    => esc_html__( 'Social Icons Generator', 'waxom' ),
                'subtitle' => esc_html__( 'Easily add and arrange social icons for use in Footer and Top Bar.<br>Leave blank field to disable a specific icon.', 'waxom' ),
                'label'    => true,
                'options'  => array(
                    'Facebook URL' => 'http://your_facebook_page_url',
                    'Twitter' => '#',
                    'Google-plus' => '',
                    'Linkedin' => '',
                    'Dribbble' => '#',
                    'Vimeo' => '#',
                    'Youtube' => '#',
                    'Pinterest' => '',
                    'Skype' => '',
                    'Tumblr' => '',
                    'Behance' => '',
                    'Dropbox' => '',
                    'RSS' => '',
                    'Weibo' => '',
                    'Flickr' => '',
                    'Soundcloud' => '',
                    'Spotify' => '',
                    'Instagram' => '',
                    'Stack-exchange' => '',
                    'Stack-overflow' => '',
                    'Github' => '',
                    'Maxcdn' => '',
                    'E-mail' => ''
                )
            ),
            
    	)
    ) );
    
    // Appearance
    
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Appearance', 'waxom' ),
        'id'    => 'appearance',
        'icon'  => 'fa fa-paint-brush'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'waxom' ),
        'id'         => 'appearance_general',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'accent_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Accent Color', 'waxom' ),
                'subtitle' => esc_html__( 'Main Accent color.', 'waxom' ),
                'default'  => '#c7b299',
                'transparent' => false
            ),
			array(
			    'id'       => 'accent_color2',
			    'type'     => 'color',
			    'title'    => esc_html__( 'Accent Color 2', 'waxom' ),
			    'subtitle' => esc_html__( 'Alternative Accent color.', 'waxom' ),
			    'default'  => '#998675',
			    'transparent' => false
			),
			array(
			    'id'       => 'accent_color3',
			    'type'     => 'color',
			    'title'    => esc_html__( 'Accent Color 3', 'waxom' ),
			    'subtitle' => esc_html__( 'Alternative Accent color.', 'waxom' ),
			    'default'  => '#2f2928',
			    'transparent' => false
			),
			array(
			    'id'       => 'accent_color4',
			    'type'     => 'color',
			    'title'    => esc_html__( 'Accent Color 4', 'waxom' ),
			    'subtitle' => esc_html__( 'Subtle Background color.', 'waxom' ),
			    'default'  => '#fbfaf8',
			    'transparent' => false
			),
			array(
			    'id'       => 'bg_color',
			    'type'     => 'color',
			    'title'    => esc_html__( 'Background Color', 'waxom' ),
			    'default'  => '#ffffff',
			    'transparent' => false
			),
			array(
			    'id'       => 'predefined_colors',
			    'type'     => 'palette',
			    'title'    => esc_html__( 'Predefined Color Palettes', 'waxom' ),
			    'subtitle' => esc_html__( 'Select a predefined scheme for the accent color.', 'waxom' ),
			    'default'  => 'red',
			    'palettes' => array(
			        'brown'  => array( // Brown
			            '#c7b299',
			            '#998675',
			            '#2f2928',
			            '#fbfaf8',
			            '#ffffff',
			        ),
			        'green'  => array( // Original emerald
			            '#7bcba8',
			            '#00a652',
			            '#00a652',
			            '#f8f8f8',
			            '#ffffff',
			        ),
			        'green-bright'  => array( // Brighter Green
			            '#8dc63f',
			            '#7ab22f',
			            '#578913',
			            '#f8fef0',
			            '#ffffff',
			        ),
			        'blue'  => array(
			            '#00bff3',
			            '#00abe4',
			            '#0076a3',
			            '#f2fcff',
			            '#ffffff',
			        ),
			        'orange'  => array(
			            '#ff9700',
			            '#e38600',
			            '#b96d00',
			            '#fff8ed',
			            '#ffffff',
			        ),
			        
			        'red'  => array(
			            '#f04e4e',
			            '#e44040',
			            '#cb2a2a',
			            '#fbf4f4',
			            '#ffffff',
			        ),
			        
			        
			    )
			),
        ),
        
    ) );
    
    Redux::setSection( $opt_name, array(
            'title'      => esc_html__( 'Header', 'waxom' ),
            'id'         => 'appearance_header',
            'subsection' => true,
            'fields'     => array(
    			array(
    			    'id'       => 'header_bg_color',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Background Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Background color of the Page Header.', 'waxom' ),
    			    'default'  => '#ffffff',
    			    'transparent' => false
    			),
    			array(
    			    'id'       => 'topbar_bg_color',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Top Bar Background Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Background color of the Top Bar section.', 'waxom' ),
    			    'default'  => '#fafafa',
    			    'transparent' => false
    			),
            ),
            
        ) );
        
    Redux::setSection( $opt_name, array(
            'title'      => esc_html__( 'Page Title', 'waxom' ),
            'id'         => 'appearance_pagetitle',
            'subsection' => true,
            'fields'     => array(
    			array(
    			    'id'       => 'breadcrumbs_color',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Breadcrumbs Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Text color of the Breadcrumbs navigation.', 'waxom' ),
    			    'default'  => '#959595',
    			    'transparent' => false
    			),
    			array(
    			    'id'       => 'pagetitle_bg_color_start',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Page Title Background Gradient Start Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Select the first (left) color of the Page Title gradient.', 'waxom' ),
    			    'default'  => '#362f2d',
    			    'transparent' => false
    			),
    			array(
    			    'id'       => 'pagetitle_bg_color_end',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Page Title Background Gradient End Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Select the second (left) color of the Page Title gradient.', 'waxom' ),
    			    'default'  => '#534741',
    			    'transparent' => false
    			),
            ),
            
        ) );
        
        
    Redux::setSection( $opt_name, array(
            'title'      => esc_html__( 'Page Content', 'waxom' ),
            'id'         => 'appearance_pagecontent',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'body_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'waxom' ),
                    'subtitle' => esc_html__( 'Website paragraph text color.', 'waxom' ),
                    'default'  => '#8c8c8c',
                    'transparent' => false
                ),
    			array(
    			    'id'       => 'heading_color',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Heading Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Color of text Headings.', 'waxom' ),
    			    'default'  => '#363636',
    			    'transparent' => false
    			),
    			array(
    			    'id'       => 'sidebar_widget_heading_color',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Sidebar Widget Heading Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Color of sidebar widgets heading.', 'waxom' ),
    			    'default'  => '#363636',
    			    'transparent' => false
    			),
    			array(
    			    'id'       => 'sidebar_widget_text_color',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Sidebar Widget Text Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Color of sidebar widgets paragraph texts.', 'waxom' ),
    			    'default'  => '#8c8c8c',
    			    'transparent' => false
    			),
    			array(
    			    'id'       => 'sidebar_widget_link_color',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Sidebar Widget Link Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Color of links in sidebar widgets.', 'waxom' ),
    			    'default'  => '#8c8c8c',
    			    'transparent' => false
    			),
    			array(
    			    'id'       => 'sidebar_widget_border_color',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Sidebar Widget Border Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Color of the border separating the widget links.', 'waxom' ),
    			    'default'  => '#f1f1f1',
    			    'transparent' => false
    			),
            ),
            
        ) );
        
    Redux::setSection( $opt_name, array(
            'title'      => esc_html__( 'Footer', 'waxom' ),
            'id'         => 'appearance_footer',
            'subsection' => true,
            'fields'     => array(
                array(
                    'id'       => 'footer_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'waxom' ),
                    'subtitle' => esc_html__( 'Footer text color.', 'waxom' ),
                    'default'  => '#666666',
                    'transparent' => false
                ),
                array(
                    'id'       => 'footer_bg_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Footer Background Color', 'waxom' ),
                    'subtitle' => esc_html__( 'Background color of the Footer.', 'waxom' ),
                    'default'  => '#111111',
                    'transparent' => false
                ),
    			array(
    			    'id'       => 'footer_widgets_bg_color',
    			    'type'     => 'color',
    			    'title'    => esc_html__( 'Footer Widgets Background Color', 'waxom' ),
    			    'subtitle' => esc_html__( 'Background color of the Footer Widgets.', 'waxom' ),
    			    'default'  => '#191919',
    			    'transparent' => false
    			),
            ),
            
        ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Typography', 'waxom' ),
        'id'         => 'appearance_typography',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'typography_body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
                "font-style" => false,
                'default'  => array(
                    'color'       => '#8c8c8c',
                    'font-size'   => '14px',
                    'font-family' => 'Raleway',
                    'font-weight' => '400',
                ),
            ),
            array(
                'id'       => 'typography_heading',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading Font', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the heading font properties.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
                "font-size" => false,
                "font-style" => false,
                "text-transform" => true,
                'default'  => array(
                    'color'       => '#363636',
                    'font-family' => 'Raleway',
                    'font-weight' => '500',
                    "font-size" => "36px",
                    "text-transform" => "none"
                ),
            ),
            array(
                'id'       => 'typography_navigation',
                'type'     => 'typography',
                'title'    => esc_html__( 'Site Navigation Font', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the site navigation font properties.', 'waxom' ),
                "font-family" => false,
                'google'   => false,
                "text-align" => false,
                "letter-spacing" => true,
                "font-weight" => true,
                "font-style" => false,
                "line-height" => false,
                "subsets" => false,
                "text-transform" => true,
                'default'  => array(
                    'color'       => '#8c8c8c',
                    'font-weight' => '500',
                    "font-size" => "14px",
                    "text-transform" => "none",
                    "letter-spacing" => "0px"
                ),
            ),
            array(
                'id'       => 'typography_special_heading',
                'type'     => 'typography',
                'title'    => esc_html__( 'Special Heading Font Size', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the Special Heading element font size.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
            	"color" => false,
            	"font-family" => false,
            	"font-style" => false,
            	"font-weight" => false,
                'default'  => array(
                    "font-size" => "36px"
                ),
            ),
            array(
                'id'       => 'typography_h1',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading 1 Font Size', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the heading font properties.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
				"color" => false,
				"font-family" => false,
				"font-style" => false,
				"font-weight" => false,
                'default'  => array(
                    "font-size" => "36px"
                ),
            ),
            array(
                'id'       => 'typography_h2',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading 2 Font Size', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the heading font properties.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
            	"color" => false,
            	"font-family" => false,
            	"font-style" => false,
            	"font-weight" => false,
                'default'  => array(
                    "font-size" => "30px"
                ),
            ),
            array(
                'id'       => 'typography_h3',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading 3 Font Size', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the heading font properties.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
            	"color" => false,
            	"font-family" => false,
            	"font-style" => false,
            	"font-weight" => false,
                'default'  => array(
                    "font-size" => "26px"
                ),
            ),
            array(
                'id'       => 'typography_h4',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading 4 Font Size', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the heading font properties.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
            	"color" => false,
            	"font-family" => false,
            	"font-style" => false,
            	"font-weight" => false,
                'default'  => array(
                    "font-size" => "24px"
                ),
            ),
            array(
                'id'       => 'typography_h5',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading 5 Font Size', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the heading font properties.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
            	"color" => false,
            	"font-family" => false,
            	"font-style" => false,
            	"font-weight" => false,
                'default'  => array(
                    "font-size" => "21px"
                ),
            ),
            array(
                'id'       => 'typography_h6',
                'type'     => 'typography',
                'title'    => esc_html__( 'Heading 6 Font Size', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the heading font properties.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
            	"color" => false,
            	"font-family" => false,
            	"font-style" => false,
            	"font-weight" => false,
                'default'  => array(
                    "font-size" => "18px"
                ),
            ),
            array(
                'id'       => 'typography_page_title',
                'type'     => 'typography',
                'title'    => esc_html__( 'Page Title', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the page title font properties.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
            	"font-family" => false,
            	"font-style" => false,
            	"font-weight" => false,
                'default'  => array(
                    "font-size" => "30px",
                    "color" => "#363636",
                    "font-weight" => '300'
                ),
            ),
            array(
                'id'       => 'typography_copyright',
                'type'     => 'typography',
                'title'    => esc_html__( 'Copyright Text Font Size', 'waxom' ),
                'subtitle' => esc_html__( 'Specify the copyright section font properties.', 'waxom' ),
                'google'   => true,
                "text-align" => false,
                "line-height" => false,
            	"color" => false,
            	"font-family" => false,
            	"font-style" => false,
            	"font-weight" => false,
                'default'  => array(
                    "font-size" => "13px"
                ),
            ),
        )
    ) );
    
    // Archives/Search
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Archives/Search', 'waxom' ),
        'id'     => 'archives',
        'icon'   => 'fa fa-search',
        'fields' => array(
            array(
                'id'       => 'archives_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Archives Page Layout', 'waxom' ),
                'subtitle' => esc_html__( 'Choose a default page layout for your pages: Fullwidth, Sidebar Right or Sidebar Left', 'waxom'),
                'options'  => array(
                    'fullwidth' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    'sidebar_left' => array(
                        'alt' => '2 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    'sidebar_right' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                ),
                'default'  => 'sidebar_right'
            ),
            array(
                'id'       => 'search_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Search Page Layout', 'waxom' ),
                'subtitle' => esc_html__( 'Choose a default page layout for your pages: Fullwidth, Sidebar Right or Sidebar Left', 'waxom' ),
                'options'  => array(
                    'fullwidth' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    'sidebar_left' => array(
                        'alt' => '2 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    'sidebar_right' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                ),
                'default'  => 'sidebar_right'
            ),
            
    	)
    ) );
    
    if(class_exists('Woocommerce')) { // Enable this section only if the WooCommerce plugin is activated
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'WooCommerce', 'waxom' ),
        'id'     => 'woocommerce',
        'icon'   => 'fa fa-shopping-cart',
        'fields' => array(
            array(
                'id'       => 'topbar_woocommerce',
                'type'     => 'switch',
                'title'    => esc_html__( 'Shopping Cart Icon', 'waxom' ),
                'subtitle' => esc_html__( 'Enable/Disable the WooCommerce icon in the Header section.', 'waxom' ),
                'default'  => true
            ),
            
    	)
    ) );
    
    }
    
    // Advanced 
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Advanced', 'waxom' ),
        'id'     => 'advanced',
        'icon'   => 'fa fa-wrench',
        'fields' => array(
            array(
                'id'       => 'custom_css',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom CSS Code', 'waxom' ),
                'subtitle' => esc_html__( 'Paste your CSS code here.', 'waxom' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'default'  => "#header{\n   margin: 0 auto;\n}"
            ),
            array(
                'id'       => 'custom_js',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Custom JS Code', 'waxom' ),
                'subtitle' => esc_html__( 'Paste your JavaScript code here.', 'waxom' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
                'default'  => "jQuery(document).ready(function(){\n\n});"
            ),
            
    	)
    ) );

    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */


    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {

            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'waxom' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'waxom' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

