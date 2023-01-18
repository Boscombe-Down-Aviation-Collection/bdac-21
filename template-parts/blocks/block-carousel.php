<?php 
$className = 'hero-section';
if ( !empty( $block['className'] ) ) {
    $className .= ' ' . $block[ 'className' ] ;
}
if ( !empty( $block['align'] ) ) {
    $className .= 'align' . $block[ 'align' ] ;
}

$carousel_arrow = '<a class="carousel-control-%1$s" data-bs-target="#carouselExampleControls"  role="button" data-slide="%1$s">
                    <span class="carousel-control-%1$s-icon" aria-hidden="true"></span>
                    <span class="sr-only">%2$s</span>
                </a>';
?>

<section class="<?php echo esc_attr( $className ); ?> p-0">

    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php 
            $slide = 0;
            if ( have_rows( 'carousel' ) ) : 
                while ( have_rows( 'carousel' ) ) : the_row();
                    $carousel_img            = get_sub_field( 'carousel_img' );
                    $carousel_img_alt        = 'http://bdac.olberry01.me/wp-content/uploads/2020/12/south_hangar_hero.jpg';
                    $carousel_title          = get_sub_field( 'carousel_title' );
                    $carousel_link           = get_sub_field( 'carousel_link' );
                    $carousel_interval       = get_sub_field( 'carousel_interval' );
            ?>

            <div class="carousel-item <?php echo ( $slide === 0 ? 'active' : '' ); ?>" data-interval="<?php echo ( $carousel_interval ? $carousel_interval : 8500 ); ?>">
                <?php 
                if ( $carousel_img ) {
                    echo sprintf(
                        '<img class="carousel-item-image" class="d-block w-100" src="%1$s" alt="%2$s">',
                        $carousel_img['url'],
                        $carousel_img['alt']
                    );
                }
                ?>
                <div class="carousel-inner-overlay"></div>
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col col-12 col-md-5">
                                <div class="carousel-caption d-md-block">
                                    <?php 
                                    if ( $carousel_title ) {
                                        echo sprintf(
                                            '<h1 class="carousel-caption-title">%1$s</h1>',
                                            esc_html( $carousel_title )
                                        );
                                    }
                                    if ( $carousel_link ) {
                                        echo sprintf(
                                            '<a href="%1$s">
                                                <button class="btn btn-bdac">%2$s</button>
                                            </a>',
                                            esc_html( $carousel_link['url'] ),
                                            esc_html( $carousel_link['title'] )
                                        );
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        $slide++;
                    endwhile;
                    wp_reset_postdata(); 
                endif;
                ?>
            </div>
        <?php 
        if ( $slide >= 2  ) {
            echo sprintf( 
                $carousel_arrow, 'prev', 'Previous' ) . sprintf( $carousel_arrow, 'next', 'Next' 
            );
        }
        ?>  
    </div>

        <ol class="carousel-indicators">
            <?php 
            $indicator = 0;
                while( have_rows('carousel') ): the_row();
                    if ($indicator === 0) {
                        echo '<li data-target="#mainCarousel" data-slide-to="0" class="active"></li>';
                    } else {
                        echo '<li data-target="#mainCarousel" data-slide-to="' . $indicator . '"></li>';
                    }
            $indicator++;
            endwhile; ?>
        </ol>
    </div>
</section>