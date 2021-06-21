<?php 

    $className = 'hero-section';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

    $carouselArrow = '<a class="carousel-control-%1$s" href="#mainCarousel" role="button" data-slide="%1$s">
                        <span class="carousel-control-%1$s-icon" aria-hidden="true"></span>
                        <span class="sr-only">%2$s</span>
                      </a>'

?>

<section class="<?php echo esc_attr( $className ); ?> p-0">
    <div id="mainCarousel" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
            <?php $indicator = 0;
                while( have_rows('carousel') ): the_row();
                    if ($indicator === 0) {
                        echo '<li data-target="#mainCarousel" data-slide-to="0" class="active"></li>';
                    } else {
                        echo '<li data-target="#mainCarousel" data-slide-to="' . $indicator . '"></li>';
                    }
                $indicator++;
            endwhile; ?>
        </ol>

        <div class="carousel-inner">

            <?php 
                $slide = 0;
                if ( have_rows( 'carousel' ) ) : 
                    while ( have_rows( 'carousel' ) ) : the_row();

                    // Variables
                    $carouselImg            = get_sub_field( 'carousel_img' );
                    $carouselImgGrey        = get_sub_field( 'carousel_img_grey' );
                    $carouselTitle          = get_sub_field( 'carousel_title' );
                    $carouselSubtitle       = get_sub_field( 'carousel_subtitle' );
                    $carouselBtn            = get_sub_field( 'carousel_button' );
                    $carouselLink           = get_sub_field( 'carousel_link' );
                    $carouselAlign          = get_sub_field( 'carousel_align' );
                    $carouselInterval       = get_sub_field( 'carousel_interval' );
                    $carouselOverlay        = get_sub_field( 'carousel_overlay' );
                    $carouselOpacity        = get_sub_field( 'carousel_opacity' ) / 100;
                    $carouselTitleColour    = get_sub_field( 'carousel_title_colour' );
                    $carouselSubTitleColour = get_sub_field( 'carousel_subtitle_colour' );
                    $carouselBtnColour      = get_sub_field( 'carousel_btn_colour' );

                    $oneCol                 = '<div class="col align-self-center" ' . $alignCol . '>';
                    $twoCol                 = '<div class="col col-sm-%s col-lg-%s align-self-center %s" ' . $alignCol . '>';
                    $endCol                 = '</div>';
                    $alignCol               = ( !$carouselAlign ? '' : 'style="text-align:' . $carouselAlign . '"' );
                    $carouselColour         = ( 
                                                $carouselOverlay !== 'blue' ? 
                                                'carousel-overlay carousel-overlay-' . $carouselOverlay  : 
                                                'carousel-overlay'
                                            );
                    $carouselHColour        = ( 
                                                $carouselTitleColour !== 'red' ? 
                                                'colour-' . $carouselTitleColour : 
                                                '' 
                                            );
                    $carouselSHColour       = ( 
                                                $carouselSubTitleColour !== 'white' ? 
                                                ' colour-' . $carouselSubTitleColour : 
                                                '' 
                                            );
                    $carouselContent        = '<h1 class="' . $carouselHColour . '">' . $carouselTitle . '</h1>
                                            <p class="lead' . $carouselSHColour . '">' . $carouselSubtitle . '</p>';
                    $carouselButton         = '<a href="' . $carouselLink . '">
                                                <button class="btn btn-lg btn-bdac' . ( 
                                                    !$carouselBtnColour || $carouselBtnColour == 'white' ? 
                                                    '' : 
                                                    ' btn-bdac-' . $carouselBtnColour ) .'">' . $carouselBtn . ' <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                                </button>
                                            </a>';

                    echo
                    '<div class="carousel-item ' . ( $slide === 0 ? 'active' : '' ) . '" data-interval="' . ( $carouselInterval ? $carouselInterval : 8500 ) . '">' . 
                        ($carouselOverlay !== 'none' ? '<div class="' . $carouselColour . '" style="opacity: ' . $carouselOpacity . '"></div>' : '' ) . '
                        <img class="d-block w-100' . ($carouselImgGrey ? ' bdac-greyscale' : '') . '" src=" ' . $carouselImg[ 'url' ] . '" alt="' . $carouselImg['alt'] . '" />
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row align-content-center">           
                                ' . ( 
                                    $carouselBtn ? 
                                    sprintf($twoCol, '12', '8', '') . $carouselContent . $endCol . 
                                    sprintf($twoCol, '12', '4', ' justify-content-center carousel-link') . $carouselButton . $endCol : 
                                    '<div class="col align-self-center" style="text-align:' . $carouselAlign . '">'
                                        . $carouselContent . $endCol
                                ) .
                                    '</div>
                                </div>
                            </div>
                        </div>
                    '; 
                $slide++;
                endwhile;
                wp_reset_postdata(); 
            endif;     
        echo 
        '</div>' . 
        ( 
            $slide > 1 
            ? sprintf( $carouselArrow, 'prev', 'Previous' ) . sprintf( $carouselArrow, 'next', 'Next' ) 
            : '' 
        );
        ?>
    </div>
</section>