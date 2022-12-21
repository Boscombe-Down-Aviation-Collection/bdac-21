<?php
$slide = 0;
$carouselImg            = get_sub_field( 'carousel_img' );
$carouselImg_alt        = 'http://bdac.olberry01.me/wp-content/uploads/2020/12/south_hangar_hero.jpg';
$carouselTitle          = get_sub_field( 'carousel_title' );
$carouselLink           = get_sub_field( 'carousel_link' );
$carouselInterval       = get_sub_field( 'carousel_interval' );
?>


<div class="carousel-item <?php echo ( $slide === 0 ? 'active' : '' ); ?>" data-interval="<?php echo ( $carouselInterval ? $carouselInterval : 8500 ); ?>">
    <img class="carousel-item-image" src="<?php echo ( $carouselImg ? $carouselImg['url'] : 'no image' ); ?>" class="d-block w-100" alt="<?php echo ( $carouselImg ? $carouselImg['alt'] : 'no image' ); ?>">
    <div class="carousel-inner-overlay"></div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col col-12 col-md-5">
                <div class="carousel-caption d-md-block">
                    <h1 class="carousel-caption-title"><?php echo ( $carouselTitle ? $carouselTitle : '!Interested in visiting our collection?' ); ?></h1>
                    <a href="<?php echo $carouselLink['url']; ?>" class="carousel-caption-button">
                        <button><?php echo $carouselLink['title']; ?></button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $slide++; ?>
                    