<?php
$className = 'events';
if ( !empty( $block['className'] ) ) {
    $className .= ' ' . $block[ 'className' ] ;
}
if ( !empty( $block['align'] ) ) {
    $className .= 'align' . $block[ 'align' ] ;
}
?>

<section class="section-<?php echo esc_attr( $className ); ?>">
    <div class="container">

        <?php
        $events_count   = get_field( 'events_count' );
        $events_intro   = get_field( 'events_intro' );
        $events_title   = get_field( 'events_title' );
        $events_copy    = get_field( 'events_copy' );
        $today          = date('Ymd');
        $events_block   = new WP_Query( array(
            'posts_per_page'    => $events_count,
            'post_type'         => 'events',
            'meta_key'          => 'event_date_start',
            'orderby'           => 'meta_value_num',
            'order'             => 'ASC',
            'meta_query'        => array(
                array(
                    'key'       => 'event_date_start',
                    'compare'   => '>=',
                    'value'     => $today
                )
            )
        ) );

        if ( !$events_intro ) {
            echo sprintf(
                '<div class="row">
                    <h2>%1$s</h2>
                </div>',
                esc_html( $events_title )
            );
        }
        ?>
        
        <div class="row">

        <?php
        $i = 0;
        while( $events_block->have_posts() ) {
            $events_block->the_post();

            $event_image        = get_the_post_thumbnail_url();
            $event_image_id     = get_post_thumbnail_id( get_the_ID() );
            $event_image_alt    = get_post_meta( $event_image_id, '_wp_attachment_image_alt', true );
            $event_title        = get_the_title();
            $event_link         = get_the_permalink();
            $event_author       = get_the_author_meta( 'display_name' );
            $event_speaker      = get_field( 'event_speaker', get_the_ID() );
            $event_description  = wp_trim_words( get_field( 'event_description', get_the_ID() ), 20 );
            $event_excerpt      = get_the_excerpt();
            $event_date		    = get_field( 'event_date_start', get_the_ID() );
            $event_cats         = get_the_category(get_the_ID());

            if ( $i == 0 && $events_intro ) :
            ?>

            <div class="<?php echo $className ?>-intro col col-12 col-md-5 me-md-auto text-start">
                <?php 
                echo sprintf(
                    '<h2>%1$s</h2>
                    <p>%2$s</p>',
                    esc_html( $events_title ),
                    esc_html( $events_copy )
                );
                ?>
            </div>

            <?php 
            endif;
            ?>


            <div class="col col-12 <?php echo ( $i == 0 && $events_intro ? 'col-md-6 events-next' : 'col-md-4' ) ?>">
                <div class="bdac-card text-left">
                    <?php 
                    echo sprintf(
                        '<img class="bdac-card-img" src="%1$s" alt="%2$s">',
                        esc_attr( $event_image ),
                        esc_attr( $event_image_alt )
                    );

                    echo sprintf(
                        '<div class="bdac-card-date">
                            <p>%1$s</p>
                        </div>',
                        esc_attr( $event_date )
                    );
                    ?>

                    

                    <div class="bdac-card-content">
                        <?php 
                        echo sprintf(
                            '<h3 class="bdac-card-content-title mb-3">
                                <a href="%1$s" title="%2$s" rel="author">%2$s</a>
                            </h3>',
                            esc_attr( $event_link ),
                            esc_attr( $event_title )
                        );
                        
                        echo sprintf(
                            '<small class="bdac-card-content-meta">Presented by %1$s</small>',
                            wp_kses_post( $event_speaker )
                        );

                        echo sprintf(
                            '<p class="bdac-card-content-body mt-3">%1$s</p>',
                            esc_html( $event_description )
                        );

                        echo sprintf(
                            '<a href="%1$s" class="bdac-card-content-link mt-auto">
                                Read More %2$s
                            </a>',
                            esc_attr( $event_link ),
                            '<i class="fas fa-chevron-right" aria-hidden="true"></i>'
                        );
                        ?>
                    </div>
                </div>
            </div>
            <?php 
            $i++;
            };
            ?> 
        </div>

        <?php 
        if ( !$events_count < 1 ) {
            echo '<div class="row">
                    <a href="/events">
                        <button class="btn-bdac-alt">
                            All Our Events
                        </button>
                    </a>
                </div>';
        }
        ?>
            
        </div>
    </div>
</section>

<?php wp_reset_postdata() ?>
