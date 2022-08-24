<?php
    
    echo '
        <section class="bdac-news">
            <div class="container">
                <div class="row">
                    <div class="col col-12 col-md-4 p-0 bdac-news-content">
                        <h2 class="bdac-news-title bdac-bg-white p-3 p-md-5">Recent News</h2>';

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
                                <div class="bdac-news-article bdac-bg-blue p-3 p-md-5">
                                    <div class="bdac-news-article-title">
                                        <h3 class="bdac-colour-white">' . $news_title . '</h3>
                                    </div>
                                    <div class="bdac-news-article-content">
                                        <p class="bdac-colour-white">
                                            ' . $news_excerpt . '
                                        </p>
                                        <a href="' . $news_link . '">
                                        <button class="btn-bdac-alt">
                                            Read Full Article
                                        </button>
                                    </a>
                                    </div>
                                </div>
                                </div>
                                <div class="bdac-news-image col col-12 col-md-8 p-0">
                                     <img src="' . $news_thumb . '" class="w-100 h-100" />
                                </div>
                                ';
                            }

                echo '
                    
                </div>
            </div>
        </section>
    ';

    
        
    
?>
