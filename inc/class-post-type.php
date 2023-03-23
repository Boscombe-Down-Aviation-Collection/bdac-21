<?php 

/**
 * bdac_Post_Type_Bootstrap
 *
 * Loads custom post type definitions from individual files to keep
 * things tidy.
 *
 * @package
 */
class bdac_Post_Type_Bootstrap {
	/**
	 * List of post types to load
	 */
	const POST_TYPES = array(
		'exhibits',
        'events'
        // 'opening_hours',
        // 'learning',
        // 'volunteers'
	);

	/**
	 * Class Constructor
	 */
	public function __construct() {
		foreach ( self::POST_TYPES as $post_type ) {
			self::register_post_type( $post_type );
		}
	}

	/**
	 * Includes the definition file for a post type and runs its gooks
	 *
	 * @param string $type slug of post type to load.
	 * @return void
	 */
	public static function register_post_type( string $type ) {
		require_once 'post-types/' . $type . '.php';

		$init_hook_function = sprintf( 'bdac_%1$s_post_type', $type );

		if ( function_exists( $init_hook_function ) ) {
			add_action( 'init', $init_hook_function );
		}
	}
}