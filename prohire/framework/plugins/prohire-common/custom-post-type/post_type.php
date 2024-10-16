<?php


add_action( 'init', 'register_prohire_Service' );
function register_prohire_Service() {
    
$labels = array( 
    'name' => __( 'Service', 'prohire' ),
    'singular_name' => __( 'Service', 'prohire' ),
    'add_new' => __( 'Add New Service', 'prohire' ),
    'add_new_item' => __( 'Add New Service', 'prohire' ),
    'edit_item' => __( 'Edit Service', 'prohire' ),
    'new_item' => __( 'New Service', 'prohire' ),
    'view_item' => __( 'View Service', 'prohire' ),
    'search_items' => __( 'Search Service', 'prohire' ),
    'not_found' => __( 'No Service found', 'prohire' ),
    'not_found_in_trash' => __( 'No Service found in Trash', 'prohire' ),
    'parent_item_colon' => __( 'Parent Service:', 'prohire' ),
    'menu_name' => __( 'Service', 'prohire' ),
);

$args = array( 
    'labels' => $labels,
    'hierarchical' => true,
    'description' => 'List Service',
    'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),
    'taxonomies' => array( 'Service', 'Type', 'Type2','category3' ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-id-alt', 
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
);

register_post_type( 'Service', $args );
}

add_action( 'init', 'create_Type_hierarchical_taxonomy', 0 );

add_action( 'init', 'create_Type2_hierarchical_taxonomy', 0 );

add_action( 'init', 'create_Category3_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Type_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like Skills
//first do the translations part for GUI

$labels = array(
    'name' => __( 'Type', 'prohire' ),
    'singular_name' => __( 'Type', 'prohire' ),
    'search_items' =>  __( 'Search Type','prohire' ),
    'all_items' => __( 'All Type','prohire' ),
    'parent_item' => __( 'Parent Type','prohire' ),
    'parent_item_colon' => __( 'Parent Type:','prohire' ),
    'edit_item' => __( 'Edit Type','prohire' ), 
    'update_item' => __( 'Update Type','prohire' ),
    'add_new_item' => __( 'Add New Type','prohire' ),
    'new_item_name' => __( 'New Type Name','prohire' ),
    'menu_name' => __( 'Type','prohire' ),
  );     

// Now register the taxonomy

  register_taxonomy('Type',array('Service'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Type' ),
  ));

}

function create_Type2_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like Skills
//first do the translations part for GUI

$labels = array(
    'name' => __( 'Type 2', 'prohire' ),
    'singular_name' => __( 'Type 2', 'prohire' ),
    'search_items' =>  __( 'Search Type 2','prohire' ),
    'all_items' => __( 'All Type 2','prohire' ),
    'parent_item' => __( 'Parent Type 2','prohire' ),
    'parent_item_colon' => __( 'Parent Type 2:','prohire' ),
    'edit_item' => __( 'Edit Type 2','prohire' ), 
    'update_item' => __( 'Update Type 2','prohire' ),
    'add_new_item' => __( 'Add New Type 2','prohire' ),
    'new_item_name' => __( 'New Type 2 Name','prohire' ),
    'menu_name' => __( 'Type 2','prohire' ),
  );     

// Now register the taxonomy

  register_taxonomy('Type2',array('Service'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Type2' ),
  ));

}

function create_Category3_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like Skills
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Category', 'roofline' ),
    'singular_name' => __( 'Category', 'roofline' ),
    'search_items' =>  __( 'Search Category','roofline' ),
    'all_items' => __( 'All Category','roofline' ),
    'parent_item' => __( 'Parent Category','roofline' ),
    'parent_item_colon' => __( 'Parent Category:','roofline' ),
    'edit_item' => __( 'Edit Category','roofline' ), 
    'update_item' => __( 'Update Category','roofline' ),
    'add_new_item' => __( 'Add New Category','roofline' ),
    'new_item_name' => __( 'New Category Name','roofline' ),
    'menu_name' => __( 'Category','roofline' ),
  );     

// Now register the taxonomy

  register_taxonomy('category3',array('Service'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'category3' ),
  ));

}

?>