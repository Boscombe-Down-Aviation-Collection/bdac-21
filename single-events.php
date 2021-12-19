<?php 

    get_header();

    // event variables
    $event_title        = get_the_title();
    $event_speaker      = get_field( 'event_speaker' );
    $event_date_start   = get_field( 'event_date_start' );
    $event_time_start   = get_field( 'event_time_start' );
    $event_description  = get_field( 'event_description' );

    echo '
        <article class="event">

            <div class="event-image" style="background: url(' . get_the_post_thumbnail_url() . '); background-size: cover; background-position: center;">

                <div class="event-image-details">
                
                <div class="row">
                    <div class="col-12 d-flex event-image-details-meta">
                        <h2>' . $event_title . '</h2>
                        <p> ' . $event_date_start . ' from ' . $event_time_start . '</p>
                    </div>
                </div>
                <div class="row">
                
                    <div class="col-12 event-image-details-presenter">
                        <p class="lead">presented by <span>' . $event_speaker . '</span></p>
                    </div>
                </div>
                <div class="row d-none">
                
                    <div class="col-12">
                    <button>Attending
                    </button>
                    <button>Maybe
                    </button>
                    </div>
                </div>

            </div>

        </article>
    ';

    get_footer();

?>
