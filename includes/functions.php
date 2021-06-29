<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link              https://finix.no/
 * @since             1.0.0
 * @package           WooPowerGo
 * @subpackage WooPowerGo/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    WooPowerGo
 * @subpackage WooPowerGo/includes
 * @author     FINIX <post@finix.no>
 */

/* Function to run when any product is published */

function call_after_product_publish($post) {
	// Code to be run after publishing the post
	global $post;
	global $tokenObject;
	global $accessTokken;
	global $respAuth;
	global $respPro;
	global $respWoo;

	/********************************************
	 * 
	 * Post Request for Authentication Start Here
	 * 
	********************************************/
	
	require_once plugin_dir_path( __FILE__ ) . 'GoAPI/authorization/req_acc_tokken.php';


	/*********************************
	 * 
	 * Get Products Request Start Here
	 * 
	**********************************/

	require_once plugin_dir_path( __FILE__ ) . 'GoAPI/postReq/post_product.php';

	/*********************************
	 * 
	 * Get Products from WOO Start Here
	 * 
	**********************************/

	// require_once plugin_dir_path( __FILE__ ) . 'GoAPI/woo/woo_get_products.php';
	
}
add_action( 'publish_product', 'call_after_product_publish', 10, 1 );
add_action('save_product', 'call_after_product_publish', 10, 1);