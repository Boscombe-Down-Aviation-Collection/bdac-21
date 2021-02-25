<?php 

    $className = 'general-content';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

    // Variables
    $generalSubtitle        = get_field( 'general_subtitle' );
    $generalContent         = get_field( 'general_content' );
    $generalContentWidth    = get_field( 'general_content_width' );
    $generalBackground      = get_field( 'general_background_colour' );
    $generalSubtitleColour  = get_field( 'general_header_colour' );
    $generalContentColour   = get_field( 'general_content_colour' );
?>

<section class="<?php 
        echo esc_attr( $className ); 
        echo ( $generalBackground ? ' bdac-bg-' . $generalBackground : '' );
    ?> py-3 py-lg-5">
        
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="<?php echo ( $generalContentWidth ? 'col-lg-' . $generalContentWidth : 'col' ); ?>">
                <?php 
                
                    echo ( $generalSubtitle ? 
                            '<h3' . ( $generalSubtitleColour ? ' class="py-2 bdac-colour-' . $generalSubtitleColour . '"' : '' ) . '>' . $generalSubtitle . '</h3>' : '' ) . 
                            '<div' . ( $generalContentColour ? ' class="py-2 bdac-colour-' . $generalContentColour . '"' : '' ) . '>' . $generalContent . '</div>';

                ?>
            </div>

        </div>
        
    </div>

</section>