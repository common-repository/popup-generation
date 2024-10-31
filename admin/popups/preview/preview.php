<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Popup Preview
		*
		* @package     Lead_Generation
		* @subpackage  Preview
		* @copyright   Copyright (c) 2018, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	echo '
	<style>
	.lg-popup-overlay,
	.lg-popup,
	.lg-popup-close-btn {
		visibility: hidden;
		opacity: 0;
		pointer-events: none;
	}	
	</style>
	
	';
	
	$close_type = !empty( $param['close_type'] ) ? $param['close_type'] : 'text';
	$close_location = !empty( $param['close_location'] ) ? $param['close_location'] : 'topRight';
	$popup  = '<div id="lg-popup">';	
	if ( !empty( $param['close_overlay'] ) ) {
		$popup .= '<div class="lg-popup-overlay-close"></div>';
	}
	$popup .= '<div class="lg-popup">';
	if ( empty( $param['close_btn_delay'] ) ) {
		$popup .= '<div class="lg-popup-close-btn ' . $close_location .' ' . $close_type . '"></div>';
	}
	if ( !empty( $param['popup_title'] ) ) {
		$popup  .= '<div class="lg-title">' . $title . '</div>';
	}	
	$popup .= !empty( $param['content'] ) ? $param['content'] : '';
	$popup .= '</div></div>';		 
	echo $popup;	
	
	wp_enqueue_style( 'lg-main', POPUP_GENERATION_PLUGIN_URL . 'assets/css/main.css', array(), '1.0' );
	wp_enqueue_style( 'lg-animate', POPUP_GENERATION_PLUGIN_URL . 'assets/css/animate.css', array(), '1.0' );	
	wp_enqueue_script( 'lg-popups', POPUP_GENERATION_PLUGIN_URL . 'assets/js/popups/jquery.popup.js', array( 'jquery' ), '1.0' );
	echo '<style>';
	include_once ('style.php');
	echo '</style>';
	echo '<script>';
	include_once ('script.php');
	echo '</script>';
	
?>