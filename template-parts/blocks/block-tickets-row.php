<?php 
if( have_rows('tickets_table') ): 
    $tickets_type   = get_field( 'tickets_type' );
    $tickets_summer = get_field( 'tickets_summer' );
    $tickets_winter = get_field( 'tickets_winter' );
    $tickets_head   = '<th class="bdac-colour-white px-3 py-2">%1$s</th>'
?>
<table width="100%">
    <thead class="bdac-tickets-table-head">
        <?php 
        echo sprintf(
            $tickets_head,
            !$tickets_type ? 'Ticket Type' : $tickets_type
        );
        echo sprintf(
            $tickets_head,
            !$tickets_summer ? 'Winter Prices' : $tickets_summer
        );
        echo sprintf(
            $tickets_head,
            !$tickets_winter ? 'Summer Prices' : $tickets_winter
        );
        ?>
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
                    <h6 style="display: inline">' . esc_html( $ticket_type) . '</h6><br>
                    <small>(' . wp_kses_post( $ticket_type_cond ) . ')</small>
                </td>
                <td class="px-3 py-2">
                    <strong>£' . esc_html( $ticket_winter ) . '</strong><br><small>( £' . esc_html( $ticket_winter_ga ) . ' w/ Gift Aid )</small>
                </td>
                <td class="px-3 py-2">
                    <strong>£' . esc_html( $ticket_summer ) . '</strong><br><small>( £' . esc_html( $ticket_summer_ga ) . ' w/ Gift Aid )</small>
                </td>
            </tr>
            ';
        endwhile;
        ?>
    </tbody>
</table>
<?php
endif;
?>