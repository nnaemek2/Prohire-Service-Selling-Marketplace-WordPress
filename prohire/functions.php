<?php
$prohire_redux_demo = get_option('redux_demo');

//Custom fields:
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';
//Theme Set up:
function prohire_theme_setup() {
  /*
   * This theme uses a custom image size for featured images, displayed on
   * "standard" posts and pages.
   */
  add_theme_support( 'custom-header' ); 
  add_theme_support( 'custom-background' );
  $lang = get_template_directory_uri() . '/languages';
  load_theme_textdomain('prohire', $lang);
  add_theme_support( 'post-thumbnails' );
  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );
  // Switches default core markup for search form, comment form, and comments
  // to output valid HTML5.
  add_theme_support( 'title-tag' );
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' =>  esc_html__( 'Primary Menu.', 'prohire' ),
    'footer' =>  esc_html__( 'Footer Menu.', 'prohire' ),
  ) );
    // This theme uses its own gallery styles.
}
add_action( 'after_setup_theme', 'prohire_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;

function prohire_fonts_url() {
  $fonts_url = '';
   
  /* Translators: If there are characters in your language that are not
  * supported by Lora, translate this to 'off'. Do not translate
  * into your own language.
  */
  $rubik = esc_html_x( 'on', 'Rubik font: on or off', 'prohire' );
   
  if ( 'off' !== $rubik ) {
  $font_families = array();
   
  if ( 'off' !== $rubik ) {
  $font_families[] = 'Rubik:wght@300;400;500;600;700';
  }
   
  $query_args = array(
  'family' => urlencode( implode( '|', $font_families ) ),
  'subset' => urlencode( 'latin,latin-ext' ),
  );
   
  $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
  }
   
  return esc_url_raw( $fonts_url );
}

function prohire_theme_scripts_styles() {
  $prohire_redux_demo = get_option('redux_demo');
  $protocol = is_ssl() ? 'https' : 'http';
  wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
  wp_enqueue_style('prohire-fontawesome', get_template_directory_uri().'/assets/fonts/fontawesome/css/all.min.css');
  wp_enqueue_style('prohire-flaticon', get_template_directory_uri().'/assets/fonts/flaticon/flaticon.css');
  wp_enqueue_style('prohire-slick', get_template_directory_uri().'/assets/css/slick.css');
  wp_enqueue_style('magnific-popup', get_template_directory_uri().'/assets/css/magnific-popup.css');
  wp_enqueue_style('jquery-ui', get_template_directory_uri().'/assets/css/jquery-ui.min.css');
  wp_enqueue_style('prohire-nice-select', get_template_directory_uri().'/assets/css/nice-select.css');
  wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css');
  wp_enqueue_style('prohire-megamenu', get_template_directory_uri().'/assets/css/megamenu.css');
  wp_enqueue_style('prohire-default', get_template_directory_uri().'/assets/css/default.css');
  wp_enqueue_style('prohire-style', get_template_directory_uri().'/assets/css/style.css');
  wp_enqueue_style('prohire-responsive', get_template_directory_uri().'/assets/css/responsive.css');
  wp_enqueue_style('prohire-fonts', prohire_fonts_url(), array(), null);
  wp_enqueue_style('prohire-css', get_stylesheet_uri(), array(), '2024-05-07' );  

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
  wp_enqueue_script( 'comment-reply' );
  //Javascript
  wp_enqueue_script('popper', get_template_directory_uri().'/assets/js/popper.min.js',array(),false,true);
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js',array(),false,true);
  wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js',array(),false,true);
  wp_enqueue_script('jquery-nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js',array(),false,true);
  wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/slick.min.js',array(),false,true);
  wp_enqueue_script('imagesloaded-pkgd', get_template_directory_uri().'/assets/js/imagesloaded.pkgd.min.js',array(),false,true);
  wp_enqueue_script('isotope', get_template_directory_uri().'/assets/js/jquery.isotope.v3.0.2.js',array(),false,true);
  wp_enqueue_script('prohire-main', get_template_directory_uri().'/assets/js/main.js',array(),false,true);  
}
  
add_action( 'wp_enqueue_scripts', 'prohire_theme_scripts_styles' );

// Widget Sidebar
function prohire_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar', 'prohire' ),
    'id'            => 'sidebar-1',        
    'description'   => esc_html__( 'Appears in the sidebar section of blog pages.', 'prohire' ),        
    'before_widget' => '<div id="%1$s" class="widget mb-30 %2$s" >',        
    'after_widget'  => '</div>',        
    'before_title'  => '<h4 class="widget-title">',        
    'after_title'   => '</h4>'
    ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Service Details Sidebar', 'prohire' ),
    'id'            => 'sidebar-2',        
    'description'   => esc_html__( 'Appears in the sidebar section of service details.', 'prohire' ),        
    'before_widget' => '<div id="%1$s" class="widget-seller-details packages-widgets mb-40 %2$s" >',        
    'after_widget'  => '</div>',        
    'before_title'  => '<h4 class="title mb-20">',        
    'after_title'   => '</h4>'
    ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Services Sidebar', 'prohire' ),
    'id'            => 'sidebar-4',        
    'description'   => esc_html__( 'Appears in the sidebar section of services page.', 'prohire' ),        
    'before_widget' => '<div id="%1$s" class="widget mb-30 %2$s" >',        
    'after_widget'  => '</div>',        
    'before_title'  => '<h4 class="widget-title">',        
    'after_title'   => '</h4>'
    ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Seller Sidebar', 'prohire' ),
    'id'            => 'sidebar-3',        
    'description'   => esc_html__( 'Appears in the sidebar section of seller details.', 'prohire' ),        
    'before_widget' => '<div id="%1$s" class="widget-seller-details border mb-40 %2$s" >',        
    'after_widget'  => '</div>',        
    'before_title'  => '<h4 class="title mb-20">',        
    'after_title'   => '</h4>'
    ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Widget One', 'prohire' ),
    'id'            => 'footer-widget-1',               
    'before_widget' => '',        
    'after_widget'  => '',    
    'before_title'  => '<h4 class="widget-title">',        
    'after_title'   => '</h4>'
    ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Widget Two', 'prohire' ),
    'id'            => 'footer-widget-2',               
    'before_widget' => '',        
    'after_widget'  => '',  
    'before_title'  => '<h4 class="widget-title">',        
    'after_title'   => '</h4>'
    ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer Widget Three', 'prohire' ),
    'id'            => 'footer-widget-3',               
    'before_widget' => '',        
    'after_widget'  => '',   
    'before_title'  => '<h4 class="widget-title">',        
    'after_title'   => '</h4>'
    ) );
}
add_action( 'widgets_init', 'prohire_widgets_init' );

