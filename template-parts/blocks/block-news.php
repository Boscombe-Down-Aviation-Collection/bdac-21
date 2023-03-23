<?php
$className = 'bdac-news';
if ( !empty( $block['className'] ) ) {
    $className .= ' ' . $block[ 'className' ] ;
}
if ( !empty( $block['align'] ) ) {
    $className .= 'align' . $block[ 'align' ] ;
}
?>
    
<section class="<?php echo $className; ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-12 col-md-4 p-0 <?php echo $className; ?>-content">
                <h2 class="<?php echo $className; ?>-title bdac-bg-white p-3 p-md-5">Recent News</h2>
                    
                <?php
                $bdac_news = new WP_Query( array(
                    'posts_per_page' => 1
                ) );

                while( $bdac_news->have_posts() ) {
                    $bdac_news->the_post();

                    $news_title     = get_the_title();
                    $news_excerpt   = wp_trim_words( get_the_excerpt(), 20 );
                    $news_link      = get_the_permalink();
                    $news_thumb     = get_the_post_thumbnail_url();

                ?>
                    <div class="<?php echo $className; ?>-article bdac-bg-blue px-3 py-5 p-md-5">
                        <?php  
                            echo sprintf(
                                '<div class="-article-title">
                                    <h3 class="bdac-colour-white">%2$s</h3>
                                </div>',
                                $className,
                                wp_kses_post( $news_title )
                            );
                        ?>
                        <div class="<?php echo $className; ?>-article-content">
                            
                            <?php 
                            echo sprintf(
                                '<p class="bdac-colour-white mb-4 mb-md-3">%1$s</p>
                                <a href="%2$s">
                                    <button class="btn-bdac">
                                        Read Full Article
                                    </button>
                                </a>',
                                esc_attr( $news_excerpt ),
                                $news_link
                            );
                            ?>
                            
                        </div>
                    </div>
                </div>
            <?php 
                echo sprintf(
                    '<div class="%1$s-image col col-12 col-md-6 p-0">
                        <img src="%2$s" class="w-100 h-100" />
                    </div>',
                    $className,
                    esc_html( $news_thumb )
                );
            }
            ?>
        </div>
        <div class="row pt-5 justify-content-center">
            <?php 
            echo sprintf(
                '<a href="%1$s">
                    <button class="btn-bdac-alt">
                        View All Articles
                    </button>
                </a>',
                esc_url( get_permalink( get_option( 'page_for_posts' ) ) )
            );
            ?>
        </div>
    </div>
</section>
