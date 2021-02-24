</main>
<footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3 footer-section">
                    <div class="logo-container d-flex justify-content-center">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bdacLogo(150); ?>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 footer-section bdac-colour-white">
                    <?php dynamic_sidebar( 'footer_description' ); ?>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 footer-section bdac-colour-white">
                    <?php 
                        $today = date('Y M jS');
                        $args = array(  
                            'post_type'         => 'opening_hours',
                            'post_status'       => 'publish',
                            'posts_per_page'    => 2,
                            'meta_key'          => 'season_to',
                            'orderby'           => 'meta_value',
                            'order'             => 'ASC',
                            'meta_query'        => array(
                                array(
                                    'key'       => 'season_to',
                                    'compare'   => '>=',
                                    'value'     => $today
                                )
                            )
                        );

                        $seasons = new WP_Query( $args ); 
                            
                        while ( $seasons->have_posts() ) : $seasons->the_post(); 

                            $seasonTitle    = get_the_title();
                            $seasonStart    = get_field( 'season_from' );
                            $seasonEnd      = get_field( 'season_to' );
                            $dateEnd        = get_field( 'season_to' );
                            $dayOpen        = get_field( 'season_opening' );
                            $dayClose       = get_field( 'season_closing' );
                            $dayEntry       = get_field( 'season_entry' );
                            $weekStart      = get_field( 'season_start' );
                            $weekEnd        = get_field( 'season_end' );

                            $h6             = '<h6>';
                            $h6End          = '</h6>';
                            $p              = '<p>';
                            $pEnd           = '</p>';
                            $br             = '<br>';

                            echo 
                                $h6 . $seasonTitle . $h6End 
                                . $p . $seasonStart . ' - ' . $seasonEnd . $br . 
                                $weekStart . ' to ' . $weekEnd . ', ' . $dayOpen . ' to ' . $dayClose . $br .
                                'Last entry ' . $dayEntry . $pEnd . $br;
                        endwhile;

                        wp_reset_postdata(); 
                    ?>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 footer-section bdac-colour-white">
                    <?php dynamic_sidebar( 'footer_menu' ); ?>
                </div>
            </div>
        </div>
    </footer>
    
    
    <?php wp_footer(); ?>

  </body>
</html>