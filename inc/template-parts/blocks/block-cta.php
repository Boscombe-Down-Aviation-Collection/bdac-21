<?php 

    /**
     * CTA Block Template
     * 
     * @param array $block the block settings and attributes
     * @param string $content the block inner html
     * @param bool $is_preview True during AJAX preview
     * @param (int|string) $post_id The post ID this block is saving to
     * 
     */

    $id = 'bdac-cta-' . $block['id'];
    $className = 'bdac-cta';
    $cta_heading        = get_field( 'cta_heading');
    $cta_description    = get_field( 'cta_description');
    $cta_button         = get_field( 'cta_button');

    if ( !empty( $block['anchor'])) {
        $id = $block[ 'anchor' ];
    }

    if ( !empty( $block[ 'className' ])) {
        $className = $block['className'];
    }

    if ( !empty( $block[ 'align' ])) {
        $className .= ' has-text-align-' . $block[ 'align' ];
    }

    echo '
        <section id="' . $id . '" class="' . $className . '">
            <div class="container">
                <div class="row">
                    <div class="col col-12 col-md-6">
                        <h2>' . $cta_heading . '</h2>
                        <p>' . $cta_description . '</p>
                        ' . (
                            $cta_button ?
                            '
                                <a href="' . $cta_button['url'] . '" target="' . $cta_button['target'] . '">
                                    ' . $cta_button['title'] . '
                                </a>
                            ' : ''
                        ) . '
                    </div>
                </div>
            </div>
        </section>
    ';

