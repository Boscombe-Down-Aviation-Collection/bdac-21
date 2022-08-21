<?php 

    /**
     * BDAC ACF Blocks
     */

    /*  Check if ACF is activated */

    if ( function_exists( 'acf_register_block_type' ) ) {
        
        /* Adding specific ACF action*/
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
                'render_template'   => 'inc/template-parts/blocks/block-events.php',
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_events.css',
                'icon'              => 'tickets',
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
         * News Block
         */
        acf_register_block_type(
            array(
                'name'              => 'news',
                'title'             => __( 'BDAC News Block' ),
                'description'       => __( 'BDAC News block' ),
                'category'          => 'BDAC',
                'render_template'   => 'inc/template-parts/blocks/block-news.php',
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_news.css',
                'icon'              => 'id',
                'keywords'          => array(
                                        'news',
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
         * Questions Block
         */
        acf_register_block_type(
            array(
                'name'              => 'questions',
                'title'             => __( 'Q&A Block' ),
                'description'       => __( 'BDAC questions annd answers to your post or page' ),
                'category'          => 'custom',
                'render_template'   => 'inc/template-parts/blocks/block-questions.php',
                'enqueue_style'     => get_template_directory_uri() . '/dist/css/blocks/block_questions.css',
                'icon'              => 'money-alt',
                'keywords'          => array(
                                        'questions',
                                        'prices',
                                        'faq'
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

    };