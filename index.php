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
                <div class="container">
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
                                    <div class="col-md-7">
                                        <div class="card bdac-card-img" style="background: url(' . ( $postThumb ? $postThumb : $postHoldImg ) . '); background-size: cover;">
                                            <div class="bdac-card-img-overlay d-flex flex-column">
                                                <div class="col-5 d-flex mt-auto p-0">
                                                    <a class="bdac-card-img-overlay-button text-center mt-auto" href="' . $postLink . '">Read More <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-7 bdac-card-meta">
                                                <div class="bdac-card-meta-title">
                                                    <small>Posted by <a href="' . $postAuthorLink . '">' . $postAuthor . '</a></small><br>
                                                    <small>Categories: ' . $postCategory . '</small>
                                                </div>
                                                <div class="bdac-card-meta-info">
                                                    <p>' . $postTime . '</p>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 d-flex flex-column p-3 p-md-0">
                                        <h4 class="bdac-post-title"><a href="' . $postLink .'" title="Posts by BDAC Admin" rel="author">' . $postTitle . '</a></h4>
                                        <p class="bdac-post-content">' . $postContent . '</p>
                                        <a href="'. $postLink . '" class="bdac-post-link mt-auto">Read More <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            '; 
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <aside id="side-bar" class="side-bar col-md-4">
                <div class="side-bar-item p-3">
                    <?php dynamic_sidebar( 'index_sidebar' ); ?>
                </div>
            </aside>
        </div>
    </div>
<?php
    get_footer();
?>
