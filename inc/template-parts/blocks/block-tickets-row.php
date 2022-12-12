<?php if( have_rows('tickets_table') ): ?>
<table width="100%">
    <thead class="bdac-tickets-table-head">
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
                    <h6 style="display: inline">' . esc_html( $ticket_type) . '</h6><br>
                    <small>(' . wp_kses_post( $ticket_type_cond ) . ')</small>
                </td>
                <td class="px-3 py-2">
                    <strong>£' . esc_html( $ticket_summer ) . '</strong><br><small>( £' . esc_html( $ticket_summer_ga ) . ' w/ Gift Aid )</small>
                </td>
                <td class="px-3 py-2">
                    <strong>£' . esc_html( $ticket_winter ) . '</strong><br><small>( £' . esc_html( $ticket_winter_ga ) . ' w/ Gift Aid )</small>
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