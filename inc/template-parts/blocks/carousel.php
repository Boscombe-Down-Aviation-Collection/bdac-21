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

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            
            <div class="carousel-item active">
                <img class="carousel-item-image" src="http://bdac.olberry01.me/wp-content/uploads/2020/12/south_hangar_hero.jpg" class="d-block w-100" alt="...">
                <div class="carousel-inner-overlay"></div>
                <div class="container">

                    <div class="carousel-caption d-md-block">
                        <h1 class="carousel-caption-title">Interested in visiting our collection?</h1>
                        <a href="#" class="carousel-caption-button">
                            <button>check opening times</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="carousel-item-image" src="http://bdac.olberry01.me/wp-content/uploads/2021/12/SWI1595a-scaled-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-inner-overlay"></div>
                <div class="carousel-caption d-md-block">
                    <h1 class="carousel-caption-title">The ROYAL FLYING CORPS EXHIBITION</h1>
                    <a href="#" class="carousel-caption-button">
                        <button>More Details</button>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="carousel-item-image" src="http://bdac.olberry01.me/wp-content/uploads/2019/12/tigerMoth-to-lightning.jpg" class="d-block w-100" alt="...">
                <div class="carousel-inner-overlay"></div>
                <div class="carousel-caption d-md-block">
                    <h1 class="carousel-caption-title">What presentations and events are on</h1>
                    <a href="#" class="carousel-caption-button">
                        <button>View our events</button>
                    </a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div id="mainCarousel" class="carousel slide d-none" data-ride="carousel">
        
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

                    $alignCol               = ( !$carouselAlign ? '' : 'style="text-align:' . $carouselAlign . '"' );
                    $oneCol                 = '<div class="col align-self-center" ' . $alignCol . '>';
                    $twoCol                 = '<div class="col col-sm-%s col-lg-%s align-self-center %s" ' . $alignCol . '>';
                    $endCol                 = '</div>';
                    
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
                                    sprintf($twoCol, '12', '8', ' justify-content-start carousel-link') . $carouselButton . $endCol : 
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