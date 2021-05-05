<?php 

    get_header();

    while( have_posts() ) :
        the_post();    
            the_content();                    
    endwhile;

    get_template_part( 'inc/template-parts/blocks/map' );

    get_footer(); 
    