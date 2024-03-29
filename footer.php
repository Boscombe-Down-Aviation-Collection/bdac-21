
</main>

<footer id="footer" class="footer">
    <section class="pre-footer">
        <a  href="https://www.paypal.com/donate?token=KgqvS-KTyadrJwSlzBJbyOgiVPF8CwvDyIu7SBNdI4KjVWyRcVtReASFDckoaxhXuY0F7H2KBGon8Te_" class="w-100 h-100">
            <button class="btn-bdac pre-footer-btn">
                Like what we do? Consider donating
            </button>
        </a>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3 footer-section">
                <div class="logo-container d-flex justify-content-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bdacTheme::svg( 'logo' ); ?>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 footer-section bdac-colour-white">
                <h6>Boscombe Down Aviation Collection</h6>
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
        <div class="row footer-associate d-flex flex-row justify-content-center align-items-center">
            <div id="TA_cdsratingsonlynarrow587" class="TA_cdsratingsonlynarrow footer-associate-item">
                <ul id="aRyf7pLgfs" class="TA_links ry6Z9Dl">
                    <li id="pKDcJk3f" class="ik8vvuK1Vi">
                        <a target="_blank" href="https://www.tripadvisor.co.uk/Attraction_Review-g186414-d3310055-Reviews-Boscombe_Down_Aviation_Collection-Salisbury_Wiltshire_England.html">
                            <img src="https://www.tripadvisor.co.uk/img/cdsi/img2/branding/v2/Tripadvisor_lockup_horizontal_secondary_registered-18034-2.svg" alt="TripAdvisor"/>
                        </a>
                    </li>
                 </ul>
            </div>
            <script async src="https://www.jscache.com/wejs?wtype=cdsratingsonlynarrow&amp;uniq=587&amp;locationId=3310055&amp;lang=en_UK&amp;border=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
            <a href="https://www.heritagefund.org.uk/" target="_blank"  class="footer-associate-item">
                <img src="<?php bloginfo('template_url'); ?>/inc/img/heritage-lottery-fund.webp" alt="Heritage Lottery Fund Logo">
            </a>
            <a href="https://aviationheritageuk.org/" target="_blank"  class="footer-associate-item">
                <img src="<?php bloginfo('template_url'); ?>/inc/img/AviationHeritageLogo_500px.png" alt="Aviation Heritage Logo">
            </a>
        </div>
    </div>
    </footer>
    
    <?php wp_footer(); ?>

  </body>
</html>