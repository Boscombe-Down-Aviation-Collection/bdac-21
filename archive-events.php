<?php 

    get_header();

?>

    <article class="events">
		<div class="container">
			<div class="row">
			
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
                            <div class="col-12 col-md-8">
                                <div class="bdac-card"  style="background: url(' . $eventHeroImg . '); background-size: cover; background-position-x: center; position: relative;">
                                    <div class="bdac-card-date">
                                        <p>' . $eventDate . '</p>
                                    </div>
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
                                <div class="bdac-card"  style="background: url(' . $eventHeroImg . '); background-size: cover; background-position-x: center; position: relative;">
                                    <div class="bdac-card-date">
                                        <p>' . $eventDate . '</p>
                                    </div>
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
