<?php 

    $className = 'events-section';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

    echo '
        <section class="' . esc_attr( $className ) . '">
            <div class="container">
                
                <div class="row">
                    <h2>Upcoming Events</h2>

                    <a href="#">
                        <button class="btn-bdac-alt">
                            All Our Events
                        </button>
                    </a>
                    
                </div>
            </div>
        </section>
    ';

?>


<?php wp_reset_postdata() ?>