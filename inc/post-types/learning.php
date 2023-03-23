<?php 

// Learning Post Type
// function bdac_learning_post_type()
function bdac_learning_post_type() {
    register_post_type('learning', array(
        'supports' 			=> array('title', 'excerpt', 'thumbnail'),
        'rewrite' 			=> array('slug' => 'learning' ),
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
        'labels' 			=> array(
            'name' 			=> 'Learning Assets',
            'add_new_item' 	=> 'Add New Asset',
            'edit_item' 	=> 'Edit Asset',
            'all_items' 	=> 'All Assets',
            'singular_name' => 'Asset'
        ),
        'menu_icon' 		=> 'dashicons-pdf',
        'menu_position' 	=> 43,
    ));
};