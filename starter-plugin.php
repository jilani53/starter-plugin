<?php

/*
 * Plugin Name:       Starter Plugin
 * Plugin URI:        https://wpninjadevs.com/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Jilani Ahmed
 * Author URI:        https://wpninjadevs.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       starter
 * Domain Path:       /languages
 */

if( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Starter_Plugin {

    /**
     * Plugin version
     */
    const version = '1.0.0';

    /**
     * Class constructor
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initilizes a singleton instance
     * 
     * @return \Stater_Plugin
     */
    public static function init() {
        static $instance = false;

        if( ! $instance ) {
            $instance = new self();
        }

    }

    /**
     * Defined all required plugin constants
     */
    public function define_constants() {
        define( 'STARTER_PLUGIN_VERSION', self::version );
        define( 'STARTER_PLUGIN_FILE', __FILE__ );
        define( 'STARTER_PLUGIN_PATH', __DIR__ );
        define( 'STARTER_PLUGIN_URL', plugins_url( '', STARTER_PLUGIN_FILE ));
        define( 'STARTER_PLUGIN_ASSETS', STARTER_PLUGIN_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     */
    public function init_plugin() {

        if( is_admin() ) {
            new Starter\Plugin\Admin();
        } else {
            new Starter\Plugin\Frontend();
        }
    }

    /**
     * Do stuff upon plugin activation
     */
    public function activate() {

        $installed = get_option( 'starter_plugin_installed' );
        
        if( $installed ){
            update_option( 'starter_plugin_installed', time() );  
        }

        update_option( 'starter_plugin_version', STARTER_PLUGIN_VERSION );

    }
}

/**
 * Initializes the main plugin
 * 
 * @return \Starter_Plugin
 */
function starter_plugin() {
    return Starter_Plugin::init();
}

// Kick-off the plugin initialization
starter_plugin();