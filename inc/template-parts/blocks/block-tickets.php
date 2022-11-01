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
                        <p class="bdac-colour-white mb-4 mb-md-3">
                            Annual tickets available allowing you to visit as many times as you like, please ask in the shop
                        </p>
                        <p class="bdac-colour-white mb-4 mb-md-3">
                            25% reduction for pre-organised groups of 10 or more see the group visit page for more details
                        </p>
                    </div>
                </div>
            </div>
            <div class="bdac-tickets-table-wrapper col col-12 col-md-8 p-3 p-lg-5 order-1 order-lg-2">
                <?php
                echo sprintf( $tickets_title,
                    'd-block d-md-none',
                    'Ticket Prices'
                );
                ?>
                <table width="100%">
                    <thead class="bdac-tickets-table-head bdac-bg-blue">
                        <th class="bdac-colour-white px-3 py-2" width="50%">Ticket Type</th>
                        <th class="bdac-colour-white px-3 py-2">Summer Prices</th>
                        <th class="bdac-colour-white px-3 py-2">Winter Prices</th>
                        
                    </thead>
                    <tbody>
                        <tr class="bdac-tickets-table-entry">
                            <td class="px-3 py-2" width="50%"><h6 style="display: inline">Adult</h6> <small>(Under 65)</small></td>
                            <td class="px-3 py-2">body row 1</td>
                            <td class="px-3 py-2">body row 1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
                        
        </div>
    </div>
</section>
