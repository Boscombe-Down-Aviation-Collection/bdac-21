<?php

class bdacTheme {
	/**
	 * Class Constructor
	 */
	// public function __construct() {
		// add_action( 'wp_enqueue_scripts', array( static::class, 'enqueue_scripts' ) );
		// add_action( 'after_setup_theme', array( static::class, 'declare_theme_support' ) );
		// add_action( 'widgets_init', array( static::class, 'setup_nav_menus' ) );

		/**
		 * ACF Blocks Import
		 */
		// if ( function_exists( 'acf_register_block_type' ) ) {
		// 	require_once 'inc/cof-acf.php';
		// }

		/**
		 * Include helper functions
		 */
		// require_once 'inc/template-functions.php';

		/**
		 * Post Type Bootstrapper
		 */
		// require_once 'inc/class-post-type-boostrap.php';
		// new coforge_Post_Type_Bootstrap();

		/**
		 * Fancy Menu
		 */
		// require_once 'inc/class-coforge-primary-menu-presenter.php';
	// }

	/**
	 * Enqueue assets
	 */
	// public static function enqueue_scripts() {
	// 	wp_enqueue_script( 'cof-isotope', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array(), COFORGE_THEME_VERSION, true );
	// 	wp_enqueue_script( 'cof-scripts', get_template_directory_uri() . '/dist/js/scripts.js', array( 'jquery' ), COFORGE_THEME_VERSION, true );

	// 	// Stylesheets.
	// 	wp_enqueue_style( 'cof_fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', null, COFORGE_THEME_VERSION );
	// 	wp_enqueue_style( 'cof-styles', get_stylesheet_uri(), array(), COFORGE_THEME_VERSION );
	// }

	/**
	 * Hooks into theme support to add optional WordPress features.
	 */
	// public static function declare_theme_support() {
	// 	add_theme_support( 'post-thumbnails' );
	// 	register_nav_menu( 'mainNav', 'Main Navigation' );
	// 	register_nav_menu( 'mainSecondary', 'Header Buttons' );
	// 	register_nav_menu( 'productNav', 'Product Navigation' );
	// 	register_nav_menu( 'contentNav', 'Content Page Navigation' );
	// }

	// public static function setup_nav_menus() {
	// 	register_sidebar(
	// 		array(
	// 			'name'         => 'Single Sidebar',
	// 			'id'           => 'single_sidebar',
	// 			'after_widget' => '<hr>',
	// 		)
	// 	);

	// 	register_sidebar(
	// 		array(
	// 			'name'          => 'Footer Column 1',
	// 			'id'            => 'footer_column_1',
	// 			'before_widget' => '<div class="cof-footer-bottom-menu">',
	// 			'after_widget'  => '</div>',
	// 			'before_title'  => '<h6 class="cof-footer-bottom-title">',
	// 			'after_title'   => '</h6>',
	// 		)
	// 	);

	// 	register_sidebar(
	// 		array(
	// 			'name'          => 'Footer Column 2',
	// 			'id'            => 'footer_column_2',
	// 			'before_widget' => '<div class="cof-footer-bottom-menu">',
	// 			'after_widget'  => '</div>',
	// 			'before_title'  => '<h6 class="cof-footer-bottom-title">',
	// 			'after_title'   => '</h6>',
	// 		)
	// 	);

	// 	register_sidebar(
	// 		array(
	// 			'name'          => 'Footer Column 3',
	// 			'id'            => 'footer_column_3',
	// 			'before_widget' => '<div class="cof-footer-bottom-menu">',
	// 			'after_widget'  => '</div>',
	// 			'before_title'  => '<h6 class="cof-footer-bottom-title">',
	// 			'after_title'   => '</h6>',
	// 		)
	// 	);

	// 	register_sidebar(
	// 		array(
	// 			'name'          => 'Footer Column 4',
	// 			'id'            => 'footer_column_4',
	// 			'before_widget' => '<div class="cof-footer-bottom-menu">',
	// 			'after_widget'  => '</div>',
	// 			'before_title'  => '<h6 class="cof-footer-bottom-title">',
	// 			'after_title'   => '</h6>',
	// 		)
	// 	);

	// 	register_sidebar(
	// 		array(
	// 			'name'          => 'Footer Awards',
	// 			'id'            => 'footer_awards',
	// 			'before_widget' => '<div class="cof-footer-awards">',
	// 			'after_widget'  => '</div>',
	// 			'before_title'  => '',
	// 			'after_title'   => '',
	// 		)
	// 	);

	// 	register_sidebar(
	// 		array(
	// 			'name'          => 'Content Footer Blocks',
	// 			'id'            => 'single-footer',
	// 			'before_widget' => '',
	// 			'after_widget'  => '',
	// 			'class'         => '',
	// 		)
	// 	);

	// 	register_sidebar(
	// 		array(
	// 			'name'          => 'Products Footer Blocks',
	// 			'id'            => 'products-footer',
	// 			'before_widget' => '',
	// 			'after_widget'  => '',
	// 			'class'         => '',
	// 		)
	// 	);
	// }

	/**
	 * Constructs an asset URL relative to the root directory.
	 *
	 * @param mixed $path Relative path of the asset.
	 * @return string
	 */
	// public static function get_asset_url( $path ) {
	// 	return '/' . $path;
	// }

	/**
	 * Returns an fully-qualified URL for the given path
	 *
	 * @param mixed $path Relative path of the asset.
	 */
	// public static function asset_url( $path ) {
	// 	echo esc_url( self::get_asset_url( $path ) );
	// }

	/**
	 * Loads contents of SVG from optimized source
	 *
	 * @param mixed $name name of SVG to load.
	 * @return string|false  SVG contents
	 */
	public static function get_svg( $name ) {
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		return file_get_contents( get_stylesheet_directory() . '/src/svg/' . sanitize_title( $name ) . '.svg' );
	}

	/**
	 * Outputs SVG to the document
	 *
	 * @param mixed $name name of SVG to load.
	 * @return void
	 */
	public static function svg( $name ) {
		// This should be passed through safe_svg or similar but it is not present.
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo self::get_svg( $name );
	}
}

$bdac_theme = new bdacTheme();   

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
