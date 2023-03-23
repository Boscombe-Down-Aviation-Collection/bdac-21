<?php 

// Opening Hours Post Type
function bdac_opening_hours_post_type() {
    $labels = array(
        'name' 					=> 'Opening Hours',
        'singular_name' 		=> 'Season Hours',
        'add_new' 				=> 'Add New',
        'add_new_item' 			=> 'Add New Season',
        'edit_item' 			=> 'Edit Season',
        'new_item' 				=> 'New Season',
        'view_item' 			=> 'View Season',
        'search_items' 			=> 'Search Seasons',
        'not_found' 			=> 'No Seasons found',
        'not_found_in_trash' 	=> 'No Seasons in the trash',
        'parent_item_colon' 	=> '',
    );

    register_post_type( 'opening_hours', array(
        'supports' 				=> array( 
                                        'title', 
                                        'editor', 
                                        'excerpt', 
                                        'thumbnail' 
                                    ),
        'rewrite' 				=> array('slug' => 'seasons' ),
        'labels' 				=> $labels,
        'public' 				=> false,
        'publicly_queryable' 	=> true,
        'show_ui' 				=> true,
        'exclude_from_search' 	=> true,
        'query_var' 			=> true,
        'rewrite' 				=> true,
        'capability_type' 		=> 'post',
        'has_archive' 			=> false,
        'hierarchical' 			=> false,
        'menu_icon' 			=> 'dashicons-clock',
        'menu_position' 		=> 42,
    ) );
};