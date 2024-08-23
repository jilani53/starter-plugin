<?php

namespace Starter\plugin\Frontend;

/**
 * Shortcode handler class
 */
class Shortcode {

    /**
     * Initalizes the class
     */
    function __construct() {
        add_shortcode( 'starter', [ $this, 'render_shortcode' ] );
    }

    /**
     * Render shortcode
     * 
     * @param array $attr
     * @param string $content
     * 
     * @return string
     */
    public function render_shortcode( $attr, $content = '' ) {
        return "Hello from shortcode";
    }

}