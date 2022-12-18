<?php 

    get_header();

?>

    <article class="events">
		<div class="container">
			<div class="row justify-content-center">
			
            <?php 
            
                $i = 0;
                while( have_posts() ) :
					the_post();

                    $eventTitle         = get_the_title();
                    $eventLink          = get_the_permalink();
                    $eventHeroImg       = get_the_post_thumbnail_url();
                    $eventSpeaker       = get_field( 'event_speaker' );
                    $eventDescription   = wp_trim_words( get_field( 'event_description' ), 20 );
                    $eventDate		    = get_field( 'event_date_start' );

                    if ( $i == 0 ) {

                        echo '
                            <div class="events-intro col col-12 col-md-5 me-md-auto">
                                <h2>BDAC Events & Presentations</h2>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi modi, cupiditate culpa in omnis error voluptatum aspernatur inventore ipsum, nisi delectus sit itaque mollitia similique harum cum earum, vel nam.
                                </p>
                            </div>
                            <div class="col col-12 col-md-6 event-next">
                                <h3 class="m-0" style="color: #d91f26;">Coming Up Next:</h3>
                                <div class="bdac-card event-next-image"  style="background: url(' . $eventHeroImg . '); background-size: cover; position: relative;">' . 
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
                                        <small class="bdac-card-content-meta">Presented by' . $eventSpeaker . '</small>
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
                            <div class="col col-12 col-md-4 p-md-3">
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
                                        <small class="bdac-card-content-meta">Presented by ' . $eventSpeaker . '</small>
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
                
                if (is_active_sidebar('events_description')) {
                    ?>
                    <li>
                         <?php dynamic_sidebar('events_description'); ?>
                    </li>
                <?php
                    }

            
            ?>

			</div><!-- End: Row -->
		</div><!-- End: Container -->
	</article>

<?php

    get_footer();

?> 
