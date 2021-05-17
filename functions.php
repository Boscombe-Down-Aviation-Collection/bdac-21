<?php

    function bdac_resources() {
        // Scripts
        wp_enqueue_script( 'bdac-dist-vendors', get_template_directory_uri() . '/inc/dist/js/vendors.bundle.js', array(), false, true  );
        wp_enqueue_script( 'bdac-dist-scripts', get_template_directory_uri() . '/inc/dist/js/scripts.bundle.js', array(), false, true  );
        wp_enqueue_script( 'bdac-dist-main', get_template_directory_uri() . '/inc/dist/js/main.bundle.js', array(), false, true  );

        // Stylesheets
        wp_enqueue_style( 'google-fonts-open-sans', '//fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap' );
        wp_enqueue_style( 'bdac_fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css', NULL, microtime() );
        wp_enqueue_style( 'bdac_bootstrap_styles', get_template_directory_uri() . '/inc/dist/css/bootstrap.css', NULL, microtime() );
        wp_enqueue_style( 'bdac_main_styles', get_template_directory_uri() . '/inc/dist/css/main.css', NULL, microtime() );
        wp_enqueue_style( 'bdac_styles', get_stylesheet_uri(), NULL, microtime() );
    }

    add_action( 'wp_enqueue_scripts', 'bdac_resources' );

    // require_once( __DIR__ . '/template-parts/functions/opening-query.php');

    function bdac_features() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        register_nav_menu( 'headerMenu', 'Header Menu' );
    }

    add_action( 'after_setup_theme', 'bdac_features' );

    /**
     * Register Widgets
     */

    function bdac_widgets() {

        register_sidebar( array(
            'name'          => 'Index Sidebar',
            'id'            => 'index_sidebar',
            'before_title'  => '<h6 class="text-uppercase mb-1 font-weight-bold bdac-colour-red">',
            'after_title'   => '</h6>',
            'before_widget' => '<div class="my-3">',
            'after_widget'  => '</div><hr>'
        ) );

        register_sidebar( array(
            'name'          => 'Footer Description',
            'id'            => 'footer_description',
            'before_title'  => '<h6 class="text-uppercase mb-1 font-weight-bold bdac-colour-white">',
            'after_title'   => '</h6>'
        ) );

        register_sidebar( array(
            'name'          => 'Footer Menu',
            'id'            => 'footer_menu',
            'before_title'  => '<h6 class="text-uppercase mb-1 font-weight-bold bdac-colour-white">',
            'after_title'   => '</h6>'
        ) );
    
    }
    add_action( 'widgets_init', 'bdac_widgets' );

    
    /**
     * Register Custom Navigation Walker
     */
    function register_navwalker(){
        require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
    }

    add_action( 'after_setup_theme', 'register_navwalker' );

    /**
     *  Check if ACF is activated
     */
    if ( function_exists( 'acf_register_block_type' ) ) {
        /**
         * Adding specific ACF action
         */
        add_action( 'acf/init', 'register_acf_block_types' );
    }

    function register_acf_block_types() {

    /**
     * Content Blocks
     */

        /**
         * Carousel Block
         */
        acf_register_block_type(
            array(
                'name'              => 'carousel',
                'title'             => __( 'Carousel' ),
                'description'       => __( 'BDAC Carousel block' ),
                'render_template'   => 'inc/template-parts/blocks/carousel.php',
                // 'enqueue_style'     => get_template_directory_uri() . '/inc/css/blocks/carousel.css',
                'icon'              => 'format-gallery',
                'keywords'          => array(
                                        'carousel',
                                        'banner',
                                        'hero'
                                    )
                )
        );

        /**
         * FAQ Block
         */
        acf_register_block_type(
            array(
                'name'              => 'faq',
                'title'             => __( 'FAQ' ),
                'description'       => __( 'BDAC FAQ block' ),
                'render_template'   => 'inc/template-parts/blocks/faq.php',
                'icon'              => 'list-view',
                'keywords'          => array(
                                        'faq',
                                        'questions',
                                        'frequently asked questions'
                                    )
            )
        );

        /**
         * General Content Block
         */
        acf_register_block_type(
            array(
                'name'              => 'general',
                'title'             => __( 'General Content' ),
                'description'       => __( 'General Content block' ),
                'render_template'   => 'inc/template-parts/blocks/general.php',
                'icon'              => 'edit',
                'keywords'          => array(
                                        'general',
                                        'generic'
                                    )
                )
        );

        /**
         * Intro
         */
        acf_register_block_type(
            array(
                'name'              => 'intro',
                'title'             => __( 'BDAC Intro Block' ),
                'description'       => __( 'BDAC intro block' ),
                'category'          => 'BDAC',
                'render_template'   => 'inc/template-parts/blocks/intro.php',
                'icon'              => 'id',
                'keywords'          => array(
                                        'intro',
                                        'text'
                                    )
                )
        );

        /**
         * Map Block
         */
        acf_register_block_type(
            array(
                'name'              => 'map',
                'title'             => __( 'BDAC Map Block' ),
                'description'       => __( 'BDAC Map block' ),
                'category'          => 'BDAC',
                'render_template'   => 'inc/template-parts/blocks/map.php',
                'icon'              => 'id',
                'keywords'          => array(
                                        'map',
                                        'text'
                                    )
                )
        );

        /**
         * Styling Blocks
         */

        /**
         * Arrow
         */
        acf_register_block_type(
            array(
                'name'              => 'arrow',
                'title'             => __( 'Arrow' ),
                'description'       => __( 'BDAC arrow block' ),
                'render_template'   => 'inc/template-parts/styling/arrow.php',
                'category'			=> 'formatting',
                'icon'              => 'arrow-up-alt2',
                'keywords'          => array(
                                        'arrow',
                                        'styling'
                )
            )
        ); 
        
        /**
         * Inverted Arrow
         */
        acf_register_block_type(
            array(
                'name'              => 'inverted arrow',
                'title'             => __( 'Inverted Arrow' ),
                'description'       => __( 'BDAC inverted arrow block' ),
                'render_template'   => 'inc/template-parts/styling/arrow_inv.php',
                'category'			=> 'formatting',
                'icon'              => 'arrow-down-alt2',
                'keywords'          => array(
                                        'inverted arrow',
                                        'arrow',
                                        'styling'
                                    )
                )
        );

    }

    function get_blog() {
        $args = array(
            'posts_per_page'    => 1,
            'post_type' => 'post',
        );
        $the_blog = new WP_Query( $args );
        
        while ( $the_blog->have_posts() ) {
            $the_blog->the_post();

            $postTitle      = get_the_title();
            $postThumb      = get_the_post_thumbnail_url();
            $postContent    = wp_trim_words( get_the_excerpt(), 20 );
            $postLink       = get_the_permalink();
            $authorId       = get_the_author_meta( 'ID' );
            $postAuthor     = get_author_name();
            $postAuthorLink = get_author_posts_url( $authorId );
            $postCategory   = get_the_category_list( ', ' );
            $postDate       = get_the_time( 'dS F' );

            
            return '
                <div class="bdac-card mb-3"  style="background: url(' . $postThumb . '); background-size: cover; background-position-x: center;">
                    <div class="bdac-card-content">
                        <h3 class="bdac-card-content-title mb-3"><a href="' . $postLink .'" title="Posts by BDAC Admin" rel="author">' . $postTitle . '</a></h3>
                        <small class="bdac-card-content-meta">By <a href="' . $postAuthorLink . '">' . $postAuthor . '</a> in ' . $postCategory . '</small>
                        <p class="bdac-card-content-body mt-3">' . $postContent . '</p>
                        <a href="' . $postLink .'" class="bdac-card-content-link">Learn More <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            ';
        }
        wp_reset_postdata();
        
    };

    function get_events() {
        $today = date('Ymd');
        $eventsSection = new WP_Query(array(
            'posts_per_page'    => 1,
            'post_type'         => 'events',
            'meta_key'          => 'event_date',
            'orderby'           => 'meta_value',
            'order'             => 'ASC',
            'meta_query'        => array(
                array(
                    'key'       => 'event_date',
                    'compare'   => '>=',
                    'value'     => $today,
                    'type'      => 'numeric'
                )
            )
        ));

        while($eventsSection->have_posts()) {
            $eventsSection->the_post();

            $eventTitle         = get_the_title();
            $eventLink          = get_the_permalink();
            $eventHeroImg       = get_the_post_thumbnail_url();
            $eventExcerpt       = '';
            $postId             = $eventsSection->post->ID;

            $eventSpeaker       = get_field( 'event_speaker', $postId );
            $eventDescription   = wp_trim_words( get_field( 'event_description', $postId ), 20 );
            $eventDate		    = get_field( 'event_date', $postId );

            return '
                <div class="bdac-card mb-3"  style="background: url(' . $eventHeroImg . '); background-size: cover; background-position-x: center;">
                    <div class="bdac-card-content">
                        <h3 class="bdac-card-content-title mb-3"><a href="' . $eventLink .'" title="Posts by BDAC Admin" rel="author">' . $eventTitle . '</a></h3>
                        <small class="bdac-card-content-meta">By <a href="' . $eventLink . '">' . $eventSpeaker . '</a> | <span>' . $eventDate . '</span></small>
                        <p class="bdac-card-content-body mt-3">' . $eventDescription . '</p>
                        <a href="' . $eventLink .'" class="bdac-card-content-link">Learn More <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            ';
        };
        wp_reset_postdata();
    }
