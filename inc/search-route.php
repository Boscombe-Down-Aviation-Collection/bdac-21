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
                'events',
                'opening_hours'
            ),
            's'         => sanitize_text_field( $data['term'] )
        ) );

        $searchQueryResults = array(
            'generalInfo'   => array(),
            'exhibits'      => array(),
            'events'        => array(),
            'openingHours'  => array()
        );

        while($searchQuery->have_posts()) {
            $searchQuery->the_post();
            if( get_post_type() == 'post' || get_post_type() == 'page' ) {
                array_push( $searchQueryResults['generalInfo'], array(
                    'title'     => get_the_title(),
                    'thumbnail' => get_the_post_thumbnail_url(),
                    'excerpt'   => get_the_excerpt(),
                    'link'      => get_the_permalink(),
                    'type'      => get_post_type(),
                    'author'    => get_the_author()
                ) );
            }
            if( get_post_type() == 'exhibits' ) {
                array_push( $searchQueryResults['exhibits'], array(
                    'title'     => get_the_title(),
                    'thumbnail' => get_the_post_thumbnail_url(),
                    'excerpt'   => get_the_excerpt(),
                    'link'      => get_the_permalink(),
                    'type'      => get_post_type()
                ) );
            }
            if( get_post_type() == 'events' ) {
                array_push( $searchQueryResults['events'], array(
                    'title'     => get_the_title(),
                    'thumbnail' => get_the_post_thumbnail_url(),
                    'presenter' => get_field( 'event_speaker', $postId ),
                    'content'   => wp_trim_words( get_field( 'event_description', $postId ), 20 ),
                    'date'      => get_field( 'event_date', $postId ),
                    'link'      => get_the_permalink(),
                    'type'      => get_post_type()
                ) );
            }
            if( get_post_type() == 'opening_hours' ) {
                array_push( $searchQueryResults['opening_hours'], array(
                    'title'         => get_the_title(),
                    'seasonFrom'    => get_field( 'season_from' ),
                    'seasonTo'      => get_field( 'season_to' ),
                    'dateEnd'       => get_field( 'season_to' ),
                    'dayOpen'       => get_field( 'season_opening' ),
                    'dayClose'      => get_field( 'season_closing' ),
                    'dayEntry'      => get_field( 'season_entry' ),
                    'weekStart'     => get_field( 'season_start' ),
                    'weekEnd'       => get_field( 'season_end' )
                ));
            }
        }

        return $searchQueryResults;
    }

    add_action( 'rest_api_init', 'bdacSearch' );

?>