<?php

    $tickets_header         = get_field( 'tickets_header' );
    $tickets_description    = get_field( 'tickets_description' );
    $tickets_table          = get_field( 'tickets_table' );

    echo '
        <section class="block-tickets">

            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h2 class="block-tickets-title text-left">' . $tickets_header . '</h2>
                        <p class="lead block-tickets-description text-left">' . $tickets_description . '</p>
                    </div>

                </div>
                
                <div class="row justify-content-center">

                    <div class="col-12 col-md-8 my-3 my-md-5">
                    
                        <div class="row block-tickets-table">
                        
                            <div class="col-4 block-tickets-table-header p-3">
                                <h6>Ticket Type</h6>
                            </div>
                            <div class="col-4 block-tickets-table-header p-3">
                                <h6>Standard</h6>
                            </div>
                            <div class="col-4 block-tickets-table-header p-3">
                                <h6>Gift Aid</h6>
                            </div>
                        ';

                            if( have_rows( 'tickets_table' ) ):
                                while ( have_rows( 'tickets_table' ) ) : the_row();

                                    $ticket_type        = get_sub_field( 'ticket_table_type' );
                                    $ticket_standard    = get_sub_field( 'ticket_table_standard' );
                                    $ticket_giftaid     = get_sub_field( 'ticket_table_giftaid' );

                                    echo ( 
                                        $ticket_type && $ticket_standard && $ticket_giftaid ?
                                        '<div class="col-4 block-tickets-table-row p-3">
                                            <strong>' . $ticket_type . '</strong>
                                        </div>
                                        <div class="col-4 block-tickets-table-row p-3">
                                            ' . ( $ticket_standard !== 'Free' ? '£' : '' ) . $ticket_standard . '
                                        </div>
                                        <div class="col-4 block-tickets-table-row p-3">
                                            ' . ( $ticket_giftaid !== 'Free' ? '£' : '' ) . $ticket_giftaid . '
                                        </div>' : 
                                        ''
                                    );
                           
                                endwhile;
                            endif;
                            
                    echo '
                        </div>
                    </div>
                </div>
            </div>
        </section>
    ';
