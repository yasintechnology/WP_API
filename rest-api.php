<?php
/**
 *
 * Plugin Name: Y REST API
 * Plugin URI: https://atbox.io/yasindev
 * Description: This Plugin To Show Your Profile in widget.
 * Version: 1.0
 * Author: Yasin Ti
 * Author URI: https://atbox.io/yasintechnology
 * License: GPLv2 or later
 *
 * @package   Y REST API
 * @author    Yasin Ti <yasin.coding@gmail.com>
 * @copyright Copyright (c) 2018, atbox.io/yasintechnology.
 *
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( 'dont access!' );
}

y_rest_api::init();

CLASS y_rest_api {

	public static function init() {
	
	add_action('init',array( __CLASS__, 'add_rule' ));
	add_filter('query_vars',array(__CLASS__,'add_query'));
	add_action('parse_request',array( __CLASS__, 'set_api_page' ));

	}
	
	public static function add_rule(){
	
		add_rewrite_rule('index.php','api');
		
		    global $wp_rewrite; // this 2line is optional => read wp doc!
			$wp_rewrite->flush_rules();
				
	}
	
	public static function add_query($vars){
	
	    $vars[] = "api";
		return $vars;
	
	}
	
	public static function set_api_page( $query){
	
		
		if( $query->query_vars['api'] ) {
			echo "hello word";
		}
	
	}	
	
	
	

}
