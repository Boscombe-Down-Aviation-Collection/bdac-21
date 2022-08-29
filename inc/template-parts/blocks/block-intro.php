<?php  

    $className = 'bdac-intro';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

    echo '
        <section class="' . $className . '" style="background: black">
        
        </section>
    ';
