<?php 

    get_header();

    // event variables
    $event_title        = get_the_title();
    $event_speaker      = get_field( 'event_speaker' );
    $event_date_start   = get_field( 'event_date_start' );
    $event_time_start   = get_field( 'event_time_start' );

    echo '
        <article class="event">

            <div class="event-image" style="background: url(' . get_the_post_thumbnail_url() . '); background-size: cover; background-position: center;">

                <div class="row event-image-details">

                    <div class="col-12">
                        <h2>' . $event_title . '</h2>
                    </div>
                    <div class="col-6">
                        <p>presented by <span class="event-image-details-presenter">' . $event_speaker . '</span></p>
                    </div>
                    <div class="col-6">
                        <p>' . $event_date_start . '</p>
                        <p>from ' . $event_time_start . '</p>
                    </div>
                </div>

            </div>

        </article>
    ';

    get_footer();

?>
