<?php

    function bdac_resources() {
        // Scripts
        wp_enqueue_script( 'bdac-dist-vendors', get_template_directory_uri() . '/dist/js/vendors.js', array(), false, true  );
        wp_enqueue_script( 'bdac-dist-main', get_template_directory_uri() . '/dist/js/main.js', array(), false, true  );
        wp_localize_script( 'bdac-dist-main', 'bdacData', array(
            'root_url' => get_site_url()
        ) );

        // Stylesheets
        wp_enqueue_style( 'google-fonts-oswald', '//fonts.googleapis.com/css2?family=Economica:wght@400;700&family=Oswald:wght@200;400;700&display=swap' );
        wp_enqueue_style( 'google-fonts-open-sans', '//fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap' );
        wp_enqueue_style( 'bdac_fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css', NULL, microtime() );
        wp_enqueue_style( 'bdac_bootstrap_styles', get_template_directory_uri() . '/dist/css/bootstrap.css', NULL, microtime() );
        wp_enqueue_style( 'bdac_main_styles', get_template_directory_uri() . '/dist/css/main.css', NULL, microtime() );
        wp_enqueue_style( 'bdac_styles', get_stylesheet_uri(), NULL, microtime() );
    }

    add_action( 'wp_enqueue_scripts', 'bdac_resources' );

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
            'before_title'  => '<h6 class="text-uppercase mb-1 bdac-colour-red">',
            'after_title'   => '</h6>',
            'before_widget' => '<div>',
            'after_widget'  => '</div><hr>'
        ) );

        register_sidebar( array(
            'name'          => 'Footer Description',
            'id'            => 'footer_description',
            'before_title'  => '<h6 class="text-uppercase mb-1 bdac-colour-white">',
            'after_title'   => '</h6>'
        ) );

        register_sidebar( array(
            'name'          => 'Footer Menu',
            'id'            => 'footer_menu',
            'before_title'  => '<h6 class="text-uppercase mb-1 bdac-colour-white">',
            'after_title'   => '</h6>'
        ) );
    
        register_sidebar( array(
            'name'          => 'Events Description',
            'id'            => 'events_description',
            'before_title'  => '<h6 class="text-uppercase mb-1 bdac-colour-white">',
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
     * Register Custom REST Query
     */
    require get_theme_file_path('/inc/search-route.php');

    /**
     * BDAC REST API Customisation
     */
    function bdac_custom_rest(){
        // Author Name
        register_rest_field( 'post', 'authorName', array(
            'get_callback' => function() { return get_the_author(); }
        ) );
        // Post Thumbnail
        register_rest_field( 'post', 'postThumbnail', array(
            'get_callback' => function() { return get_the_post_thumbnail_url(); }
        ) );
    }

    add_action( 'rest_api_init', 'bdac_custom_rest' );

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
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_carousel.css',
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
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_faq.css',
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
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_faq.css',
                'icon'              => 'edit',
                'keywords'          => array(
                                        'general',
                                        'generic'
                                    )
                )
        );

        /**
         * Image Text Block
         */
        acf_register_block_type(
            array(
                'name'              => 'image-text',
                'title'             => __( 'Image Text Content' ),
                'description'       => __( 'Image Text Content block' ),
                'render_template'   => 'inc/template-parts/blocks/image-text.php',
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_image-text.css',
                'icon'              => 'edit',
                'keywords'          => array(
                                        'image text',
                                        'image and text content block'
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
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_intro.css',
                'icon'              => 'id',
                'keywords'          => array(
                                        'intro',
                                        'text'
                                    )
                )
        );
        
        /**
         * Events
         */
        acf_register_block_type(
            array(
                'name'              => 'events',
                'title'             => __( 'BDAC Events Block' ),
                'description'       => __( 'BDAC Events block' ),
                'category'          => 'BDAC',
                'render_template'   => 'inc/template-parts/blocks/events.php',
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_events.css',
                'icon'              => 'id',
                'keywords'          => array(
                                        'events',
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
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_map.css',
                'icon'              => 'id',
                'keywords'          => array(
                                        'map',
                                        'text'
                                    )
                )
        );
        
        /**
         * Tickets Block
         */
        acf_register_block_type(
            array(
                'name'              => 'tickets',
                'title'             => __( 'Tickets Block' ),
                'description'       => __( 'BDAC Tickets block' ),
                'category'          => 'BDAC',
                'render_template'   => 'inc/template-parts/blocks/block-tickets.php',
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_tickets.css',
                'icon'              => 'money-alt',
                'keywords'          => array(
                                        'tickets',
                                        'prices',
                                        'entry'
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
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/style_arrow.css',
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
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/style_arrow_inv.css',
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
