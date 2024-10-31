<?php 
	/**
		* Display
		*
		* @package     Lead_Generation
		* @subpackage  Public
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       2.1
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	global $wpdb;    
	$table = $wpdb->prefix . "lg_tools";    
	$arrresult = $wpdb->get_results("SELECT * FROM " . $table . " order by id asc");
	if (count($arrresult) > 0) {		
		foreach ($arrresult as $key => $val) {
		if ( $val->tool == 'popups' ) :
			$param = unserialize( $val->param );			
			if ( !isset( $param['show'] ) ) {
				continue;
			}
			elseif ( $param['show'] == 'shortcode' ) {
				continue;
			}
			else {
			
				switch( $param['show'] ) {
					case 'all':
					require plugin_dir_path( __FILE__ ) .  $val->tool . '/display.php';					
					break;
					case 'onlypost':
					if( is_single() ){
						require plugin_dir_path( __FILE__ ) .  $val->tool . '/display.php';
					}
					break;
					case 'onlypage':
					if ( is_page() ){
						require plugin_dir_path( __FILE__ ) .  $val->tool . '/display.php';
					}
					break;
					case 'posts':
					if ( is_single( preg_split ( "/[,]+/", $param['show_id'] ) ) ) {
						require plugin_dir_path( __FILE__ ) .  $val->tool . '/display.php';
					}
					break;
					case 'postsincat':
					if ( in_category( preg_split ( "/[,]+/", $param['show_id'] ) ) ) {
						require plugin_dir_path( __FILE__ ) .  $val->tool . '/display.php';						
					}
					break;
					case 'postsincat':
					if ( is_page( preg_split ( "/[,]+/", $param['show_id'] ) ) ) {
						require plugin_dir_path( __FILE__ ) .  $val->tool . '/display.php';
					}
					break;
					case 'expost':
					if ( is_page (preg_split ( "/[,]+/", $param['show_id'] ) ) ) {
						require plugin_dir_path( __FILE__ ) .  $val->tool . '/display.php';
					}
					break;
					case 'expage':
					if ( !is_page( preg_split ( "/[,]+/", $param['show_id'] ) ) ) {
						require plugin_dir_path( __FILE__ ) .  $val->tool . '/display.php';
					}
					break;
					case 'taxonomy':
					$taxonomy = $param['taxonomy'];
					$term = $param['show_id'];
					$is_in = is_tax( $taxonomy, array( $term ) );	
					if ( $is_in ){
						
					}
					if( is_single() ) {
						if( has_term( array( $term ), $taxonomy ) ) {
							require plugin_dir_path( __FILE__ ) .  $val->tool . '/display.php';
						}
					}
					break;
				}			
			}
			endif;
		}
	}