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
                </div>
                
                <div class="row">

                    <div class="col col-12 col-md-4">
                        <div class="bdac-card text-left" style="background: url(http://bdac:8888/wp-content/uploads/lynx-ah7-retirement_xz651_1.jpeg); background-size: cover; background-position-x: center;">
                            <div class="bdac-card-content">
                                <h3 class="bdac-card-content-title mb-3">
                                    <a href="http://bdac:8888/5th-test-post/" title="Posts by BDAC Admin" rel="author">Empire Test Pilot School – Rotary Wing</a>
                                </h3>
                                <small class="bdac-card-content-meta">By <a href=""></a><a href="http://bdac:8888/author/bdac_dm1n/" title="Posts by BDAC Admin" rel="author">BDAC Admin</a> in <a href="http://bdac:8888/category/test-category/" rel="category tag">Test Category</a></small>
                                <p class="bdac-card-content-body mt-3">Nunc augue sapien, imperdiet eu ultrices vitae, malesuada aliquet augue. Morbi vel velit in orci sollicitudin bibendum. Praesent sed massa sodales, pulvinar magna et, pharetra arcu. Donec porta porttitor pretium.…</p>
                                <a href="http://bdac:8888/5th-test-post/" class="bdac-card-content-link mt-auto">
                                    Read More <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 col-md-4">
                        <div class="bdac-card text-left" style="background: url(http://bdac:8888/wp-content/uploads/raf_mountain_rescue-hero.jpeg); background-size: cover; background-position-x: center;">
                            <div class="bdac-card-content">
                                <h3 class="bdac-card-content-title mb-3">
                                    <a href="http://bdac:8888/5th-test-post/" title="Posts by BDAC Admin" rel="author">	
                                    Mountain Rescue</a>
                                </h3>
                                <small class="bdac-card-content-meta">By <a href=""></a><a href="http://bdac:8888/author/bdac_dm1n/" title="Posts by BDAC Admin" rel="author">BDAC Admin</a> in <a href="http://bdac:8888/category/test-category/" rel="category tag">Test Category</a></small>
                                <p class="bdac-card-content-body mt-3">Nunc augue sapien, imperdiet eu ultrices vitae, malesuada aliquet augue. Morbi vel velit in orci sollicitudin bibendum. Praesent sed massa sodales, pulvinar magna et, pharetra arcu. Donec porta porttitor pretium.…</p>
                                <a href="http://bdac:8888/5th-test-post/" class="bdac-card-content-link mt-auto">
                                    Read More <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 col-md-4">
                        <div class="bdac-card text-left" style="background: url(http://bdac:8888/wp-content/uploads/raf-phantom-opt.jpg); background-size: cover; background-position-x: center;">
                            <div class="bdac-card-content">
                                <h3 class="bdac-card-content-title mb-3">
                                    <a href="http://bdac:8888/5th-test-post/" title="Posts by BDAC Admin" rel="author">I Learned About Flying From That</a>
                                </h3>
                                <small class="bdac-card-content-meta">By <a href=""></a><a href="http://bdac:8888/author/bdac_dm1n/" title="Posts by BDAC Admin" rel="author">BDAC Admin</a> in <a href="http://bdac:8888/category/test-category/" rel="category tag">Test Category</a></small>
                                <p class="bdac-card-content-body mt-3">Nunc augue sapien, imperdiet eu ultrices vitae, malesuada aliquet augue. Morbi vel velit in orci sollicitudin bibendum. Praesent sed massa sodales, pulvinar magna et, pharetra arcu. Donec porta porttitor pretium.…</p>
                                <a href="http://bdac:8888/5th-test-post/" class="bdac-card-content-link mt-auto">
                                    Read More <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <a href="#">
                        <button class="btn-bdac-alt">
                            All Our Events
                        </button>
                    </a>
                </div>
                    
                </div>
            </div>
        </section>
    ';

?>

<?php wp_reset_postdata() ?>
