<?php  

    $className = 'bdac-intro';
    if ( !empty( $block['className'] ) ) {
        $className .= ' ' . $block[ 'className' ] ;
    }
    if ( !empty( $block['align'] ) ) {
        $className .= 'align' . $block[ 'align' ] ;
    }

    echo '
        <section class="' . $className . '">
            <div class="container">
                <div class="row">
                    <div class="col col-12 col-md-5 me-auto">
                        
                        <h2 class="' . $className . '-title mb-3" style="font-size: 2.25rem; text-transform: uppercase; font-weight: 600;">Who are we?</h2>
                        <p class="' . $className . '-content"><strong class="bdac-txt-blue d-block mb-3">BDAC are based at Old Sarum airfield, the Collection is housed undercover within two World War One aircraft hangars. We have a mixture of jet and propeller driven aircraft, helicopters and engines together with the largest number of visitor-accessible cockpits in the United Kingdom.</strong>

                        <span>Opened to the public at Old Sarum Airfield in 2012 our exhibits are themed around military test and prototype aircraft that have served in the local Wessex area, particularly at the nearby Boscombe Down Airfield site.</span></p>  

                        <a href="#">
                            <button class="btn btn-bdac">
                                Find Out More
                            </button>
                        </a>

                    </div>
                    <div class="col col-12 col-md-6">
                        <img class="' . $className . '-image" src="http://bdac:8888/wp-content/uploads/harrier-roundel-header.jpg" />
                    </div>
                </div>
            </div>
        </section>
    ';
    