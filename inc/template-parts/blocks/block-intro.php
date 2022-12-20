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
    $intro_image_fb = 'http://bdac:8888/wp-content/uploads/harrier-roundel-header.jpg';
    $intro_link     = get_field( 'intro_link' );
    $intro_url      = $intro_link['url'];
    $intro_title    = $intro_link['title'];
    $intro_target   = $intro_link['target'] ? $intro_link['target'] : '_self';

    ?>
    <section class="<?php echo $className; ?>">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-5 me-auto">
                    <?php
                    if ( $intro_heading ) {
                        echo sprintf(
                            '<h2 class="%1$s-title mb-3">%2$s</h2>',
                            $className,
                            esc_html( $intro_heading )
                        );
                    };

                    if ( $intro_text ) {
                        echo sprintf(
                            '<p class="%1$s-content">%2$s</p>',
                            $className,
                            wp_kses_post( $intro_text )
                        );
                    };

                    if ( $intro_link ) {
                        echo sprintf( 
                            '<a href="%1$s" target="%2$s">
                                <button class="btn btn-bdac">%3$s</button>
                            </a>',
                            $intro_url,
                            $intro_target,
                            esc_html( $intro_title )
                        );
                    };
                    ?>
                </div>
                <div class="col col-12 col-md-6">
                    <?php echo sprintf(
                        '<img class="%1$s-image" src="%2$s" />',
                        $className,
                        ( $intro_image ? $intro_image['url'] : $intro_image_fb )
                    ) ?>
                </div>
            </div>
        </div>
    </section>
