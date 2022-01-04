<?php 

    get_header();

?>

    <article class="events">
        <section class="page-header bg-black d-flex align-items-end" style="background-image: url(' <?php echo ( $bannerBg ? $bannerBg['url'] : 'http://bdac:8888/wp-content/uploads/TSR-2-Ground-Crew-opt.jpg'); ?> '); height: 25vh; padding: 0; background-size: cover; width: 100%; background-position-y: 35%; position: relative;">
            <div class="page-header-overlay" style="background: #d91f26; position: absolute; top: 0; bottom: 0; left: 0; right: 0; opacity: 80%;"></div>
            <div class="container">
                <div class="row" style="">
                    <div class="col">
                        <h1 class="page-banner-title" style="    background: #fff;
    width: fit-content;
    padding: 0.5rem 1rem;
    left: 0.5rem;
    position: relative;
    max-width: 50%;">Presentations &amp; Events<br> at BDAC</h1>
                        <div class="row justify-content-sm-start justify-content-md-between page-banner-subtitle" style="margin: 0;">
                            <?php 
                                if ( function_exists('yoast_breadcrumb') ) {
                                    yoast_breadcrumb( '<p id="breadcrumbs" class="bdac-bg-white ml-md-auto mb-0 py-3 px-4" style="display: inline-block;">','</p>' );
                                };
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<div class="container py-3 py-md-5">
			<div class="row align-items-end">
			
            <?php 
            
                $i = 0;
                while( have_posts() ) :
					the_post();

                    $postId             = $eventsSection->post->ID;
                    $eventTitle         = get_the_title();
                    $eventLink          = get_the_permalink();
                    $eventHeroImg       = get_the_post_thumbnail_url();
                    $eventSpeaker       = get_field( 'event_speaker', $postId );
                    $eventDescription   = wp_trim_words( get_field( 'event_description', $postId ), 20 );
                    $eventDate		    = get_field( 'event_date_start', $postId );

                    if ( $i == 0 ) {

                        echo '
                            <div class="col-12 col-md-8 event-next">
                                <h3 class="m-0" style="color: #d91f26;">Coming Up Next:</h3>
                                <div class="bdac-card"  style="background: url(' . $eventHeroImg . '); background-size: cover; background-position-x: center; position: relative;">' . 
                                    ( 
                                        $eventDate ? 
                                        '<div class="bdac-card-date">
                                            <p>' . $eventDate . '</p>
                                        </div>' : 
                                        '' 
                                    ) . '
                                    <div class="bdac-card-content">
                                        <h4 class="bdac-card-content-title mb-3">
                                            <a href="' . $eventLink .'" title="Posts by BDAC Admin" rel="author">' . $eventTitle . '</a>
                                        </h4>
                                        <small class="bdac-card-content-meta">Presented by <a href="' . $card_meta_link . '">' . $eventSpeaker . '</a>' . $card_meta . '</small>
                                        <p class="bdac-card-content-body mt-3">' . $eventDescription . '</p>
                                        <a href="' . $eventLink .'" class="bdac-card-content-link mt-auto">
                                            View Event <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        ';

                    } else {

                        echo '
                            <div class="col-12 col-md-4">
                                <div class="bdac-card"  style="background: url(' . $eventHeroImg . '); background-size: cover; background-position-x: center; position: relative;">' . 
                                    ( 
                                        $eventDate ? 
                                        '<div class="bdac-card-date">
                                            <p>' . $eventDate . '</p>
                                        </div>' : 
                                        '' 
                                    ) . '
                                    <div class="bdac-card-content">
                                        <h4 class="bdac-card-content-title mb-3">
                                            <a href="' . $eventLink .'" title="Posts by BDAC Admin" rel="author">' . $eventTitle . '</a>
                                        </h4>
                                        <small class="bdac-card-content-meta">Presented by <a href="' . $card_meta_link . '">' . $eventSpeaker . '</a>' . $card_meta . '</small>
                                        <p class="bdac-card-content-body mt-3">' . $eventDescription . '</p>
                                        <a href="' . $eventLink .'" class="bdac-card-content-link mt-auto">
                                            View Event <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ';

                    }

                $i++;
				endwhile;
				wp_reset_postdata();
            
            ?>

			</div><!-- End: Row -->
		</div><!-- End: Container -->
	</article>

<?php

    get_footer();

?> 
