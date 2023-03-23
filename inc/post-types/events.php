<?php 

// Events Post Type
function bdac_events_post_type() {
    $labels = array(
        'name' 					=> 'Events',
        'singular_name' 		=> 'Event',
        'add_new' 				=> 'Add New',
        'add_new_item' 			=> 'Add New Event',
        'edit_item' 			=> 'Edit Event',
        'new_item' 				=> 'New Event',
        'view_item' 			=> 'View Event',
        'search_items' 			=> 'Search Events',
        'not_found' 			=> 'No Events found',
        'not_found_in_trash' 	=> 'No Events in the trash',
        'parent_item_colon' 	=> '',
    );

    register_post_type( 'events', array(
        'supports' 				=> array( 
                                        'title', 
                                        'editor', 
                                        'excerpt', 
                                        'thumbnail' 
                                    ),
        'rewrite' 				=> array(
                                    'slug' => 'events',
                                    'with_front' => false
                                ),
        'labels' 				=> $labels,
        'show_in_rest'			=> true,
        'public' 				=> true,
        'publicly_queryable' 	=> true,
        'show_ui' 				=> true,
        'exclude_from_search' 	=> true,
        'query_var' 			=> true,
        'rewrite' 				=> true,
        'capability_type' 		=> 'post',
        'has_archive' 			=> false,
        'hierarchical' 			=> false,
        'menu_icon' 			=> 'dashicons-calendar',
        'menu_position' 		=> 41,
    ) );
};