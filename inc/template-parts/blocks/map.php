<?php 

    $className = 'map-section';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

    $mapTitle       = get_field( 'map_title' );
    $mapListTitle   = get_field( 'map_list_title' );
    $mapDirections  = get_field( 'map_list_items' );
    $mapLink        = get_field( 'map_link' );


    echo '
        <section class="' . $className . '">
            <div class="container">
                <div class="row">

                    <div class="col col-12 col-md-6 order-2 order-md-1">
                        <iframe class="' . $className . '-card-location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2505.459224646109!2d-1.7876617840389626!3d51.09998684822988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4873eeb444407bfb%3A0x87d033bc6c8303c7!2sBoscombe%20Down%20Aviation%20Collection!5e0!3m2!1sen!2suk!4v1620208587674!5m2!1sen!2suk" 
                            allowfullscreen="" 
                            loading="lazy" 
                            style="">
                        </iframe>
                    </div>

                    <div class="' . $className . '-card-content col col-12 col-md-5 ms-auto order-1 order-md-2 mb-5 mb-md-0">
                        
                        <h2 class="' . $className . '-title mb-3">'. $mapTitle . '</h2>
                        
                        <ul class="map-section-content-list">';

                            // Check rows exists.
                            if( have_rows('map_list_items') ) {

                                // Loop through rows.
                                while( have_rows('map_list_items') ) { 
                                    the_row();

                                    $mapListItem     = get_sub_field( 'map_list_item' );

                                    echo '
                                        <li>' . $mapListItem . '</li>
                                    ';
                                }
                                wp_reset_postdata();
                            };
                        wp_reset_postdata();

                    echo '
                        </ul>';
                        
                        bdac_opening_query(1,4);

                    echo '
                        <a href="' . $mapLink['url']  . '">
                            <button class="btn btn-bdac">
                                ' . $mapLink['title'] . ' 
                            </button>
                        </a>

                    </div>
                    
                </div>
            </div>
        </section>

    ';

wp_reset_postdata();


