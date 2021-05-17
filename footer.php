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
                        echo bdac_opening_query( 2, 6 );
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