<?php

$event_title        = get_the_title();
$event_speaker      = get_field( 'event_speaker' );
$event_date_start   = get_field( 'event_date_start' );
$event_time_start   = get_field( 'event_time_start' );
$event_description  = get_field( 'event_description' );
$event_form         = get_field( 'event_interest_form' );

// single variables
$bannerSubTitle = get_field('page_subtitle');
$bannerBg       = get_field('page_bg_image');
$pageHeaderImg  = get_the_post_thumbnail_url();

get_header();
wp_reset_postdata(); 

?>

<article>
    <section class="single-post-image">
        <div class="container">
            <div class="row col-12 col-md-10 mx-auto">
                <img src="<?php echo $pageHeaderImg; ?>" style="width: 100%; border-radius: 0.625rem">
            </div>
        </div>
    </section>

    <section class="single-post-content" style="">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 mx-auto">
                    <h1 class="single-post-content-title"> 
                        <?php echo $event_title; ?>
                    </h1>
                    <h3>
                        presented by <span class="bdac-colour-red"><?php echo $event_speaker; ?></span>
                    </h3>
                    <h4 class="bdac-colour-black">
                        <?php echo $event_date_start; ?> from <?php echo $event_time_start; ?>
                    </h4>
                </div>
                <div class="col-12 col-md-8 mx-auto d-none">
                    <button>Attending</button>
                    <button>Maybe</button>
                </div>
                <div class="col-12 col-md-8 mx-auto">
                    <?php echo wp_kses_post( $event_description ); ?>
                </div>
                <?php if( $event_form) : ?>
                <div class="col-12 col-md-8 mx-auto text-center">
                    <h3>Register Your Interest</h3>
                    <?php echo wp_kses_post( $event_form ); ?>
                </div>
                <?php endif; ?>
                <div class="col-12 col-md-8 mx-auto mt-3">
                    <div class="single-post-share">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> 
        </div>
    </section>
</article>

<?php

while( have_posts() ) : the_post();    
    the_content();                    
endwhile;

get_footer();   

?>