<?php
    $pageTitle      = get_the_title();
    $bannerSubTitle = get_field('page_subtitle');
    $bannerBg       = get_field('page_bg_image');
    $pageHeaderImg  = get_template_directory_uri() . '/img/BDAC-south_hanger_hero.jpg';

    $divClose       = '</div>';
    
    get_header();
    wp_reset_postdata(); 

?>

    <section class="page-header bg-black" style="background-image: url(' <?php echo ( $bannerBg ? $bannerBg['url'] : $pageHeaderImg); ?> ');">

		<div class="container">
			<div class="row" style="">
				<div class="col p-3">
					<h1 class="page-banner-title"><?php echo $pageTitle; ?></h1>
					<div class="row justify-content-sm-start justify-content-md-between page-banner-subtitle" style="margin: 0;">
						<p class="lead bdac-colour-white mb-3 mb-lg-0" style=""><?php echo $bannerSubTitle; ?></p>
						<?php 
							if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb( '<p id="breadcrumbs" class="bdac-bg-white ml-md-auto mb-0 py-3 px-4" style="display: inline-block;">','</p>' );
							};
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
                
<?php

    echo '
        <div class="content">
    ';

        while( have_posts() ) : the_post();    
                the_content();                    
        endwhile;
    
    echo $divClose;

    get_footer(); 
    
?>