//function tag widgets
function prohire_tag_cloud_widget($args) {
  $args['number'] = 0; //adding a 0 will display all tags
  $args['largest'] = 18; //largest tag
  $args['smallest'] = 11; //smallest tag
  $args['unit'] = 'px'; //tag font unit
  $args['format'] = 'list'; //ul with a class of wp-tag-cloud
  $args['exclude'] = array(20, 80, 92); //exclude tags by ID
  return $args;
}

function prohire_move_comment_field_to_bottom( $fields ) {
  $comment_field = $fields['comment'];
  unset( $fields['comment'] );
  $fields['comment'] = $comment_field;
  return $fields;
}
add_filter( 'comment_form_fields', 'prohire_move_comment_field_to_bottom');

add_filter( 'widget_tag_cloud_args', 'prohire_tag_cloud_widget' );

function prohire_excerpt() {
  $prohire_redux_demo = get_option('redux_demo');
  if(isset($prohire_redux_demo['blog_excerpt'])){
    $limit = $prohire_redux_demo['blog_excerpt'];
  }else{
    $limit = 30;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function prohire2_excerpt() {
  $prohire_redux_demo = get_option('redux_demo');
  if(isset($prohire_redux_demo['blog_excerpt_2'])){
    $limit = $prohire_redux_demo['blog_excerpt_2'];
  }else{
    $limit = 50;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function prohire_search_form( $form ) {
  $form = '
  <form  method="get" action="' . esc_url(home_url('/')) . '"> 
    <input type="text"  placeholder="'.esc_attr__('Search', 'prohire').'" value="' . get_search_query() . '" name="s" > 
    <button type="submit"><i class="icon fa fa-search"></i></button>
  </form>
  ';
  return $form;
}
add_filter( 'get_search_form', 'prohire_search_form' );

function prohire_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment; ?>
    <?php if(get_avatar($comment,$size='83' )!=''){?>
    <div class="comment_box">
      <div class="comment_author">
        <?php echo get_avatar($comment,$size='83' ); ?>
      </div>
      <div class="comment_content ms-md-4">
        <h4><?php printf( get_comment_author_link()) ?></h4>
        <span> <i class="far fa-calendar-alt"></i><?php comment_time(get_option('date_format')); ?></span>
        <?php comment_text() ?>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
    </div>
    <?php }else{?>
    <div class="comment_box nopd">
      <div class="comment_content ms-md-4">
        <h4><?php printf( get_comment_author_link()) ?></h4>
        <span> <i class="far fa-calendar-alt"></i><?php comment_time(get_option('date_format')); ?></span>
        <?php comment_text() ?>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
    </div>
    <?php }?>

<?php
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'prohire_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function prohire_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'prohire' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'prohire' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Widgets', 'prohire' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'prohire' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'prohire' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'SVG Support', 'prohire' ),
            'slug'      => 'svg-support',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'prohire' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'User Registration', 'prohire' ),
            'slug'      => 'user-registration',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Stars Rating', 'prohire' ),
            'slug'      => 'stars-rating',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Elementor', 'prohire' ),
            'slug'      => 'elementor',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Prohire Common', 'prohire' ),
            'slug'                     => 'prohire-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/prohire-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Prohire Elementor', 'prohire' ),
            'slug'                     => 'prohire-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/prohire-elementor.zip',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'prohire' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'prohire' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'prohire' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'prohire' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'prohire' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'prohire' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'prohire' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'prohire' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'prohire' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'prohire' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'prohire' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'prohire' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'prohire' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'prohire' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'prohire' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'prohire' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'prohire' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>