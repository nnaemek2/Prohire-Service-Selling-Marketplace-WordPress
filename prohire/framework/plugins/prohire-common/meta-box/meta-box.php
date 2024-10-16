<?php
/**
 * Plugin Name: Meta Box
 * Plugin URI:  https://metabox.io
 * Description: Create custom meta boxes and custom fields in WordPress.
 * Version:     5.3.3
 * Author:      MetaBox.io
 * Author URI:  https://metabox.io
 * License:     GPL2+
 * Text Domain: meta-box
 * Domain Path: /languages/
 *
 * @package Meta Box
 */

if ( defined( 'ABSPATH' ) && ! defined( 'RWMB_VER' ) ) {
	register_activation_hook( __FILE__, 'rwmb_check_php_version' );

	/**
	 * Display notice for old PHP version.
	 */
	function rwmb_check_php_version() {
		if ( version_compare( phpversion(), '5.3', '<' ) ) {
			die( esc_html__( 'Meta Box requires PHP version 5.3+. Please contact your host to upgrade.', 'meta-box' ) );
		}
	}




	require_once dirname( __FILE__ ) . '/inc/loader.php';
	$rwmb_loader = new RWMB_Loader();
	$rwmb_loader->init();


	add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {

	$prefix = '_cmb_';


  // Open Code
    
    $meta_boxes[] = array(

        'id'         => 'post_setting',

        'title'      => 'Post Setting',

        'pages'      => array('post'), // Post type

        'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox

        'fields' => array(
            array(

                'name' => 'Featured Image 2',

                'desc' => 'Show in sidebar',

                'id'   => $prefix . 'featured_image_2',

                'type'    => 'single_image',

            ),

            array(

                'name' => 'Featured Image 3',

                'desc' => 'Show in blog grid',

                'id'   => $prefix . 'featured_image_3',

                'type'    => 'single_image',

            ),
        )

    );


    $meta_boxes[] = array(

        'id'         => 'services_setting',

        'title'      => 'Services Setting',

        'pages'      => array('service'), // Post type

        'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox

        'fields' => array(
			
			array(
                'name' => 'Search Form Keywords',

                'desc' => 'Input Keywords for search form',

                'default' => '',

                'id' => $prefix . 'search_key',
                
                'type' => 'textarea'
            ),

            array(

                'name' => 'Price',

                'desc' => '',

                'id'   => $prefix . 'price',

                'type'    => 'text',

            ),

            array(

                'name' => 'Price Text',

                'desc' => '',

                'id'   => $prefix . 'price_text',

                'type'    => 'text',

            ),

            array(

                'name' => 'Slider Image 1',

                'desc' => '',

                'id'   => $prefix . 'featured_image_1',

                'type'    => 'single_image',

            ),

            array(

                'name' => 'Description 1',

                'desc' => '',

                'id'   => $prefix . 'description_1',

                'type'    => 'textarea',

            ),

            array(

                'name' => 'Slider Image 2',

                'desc' => '',

                'id'   => $prefix . 'featured_image_2',

                'type'    => 'single_image',

            ),

            array(

                'name' => 'Description 2',

                'desc' => '',

                'id'   => $prefix . 'description_2',

                'type'    => 'textarea',

            ),

            array(

                'name' => 'Slider Image 3',

                'desc' => '',

                'id'   => $prefix . 'featured_image_3',

                'type'    => 'single_image',

            ),

            array(

                'name' => 'Description 3',

                'desc' => '',

                'id'   => $prefix . 'description_3',

                'type'    => 'textarea',

            ),

            array(

                'name' => 'Slider Image 4',

                'desc' => '',

                'id'   => $prefix . 'featured_image_4',

                'type'    => 'single_image',

            ),

            array(

                'name' => 'Description 4',

                'desc' => '',

                'id'   => $prefix . 'description_4',

                'type'    => 'textarea',

            ),

            array(

                'name' => 'Tab Title 1',

                'desc' => '',

                'id'   => $prefix . 'tab_1_title',

                'type'    => 'text',

            ),

            array(

                'name' => 'Tab Title 2',

                'desc' => '',

                'id'   => $prefix . 'tab_2_title',

                'type'    => 'text',

            ),

            array(

                'name' => 'Tab Title 3',

                'desc' => '',

                'id'   => $prefix . 'tab_3_title',

                'type'    => 'text',

            ),

            array(

                'name' => 'Content Tab 3',

                'desc' => '',

                'id'   => $prefix . 'content_tab_3',

                'type'    => 'wysiwyg',

            ),

            array(

                'name' => 'Featured Image 2',

                'desc' => 'Show in service categories',

                'id'   => $prefix . 'featured_2',

                'type'    => 'single_image',

            ),
        )

    );

    
// End Code



    return $meta_boxes;
});
}
