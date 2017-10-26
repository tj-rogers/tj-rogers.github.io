<?php
/*
Class Easyship_Shipping_Method
Author: Easyship
Developer: Sunny Cheung, Aloha Chen, Paul Lugagne Delpon
Version: 0.4.0
Author URI: https://www.easyship.com
*/

include_once 'easyship-category.php';

if ( ! class_exists( 'Easyship_Shipping_Method' ) ) {
    class Easyship_Shipping_Method extends WC_Shipping_Method {

      //  protected $easyship_categories = Easyship_Category::get_categories();
        /**
         * Constructor for your shipping class
         *
         * @access public
         * @return void
         */
        public function __construct() {
            $this->id                 = 'easyship';
            $this->method_title       = __( 'Easyship', 'easyship' );
            $this->method_description = __( 'Dynamic Shipping Rates at Checkout, by Easyship. To enable, create an account for free at <a href="https://www.easyship.com" target="_blank">www.easyship.com</a>', 'easyship' );

            $this->init();

            $this->enabled = isset( $this->settings['enabled'] ) ? $this->settings['enabled'] : 'yes';
            $this->title = isset( $this->settings['title'] ) ? $this->settings['title'] : __( 'Easyship', 'easyship' );

        }

        /**
         * Init your settings
         *
         * @access public
         * @return void
         */
        function init() {
            // Load the settings API
            $this->init_form_fields();
            $this->init_settings();

            add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
            add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
            add_action( 'admin_notices', array( $this, 'easyship_admin_notice' ) );
            add_action( 'update_option_woocommerce_easyship_settings', array( $this, 'clear_session' ), 10, 2);
        }

        public static function add_settings_tab( $settings_tabs ) {
            $settings_tabs['shipping&section=easyship'] = __( 'Easyship', 'easyship-shipping' );
            return $settings_tabs;
        }

        /**
         * Clear session when option save
         *
         * @access public
         * @return void
         */
        public function clear_session( $old_value, $new_value ) {

            $_SESSION['access_token'] = null;
        }

        /**
         * Notification when api key and secret is not set
         *
         * @access public
         * @return void
         */
        public function easyship_admin_notice() {
          if ( ( $this->get_option('es_api_key') == '' || $this->get_option('es_api_secret') == '' ) && ( $this->get_option('es_access_token') == '' ) ) {
             echo '<div class="error">Please go to <bold>WooCommerce > Settings > Shipping > Easyship</bold> to add your API key and API Secret Or Access Token </div>';
          }
        }

        /**
         * Define settings field for this shipping
         * @return void
         */
        function init_form_fields() {

            $this->form_fields = array(

                // 'enabled' => array(
                //     'title' => __( 'Enable', 'easyship-shipping' ),
                //     'type' => 'checkbox',
                //     'description' => __( 'Enable Easyship Rates.', 'easyship-shipping' ),
                //     'default' => 'yes'
                // ),
                // 'es_access_token' => array(
                //     'title'       => __( 'Access Token', 'easyship-shipping' ),
                //     'type'        => 'text',
                //     'description' => __( 'Enter your Easyship Access token.', 'easyship-shipping' ),
                //     'desc_tip'    => true,
                //     'default'     => ''
                // ),
                // 'es_api_key' => array(
                //     'title'             => __( 'API Key', 'easyship-shipping' ),
                //     'type'              => 'text',
                //     'description'       => __( 'Enter your Easyship API Key. ', 'easyship-shipping' ),
                //     'desc_tip'          => true,
                //     'default'           => ''
                // ),
                // 'es_api_secret' => array(
                //     'title'         => __( 'API Secret', 'easyship-shipping' ),
                //     'type'          => 'textarea',
                //     'description'   => __('Enter your Easyship API Secret. ', 'easyship-shipping' ),
                //     'desc_tip'      => true,
                //     'default'       => ''
                // ),
                // 'es_taxes_duties'      => array(
                //     'title'         =>    __( 'Tax & Duty Paid by', 'easyship-shipping') ,
                //     'type'          => 'select',
                //     'description'   => __('Sender: the shipping rates will be shown inclusive of taxes & duties. Receiver: if taxes & duties apply, they will be shown only for information.', 'easyship-shipping' ),
                //     'default'       => 'Sender',
                //     'options'       => array( 'Sender' => 'Sender (recommended)',
                //                               'Receiver' => 'Receiver')
                // ),
                // 'es_is_insured'       => array(
                //     'title'         =>  __( 'Insured?', 'easyship-shipping' ),
                //     'type'          =>  'checkbox',
                //     'description'   =>  __( 'Check if shipping insurance should be included by default.', 'easyship-shipping' ),
                //     'default'       => 'no'
                // ),
                // 'es_default_category'        => array(
                //     'title'         =>  __( 'Default Category', 'easyship-shipping' ),
                //     'type'          => 'select',
                //     'description'   => __( 'Default Category to be used to calculate the shipping options, in case the product\s category isn\'t recognised.', 'easyship-shipping' ),
                //   //  'default'       => 'home_appliances',
                //     'options'       => Easyship_Category::get_categories()
                // ),
                // 'es_sandbox_mode'     => array(
                //     'title'         => __( 'Sandbox mode', 'easyship-shipping' ),
                //     'type'          => 'checkbox',
                //     'description'   => __( 'Enable the Sandbox mode (for test only, not to be used on a live website).', 'easyship-shipping' ),
                //     'default'       => 'no'
                // )
            );

            // added: 4/9/2017
            // Display access token field to new customer, if api_key or secret already set for current customer, then
            // display api key and secret key information
            // new customer
            if ( ( $this->get_option('es_api_key') == '' || $this->get_option('es_api_secret') == '' ) ){
                $this->form_fields = array_merge(
                  array(
                    'enabled' => array(
                        'title'       => __( 'Enable Easyship Rates', 'easyship-shipping' ),
                        'type'        => 'checkbox',
                        'description' => __( 'Enable Easyship Rates. If unchecked, no rates will be shown at checkout.', 'easyship-shipping' ),
                        'desc_tip'    => true,
                        'default'     => ''
                    ),
                    'es_access_token' => array(
                        'title'       => __( 'Easyship Access Token', 'easyship-shipping' ),
                        'type'        => 'text',
                        'description' => __( 'Enter your Easyship Access Token. To retrieve it, connect to the Easyship dashboard and go to "Connect > Add New" to connect your WooCommerce store. You can then retrieve your Access Token from your store\'s page by clicking on "Activate Rates". This is also the place where you will be able to set all your shipping options and rules.', 'easyship-shipping' ),
                        'desc_tip'    => true,
                        'default'     => ''
                    )
                  ),
                  $this->form_fields
                );
            }
            else {
                $this->form_fields = array_merge(
                  array(
                    'enabled' => array(
                        'title' => __( 'Enable', 'easyship-shipping' ),
                        'type' => 'checkbox',
                        'description' => __( 'Enable Easyship Rates. If unchecked, no rates will be shown at checkout.', 'easyship-shipping' ),
                        'default' => 'yes'
                    ),
                    'es_api_key' => array(
                      'title'             => __( 'API Key', 'easyship-shipping' ),
                      'type'              => 'text',
                      'description'       => __( 'Enter your Easyship API Key. ', 'easyship-shipping' ),
                      'desc_tip'          => true,
                      'default'           => ''
                    ),

                    'es_api_secret' => array(
                      'title'         => __( 'API Secret', 'easyship-shipping' ),
                      'type'          => 'textarea',
                      'description'   => __('Enter your Easyship API Secret. ', 'easyship-shipping' ),
                      'desc_tip'      => true,
                      'default'       => ''
                    )
                  ),
                  $this->form_fields
                );
            }

        }

        /**
         * This function is used to calculate the shipping cost. Within this function we can check for weights, dimensions and other parameters.
         *
         * @access public
         * @param mixed $package
         * @return void
         */
        public function calculate_shipping( $package = array() ) {

            $destination = $package["destination"];

            $items = array();

            $product_factory = new WC_Product_Factory();

            foreach ( $package["contents"] as $key => $item ) {

                // default product - assume it is simple product
                $product = $product_factory->get_product( $item["product_id"] );


                // check version
                if ( WC()->version < '2.7.0' ) {
                     // if this item is variation, get variation product instead
                    if ( $item["data"]->product_type == "variation" ) {
                      $product = $product_factory->get_product( $item["variation_id"] );
                    }

                    // exclude virtual and downloadable product
                    if ( $item["data"]->virtual == "yes" ) {
                      continue;
                    }
                }
                else {

                    if ( $item["data"]->get_type() == "variation" ) {
                      $product = $product_factory->get_product( $item["variation_id"] );
                    }

                    if ( $item["data"]->get_virtual() == "yes" ) {
                      continue;
                    }
                }


                $category = $this->get_category( $item["product_id"] );

                for ( $i=0; $i < $item["quantity"]; $i++ ) {

                      $items[] = array(
                         "actual_weight"           =>  $this->weightToKg( $product->get_weight() ),
                         "height"                  =>  $this->defaultDimension( $this->dimensionToCm( $product->get_height() ) ),
                         "width"                   =>  $this->defaultDimension( $this->dimensionToCm( $product->get_width() ) ),
                         "length"                  =>  $this->defaultDimension( $this->dimensionToCm( $product->get_length() ) ),
                         "category"                =>  $category,
                         "declared_currency"       =>  get_woocommerce_currency(),
                         "declared_customs_value"  =>  $product->get_price(),
                         "identifier_id"           =>  array_key_exists("variation_id", $item) ? ($item["variation_id"] == 0 ? $item["product_id"] : $item["variation_id"]) : $item["product_id"]
                      );
                }
            }

            if ( !class_exists( 'Easyship_Shipping_API' ) ) {
                    // Include Easyship API
                    include_once 'easyship-api.php';
            }
            try {
              Easyship_Shipping_API::init();
              $rates = Easyship_Shipping_API::getShippingRate($destination, $items);
            }
            catch( Exception $e ) {

                    $message = sprintf( __( 'Easyship Rates are not set properly! Error: %s', 'easyship-shipping' ),$e->getMessage() );

                    $messageType = "error";
                    wc_add_notice( $message, $messageType );

            }

            $perfer_rates = $rates;

            foreach ( $perfer_rates as $rate ) {

                $shipping_rate = array(
                  'id'      =>  $rate["courier_id"],
                  'label'   =>  $rate["full_description"],
                  'cost'    =>  $rate["total_charge"]
                );

                wp_cache_add( 'easyship' . $rate["courier_id"], $rate );

                $this->add_rate( $shipping_rate );
            }
        }

        /**
         * This function is convert weight to kg
         *
         * @access protected
         * @param number
         * @return number
         */
        protected function weightToKg( $weight ) {
             $weight_unit = get_option( 'woocommerce_weight_unit' );
             // convert other unit into kg
               if ( $weight_unit != 'kg' ) {
                    if ( $weight_unit == 'g')  {
                        return $weight * 0.001;
                    }
                    else if ( $weight_unit == 'lbs' ) {
                        return $weight * 0.453592;
                    }
                    else if ( $weight_unit == 'oz' ) {
                        return $weight * 0.0283495;
                    }
               }

               // already kg
               return $weight;
        }

        /**
        * This function is convert dimension to cm
        *
        * @access protected
        * @param number
        * @return number
        */
        protected function dimensionToCm( $length ) {

            $dimension_unit = get_option('woocommerce_dimension_unit');
            // convert other units into cm
            if ( $dimension_unit != 'cm' ) {
                if ( $dimension_unit == 'm' ) {
                    return $length * 100;
                }
                else if ( $dimension_unit == 'mm' ) {
                    return $length * 0.1;
                }
                else if ( $dimension_unit == 'in' ) {
                    return $length * 2.54;
                }
                 else if ( $dimension_unit == 'yd' ) {
                    return $length * 91.44;
                }
            }

            // already in cm
            return $length;
        }

        /**
        * This function find the category for the product
        *
        * @access protected
        * @param number
        * @return string
        */
        protected function get_category( $product_id ) {

            $product_cats = wp_get_post_terms( $product_id, 'product_cat' );

            // set to default category
            // if category already exist on WC, send it with API
            $category = $this->get_option( "es_default_category" );

            foreach ( $product_cats as $product_cat ) {

                $name = strtolower( $product_cat->slug );
                if ( Easyship_Category::get_category_by_key( $name ) ) {
                    $category = $name ;
                    break;
                }
            }

            return $category;
        }


        /**
        * This function return default value for length
        *
        * @access protected
        * @param number
        * @return number
        */
        protected function defaultDimension( $length ) {
             // default dimension to 1 if it is 0
            return $length > 0 ? $length : 1;
        }
    }
}
