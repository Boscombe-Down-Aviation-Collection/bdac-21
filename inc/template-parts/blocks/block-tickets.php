<?php
$className = 'bdac-tickets';
if ( !empty( $block['className'] ) ) {
    $className .= ' ' . $block[ 'className' ] ;
}
if ( !empty( $block['align'] ) ) {
    $className .= 'align' . $block[ 'align' ] ;
}
$tickets_title          = '<h2 class="bdac-tickets-title %1$s p-3 p-md-5">%2$s</h2>';
$tickets_header         = get_field( 'tickets_header' );
$tickets_description    = get_field( 'tickets_description' );
$tickets_table          = get_field( 'tickets_table' );
?>
<section class="bdac-tickets">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-lg-4 p-0 order-2 order-lg-1">
                <?php
                echo sprintf( $tickets_title,
                    'd-none d-lg-block',
                    'Ticket Prices'
                );
                ?>
                <div class="bdac-tickets-content px-3 py-5 p-lg-5">
                    <div class="bdac-tickets-content-title">
                        <h3 class="bdac-colour-white"></h3>
                    </div>
                    <div class="bdac-tickets-content-text">
                        <?php 
                        if( have_rows('tickets_content') ):
                            while( have_rows('tickets_content') ) : the_row();
                                $tickets_head = get_sub_field('tickets_head');
                                $tickets_text = get_sub_field('tickets_text');
                                if ( $tickets_head ) {
                                    echo sprintf( 
                                        '<h6 class="bdac-colour-white">%1$s</h6>',
                                        esc_html( $tickets_head )
                                    );
                                };
                                if ( $tickets_text ) {
                                    echo sprintf( 
                                        '<p class="bdac-colour-white mb-4 mb-lg-3">%1$s</p>',
                                        esc_html( $tickets_text )
                                    );   
                                };
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="bdac-tickets-table-wrapper col col-12 col-lg-8 p-3 p-lg-5 order-1 order-lg-2">
                <?php
                echo sprintf( $tickets_title,
                    'd-block d-md-none',
                    'Ticket Prices'
                );
                get_template_part( 'inc/template-parts/blocks/block-tickets', 'row' );
                ?>
            </div>      
        </div>
    </div>
</section>
