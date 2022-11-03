<?php 
    $post_ID = get_the_ID();
    $className = 'map-section';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

    $mapTitle       = get_field( 'map_title' );
    $mapListTitle   = get_field( 'map_list_title' );
    $mapDirections  = get_field( 'map_list_items' );
    $mapLink        = get_field( 'map_link' );
?>
<section class="<?php echo sprintf( 'id="%1$s" class="%2$s"', $post_ID, esc_html( $className) ); ?>">
    <div class="container">
        <div class="row">

            <div class="col col-12 col-md-6 order-2 order-md-1">
                <iframe class="<?php echo $className; ?>-card-location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2505.459224646109!2d-1.7876617840389626!3d51.09998684822988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4873eeb444407bfb%3A0x87d033bc6c8303c7!2sBoscombe%20Down%20Aviation%20Collection!5e0!3m2!1sen!2suk!4v1620208587674!5m2!1sen!2suk" 
                    allowfullscreen="" 
                    loading="lazy" 
                    style="">
                </iframe>
            </div>

            <div class="<?php echo $className; ?>'-card-content col col-12 col-md-5 ms-auto order-1 order-md-2 mb-5 mb-md-0">
                <h2 class="<?php echo $className; ?>-title mb-3"><?php echo $mapTitle; ?></h2>
                <ul class="map-section-content-list">
                    <?php
                    if( have_rows('map_list_items') ) :
                        while( have_rows('map_list_items') ) : the_row();
                            $map_item = get_sub_field( 'map_list_item' );
                            echo '<li>' . $map_item . '</li>';
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </ul>
                <?php
                bdac_opening_query(1,4);
                if( $mapLink ) : 
                    $mapLink_url = $mapLink['url'];
                    $mapLink_title = $mapLink['title'];
                    $mapLink_target = $mapLink['target'] ? $mapLink['target'] : '_self';

                    echo sprintf( 
                        '<a href="%1$s"><button class="btn btn-bdac">%2$s</button></a>',
                        $mapLink_url,
                        $mapLink_title
                    );
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<?php
wp_reset_postdata();
?>
