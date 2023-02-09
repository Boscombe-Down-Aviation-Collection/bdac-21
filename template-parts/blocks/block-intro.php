<?php  

$intro_class_name = 'bdac-intro';
if ( !empty( $block['className'] ) ) {
    $intro_class_name .= ' ' . $block[ 'className' ] ;
}
if ( !empty( $block['align'] ) ) {
    $intro_class_name .= 'align' . $block[ 'align' ] ;
}

?>

<section class="<?php echo $intro_class_name; ?>">
    <div class="container">

<?php
if( have_rows('intro_rows') ):
    while( have_rows('intro_rows') ) : the_row();

        $intro_heading  = get_sub_field( 'intro_heading' );
        $intro_text     = get_sub_field( 'intro_text' );
        $intro_image    = get_sub_field( 'intro_image' );
        $intro_link     = get_sub_field( 'intro_link' );
?>

        <div class="row bdac-intro-row">
            <div class="col col-12 col-lg-<?php echo ( !$intro_image ? '8 mx-auto text-center' : '5' ) ?> bdac-intro-row-text">
                <?php
                if ( $intro_heading ) {
                    echo sprintf(
                        '<h2 class="%1$s-row-text-title mb-3">%2$s</h2>',
                        $intro_class_name,
                        esc_html( $intro_heading )
                    );
                }

                if ( $intro_text ) {
                    echo sprintf(
                        '<p class="%1$s-row-text-content">%2$s</p>',
                        $intro_class_name,
                        wp_kses_post( $intro_text )
                    );
                }

                if ( $intro_link ) {
                    echo sprintf( 
                        '<a href="%1$s" class="%2$s" target="%3$s">
                            <button class="btn btn-bdac">%4$s</button>
                        </a>',
                        $intro_class_name,
                        $intro_link['url'],
                        ( $intro_link['target'] ? $intro_link['target'] : '_self' ),
                        esc_html( $intro_link['title'] )
                    );
                }
                ?>
            </div>
            <?php 
            if ( $intro_image ) {
                echo sprintf(
                    '<div class="col col-12 col-lg-6 bdac-intro-row-img p-lg-0">
                        <img class="%1$s-row-image" src="%2$s" alt="%3$s" loading="lazy" />
                    </div>',
                    $intro_class_name,
                    $intro_image['url'],
                    $intro_image['alt']
                );
            }
            ?>
        </div>

        <?php 
            endwhile;
        endif;
        
        ?>
    </div>
</section>
