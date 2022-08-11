<?php 

    $className = 'events-section';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

?>

<section class="<?php echo esc_attr( $className ); ?>">
    <div class="container">
        this is the events block
        <div class="row">
            <?php 
                // Check rows exists.
                if( have_rows('events_columns') ) {

                    // Loop through rows.
                    while( have_rows('events_columns') ) { 
                        the_row();

                        $eventsTitle     = get_sub_field( 'events_title' );
                        $eventsContent   = get_sub_field( 'events_content' );
                        $eventsBtnLabel  = get_sub_field( 'events_button_label' );
                        $eventsBtnLink   = get_sub_field( 'events_button_link' );
                        $eventsEvents    = get_sub_field( 'events_events' );
                        $eventsNews      = get_sub_field( 'events_news' );

                        echo '
                            <div class="col-12 col-md-6 col-lg-4 d-flex flex-column my-3 m-md-0">
                                <div class="bdac-card-header">
                                    <h5 class="' . $className .'-title text-center">' . $eventsTitle . '</h5>
                                    <hr class="bdac-bg-red mx-auto">
                                </div>' .
                                ( 
                                    $eventsContent ? 
                                    '<p class="events-content">' . $eventsContent . '</p>' : 
                                    ( 
                                        $eventsEvents ? 
                                        get_events() : 
                                        (
                                            $eventsNews ?
                                            get_blog(1) :
                                            ''
                                        )    
                                    ) 
                                ) .
                                '<div class="mt-auto bdac-card-footer">' . 
                                    ( 
                                        $eventsBtnLabel && $eventsBtnLink ? 
                                        '<a href="' . $eventsBtnLink . '" class="bdac-card-footer-link">' . $eventsBtnLabel . ' <i class="fas fa-chevron-right" aria-hidden="true"></i></a>' : 
                                        '' 
                                    ) . 
                                '</div> 
                            </div>
                        ';
                    }
                };

            ?>
        </div>
    </div>
</section>

<?php wp_reset_postdata() ?>