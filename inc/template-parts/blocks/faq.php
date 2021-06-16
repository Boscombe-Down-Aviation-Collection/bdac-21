<?php 
    $bdacLogo   = get_template_directory_uri() . '/img/bdac-logo.svg';
    $faqHeader  = get_field( 'faq_header' );
    $faqs       = get_field( 'faq_repeater' );
?>
<section class="bdac-faq py-5">
    <div class="container">
        <div class="bdac-faq-title mb-3 mb-lg-5 pb-2">
            <h3><?php echo ($faqHeader ? $faqHeader : 'FAQs' ); ?></h3>
        </div>
        <div class="accordion" id="accordionExample">
            <?php 
                $faq = 1;
                if ( have_rows( 'faq_repeater' ) ) : 
                    while ( have_rows( 'faq_repeater' ) ) : 
                        the_row();

                        $faqTitle   = get_sub_field( 'faq_title' );
                        $faqContent = get_sub_field( 'faq_content' );
                        $faqTarget  = preg_replace('/\s+/', '', $faqTitle);
            
                        echo '
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <button class="btn btn-card btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#' . $faqTarget . '" aria-expanded="true" aria-controls="collapseOne" title="' . $faqTitle . '">
                                            ' . $faqTitle . '? <i class="fas fa-chevron-right" aria-hidden="true"></i>' . 
                                    '</button>
                                </div>
                                <div id="' . $faqTarget . '" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        ' . $faqContent . ' 
                                    </div>
                                </div>
                            </div>
                        ';
                        $faq++;
                    endwhile;
                    wp_reset_postdata(); 
                endif; 
            ?>

        </div>
    </div>
</section>