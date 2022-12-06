<?php  

    $className = 'bdac-intro';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

    $intro_heading  = get_field( 'intro_heading' );
    $intro_text     = get_field( 'intro_text' );
    $intro_image    = get_field( 'intro_image' );
    $intro_link     = get_field( 'intro_link' );

    ?>
    <section class="<?php echo $className; ?>">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-5 me-auto">
                    
                    <h2 class="<?php echo $className; ?>-title mb-3" style="font-size: 2.25rem; text-transform: uppercase; font-weight: 600;"><?php echo esc_html( $intro_heading ); ?></h2>
                    <p class="<?php echo esc_html( $className ); ?>-content">
                    <?php echo $intro_text; ?>
                    </p>  
                    <?php if ( $intro_link ) : ?>
                    <a href=" <?php echo $intro_link['url'] ?> ">
                        <button class="btn btn-bdac">
                            <?php echo $intro_link['title']; ?>
                        </button>
                    </a>
                    <?php endif; ?>

                    </div>
                    <div class="col col-12 col-md-6">
                        <img class="<?php echo $className; ?>-image" src=" <?php echo ( $intro_image ? $intro_image['url'] : 'http://bdac:8888/wp-content/uploads/harrier-roundel-header.jpg' ); ?>" />
                    </div>
                </div>
            </div>
        </section>
