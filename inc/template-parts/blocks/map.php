<?php 

    $className = 'map-section';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

?>

<section class="<?php echo esc_attr( $className ); ?> py-1 py-md-5">

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-8">
                <div class="map-section-card bdac-shadow">
                <iframe class="map-section-card-location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2505.459224646109!2d-1.7876617840389626!3d51.09998684822988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4873eeb444407bfb%3A0x87d033bc6c8303c7!2sBoscombe%20Down%20Aviation%20Collection!5e0!3m2!1sen!2suk!4v1620208587674!5m2!1sen!2suk" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="map-section-content">
                    <h4>How to get here</h4>
                    <ul>
                        <li>Step 1</li>
                        <li>Step 2</li>
                        <li>Step 3</li>
                        <li>Step 4</li>
                        <li>Step 5</li>
                        <li>Step 6</li>
                        <li>Step 7</li>
                    </ul>
                    <?php 
                        $today = date('Y M jS');
                        $args = array(  
                            'post_type'         => 'opening_hours',
                            'post_status'       => 'publish',
                            'posts_per_page'    => 1,
                            'meta_key'          => 'season_to',
                            'orderby'           => 'meta_value',
                            'order'             => 'ASC',
                            'meta_query'        => array(
                                array(
                                    'key'       => 'season_to',
                                    'compare'   => '>=',
                                    'value'     => $today
                                )
                            )
                        );

                        $seasons = new WP_Query( $args ); 
                            
                        while ( $seasons->have_posts() ) : $seasons->the_post(); 

                            $seasonTitle    = get_the_title();
                            $seasonStart    = get_field( 'season_from' );
                            $seasonEnd      = get_field( 'season_to' );
                            $dateEnd        = get_field( 'season_to' );
                            $dayOpen        = get_field( 'season_opening' );
                            $dayClose       = get_field( 'season_closing' );
                            $dayEntry       = get_field( 'season_entry' );
                            $weekStart      = get_field( 'season_start' );
                            $weekEnd        = get_field( 'season_end' );

                            $h4             = '<h4>';
                            $h4End          = '</h4>';
                            $p              = '<p>';
                            $pEnd           = '</p>';
                            $br             = '<br>';

                            echo 
                                $h4 . $seasonTitle . $h4End 
                                . $p . $seasonStart . ' - ' . $seasonEnd . $br . 
                                $weekStart . ' to ' . $weekEnd . ', ' . $dayOpen . ' to ' . $dayClose . $br .
                                'Last entry ' . $dayEntry . $pEnd . $br;
                        endwhile;

                        wp_reset_postdata(); 
                    ?>
                </div>
            </div>
        </div>
    </div>

</section>

