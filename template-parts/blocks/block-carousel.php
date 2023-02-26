<?php 
$className = 'bdac-carousel';
if ( !empty( $block['className'] ) ) {
    $className .= ' ' . $block[ 'className' ] ;
}
if ( !empty( $block['align'] ) ) {
    $className .= 'align' . $block[ 'align' ] ;
}
$carousel_id    = get_field( 'carousel_id' );
$carousel_width = get_field( 'carousel_width' );
?>

<section <?php echo sprintf( 'id="%1$s"', esc_html( $carousel_id ) ); ?> class="<?php echo esc_attr( $className ); ?> p-0" <?php echo ( $carousel_width ? 'style="margin-bottom: 4rem"' : '' ) ?>>
    
    <div id="bdacCarousel" class="carousel <?php echo ( $carousel_width ? 'carousel-contained ' : '' ); ?>slide" data-bs-ride="carousel">
        <div class="carousel-inner"
            data-aos-easing="ease-in-back"
            data-aos-delay="125"
            data-aos-offset="0">

            <?php 
            $slide = 0;
            if ( have_rows( 'carousel' ) ) : 
                while ( have_rows( 'carousel' ) ) : the_row();

                    $carousel_img       = get_sub_field( 'carousel_img' );
                    $carousel_img       = get_sub_field( 'carousel_img' );
                    $slide_video        = get_sub_field( 'slide_video' );
                    $slide_video_img    = get_sub_field( 'slide_video_img' );
                    $slide_overlay      = get_sub_field( 'slide_overlay' );
                    $slide_overlay_cond = null;
                    $slide_title        = get_sub_field( 'carousel_title' );
                    $slide_copy         = get_sub_field( 'slide_copy' );
                    $slide_link         = get_sub_field( 'carousel_link' );
                    $slideInterval      = get_sub_field( 'carousel_interval' );
                    $carouselArrow      = '<button class="carousel-control-%1$s" type="button" data-bs-target="#bdacCarousel" data-bs-slide="%1$s">
                                            <span class="carousel-control-%1$s-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">%2$s</span>
                                        </button>';
            ?>
            <div class="carousel-item bdac-carousel-item<?php echo ( $slide === 0 ? ' active' : '' ) ?>" data-interval="<?php echo ( $slideInterval ? $slideInterval : 8500 ); ?>">
                <?php
                if ( $carousel_img ) {
                    echo sprintf(
                        '<img src="%1$s" class="d-block w-100 carousel-item-image" alt="%2$s">',
                        esc_html( $carousel_img['url'] ),
                        esc_html( $carousel_img['alt'] )
                    );
                }
                if ( $slide_video ) {
                    echo sprintf(
                        '<div class="carousel-item-video-overlay%4$s"></div>
                        <video class="carousel-item-video" autoplay loop muted>
                            <source src="%1$s" type="video/mp4" />
                            <img src="%2$s" title="Your browser does not support the video tag">
                        </video>',
                        esc_html( $slide_video['url'] ),
                        esc_html( $slide_video_img['url'] ),
                        ( $slide_overlay ? '' : ' d-none' )
                    );
                }
                ?>
                <div class="bdac-carousel-item-content" data-aos="fade-zoom-in"
                    data-aos-easing="ease-in-back"
                    data-aos-delay="1000"
                    data-aos-offset="0">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-5 p-4 bdac-carousel-item-content-panel">
                                <h2><?php echo $slide_title; ?></h2>
                                <p class="bdac-carousel-item-content-copy"><?php echo $slide_copy; ?></p>
                                <?php 
                                if ( $slide_link ) {
                                    echo sprintf(
                                        '<a href="%1$s">
                                            <button class="btn btn-bdac">%2$s</button>
                                        </a>',
                                        $slide_link['url'],
                                        $slide_link['title']
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
            
            echo ( 
                $slide > 1 
                ? sprintf( $carouselArrow, 'prev', 'Previous' ) . sprintf( $carouselArrow, 'next', 'Next' ) 
                : '' 
            );
            ?>    

        <?php if( $slide >= 2 ) : ?>
        <div class="carousel-indicators bdac-carousel-indicators">
            <?php $indicator = 0;
            while( have_rows('carousel') ): the_row();
                if ($indicator === 0) {
                    echo '<button type="button" data-bs-target="#bdacCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>';
                } else {
                    echo '<button type="button" data-bs-target="#bdacCarousel" data-bs-slide-to="' . $indicator . '" aria-label="Slide ' . ( $indicator + 1 ) . '"></button>';
                }
            $indicator++;
            endwhile; ?>
        </div>
        <?php endif; ?>
</section>