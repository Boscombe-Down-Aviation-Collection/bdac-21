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
            <div class="col col-12 col-md-4 p-0 order-2 order-lg-1">
                <?php
                echo sprintf( $tickets_title,
                    'd-none d-md-block',
                    'Ticket Prices'
                );
                ?>
                <div class="bdac-tickets-content px-3 py-5 p-md-5">
                    <div class="bdac-tickets-content-title">
                        <h3 class="bdac-colour-white"></h3>
                    </div>
                    <div class="bdac-tickets-content-text">
                        <?php 
                        if( have_rows('tickets_content') ):
                            while( have_rows('tickets_content') ) : the_row();
                                $tickets_text = get_sub_field('tickets_text');
                                    echo sprintf( '<p class="bdac-colour-white mb-4 mb-md-3">%1$s</p>',
                                    esc_html( $tickets_text )
                                );
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="bdac-tickets-table-wrapper col col-12 col-md-8 p-3 p-lg-5 order-1 order-lg-2">
                <?php
                echo sprintf( $tickets_title,
                    'd-block d-md-none',
                    'Ticket Prices'
                );
                if( have_rows('tickets_table') ): ?>
                    <table width="100%">
                        <thead class="bdac-tickets-table-head bdac-bg-blue">
                            <th class="bdac-colour-white px-3 py-2">Ticket Type</th>
                            <th class="bdac-colour-white px-3 py-2">Summer Prices</th>
                            <th class="bdac-colour-white px-3 py-2">Winter Prices</th>
                        </thead>
                        <tbody>
                        <?php 
                        while( have_rows('tickets_table') ) : the_row();
                            $ticket_type        = get_sub_field('ticket_type');
                            $ticket_type_cond   = get_sub_field('ticket_type_cond');
                            $ticket_summer      = get_sub_field('ticket_summer');
                            $ticket_summer_ga   = get_sub_field('ticket_summer_ga');
                            $ticket_winter      = get_sub_field('ticket_winter');
                            $ticket_winter_ga   = get_sub_field('ticket_winter_ga');
                            echo '
                                <tr class="bdac-tickets-table-entry">
                                    <td class="px-3 py-2" width="50%">
                                        <h6 style="display: inline">' . esc_html( $ticket_type) . '</h6><br><small>(' . wp_kses_post( $ticket_type_cond ) . ')</small>
                                    </td>
                                    <td class="px-3 py-2">
                                        <strong>£' . esc_html( $ticket_summer ) . '</strong><br><small>( £' . esc_html( $ticket_summer_ga ) . ' w/ Gift Aid )</small>
                                    </td>
                                    <td class="px-3 py-2">
                                        <strong>£' . esc_html( $ticket_winter ) . '</strong><br><small>( £' . esc_html( $ticket_winter_ga ) . ' w/ Gift Aid )</small>
                                    </td>
                                </tr>';
                        endwhile;
                        ?>
                        </tbody>
                    </table>
                <?php
                endif;
                ?>
            </div>      
        </div>
    </div>
</section>
