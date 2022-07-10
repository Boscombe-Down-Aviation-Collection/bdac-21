<?php 

    get_header();

    // event variables
    $event_title        = get_the_title();
    $event_speaker      = get_field( 'event_speaker' );
    $event_date_start   = get_field( 'event_date_start' );
    $event_time_start   = get_field( 'event_time_start' );
    $event_description  = get_field( 'event_description' );
    $event_form         = get_field( 'event_interest_form' );

    echo '
        <article class="event">

            <section class="event-hero">

                <img class="event-hero-image" src="' . get_the_post_thumbnail_url() . '" style="" />

                <div class="event-hero-details">
                
                <div class="row">
                    <div class="col-12 d-flex event-hero-details-meta">
                        <h2>' . $event_title . '</h2>
                        <p> ' . $event_date_start . ' from ' . $event_time_start . '</p>
                    </div>
                </div>
                <div class="row">
                
                    <div class="col-12 event-hero-details-presenter">
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

            </section>

            <section class="event-content">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-7 event-content-description pt-5 pb-3">
                            ' . $event_description . '
                        </div>
                        <div class="col-md-4 event-content-form p-5">
                            <h3>Register Your Interest</h3>
                            ' . $event_form . ' 
                        </div>
                    </div>
                </div>
            </section>
            
        </article>
    ';
            
    get_footer();
    
?>