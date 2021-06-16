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

                <div class="row bdac-post">
                    <div class="col-12 ">
                            <?php 
                                echo bdac_blog();
                            ?>
                        </div>
                    </div>       
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
