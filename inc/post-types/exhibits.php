<?php 

// Exhibits Post Type
function bdac_exhibits_post_type() {
    $exhibitslabels = array(
        'name' 					=> 'Exhibits',
        'add_new' 				=> 'Add New',
        'add_new_item' 			=> 'Add New Exhibit',
        'edit_item' 			=> 'Edit Exhibit',
        'all_items' 			=> 'All Exhibits',
        'singular_name' 		=> 'Exhibit',
        'new_item' 				=> 'New Exhibit',
        'view_item' 			=> 'View Exhibit',
        'search_items' 			=> 'Search Exhibits',
        'not_found' 			=> 'No Exhibits found',
        'not_found_in_trash' 	=> 'No Exhibits in the trash',
        'parent_item_colon' 	=> ''
    );

        register_post_type('exhibits', array(
            'supports' 				=> array(
                                        'title', 
                                        'editor', 
                                        'excerpt', 
                                        'thumbnail'
                                    ),
            'rewrite'	 			=> array(
                                        'slug' => 'exhibits',
                                        'with_front' => false
                                    ),
            'labels' 				=> $exhibitslabels,
            'show_in_rest'			=> true,
            'public' 				=> true,
            'publicly_queryable' 	=> true,
            'show_ui' 				=> true,
            'query_var' 			=> true,
            'rewrite' 				=> true,
            'menu_icon' 			=> 'dashicons-performance',
            'menu_position' 		=> 40,
        ));
}