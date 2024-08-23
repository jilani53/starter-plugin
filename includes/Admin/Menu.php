<?php

namespace Starter\Plugin\Admin;

/**
 * Plugin dashboard menu handler
 */
class Menu {

    function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    public function admin_menu() {
        $parent_slug = 'starter-plugin';
        $capability = 'manage_options';

        add_menu_page( __( 'Starter Plugin', 'starter' ), __( 'Starter Plugin', 'starter' ), $capability, $parent_slug, [ $this, 'registration_page' ], 'dashicons-car' );
        add_submenu_page( $parent_slug, __( 'Registration', 'starter' ), __( 'Registration', 'starter' ), $capability, $parent_slug, [ $this, 'registration_page' ], 'dashicons-car' );
        add_submenu_page( $parent_slug, __( 'Options', 'starter' ), __( 'Options', 'starter' ), $capability, 'options', [ $this, 'options_page' ], 'dashicons-car' );
        add_submenu_page( $parent_slug, __( 'Settings', 'starter' ), __( 'Settings', 'starter' ), $capability, 'settings', [ $this, 'settings_page' ], 'dashicons-car' );
    }

    public function registration_page() {
        echo "hello registration_page";
    }

    public function options_page() {
        echo "hello options";
    }

    public function settings_page() {
        echo "Settings page";
    }

}