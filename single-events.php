<?php 

    get_header();

    // event variables
    $event_title    = get_the_title();

    echo '
        <article class="event">

            <div class="event-image" style="background: url(' . get_the_post_thumbnail_url() . '); background-size: cover; background-position: center;">

                <div class="event-image-details">
                    <h2>' . $event_title . '</h2>
                </div>

            </div>

        </article>
    ';

    get_footer();

?>
