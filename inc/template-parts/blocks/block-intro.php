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

    echo '
        <section class="' . $className . '">
            <div class="container">
                <div class="row">
                    <div class="col col-12 col-md-5 me-auto">
                        
                        <h2 class="' . $className . '-title mb-3" style="font-size: 2.25rem; text-transform: uppercase; font-weight: 600;">' . $intro_heading . '</h2>
                        <p class="' . $className . '-content">' . $intro_text . '</p>  

                        <a href="' . $intro_link['url'] . '">
                            <button class="btn btn-bdac">
                                ' . $intro_link['title'] . '
                            </button>
                        </a>

                    </div>
                    <div class="col col-12 col-md-6">
                        <img class="' . $className . '-image" src="' . ( $intro_image ? $intro_image['url'] : 'http://bdac:8888/wp-content/uploads/harrier-roundel-header.jpg' ) . '" />
                    </div>
                </div>
            </div>
        </section>
    ';
    