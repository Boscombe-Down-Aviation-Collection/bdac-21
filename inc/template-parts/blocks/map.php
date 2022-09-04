<?php 

    // $className = 'map-section';
    // if ( !empty( $block['className'] ) ) {
    //     $className .= ' ' . $block[ 'className' ] ;
    // }
    // if ( !empty( $block['align'] ) ) {
    //     $className .= 'align' . $block[ 'align' ] ;
    // }

    // $mapTitle       = get_field( 'map_title' );
    // $mapListTitle   = get_field( 'map_list_title' );
    // $mapDirections  = get_field( 'map_list_items' );

    // echo '
    //     <section class="' .  esc_attr( $className ) . '">

    //         <div class="container">
    //             <div class="bdac-faq-title mb-3 mb-lg-5 pb-2">
    //                 <h2 class="' . $className . '-title">' . $mapTitle . '</h2>
    //             </div>
    //             <div class="row">
    //                 <div class="col-md-6 col-lg-7">
    //                     <div class="' . $className . '-card bdac-shadow">
    //                         <iframe class="' . $className . '-card-location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2505.459224646109!2d-1.7876617840389626!3d51.09998684822988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4873eeb444407bfb%3A0x87d033bc6c8303c7!2sBoscombe%20Down%20Aviation%20Collection!5e0!3m2!1sen!2suk!4v1620208587674!5m2!1sen!2suk" allowfullscreen="" loading="lazy"></iframe>
    //                     </div>
    //                 </div>
    //                 <div class="col-md-6 col-lg-5">
    //                 <div class="' . $className . '-content">' .
    //                         '<h4>' . $mapListTitle . '</h4>
    //                         <ul>
    //                             <li>At the traffic lights turn onto Lancaster Road - Sarum Business Park</li>
    //                             <li>At the end of the road turn left</li>
    //                             <li>Take the first right (between the hangars), Hangar 1 South is on your right at the far end.</li>
    //                             <li>At the end of the hangars turn right again</li>
    //                             <li>Our public car park is on left</li>
    //                             ';
    //                             if( have_rows($mapDirections, $post->ID) ):
    //                                 while( have_rows($mapDirections, $post->ID) ) : the_row();

    //                                     echo ( get_sub_field( 'map_list_item' ) ? 'data' : 'no data');
                                
    //                                     $mapDirectionItem = get_sub_field('map_list_item');
    //                                     echo '<li>' . $mapDirectionItem . '</li>';
                                
    //                                 endwhile;
    //                             endif;
    //                             wp_reset_postdata();
    //                         echo '</ul>';
    //                         echo bdac_opening_query(1,4);
    //                 echo '
    //                     </div>
    //                 </div>
    //             </div>
    //         </div>
    //     </section>
    // ';

    $className = 'map-section';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

?>

<section class="' . $className . '">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-5 me-auto" style="display: flex; justify-content: center; flex-direction: column;">
                
                <h2 class="' . $className . '-title mb-3" style="font-size: 2.25rem; text-transform: uppercase; font-weight: 600;">how to find us</h2>
                <!-- <p class="' . $className . '-content"><strong class="bdac-txt-blue d-block mb-3">BDAC are based at Old Sarum airfield, the Collection is housed undercover within two World War One aircraft hangars. We have a mixture of jet and propeller driven aircraft, helicopters and engines together with the largest number of visitor-accessible cockpits in the United Kingdom.</strong> -->
                <ul style="padding-left: 1rem">
                    <li>At the traffic lights turn onto Lancaster Road - Sarum Business Park</li>
                    <li>At the end of the road turn left</li>
                    <li>Take the first right (between the hangars), Hangar 1 South is on your right at the far end.</li>
                    <li>At the end of the hangars turn right again</li>
                    <li>Our public car park is on left</li>
                </ul>

                <?php 
                    echo bdac_opening_query(1,4); 
                    wp_reset_postdata();
                ?>  

                <a href="#">
                    <button class="btn btn-bdac">
                        Opening Times
                    </button>
                </a>

            </div>
            <div class="col col-12 col-md-6" style="height: 450px">
                <iframe class="' . $className . '-card-location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2505.459224646109!2d-1.7876617840389626!3d51.09998684822988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4873eeb444407bfb%3A0x87d033bc6c8303c7!2sBoscombe%20Down%20Aviation%20Collection!5e0!3m2!1sen!2suk!4v1620208587674!5m2!1sen!2suk" allowfullscreen="" loading="lazy" style="height: 100%; width: 50vw; border-radius: 0.625rem 0 0 0.625rem; box-shadow: 0 0 1.25rem rgb(7 31 91 / 25%);"></iframe>
            </div>
        </div>
    </div>
</section>

<?php wp_reset_postdata() ?>


