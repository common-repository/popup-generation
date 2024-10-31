<?php 
	/**
		* Public popup on Front-End
		*
		* @package     Lead_Generation
		* @subpackage  Public 
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;
	$close_type = !empty( $param['close_type'] ) ? $param['close_type'] : 'text';
	$close_location = !empty( $param['close_location'] ) ? $param['close_location'] : 'topRight';
	$popup  = '<div id="lg-popup-' . $val->id . '">';	
	if ( !empty( $param['close_overlay'] ) ) {
		$popup .= '<div class="lg-popup-overlay-close"></div>';
	}
	$popup .= '<div class="lg-popup">';
	if ( empty( $param['close_btn_delay'] ) ) {
		$popup .= '<div class="lg-popup-close-btn ' . $close_location .' ' . $close_type . '"></div>';
	}
	if ( !empty( $param['popup_title'] ) ) {
		$popup  .= '<div class="lg-title">' . $val->title . '</div>';
	}	
	$popup .= do_shortcode( $param['content'] );
	$popup .= '</div></div>';		 
	echo $popup;		
?>