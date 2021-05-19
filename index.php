<?php
    get_header();
?>

    <section class="page-header">
		<div class="container">
			<div class="row">
				<div class="col p-3">
					<h1 class="page-banner-title"><?php single_post_title(); ?></h1>
					<div class="row justify-content-sm-start justify-content-md-between page-banner-subtitle m-0">
						<p class="lead bdac-colour-white mb-3 mb-lg-0">Keep up with the latest news and blog posts from the collection</p>
						<?php 
							if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb( '<p id="breadcrumbs" class="bdac-bg-white ml-md-auto mb-0 py-3 px-md-4" style="display: inline-block;">','</p>' );
							};
						?>
					</div>
				</div>
			</div>
        </div>
    </section>
    
    <div class="container px-0 px-md-3 py-md-5">
        <div class="row">
            <div id="content" class="col-md-8">
                
                <?php 
                    while( have_posts() ) :
                        the_post();
                        $postTitle      = get_the_title();
                        $postLink       = get_permalink();
                        $postContent    = wp_trim_words(get_the_excerpt(), 30);
                        $postAuthor     = get_the_author_posts_link();
                        $postCategory   = get_the_category_list( ', ' );
                        $postTime       = get_the_time('jS F Y');
                        $postThumb      = get_the_post_thumbnail_url();
                        $postHoldImg    = get_template_directory_uri() . '/inc/img/blog-post_temp.jpg';
                        
                        echo '
                            <div class="row bdac-post">
                                <div class="col-md-6">';
                            echo bdac_card( ( $postThumb ? $postThumb : $postHoldImg ), $postTitle, $postLink, $postContent, $postAuthor, $postCategory, $postAuthorLink );
                            echo '
                                </div>
                                <div class="col-md-6 d-flex flex-column p-3 p-md-0">
                                    <h4 class="bdac-post-title"><a href="' . $postLink .'" title="Posts by BDAC Admin" rel="author">' . $postTitle . '</a></h4>
                                    <p class="bdac-post-content">' . $postContent . '</p>
                                    <a href="'. $postLink . '" class="bdac-post-link mt-auto">
                                        Read More <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <hr class="my-md-3 my-lg-4" />
                        '; 
                    endwhile;
                    wp_reset_postdata();
                ?>
                            
            </div>

            <aside id="side-bar" class="side-bar col-md-4">
                <div class="side-bar-item">
                    <?php dynamic_sidebar( 'index_sidebar' ); ?>
                </div>
            </aside>
            
        </div>
    </div>
<?php
    get_footer();
?>
