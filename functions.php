<?php

    function bdac_resources() {
        // Scripts
        wp_enqueue_script( 'bdac-dist-vendors', get_template_directory_uri() . '/dist/js/vendors.js', array(), false, true  );
        wp_enqueue_script( 'bdac-dist-scripts', get_template_directory_uri() . '/dist/js/scripts.js', array(), false, true  );
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
    }
    add_action( 'after_setup_theme', 'bdac_features' );

    if ( ! function_exists( 'bdac_register_nav_menu' ) ) {
    
        function bdac_register_nav_menu() {
            register_nav_menus( array(
                'primary_menu' => __( 'Primary Menu', 'text_domain' ),
                'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
            ) );
        }
        add_action( 'after_setup_theme', 'bdac_register_nav_menu', 0 );
    }

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
     * Order Events
     */
    function bdac_events_order($query) {
        if ( !is_admin() && $query->is_main_query() ) {
      
          if (is_post_type_archive('events')) {
            $query->set('orderby', 'date' );
            $query->set('order', 'ASC' );
          }
      
        }
      }
      
      add_action( 'pre_get_posts', 'bdac_events_order' );

    /**
     * Import ACF Blocks
     */
    require get_template_directory(  ) . '/template-parts/bdac-acf.php';

    
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
