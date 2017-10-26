<?php
/**
 * @package Easyship
 * @version 0.4.0
 */
/*
Plugin Name: Easyship
Plugin URI: http://wordpress.org/plugins/easyship
Description: Easyship plugin for easy shipping method
Author: Easyship
Developer: Sunny Cheung, Aloha Chen, Paul Lugagne Delpon
Version: 0.4.0
Author URI: https://www.easyship.com
*/

define('EASYSHIP_VERSION', '0.4.0');

if ( ! defined( 'WPINC' ) ) {

    die;
}

include_once 'includes/easyship-category.php';

/*
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {


    if ( ! class_exists( 'WC_Integration_Easyship' ) ) :

        class WC_Integration_Easyship {

            /**
            * Construct the plugin.
            */
            public function __construct() {
                add_action( 'init', array( $this, 'register_session' ) );
                add_action( 'woocommerce_shipping_init', array( $this, 'init' ) );
            }

            /**
            * Initialize the plugin.
            */
            public function init() {
                // start a session


                // Checks if WooCommerce is installed.
                if ( class_exists( 'WC_Integration' ) ) {
                    // Include our integration class.
                    include_once 'includes/easyship-shipping.php';

                   // Register the integration.
                    add_filter( 'woocommerce_shipping_methods', array( $this, 'add_integration' ) );
                } else {
                    // throw an admin error if you like
                }
            }

            /**
             * Add a new integration to WooCommerce.
             */
            public function add_integration( $integrations ) {
                $integrations[] = 'Easyship_Shipping_Method';
                return $integrations;
            }

            /**
             *  Register a session
             */
            public function register_session(){
                if( !session_id() )
                    session_start();
            }

        }

        $WC_Integration_Easyship = new WC_Integration_Easyship( __FILE__ );

     endif;

}

/**
 *  Plugin Activation function
 *  @return void
 */

function easyship_plugin_activate() {

    $easyship_categories = Easyship_Category::get_categories();

    foreach ( $easyship_categories as $key => $cat ) {
        wp_insert_term(
            $cat,
            'product_cat',
            array(
                'description' => $cat,
                'slug' => $key
            )
        );
    }

}
register_activation_hook( __FILE__, 'easyship_plugin_activate' );
