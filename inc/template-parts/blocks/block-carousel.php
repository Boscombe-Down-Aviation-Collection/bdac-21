<?php 

    $className = 'hero-section';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

// $carouselArrow = '<a class="carousel-control-%1$s" data-bs-target="#carouselExampleControls"  role="button" data-slide="%1$s">
//                     <span class="carousel-control-%1$s-icon" aria-hidden="true"></span>
//                     <span class="sr-only">%2$s</span>
//                 </a>';
?>

<section class="<?php echo esc_attr( $className ); ?> p-0">

    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php 
            $slide = 0;
            if ( have_rows( 'carousel' ) ) : 
                while ( have_rows( 'carousel' ) ) : the_row();
                    $carouselImg            = get_sub_field( 'carousel_img' );
                    $carouselImg_alt        = 'http://bdac.olberry01.me/wp-content/uploads/2020/12/south_hangar_hero.jpg';
                    $carouselTitle          = get_sub_field( 'carousel_title' );
                    $carouselLink           = get_sub_field( 'carousel_link' );
                    $carouselInterval       = get_sub_field( 'carousel_interval' );
            ?>

            <div class="carousel-item <?php echo ( $slide === 0 ? 'active' : '' ); ?>" data-interval="<?php echo ( $carouselInterval ? $carouselInterval : 8500 ); ?>">
                <img class="carousel-item-image" src="<?php echo ( $carouselImg ? $carouselImg['url'] : 'no image' ); ?>" class="d-block w-100" alt="...">
                <div class="carousel-inner-overlay"></div>
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col col-12 col-md-5">
                            <div class="carousel-caption d-md-block">
                                <h1 class="carousel-caption-title"><?php echo ( $carouselTitle ? $carouselTitle : '!Interested in visiting our collection?' ); ?></h1>
                                <a href="<?php echo $carouselLink['url']; ?>">
                                    <button class="btn btn-bdac"><?php echo $carouselLink['title']; ?></button>
                                </a>
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

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <?php 
        // echo ( 
        //     $slide > 1 
        //     ? sprintf( $carouselArrow, 'prev', 'Previous' ) . sprintf( $carouselArrow, 'next', 'Next' ) 
        //     : '' 
        // );
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