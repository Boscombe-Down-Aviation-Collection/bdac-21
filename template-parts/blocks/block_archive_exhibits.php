<?php 
global $post;

$className = 'bdac-exhibits';
if ( !empty( $block['className'] ) ) {
    $className .= ' ' . $block[ 'className' ] ;
}
if ( !empty( $block['align'] ) ) {
    $className .= 'align' . $block[ 'align' ] ;
}
?>
<section class="<?php echo esc_attr( $className ); ?>">
    <div class="container">
        <div class="row">

            <?php 
            $bdacExhibitsArgs = array(
                    'post_type'         => 'exhibits',
                    'posts_per_page'    => -1,
                    'orderby'           => 'post_date',
                    'order'             => 'ASC'
            );
            $bdacExhibits = new WP_Query( $bdacExhibitsArgs );

            while($bdacExhibits->have_posts()) {
                $bdacExhibits->the_post();
                $exhibit_title      = get_the_title();
                $exhibit_thumb      = get_the_post_thumbnail_url();
                $exhibit_excerpt    = get_the_excerpt();
                $exhibit_link       = get_the_permalink();
                $exhibit_reg       = get_field( 'exhibit_reg', get_the_ID() )
            
            ?>

                <div class="col col-12 col-md-6 col-lg-4 mb-4">
                    <div class="bdac-card <?php echo $className . '-card'; ?> text-left" style="background: url(' <?php echo $exhibit_thumb; ?> '); background-size: cover; background-position-x: center;">
                        
                        <?php 
                        if ( $exhibit_reg ) {
                            echo sprintf(
                                '<div class="bdac-card-date">
                                    <p>%1$s</p>
                                </div>',
                                $exhibit_reg
                            );
                        }
                        ?>
                
                        <div class="bdac-card-content">
                            <?php 
                            echo sprintf(
                                '<h3 class="bdac-card-content-title mb-3">
                                    <a href="" title="Posts by BDAC Admin" rel="author">
                                        %1$s
                                    </a>
                                </h3>',
                                $exhibit_title
                            );

                            //  <small class="bdac-card-content-meta">' . $exhibit_reg . '</small>
                            
                            if ( $exhibit_excerpt ) {
                                echo sprintf(
                                    '<p class="bdac-card-content-body mt-3 text-start">%1$s</p>',
                                    esc_html( $exhibit_excerpt )
                                );
                            }

                            if( $exhibit_link ) {
                                echo sprintf(
                                    '<a href="%1$s" class="bdac-card-content-link mt-auto" hidden>
                                        More About %2$s<i class="fas fa-chevron-right" aria-hidden="true"></i>
                                    </a>',
                                    $exhibit_link,
                                    $exhibit_reg
                                );
                            }
                            ?>
                        </div>
                    </div>
                </div>

            <?php
            };
            ?>

        </div>
    </div>
</section>    
