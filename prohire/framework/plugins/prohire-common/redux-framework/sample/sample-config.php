<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'redux_demo';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = __DIR__ . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {
	$sample_patterns_dir = opendir( $sample_patterns_path );

	if ( $sample_patterns_dir ) {

		// phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
		while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
			if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
				$name              = explode( '.', $sample_patterns_file );
				$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'Prohire Options', 'your-textdomain-here' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Prohire Options', 'your-textdomain-here' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => true,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
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
	),

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);


// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '//devs.redux.io/',
	'title' => __( 'Documentation', 'your-textdomain-here' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => __( 'Support', 'your-textdomain-here' ),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => 'Like us on Facebook',
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/reduxframework',
	'title' => 'Follow us on Twitter',
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/company/redux-framework',
	'title' => 'Find us on LinkedIn',
	'icon'  => 'el el-linkedin',
);

// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}

	// translators:  Panel opt_name.
	$args['intro_text'] = '<p>' . sprintf( esc_html__( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $%1$s', 'your-textdomain-here' ), '<strong>' . $v . '</strong>' ) . '<p>';
} else {
	$args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'your-textdomain-here' ) . '</p>';
}

// Add content after the form.
$args['footer_text'] = '<p>' . esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'your-textdomain-here' ) . '</p>';

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */
$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'your-textdomain-here' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'your-textdomain-here' ) . '</p>',
	),
	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'your-textdomain-here' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'your-textdomain-here' ) . '</p>',
	),
);
Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'your-textdomain-here' ) . '</p>';

Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 * ---> START SECTIONS
 */
 // -> START Basic Fields
			Redux::setSection($opt_name, array(
                'icon' => 'el-icon-cogs',
                'title' => __('General Settings', 'prohire'),
                'fields' => array(  
                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Favicon Upload', 'prohire'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'prohire'),
                        'subtitle' => __('Upload your Favicon.', 'prohire'),
                        'default' => ''
                    ),  
                    array(
                        'id' => 'home_text',
                        'type' => 'text',
                        'title' => __('Home Text', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Home'
                     ),
                    
                )
            ));
            
            Redux::setSection($opt_name, array(
                'icon' => 'el-icon-list',
                'title' => __('Blog Settings', 'prohire'),
                'fields' => array(
                    array(
                        'id' => 'blog_details_banner',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Blog Details Banner Image', 'prohire'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'prohire'),
                        'subtitle' => __('Upload your image', 'prohire'),
                        'default' => ''
                    ),
                    
                    array(
                        'id' => 'blog_details_title',
                        'type' => 'text',
                        'title' => __('Blog Details Title', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Blog Details'
                    ),

                    array(
                        'id' => 'blog_banner',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Blog Page Banner Image', 'prohire'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'prohire'),
                        'subtitle' => __('Upload your image', 'prohire'),
                        'default' => ''
                    ),

                    array(
                        'id' => 'blog_title',
                        'type' => 'text',
                        'title' => __('Blog Page Title', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Blog'
                    ),
                    
                    array(
                        'id' => 'blog_excerpt',
                        'type' => 'text',
                        'title' => __('Blog List custom excerpt leng', 'prohire'),
                        'subtitle' => __('Input blog custom excerpt leng', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => '30'
                    ),
					
					array(
                        'id' => 'blog_excerpt_2',
                        'type' => 'text',
                        'title' => __('Blog section custom excerpt leng (in home page)', 'prohire'),
                        'subtitle' => __('Input blog custom excerpt leng', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => '15'
                    ),

                    array(
                        'id' => 'read_more',
                        'type' => 'text',
                        'title' => __('Read More', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Read More'
                    ),
                    array(
						'id'       		=> 'blog_share',
						'type'     		=> 'switch',
						'title'    		=> esc_html__( 'Switch Blog Share', 'prohire' ),
						'on'	   		=> esc_html__( 'Show', 'prohire' ),
						'off'	   		=> esc_html__( 'Hide', 'prohire' ),
						'default'  		=> true,
						'compiler'		=> true,
					),
                )
            ));

            Redux::setSection($opt_name, array(
                'icon' => 'el-icon-graph',
                'title' => __('Services Settings', 'prohire'),
                'fields' => array(
                    array(
                        'id' => 'service_details_banner',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Service Details Banner Image', 'prohire'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'prohire'),
                        'subtitle' => __('Upload your image', 'prohire'),
                        'default' => ''
                    ),
                    
                    array(
                        'id' => 'service_details_title',
                        'type' => 'text',
                        'title' => __('Service Details Title', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Service Details'
                     ),

                    array(
                        'id' => 'service_banner',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Services Page Banner Image', 'prohire'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'prohire'),
                        'subtitle' => __('Upload your image', 'prohire'),
                        'default' => ''
                    ),

                    array(
                        'id' => 'services_title',
                        'type' => 'text',
                        'title' => __('Service Page Title', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Amazing Services'
                     ),
                 )
            ));

            Redux::setSection($opt_name, array(
                'icon' => 'el-icon-graph',
                'title' => __('Seller Settings', 'prohire'),
                'fields' => array(
                    array(
                        'id' => 'seller_banner',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Seller Banner Image', 'prohire'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'prohire'),
                        'subtitle' => __('Upload your image', 'prohire'),
                        'default' => ''
                    ),
                    array(
                        'id' => 'seller_title',
                        'type' => 'text',
                        'title' => __('Seller Details Title', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Seller Details'
                    ),
                 )
            ));
            
            Redux::setSection($opt_name, array(
                'icon' => 'el-icon-graph',
                'title' => __('404 Settings', 'prohire'),
                'fields' => array(
                    array(
                        'id' => '404_image',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('404 Image', 'prohire'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'prohire'),
                        'subtitle' => __('Upload your image', 'prohire'),
                        'default' => ''
                    ),
                    array(
                        'id' => '404_title',
                        'type' => 'text',
                        'title' => __('404 Title', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => '404'
                    ),
                    array(
                        'id' => '404_subtitle',
                        'type' => 'text',
                        'title' => __('404 Subtitle', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Oops! That page can’t be found'
                    ),

                    array(
                        'id' => '404_button',
                        'type' => 'text',
                        'title' => __('404 Button', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Back To Home'
                    ),
                 )
            ));
            
            Redux::setSection($opt_name, array(
                'icon' => ' el-icon-credit-card',
                'title' => __('Header Settings', 'prohire'),
                'fields' => array(   
                    array(
                        'id' => 'logo',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo', 'prohire'),
                        'compiler' => 'true',
                        'desc' => __('', 'prohire'),
                        'subtitle' => __('Upload your image', 'prohire'),
                        'default' => ''
                    ),
                    array(
						'id'       		=> 'header_languages',
						'type'     		=> 'switch',
						'title'    		=> esc_html__( 'Switch Header Languages', 'prohire' ),
						'on'	   		=> esc_html__( 'Show', 'prohire' ),
						'off'	   		=> esc_html__( 'Hide', 'prohire' ),
						'default'  		=> true,
						'compiler'		=> true,
					),
                )
            ));
            
            Redux::setSection($opt_name, array(
                'icon' => ' el-icon-credit-card',
                'title' => __('Footer Settings', 'prohire'),
                'fields' => array(
                    array(
                        'id' => 'logo_footer',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Footer Logo', 'prohire'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'prohire'),
                        'subtitle' => __('Upload your image', 'prohire'),
                        'default' => ''
                    ), 

                    array(
                        'id' => 'facebook',
                        'type' => 'text',
                        'title' => __('Facebook', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'https://www.facebook.com/'
                    ),  

                    array(
                        'id' => 'twitter',
                        'type' => 'text',
                        'title' => __('Twitter', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'https://www.twitter.com/'
                    ), 

                    array(
                        'id' => 'instagram',
                        'type' => 'text',
                        'title' => __('Instagram', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'https://www.instagram.com/'
                    ),  

                    array(
                        'id' => 'linkedin',
                        'type' => 'text',
                        'title' => __('Linkedin', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'https://www.linkedin.com/'
                    ), 
                    
                    array(
                        'id' => 'footer_description',
                        'type' => 'textarea',
                        'title' => __('Footer Description', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Footer Description'
                    ), 
                    array(
                        'id' => 'footer_copyright',
                        'type' => 'textarea',
                        'title' => __('Footer Copyright', 'prohire'),
                        'subtitle' => __('', 'prohire'),
                        'desc' => __('', 'prohire'),
                        'default' => 'Footer Copyright'
                    ), 
                    array(
						'id'       		=> 'footer_menu',
						'type'     		=> 'switch',
						'title'    		=> esc_html__( 'Switch Footer Menu', 'prohire' ),
						'on'	   		=> esc_html__( 'Show', 'prohire' ),
						'off'	   		=> esc_html__( 'Hide', 'prohire' ),
						'default'  		=> true,
						'compiler'		=> true,
					),
                    
                )
            ));
            
            Redux::setSection($opt_name, array(
                'icon' => 'el-icon-website',
                'title' => __('Styling Options', 'prohire'),
                'fields' => array(
                    array(
                        'id' => 'chosen-color',
                        'type' => 'checkbox',
                        'title' => __('Enable edit color', 'prohire'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '0'// 1 = on | 0 = off
                    ),
                    array(
                        'id' => 'main-color-1',
                        'type' => 'color',
                        'title' => __('Theme Main Color 1', 'prohire'),
                        'subtitle' => __('Pick the main color for the theme (default: #ffe79b).', 'prohire'),
                        'default' => '#2c3e50',
                        'validate' => 'color',
                    ),
                )
            ));

/**
 * Raw README
 */
if ( file_exists( $dir . '/../README.md' ) ) {
	$section = array(
		'icon'   => 'el el-list-alt',
		'title'  => esc_html__( 'Documentation', 'your-textdomain-here' ),
		'fields' => array(
			array(
				'id'           => 'opt-raw-documentation',
				'type'         => 'raw',
				'markdown'     => true,
				'content_path' => __DIR__ . '/../README.md', // FULL PATH, not relative, please.
			),
		),
	);

	Redux::set_section( $opt_name, $section );
}

Redux::set_section(
	$opt_name,
	array(
		'icon'            => 'el el-list-alt',
		'title'           => esc_html__( 'Customizer Only', 'your-textdomain-here' ),
		'desc'            => '<p class="description">' . esc_html__( 'This Section should be visible only in Customizer', 'your-textdomain-here' ) . '</p>',
		'customizer_only' => true,
		'fields'          => array(
			array(
				'id'              => 'opt-customizer-only',
				'type'            => 'select',
				'title'           => esc_html__( 'Customizer Only Option', 'your-textdomain-here' ),
				'subtitle'        => esc_html__( 'The subtitle is NOT visible in customizer', 'your-textdomain-here' ),
				'desc'            => esc_html__( 'The field desc is NOT visible in customizer.', 'your-textdomain-here' ),
				'customizer_only' => true,
				'options'         => array(
					'1' => esc_html__( 'Opt 1', 'your-textdomain-here' ),
					'2' => esc_html__( 'Opt 2', 'your-textdomain-here' ),
					'3' => esc_html__( 'Opt 3', 'your-textdomain-here' ),
				),
				'default'         => '2',
			),
		),
	)
);

/*
 * <--- END SECTIONS
 */

/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */

/*
 * --> Action hook examples.
 */

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 is necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section.
// It can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if ( ! function_exists( 'compiler_action' ) ) {
	/**
	 * This is a test function that will let you see when the compiler hook occurs.
	 * It only runs if a field's value has changed and compiler=>true is set.
	 *
	 * @param array  $options        Options values.
	 * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
	 * @param array  $changed_values Any values changed since last save.
	 */
	function compiler_action( array $options, string $css, array $changed_values ) {
		echo '<h1>The compiler hook has run!</h1>';
		echo '<pre>';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions
		print_r( $changed_values ); // Values that have changed since the last save.
		// echo '<br/>';
		// print_r($options); //Option values.
		// echo '<br/>';
		// print_r($css); // Compiler selector CSS values compiler => array( CSS SELECTORS ).
		echo '</pre>';
	}
}

if ( ! function_exists( 'redux_validate_callback_function' ) ) {
	/**
	 * Custom function for the callback validation referenced above
	 *
	 * @param array $field          Field array.
	 * @param mixed $value          New value.
	 * @param mixed $existing_value Existing value.
	 *
	 * @return array
	 */
	function redux_validate_callback_function( array $field, $value, $existing_value ): array {
		$error   = false;
		$warning = false;

		// Do your validation.
		if ( 1 === (int) $value ) {
			$error = true;
			$value = $existing_value;
		} elseif ( 2 === (int) $value ) {
			$warning = true;
			$value   = $existing_value;
		}

		$return['value'] = $value;

		if ( true === $error ) {
			$field['msg']    = 'your custom error message';
			$return['error'] = $field;
		}

		if ( true === $warning ) {
			$field['msg']      = 'your custom warning message';
			$return['warning'] = $field;
		}

		return $return;
	}
}


if ( ! function_exists( 'dynamic_section' ) ) {
	/**
	 * Custom function for filtering the section array.
	 * Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
	 *
	 * @param array $sections Section array.
	 *
	 * @return array
	 */
	function dynamic_section( array $sections ): array {
		$sections[] = array(
			'title'  => esc_html__( 'Section via hook', 'your-textdomain-here' ),
			'desc'   => '<p class="description">' . esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'your-textdomain-here' ) . '</p>',
			'icon'   => 'el el-paper-clip',

			// Leave this as a blank section, no options just some intro text set above.
			'fields' => array(),
		);

		return $sections;
	}
}

if ( ! function_exists( 'change_arguments' ) ) {
	/**
	 * Filter hook for filtering the args.
	 * Good for child themes to override or add to the args array.
	 * It can also be used in other functions.
	 *
	 * @param array $args Global arguments array.
	 *
	 * @return array
	 */
	function change_arguments( array $args ): array {
		$args['dev_mode'] = true;

		return $args;
	}
}

if ( ! function_exists( 'change_defaults' ) ) {
	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 *
	 * @param array $defaults Default value array.
	 *
	 * @return array
	 */
	function change_defaults( array $defaults ): array {
		$defaults['str_replace'] = esc_html__( 'Testing filter hook!', 'your-textdomain-here' );

		return $defaults;
	}
}

if ( ! function_exists( 'redux_custom_sanitize' ) ) {
	/**
	 * Function to be used if the field sanitizes argument.
	 * Return value MUST be formatted or cleaned text to display.
	 *
	 * @param string $value Value to evaluate or clean.  Required.
	 *
	 * @return string
	 */
	function redux_custom_sanitize( string $value ): string {
		$return = '';

		foreach ( explode( ' ', $value ) as $w ) {
			foreach ( str_split( $w ) as $k => $v ) {
				if ( ( $k + 1 ) % 2 !== 0 && ctype_alpha( $v ) ) {
					$return .= mb_strtoupper( $v );
				} else {
					$return .= $v;
				}
			}

			$return .= ' ';
		}

		return $return;
	}
}
