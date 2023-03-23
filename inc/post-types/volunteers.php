<?php 

// Volunteers Post Type
function bdac_volunteers_post_type() {
    register_post_type('volunteers', array(
        'supports' 			=> array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' 			=> array('slug' => 'volunteers' ),
        'has_archive' 		=> true,
        'public' 			=> true,
        'labels' 			=> array(
            'name' 			=> 'Volunteers',
            'add_new_item' 	=> 'Add New Volunteer',
            'edit_item' 	=> 'Edit Volunteer',
            'all_items' 	=> 'All Volunteers',
            'singular_name' => 'Volunteer'
        ),
        'menu_icon' 		=> 'dashicons-groups',
        'menu_position' 	=> 43,
    ));
};