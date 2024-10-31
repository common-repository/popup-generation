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
	
	
	// Style 
	$popupOverlay = 'true';
	$location = !empty( $param['location'] ) ? $param['location'] : 'center';
	// Popup Settings
	$triggers = 'click';
	$delay = !empty( $param['delay'] ) ? $param['delay'] : '0';
	$reach = !empty( $param['reach'] ) ? $param['reach'] : '0';
	$animate_in = !empty( $param['animate_in'] ) ? $param['animate_in'] : 'fadeIn';
	$animate_out = !empty( $param['animate_out'] ) ? $param['animate_out'] : 'fadeOut';
	$animate_speed = !empty( $param['animate_speed'] ) ? $param['animate_speed'] : '0';
	$set_cookie = 'false';
	$cookie_time = !empty( $param['cookie_time'] ) ? $param['cookie_time'] : '0';
	$auto_close = !empty( $param['auto_close'] ) ? 'true' : 'false';
	$auto_close_time = !empty( $param['auto_close_time'] ) ? $param['auto_close_time'] : '0';
	
	$video_support = !empty( $param['video_support'] ) ? 'true' : 'false';
	$video_autoplay = !empty( $param['video_autoplay'] ) ? 'true' : 'false';
	$video_close = !empty( $param['video_close'] ) ? 'true' : 'false';
	
	// Close Button Settings
	$close_btn_delay = !empty( $param['close_btn_delay'] ) ? $param['close_btn_delay'] : '0';
	$remove_close_button = !empty( $param['remove_close_button'] ) ? 'true' : 'false';
	$close_overlay = 'true';
	$close_esc = 'true';
	
	// Device Screen
	$max_screen_enable = 'false';
	$max_screen = !empty($param['max_screen']) ? $param['max_screen'] : '1024';
	$min_screen_enable = 'false';
	$min_screen = !empty($param['min_screen']) ? $param['min_screen'] : '480';
	
	
	
?>
jQuery(document).ready(function() {
	jQuery('#lg-popup').lgPopup({
		popupLocation: '<?php echo $location;?>',
		popupOverlay: <?php echo $popupOverlay;?>,				
		overlayClosesPopup: <?php echo $close_overlay;?>,
		overlayTransitionSpeed: '<?php echo $animate_speed;?>',
		popupAnimationDuration: '<?php echo $animate_speed;?>',				
		popupAction: '<?php echo $triggers;?>',
		popupScrollDistance: <?php echo $reach;?>,
		delayPopup: <?php echo $delay;?>,			
		popupOpenEffect: '<?php echo $animate_in;?>',
		popupCloseEffect: '<?php echo $animate_out;?>',
		delayCloseButton: <?php echo $close_btn_delay;?>,
		closeButtonRemove: <?php echo $remove_close_button;?>,
		closePopupAuto: <?php echo $auto_close;?>,
		closePopupAutoDelay: <?php echo $auto_close_time;?>,
		closeESC: <?php echo $close_esc;?>,
		closeOverlay: <?php echo $close_overlay;?>,				
		videoSupport: <?php echo $video_support;?>,
		videoAutoPlay: <?php echo $video_autoplay;?>,
		videoStopOnClose: <?php echo $video_close;?>,				
		windowMaxInclude: <?php echo $max_screen_enable;?>,
		windowMaxWidth: '<?php echo $max_screen;?>',
		windowMinInclude: <?php echo $min_screen_enable;?>,
		windowMinWidth: '<?php echo $min_screen;?>',				
		openPopup: 'open-popup',
		closePopup: 'close-popup',				
		setCookie: <?php echo $set_cookie;?>,
		cookieDays: <?php echo $auto_close_time;?>,
		cookieName: 'lg-popup',
		popupAnalytic: false,				
	})
});