<?php 

    get_header();

?>

    <article class="events">
		<div class="container">
			<div class="row">
			
            <?php 
            
                $i = 0;
                while( have_posts() ) :
					the_post();

                    if ( $i == 0 ) {

                        echo '
                            <div class="col-12 col-md-8" style="background: blue; color: white;">
                                first
                            </div>

                        ';

                    } else {

                        echo '
                            <div class="col-12 col-md-4" style="background: red; color: white;">
                                ' . $i . 'Post
                            </div>
                        ';

                    }

                $i++;
				endwhile;
				wp_reset_postdata();
            
            ?>

			</div><!-- End: Row -->
		</div><!-- End: Container -->
	</article>

<?php

    get_footer();

?> 
