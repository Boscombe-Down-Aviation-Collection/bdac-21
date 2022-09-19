<?php

    $className = 'events-section';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }
?>

<section class="<?php echo esc_attr( $className ); ?>">
    <div class="container">
        
        <div class="row">
            <h2>Upcoming Events</h2>
        </div>
        
        <div class="row">

        <?php
            $events_block = new WP_Query( array(
                'posts_per_page' => 3,
                'post_type' => 'events'
            ) );

            while( $events_block->have_posts() ) {
                $events_block->the_post();

                $event_image        = get_the_post_thumbnail_url();
                $event_title        = get_the_title();
                $event_link         = get_the_permalink();
                $event_author       = get_the_author_meta( 'display_name' );
                $eventSpeaker       = get_field( 'event_speaker' );
                $event_description  = wp_trim_words( get_field( 'event_description' ), 20 );
                $event_date		    = get_field( 'event_date_start' );

        ?>

                    <div class="col col-12 col-md-4">
                        <div class="bdac-card text-left" style="background: url(' <?php echo esc_attr( $event_image ); ?> '); background-size: cover; background-position-x: center;">
                            
                            <div class="bdac-card-date">
                                <p><?php echo esc_attr( $event_date ); ?></p>
                            </div>

                            <div class="bdac-card-content">
                                <h3 class="bdac-card-content-title mb-3">
                                    <a href="<?php echo esc_attr( $event_link ) ?>" title="Posts by BDAC Admin" rel="author">
                                        <?php echo esc_attr( $event_title ); ?>
                                    </a>
                                </h3>
                                <small class="bdac-card-content-meta">By <a href=""></a><a href="/" title="Posts by BDAC Admin" rel="author">BDAC Admin</a> in <a href="/" rel="category tag">Test Category</a></small>
                                <p class="bdac-card-content-body mt-3"><?php echo $event_description; ?></p>
                                <a href="<?php echo esc_attr( $event_link ) ?>" class="bdac-card-content-link mt-auto">
                                    Read More <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php 
                };
            ?>
                
        </div>

        <div class="row">
            <a href="/events">
                <button class="btn-bdac-alt">
                    All Our Events
                </button>
            </a>
        </div>
            
        </div>
    </div>
</section>

<?php wp_reset_postdata() ?>
