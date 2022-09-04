<?php 
    $bdacLogo   = get_template_directory_uri() . '/img/bdac-logo.svg';
    $faqHeader  = get_field( 'faq_header' );
    $faqs       = get_field( 'faq_repeater' );
?>
<section class="bdac-faq py-5">
    <div class="container">
        <div class="bdac-faq-title mb-3">
            <h2><?php echo ($faqHeader ? $faqHeader : 'FAQs' ); ?></h2>
        </div>

        <div class="accordion" id="bdacAccordion">
            <?php 
                $faq = 1;
                if ( have_rows( 'faq_repeater' ) ) : 
                    while ( have_rows( 'faq_repeater' ) ) : 
                        the_row();

                        $faqTitle   = get_sub_field( 'faq_title' );
                        $faqContent = get_sub_field( 'faq_content' );
                        $faqTarget  = preg_replace('/\s+/', '', $faqTitle);
        
                        echo '
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#' . $faqTarget . '" aria-expanded="false" aria-controls="' . $faqTarget . '">
                                ' . $faqTitle . '?
                                </button>
                                </h2>
                                <div id="' . $faqTarget . '" class="accordion-collapse collapse" aria-labelledby="headingThree" 
                                data-bs-parent="#bdacAccordion">
                                    <div class="accordion-body">
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