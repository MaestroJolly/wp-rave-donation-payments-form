<?php
  /*
  Plugin Name: Rave Payment Form For Donations
  Plugin URI: http://flutterwave.com/
  Description: Rave Payment Donation form to accept local and international payments securely.
  Version: 1.0.0
  Author: Flutterwave, Jolaoso Yusuf
  Author URI: https://twitter.com/theflutterwave
  Copyright: © 2016 Flutterwave Technology Solutions
  License: MIT License
  */

  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }


  function wp_plugin_scripts(){
      wp_register_style('my_styles', plugins_url('/assets/css/ravestyles.css',__FILE__ ));
      wp_enqueue_style('my_styles');
    }
    
    add_action( 'wp_enqueue_scripts', 'wp_plugin_scripts' );

  if ( ! defined( 'FLW_PAY_PLUGIN_FILE' ) ) {
    define( 'FLW_PAY_PLUGIN_FILE', __FILE__ );
  }

  // Plugin folder path
  if ( ! defined( 'FLW_DIR_PATH' ) ) {
    define( 'FLW_DIR_PATH', plugin_dir_path( __FILE__ ) );
  }

  //Plugin folder path
  if ( ! defined( 'FLW_DIR_URL' ) ) {
    define( 'FLW_DIR_URL', plugin_dir_url( __FILE__ ) );
  }

  require_once( FLW_DIR_PATH . 'includes/rave-base-class.php' );

  global $flw_pay_class;

  $flw_pay_class = FLW_Rave_Pay::get_instance();

?>
