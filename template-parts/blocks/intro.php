<?php 

    $className = 'intro-section';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

?>

<section class="<?php echo esc_attr( $className ); ?>">
    <div class="container">
        <div class="row">
            <?php 
                // Check rows exists.
                if( have_rows('intro_columns') ) {

                    // Loop through rows.
                    while( have_rows('intro_columns') ) { 
                        the_row();

                        $introTitle     = get_sub_field( 'intro_title' );
                        $introContent   = get_sub_field( 'intro_content' );
                        $introBtnLabel  = get_sub_field( 'intro_button_label' );
                        $introBtnLink   = get_sub_field( 'intro_button_link' );
                        $introEvents    = get_sub_field( 'intro_events' );
                        $introNews      = get_sub_field( 'intro_news' );

                        echo '
                            <div class="col-12 col-md-6 col-lg-4 d-flex flex-column my-3 m-md-0">
                                <div class="bdac-card-header">
                                    <h5 class="' . $className .'-title text-center">' . $introTitle . '</h5>
                                    <hr class="bdac-bg-red mx-auto">
                                </div>' .
                                ( 
                                    $introContent ? 
                                    '<p class="intro-content">' . $introContent . '</p>' : 
                                    ( 
                                        $introEvents ? 
                                        get_events() : 
                                        (
                                            $introNews ?
                                            get_blog(1) :
                                            ''
                                        )    
                                    ) 
                                ) .
                                '<div class="mt-auto bdac-card-footer">' . 
                                    ( 
                                        $introBtnLabel && $introBtnLink ? 
                                        '<a href="' . $introBtnLink . '" class="bdac-card-footer-link">' . $introBtnLabel . ' <i class="fas fa-chevron-right" aria-hidden="true"></i></a>' : 
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