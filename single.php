<?php
    $pageTitle      = get_the_title();
    $bannerSubTitle = get_field('page_subtitle');
    $bannerBg       = get_field('page_bg_image');
    $pageHeaderImg  = get_the_post_thumbnail_url();

    $divClose       = '</div>';
    
    get_header();
    wp_reset_postdata(); 


    echo '
        <article>
            <section class="single-post-image">
                <div class="container">
                    <div class="row col-12 col-md-10 mx-auto">
                        <img src="' . $pageHeaderImg . '" style="width: 100%; border-radius: 0.625rem">
                    </div>
                </div>
            </section>
    
            <section class="single-post-content" style="">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-8 mx-auto">
                            <h1 class="single-post-content-title">' 
                                . $pageTitle . '
                            </h1>';

                                while( have_posts() ) : the_post();    
                                    the_content();                    
                                endwhile;

                    echo 
                        $divClose . 
                    $divClose . 
                $divClose . '
            </section>
        </article>
    ';

    get_footer(); 
    
?>