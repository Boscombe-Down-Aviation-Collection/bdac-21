<?php

    $className = 'bdac-news';
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
                    <div class="col col-12 col-md-4 p-0 ' . $className . '-content">
                        <h2 class="' . $className . '-title bdac-bg-white p-3 p-md-5">Recent News</h2>';

                            $bdac_news = new WP_Query( array(
                                'posts_per_page' => 1
                            ) );
            
                            while( $bdac_news->have_posts() ) {
                                $bdac_news->the_post();

                                $news_title     = get_the_title();
                                $news_excerpt   = wp_trim_words( get_the_excerpt(), 20 );
                                $news_link      = get_the_permalink();
                                $news_thumb     = get_the_post_thumbnail_url();
            
                                echo '
                                <div class="' . $className . '-article bdac-bg-blue px-3 py-5 p-md-5">
                                    <div class="' . $className . '-article-title">
                                        <h3 class="bdac-colour-white">' . $news_title . '</h3>
                                    </div>
                                    <div class="' . $className . '-article-content">
                                        <p class="bdac-colour-white mb-4 mb-md-3">
                                            ' . $news_excerpt . '
                                        </p>
                                        <a href="' . $news_link . '">
                                        <button class="btn-bdac">
                                            Read Full Article
                                        </button>
                                    </a>
                                    </div>
                                </div>
                                </div>
                                <div class="' . $className . '-image col col-12 col-md-8 p-0">
                                     <img src="' . $news_thumb . '" class="w-100 h-100" />
                                </div>
                                ';
                            }

                echo '
                    
                </div>
                <div class="row pt-5 justify-content-center">
                    <a href="/news">
                        <button class="btn-bdac-alt">
                            View All Articles 
                        </button>
                    </a>
                </div>
            </div>
        </section>
    ';

    
        
    
?>
