<?php 

    $className = 'image-text';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    };

    // Variables
    $image_image        = get_field( 'image_image' );
    $image_header       = get_field( 'image_header' );
    $image_content      = get_field( 'image_content' );
    $image_button       = get_field( 'image_button' );
    $image_link         = get_field( 'image_link' );
    $image_background   = get_field( 'image_background' );
    $image_header_color = get_field( 'image_header_colour' );
    $image_text_color   = get_field( 'image_body_colour' );

    echo '
        <section class="' . esc_attr( $className ) . '">
            <div class="container">

                <div class="row flex-row justify-content-center">
                
                    <div class="col-12 col-md-8 ' . esc_attr( $className ) . '-image d-flex px-0 p-lg-0">
                        <img src="' . $image_image['url'] . '" alt="' . $image_image['alt'] .'">' .
                        (
                            $image_image['title'] && $image_image['caption'] ?
                            '<div class="' . esc_attr( $className ) . '-image-caption">
                                <h5 class="bdac-colour-' . ( $image_header_color ? $image_header_color['value']: 'red' ) . '">' . $image_image['title'] . '</h5>
                                <p>' . $image_image['caption'] . '</p>
                            </div>' :
                            ''
                        ) . '
                    </div>
                    <div class="col-12 col-md-4 ' . esc_attr( $className ) . '-content d-flex flex-column bdac-bg-' . ( $image_background ? $image_background['value'] : 'blue' ) . '">
                    
                        <h2 class="bdac-colour-' . ( $image_header_color ? $image_header_color['value']: 'red' ) . '">' . $image_header . '</h2>
                        <p class="bdac-colour-' . ( $image_body_colour ? $image_body_colour['value'] : 'white' ) . '">' . $image_content . '</p>
                        <a href="' . $image_link . '" class="btn btn-bdac">' . $image_button . ' <i class="fas fa-chevron-right" aria-hidden="true"></i></a>

                    </div>

                </div>


            </div>
        </section>
    ';

    wp_reset_postdata();
?>
