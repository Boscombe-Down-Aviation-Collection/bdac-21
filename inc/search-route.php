<?php

    function bdacSearch() {
        register_rest_route( 'bdac/v1', 'search', array(
            'methods'   => WP_REST_SERVER::READABLE,
            'callback'  => 'bdacSearchResults'
        ) );
    };

    function bdacSearchResults( $data ) {
        $searchQuery = new WP_Query( array(
            'post_type' => array(
                'post',
                'page',
                'exhibits',
                'events'
            ),
            's'         => sanitize_text_field( $data['term'] )
        ) );

        $searchQueryResults = array(
            'generalInfo'   => array(),
            'exhibits'      => array(),
            'events'        => array()
        );

        while($searchQuery->have_posts()) {
            $searchQuery->the_post();
            if( get_post_type() == 'post' || get_post_type() == 'page' ) {
                array_push( $searchQueryResults['generalInfo'], array(
                    'title'     => get_the_title(),
                    'thumbnail' => get_the_post_thumbnail_url(),
                    'excerpt'   => get_the_excerpt(),
                    'link'      => get_the_permalink()
                ) );
            }
            if( get_post_type() == 'exhibits' ) {
                array_push( $searchQueryResults['exhibits'], array(
                    'title'     => get_the_title(),
                    'thumbnail' => get_the_post_thumbnail_url(),
                    'excerpt'   => get_the_excerpt(),
                    'link'      => get_the_permalink()
                ) );
            }
            if( get_post_type() == 'events' ) {
                array_push( $searchQueryResults['events'], array(
                    'title'     => get_the_title(),
                    'thumbnail' => get_the_post_thumbnail_url(),
                    'excerpt'   => get_the_excerpt(),
                    'link'      => get_the_permalink()
                ) );
            }
        }

        return $searchQueryResults;
    }

    add_action( 'rest_api_init', 'bdacSearch' );

?>