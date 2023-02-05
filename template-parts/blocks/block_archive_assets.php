<?php 
$learning_class_name = 'bdac-learning';
if ( !empty( $block['className'] ) ) {
    $learning_class_name .= ' ' . $block[ 'className' ] ;
}
if ( !empty( $block['align'] ) ) {
    $learning_class_name .= 'align' . $block[ 'align' ] ;
}

$learning_block = new WP_Query( array(
    'posts_per_page'    => -1,
    'post_type'         => 'learning',
    'orderby'           => 'post_date', 
    'order'             => 'ASC'
) );

while( $learning_block->have_posts() ) {
    $learning_block->the_post();

    $learning_title        = get_the_title( get_the_ID() );
    $learning_link         = get_field( 'learning_asset', get_the_ID() );
    $learning_description  = get_the_excerpt( get_the_ID(), 30 );
?>
    <div class="col-12 col-md-6 mt-md-0 <?php echo $learning_class_name ?>-asset">
        
        <?php 
        echo sprintf( 
            '<h4 class="%1$s-asset-title">%2$s</h4>
            <p class="%1$s-asset-content">%3$s</p>
            <a href="%4%s">
                <button class="btn btn-bdac-alt">%5$s %6$s</button>
            </a>',
            $learning_class_name,
            $learning_title,
            $learning_description,
            $learning_link['url'],
            $learning_link['title'],
            '<i class="fas fa-file-download"></i>'
        );
        ?>
        
    </div>
<?php 
wp_reset_postdata();
};
?>