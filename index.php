<?php
    get_header();
?>

<section class="page-header d-flex align-items-end" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>); background-size: cover; height: 25vh; position: relative; background-position-y: 40%; padding: 0;">
    <div class="page-header-overlay" style="background: #061f5a; position: absolute; top: 0; bottom: 0; left: 0; right: 0; opacity: 0.8;"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="page-banner-title bdac-colour-white"><?php single_post_title(); ?></h1>
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
    
<section class="my-3">
    <div class="container">
        <div class="row">
            <div id="content my-3" class="col-md-8">

                <div class="row bdac-post">
                    <!-- <div class="col-12"> -->
                            <?php 
                                echo bdac_blog();
                            ?>
                        <!-- </div> -->
                    </div>       
            </div>
                    
            <aside id="side-bar" class="side-bar col-md-4">
                <div class="side-bar-item">
                    <?php dynamic_sidebar( 'index_sidebar' ); ?>
                </div>
            </aside>
            
        </div>
    </div>
</section>
<?php
    get_footer();
?>
