<?php

    function bdacSearch() {
        register_rest_route( 'bdac/v1', 'search', array(
            'methods'   => WP_REST_SERVER::READABLE,
            'callback'  => 'bdacSearchResults'
        ) );
    };

    function bdacSearchResults( $data ) {
        $events = new WP_Query( array(
            'post_type' => 'events',
            's'         => sanitize_text_field( $data['event'] )
        ) );

        $eventsResults = array(

        );

        while($events->have_posts()) {
            $events->the_post();
            array_push( $eventsResults, array(
                'title'     => get_the_title(),
                'thumbnail' => get_the_post_thumbnail_url(),
                'excerpt'   => get_the_excerpt(),
                'link'      => get_the_permalink(),
                
            ) );
        }

        return $eventsResults;
    }
    
    add_action( 'rest_api_init', 'bdacSearch' );

?>